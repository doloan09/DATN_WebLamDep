<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Trang quản trị hệ thống';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Chào mừng bạn đến với trang quản trị Amara.store';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Website')
                ->href('http://weblamdep-lan.com/')
                ->icon('globe-alt'),

            Link::make('Youtube')
                ->href('https://www.youtube.com/@lanchamlam')
                ->icon('social-youtube'),

            Link::make('Shoppe')
                ->href('https://shopee.vn/amara.storee')
                ->icon('basket'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::view('admin.layouts.welcome'),
        ];
    }
}
