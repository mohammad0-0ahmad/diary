<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\Traits\GetDiaries;
use Illuminate\Support\Facades\Auth;

class HomeController extends DiaryController
{
    use GetDiaries;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('welcome');
        } else {
            $diaries = $this->getCurrentUserDiaries()->getData();
            return view('home', ["diaries" => $diaries]);
        }
    }
}