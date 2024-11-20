<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;

class PageController extends Controller
{
    //Home Page
    public function index()
    {
        return view('welcome');
    }

    //Shop Page
    public function shop()
    {
        return view('pages.shop');
    }

    //Product Page
    public function productView()
    {
        
        return view('pages.product-display');
    }

    //Cart Page
    public function cartview()
    {
        return view('pages.cart');
    }

    public function checkoutview()
    {
        return view('pages.checkout');
    }

    //About Page
    public function about()
    {
        return view('pages.about');
    }

    //Dashboard
    public function dashboard()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;

            $vendors = Vendor::all();
            $users = User::all();

            $totalUsers = User::where('role', '!=', 'admin')->count();
            $totalVendors = Vendor::count();

            $categories = Category::all();


            switch ($role) {
                case 'vendor':
                    $vendor = Vendor::where('user_id', $user->id)->first();
                    if ($vendor) {
                        return view('vendor.dashboard', compact('vendor', 'categories'));
                    } else {
                        return view('welcome');
                    }
                case 'user':
                    return view('user.dashboard', compact('categories'));
                case 'admin':
                    return view('admin.dashboard', compact('totalUsers', 'users', 'vendors', 'totalVendors', 'categories'));
                default:
                    return view('welcome');
            }
        }

        return redirect()->route('login');
    }

    //Admin Test
    public function admintest()
    {
        return view('admin.test');
    }
}
