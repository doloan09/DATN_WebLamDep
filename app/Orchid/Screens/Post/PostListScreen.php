<?php

namespace App\Orchid\Screens\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Wishlist;
use App\Orchid\Layouts\Post\ImagePostEditLayout;
use App\Orchid\Layouts\Post\PostFilterLayout;
use App\Orchid\Layouts\Post\PostListLayout;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PostListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'posts' => Post::query()
                ->filters(PostFilterLayout::class)
                ->orderByDesc('id')
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Danh sách bài viết';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'systems.posts',
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Thêm mới')
                ->icon('plus')
                ->set('style', 'color: white; background-color: orange; border-radius: 5px;')
                ->route('posts.create'),

        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PostFilterLayout::class,
            PostListLayout::class,

            Layout::modal('showImage', ImagePostEditLayout::class)
                ->async('asyncGetData')
                ->title('Hình nền'),

        ];
    }

    public function asyncGetData(Post $post): iterable
    {
        return [
            'post' => $post,
        ];
    }
    public function delete(Request $request)
    {
        $id     = $request->get('id');
        $static = Post::query()->find($id);

        if ($static) {
            try {
                Wishlist::query()->where('id_post', $id)->delete();

                $delete = $static->delete();

                if ($delete) {
                    Toast::success('Đã xóa thành công bài viết có id: ' . $id);
                } else {
                    Toast::error('Có lỗi khi xóa bài viết có id: ' . $id);
                }
            }catch (\Exception $e){
                Toast::error('Có lỗi!');
            }
        }else{
            Toast::error('Not found!');
        }
    }

    public function update(int $id){
        try {
            $post = Post::query()->findOrFail($id);
            $status = 0;
            if ($post->status->value == 0){
                $status = 1;
            }

            Post::query()->where('id', $id)->update(['status' => $status]);

            Toast::success('Cập nhật trạng thái bài viết thành công!');
        }   catch (\Exception){
            Toast::error('Not found!');
        }
    }

    public function changeImage(Request $request){
        try {
            $post = Post::query()->findOrFail($request->get('id'));
            $check = substr_count($post->link_image, "https://res.cloudinary.com");

            // xóa ảnh cũ trên cloudinary
            if ($check) {
                $token  = explode('/', $post->link_image);
                $token2 = explode('.', $token[sizeof($token) - 1]);

                Cloudinary::destroy($token[7] . '/' . $token2[0]); // ten folder: $token[7], ten anh: $token2[0]

            }

            // lưu ảnh lên cloudinary
            $category     = Category::query()->findOrFail($request->get('id_category'));
            $item         = $request->file('file_name');
            $resizedImage = cloudinary()->upload($item->getRealPath(), [
                'folder'         => $category->name,
                'transformation' => [
                    'format'  => 'f_jpg',
                    'gravity' => 'faces',
                    'crop'    => 'fill',
                ]
            ])->getSecurePath();

            $post->update([
                'link_image' => $resizedImage,
            ]);
            Toast::success('Thay đổi thành công!');
        }catch (\Exception){
            Toast::error('Lỗi! Không tìm thấy ảnh nền cũ trên cloudinary! Không thể xóa ảnh nền cũ!');
        }
    }
}
