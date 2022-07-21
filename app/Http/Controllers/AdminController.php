<?php

namespace App\Http\Controllers;

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
        return view('admin.index', [
            'top_product' => $top_product,
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
