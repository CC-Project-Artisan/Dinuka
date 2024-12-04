<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show the user details
    // public function showUsers(Request $request)
    // {
    //     $users = User::all();
    //     $vendors = Vendor::all();
    //     $totalUsers = User::count();
    //     $categories = Category::all();

    //     return view('admin.dashboard', compact('users', 'vendors', 'totalUsers', 'categories'));
    // }

    // Deactivate a user account
    public function deactivateUser(User $user)
    {
        $user->isActive = false;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User account deactivated successfully.');
    }

    // Activate a user account
    public function activateUser(User $user)
    {
        $user->isActive = true;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User account activated successfully.');
    }

    // Create a new admin user
    public function createAdmin(Request $request)
    {
        $request->validate([
            'admName' => 'required|string|max:255',
            'admEmail' => 'required|string|email|max:255|unique:users,email',
            'admPwd' => 'required|string|min:8|confirmed',
        ], [
            'admName.required' => 'The name is required.',
            'admName.string' => 'The name must be a string.',
            'admName.max' => 'The name cannot exceed 255 characters.',
            'admEmail.required' => 'The email is required.',
            'admEmail.email' => 'The email must be a valid email address.',
            'admEmail.unique' => 'This email is already taken. Please choose a different email address.',
            'admPwd.required' => 'The password is required.',
            'admPwd.string' => 'The password must be a string.',
            'admPwd.min' => 'The password must be at least 8 characters.',
        ]);

        User::create([
            'name' => $request->admName,
            'email' => $request->admEmail,
            'password' => Hash::make($request->admPwd),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.users')->with('success', 'Admin user created successfully.');
    }
}
