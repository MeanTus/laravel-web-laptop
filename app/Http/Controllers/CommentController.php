<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function submitComment(Request $request)
    {
        $product_id = $request->get('product_id');
        $customer_id = $request->get('customer_id');
        $comment_content = $request->get('comment_content');

        // Kiểm tra xem người dùng đã mua hàng mới cho phép bình luận
        $exist_order = Order::query()
            ->where('customer_id', $customer_id)
            ->first();

        if ($exist_order) {
            $exist_product = OrderDetail::query()
                ->where('order_id', $exist_order->id)
                ->where('product_id', $product_id)
                ->first();
            if (!$exist_product) {
                echo 'Bạn chưa mua sản phẩm nên không thể bình luận';
                return;
            } else {
                Comment::query()->create([
                    'content' => $comment_content,
                    'customer_id' => $customer_id,
                    'product_id' => $product_id
                ]);

                echo 'success';
                return;
            }
        } else {
            echo 'Bạn chưa mua sản phẩm nên không thể bình luận';
            return;
        }
    }

    public function loadComment(Request $request)
    {
        $product_id = $request->get('product_id');
        $output = '';
        $img = '';
        $comment = Comment::query()
            ->where('product_id', $product_id)
            ->join('users', 'comments.customer_id', '=', 'users.user_id')
            ->select(
                'comments.content',
                'comments.created_at',
                'users.name',
                'users.avatar'
            )
            ->orderBy('id', 'desc')
            ->limit(2)
            ->get();

        foreach ($comment as $comm) {
            if ($comm->avatar == null) {
                $img = 'src= "' . asset('assets/images/users/default-user-avatar.jpg') . '"';
            } else {
                $img = 'src= "' . asset('assets/images/users/') . '/' . $comm->avatar . '"';
            }
            $output .= '
            <ol class="commentlist" id="list-comment">
                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                    <div id="comment-20" class="comment_container"> 
                        <img ' . $img . ' height="80" width="80" style="border-radius: 100%;">
                        <div class="comment-text">
                            <div class="star-rating">
                                <span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
                            </div>
                            <p class="meta"> 
                                <strong class="woocommerce-review__author">' . $comm->name . '</strong> 
                                <span class="woocommerce-review__dash">–</span>
                                <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >' . $comm->created_at . '</time>
                            </p>
                            <div class="description">
                                <p>' . $comm->content . '</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ol>
            ';
        }

        echo $output;
    }
}
