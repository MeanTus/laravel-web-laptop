<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_customer = User::query()->where('role_id', 3)->get();
        return view('admin.people.customer', ['list_customer' => $list_customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.people.add-customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::query()->where('user_id', $id)->firstOrFail();
        $count_orders = Order::query()->where('customer_id', $id)->count();
        return view('admin.people.detail-customer', [
            'customer' => $customer,
            'count_order' => $count_orders
        ]);
    }

    public function blockUser(Request $request)
    {
        User::query()
            ->where('user_id', $request->customer_id)
            ->update([
                'status' => 1,
                'desc_block' => $request->desc_block,
            ]);
        return redirect()->route('admin.view-customer', ['user' => $request->customer_id])->with('success', 'Khóa người dùng thành công');
    }

    public function unblockUser(Request $request)
    {
        User::query()
            ->where('user_id', $request->customer_id)
            ->update([
                'status' => 0,
                'desc_block' => null,
            ]);
        return redirect()->route('admin.view-customer', ['user' => $request->customer_id])->with('success', 'Mở khóa người dùng thành công');
    }
}
