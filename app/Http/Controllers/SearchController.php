<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchByName(Request $request)
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
        $brand = Brand::query()->get();
        $category = Category::query()->get();
        $color = Color::query()->get();
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
        return view('userpage.shop', [
            'list_product' => $list_product,
            'brands' => $brand,
            'categories' => $category,
            'colors' => $color
        ]);
    }
}
