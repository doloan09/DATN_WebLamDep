<?php

namespace App\Orchid\Layouts\Image;

use App\Models\FolderImage;
use App\Models\Image;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ImageListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'images';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')
                ->alignCenter()
                ->render(fn(Image $image) => $image->id),

            TD::make('Hình ảnh')
                ->alignCenter()
                ->render(fn(Image $image) => '<a href="' . $image->link . '" target="_blank"><img src=' . $image->link . ' alt="" width="150" height="85"></a>'),

            TD::make('real_name', 'Tên')
                ->filter(TD::FILTER_TEXT)
                ->render(fn(Image $image) => $image->real_name),

            TD::make('folder', 'Thư mục')
                ->alignCenter()
                ->render(function (Image $image) {
                    $folder = FolderImage::query()->findOrFail($image->id_folder);
                    return $folder->name;
                }),

            TD::make('link', 'Link')
                ->width(400)
                ->render(fn(Image $image) => '<a target="_blank" href="' . $image->link . '" style="color: blue">' . $image->link . '</a>'),

            TD::make('Thao tác')
                ->alignCenter()
                ->render(function (Image $image) {
                    return Button::make('Xóa')
                        ->method('delete', ['id' => $image->id, 'link' => $image->link])
                        ->icon('close');
                }),
        ];
    }
}
