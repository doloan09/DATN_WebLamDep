<?php

namespace App\Orchid\Screens\Post;

use App\Models\Category;
use App\Models\Post;
use App\Orchid\Layouts\Post\PostEditLayout;
use App\Orchid\Screens\BaseScreen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Toast;

class PostEditScreen extends BaseScreen
{
    protected bool $useTurbo = false;
    public Post    $posts;
    public bool    $edit;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(?int $id): iterable
    {
        if ($id) {
            $this->edit = true;
            try {
                $post = Post::query()->findOrFail($id);

                return [
                    'post' => $post,
                    'edit' => false,
                ];
            } catch (\Exception) {
                abort(404);
            }
        }

        $this->edit = false;
        return [
            'edit' => true,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->edit ? 'Edit Posts' : 'Create Posts';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Thêm mới')
                ->icon('plus')
                ->method('store')
                ->canSee(!$this->edit),

            Button::make('Cập nhật')
                ->icon('check')
                ->method('update')
                ->canSee($this->edit),

            Button::make('Xóa')
                ->icon('trash')
                ->confirm(__('Bạn có chắc muốn xóa bài viết này không?'))
                ->method('delete')
                ->canSee($this->edit),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PostEditLayout::class
        ];
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title'   => ['required'],
                'content' => ['required'],
            ]);

            $category     = Category::query()->findOrFail($request->get('id_category'));
            $item         = $request->file('link_image');
            $resizedImage = cloudinary()->upload($item->getRealPath(), [
                'folder'         => $category->name,
                'transformation' => [
                    'format'  => 'f_jpg',
                    'gravity' => 'faces',
                    'crop'    => 'fill',
                ]
            ])->getSecurePath();

            $post = Post::query()->insert([
                'title'       => $request->get('title'),
                'slug'        => Str::slug($request->get('title')),
                'content'     => $request->get('content'),
                'id_category' => $request->get('id_category'),
                'status'      => 0,
                'description' => $request->get('description'),
                'link_image'  => $resizedImage,
                'created_at'  => Carbon::now(),
            ]);

            if ($post) {
                Toast::success('Thêm mới thành công!');
                return redirect()->route('posts.index');
            }

            Toast::error('Có lỗi khi thêm mới bài viết!');
        }catch (\Exception){
            Toast::error('Lỗi');
        }
    }

    /**
     * @param Post $posts
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'title'   => ['required'],
            'content' => ['required'],
        ]);

        try {
            Post::query()->findOrFail($request->get('id'));

            $update = Post::query()
                ->where('id', $request->get('id'))
                ->update([
                    'title'       => $request->get('title'),
                    'slug'        => Str::slug($request->get('title')),
                    'content'     => $request->get('content'),
                    'id_category' => $request->get('id_category'),
                    'description' => $request->get('description'),
                ]);

            if ($update) {
                Toast::success('Cập nhật thành công!');
                return redirect()->route('posts.index');
            }
            Toast::error('Lỗi khi cập nhât!');
        } catch (\Exception) {
            return abort(404);
        }
    }

    /**
     * @param Post $posts
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     *
     */
    public function delete(Post $posts)
    {
        $posts->delete();

        Alert::success(__('Posts was removed'));
        return redirect()->route('platform.systems.posts');
    }

}
