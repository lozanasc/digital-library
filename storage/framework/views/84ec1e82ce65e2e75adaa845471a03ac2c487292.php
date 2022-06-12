
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
                <div class="user-bg"> <img width="100%" alt="user" src="<?php echo e(auth()->user()->picture); ?>">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)"><img src="<?php echo e(auth()->user()->picture); ?>"
                                    class="thumb-lg img-circle" alt="img"></a>
                            <h4 class="text-white mt-2"><?php echo e(auth()->user()->nickname); ?></h4>
                            <h5 class="text-white mt-2"><?php echo e(auth()->user()->email); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="user-btm-box mt-5 d-md-flex">
                    Last Login: <?php echo e(auth()->user()->updated_at); ?>

                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route("edit_user", auth()->user()->email)); ?>" method="POST" class="form-horizontal form-material">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Full Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input disabled type="text" placeholder="Johnathan Doe"
                                    value="<?php echo e(auth()->user()->name); ?>"
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input disabled type="email" placeholder="your@email.com"
                                    value="<?php echo e(auth()->user()->email ?? "N/A"); ?>"
                                    class="form-control p-0 border-0" name="example-email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Contact</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Your contact details here"
                                    value="<?php echo e($add_user_info->contact ?? "N/A"); ?>"
                                    class="form-control p-0 border-0" name="contact"
                                    id="contact">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Address</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Your address here"
                                    value="<?php echo e($add_user_info->address ?? "N/A"); ?>"
                                    class="form-control p-0 border-0" name="address"
                                    id="address">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Update User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth0.user.layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Repositories\Projects\Commission\digital-library\resources\views/auth0/user/profile/profile.blade.php ENDPATH**/ ?>