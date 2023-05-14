<?php

namespace App\Orchid\Screens\Playlist;

use App\Models\Playlist;
use App\Models\Video;
use App\Orchid\Layouts\Playlist\PlaylistEditLayout;
use App\Orchid\Layouts\Playlist\PlaylistListLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PlaylistListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'playlists' => Playlist::query()->paginate(),
        ];
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
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Danh sách phát';
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
                ->modal('playlistModal')
                ->modalTitle('Thêm mới danh sách phát')
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
            PlaylistListLayout::class,

            Layout::modal('asyncEditPlaylistModal', PlaylistEditLayout::class)
                ->async('asyncGetData')
                ->applyButton('Cập nhật'),

            Layout::modal('playlistModal', [
                PlaylistEditLayout::class
            ])->applyButton('Thêm mới'),
        ];
    }

    public function asyncGetData(Playlist $playlist): iterable
    {
        return [
            'playlist' => $playlist,
        ];
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $playlist = Playlist::query()->create([
                'name' => $request->get('name'),
                'slug' => Str::slug($request->get('name')),
            ]);

            if ($playlist) {
                Toast::success('Thêm mới danh sách phát thành công!');
            } else {
                Toast::error('Có lỗi khi thêm mới danh sách phát!');
            }
        } catch (\Exception $exception){
            Toast::error('Đã tồn tại danh sách phát này rồi! Bạn không thể thêm mới!');
        }
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $id   = $request->get('id');
        $name = $request->get('name');
        $slug = Str::slug($request->get('name'));

        try {
            Playlist::query()->findOrFail($id);

            Playlist::query()->where('id', $id)->update([
                'name' => $name,
                'slug' => $slug,
            ]);

            Toast::success('Cập nhật thành công!');
        } catch (\Exception) {
            Toast::error('Lỗi khi cập nhật thông tin danh sách phát');
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            Playlist::query()->findOrFail($id);

            Video::query()->where('id_playlist', $id)->delete();

            Playlist::query()->where('id', $id)->delete();
            Toast::success('Xóa thành công!');
        } catch (\Exception) {
            abort(404);
        }
    }
}
