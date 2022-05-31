
<?php $__env->startSection('admin_root'); ?>
<div class="row justify-content-center">
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Books Enrolled</h3>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash"><canvas width="67" height="30"
                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-success"><?php echo e($book_count); ?></span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Pending Book Requests</h3>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash2"><canvas width="67" height="30"
                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-purple"><?php echo e($pending_count); ?></span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Book Requests</h3>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash3"><canvas width="67" height="30"
                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-info"><?php echo e($request_count); ?></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Activity Logs</h3>
                <div class="table-responsive">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter by Role
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo e(route('filterByRole', "admin")); ?>">Admin</a>
                            <a class="dropdown-item" href="<?php echo e(route('filterByRole', "user")); ?>">User</a>
                        </div>
                    </div>
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Activity</th>
                                <th class="border-top-0">Changes</th>
                                <th class="border-top-0">Role</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($logs) > 0): ?>
                                <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($log->name); ?></td>
                                            <td><?php echo e($log->activity); ?></td>
                                            <td><?php echo e($log->changes); ?></td>
                                            <td><?php echo e($log->role); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('view_log', $log->id)); ?>" type="button" class="btn btn-success mr-2">Preview</button>
                                            </td>
                                        </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <h3>
                                No acitivites recorded!
                            </h3>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth0.admin.layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Repositories\Projects\digital-library\resources\views/auth0/admin/home/home.blade.php ENDPATH**/ ?>