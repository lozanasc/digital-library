
<?php $__env->startSection('admin_root'); ?>
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Request List</h3>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">Name</th>
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
                                        <td><?php echo e($book->request_name); ?></td>
                                        <td><?php echo e($book->book_name); ?></td>
                                        <td><?php echo e($book->status); ?></td>
                                        <td><?php echo e($book->return_date); ?></td>
                                        <td>
                                    <?php if($book->status === "Pending"): ?>
                                      <a href="<?php echo e(route('approveRequest', $book->id)); ?>" type="button" class="btn btn-success">Approve</a> 
                                    <?php endif; ?>
                                      <a href="<?php echo e(route('cancelRequest', $book->id)); ?>" type="button" class="btn <?php if($book->status == "Pending" || "Returned"): ?> btn-danger <?php else: ?>  btn-success <?php endif; ?>">
                                        <?php if($book->status === "Pending"): ?>
                                        Reject
                                        <?php elseif($book->status === "Returned"): ?>
                                        Delete
                                        <?php else: ?>
                                        Returned
                                        <?php endif; ?>
                                      </a>
                                    </td>
                                    </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <h3>
                            No requests found!
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
<?php echo $__env->make('auth0.admin.layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Repositories\Projects\digital-library\resources\views/auth0/admin/request/request.blade.php ENDPATH**/ ?>