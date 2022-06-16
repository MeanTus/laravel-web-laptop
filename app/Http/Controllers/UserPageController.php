<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CPU;
use App\Models\GPU;
use App\Models\Product;
use App\Models\Ram;
use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function shopPage()
    {
        $list_product = Product::query()
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->select(
                '*',
                'products.name as product_name',
                'products.id as product_id',
                'products.avatar as product_avatar',
                'suppliers.name as supplier_name'
            )
            ->get();

        $brand = Brand::query()->get();
        $category = Category::query()->get();
        return view('userpage.shop', [
            'list_product' => $list_product,
            'brands' => $brand,
            'categories' => $category,
        ]);
    }

    public function showDetailProduct(Product $product)
    {
        $brand = Brand::query()->where('id', $product->brand_id)->get();
        $ram = Ram::query()->where('id', $product->ram_id)->firstOrFail();
        $cpu = CPU::query()->where('id', $product->cpu_id)->firstOrFail();
        $gpu = GPU::query()->where('id', $product->gpu_id)->firstOrFail();
        return view('userpage.detail', [
            'product' => $product,
            'brand' => $brand,
            'ram' => $ram,
            'cpu' => $cpu,
            'gpu' => $gpu,
        ]);
    }
}
