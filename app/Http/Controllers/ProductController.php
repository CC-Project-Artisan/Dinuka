<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ProductController extends Controller
{
    //Create a new product listing
    public function index()
    {
        $categories = Category::all();
        return view('pages.create-listing-form', compact('categories'));
    }

    public function showProducts()
    {
        
        $products = Product::with('category')->get();
        return view('pages.shop', compact('products'));
       
        


    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('pages.product-display', compact('product'));
        return view('pages.product-info', compact('product'));
    }
   

  


    //Store the new product listing
    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required|string|max:255',
            'productDescription' => 'required|string',
            'productPrice' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', // Match category_id
            'productQuantity' => 'required|integer|min:1',
            'weight' => 'nullable|numeric|min:0', // Nullable for weight
            'dimensions' => 'nullable|string|max:255',
            'productImages.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
        ]);

        $imageNames = [];
        if ($request->hasFile('productImages')) {
            foreach ($request->file('productImages') as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imageNames[] = $imageName;
            }
        }

        Product::create([
            'user_id' => Auth::user()->id,
            'productName' => $request->productName,
            'productDescription' => $request->productDescription,
            'productPrice' => $request->productPrice,
            'category_id' => $request->category_id,
            'productQuantity' => $request->productQuantity,
            'productImages' => json_encode($imageNames), // Store as JSON
            'weight' => $request->weight,
            'dimensions' => $request->dimensions,
        ]);

        return redirect()->route('dashboard')->with('success', 'Product created successfully.');
    }
}
