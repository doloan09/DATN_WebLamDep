<?php

namespace App\Orchid\Layouts\FolderImage;

use App\Models\FolderImage;
use Carbon\Carbon;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FolderImageListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'folders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID'),

            TD::make('name', 'Tên thư mục'),

            TD::make('created_at', 'Thời gian tạo')
                ->render(function (FolderImage $folder){
                    return Carbon::parse($folder->created_at)->format('Y-m-d H:i:s');
                }),

            TD::make('Thao tác')
                ->alignCenter()
                ->width(150)
                ->render(function (FolderImage $folder) {

                    return ModalToggle::make('Sửa')
                        ->icon('pencil')
                        ->modal('asyncEditFolderModal')
                        ->modalTitle('Thư mục ảnh')
                        ->method('save')
                        ->asyncParameters([
                            'group' => $folder->id,
                        ]);
                }),
        ];
    }
}
