<?php $__env->startSection('title'); ?>
    About Us
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <section>
        <div class="category_breadcrumb">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12">
                        <p>
                            <a href="<?php echo e(route('home')); ?>">Home</a>
                            /
                            <a href="javascript:void(0);">About Us</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="cart-section my-4 my-md-5">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                            <h4 class="font-weight-bold mb-4 border-bottom pb-2">আমাদের সম্পর্কে</h4>
                            <div class="page-content" style="line-height: 1.8; color: #333;">
                                <?php if(!empty($content)): ?>
                                    <?php echo $content; ?>

                                <?php elseif(!empty($data->about_us)): ?>
                                    <?php echo $data->about_us; ?>

                                <?php else: ?>
                                    <p class="text-muted">কোনো তথ্য পাওয়া যায়নি।</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cache-xeiver\resources\views/pages/about_us.blade.php ENDPATH**/ ?>