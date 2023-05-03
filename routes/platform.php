<?php

declare(strict_types=1);

use App\Orchid\Screens\Category\CategoryListScreen;
use App\Orchid\Screens\FolderImage\FolderImageListScreen;
use App\Orchid\Screens\Image\ImageListScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Playlist\PlaylistListScreen;
use App\Orchid\Screens\Post\PostEditScreen;
use App\Orchid\Screens\Post\PostListScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use App\Orchid\Screens\Video\VideoCreateScreen;
use App\Orchid\Screens\Video\VideoEditScreeen;
use App\Orchid\Screens\Video\VideoListScreeen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push(__('User'), route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Role'), route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));


//// Platform > System > Categories
Route::prefix('categories')->group(function () {
    Route::screen('/', CategoryListScreen::class)
        ->name('categories.index')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('platform.index')
                ->push(__('Danh mục'), route('categories.index'));
        });

});

//// Platform > System > Posts
Route::prefix('posts')->group(function () {
    Route::screen('/', PostListScreen::class)
        ->name('posts.index')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('platform.index')
                ->push(__('Bài viết'), route('posts.index'));
        });

    Route::screen('/create', PostEditScreen::class)
        ->name('posts.create')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('posts.index')
                ->push(__('Add'), route('posts.create'));
        });

    Route::screen('/{post}/edit', PostEditScreen::class)
        ->name('posts.edit')
        ->breadcrumbs(function (Trail $trail, $post) {
            return $trail
                ->parent('posts.index')
                ->push(__('Edit'), route('posts.edit', $post));
        });
});

//// image
///
Route::prefix('images')->group(function () {
    Route::screen('/', ImageListScreen::class)
        ->name('images.index')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('platform.index')
                ->push(__('Ảnh'), route('images.index'));
        });

});

// folder cloudinary
Route::prefix('folders')->group(function () {
    Route::screen('/', FolderImageListScreen::class)
        ->name('folders.index')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('platform.index')
                ->push(__('Thư mục ảnh'), route('folders.index'));
        });

});

//// Platform > System > Videos
Route::prefix('videos')->group(function () {
    Route::screen('/', VideoListScreeen::class)
        ->name('videos.index')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('platform.index')
                ->push(__('Video'), route('videos.index'));
        });

    Route::screen('/create', VideoCreateScreen::class)
        ->name('videos.create')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('videos.index')
                ->push(__('Add'), route('videos.create'));
        });

    Route::screen('/{video}/show', VideoEditScreeen::class)
        ->name('videos.show')
        ->breadcrumbs(function (Trail $trail, $playlist) {
            return $trail
                ->parent('videos.index')
                ->push(__('Show'), route('videos.show', $playlist));
        });

    Route::screen('/{video}/edit', VideoCreateScreen::class)
        ->name('videos.edit')
        ->breadcrumbs(function (Trail $trail, $playlist) {
            return $trail
                ->parent('videos.index')
                ->push(__('Edit'), route('videos.edit', $playlist));
        });

});

/// playlist
Route::prefix('playlists')->group(function () {
    Route::screen('/', PlaylistListScreen::class)
        ->name('playlists.index')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('platform.index')
                ->push(__('Video'), route('playlists.index'));
        });

});
