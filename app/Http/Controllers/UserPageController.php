<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\CPU;
use App\Models\GPU;
use App\Models\Product;
use App\Models\Ram;
use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function shopPage(Request $request)
    {
        if ($request->get('category') !== null || $request->get('brand')) {
            return redirect()->route('userpage.search');
        } else {
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
                ->paginate(9);

            $brand = Brand::query()->get();
            $category = Category::query()->get();
            $color = Color::query()->get();
            return view('userpage.shop', [
                'list_product' => $list_product,
                'brands' => $brand,
                'categories' => $category,
                'colors' => $color
            ]);
        }
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
