<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="">
    <meta property="og:site_name" content="<?php echo e(env('APP_NAME')); ?>">
    <meta property="og:image" content="<?php echo e(asset(optional($web_settings->get_logo)->file_url ?? 'frontEnd/images/no_image.png')); ?>">
    <meta property="og:title" content="<?php echo e(env('APP_NAME')); ?>">
    <meta property="og:description" content="">
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:type" content="e-commerce">
    <meta name="twitter:title" content="<?php echo e(env('APP_NAME')); ?>">
    <meta name="twitter:description" content="">

    <link rel="shortcut icon"
        href="<?php echo e(asset(optional($web_settings->get_fav)->file_url ?? 'frontEnd/images/no_image.png')); ?>">
    
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">
    
    
    
    <link rel="stylesheet" href="<?php echo e(asset('frontEnd/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontEnd/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontEnd/css/style1.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('frontEnd/plugins/owl-carousel/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontEnd/plugins/owl-carousel/owl.theme.default.min.css')); ?>">
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontEnd/plugins/toastr/toastr.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Global Lazy Loading Styles */
        img[loading="lazy"] {
            content-visibility: auto;
        }
    </style>

    <?php echo $__env->yieldContent('style'); ?>

    <script>
        window.dataLayer = window.dataLayer || [];
    </script>

    <!-- Google Tag Manager (GTM) -->
    <?php if(isset($globalSetting['google_trackings']) && is_array($globalSetting['google_trackings'])): ?>
        <?php $__currentLoopData = $globalSetting['google_trackings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gtm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($gtm['tracking_id']) && isset($gtm['status']) && $gtm['status'] == 1): ?>
                <script>
                    (function(w, d, s, l, i) {
                        w[l] = w[l] || [];
                        w[l].push({
                            'gtm.start': new Date().getTime(),
                            event: 'gtm.js'
                        });
                        var f = d.getElementsByTagName(s)[0],
                            j = d.createElement(s),
                            dl = l != 'dataLayer' ? '&l=' + l : '';
                        j.async = true;
                        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                        f.parentNode.insertBefore(j, f);
                    })
                    (window, document, 'script', 'dataLayer', '<?php echo e($gtm['tracking_id']); ?>');
                </script>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <!-- Facebook Pixel -->
    <?php if(isset($globalSetting['fb_pixels']) && is_array($globalSetting['fb_pixels'])): ?>
        <?php $__currentLoopData = $globalSetting['fb_pixels']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pixel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($pixel['pixel_id']) && isset($pixel['status']) && $pixel['status'] == 1): ?>
                <script>
                    ! function(f, b, e, v, n, t, s) {
                        if (f.fbq) return;
                        n = f.fbq = function() {
                            n.callMethod ?
                                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                        };
                        if (!f._fbq) f._fbq = n;
                        n.push = n;
                        n.loaded = !0;
                        n.version = '2.0';
                        n.queue = [];
                        t = b.createElement(e);
                        t.async = !0;
                        t.src = v;
                        s = b.getElementsByTagName(e)[0];
                        s.parentNode.insertBefore(t, s)
                    }(window, document, 'script',
                        'https://connect.facebook.net/en_US/fbevents.js');
                    fbq('init', '<?php echo e($pixel['pixel_id']); ?>');
                    fbq('track', 'PageView');
                </script>
                <noscript>
                    <img height="1" width="1" style="display:none"
                        src="https://www.facebook.com/tr?id=<?php echo e($pixel['pixel_id']); ?>&ev=PageView&noscript=1" />
                </noscript>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('tracking'); ?>
</head>

