<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Album;

class StaticPagesController extends Controller
{
    //首页
    public function home(){
        //获取全部相册
        $albums = Album::all();

        //返回
        return view('home', compact('albums'));
    }
}
