<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
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
                'price' => '9.99'
            ],
            [
                'imageUrl' => asset('images/product3.jpg'),
                'title' => 'Wooden Mortar',
                'category' => 'Home Decor',
                'price' => '14.49'
            ],
            [
                'imageUrl' => asset('images/product4.jpg'),
                'title' => 'Organic Raw',
                'category' => 'Organic Food',
                'price' => '11.99'
            ],
            [
                'imageUrl' => asset('images/product5.jpg'),
                'title' => 'Blue Cushion',
                'category' => 'Home Decor',
                'price' => '8.99'
            ],
            [
                'imageUrl' => asset('images/product6.jpg'),
                'title' => 'Wooden Mortar',
                'category' => 'Home Decor',
                'price' => '14.49'
            ],
            // Add more products as needed
        ];

        

        return view('pages.shop', compact('products'));
    }
}
