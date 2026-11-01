<header class="header">
    <div class="header-top">
        <div class="custom-container">
            <div class="large-device-header">
                <div class="logo">
                    <a href="<?php echo e(url('/')); ?>"><img
                            src="<?php echo e($web_settings->get_logo ? asset($web_settings->get_logo->file_url) : asset('frontEnd/images/no_image.png')); ?>"
                            alt=""></a>
                </div>
                <form action="<?php echo e(route('search')); ?>" method="GET" class="search-form">
                    <div class="search">
                        <input type="text" name="query" placeholder="" value="<?php echo e(request()->input('query')); ?>"
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
                        <?php if(\Cart::getContent()->count() > 0): ?>
                            <a href="<?php echo e(route('checkout')); ?>">
                                <span class="amount">TK <?php echo e(\Cart::getTotal()); ?></span>
                                <span class="cart-count">
                                    <span><?php echo e(\Cart::getContent()->count()); ?></span>
                                </span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('checkout')); ?>">
                                <span class="amount">TK 0</span>
                                <span class="cart-count">
                                    0
                                </span>
                            </a>
                        <?php endif; ?>

                    </div>
                    <div class="wishlist">
                        <a href="<?php echo e(route('wishlist')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                            </svg>
                        </a>
                        <?php if(count(session()->get('wishlist', [])) > 0): ?>
                            <span class="wishlist-count">
                                <?php echo e(count(session()->get('wishlist', []))); ?>

                            </span>
                        <?php else: ?>
                            <span class="wishlist-count"> 0</span>
                        <?php endif; ?>
                    </div>
                    <div class="user">
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(route('profile')); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('user.login')); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </a>
                        <?php endif; ?>
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
                    <a href="<?php echo e(url('/')); ?>"><img
                            src="<?php echo e($web_settings->get_logo ? asset($web_settings->get_logo->file_url) : asset('frontEnd/images/no_image.png')); ?>"
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
                    <a href="<?php echo e(route('home')); ?>">
                        Home
                    </a>
                </li>
                <?php $__currentLoopData = $menu_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('category.show', $cat->id)); ?>">
                            <span><?php echo e($cat->category_name); ?></span>
                            <?php if(count($cat->children) > 0): ?>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 9l6 6l6 -6" />
                                    </svg>
                                </span>
                            <?php endif; ?>
                        </a>
                        <?php if(count($cat->children) > 0): ?>
                            <ul class="submenu">
                                <?php $__currentLoopData = $cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a
                                            href="<?php echo e(route('category.show', $child->id)); ?>"><?php echo e($child->category_name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
        </div>
    </div>
</header>

<form action="<?php echo e(route('search')); ?>" method="GET" id="search-form-menu" class="search-form-menu "
    data-test="4">
    <div class="search-menu">
        <input type="text" name="query" placeholder="" value="<?php echo e(request()->input('query')); ?>"
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
        <a href="<?php echo e(url('/')); ?>">
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
        <a href="<?php echo e(route('wishlist')); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
            </svg>
            <span>Wishlist</span>
        </a>
        <?php if(count(session()->get('wishlist', [])) > 0): ?>
            <span class="wishlist-count">
                <?php echo e(count(session()->get('wishlist', []))); ?>

            </span>
        <?php else: ?>
            <span class="wishlist-count"> 0</span>
        <?php endif; ?>
    </div>
    <div class="cart">
        <a href="<?php echo e(route('checkout')); ?>">
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
        <?php if(\Cart::getContent()->count() > 0): ?>
            <span class="counter"><?php echo e(\Cart::getContent()->count()); ?></span>
        <?php else: ?>
            <span class="counter">0</span>
        <?php endif; ?>

    </div>
    <div class="m-user">
        <?php if(Auth::check()): ?>
            <a href="<?php echo e(route('profile')); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                <span><?php echo e(Auth::guard('web')->user()->name); ?></span>
            </a>
        <?php else: ?>
            <a href="<?php echo e(route('user.login')); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                <span>User</span>
            </a>
        <?php endif; ?>
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
            <?php $__currentLoopData = $menu_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?php echo e(route('category.show', $category->id)); ?>">
                            <?php echo e($category->category_name); ?>

                        </a>
                        <?php if(count($category->children) > 0): ?>
                            <button class="btn btn-sm" data-bs-toggle="collapse"
                                data-bs-target="#cat<?php echo e($category->id); ?>" aria-expanded="false"
                                aria-controls="cat<?php echo e($category->id); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 9l6 6l6 -6" />
                                </svg>
                            </button>
                        <?php endif; ?>
                    </div>
                    <?php if($category->children->count()): ?>
                        <ul class="collapse ps-3 pt-2" id="cat<?php echo e($category->id); ?>">
                            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('category.show', $sub->id)); ?>"><?php echo e($sub->category_name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH D:\xampp\htdocs\cache-xeiver\resources\views/inc/header.blade.php ENDPATH**/ ?>