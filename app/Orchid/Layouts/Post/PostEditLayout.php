<?php

namespace App\Orchid\Layouts\Post;

use App\Models\Category;
use App\Orchid\Fields\RichTextBox;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class PostEditLayout extends Rows
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
        $edit = intval($this->query->get('edit'));

        return [
            Input::make('id')
                ->value($post->id ?? "")
                ->hidden(),

            Select::make('id_category')
                ->fromModel(Category::class, 'name')
                ->value($post->id_category ?? -1)
                ->title('Danh mục'),

            Input::make('title')
                ->title('Tiêu đề')
                ->value($post->title ?? "")
                ->required(),

            Input::make('description')
                ->title('Mô tả')
                ->value($post->description ?? ""),

            Input::make('link_image')
                ->title('Hình nền')
                ->type('file')
                ->required()
                ->canSee($edit == 0),

            RichTextBox::make('content')
                ->title('Nội dung')
                ->value($post->content ?? "")
                ->required(),

        ];
    }
}
