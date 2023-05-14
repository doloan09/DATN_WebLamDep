<?php

namespace App\Orchid\Screens\Video;

use App\Models\Video;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
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
        return $this->video->title;
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Quay lại')
            ->route('videos.index')
            ->icon('refresh')
                ->set('style', 'color: white; background-color: blue; border-radius: 5px;'),

            Button::make('Xóa')
                ->icon('trash')
                ->confirm(__('Bạn có chắc muốn xóa video này không?'))
                ->method('delete')
                ->set('style', 'color: white; background-color: red; border-radius: 5px;'),
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
            Layout::view('admin.components.create-video'),

        ];
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
