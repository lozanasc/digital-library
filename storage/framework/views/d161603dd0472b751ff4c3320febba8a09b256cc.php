
<?php $__env->startSection('admin_root'); ?>
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <!-- Row -->
  <div class="row">
      <!-- Column -->
      <div>
          <div class="card">
              <div class="card-body">
                <h1 class="my-2">New Book</h1>
                  <form action="<?php echo e(route("push_to_db")); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                    <?php echo csrf_field(); ?>
                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo e(status); ?>

                      </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                      <div class="form-group mb-4">
                          <div class="col-sm-12">
                              <button class="btn btn-success">Add Book</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <!-- Column -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth0.admin.layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Repositories\Projects\Commission\Jericho\resources\views/auth0/admin/books/add.blade.php ENDPATH**/ ?>