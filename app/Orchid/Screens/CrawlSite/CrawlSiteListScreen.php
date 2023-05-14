<?php

namespace App\Orchid\Screens\CrawlSite;

use App\Models\CrawlSite;
use App\Orchid\Layouts\CrawlSite\CrawlSiteEditLayout;
use App\Orchid\Layouts\CrawlSite\CrawlSiteListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CrawlSiteListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'crawl_sites' => CrawlSite::query()->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Danh sách các trang thu thập dữ liệu';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'systems.crawl-site',
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Thêm mới')
                ->modal('createModal')
                ->modalTitle('Thêm mới site')
                ->method('store')
                ->icon('plus')
                ->set('style', 'color: white; background-color: orange; border-radius: 5px;'),

        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            CrawlSiteListLayout::class,

            Layout::modal('createModal', [
                CrawlSiteEditLayout::class
            ])->applyButton('Thêm mới'),

        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required',
        ]);

        $crawl_site = CrawlSite::query()->create([
            'link'   => $request->get('link'),
            'status' => 0,
        ]);

        if ($crawl_site) {
            Toast::success('Thêm mới site thành công!');
        } else {
            Toast::error('Có lỗi khi thêm mới site!');
        }
    }

    public function update(Request $request)
    {
        try {
            $item = CrawlSite::query()->findOrFail($request->get('id'));

            $item->update([
                'status' => $request->get('status')
            ]);
            Toast::success('Cập nhật trạng thái thành công!');
        }catch (\Exception $exception){
            Toast::error('Not Found!');
        }
    }

    public function delete(Request $request)
    {
        try {
            $item = CrawlSite::query()->findOrFail($request->get('id'));

            $item->delete();
            Toast::success('Xóa thành công!');
        }catch (\Exception $exception){
            Toast::error('Not Found!');
        }
    }

}
