<?php

namespace App\Orchid\Layouts\Playlist;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class PlaylistEditLayout extends Rows
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
        $playlist = $this->query->get('playlist');

        return [
            Input::make('id')
                ->value($playlist->id ?? "")
                ->hidden(),

            Input::make('name')
                ->title('Tên danh sách phát')
                ->value($playlist->name ?? ""),

        ];
    }
}
