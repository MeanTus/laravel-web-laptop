<?php

namespace App\Http\Controllers;

use App\Models\Cart as ModelsCart;
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
        Cart::destroy();
        $user_cart = ModelsCart::query()
            ->where('customer_id', session()->get('user_id'))
            ->get();

        $mostViewProduct = Product::query()->orderBy('quantity_sold', 'DESC')->limit(7)->get();

        foreach ($user_cart as $cart) {
            $product_info = Product::query()
                ->where('id', $cart->product_id)
                ->select('name', 'avatar', 'weight', 'price')
                ->firstOrFail();

            Cart::add([
                'id' => $cart->product_id,
                'name' => $product_info->name,
                'qty' => $cart->qty,
                'price' => $product_info->price,
                'weight' => $product_info->weight,
                'options' => [
                    'img' => $product_info->avatar
                ]
            ]);
        }
        if (Cart::content() !== null) {
            $data_cart = Cart::content();
            return view('userpage.cart', [
                'data' => $data_cart,
                'mostViewProduct' => $mostViewProduct
            ]);
        } else {
            return view('userpage.cart', [
                'data' => null,
                'mostViewProduct' => $mostViewProduct
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->get('cart_product_id');
        $quantity = $request->get('cart_product_quantity');

        $product_info = Product::query()->where('id', $product_id)->select('price', 'quantity')->firstOrFail();

        // Kiểm tra xem còn đủ sl sản phẩm không
        if ($quantity > $product_info->quantity) {
            echo 'Không đủ số lượng sản phẩm';
            return;
        }

        // Kiểm tra xem trong db đã có product này hay chưa
        $product_exist = ModelsCart::query()
            ->where('product_id', $product_id)
            ->where('customer_id', session()->get('user_id'))
            ->first();

        if ($product_exist) {
            // Check sl trong cart có lớn hơn số lượng trong kho hay ko
            if ($product_exist->qty >= $product_info->quantity) {
                echo 'Không đủ số lượng sản phẩm';
                return;
            }
            ModelsCart::query()
                ->where('product_id', $product_id)
                ->update([
                    'qty' => $product_exist->qty + $quantity
                ]);
        } else {
            // Add cart to db
            ModelsCart::create([
                'qty' => $quantity,
                'price' => $product_info->price,
                'product_id' => $product_id,
                'customer_id' => session()->get('user_id'),
            ]);
        }
    }

    public function updateQty(Request $request)
    {
        $rowId = $request->get('rowId');
        $product_id = Cart::get($rowId)->id;
        $quantity_product = Cart::get($rowId)->qty;

        // Kiểm tra xem trong kho còn đủ số lượng sản phẩm hay không
        $current_quantity_product = Product::query()->where('id', $product_id)->select('quantity')->first();
        if ($request->get('action') == 'increase') {
            if (($quantity_product + 1) > $current_quantity_product->quantity) {
                return redirect()->route('userpage.cart')->withErrors('Sản phẩm còn lại không đủ');
            } else {
                ModelsCart::query()
                    ->where('product_id', $product_id)
                    ->update([
                        'qty' => $quantity_product + 1
                    ]);
            }
        }
        if ($request->get('action') == 'minus') {
            $current_quantity = ModelsCart::query()
                ->where('product_id', $product_id)
                ->select('qty')
                ->firstOrFail();
            $update_quantity = $current_quantity->qty - 1;
            if ($update_quantity === 0) {
                ModelsCart::query()
                    ->where('product_id', $product_id)
                    ->delete();
            } else {
                ModelsCart::query()
                    ->where('product_id', $product_id)
                    ->update([
                        'qty' => $quantity_product - 1
                    ]);
            }
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
        ModelsCart::query()->where('customer_id', session()->get('user_id'))->delete();
        return redirect()->route('userpage.cart');
    }

    public function deleteRowCart($rowId)
    {
        $product_id = Cart::get($rowId)->id;
        ModelsCart::query()->where('product_id', $product_id)->delete();
        return redirect()->route('userpage.cart');
    }
}
