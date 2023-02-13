<?php

namespace App\Orchid\Layouts\Category;

use App\Models\Category;
use Carbon\Carbon;
use Orchid\Screen\Actions\Button;
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

            TD::make('created_at', 'Thời gian tạo')
                ->render(function (Category $category){
                    return Carbon::parse($category->created_at)->format('Y-m-d H:i:s');
                }),

            TD::make('Thao tác')
                ->alignCenter()
                ->width(150)
                ->render(function (Category $category) {

                    return ModalToggle::make('Sửa')
                        ->icon('pencil')
                        ->modal('asyncEditCategoryModal')
                        ->modalTitle('Danh mục')
                        ->method('save')
                        ->asyncParameters([
                            'group' => $category->id,
                        ]);
                }),

            TD::make()
                ->width(150)
                ->alignCenter()
                ->render(function (Category $category) {
                    return Button::make('Xóa')
                        ->confirm('Nếu bạn xóa danh mục này, tất cả bài viết thuộc danh mục này sẽ đồng thời bi xóa!')
                        ->method('delete', ['id' => $category->id])
                        ->icon('close');
                }),

        ];
    }
}
