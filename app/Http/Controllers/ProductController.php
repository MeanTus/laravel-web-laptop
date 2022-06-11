<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->model = (new Product())->query();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_product = $this->model
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->select('*', 'products.name as product_name', 'products.avatar as product_avatar', 'suppliers.name as supplier_name')
            ->get();

        return view('admin.list-product', [
            'list_product' => $list_product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->get();
        $brands = Brand::query()->get();
        $suppliers = Supplier::query()->get();
        return view('admin.add-product', [
            'categories' => $categories,
            'brands' => $brands,
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // Path save img
        $path = public_path('admin-assets/images/product/');
        $folder_name = str_replace(' ', '_', $request->get('name'));
        $path_save = $path . $folder_name;

        // Make folder product img
        File::makeDirectory($path_save, 0777, true, true);

        $avatar = $request->file('avatar');
        $avatar_name = time() . $avatar->getClientOriginalName();
        $avatar->move($path_save, $avatar_name);

        $this->model->create([
            'name' => $request->get('name'),
            'unit' => $request->get('unit'),
            'quantity' => $request->get('quantity'),
            'price' => $request->get('price'),
            'desc' => $request->get('desc'),
            'avatar' => $folder_name . '/' . $avatar_name,
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'supplier_id' => $request->get('supplier_id'),
        ]);

        // Update quantity supplied
        Supplier::where('id', $request->get('supplier_id'))
            ->update(['quantity_supplied' => $request->get('quantity')]);

        return redirect()->route('admin.product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
