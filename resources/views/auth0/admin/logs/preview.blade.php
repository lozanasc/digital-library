@extends('auth0.admin.layout.admin')
@section('admin_root')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input disabled type="text"
                                    value="{{ $info->name }}"
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Activity</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input disabled type="text"
                                    value="{{ $info->activity }}"
                                    class="form-control p-0 border-0" name="example-email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Affected component</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input disabled type="text"
                                    value="{{ $info->changes }}"
                                    class="form-control p-0 border-0" name="example-email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">User's role</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input disabled type="text"
                                    value="{{ $info->role }}"
                                    class="form-control p-0 border-0" name="example-email"
                                    id="example-email">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <!-- Column -->
    </div>
    <!-- Row -->
</div>
@endsection