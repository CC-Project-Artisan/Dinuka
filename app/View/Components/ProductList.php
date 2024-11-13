<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductList extends Component
{
    /**
     * Create a new component instance.
     */
    // public $imageUrl;
    // public $title;
    // public $category;
    // public $price;

    // public function __construct($imageUrl, $title, $category, $price)
    // {
    //     $this->imageUrl = $imageUrl;
    //     $this->title = $title;
    //     $this->category = $category;
    //     $this->price = $price;
    // }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-list');
    }
}
