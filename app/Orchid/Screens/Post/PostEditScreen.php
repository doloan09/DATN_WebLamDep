<?php

namespace App\Orchid\Screens\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Wishlist;
use App\Orchid\Layouts\Post\PostEditLayout;
use App\Orchid\Screens\BaseScreen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;

class PostEditScreen extends BaseScreen
{
    protected bool $useTurbo = false;
    public Post    $post;
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
                    'edit' => true,
                ];
            } catch (\Exception) {
                abort(404);
            }
        }

        $this->edit = false;
        return [
            'edit' => false,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->edit ? $this->post->title : 'Thêm mới bài viết';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Lưu')
                ->icon('plus')
                ->method('store')
                ->set('style', 'color: white; background-color: orange; border-radius: 5px;')
                ->canSee(!$this->edit),

            Button::make('Cập nhật')
                ->icon('check')
                ->set('style', 'color: white; background-color: orange; border-radius: 5px;')
                ->method('update')
                ->canSee($this->edit),

            Button::make('Xóa')
                ->icon('trash')
                ->set('style', 'color: white; background-color: red; border-radius: 5px;')
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

            $item         = $request->file('link_image');
            if ($item) {
                $category     = Category::query()->findOrFail($request->get('id_category'));
                $resizedImage = cloudinary()->upload($item->getRealPath(), [
                    'folder'         => $category->name,
                    'transformation' => [
                        'format'  => 'f_jpg',
                        'gravity' => 'faces',
                        'crop'    => 'fill',
                    ]
                ])->getSecurePath();
            }

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
     * @param Post $post
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
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     *
     */
    public function delete(Post $post)
    {
        Wishlist::query()->where('id_post', $post->id)->delete();

        $post->delete();

        Toast::success('Xóa bài viết thành công!');
        return redirect()->route('posts.index');
    }

}
