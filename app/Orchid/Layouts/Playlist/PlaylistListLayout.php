<?php

namespace App\Orchid\Layouts\Playlist;

use App\Models\Playlist;
use Carbon\Carbon;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PlaylistListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'playlists';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID'),

            TD::make('name', 'Tên danh sách phát'),

            TD::make('slug', 'Slug'),

            TD::make('created_at', 'Thời gian tạo')
                ->render(function (Playlist $playlist){
                    return Carbon::parse($playlist->created_at)->format('Y-m-d H:i:s');
                }),

            TD::make('Thao tác')
                ->alignCenter()
                ->width(150)
                ->render(function (Playlist $playlist) {
                    return ModalToggle::make('Sửa')
                        ->icon('pencil')
                        ->modal('asyncEditPlaylistModal')
                        ->modalTitle('Danh sách phát')
                        ->method('save')
                        ->asyncParameters([
                            'playlist' => $playlist->id,
                        ]);
                }),

            TD::make()
                ->width(150)
                ->alignCenter()
                ->render(function (Playlist $playlist) {
                    return Button::make('Xóa')
                        ->confirm('Nếu bạn xóa danh sách phát này, tất cả video thuộc danh sách phát này sẽ đồng thời bi xóa!')
                        ->method('delete', ['id' => $playlist->id])
                        ->icon('close');
                }),
        ];
    }
}
