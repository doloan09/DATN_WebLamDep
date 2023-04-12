<?php

namespace App\Orchid\Screens\Video;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use App\Orchid\Layouts\Video\VideoEditLayout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class VideoEditScreeen extends Screen
{
    public Video $video;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(?int $id): iterable
    {
        try {
            $video = Video::query()->findOrFail($id);

            return [
                'video' => $video,
            ];
        } catch (\Exception) {
            abort(404);
        }
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Cập nhật thông tin';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Cập nhật')
                ->icon('check')
                ->method('update'),

            Button::make('Xóa')
                ->icon('trash')
                ->confirm(__('Bạn có chắc muốn xóa video này không?'))
                ->method('delete'),
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
            VideoEditLayout::class,

//            Layout::view('admin.components.create-video'),

        ];
    }

    /**
     * @param VideoRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VideoRequest $request)
    {
        try {
            Video::query()->findOrFail($request->get('id'));

            $update = Video::query()
                ->where('id', $request->get('id'))
                ->update([]);

            if ($update) {
                Toast::success('Cập nhật thành công!');
                return redirect()->route('videos.index');
            }
            Toast::error('Lỗi khi cập nhât!');
        } catch (\Exception) {
            return abort(404);
        }
    }

    /**
     * @param Video $video
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     *
     */
    public function delete(Video $video)
    {
        try {
            $video->delete();

            Toast::success('Xóa video thành công!');
            return redirect()->route('videos.index');
        }catch (\Exception $e){
            Toast::error('Error!');
        }
    }

}
