<?php
namespace App\Orchid\Screens;

use Illuminate\Contracts\View\Factory;
use Orchid\Screen\Screen;

abstract class BaseScreen extends Screen
{
    protected bool $useTurbo = true;

    /**
     * The view rendered
     *
     * @return string
     */
    protected function screenBaseView(): string
    {
        return 'admin.layouts.base';
    }

    /**
     * @param array $httpQueryArguments
     *
     * @throws \Throwable
     *
     * @return Factory|\Illuminate\View\View
     */
    public function view(array $httpQueryArguments = [])
    {
        $repository = $this->buildQueryRepository($httpQueryArguments);

        return view($this->screenBaseView(), [
            'name'                => $this->name(),
            'description'         => $this->description(),
            'commandBar'          => $this->buildCommandBar($repository),
            'layouts'             => $this->build($repository),
            'formValidateMessage' => $this->formValidateMessage(),
            'useTurbo'            => $this->useTurbo,
        ]);
    }
}
