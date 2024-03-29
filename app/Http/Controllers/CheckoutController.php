<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Cart as ModelsCart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Statistic;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
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
            return view('userpage.checkout', [
                'data' => $data_cart
            ]);
        } else {
            return view('userpage.checkout', [
                'data' => null
            ]);
        }
    }

    // Coupon
    public function checkCoupon(Request $request)
    {
        // Kiểm tra xem có sản phẩm trong giỏ hàng hay chưa
        if (count(Cart::content()) == 0) {
            return redirect()->route('userpage.cart')->withErrors('Bạn chưa có sản phẩm trong giỏ hàng');
        }
        // Kiểm tra xem có nhập mã giảm giá hay không
        if ($request->get('code') == null) {
            return redirect()->route('userpage.cart')->withErrors('Bạn chưa nhập mã giảm giá');
        }
        // Số tiền được giảm
        $money_discount = 0;
        if (session()->has('discount')) {
            return redirect()->route('userpage.cart')->withErrors('Chỉ được nhập mã giảm giá 1 lần');
        }
        $coupon = Coupon::query()
            ->where('code', $request->get('code'))
            ->where('status', 1)
            ->first();

        $discount = 0;
        if (!$coupon) {
            return redirect()->route('userpage.cart')->withErrors('Mã giảm giá không đúng hoặc chưa được áp dụng');
        } else {
            // Kiểm tra xem còn mã giảm giá hay ko
            if ($coupon->quantity == 0) {
                return redirect()->route('userpage.cart')->withErrors('Mã giảm giá đã hết');
            }
            if ($coupon->feature == 0) {
                $discount = $coupon->discount_rate;
                // Tính số tiền được giảm
                $money_discount = $discount * Cart::totalFloat() / 100;
                session()->put('discount', $discount);
                session()->put('discount_code', $coupon->code);
                session()->put('money_discount', $money_discount);
            } else {
                $money_discount = (int)$coupon->discount_rate;
                // Kiểm tra xem số tiền được giảm bằng bao nhiêu % đơn hàng
                $discount = $coupon->discount_rate;
                $rate = $discount * 100 / Cart::totalFloat();

                // Nếu số tiền giảm lớn hơn tổng tiền đơn hàng thì giảm 100%
                if ($rate > 100) {
                    $rate = 100;
                }

                session()->put('discount', $rate);
                session()->put('discount_code', $coupon->code);
                session()->put('money_discount', $money_discount);
            }
            return redirect()->route('userpage.cart')->with('success', 'Áp dụng mã thành công');
        }
    }

    public function deleteCoupon()
    {
        if (session()->has('discount')) {
            session()->forget(['discount', 'discount_code', 'money_discount']);
        }

        return redirect()->back()->with('success', 'Xóa mã giảm giá thành công');
    }

    public function thankYouPage()
    {
        return view('userpage.thankyou');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        // Add to table order
        $order = Order::create($request->validated());

        // Biến dùng để đếm có tổng cộng bao nhiêu sản phẩm được bán
        $total_quantity_product_sold = 0;

        // Nếu có mã giảm giá thì sau khi thanh toán xong cập nhật lại số lượng mã
        if ($request->get('discount_code')) {
            $coupon = Coupon::query()->where('code', $request->get('discount_code'))->first();
            Coupon::query()
                ->where('code', $request->get('discount_code'))
                ->update([
                    'quantity' => $coupon->quantity - 1
                ]);
            // Thanh toán xong sẽ xóa mã giảm giá ra khỏi session
            session()->forget(['discount', 'discount_code', 'money_discount']);
        }

        // Add detail order
        foreach (Cart::content() as $product) {
            OrderDetail::create([
                'price' => $product->price,
                'quantity' => $product->qty,
                'total_price' => $product->price * $product->qty,
                'order_id' => $order->id,
                'product_id' => $product->id,
            ]);
            $total_quantity_product_sold += $product->qty;
        }

        if ($request->payment_method === 'vnpay') {
            Order::query()->where('id', $order->id)->update([
                'status' => 3
            ]);
            // Ghi dữ liệu vào talble statistic để thống kê doanh thu
            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            // Kiểm tra xem ngày đó đã có đơn hàng nào chưa nếu chưa thì tạo mới nếu có thì cập nhật
            $exist_order = Statistic::query()->where('order_date', $now)->first();

            // Cập nhật lại số lượng sản phẩm
            foreach (Cart::content() as $product) {
                $current_quantity_product = Product::query()->where('id', $product->id)->value('quantity');
                $current_quantity_sold_product = Product::query()->where('id', $product->id)->value('quantity_sold');

                Product::query()
                    ->where('id', $product->id)
                    ->update([
                        'quantity_sold' => $current_quantity_sold_product + $product->qty,
                        'quantity' => $current_quantity_product - $product->qty,
                    ]);
            }

            if ($exist_order) {
                Statistic::query()->where('order_date', $now)->update([
                    'sales' => $exist_order->sales + $order->total_price,
                    'profit' => $exist_order->profit + ($order->total_price * 0.7),
                    'quantity' => $exist_order->quantity + $total_quantity_product_sold,
                    'total_order' => $exist_order->total_order + 1,
                ]);
            } else {
                Statistic::query()->create([
                    'order_date' => $now,
                    'sales' => $order->total_price,
                    'profit' => ($order->total_price * 0.7),
                    'quantity' => $total_quantity_product_sold,
                    'total_order' => 1,
                ]);
            }
            $this->checkoutVNPay($request);
        }

        if ($request->payment_method === 'momo') {
            $this->checkoutMomo($request);
        }

        // Sau khi thanh toán xong xóa giỏ hàng
        ModelsCart::query()->where('customer_id', session()->get('user_id'))->delete();

        return redirect()->route('userpage.thank-you');
    }

    public function checkoutVNPay($request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('userpage.thank-you');
        $vnp_TmnCode = "XFYR7TXZ"; //Mã website tại VNPAY 
        $vnp_HashSecret = "PTYBAUPJRAFRXIBOBSSIGEDOHTBZHJKJ"; //Chuỗi bí mật

        $vnp_TxnRef = time() . ""; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn hàng bằng VN Pay";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->total_price * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            ModelsCart::query()->where('customer_id', session()->get('user_id'))->delete();
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }

    public function checkoutMomo($request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $request->total_price;
        $orderId = time() . "";
        $redirectUrl = route('userpage.thank-you');
        $ipnUrl = route('userpage.thank-you');

        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Tu",
            "storeId" => "Test",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        dd($result);
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there
        return redirect()->to($jsonResult['payUrl']);
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
}
