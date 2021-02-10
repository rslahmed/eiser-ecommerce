<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Shop extends Component
{
    public $products;
    public $categories;
    public $brands;

    public $filterCategory;
    public $filterBrand;
    public $filterOrder;
    public $filterRow;
    public $filterLowPrice;
    public $filterHighPrice;

    public function render()
    {
        return view('livewire.shop');
    }

    public function mount()
    {
        $this->getProducts();
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }

    public function updated(){
        $this->getProducts();
    }

    public function getProducts(){
        $this->products = Product::where(function ($q) {
                if ($this->filterCategory) {
                    $q->where('id', 1);
                }
            })
            ->inRandomOrder()
            ->take(6)
            ->get();
    }
}
