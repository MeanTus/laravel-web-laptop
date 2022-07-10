<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_order = Order::orderBy('created_at', 'desc')->get();
        return view('admin.list.list-order', ['list_order' => $list_order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add.add-order');
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
    public function show(Order $order)
    {
        $list_product = OrderDetail::query()
            ->join('products', 'order_detail.product_id', '=', 'products.id')
            ->where('order_id', $order->id)
            ->select(
                '*',
                'order_detail.quantity as order_quantity',
                'order_detail.price as order_price'
            )
            ->get();
        return view('admin.detail.detail-order', [
            'order' => $order,
            'list_product' => $list_product
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

    public function confirmOrder(Order $order)
    {
        Order::query()
            ->where('id', $order->id)
            ->update([
                'admin_id' => session()->get('admin_id'),
                'status' => 1
            ]);

        // Update quantity product
        $product_id = OrderDetail::query()
            ->select('product_id', 'quantity')
            ->where('order_id', $order->id)
            ->get();

        foreach ($product_id as $item) {
            $current_quantity_product = Product::query()->where('id', $item->product_id)->value('quantity');
            if ($item->quantity > $current_quantity_product) {
                Order::query()
                    ->where('id', $order->id)
                    ->update([
                        'admin_id' => session()->get('admin_id'),
                        'status' => 0
                    ]);
                return redirect()->route('admin.show-order', ['order' => $order])->withErrors('Sản phẩm không đủ số lượng, không thể duyệt đơn');
            } else {
                Product::query()
                    ->where('id', $item->product_id)
                    ->update([
                        'quantity_sold' => $item->quantity,
                        'quantity' => $current_quantity_product - $item->quantity,
                    ]);
            }
        }
        return redirect()->route('admin.show-order', ['order' => $order])->with('success', 'Duyệt đơn thành công');
    }

    public function cancelOrder(Request $request)
    {
        Order::query()
            ->where('id', $request->order_id)
            ->update([
                'admin_id' => session()->get('admin_id'),
                'status' => 3,
                'desc_cancel' => $request->desc_cancel,
            ]);
        $order = Order::query()->where('id', $request->order_id)->firstOrFail();
        return redirect()->route('admin.show-order', ['order' => $order])->with('success', 'Hủy đơn thành công');
    }

    // ============= User page ==================

    public function showHistoryOrderUser($user)
    {
        $list_order = Order::query()
            ->orderBy('created_at', 'desc')
            ->where('customer_id', $user)
            ->paginate(10);

        return view('userpage.history-order', ['list_order' => $list_order]);
    }

    public function showDetailOrderUser(Order $order)
    {
        $list_product = OrderDetail::query()
            ->join('products', 'order_detail.product_id', '=', 'products.id')
            ->where('order_id', $order->id)
            ->select(
                '*',
                'order_detail.quantity as order_quantity',
                'order_detail.price as order_price'
            )
            ->get();
        return view('userpage.detail-order', [
            'order' => $order,
            'list_product' => $list_product
        ]);
    }

    public function cancelOrderUser(Request $request)
    {
        Order::query()
            ->where('id', $request->order_id)
            ->update([
                'admin_id' => session()->get('user_id'),
                'status' => 2,
                'desc_cancel' => $request->desc_cancel,
            ]);
        $order = Order::query()->where('id', $request->order_id)->firstOrFail();
        return redirect()->route('userpage.detail-order', ['order' => $order])->with('success', 'Hủy đơn thành công');
    }
}
