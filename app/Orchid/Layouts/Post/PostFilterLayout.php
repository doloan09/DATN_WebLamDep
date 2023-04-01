<?php

namespace App\Orchid\Layouts\Post;

use App\Enum\PostStatus;
use App\Models\Category;
use App\Orchid\Filters\SelectFilter;
use App\Orchid\Filters\TextFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class PostFilterLayout extends Selection
{
    public $template = self::TEMPLATE_LINE;
    /**
     * @return Filter[]
     */
    public function filters(): iterable
    {
        $categories = Category::query()->get();
        $list = [];

        foreach ($categories as $item){
            $list[$item->id] = $item->name;
        }

        return [
            SelectFilter::make('id_category', 'Danh mục', $list),
            SelectFilter::make('status', 'Trạng thái', PostStatus::asSelectArray()),
            TextFilter::make('title', 'Tiêu đề', 'like'),
        ];
    }
}
