<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class MypageController extends Controller
{
    public function index()
    {
        return view('mypage');
    }
}
