<?php

namespace App\Orchid\Layouts\CrawlSite;

use App\Enum\CrawlSiteStatus;
use App\Models\CrawlSite;
use Carbon\Carbon;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
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
                ->render(function (CrawlSite $crawlSite) {
                    if ($crawlSite->status->is(CrawlSiteStatus::Stop)) {
                        return $crawlSite->status->description;
                    }

                    return $crawlSite->status->description;
                }),

            TD::make('Ngày tạo')
                ->render(function (CrawlSite $crawlSite) {
                    return Carbon::parse($crawlSite->created_at)->format('d-m-Y H:i:s');
                }),

            TD::make(__('Thao tác'))
                ->alignCenter()
                ->width('100px')
                ->render(fn(CrawlSite $crawlSite) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([
                        Button::make('Crawl')
                            ->set('style', 'color: green')
                            ->icon('arrow-down-circle')
                            ->method('update', ['id' => $crawlSite->id, 'status' => 1])
                            ->canSee($crawlSite->status->is(CrawlSiteStatus::Stop)),

                        Button::make('Stop')
                            ->set('style', 'color: orange')
                            ->icon('ban')
                            ->method('update', ['id' => $crawlSite->id, 'status' => 0])
                            ->canSee($crawlSite->status->is(CrawlSiteStatus::Crawl)),

                        Button::make('Xóa')
                            ->set('style', 'color: red')
                            ->confirm("Bạn có chắc muốn xóa?")
                            ->icon('trash')
                            ->method('delete', ['id' => $crawlSite->id]),

                    ])),

        ];
    }
}
