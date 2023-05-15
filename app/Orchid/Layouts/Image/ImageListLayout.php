<?php

namespace App\Orchid\Layouts\Image;

use App\Models\FolderImage;
use App\Models\Image;
use Orchid\Screen\Fields\CheckBox;
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
                ->width(60)
                ->render(fn(Image $image) => $image->id),

            TD::make()
                ->width(20)
                ->render(function (Image $image) {
                    return
                        CheckBox::make('check[]')
                            ->name('check[]')
                            ->value($image->id)
                            ->checked(false);
                }),

            TD::make('Hình ảnh')
                ->width(200)
                ->alignCenter()
                ->render(fn(Image $image) => '<a href="' . $image->link . '" target="_blank"><img src=' . $image->link . ' alt="" style="width: 100%; max-height: 150px; object-fit: cover;"></a>'),

            TD::make('real_name', 'Tên')
                ->render(fn(Image $image) => $image->real_name),

            TD::make('folder', 'Thư mục')
                ->render(function (Image $image) {
                    $folder = FolderImage::query()->findOrFail($image->id_folder);
                    return $folder->name;
                }),

            TD::make('link', 'Link')
                ->render(fn(Image $image) => '<a target="_blank" href="' . $image->link . '" style="color: blue">' . $image->link . '</a>'),

        ];
    }
}
