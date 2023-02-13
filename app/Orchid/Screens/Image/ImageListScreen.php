<?php

namespace App\Orchid\Screens\Image;

use App\Models\FolderImage;
use App\Models\Image;
use App\Orchid\Layouts\Image\ImageEditLayout;
use App\Orchid\Layouts\Image\ImageListLayout;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
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
            'images' => Image::query()->paginate(),
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
            ModalToggle::make('Thêm mới')
                ->modal('imageModal')
                ->modalTitle('Thêm mới thư mục')
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
        ];
    }

    public function submit(Request $request)
    {
        $folder = FolderImage::query()->findOrFail($request->get('folder'));

        foreach ($request->file_name as $item) {
            $resizedImage = cloudinary()->upload($item->getRealPath(), [
                'folder'         => $folder->name,
                'transformation' => [
//                    'width'   => 250,
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

    public function delete(int $id, string $link)
    {
        $token  = explode('/', $link);
        $token2 = explode('.', $token[sizeof($token) - 1]);

        Cloudinary::destroy($token[7] . '/' . $token2[0]); // ten folder: $token[7], ten anh: $token2[0]

        Image::query()->where('id', $id)->delete();

        Toast::success('Success');
        return redirect()->route('images.index');
    }

}
