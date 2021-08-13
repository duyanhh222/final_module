
<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Banner -->
    <?php echo $__env->make('Client.Home.bannerheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Deals of the week -->
    <!-- Popular Categories -->
    <?php echo $__env->make('Client.Home.dealofweek', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Banner -->
    <?php echo $__env->make('Client.Home.banner2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Hot New Arrivals -->
    <?php echo $__env->make('Client.Home.hotnew', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Best Sellers -->
    <?php echo $__env->make('Client.Home.bestseller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Adverts -->
    <!-- Trends -->
    <?php echo $__env->make('Client.Home.trend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Reviews -->
    <!-- Recently Viewed -->
    <?php echo $__env->make('Client.Home.reviewviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Client.Home.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\final\final_module\resources\views/Client/home.blade.php ENDPATH**/ ?>