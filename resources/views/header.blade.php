<header id="header" class="full-header header-size-md">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row justify-content-lg-between">

                <!-- Logo
                ============================================= -->
                <div id="logo" class="me-lg-4">
                    <a href="demo-shop.html" class="standard-logo"><img src="demos/shop/images/logo.png" alt="Canvas Logo"></a>
                    <a href="demo-shop.html" class="retina-logo"><img src="demos/shop/images/logo@2x.png" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <div class="header-misc">

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-account">
                        @auth
                            <i class="icon-line2-user me-1 position-relative" style="top: 1px;"></i>{{ auth()->user()->name }}
                            |
                            <form class="d-sm-inline" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Logout</button>
                            </form>
                        @endauth
                        @guest
                            <a href="#modal-register" data-lightbox="inline" ><i class="icon-line2-user me-1 position-relative" style="top: 1px;"></i><span class="d-none d-sm-inline-block font-primary fw-medium">Login</span></a>
                        @endguest

                    </div><!-- #top-search end -->

                    <!-- Top Cart
                    ============================================= -->
                    <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                        <a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span class="top-cart-number">5</span></a>
                        @livewire('shop.top-cart-products')

                    </div><!-- #top-cart end -->

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                    </div><!-- #top-search end -->

                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                @include('nav')

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->
