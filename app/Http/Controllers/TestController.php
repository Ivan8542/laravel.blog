<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\CustomAuthentificate::class);
    }

    public function index()
    {
        return 'hello';
    }
}
