
<?php $__env->startSection('main'); ?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>category_id</th>
            <th>restaurant_id</th>
            <th>price</th>
            <th>price_discount</th>
            <th>sell_quantity</th>
            <th>image</th>
            <th>description</th>
            <th>status</th>
            <th>on_sale</th>
            <th>user_id</th>
            <th>coupon</th>
            <th>count_coupon</th>
            <th>time_preparation</th>
            <th>view_count</th>
            <th>Action</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($food->id); ?></td>
            <td><?php echo e($food->name); ?></td>
            <td><?php echo e($food->category_id); ?></td>
            <td><?php echo e($food->restaurant_id); ?></td>
            <td><?php echo e($food->price); ?></td>
            <td><?php echo e($food->price_discount); ?></td>
            <td><?php echo e($food->sell_quantity); ?></td>
            <td><?php echo e($food->image); ?></td>
            <td><?php echo e($food->description); ?></td>
            <td><?php echo e($food->status); ?></td>
            <td><?php echo e($food->on_sale); ?></td>
            <td><?php echo e($food->user_id); ?></td>
            <td><?php echo e($food->coupon); ?></td>
            <td><?php echo e($food->count_coupon); ?></td>
            <td><?php echo e($food->time_preparation); ?></td>
            <td><?php echo e($food->view_count); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\final\final_module\resources\views/Admin/Food/index.blade.php ENDPATH**/ ?>