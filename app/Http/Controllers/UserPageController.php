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
        $condition = [];
        if ($request->get('search') !== null) {
            $condition[] = ['products.name', 'like', '%' . $request->get('search') . '%'];
        }
        if ($request->get('brand') !== null) {
            $condition[] = ['brand_id', $request->get('brand')];
        }
        if ($request->get('category') !== null) {
            $condition[] = ['category_id', $request->get('category')];
        }
        if ($request->get('color') !== null) {
            $condition[] = ['color_id', $request->get('color')];
        }
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
            ->where($condition)
            ->paginate(9);

        $list_product->appends([
            'search' => $request->get('search'),
            'brand' => $request->get('brand'),
            'category' => $request->get('category'),
        ]);

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

    public function showDetailProduct(Product $product)
    {
        $brand = Brand::query()->where('id', $product->brand_id)->firstOrFail();
        $category = Category::query()->where('id', $product->category_id)->firstOrFail();
        $ram = Ram::query()->where('id', $product->ram_id)->firstOrFail();
        $cpu = CPU::query()->where('id', $product->cpu_id)->firstOrFail();
        $gpu = GPU::query()->where('id', $product->gpu_id)->firstOrFail();

        $related_product = Product::query()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(8)
            ->get();
        return view('userpage.detail-product', [
            'product' => $product,
            'related_product' => $related_product,
            'brand' => $brand,
            'category' => $category,
            'ram' => $ram,
            'cpu' => $cpu,
            'gpu' => $gpu,
        ]);
    }
}
