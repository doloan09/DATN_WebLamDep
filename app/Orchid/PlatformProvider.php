<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make(__('Người dùng'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access rights')),

            Menu::make(__('Vai trò'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),

            Menu::make('Danh mục')
                ->icon('list')
                ->route('categories.index')
                ->permission('systems.categories'),

            Menu::make('Bài viết')
                ->icon('notebook')
                ->route('posts.index')
                ->permission('systems.posts'),

            Menu::make('Hình ảnh')
                ->icon('picture')
                ->list([
                    Menu::make('Thư mục')
                        ->icon('options')
                        ->route('folders.index')
                        ->permission('systems.images'),

                    Menu::make('Hình ảnh')
                        ->icon('options')
                        ->route('images.index')
                        ->permission('systems.images'),

                ])
                ->permission('systems.images'),

        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make(__('Profile'))
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users'))
                ->addPermission('systems.categories', 'Danh mục')
                ->addPermission('systems.posts', 'Bài viết')
                ->addPermission('systems.images', 'Hình ảnh'),

        ];
    }
}
