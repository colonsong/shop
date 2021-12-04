<div class="top-cart-content">
    <div class="top-cart-title">
        <h4>Shopping Cart</h4>
    </div>

    <div class="top-cart-items">


        @foreach ($cart->products()->get() as $product)
        <div class="top-cart-item">
            <div class="top-cart-item-image">
                <a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a>
            </div>
            <div class="top-cart-item-desc">
                <div class="top-cart-item-desc-title">
                    <a href="#">{{ $product->name}}</a>
                    <span class="top-cart-item-price d-block">{{ $product->price}}</span>
                </div>
                <div class="top-cart-item-quantity">x {{ $product->pivot->qty}}</div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="top-cart-action">
        <span class="top-checkout-price">$114.95</span>
        <a href="#" class="button button-3d button-small m-0">View Cart</a>
    </div>
</div>
