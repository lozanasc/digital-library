@extends('auth0.admin.layout.admin')
@section('admin_root')
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
                        @if(count($books) > 0)
                            @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->request_name }}</td>
                                        <td>{{ $book->book_name }}</td>
                                        <td>{{ $book->status }}</td>
                                        <td>{{ $book->return_date }}</td>
                                        <td>
                                    @if($book->status === "Pending")
                                      <a href="{{ route('approveRequest', $book->id) }}" type="button" class="btn btn-success">Approve</a> 
                                    @endif
                                      <a href="{{ route('cancelRequest', $book->id) }}" type="button" class="btn @if($book->status == "Pending" || "Returned") btn-danger @else  btn-success @endif">
                                        @if($book->status === "Pending")
                                        Reject
                                        @elseif($book->status === "Returned")
                                        Delete
                                        @else
                                        Returned
                                        @endif
                                      </a>
                                    </td>
                                    </tr>
                            @endforeach
                        @else
                        <h3>
                            No requests found!
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