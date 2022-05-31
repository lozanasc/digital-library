@extends('auth0.admin.layout.admin')
@section('admin_root')
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">User List</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Password</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users) > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->password }}</td>
                                        <td>
                                            <a href="{{ route('deleteUser', $user->id) }}" type="button" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <h3>
                                No users found!
                            </h3>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection