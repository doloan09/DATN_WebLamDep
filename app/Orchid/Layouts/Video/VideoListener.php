<?php

namespace App\Orchid\Layouts\Video;

use App\Models\Playlist;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Listener;
use Orchid\Support\Facades\Layout;

class VideoListener extends Listener
{
    /**
     * List of field names for which values will be joined with targets' upon trigger.
     *
     * @var string[]
     */
    protected $extraVars = [];

    /**
     * List of field names for which values will be listened.
     *
     * @var string[]
     */
    protected $targets = [
        'link_video',

    ];

    /**
     * What screen method should be called
     * as a source for an asynchronous request.
     *
     * The name of the method must
     * begin with the prefix "async"
     *
     * @var string
     */
    protected $asyncMethod = 'getData';

    /**
     * @return Layout[]
     */
    protected function layouts(): iterable
    {
        $info  = $this->query->get('info');

        return [
            Layout::rows([
                Input::make('id')
                    ->value($info['id'] ?? '')
                    ->hidden(),

                Input::make('link_video')
                    ->title('Link Video')
                    ->value($info['link_video'] ?? '')
                    ->required(),

                Select::make('id_playlist')
                    ->fromModel(Playlist::class, 'name')
                    ->title('Danh sách phát')
                    ->value($info['id_playlist'] ?? -1)
                    ->empty('Chọn danh sách phát', -1)
                    ->required(),

                Input::make('title')
                    ->title('Tiêu đề')
                    ->value($info['title'] ?? ''),

                Input::make('slug')
                    ->title('Slug')
                    ->value($info['slug'] ?? ''),

                Input::make('video_id')
                    ->title('Video ID')
                    ->value($info['video_id'] ?? ''),

                Input::make('public_at')
                    ->title('Thời gian phát hành')
                    ->value($info['public_at'] ?? ''),

                TextArea::make('description')
                    ->title('Mô tả')
                    ->rows(15)
                    ->value($info['description'] ?? ''),

                Input::make('channel_id')
                    ->title('Channel Id')
                    ->value($info['channel_id'] ?? ''),

                Input::make('channel_title')
                    ->title('Kênh')
                    ->value($info['channel_title'] ?? ''),

                Input::make('duration')
                    ->title('Thời lượng phát')
                    ->value($info['duration'] ?? ''),

                Input::make('view_count')
                    ->title('Lượt xem')
                    ->value($info['view_count'] ?? ''),

                Input::make('like_count')
                    ->title('Lượt thích')
                    ->value($info['like_count'] ?? ''),

                Input::make('dislike_count')
                    ->title('Lượt không thích')
                    ->value($info['dislike_count'] ?? ''),

                Input::make('comment_count')
                    ->title('Lượt comment')
                    ->value($info['comment_count'] ?? ''),

                Input::make('privacy_status')
                    ->value($info['privacy_status'] ?? '')
                    ->hidden(),

                Input::make('thumbnail')
                    ->value($info['thumbnail'] ?? '')
                    ->hidden(),

                Input::make('embed_html')
                    ->value($info['embed_html'] ?? '')
                    ->hidden(),

            ]),
        ];
    }

}
