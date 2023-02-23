<?php

namespace App\Orchid\Layouts\Post;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class ImagePostEditLayout extends Rows
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
        $post = $this->query->get('post');

        return [
            Input::make('id')
                ->hidden()
                ->value($post->id ?? ''),

            Input::make('id_category')
                ->hidden()
                ->value($post->id_category ?? ''),

            Input::make('link_image')
                ->hidden()
                ->value($post->link_image ?? ''),

            Input::make('file_name')
                ->type('file')
                ->required()
                ->title('Image'),
        ];
    }
}
