<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
        $product_id = $request->get('product_id');
        $customer_id = $request->get('customer_id');
        $rating = $request->get('rating');

        $exist_customer_rating = Rating::query()
            ->where('customer_id', $customer_id)
            ->where('product_id', $product_id)
            ->first();

        if ($exist_customer_rating) {
            echo 'Chỉ được đánh giá mỗi sản phẩm một lần';
            return;
        } else {
            Rating::query()->create([
                'rating' => $rating,
                'product_id' => $product_id,
                'customer_id' => $customer_id
            ]);
        }
    }
}
