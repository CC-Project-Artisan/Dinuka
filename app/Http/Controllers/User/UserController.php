<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Add this line to import the User model

class UserController extends Controller
{
    public function update(ProfileUpdateRequest $request) {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $request->user()->save();

        // return redirect()->back()->with('success', 'Profile updated successfully.');
        // return response()->json(['success' => true]);
        return response()->json([
            'success' => true,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('d M Y'),
            ]
        ]);
    }
}
