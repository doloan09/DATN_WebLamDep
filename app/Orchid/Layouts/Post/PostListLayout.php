<?php

namespace App\Orchid\Layouts\Post;

use App\Enum\PostStatus;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'posts';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID'),

            TD::make('title', 'Tiêu đề')
                ->width(200),

            TD::make('slug', 'Slug')
                ->width(200),

            TD::make('id_category', 'Danh mục')
                ->width(100)
                ->render(function (Post $post) {
                    $category = Category::query()->findOrFail($post->id_category);
                    return $category->name;
                }),

            TD::make('status', 'Bài viết nổi bật')
                ->width(200)
                ->render(function (Post $post) {
                    return $post->status->description;
                }),

            TD::make('created_at', 'Ngày tạo')
                ->alignCenter()
                ->render(function (Post $post) {
                    return Carbon::parse($post->created_at)->format('d-m-Y H:i:s');
                }),

            TD::make('link_image', 'Hình nền')
                ->alignCenter()
                ->width(250)
                ->render(function (Post $post){
                    return $post->link_image ? '<img src="'. $post->link_image .'" style="width: 100%; max-height: 150px; object-fit: cover;">' : "";
                }),

            TD::make()->render(function (Post $post) {
                return ModalToggle::make('Thay đổi')
                    ->modal('showImage')
                    ->icon('picture')
                    ->method('changeImage')
                    ->parameters([
                        'post' => $post->id,
                    ]);
            })->alignCenter(),

            TD::make('Trạng thái')
                ->width(50)
                ->alignCenter()
                ->render(function (Post $post) {
                    if ($post->status->is(PostStatus::UnActive)) {
                        return Button::make('Active')
                            ->icon('check')
                            ->set('style', 'color: green')
                            ->method('update', ['id' => $post->id]);
                    }

                    return Button::make('UnActive')
                        ->icon('close')
                        ->set('style', 'color: red')
                        ->method('update', ['id' => $post->id]);
                }),

            TD::make(__('Thao tác'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Post $post) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make('Sửa')
                            ->route('posts.edit', $post->id)
                            ->set('style', 'color: blue')
                            ->icon('pencil'),

                        Button::make('Xóa')
                            ->confirm("Bạn có chắc muốn xóa?")
                            ->icon('trash')
                            ->set('style', 'color: red')
                            ->method('delete', [
                                'id' => $post->id
                            ]),

                    ])),
        ];
    }
}
