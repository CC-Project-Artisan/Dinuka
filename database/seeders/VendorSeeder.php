<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a vendor user
        $vendorUserId = DB::table('users')->insertGetId([
            'name' => 'Vendor User',
            'email' => 'vendor@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '1234567890',
            'role' => 'vendor', // Set the role as 'vendor'
            'isActive' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create the vendor profile
        DB::table('vendors')->insert([
            'user_id' => $vendorUserId,
            'business_name' => 'Vendor Business Name',
            'business_description' => 'Description of the vendor business',
            'business_category' => 'Arts & Crafts',
            'business_phone' => '9876543210',
            'business_email' => 'vendor@gmail.com',
            'business_address' => '123 Vendor Street',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
