<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function shop()
    {
        return view('pages.shop');
    }

    public function about()
    {
        return view('pages.about');
    }

    //Dashboard
    public function dashboard()
    {

        if (Auth::id()) {
            $role = Auth::user()->role;

            if ($role == 'user') {

                return view('user.dashboard');

            } else if ($role == 'admin') {

                return view('admin.dashboard');

            } else {

                return view('welcome');

            }
        }
    }

    

    //Admin Test
    public function admintest()
    {
        return view('admin.test');
    }
}
