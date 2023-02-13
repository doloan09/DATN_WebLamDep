<?php

namespace App\Orchid\Layouts\Category;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class CategoryEditLayout extends Rows
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
        $category = $this->query->get('category');

        return [
            Input::make('id')
                ->value($category->id ?? "")
                ->hidden(),

            Input::make('name')
                ->title('Tên danh mục')
                ->value($category->name ?? ""),

        ];
    }
}
