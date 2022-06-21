<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchByName(Request $request)
    {
        $condition = '';
        if ($request->get('search') !== null) {
            $condition .= "->where('products.name', 'like', '%'" . $request->get('search') . "'%')";
        }
        if ($request->get('brand') !== null) {
            $condition .= "->where('brand_id'," . $request->get('brand') . ")";
        }
        $condition .= "->get()";
        $brand = Brand::query()->get();
        $category = Category::query()->get();
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
            )->get();

        return view('userpage.shop', [
            'list_product' => $list_product,
            'brands' => $brand,
            'categories' => $category
        ]);
    }
}
