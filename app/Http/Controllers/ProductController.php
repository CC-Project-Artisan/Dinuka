<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($products)
    {
        $products = [
            [
                'imageUrl' => asset('images/product1.jpg'),
                'title' => 'Organic Raw',
                'category' => 'Organic Food',
                'price' => '11.99'
            ],
            [
                'imageUrl' => asset('images/product2.jpg'),
                'title' => 'Blue Cushion',
                'category' => 'Home Decor',
                'price' => '8.99'
            ],
            [
                'imageUrl' => asset('images/product3.jpg'),
                'title' => 'Wooden Mortar',
                'category' => 'Home Decor',
                'price' => '14.49'
            ],
            [
                'imageUrl' => asset('images/product4.jpg'),
                'title' => 'Knitted Mittens',
                'category' => 'Clothing Accessories',
                'price' => '9.99'
            ],
            [
                'imageUrl' => asset('images/product5.jpg'),
                'title' => 'Wooden Dog Toy',
                'category' => 'Wooden Toys',
                'price' => '19.99'
            ],
        ];

        // Pass the product data to the view
        return view('pages.shop', compact('products'));
    }
}
