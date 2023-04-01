<?php

namespace App\Orchid\Layouts\Image;

use App\Models\FolderImage;
use App\Orchid\Filters\SelectFilter;
use App\Orchid\Filters\TextFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class ImageFilterLayout extends Selection
{
    public $template = self::TEMPLATE_LINE;
    /**
     * @return Filter[]
     */
    public function filters(): iterable
    {
        $folders = FolderImage::query()->get();
        $list = [];

        foreach ($folders as $folder){
            $list[$folder->id] = $folder->name;
        }

        return [
            SelectFilter::make('id_folder', 'Thư mục', $list),
            TextFilter::make('real_name', 'Tên hình ảnh', 'like'),
        ];
    }
}
