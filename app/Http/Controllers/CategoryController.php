<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class CategoryController extends Controller
{
    public function __construct()
    {
        $token = Cookie::get('access_token');

        if ($token == null) {
            Session::flash('belum_login', 'Anda Belum Login');
            return redirect()->route('login');
        }
    }

    public function index()
    {
        return view('category.index');
    }
}
