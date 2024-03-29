<?php

namespace App\Orchid\Screens\FolderImage;

use App\Models\FolderImage;
use App\Models\Image;
use App\Orchid\Layouts\FolderImage\FolderImageEditLayout;
use App\Orchid\Layouts\FolderImage\FolderImageListLayout;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class FolderImageListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'folders' => FolderImage::query()->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Thư mục ảnh';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'systems.images',
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
                ->modal('folderModal')
                ->modalTitle('Thêm mới thư mục')
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
            FolderImageListLayout::class,

            Layout::modal('asyncEditFolderModal', FolderImageEditLayout::class)
                ->async('asyncGetData')
                ->applyButton('Cập nhật'),

            Layout::modal('folderModal', [
                FolderImageEditLayout::class
            ])->applyButton('Thêm mới'),

        ];
    }

    public function asyncGetData(FolderImage $folder): iterable
    {
        return [
            'folder' => $folder,
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $group = FolderImage::query()->insert([
            'name'       => $request->get('name'),
            'created_at' => Carbon::now(),
        ]);

        if ($group) {
            Toast::success('Thêm mới thư mục thành công!');
        } else {
            Toast::error('Có lỗi khi thêm mới thư mục!');
        }
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $id   = $request->get('id');
        $name = $request->get('name');

        try {
            FolderImage::query()->findOrFail($id);

            FolderImage::query()->where('id', $id)->update(['name' => $name]);
            Toast::success('Cập nhật thành công!');
        } catch (\Exception) {
            Toast::error('Lỗi khi cập nhật thông tin nhóm câu hỏi');
        }
    }

    public function delete(Request $request)
    {
        try {
            $list_image = Image::query()->where('id_folder', $request->get('id'))->get();

            foreach ($list_image as $item) {
                $token  = explode('/', $item->link);
                $token2 = explode('.', $token[sizeof($token) - 1]);

                Cloudinary::destroy($token[7] . '/' . $token2[0]); // ten folder: $token[7], ten anh: $token2[0]
                $item->delete();
            }

            FolderImage::query()->findOrFail($request->get('id'))->delete();
            Toast::success('Xóa thư mục thành công!');
        } catch (\Exception $exception) {
            Toast::error('Xảy ra lỗi khi xóa thư mục hình ảnh!');
        }
    }

}
