
<?php $__env->startSection('user_root'); ?>
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">My Books</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Title</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Return Date</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($books) > 0): ?>
                                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($book->book_name); ?></td>
                                            <td><?php echo e($book->status); ?></td>
                                            <td><?php echo e($book->return_date); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('cancelRequest', $book->id)); ?>" type="button" class="btn btn-danger">Cancel</a>
                                            </td>
                                        </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <h3>
                                No books found!
                            </h3>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth0.user.layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Repositories\Projects\digital-library\resources\views/auth0/user/books/my.blade.php ENDPATH**/ ?>