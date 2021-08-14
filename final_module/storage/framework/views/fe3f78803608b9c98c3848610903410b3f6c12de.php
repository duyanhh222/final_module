
<?php $__env->startSection('main'); ?>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Category_name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($category->id); ?></td>
                <td><?php echo e($category->name); ?></td>
                <td>
                    <a href="<?php echo e(route('category.edit',$category->id)); ?>" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?php echo e(route('category.destroy',$category->id)); ?>" class="btn btn-sm btn-danger btndelete" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php echo e($categories->appends(request()->all())->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\final\final_module\resources\views/Admin/Category/index.blade.php ENDPATH**/ ?>