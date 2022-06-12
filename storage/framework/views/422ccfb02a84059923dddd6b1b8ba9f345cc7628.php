
<?php $__env->startSection('user_root'); ?>
<div class="container">
    <div class="row">
        <div>
            <h2 class="mb-3">Newest Book Additions </h2>
        </div>
        <div>
            <div  class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                        <?php if(count($newest_books) > 0): ?>
                            <?php $__currentLoopData = $newest_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($book->physical_qty > 0 || $book->digital_copy !== ""): ?>
                                <div class="col-md-4 mb-3">
                                    <a class="card" style="cursor: pointer;" href="<?php echo e(route('preview', $book->id)); ?>">
                                        <img class="img-fluid" alt="100%x280" src="<?php echo e(Storage::url($book->book_cover)); ?>">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo e($book->name); ?></h4>
                                            <p class="card-text truncate"><?php echo e($book->synopsis); ?></p>
                                        </div>
                                    </a>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <h3 style="text-align: center;">
                                Stay tune for new book additions!
                            </h3>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth0.user.layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Repositories\Projects\Commission\digital-library\resources\views/auth0/user/home/home.blade.php ENDPATH**/ ?>