<body style="position: relative">
    <!-- Google Tag Manager Data Layer (noscript) -->
    <?php if(isset($globalSetting['google_trackings']) && is_array($globalSetting['google_trackings'])): ?>
        <?php $__currentLoopData = $globalSetting['google_trackings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gtm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($gtm['tracking_id']) && isset($gtm['status']) && $gtm['status'] == 1): ?>
                <noscript>
                    <iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo e($gtm['tracking_id']); ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe>
                </noscript>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!-- End Google Tag Manager (noscript) -->

    <div class="main-wrapper">
        <?php echo $__env->make('inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('body'); ?>

        <?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="fixed-contact-buttons">
        <a href="<?php echo e($web_settings->website_phone3 ? 'https://wa.me/88' . $web_settings->website_phone3 : '#'); ?>"
            target="_blank" class="whatsapp-button">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="tel:<?php echo e($web_settings->website_phone); ?>" class="call-button">
            <i class="fas fa-phone"></i>
        </a>
        <a href="<?php echo e($web_settings->website_messenger ?: '#'); ?>" target="_blank" class="messenger-button">
            <i class="fab fa-facebook-messenger"></i>
        </a>
    </div>

    
    <script src="<?php echo e(asset('frontEnd/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontEnd/js/bootstrap.bundle.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('frontEnd/plugins/owl-carousel/owl.carousel.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('frontEnd/plugins/toastr/toastr.min.js')); ?>"></script>
    <script>
        <?php if(session()->has('success')): ?>
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>
        <?php if(Session::has('info')): ?>
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.info("<?php echo e(session('info')); ?>");
        <?php endif; ?>
        <?php if(Session::has('warning')): ?>
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.warning("<?php echo e(session('warning')); ?>");
        <?php endif; ?>
    </script>

    <script>
        $('#account-btn').on('click', function() {
            $('.login-float').toggle()
        });

        $('#header-top-menu-btn').on('click', function() {
            $('.header-top-menu-m').toggle()
        });

        $('#cat_menu_mobile_btn').on('click', function() {
            $('.cat_menu_m').toggle()
        });

        $('#search_mobile_btn').on('click', function() {
            $('.search-form-m').toggle()
        });

        $('.search_btnclose').on('click', function() {
            $('.search-form-m').toggle()
        });

        function search() {
            // document.getElementById('search-form-menu').classList.toggle('toggle-search');
            $('#search-form-menu').toggleClass('toggle-search')
        }
    </script>

    <script>
        function addToWishlist(productId) {
            $.ajax({
                url: "<?php echo e(route('add.wishlist')); ?>",
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    product_id: productId
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $('.wishlist').load(location.href + ' .wishlist > *');
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('An error occurred while adding to wishlist.');
                }
            });
        }

        function removeFromWishlist(id) {
            if (confirm("Are you sure you want to remove this item from your wishlist?")) {
                $.ajax({
                    url: "<?php echo e(route('remove.wishlist')); ?>",
                    type: "POST",
                    data: {
                        id: id,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            $('#wishlist-table').load(location.href + ' #wishlist-table > *');
                            $('.wishlist').load(location.href + ' .wishlist > *');
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        toastr.error("An error occurred while removing the item.");
                    }
                });
            }
        }
    </script>
    <script>
        const typingInputs = document.getElementsByClassName("typingInput");
        const phrases = [
            "Search for products...",
            "Search for something...",
            "One more search...",
            "What are you looking for?"
        ];
        let phraseIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function typeEffect() {
            const currentPhrase = phrases[phraseIndex];
            if (!isDeleting && charIndex <= currentPhrase.length) {
                for (let i = 0; i < typingInputs.length; i++) {
                    typingInputs[i].placeholder = currentPhrase.substring(0, charIndex) + ' |';
                }
                charIndex++;
                if (charIndex > currentPhrase.length) {
                    isDeleting = true;
                    setTimeout(typeEffect, 1500);
                } else {
                    setTimeout(typeEffect, 100);
                }
            } else if (isDeleting && charIndex >= 0) {
                for (let i = 0; i < typingInputs.length; i++) {
                    typingInputs[i].placeholder = currentPhrase.substring(0, charIndex) + ' |';
                }
                charIndex--;
                if (charIndex < 0) {
                    isDeleting = false;
                    phraseIndex = (phraseIndex + 1) % phrases.length;
                    setTimeout(typeEffect, 500);
                } else {
                    setTimeout(typeEffect, 50);
                }
            }
        }

        typeEffect();
    </script>



    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\cache-xeiver\resources\views/layouts/master.blade.php ENDPATH**/ ?>