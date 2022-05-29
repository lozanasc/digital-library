@extends('auth0.user.layout.user')
@section('user_root')
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="{{ Storage::url($info->book_cover) }}">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a><img src="{{ Storage::url($info->book_cover)  }}"
                                class="thumb-lg img-circle" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="user-btm-box mt-5 d-md-flex">
                        <strong>Published Date: </strong> {{ $info->date_published }}
                    </div>
                    <div class="user-btm-box mt-3 d-md-flex">
                        <strong>ISBN: </strong> {{ $info->isbn_no }}
                    </div>
                    <div class="user-btm-box mt-3 d-md-flex">
                        <strong>Title: </strong> {{ $info->name }}
                    </div>
                    <div class="user-btm-box mt-3 d-md-flex">
                        <strong>Physical Quantity: </strong> {{ $info->physical_qty }}
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('requestBook', $info->name) }}" method="POST" class="form-horizontal form-material">
                            @csrf
                            @error('reason')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Reason</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input  type="text" class="form-control p-0 border-0" name="reason" id="reason" placeholder="Short reason for borrowing the book"> 
                                </div>
                            </div>
                            @error('return_date')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Return Date</label>
                                <div class="form-check-label col-md-12">
                                    <input placeholder="Set date of return" type="date" name="return_date" id="return_date" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-success">Confirm Request</button>
                            @if(Storage::url($info->digital_copy) !== null)
                            <a 
                                type="button" class="btn btn-success"
                                href="{{ Storage::url($info->digital_copy) }}"
                            >
                                Download Digital Copy
                            </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
    </div>
</div>
@endsection