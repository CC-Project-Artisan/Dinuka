<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Painting',
                'description' => 'All forms of painting, including oil, watercolor, and acrylic.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sculpture',
                'description' => 'Artistic creations involving carving, casting, or molding materials.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jewelry',
                'description' => 'Handmade and unique jewelry pieces.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Textiles',
                'description' => 'Creative works in fabric, including weaving, embroidery, and quilting.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pottery',
                'description' => 'Clay and ceramic art, from functional pieces to artistic expressions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
