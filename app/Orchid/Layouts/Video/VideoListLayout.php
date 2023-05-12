<?php

namespace App\Orchid\Layouts\Video;

use App\Models\Video;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
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

            TD::make('like_count', 'Lượt thích')->alignCenter(),

            TD::make('dislike_count', 'Không thích')->alignCenter(),

            TD::make('comment_count', 'Số bình luận')->alignCenter(),

            TD::make(__('Thao tác'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Video $video) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make('Sửa')
                            ->set('style', 'color: blue')
                            ->route('videos.edit', $video->id)
                            ->icon('pencil'),

                        Link::make('Xem')
                            ->set('style', 'color: orange')
                            ->route('videos.show', $video->id)
                            ->icon('eye'),

                        Button::make('Xóa')
                            ->set('style', 'color: red')
                            ->confirm("Bạn có chắc muốn xóa?")
                            ->icon('trash')
                            ->method('delete', [
                                'id' => $video->id
                            ]),

                    ])),

        ];
    }
}
