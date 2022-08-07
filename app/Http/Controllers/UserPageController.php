<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\CPU;
use App\Models\GPU;
use App\Models\Product;
use App\Models\Ram;
use App\Models\Rating;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class UserPageController extends Controller
{
    public function indexHomePage()
    {
        $latest_product = Product::query()
            ->orderBy('created_at', 'desc')
            ->skip(0)
            ->take(10)
            ->get();

        $gaming_laptop = Product::query()
            ->where('category_id', 1)
            ->inRandomOrder()
            ->limit(8)
            ->get();

        $office_laptop = Product::query()
            ->where('category_id', 2)
            ->inRandomOrder()
            ->limit(8)
            ->get();

        return view('userpage.index', [
            'latest_product' => $latest_product,
            'gaming_laptop' => $gaming_laptop,
            'office_laptop' => $office_laptop,
        ]);
    }

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
        if ($request->get('price') !== null) {
            $param = explode("_", $request->get('price'));
            if ($param[1] == 'null') {
                $condition[] = ['price', '>=', $param[0]];
            } else {
                $condition[] = ['price', '>=', $param[0]];
                $condition[] = ['price', '<=', $param[1]];
            }
        }
        $condition[] = ['status', 0];
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
            ->orderBy('products.created_at', 'DESC')
            ->paginate(9);

        $list_product->appends([
            'search' => $request->get('search'),
            'brand' => $request->get('brand'),
            'category' => $request->get('category'),
            'price' => $request->get('price'),
        ]);

        $brand = Brand::query()->get();
        $category = Category::query()->get();
        $color = Color::query()->get();
        $mostViewProduct = Product::query()->orderBy('quantity_sold', 'DESC')->limit(5)->get();
        return view('userpage.shop', [
            'list_product' => $list_product,
            'brands' => $brand,
            'categories' => $category,
            'colors' => $color,
            'mostViewProduct' => $mostViewProduct
        ]);
    }

    public function showDetailProduct(Product $product)
    {
        $brand = Brand::query()->where('id', $product->brand_id)->firstOrFail();
        $category = Category::query()->where('id', $product->category_id)->firstOrFail();
        $ram = Ram::query()->where('id', $product->ram_id)->firstOrFail();
        $cpu = CPU::query()->where('id', $product->cpu_id)->firstOrFail();
        $gpu = GPU::query()->where('id', $product->gpu_id)->firstOrFail();
        $color = Color::query()->where('hex', $product->color_id)->firstOrFail();
        $rating = Rating::query()->where('product_id', $product->id)->select('rating')->get();
        // Đếm tổng cộng bao nhiêu rate rồi chia TBC
        $total_rating = 0;
        $rateOfProduct = 0;

        if (count($rating) > 0) {
            foreach ($rating as $rate) {
                $total_rating += $rate->rating;
            }
            $rateOfProduct = round($total_rating / count($rating), 0);
        }

        $mostViewProduct = Product::query()->orderBy('quantity_sold', 'DESC')->limit(5)->get();

        $related_product = Product::query()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(8)
            ->get();
        return view('userpage.detail-product', [
            'rateOfProduct' => $rateOfProduct,
            'product' => $product,
            'related_product' => $related_product,
            'brand' => $brand,
            'category' => $category,
            'ram' => $ram,
            'cpu' => $cpu,
            'gpu' => $gpu,
            'color' => $color,
            'mostViewProduct' => $mostViewProduct
        ]);
    }

    public function contactUs()
    {
        return view('userpage.contact-us');
    }
}
