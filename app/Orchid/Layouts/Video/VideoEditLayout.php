<?php

namespace App\Orchid\Layouts\Video;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class VideoEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        $video = $this->query->get('video');

        return [
            Input::make('id')
                ->value($video->id)
                ->hidden(),

            Input::make('link_video')
                ->title('Link video')
                ->value($video->link_video)
                ->required(),

            Input::make('video_id')
                ->title('Id Video')
                ->value($video->video_id)
                ->readonly(),

            Input::make('title')
                ->title('Tiêu đề')
                ->value($video->title)
                ->readonly(),

            Input::make('public_at')
                ->title('Thời gian phát hành')
                ->value($video->public_at)
                ->readonly(),

            TextArea::make('description')
                ->title('Mô tả')
                ->rows(10)
                ->value($video->description)
                ->readonly(),

            Input::make('channel_title')
                ->title('Tên kênh')
                ->value($video->channel_title)
                ->readonly(),

        ];
    }
}
