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
                    <strong>Published Date:</strong> {{ $info->date_published }}
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">ISBN</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input disabled type="text"
                                    value="{{ $info->isbn_no }}"
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Title</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input disabled type="text"
                                    value="{{ $info->name }}"
                                    class="form-control p-0 border-0" name="example-email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Author</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input disabled type="text"
                                    value="{{ $info->author }}"
                                    class="form-control p-0 border-0" name="example-email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Physical Copies Available</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input disabled type="text"
                                    value="{{ $info->physical_qty }}"
                                    class="form-control p-0 border-0" name="example-email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Synopsis</label>
                            <div class="col-md-12 border-bottom p-0">
                            <textarea rows="2" disabled class="form-control p-0 border-0">{{ $info->synopsis }}</textarea>
                            </div>
                        </div>
                        <a href="{{ route('requestBookPreview', $info->id) }}" type="button" class="btn btn-primary">Request</a>
                        @if(Storage::url($info->digital_copy) !== null)
                        <a 
                            type="button" class="btn btn-success"
                            href="{{ Storage::url($info->digital_copy) }}"
                        >
                            Download
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
@endsection