<?php

namespace App\Orchid\Layouts\Category;

use App\Models\Category;
use Carbon\Carbon;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'categories';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID'),

            TD::make('name', 'Tên danh mục'),

            TD::make('slug', 'Slug'),

            TD::make('created_at', 'Thời gian tạo')
                ->render(function (Category $category){
                    return Carbon::parse($category->created_at)->format('d-m-Y H:i:s');
                }),

            TD::make(__('Thao tác'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Category $category) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Sửa')
                            ->icon('pencil')
                            ->set('style', 'color: blue')
                            ->modal('asyncEditCategoryModal')
                            ->modalTitle('Danh mục')
                            ->method('save')
                            ->asyncParameters([
                                'group' => $category->id,
                            ]),

                        Button::make('Xóa')
                            ->set('style', 'color: red')
                            ->confirm('Nếu bạn xóa danh mục này, tất cả bài viết thuộc danh mục này sẽ đồng thời bi xóa!')
                            ->method('delete', ['id' => $category->id])
                            ->icon('trash'),
                    ])),
        ];
    }
}
