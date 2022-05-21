<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function menu()
    {
        $menu = [
            [
                'path' => '/',
                'name' => 'Главная',
            ],
            [
                'path' => '/about',
                'name' => 'О нас',
            ],
            [
                'path' => '/contacts',
                'name' => 'Контакты',
            ],
            [
                'path' => '/articles/create/page',
                'name' => 'Создать статью',
            ],
            [
                'path' => '/admin/feedback',
                'name' => 'Админ. раздел',
            ],
        ];

        return $menu;
    }
}
