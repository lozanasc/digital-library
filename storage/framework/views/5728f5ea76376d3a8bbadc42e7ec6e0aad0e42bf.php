
<?php $__env->startSection('user_root'); ?>
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">List of Books</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Cover</th>
                                <th class="border-top-0">ISBN</th>
                                <th class="border-top-0">Title</th>
                                <th class="border-top-0">Author</th>
                                <th class="border-top-0">Physical Qty</th>
                                <th class="border-top-0">Publication Date</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($books) > 0): ?>
                                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($book->physical_qty > 0 || $book->digital_copy !== ""): ?>
                                        <tr>
                                            <td>
                                            <img src="<?php echo e(Storage::url($book->book_cover)); ?>" alt="Cover of the book" height="160" width="128">
                                            </td>
                                            <td><?php echo e($book->isbn_no); ?></td>
                                            <td><?php echo e($book->name); ?></td>
                                            <td><?php echo e($book->author); ?></td>
                                            <td><?php echo e($book->physical_qty); ?></td>
                                            <td><?php echo e($book->date_published); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('requestBookPreview', $book->id)); ?>" type="button" class="btn btn-primary">Request</a>
                                                <a href="<?php echo e(route('preview', $book->id)); ?>"  type="button" class="btn btn-warning">Preview</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
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
<?php echo $__env->make('auth0.user.layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Repositories\Projects\Commission\Jericho\resources\views/auth0/user/books/list.blade.php ENDPATH**/ ?>