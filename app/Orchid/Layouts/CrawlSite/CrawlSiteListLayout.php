<?php

namespace App\Orchid\Layouts\CrawlSite;

use App\Enum\CrawlSiteStatus;
use App\Models\CrawlSite;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CrawlSiteListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'crawl_sites';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width(50),

            TD::make('link', 'Link')->width(500),

            TD::make('status', 'Trạng thái')
                ->width(100)
                ->render(function (CrawlSite $post) {
                    if ($post->status->is(CrawlSiteStatus::Stop)) {
                        return $post->status->description;
                    }

                    return $post->status->description;
                }),

            TD::make('Thao tác')
                ->width(30)
                ->render(function (CrawlSite $post) {
                    if ($post->status->is(CrawlSiteStatus::Stop)) {
                        return Button::make('Crawl')
                            ->icon('arrow-down-circle')
                            ->method('update', ['id' => $post->id, 'status' => 1]);
                    }

                    return Button::make('Stop')
                        ->icon('ban')
                        ->method('update', ['id' => $post->id, 'status' => 0]);
                }),

            TD::make()
                ->width(30)
                ->render(function (CrawlSite $post) {
                    return Button::make('Xóa')
                        ->confirm("Bạn có chắc muốn xóa?")
                        ->icon('close')
                        ->method('delete', ['id' => $post->id]);

                }),

        ];
    }
}
