<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use App\Models\ExhibitionContact;
use App\Models\ExhibitionEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ExhibitionController extends Controller
{
    public function create(Request $request)
    {
        $layout = $request->input('layout', 'layout1');
        return view('exhibition.exhibition-form', compact('layout'));
    }

    public function store(Request $request)
    {
        $messages = [
            'exhibition_name.required' => 'Exhibition name is required',
            'exhibition_description.required' => 'Exhibition description is required',
            'exhibition_date.required' => 'Exhibition date is required',
            'exhibition_date.date' => 'Please enter a valid date',
            'start_time.required' => 'Start time is required',
            'start_time.date_format' => 'Please enter a valid time format',
            'end_time.required' => 'End time is required',
            'end_time.date_format' => 'Please enter a valid time format',
            'exhibition_location.required' => 'Exhibition location is required',
            'organization_name.required' => 'Organization name is required',
            'category_name.required' => 'Category name is required',
            'exhibitionBanner.*.required' => 'Exhibition banner is required',
            'exhibitionBanner.*.image' => 'File must be an image',
            'exhibitionBanner.*.mimes' => 'Image must be jpeg, png, jpg, gif, or svg',
            'exhibitionBanner.*.max' => 'Image size must not exceed 2MB',
            'email1.required' => 'At least one email address is required',
            'email1.email' => 'Please enter a valid email address',
        ];

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'exhibition_name' => 'required|string|max:255',
            'exhibition_description' => 'required|string',
            'exhibition_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'exhibition_location' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'registration_start_date' => 'nullable|date',
            'registration_end_date' => 'nullable|date',
            'max_exhibitors' => 'nullable|integer',
            'vendor_entrance_fee' => 'nullable|integer',
            'regular_price' => 'nullable|integer',
            'student_price' => 'nullable|integer',
            'child_price' => 'nullable|integer',
            'exhibitionBanner.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'email-count' => 'nullable|integer|min:1|max:3',
            'email1' => 'required|email',
            'contact_name2' => 'nullable|string|max:255',
            'contact_telephone2' => 'nullable|string|max:255',
            'email2' => 'nullable|email',
            'contact_name3' => 'nullable|string|max:255',
            'contact_telephone3' => 'nullable|string|max:255',
            'email3' => 'nullable|email',

            'layout' => 'nullable|string|in:layout1,layout2,layout3',
            'social-media-checkboxes' => 'nullable|array',
            'social-media-checkboxes.*' => 'nullable|string|in:facebook,instagram,tiktok,youtube,other',

            // Social Media URLs
            'facebook-url' => 'nullable|url|required_if:social-media-checkboxes,facebook',
            'instagram-url' => 'nullable|url|required_if:social-media-checkboxes,instagram',
            'tiktok-url' => 'nullable|url|required_if:social-media-checkboxes,tiktok',
            'youtube-url' => 'nullable|url|required_if:social-media-checkboxes,youtube',
            'other-url' => 'nullable|url|required_if:social-media-checkboxes,other',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422); // Unprocessable Entity
        }

        try {
            // Handle image uploads
            $imageNames = [];
            if ($request->hasFile('exhibitionBanner')) {
                foreach ($request->file('exhibitionBanner') as $image) {
                    $imageName = time() . '-' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageName);
                    $imageNames[] = $imageName;
                }
            }

            // Handle Social Media Links
            $socialMediaLinks = [];
            $socialMediaPlatforms = $request->input('social-media-checkboxes', []);
            foreach ($socialMediaPlatforms as $platform) {
                $urlKey = "{$platform}-url";
                $url = $request->input($urlKey);
                if ($url) {
                    $socialMediaLinks[$platform] = $url;
                }
            }

            // Create the exhibition
            $exhibition = Exhibition::create([
                'user_id' => Auth::id(),
                'exhibition_name' => $request->input('exhibition_name'),
                'exhibition_description' => $request->input('exhibition_description'),
                'exhibition_date' => $request->input('exhibition_date'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'exhibition_location' => $request->input('exhibition_location'),
                'organization_name' => $request->input('organization_name'),
                'category_name' => $request->input('category_name'),
                'exhibitionBanner' => json_encode($imageNames),
                'registration_start_date' => $request->input('registration_start_date'),
                'registration_end_date' => $request->input('registration_end_date'),
                'max_exhibitors' => $request->input('max_exhibitors'),
                'vendor_entrance_fee' => $request->input('vendor_entrance_fee'),
                'regular_price' => $request->input('regular_price'),
                'student_price' => $request->input('student_price'),
                'child_price' => $request->input('child_price'),
                'social_media_links' => json_encode($socialMediaLinks),
                'layout' => $request->input('layout', 'layout1'),
                'status' => 'pending', // Default status
            ]);

            // Save contacts
            $contactCount = $request->input('contact-count', 0);
            for ($i = 1; $i <= $contactCount; $i++) {
                if ($request->filled("contact_name$i") && $request->filled("contact_telephone$i")) {
                    ExhibitionContact::create([
                        'exhibition_id' => $exhibition->id,
                        'name' => $request->input("contact_name$i"),
                        'telephone' => $request->input("contact_telephone$i"),
                    ]);
                }
            }

            // Save emails
            $emailCount = $request->input('email-count', 0);
            for ($i = 1; $i <= $emailCount; $i++) {
                if ($request->filled("email$i")) {
                    ExhibitionEmail::create([
                        'exhibition_id' => $exhibition->id,
                        'email' => $request->input("email$i"),
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Exhibition created successfully!'
            ]);

        } catch (\Exception $e) {
            Log::error('Exhibition creation failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'There was an error submitting your application.'
            ], 500); // Internal Server Error
        }
    }
}