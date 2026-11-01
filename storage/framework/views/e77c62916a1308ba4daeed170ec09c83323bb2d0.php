<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('body'); ?>
    <div class="slider">
        <div class="images owl-carousel">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="image">
                    <a href="<?php echo e($item->slider_url ?? $item->button_url ?? 'javascript:void(0)'); ?>">
                        <img src="<?php echo e(!empty($item->get_img) ? asset($item->get_img->file_url) : (!empty($item->image_url) ? asset($item->image_url) : asset('frontEnd/images/no_image.png'))); ?>"
                            alt="<?php echo e($item->title ?? ''); ?>">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <?php if(isset($new_arrivals) && count($new_arrivals) > 0): ?>
        <div class="products">
            <div class="custom-container">
                <h2 class="section-title text-center">New Arrival Products
                    <?php if(count($new_arrivals) > 10): ?>
                        <a href="<?php echo e(route('products', ['filter' => 'new_arrival'])); ?>">
                            View All
                        </a>
                    <?php endif; ?>
                </h2>
                <div class="product-list">
                    <?php $__currentLoopData = $new_arrivals->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-item">
                            <a href="<?php echo e(route('product.details', $item->slug ?: $item->id)); ?>">
                                <div class="image">
                                    <img src="<?php echo e(!empty($item->get_thumb) ? asset($item->get_thumb->file_url) : (!empty($item->image_url) ? asset($item->image_url) : asset('frontEnd/images/no_image.png'))); ?>"
                                        class="thumb-img" alt="<?php echo e($item->name ?? ''); ?>">
                                    <?php if(!empty($item->get_hover) && !empty($item->get_hover->file_url)): ?>
                                        <img src="<?php echo e(asset($item->get_hover->file_url)); ?>" alt="<?php echo e($item->name ?? ''); ?>" class="hover-img">
                                    <?php elseif(!empty($item->hover_image)): ?>
                                        <img src="<?php echo e(asset($item->hover_image)); ?>" alt="<?php echo e($item->name ?? ''); ?>" class="hover-img">
                                    <?php endif; ?>
                                </div>
                                <span class="product-name"><?php echo e($item->name ?? ''); ?></span>
                            </a>
                            <div class="absolute-product">
                                <?php if((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0)): ?>
                                    <div class="discount">
                                        <?php echo e(round(((($item->price - $item->sale_price) / $item->price) * 100))); ?> %
                                    </div>
                                <?php endif; ?>
                                <div class="wishlist-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        onclick="addToWishlist(<?php echo e($item->id); ?>)" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </div>
                            </div>
                            <div class="prices">
                                <?php if((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0)): ?>
                                    <span class="price">TK <?php echo e(number_format((float)$item->sale_price, 2)); ?></span>
                                    <span class="old-price">TK <?php echo e(number_format((float)$item->price, 2)); ?></span>
                                <?php else: ?>
                                    <span class="price">TK <?php echo e(number_format((float)((float)($item->sale_price ?? 0) > 0 ? $item->sale_price : ($item->price ?? 0)), 2)); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if(isset($hot_sale) && count($hot_sale) > 0): ?>
        <div class="products">
            <div class="custom-container">
                <h2 class="section-title text-center">Hot Sale
                    <?php if(count($hot_sale) > 10): ?>
                        <a href="<?php echo e(route('products', ['filter' => 'hot_sale'])); ?>">
                            View All
                        </a>
                    <?php endif; ?>
                </h2>
                <div class="product-list">
                    <?php $__currentLoopData = $hot_sale->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-item">
                            <a href="<?php echo e(route('product.details', $item->slug ?: $item->id)); ?>">
                                <div class="image">
                                    <img src="<?php echo e(!empty($item->get_thumb) ? asset($item->get_thumb->file_url) : (!empty($item->image_url) ? asset($item->image_url) : asset('frontEnd/images/no_image.png'))); ?>"
                                        class="thumb-img" alt="<?php echo e($item->name ?? ''); ?>">
                                    <?php if(!empty($item->get_hover) && !empty($item->get_hover->file_url)): ?>
                                        <img src="<?php echo e(asset($item->get_hover->file_url)); ?>" alt="<?php echo e($item->name ?? ''); ?>"
                                            class="hover-img">
                                    <?php elseif(!empty($item->hover_image)): ?>
                                        <img src="<?php echo e(asset($item->hover_image)); ?>" alt="<?php echo e($item->name ?? ''); ?>"
                                            class="hover-img">
                                    <?php endif; ?>
                                </div>
                                <span class="product-name"><?php echo e($item->name ?? ''); ?></span>
                            </a>
                            <div class="absolute-product">
                                <?php if((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0)): ?>
                                    <div class="discount">
                                        <?php echo e(round(((($item->price - $item->sale_price) / $item->price) * 100))); ?> %
                                    </div>
                                <?php endif; ?>
                                <div class="wishlist-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        onclick="addToWishlist(<?php echo e($item->id); ?>)" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </div>
                            </div>
                            <div class="prices">
                                <?php if((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0)): ?>
                                    <span class="price">TK <?php echo e(number_format((float)$item->sale_price, 2)); ?></span>
                                    <span class="old-price">TK <?php echo e(number_format((float)$item->price, 2)); ?></span>
                                <?php else: ?>
                                    <span class="price">TK <?php echo e(number_format((float)((float)($item->sale_price ?? 0) > 0 ? $item->sale_price : ($item->price ?? 0)), 2)); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if(isset($trending) && count($trending) > 0): ?>
        <div class="products">
            <div class="custom-container">
                <h2 class="section-title text-center">Trending Products
                    <?php if(count($trending) > 10): ?>
                        <a href="<?php echo e(route('products', ['filter' => 'trending'])); ?>">
                            View All
                        </a>
                    <?php endif; ?>
                </h2>
                <div class="product-list">
                    <?php $__currentLoopData = $trending->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-item">
                            <a href="<?php echo e(route('product.details', $item->slug ?: $item->id)); ?>">
                                <div class="image">
                                    <img src="<?php echo e(!empty($item->get_thumb) ? asset($item->get_thumb->file_url) : (!empty($item->image_url) ? asset($item->image_url) : asset('frontEnd/images/no_image.png'))); ?>"
                                        class="thumb-img" alt="<?php echo e($item->name ?? ''); ?>">
                                    <?php if(!empty($item->get_hover) && !empty($item->get_hover->file_url)): ?>
                                        <img src="<?php echo e(asset($item->get_hover->file_url)); ?>" alt="<?php echo e($item->name ?? ''); ?>"
                                            class="hover-img">
                                    <?php elseif(!empty($item->hover_image)): ?>
                                        <img src="<?php echo e(asset($item->hover_image)); ?>" alt="<?php echo e($item->name ?? ''); ?>"
                                            class="hover-img">
                                    <?php endif; ?>
                                </div>
                                <span class="product-name"><?php echo e($item->name ?? ''); ?></span>
                            </a>
                            <div class="absolute-product">
                                <?php if((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0)): ?>
                                    <div class="discount">
                                        <?php echo e(round(((($item->price - $item->sale_price) / $item->price) * 100))); ?> %
                                    </div>
                                <?php endif; ?>
                                <div class="wishlist-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        onclick="addToWishlist(<?php echo e($item->id); ?>)" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </div>
                            </div>
                            <div class="prices">
                                <?php if((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0)): ?>
                                    <span class="price">TK <?php echo e(number_format((float)$item->sale_price, 2)); ?></span>
                                    <span class="old-price">TK <?php echo e(number_format((float)$item->price, 2)); ?></span>
                                <?php else: ?>
                                    <span class="price">TK <?php echo e(number_format((float)((float)($item->sale_price ?? 0) > 0 ? $item->sale_price : ($item->price ?? 0)), 2)); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if(isset($featured) && count($featured) > 0): ?>
        <div class="products">
            <div class="custom-container">
                <h2 class="section-title text-center">Featured Products
                    <?php if(count($featured) > 10): ?>
                        <a href="<?php echo e(route('products', ['filter' => 'featured'])); ?>">
                            View All
                        </a>
                    <?php endif; ?>
                </h2>
                <div class="product-list">
                    <?php $__currentLoopData = $featured->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-item">
                            <a href="<?php echo e(route('product.details', $item->slug ?: $item->id)); ?>">
                                <div class="image">
                                    <img src="<?php echo e(!empty($item->get_thumb) ? asset($item->get_thumb->file_url) : (!empty($item->image_url) ? asset($item->image_url) : asset('frontEnd/images/no_image.png'))); ?>"
                                        class="thumb-img" alt="<?php echo e($item->name ?? ''); ?>">
                                    <?php if(!empty($item->get_hover) && !empty($item->get_hover->file_url)): ?>
                                        <img src="<?php echo e(asset($item->get_hover->file_url)); ?>" alt="<?php echo e($item->name ?? ''); ?>"
                                            class="hover-img">
                                    <?php elseif(!empty($item->hover_image)): ?>
                                        <img src="<?php echo e(asset($item->hover_image)); ?>" alt="<?php echo e($item->name ?? ''); ?>"
                                            class="hover-img">
                                    <?php endif; ?>
                                </div>
                                <span class="product-name"><?php echo e($item->name ?? ''); ?></span>
                            </a>
                            <div class="absolute-product">
                                <?php if((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0)): ?>
                                    <div class="discount">
                                        <?php echo e(round(((($item->price - $item->sale_price) / $item->price) * 100))); ?> %
                                    </div>
                                <?php endif; ?>
                                <div class="wishlist-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        onclick="addToWishlist(<?php echo e($item->id); ?>)" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </div>
                            </div>
                            <div class="prices">
                                <?php if((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0)): ?>
                                    <span class="price">TK <?php echo e(number_format((float)$item->sale_price, 2)); ?></span>
                                    <span class="old-price">TK <?php echo e(number_format((float)$item->price, 2)); ?></span>
                                <?php else: ?>
                                    <span class="price">TK <?php echo e(number_format((float)((float)($item->sale_price ?? 0) > 0 ? $item->sale_price : ($item->price ?? 0)), 2)); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                margin: 20,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        loop: false
                    }
                }
            });

            $('.owl-nav').remove();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cache-xeiver\resources\views/index.blade.php ENDPATH**/ ?>