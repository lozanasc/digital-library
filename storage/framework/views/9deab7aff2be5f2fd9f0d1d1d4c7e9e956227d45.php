
<?php $__env->startSection('user_root'); ?>
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="<?php echo e(Storage::url($info->book_cover)); ?>">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a><img src="<?php echo e(Storage::url($info->book_cover)); ?>"
                                class="thumb-lg img-circle" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="user-btm-box mt-5 d-md-flex">
                        <strong>Published Date: </strong> <?php echo e($info->date_published); ?>

                    </div>
                    <div class="user-btm-box mt-3 d-md-flex">
                        <strong>ISBN: </strong> <?php echo e($info->isbn_no); ?>

                    </div>
                    <div class="user-btm-box mt-3 d-md-flex">
                        <strong>Title: </strong> <?php echo e($info->name); ?>

                    </div>
                    <div class="user-btm-box mt-3 d-md-flex">
                        <strong>Physical Quantity: </strong> <?php echo e($info->physical_qty); ?>

                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('requestBook', $info->name)); ?>" method="POST" class="form-horizontal form-material">
                            <?php echo csrf_field(); ?>
                            <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Reason</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input  type="text" class="form-control p-0 border-0" name="reason" id="reason" placeholder="Short reason for borrowing the book"> 
                                </div>
                            </div>
                            <?php $__errorArgs = ['return_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Return Date</label>
                                <div class="form-check-label col-md-12">
                                    <input placeholder="Set date of return" type="date" name="return_date" id="return_date" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-success">Confirm Request</button>
                            <?php if($info->digital_copy !== ""): ?>
                            <a 
                                type="button" class="btn btn-success"
                                href="<?php echo e(Storage::url($info->digital_copy)); ?>"
                            >
                                Download Digital Copy
                            </a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth0.user.layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Repositories\Projects\digital-library\resources\views/auth0/user/books/request.blade.php ENDPATH**/ ?>