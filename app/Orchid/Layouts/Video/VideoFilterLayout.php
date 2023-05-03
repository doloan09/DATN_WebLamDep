<?php

namespace App\Orchid\Layouts\Video;

use App\Models\Playlist;
use App\Orchid\Filters\SelectFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class VideoFilterLayout extends Selection
{
    public $template = self::TEMPLATE_LINE;

    /**
     * @return Filter[]
     */
    public function filters(): iterable
    {
        $playlists = Playlist::query()->get();
        $list = [];

        foreach ($playlists as $item){
            $list[$item->id] = $item->name;
        }

        return [
            SelectFilter::make('id_playlist', 'Danh sách phát', $list),
        ];
    }
}
