<?php

namespace App\Orchid\Screens\Image;

use App\Models\FolderImage;
use App\Models\Image;
use App\Orchid\Layouts\Image\ImageEditLayout;
use App\Orchid\Layouts\Image\ImageListLayout;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ImageListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'images' => Image::query()->orderByDesc('id')->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Danh sách';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Xóa')
                ->icon('close')
                ->method('delete'),

            ModalToggle::make('Thêm mới')
                ->modal('imageModal')
                ->modalTitle('Thêm mới hình ảnh')
                ->method('submit')
                ->icon('plus'),

        ];
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
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            ImageListLayout::class,

            Layout::modal('imageModal', [
                ImageEditLayout::class
            ])->applyButton('Thêm mới'),

            Layout::modal('showImage', Layout::view('admin.components.image'))
                ->async('asyncGetData')
                ->title('Hình ảnh')
                ->size(Modal::SIZE_LG)
                ->withoutApplyButton()
                ->withoutCloseButton(),
        ];
    }

    public function asyncGetData(string $image): iterable
    {
        return [
            'image' => $image,
        ];
    }

    public function submit(Request $request)
    {
        $folder = FolderImage::query()->findOrFail($request->get('folder'));

        foreach ($request->file_name as $item) {
            $resizedImage = cloudinary()->upload($item->getRealPath(), [
                'folder'         => $folder->name,
                'transformation' => [
                    'format'  => 'f_jpg',
                    'gravity' => 'faces',
                    'crop'    => 'fill',
                ]
            ])->getSecurePath();

            $date = [
                'real_name' => $item->getClientOriginalName(),
                'link'      => $resizedImage,
                'id_folder' => $folder->id,
                'status'    => 0,
            ];

            Image::query()->insert($date);
        }

//        đường dẫn đến ảnh => lưu db
//        $resizedImage = https://res.cloudinary.com/dsh5japr1/image/upload/v1672367907/Web/jhzinyuxico0elmedomb.png
        Toast::success('Thêm ảnh thành công!');
        return redirect()->route('images.index');
    }

    public function delete(Request $request){
        $list = $request->get('check');

        if ($list) {
            foreach ($list as $item) {
                $image = Image::query()->findOrFail($item);

                $token  = explode('/', $image->link);
                $token2 = explode('.', $token[sizeof($token) - 1]);

                Cloudinary::destroy($token[7] . '/' . $token2[0]); // ten folder: $token[7], ten anh: $token2[0]

                $image->delete();
            }

            Toast::success('Xóa thành công!');
            return redirect()->route('images.index');
        }else{
            Toast::error('Vui lòng chọn ảnh bạn cần xóa!');
        }
    }
}
