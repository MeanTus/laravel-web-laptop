<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::content() !== null) {
            $data_cart = Cart::content();
            return view('userpage.cart', [
                'data' => $data_cart
            ]);
        } else {
            return view('userpage.cart', [
                'data' => null
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->get('id');
        $quantity = $request->get('product-quatity');

        $product_info = Product::query()->where('id', $product_id)->firstOrFail();

        Cart::add([
            'id' => $product_info->id,
            'name' => $product_info->name,
            'qty' => (int)$quantity,
            'price' => $product_info->price,
            'weight' => $product_info->weight,
            'options' => [
                'img' => $product_info->avatar
            ]
        ]);
        Cart::setGlobalTax(0);

        return redirect()->route('userpage.cart');
    }

    public function updateQty(Request $request)
    {
        $rowId = $request->get('rowId');
        $qty = $request->get('qty');
        if ($request->get('action') == 'increase') {
            Cart::update($rowId, ['qty' => $qty + 1]);
        }
        if ($request->get('action') == 'minus') {
            Cart::update($rowId, ['qty' => $qty - 1]);
        }
        return redirect()->route('userpage.cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('userpage.cart');
    }

    public function deleteRowCart($rowId)
    {
        Cart::update($rowId, 0);
        return redirect()->route('userpage.cart');
    }
}
