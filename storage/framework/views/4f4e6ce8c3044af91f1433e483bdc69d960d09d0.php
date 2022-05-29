
<?php $__env->startSection('admin_root'); ?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <form action="<?php echo e(route("search")); ?>" method="POST" role="search" class="mb-4">
            <?php echo csrf_field(); ?>
            <input type="text" placeholder="Search any book" id="query" name="query" class="form-control mt-0">
        </form>
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">List of Books</h3>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter by Subject
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item" href="<?php echo e(route('filterBySubject', $subject)); ?>"><?php echo e($subject); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Cover</th>
                                <th class="border-top-0">ISBN</th>
                                <th class="border-top-0">Title</th>
                                <th class="border-top-0">Author</th>
                                <th class="border-top-0">Subject</th>
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
                                            <td><?php echo e($book->subject); ?></td>
                                            <td><?php echo e($book->physical_qty); ?></td>
                                            <td><?php echo e($book->date_published); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('to_edit_book', $book->id)); ?>" type="button" class="btn btn-success mr-2">Update</button>
                                                <a href="<?php echo e(route('deleteBook', $book->id)); ?>" type="button" class="btn btn-danger">Delete</a>
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
<?php echo $__env->make('auth0.admin.layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Repositories\Projects\digital-library\resources\views/auth0/admin/books/list.blade.php ENDPATH**/ ?>