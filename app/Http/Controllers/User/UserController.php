<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Add this line to import the User model
use App\Models\Vendor; // Add this line to import the Vendor model
use Illuminate\Http\Request; // Add this line to import the Request class

class UserController extends Controller
{
    public function update(ProfileUpdateRequest $request)
    {
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

    public function registerVendor(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'business_description' => 'nullable|string',
            'business_category' => 'nullable|string',
            'business_phone' => 'required|string|max:255|unique:vendors',
            'business_email' => 'required|string|email|max:255|unique:vendors',
            'business_address' => 'nullable|string',
        ]);

        $user = Auth::user();

        // Create a new Vendor entry
        $vendor = new Vendor([
            'user_id' => $user->id,
            'business_name' => $request->business_name,
            'business_description' => $request->business_description,
            'business_category' => $request->business_category,
            'business_phone' => $request->business_phone,
            'business_email' => $request->business_email,
            'business_address' => $request->business_address,
        ]);

        $vendor->save();

        // Update the user's role to 'vendor'
        $user->role = 'vendor';
        $request->user()->save();

        // Redirect to the vendor dashboard
        return redirect()->route('dashboard')->with('success', 'Vendor profile created successfully.');
    }
}
