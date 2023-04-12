<?php

namespace App\Orchid\Layouts\Video;

use App\Models\Video;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class VideoListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'videos';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID'),

            TD::make('link_video', 'Link Video')
                ->width(300)
                ->render(function (Video $video){
                    return '<a href="'. $video->link_video .'" style="color: blue; " target="_blank">' . $video->link_video . '</a>';
                }),

            TD::make('title', 'Tiêu đề')
                ->width(200),

            TD::make('channel_title', 'Kênh'),

            TD::make('duration', 'Thời lượng phát'),

            TD::make('view_count', 'Lượt xem'),

            TD::make('like_count', 'Lượt thích'),

            TD::make('dislike_count', 'Không thích'),

            TD::make('comment_count', 'Số bình luận'),

            TD::make('Thao tác')
                ->width(50)
                ->alignCenter()
                ->render(function (Video $video) {
                    return Link::make('Sửa')
                        ->route('videos.edit', $video->id)
                        ->icon('pencil');
                }),

            TD::make()
                ->width(50)
                ->alignCenter()
                ->render(function (Video $video) {
                    return Button::make('Xóa')
                        ->confirm("Bạn có chắc muốn xóa?")
                        ->icon('close')
                        ->method('delete', [
                            'id' => $video->id
                        ]);
                }),

        ];
    }
}
