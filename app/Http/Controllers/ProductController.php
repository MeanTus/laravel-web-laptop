<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\CPU;
use App\Models\GPU;
use App\Models\Product;
use App\Models\Ram;
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
            ->select(
                '*',
                'products.name as product_name',
                'products.id as product_id',
                'products.avatar as product_avatar',
                'suppliers.name as supplier_name'
            )
            ->orderBy('products.created_at', 'DESC')
            ->get();

        return view('admin.list.list-product', [
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
        $gpu = GPU::query()
            ->select('*', 'gpu.id as gpu_id')
            ->get();
        $cpu = CPU::query()
            ->select('*', 'cpu.id as cpu_id')
            ->get();
        $ram = Ram::query()
            ->select('*', 'ram.id as ram_id')
            ->get();
        $colors = Color::query()
            ->select('*', 'colors.id as color_id')
            ->get();

        return view('admin.add-edit.add-edit-product', [
            'product' => null,
            'categories' => $categories,
            'brands' => $brands,
            'suppliers' => $suppliers,
            'rams' => $ram,
            'list_gpu' => $gpu,
            'list_cpu' => $cpu,
            'colors' => $colors,
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
            'name' => trim($request->get('name')),
            'unit' => trim($request->get('unit')),
            'quantity' => $request->get('quantity'),
            'price' => $request->get('price'),
            'desc' => trim($request->get('desc')),
            'avatar' => $folder_name . '/' . $avatar_name,
            'pin' => $request->get('pin'),
            'weight' => $request->get('weight'),
            'cpu_id' => $request->get('cpu_id'),
            'gpu_id' => $request->get('gpu_id'),
            'ram_id' => $request->get('ram_id'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'supplier_id' => $request->get('supplier_id'),
            'color_id' => $request->get('color_id'),
        ]);

        // Update quantity supplied
        Supplier::where('id', $request->get('supplier_id'))
            ->update(['quantity_supplied' => $request->get('quantity')]);

        return redirect()->route('admin.product')->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $brand = Brand::query()->where('id', $product->brand_id)->firstOrFail();
        $category = Category::query()->where('id', $product->category_id)->firstOrFail();
        $ram = Ram::query()->where('id', $product->ram_id)->firstOrFail();
        $cpu = CPU::query()->where('id', $product->cpu_id)->firstOrFail();
        $gpu = GPU::query()->where('id', $product->gpu_id)->firstOrFail();
        $supplier = Supplier::query()->where('id', $product->supplier_id)->firstOrFail();
        $color = Color::query()->where('hex', $product->color_id)->firstOrFail();
        return view('admin.detail.detail-product', [
            'product' => $product,
            'category' => $category,
            'brand' => $brand,
            'supplier' => $supplier,
            'ram' => $ram,
            'gpu' => $gpu,
            'cpu' => $cpu,
            'color' => $color,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::query()->get();
        $brands = Brand::query()->get();
        $suppliers = Supplier::query()->get();
        $gpu = GPU::query()
            ->select('*', 'gpu.id as gpu_id')
            ->get();
        $cpu = CPU::query()
            ->select('*', 'cpu.id as cpu_id')
            ->get();
        $ram = Ram::query()
            ->select('*', 'ram.id as ram_id')
            ->get();
        $colors = Color::query()
            ->select('*', 'colors.id as color_id')
            ->get();

        return view('admin.add-edit.add-edit-product', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'suppliers' => $suppliers,
            'rams' => $ram,
            'list_gpu' => $gpu,
            'list_cpu' => $cpu,
            'colors' => $colors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->get('action-edit') == 'hidden-product') {
            $product->update([
                'status' => 1
            ]);

            return redirect()->route('admin.edit-product', ['product' => $product])->with('success', 'Ẩn thành công sản phẩm');
        } elseif ($request->get('action-edit') == 'active-product') {
            $product->update([
                'status' => 0
            ]);

            return redirect()->route('admin.edit-product', ['product' => $product])->with('success', 'Kích hoạt thành công sản phẩm');
        } else {
            $path = public_path('admin-assets/images/product/');
            $folder_name = str_replace(' ', '_', $request->get('name'));
            $path_save = $path . $folder_name;
            if ($request->file('avatar') !== null) {
                // Delete old avatar
                File::delete($path . $request->get('old-avatar'));

                // Delete old directory
                $path_directory = explode('/', $request->get('old-avatar'));
                File::deleteDirectory($path . $path_directory[0]);

                // Make new directory images
                File::makeDirectory($path_save, 0777, true, true);

                // Lưu hình ảnh
                $avatar = $request->file('avatar');
                $name_avatar = time() . $avatar->getClientOriginalName();

                //Lưu trữ file tại public/admin-assets/images/product
                $avatar->move($path_save, $name_avatar);

                $product->update([
                    'name' => trim($request->get('name')),
                    'unit' => trim($request->get('unit')),
                    'quantity' => $request->get('quantity'),
                    'price' => $request->get('price'),
                    'desc' => trim($request->get('desc')),
                    'avatar' => $folder_name . '/' . $name_avatar,
                    'pin' => $request->get('pin'),
                    'weight' => $request->get('weight'),
                    'cpu_id' => $request->get('cpu_id'),
                    'gpu_id' => $request->get('gpu_id'),
                    'ram_id' => $request->get('ram_id'),
                    'category_id' => $request->get('category_id'),
                    'brand_id' => $request->get('brand_id'),
                    'supplier_id' => $request->get('supplier_id'),
                    'color_id' => $request->get('color_id'),
                ]);
            } else {
                $product->update([
                    'name' => trim($request->get('name')),
                    'unit' => trim($request->get('unit')),
                    'quantity' => $request->get('quantity'),
                    'price' => $request->get('price'),
                    'desc' => trim($request->get('desc')),
                    'pin' => $request->get('pin'),
                    'weight' => $request->get('weight'),
                    'cpu_id' => $request->get('cpu_id'),
                    'gpu_id' => $request->get('gpu_id'),
                    'ram_id' => $request->get('ram_id'),
                    'category_id' => $request->get('category_id'),
                    'brand_id' => $request->get('brand_id'),
                    'supplier_id' => $request->get('supplier_id'),
                    'color_id' => $request->get('color_id'),
                ]);
            }

            return redirect()->route('admin.edit-product', ['product' => $product])->with('success', 'Chỉnh sửa thành công sản phẩm');
        }
    }
}
