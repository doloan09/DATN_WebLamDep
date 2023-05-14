<?php

namespace App\Orchid\Layouts\FolderImage;

use App\Models\FolderImage;
use Carbon\Carbon;
use Orchid\Screen\Actions\DropDown;
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
                    return Carbon::parse($folder->created_at)->format('d-m-Y H:i:s');
                }),

            TD::make(__('Thao tác'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (FolderImage $folder) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Sửa')
                            ->icon('pencil')
                            ->set('style', 'color: blue')
                            ->modal('asyncEditFolderModal')
                            ->modalTitle('Thư mục ảnh')
                            ->method('save')
                            ->asyncParameters([
                                'group' => $folder->id,
                            ]),
                    ])),
        ];
    }
}
