<?php

namespace App\Orchid\Screens\Video;

use App\Models\Video;
use App\Orchid\Layouts\Video\VideoFilterLayout;
use App\Orchid\Layouts\Video\VideoListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class VideoListScreeen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'videos' => Video::query()
                ->filters(VideoFilterLayout::class)
                ->orderByDesc('created_at')
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Danh sách video';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'systems.videos',
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
            Link::make('Thêm mới')
                ->icon('plus')
                ->route('videos.create'),

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
            VideoFilterLayout::class,

            VideoListLayout::class,

        ];
    }

    public function delete(Request $request)
    {
        try {
            $item = Video::query()->find($request->get('id'));

            $delete = $item->delete();

            if ($delete) {
                Toast::success('Đã xóa thành công video : ' . $item->title);
            } else {
                Toast::error('Có lỗi khi xóa video : ' . $item->title);
            }
        }catch (\Exception $e){
            Toast::error('Not found!');
        }
    }

}
