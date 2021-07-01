<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //inserisco il 'middleware' a monte nel web.php
    public function index(){
        return view('admin.home');
    }
}
