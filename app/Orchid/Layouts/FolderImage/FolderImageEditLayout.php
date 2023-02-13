<?php

namespace App\Orchid\Layouts\FolderImage;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class FolderImageEditLayout extends Rows
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
        $folder = $this->query->get('folder');

        return [
            Input::make('id')
                ->value($folder->id ?? "")
                ->hidden(),

            Input::make('name')
                ->title('Tên thư mục')
                ->value($folder->name ?? ""),

        ];
    }
}
