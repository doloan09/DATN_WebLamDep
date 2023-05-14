<?php

namespace App\Orchid\Layouts\Playlist;

use App\Models\Playlist;
use Carbon\Carbon;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
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
                    return Carbon::parse($playlist->created_at)->format('d-m-Y H:i:s');
                }),

            TD::make(__('Thao tác'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Playlist $playlist) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Sửa')
                            ->icon('pencil')
                            ->set('style', 'color: blue')
                            ->modal('asyncEditPlaylistModal')
                            ->modalTitle('Danh sách phát')
                            ->method('save')
                            ->asyncParameters([
                                'playlist' => $playlist->id,
                            ]),

                        Button::make('Xóa')
                            ->set('style', 'color: red')
                            ->confirm('Nếu bạn xóa danh sách phát này, tất cả video thuộc danh sách phát này sẽ đồng thời bi xóa!')
                            ->method('delete', ['id' => $playlist->id])
                            ->icon('trash')

                    ])),
        ];
    }
}
