<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_coupon = Coupon::query()->orderBy('created_at', 'desc')->get();
        return view('admin.list.list-coupon', [
            'list_coupon' => $list_coupon
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-edit.add-edit-coupon', ['coupon' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('feature') == 0 && $request->get('discount_rate') > 100) {
            return redirect()->route('admin.add-coupon')->withErrors('Tỷ lệ % không được lớn hơn 100');
        }
        Coupon::query()->create($request->except('__token'));
        return redirect()->route('admin.coupon');
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
        $coupon = Coupon::query()
            ->where('id', $id)
            ->firstOrFail();
        return view('admin.add-edit.add-edit-coupon', ['coupon' => $coupon]);
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
        Coupon::query()->where('id', $id)->update($request->except('_token'));
        return redirect()->route('admin.coupon')->with('success', "Cập nhật mã giảm giá thành công");
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
