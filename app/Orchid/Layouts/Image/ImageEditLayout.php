<?php

namespace App\Orchid\Layouts\Image;

use App\Models\FolderImage;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class ImageEditLayout extends Rows
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
        return [
            Select::make('folder')
                ->title('Select Folder')
                ->required()
                ->fromModel(FolderImage::class, 'name'),

            Input::make('file_name')
                ->type('file')
                ->required()
                ->multiple()
                ->title('Image'),
        ];
    }
}
