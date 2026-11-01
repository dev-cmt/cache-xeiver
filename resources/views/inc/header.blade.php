<header class="header">
    <div class="header-top">
        <div class="custom-container">
            <div class="large-device-header">
                <div class="logo">
                    <a href="{{ url('/') }}"><img
                            src="{{ $web_settings->get_logo ? asset($web_settings->get_logo->file_url) : asset('frontEnd/images/no_image.png') }}"
                            alt=""></a>
                </div>
                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <div class="search">
                        <input type="text" name="query" placeholder="" value="{{ request()->input('query') }}"
                            class="form-control typingInput">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                        </button>
                    </div>
                </form>
                <div class="header-action">

                    <div class="cart">
                        @if (\Cart::getContent()->count() > 0)
                            <a href="{{ route('checkout') }}">
                                <span class="amount">TK {{ \Cart::getTotal() }}</span>
                                <span class="cart-count">
                                    <span>{{ \Cart::getContent()->count() }}</span>
                                </span>
                            </a>
                        @else
                            <a href="{{ route('checkout') }}">
                                <span class="amount">TK 0</span>
                                <span class="cart-count">
                                    0
                                </span>
                            </a>
                        @endif

                    </div>
                    <div class="wishlist">
                        <a href="{{ route('wishlist') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                            </svg>
                        </a>
                        @if (count(session()->get('wishlist', [])) > 0)
                            <span class="wishlist-count">
                                {{ count(session()->get('wishlist', [])) }}
                            </span>
                        @else
                            <span class="wishlist-count"> 0</span>
                        @endif
                    </div>
                    <div class="user">
                        @if (Auth::check())
                            <a href="{{ route('profile') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('user.login') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="small-device-header">
                <div class="sm-category">
                    <button type="button" data-bs-toggle="offcanvas" data-bs-target="#categorySidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 6l16 0" />
                            <path d="M4 12l16 0" />
                            <path d="M4 18l16 0" />
                        </svg>
                    </button>
                </div>
                <div class="sm-logo">
                    <a href="{{ url('/') }}"><img
                            src="{{ $web_settings->get_logo ? asset($web_settings->get_logo->file_url) : asset('frontEnd/images/no_image.png') }}"
                            alt=""></a>
                </div>
                <div class="sm-search">
                    <button onclick="search()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="custom-container">
            <ul class="menu">
                <li>
                    <a href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                @foreach ($menu_categories as $cat)
                    <li>
                        <a href="{{ route('category.show', $cat->id) }}">
                            <span>{{ $cat->category_name }}</span>
                            @if (count($cat->children) > 0)
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 9l6 6l6 -6" />
                                    </svg>
                                </span>
                            @endif
                        </a>
                        @if (count($cat->children) > 0)
                            <ul class="submenu">
                                @foreach ($cat->children as $child)
                                    <li>
                                        <a
                                            href="{{ route('category.show', $child->id) }}">{{ $child->category_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</header>

<form action="{{ route('search') }}" method="GET" id="search-form-menu" class="search-form-menu "
    data-test="4">
    <div class="search-menu">
        <input type="text" name="query" placeholder="" value="{{ request()->input('query') }}"
            class="form-control typingInput">
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
            </svg>
        </button>
    </div>
</form>

<div class="small-bottom-menu">
    <div class="home">
        <a href="{{ url('/') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
            </svg>
            <span>Home</span>
        </a>
    </div>
    <div class="m-category">
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#categorySidebar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 4h6v6h-6z" />
                <path d="M14 4h6v6h-6z" />
                <path d="M4 14h6v6h-6z" />
                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
            </svg>
            <span>Category</span>
        </button>
    </div>
    <div class="m-wishlist">
        <a href="{{ route('wishlist') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
            </svg>
            <span>Wishlist</span>
        </a>
        @if (count(session()->get('wishlist', [])) > 0)
            <span class="wishlist-count">
                {{ count(session()->get('wishlist', [])) }}
            </span>
        @else
            <span class="wishlist-count"> 0</span>
        @endif
    </div>
    <div class="cart">
        <a href="{{ route('checkout') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M17 17h-11v-14h-2" />
                <path d="M6 5l14 1l-1 7h-13" />
            </svg>
            <span>Cart</span>
        </a>
        @if (\Cart::getContent()->count() > 0)
            <span class="counter">{{ \Cart::getContent()->count() }}</span>
        @else
            <span class="counter">0</span>
        @endif

    </div>
    <div class="m-user">
        @if (Auth::check())
            <a href="{{ route('profile') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                <span>{{ Auth::guard('web')->user()->name }}</span>
            </a>
        @else
            <a href="{{ route('user.login') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                <span>User</span>
            </a>
        @endif
    </div>
</div>

<div class="offcanvas offcanvas-start text-bg-white" tabindex="-1" id="categorySidebar"
    aria-labelledby="categorySidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title"><b>Categories</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body pt-0">
        <ul class="list-group list-group-flush">
            @foreach ($menu_categories as $category)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('category.show', $category->id) }}">
                            {{ $category->category_name }}
                        </a>
                        @if (count($category->children) > 0)
                            <button class="btn btn-sm" data-bs-toggle="collapse"
                                data-bs-target="#cat{{ $category->id }}" aria-expanded="false"
                                aria-controls="cat{{ $category->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 9l6 6l6 -6" />
                                </svg>
                            </button>
                        @endif
                    </div>
                    @if ($category->children->count())
                        <ul class="collapse ps-3 pt-2" id="cat{{ $category->id }}">
                            @foreach ($category->children as $sub)
                                <li>
                                    <a href="{{ route('category.show', $sub->id) }}">{{ $sub->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

<style>
    .list-group-item a {
        text-decoration: none;
        color: #333;
        font-weight: 500;
    }

    .collapse li a {
        display: block;
        padding: 5px 0;
        color: #555;
    }

    .collapse li a:hover {
        color: #000;
    }

    .btn.btn-sm {
        font-size: 1rem;
        line-height: 1;
        background: none;
        border: none;
    }
</style>
