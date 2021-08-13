
<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('category.update',$category->id)); ?>" method="POST" role="form">
    <?php echo csrf_field(); ?>
    <legend>Form title</legend>
    <div class="form-group">
        <label for="">name</label>
        <input type="text" name="name" value="<?php echo e($category->name); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <small class="help-block"><?php echo e($message); ?></small>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\final\final_module\resources\views/Admin/Category/edit.blade.php ENDPATH**/ ?>