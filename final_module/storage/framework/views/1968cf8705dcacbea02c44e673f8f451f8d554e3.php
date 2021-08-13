
<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('food.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <legend>Form title</legend>
    <div class="form-group">
        <label for="">food_name</label>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">category</label>
        <select name="category_id" id="input" class="form-control" required="required">
            <option value="">---Lựa chọn danh mục---</option>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?> </option>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">price</label>
        <input type="number" name="price" value="<?php echo e(old('price')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">price_discount</label>
        <input type="text" name="price_discount" value="<?php echo e(old('price_discount')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">image</label>
        <input type="file" name="file"  class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">description</label>
        <textarea name="description" id="summernote" cols="30" rows="10"><?php echo e(old('description')); ?></textarea>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
       	 <div class="alert alert-danger"><?php echo e($message); ?></div>
       	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <label for="">Ưu đãi</label>
        <div class="radio">
            <label>
                <input type="radio" name="status"  value="1" checked="checked">
                Có
            </label>
            <label>
                <input type="radio" name="status"  value="0" checked="checked">
                Không
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="">Món ăn đề cử</label>
        <div class="radio">
            <label>
                <input type="radio" name="on_sale"  value="1" checked="checked">
                Có
            </label>
            <label>
                <input type="radio" name="on_sale"  value="0" checked="checked">
                Không
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="">coupon</label>
        <input type="text" name="coupon" value="<?php echo e(old('coupon')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">count_coupon</label>
        <input type="text" name="count_coupon" value="<?php echo e(old('count_coupon')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Thời gian chuẩn bị</label>
        <input type="text" name="time_preparation" value="<?php echo e(old('time_preparation')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Tên nhà hàng</label>
        <input type="text" name="restaurant_name" value="<?php echo e(old('restaurant_name')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Địa chỉ nhà hàng</label>
        <input type="text" name="restaurant_address" value="<?php echo e(old('restaurant_address')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Giờ mở cửa</label>
        <input type="text" name="time_open" value="<?php echo e(old('time_open')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Giờ đóng cửa</label>
        <input type="text" name="time_close" value="<?php echo e(old('time_close')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Dịch vụ</label>
        <input type="text" name="service" value="<?php echo e(old('service')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">hotline nhà hàng</label>
        <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Giải thích</label>
        <input type="text" name="explain" value="<?php echo e(old('phone')); ?>" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">hashtag</label>
        <input type="text" name="tag" value="<?php echo e(old('tag')); ?>" class="form-control" id="" placeholder="Input field">
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('Admin/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
  })
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('Admin/plugins/summernote/summernote-bs4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\final\final_module\resources\views/Admin/Food/create.blade.php ENDPATH**/ ?>