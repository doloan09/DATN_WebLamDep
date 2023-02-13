<?php

namespace App\Orchid\Screens\Post;

use App\Models\Post;
use App\Orchid\Layouts\Post\PostEditLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Toast;

class PostEditScreen extends Screen
{
    public $posts;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Post $posts): iterable
    {
        return [
            'posts' => $posts
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->posts->exists ? 'Edit Posts' : 'Create Posts';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),

            Button::make(__('Remove'))
                ->icon('trash')
                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                ->method('remove')
                ->canSee($this->posts->exists),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PostEditLayout::class
        ];
    }

    /**
     * @param Post    $category
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Post $posts, Request $request)
    {
        $request->validate([
            'posts.tittle' => [
                'required',
                Rule::unique(Post::class, 'tittle')->ignore($posts),
            ],
            'posts.contents' => ['required'],
            'posts.description' => ['required'],
            'posts.date' => ['required'],
        ]);

        $posts->fill($request->collect('posts')->toArray())->save();

        Toast::info(__('Posts was saved.'));

        return redirect()->route('platform.systems.posts');
    }

    /**
     * @param Post $posts
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Post $posts)
    {
        $posts->delete();

        Alert::success(__('Posts was removed'));
        return redirect()->route('platform.systems.posts');
    }

}
