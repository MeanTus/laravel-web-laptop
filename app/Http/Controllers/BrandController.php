<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function __construct(Brand $user)
    {
        $this->model = (new Brand())->query();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_brand = $this->model->orderBy('created_at', 'desc')->get();
        return view('admin.list.list-brand', [
            'list_brand' => $list_brand
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-edit.add-edit-brand', ['brand' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        // Lưu hình ảnh
        $avatar = $request->file('avatar');
        $name_avatar = time() . $avatar->getClientOriginalName();
        //Lưu trữ file tại public/admin-assets/images/brands
        $avatar->move(public_path('admin-assets/images/brands'), $name_avatar);

        Brand::create([
            'brand_name' => $request->get('brand_name'),
            'avatar' => $name_avatar,
        ]);

        return redirect()->route('admin.brand')->with('success', "Thêm thương hiệu thành công");
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
        $brand = $this->model
            ->where('id', $id)
            ->firstOrFail();
        return view('admin.add-edit.add-edit-brand', ['brand' => $brand]);
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
        if ($request->file('avatar') !== null) {
            // Delete old avatar
            File::delete(public_path("admin-assets\images\brands\\") . $request->get('old-avatar'));

            // Lưu hình ảnh
            $avatar = $request->file('avatar');
            $name_avatar = time() . $avatar->getClientOriginalName();

            //Lưu trữ file tại public/admin-assets/images/brands
            $avatar->move(public_path('admin-assets/images/brands'), $name_avatar);

            $this->model->where('id', $id)->update([
                'brand_name' => $request->get('brand_name'),
                'avatar' => $name_avatar,
            ]);
        } else {
            $this->model->where('id', $id)->update(['brand_name' => $request->get('brand_name')]);
        }

        return redirect()->route('admin.brand')->with('success', "Cập nhật thương hiệu thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
