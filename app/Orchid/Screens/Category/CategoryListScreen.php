<?php

namespace App\Orchid\Screens\Category;

use App\Models\Category;
use App\Models\Post;
use App\Orchid\Layouts\Category\CategoryEditLayout;
use App\Orchid\Layouts\Category\CategoryListLayout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CategoryListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'categories' => Category::query()->paginate(),

        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Danh mục';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'systems.categories',
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
                ->modal('categoryModal')
                ->modalTitle('Thêm mới danh mục')
                ->method('store')
                ->icon('plus'),

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
            CategoryListLayout::class,

            Layout::modal('asyncEditCategoryModal', CategoryEditLayout::class)
                ->async('asyncGetData')
                ->applyButton('Cập nhật'),

            Layout::modal('categoryModal', [
                CategoryEditLayout::class
            ])->applyButton('Thêm mới'),

        ];
    }

    public function asyncGetData(Category $category): iterable
    {
        return [
            'category' => $category,
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::query()->insert([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'created_at' => Carbon::now(),
        ]);

        if ($category) {
            Toast::success('Thêm mới danh mục thành công!');
        } else {
            Toast::error('Có lỗi khi thêm mới danh mục!');
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
            Category::query()->findOrFail($id);

            Category::query()->where('id', $id)->update([
                'name' => $name,
                'slug' => $slug,
            ]);

            Toast::success('Cập nhật thành công!');
        } catch (\Exception) {
            Toast::error('Lỗi khi cập nhật thông tin nhóm câu hỏi');
        }
    }

    public function delete(Request $request){
        try {
            $id = $request->get('id');
            Category::query()->findOrFail($id);

            Post::query()->where('id_category', $id)->delete();

            Category::query()->where('id', $id)->delete();
            Toast::success('Xóa thành công!');
        }catch (\Exception){
            abort(404);
        }
    }
}
