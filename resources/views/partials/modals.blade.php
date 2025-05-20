<!-- Quick view modal -->
<div class="modal fade" id="modaltoggle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12 col-md-12 me-3">
                    <div class="image-holder">
                        <img src="{{ asset('images/summary-item1.jpg') }}" alt="Shoes">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="summary">
                        <div class="summary-content fs-6">
                            <div class="product-header d-flex justify-content-between mt-4">
                                <h3 class="display-7">Running Shoes For Men</h3>
                                <div class="modal-close-btn">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                            </div>
                            <span class="product-price fs-3">$99</span>
                            <div class="product-details">
                                <p class="fs-7">Buy good shoes and a good mattress, because when you're not in one you're in the
                                    other. With four pairs of shoes, I can travel the world.</p>
                            </div>
                            <ul class="select">
                                <li>
                                    <strong>Colour Shown:</strong> Red, White, Black
                                </li>
                                <li>
                                    <strong>Style:</strong> SM3018-100
                                </li>
                            </ul>
                            <div class="variations-form shopify-cart">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="quantity d-flex pb-4">
                                            <div
                                                class="qty-number align-top qty-number-plus d-flex justify-content-center align-items-center text-center">
                                                <span class="increase-qty plus">
                                                    <svg class="plus">
                                                        <use xlink:href="#plus"></use>
                                                    </svg>
                                                </span>
                                            </div>
                                            <input type="number" id="quantity_001" class="input-text text-center" step="1" min="1" name="quantity" value="1" title="Qty">
                                            <div
                                                class="qty-number qty-number-minus d-flex justify-content-center align-items-center text-center">
                                                <span class="increase-qty minus">
                                                    <svg class="minus">
                                                        <use xlink:href="#minus"></use>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <a rel="nofollow" data-no-instant="" href="#" class="out-stock button">Out of stock</a>
                                        <button type="submit" class="btn btn-medium btn-black hvr-sweep-to-right">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <!-- variations-form -->
                            <div class="categories d-flex flex-wrap pt-3">
                                <strong class="pe-2">Categories:</strong>
                                <a href="#" title="categories">Clothing,</a>
                                <a href="#" title="categories">Men's Clothes,</a>
                                <a href="#" title="categories">Tops & T-Shirts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cart modal -->
<div class="modal fade" id="modallong" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5">Cart</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="shopping-cart">
                    <div class="shopping-cart-content">
                        @auth
                            @php
                                $cartItems = \App\Models\CartItem::where('UserId', auth()->id())->with('product')->get();
                                $total = $cartItems->sum('Total');
                            @endphp

                            @if($cartItems->count() > 0)
                                <div class="mini-cart cart-list p-0 mt-3">
                                    @foreach($cartItems as $item)
                                        <div class="mini-cart-item d-flex border-bottom pb-3">
                                            <div class="col-lg-2 col-md-3 col-sm-2 me-4">
                                                <a href="{{ route('product.show', $item->product) }}" title="product-image">
                                                    <img src="{{ $item->product->ImageUrl ?? asset('images/single-product-thumb1.jpg') }}" class="img-fluid" alt="single-product-item">
                                                </a>
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-sm-8">
                                                <div class="product-header d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="product-title fs-6 me-5">{{ $item->product->Name }}</h4>
                                                    <form action="{{ route('cart.remove', $item->CartId) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="remove" aria-label="Remove this item">
                                                            <svg class="close">
                                                                <use xlink:href="#close"></use>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="quantity-price d-flex justify-content-between align-items-center">
                                                    <div class="input-group product-qty">
                                                        <form action="{{ route('cart.update', $item->CartId) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="d-flex">
                                                                <button type="button" class="quantity-left-minus btn btn-light rounded-0 rounded-start btn-number" data-type="minus">
                                                                    <svg width="16" height="16">
                                                                        <use xlink:href="#minus"></use>
                                                                    </svg>
                                                                </button>
                                                                <input type="text" name="Quantity" class="form-control input-number quantity" value="{{ $item->Quantity }}">
                                                              <button type="button" class="quantity-right-plus btn btn-light rounded-0 rounded-end btn-number" data-type="plus">
                                                                    <svg width="16" height="16">
                                                                        <use xlink:href="#plus"></use>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="price-code">
                                                        <span class="product-price fs-6">${{ number_format($item->Price, 2) }}</span>
                                                    </div>
                                                </div>
                                                <!-- quantity-price -->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- cart-list -->
                                <div class="mini-cart-total d-flex justify-content-between py-4">
                                    <span class="fs-6">Subtotal:</span>
                                    <span class="special-price-code">
                                        <span class="price-amount amount fs-6" style="opacity: 1;">
                                            <bdi>
                                                <span class="price-currency-symbol">$</span>{{ number_format($total, 2) }}
                                            </bdi>
                                        </span>
                                    </span>
                                </div>
                                <div class="modal-footer my-4 justify-content-center">
                                    <a href="{{ route('cart.view') }}" class="btn btn-red hvr-sweep-to-right dark-sweep">View Cart</a>
                                    <a href="{{ route('checkout') }}" class="btn btn-outline-gray hvr-sweep-to-right dark-sweep">Checkout</a>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <p>Your cart is empty.</p>
                                    <a href="{{ url('/') }}" class="btn btn-red hvr-sweep-to-right dark-sweep mt-3">Continue Shopping</a>
                                </div>
                            @endif
                        @else
                            <div class="text-center py-4">
                                <p>Please login to view your cart.</p>
                                <a href="{{ route('login') }}" class="btn btn-red hvr-sweep-to-right dark-sweep mt-3">Login</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login modal (solo visible para usuarios no autenticados) -->
@guest
<div class="modal fade" id="modallogin" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered" role="document">
        <div class="modal-content p-4">
            <div class="modal-header mx-auto border-0">
                <h2 class="modal-title fs-3 fw-normal">Login</h2>
            </div>
            <div class="modal-body">
                <div class="login-detail">
                    <div class="login-form p-0">
                        <div class="col-lg-12 mx-auto">
                            <form method="POST" action="{{ route('login') }}" id="login-form">
                                @csrf
                                <input type="email" name="email" placeholder="Email Address *" class="mb-3 ps-3 text-input" required>
                                <input type="password" name="password" placeholder="Password" class="ps-3 text-input" required>
                                <div class="checkbox d-flex justify-content-between mt-4">
                                    <p class="checkbox-form">
                                        <label class="">
                                            <input name="remember" type="checkbox" id="remember-me" value="forever"> Remember me
                                        </label>
                                    </p>
                                    <p class="lost-password">
                                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer mt-5 d-flex justify-content-center">
                        <button type="submit" form="login-form" class="btn btn-red hvr-sweep-to-right dark-sweep">Login</button>
                        <a href="{{ route('register') }}" class="btn btn-outline-gray hvr-sweep-to-right dark-sweep">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endguest
