<li class="product-item">
    <div class="product product-widget-style">
        <div class="thumbnnail">
            <a href="{{ route('userpage.detail', ['product' => $product->id]) }}">
                <figure><img src="{{ asset('admin-assets/images/product/'  . $product->avatar)}}" alt=""></figure>
            </a>
        </div>
        <div class="product-info">
            <a href="{{ route('userpage.detail', ['product' => $product->id]) }}" class="product-name">
                <span>{{ $product->name }}</span>
            </a>
            <div class="wrap-price">
                <span class="product-price">{{ number_format($product->price) }} VNĐ</span>
            </div>
        </div>
    </div>
</li>