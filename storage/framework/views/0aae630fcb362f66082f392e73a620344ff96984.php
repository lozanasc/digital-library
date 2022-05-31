
<?php $__env->startSection('admin_root'); ?>
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
                        <h3>Editing Book</h3>
                        <hr>
                        <form action="<?php echo e(route('editBook', $info->id)); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mb-4">
                          <?php $__errorArgs = ['isbn'];
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
                          <label for="isbn" class="col-md-12 p-0"> ISBN</label>
                          <div class="col-md-12 border-bottom p-0">
                              <input 
                                type="text" 
                                placeholder="Book's ISBN Number"
                                class="form-control p-0 border-0" 
                                name="isbn" 
                                id="isbn">
                          </div>
                          </div>
                          <div class="form-group mb-4">
                              <?php $__errorArgs = ['title'];
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
                              <label class="col-md-12 p-0">Title</label>
                              <div class="col-md-12 border-bottom p-0">
                                <input 
                                  type="text" 
                                  placeholder="Book's Title"
                                  class="form-control p-0 border-0"
                                  name="title"
                                  id="title"> 
                              </div>
                          </div>
                          <div class="form-group mb-4">
                              <?php $__errorArgs = ['author'];
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
                              <label for="author" class="col-md-12 p-0">Author</label>
                              <div class="col-md-12 border-bottom p-0">
                                  <input type="text" placeholder="Book's Author"
                                      class="form-control p-0 border-0" name="author"
                                      id="author">
                              </div>
                          </div>
                          <div class="form-group mb-4">
                              <?php $__errorArgs = ['physical_qty'];
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
                              <label for="quantity" class="col-md-12 p-0">Available Physical Quantity</label>
                              <div class="col-md-12 border-bottom p-0">
                                  <input type="number" placeholder="Book's physical quantity"
                                      class="form-control p-0 border-0" name="physical_qty"
                                      id="physical_qty">
                              </div>
                          </div>
                          <div class="form-group mb-4">
                              <?php $__errorArgs = ['subject'];
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
                              <label for="subject" class="col-md-12 p-0">Subject</label>
                              <div class="col-md-12 border-bottom p-0">
                                  <input type="text" placeholder="Book's subject"
                                      class="form-control p-0 border-0" name="subject"
                                      id="subject">
                              </div>
                          </div>
                          <div class="form-group mb-4">
                              <label class="col-md-12 p-0">Date Published</label>
                              <div class="form-check-label col-md-12">
                                <input placeholder="Set publisher date" type="date" name="date_published" id="date_published" class="form-control">
                              </div>
                          </div>
                          <div class="form-group mb-4">
                              <?php $__errorArgs = ['synopsis'];
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
                              <label for="quantity" class="col-md-12 p-0">Synopsis</label>
                              <div class="col-md-12 border-bottom p-0">
                                  <textarea rows="5" class="form-control p-0 border-0" name="synopsis" id="synopsis"></textarea>
                              </div>
                          </div>
                          <div class="form-group mb-4">
                              <?php $__errorArgs = ['book_cover'];
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
                              <label for="quantity" class="col-md-12 p-0">Attach Book Cover</label>
                              <div class="col-md-12 border-bottom p-0">
                                <input type="file" id="book_cover" name="book_cover" aria-describedby="book_cover">
                              </div>
                          </div>
                          <div class="form-group mb-4">
                              <?php $__errorArgs = ['digital_copy'];
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
                              <label for="quantity" class="col-md-12 p-0">Attach Digital Copy</label>
                              <div class="col-md-12 border-bottom p-0">
                                <input type="file" id="digital_copy" name="digital_copy" aria-describedby="digital_copy">
                              </div>
                          </div>
                          <div class="form-group mb-4">
                              <label class="col-md-12 p-0">Additional Notes</label>
                              <div class="col-md-12 border-bottom p-0">
                                  <textarea rows="2" class="form-control p-0 border-0" name="notes" id="notes"></textarea>
                              </div>
                          </div>
                            <button class="btn btn-success">Confirm Changes</button>
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
<?php echo $__env->make('auth0.admin.layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Repositories\Projects\digital-library\resources\views/auth0/admin/books/edit.blade.php ENDPATH**/ ?>