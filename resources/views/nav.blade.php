<nav class="primary-menu with-arrows me-lg-auto">

    <ul class="menu-container">
        <li class="menu-item current"><a class="menu-link" href="#"><div>Home</div></a></li>

        @foreach ($categories as $category)

            <li class="menu-item mega-menu"><a class="menu-link" href="#"><div>{{ $category['title'] }}</div></a>
                <div class="mega-menu-content mega-menu-style-2">
                    <div class="container">
                        <div class="row">
                            <ul class="sub-menu-container mega-menu-column border-start-0 col-lg-3">
                                @if (isset($category['children']))
                                @foreach ($category['children'] as $subcategory)

                                <li class="menu-item mega-menu-title"><a class="menu-link" href="{{ route('category.products', ['category' => $subcategory['id'] ]) }}"><div>{{ $subcategory['title'] }}</div></a>
                                    <ul class="sub-menu-container">
                                        @if (isset($subcategory['children']))
                                            @foreach ($subcategory['children'] as $bottomcategory)
                                                <li class="menu-item"><a class="menu-link" href="{{ route('category.products', ['category' => $bottomcategory['id'] ]) }}"><div>{{ $bottomcategory['title'] }}</div></a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                            <ul class="sub-menu-container mega-menu-column col-lg-3 border-start-0">
                                <li class="card p-0 bg-transparent border-0">
                                    <img class="card-img-top" src="demos/shop/images/menu-image.jpg" alt="image cap">

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
        <li class="menu-item"><a class="menu-link" href="#"><div>Accessories</div></a></li>
        <li class="menu-item"><a class="menu-link" href="#"><div>Blog</div></a></li>
        <li class="menu-item"><a class="menu-link" href="#"><div>Sales</div></a></li>
    </ul>

</nav><!-- #primary-menu end -->
