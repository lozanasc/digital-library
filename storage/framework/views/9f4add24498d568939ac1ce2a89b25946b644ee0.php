<!-- W3hubs.com - Download Free Responsive Website Layout Templates designed on HTML5 CSS3,Bootstrap which are 100% Mobile friendly. w3Hubs all Layouts are responsive cross browser supported, best quality world class designs. -->
<!DOCTYPE html>
<html>
  <head>
    <title>Request | <?php echo e($request_info->book_name); ?></title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/icon.png')); ?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style type="text/css">
      @import  url('https://fonts.googleapis.com/css?family=Raleway:300i,400,500,700&display=swap');
      body{
      padding:0;
      margin: 0;
      overflow-x: hidden;
      font-family: 'Raleway', sans-serif;
      }
      h5,h3{
      text-transform: capitalize;
      }
      img{
      max-width: 20%;
      }
      .b-t{
      border-top: 1px solid #ddd;
      }
      @media(max-width: 768px){
      .text-right{
      text-align: center !important;
      }
      .pull-right{
      float: none;
      text-align: center;
      }
      .center{
      text-align: center;
      }
      .bg-light.p-5:nth-child(1){
      padding: 1rem !important;
      }
      img{
      max-width: 30%;
      margin: 0 auto;
      display: block;
      }
      .p-5{
      padding: 1rem !important;
      }
      .text-right h5:nth-child(3){
      padding-top: 15px !important;
      }
      .pt-5{
      padding-top: 1rem!important
      }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="bg-light p-5">
        <h1 class="text-center m-0 mb-4">Your request has been approved!</h1>
        <h1 class="text-center m-0"><?php echo e($request_info->request_name); ?></h1>
        <div class="row pt-3 mb-2">
          <div class="col-md-6 pull-left"><img src="https://dumaguetecity.gov.ph/wp-content/uploads/2017/09/main-logo-150x150.png" class="img-responsive"></div>
          <div class="col-md-6 text-right">
            <h5 class="pt-4">Dumaguete City Public Library</h5>
            <p class="text-muted mb-0"><i>Date requested: <?php echo e($request_info->created_at); ?></i></p>
          </div>
        </div>
        <div class="row b-t pt-5">
          <div class="col-md-6 pt-3 center">
            <h5>Request Information</h5>
            <p><strong>Return Date:</strong> <?php echo e($request_info->return_date); ?>

            <br>
              <strong>Reason:</strong> <?php echo e($request_info->reason); ?>

            </p>
            <h5>User Information</h5>
            <p><strong>Contact:</strong> <?php echo e($user_info->contact); ?>

            <br>
              <strong>Address:</strong> <?php echo e($user_info->address); ?>

            </p>
          </div>
          <div class="col-md-6 text-right">
            <h5>Book Details</h5>
            <p>ID: <?php echo e($requested_book->id); ?></p>
            <p>TITLE: <?php echo e($requested_book->name); ?></p>
            <p>AUTHOR: <?php echo e($requested_book->author); ?></p>
            <p>DATE PUBLISHED: <?php echo e($requested_book->date_published); ?></p>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table text-nowrap">
            <tr>
            <thead>
              <td>COVER</td>
              <td>ISBN</td>
              <td>STATUS</td>
              <td>RETURN DATE</td>
            </thead>
            </tr>
            <tr>
              <td>
                <img src="<?php echo e(Storage::url($requested_book->book_cover)); ?>" alt="Cover of the book" height="160" width="600">
              </td>
              <td><?php echo e($requested_book->isbn_no); ?></td>
              <td><?php echo e($request_info->status); ?></td>
              <td><?php echo e($request_info->return_date); ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="bg-dark text-white p-5">
        <div class="row">
          <div class="col-md-4">		
          </div>
          <div class="col-md-3 text-right">
            <h6>Address</h6>
            <p class="text-right">
              Dr. Miciano Road, Daro, Dumaguete City, 6200 Negros Oriental, Philippines
            </p>
          </div>
          <div class="col-md-5 text-right">
            <h6>Contact Us</h6>
            <p>(035) 421 0074</p>
          </div>
        </div>
        <p class="text-center">
          <strong>
            Failure to return the book in time will result in account suspension!
          </strong>
        </p>
        <a href="/user" class="text-center">
          Return to Home
        </a>
      </div>
    </div>
  </body>
</html><?php /**PATH D:\Repositories\Projects\digital-library\resources\views/auth0/user/books/printable.blade.php ENDPATH**/ ?>