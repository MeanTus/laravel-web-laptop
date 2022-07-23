<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Statistic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $top_product = Product::query()
            ->orderBy('quantity_sold', 'DESC')
            ->limit(10)
            ->select('name', 'quantity_sold', 'avatar')
            ->get();

        $count_product = Product::query()->count();
        $count_customer = User::query()->where('role_id', 3)->count();

        // Đếm đơn hàng đã duyệt
        $count_order = Order::query()->where('status', 1)->count();
        return view('admin.index', [
            'top_product' => $top_product,
            'count_product' => $count_product,
            'count_customer' => $count_customer,
            'count_order' => $count_order,
        ]);
    }

    public function showListAdmin()
    {
        $list_admin = User::query()->where('role_id', '<', 2)->get();
        return view('admin.people.admin', ['list_admin' => $list_admin]);
    }

    public function filter30Day()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $sub30day = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();

        $get = Statistic::query()
            ->whereBetween('order_date', [$sub30day, $now])
            ->orderBy('order_date', 'ASC')
            ->get();

        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity
            );
        }

        echo json_encode($chart_data);
    }

    public function filterByDay(Request $request)
    {
        $from_date = (string)$request->get('from_date');
        $to_date = (string)$request->get('to_date');

        $get = Statistic::query()
            ->whereBetween('order_date', [$from_date, $to_date])
            ->orderBy('order_date', 'ASC')
            ->get();

        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity
            );
        }

        echo json_encode($chart_data);
    }

    public function filterSale(Request $request)
    {
        $need_filter = $request->get('filter_value');
        $total_sale = 0;

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $sub7day = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $dauThangNay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();

        $dauThangTruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoiThangTruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        if ($need_filter == '7Ngay') {
            $get = Statistic::query()->whereBetween('order_date', [$sub7day, $now])->get();
        }
        if ($need_filter == 'thangTruoc') {
            $get = Statistic::query()->whereBetween('order_date', [$dauThangTruoc, $cuoiThangTruoc])->get();
        }
        if ($need_filter == 'thangNay') {
            $get = Statistic::query()->whereBetween('order_date', [$dauThangNay, $now])->get();
        }

        foreach ($get as $value) {
            $total_sale += $value->sales;
        }

        echo json_encode($total_sale);
    }

    public function filterProfit(Request $request)
    {
        $need_filter = $request->get('filter_value');
        $total_profit = 0;

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $sub7day = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $dauThangNay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();

        $dauThangTruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoiThangTruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        if ($need_filter == '7Ngay') {
            $get = Statistic::query()->whereBetween('order_date', [$sub7day, $now])->get();
        }
        if ($need_filter == 'thangTruoc') {
            $get = Statistic::query()->whereBetween('order_date', [$dauThangTruoc, $cuoiThangTruoc])->get();
        }
        if ($need_filter == 'thangNay') {
            $get = Statistic::query()->whereBetween('order_date', [$dauThangNay, $now])->get();
        }

        foreach ($get as $value) {
            $total_profit += $value->profit;
        }

        echo json_encode($total_profit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.people.add-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::query()->where('user_id', $id)->firstOrFail();
        return view('admin.people.detail-admin', [
            'admin' => $admin,
        ]);
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
