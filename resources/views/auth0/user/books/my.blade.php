@extends('auth0.user.layout.user')
@section('user_root')
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">My Books</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
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
                                            <td>{{ $book->book_name }}</td>
                                            <td>{{ $book->status }}</td>
                                            <td>{{ $book->return_date }}</td>
                                            <td>
                                                @if($book->status === "Pending")
                                                    <a href="{{ route('cancelRequest', $book->id) }}" type="button" class="btn btn-danger">Cancel</a>
                                                @endif
                                                @if($book->status === "Approved")
                                                    <a href="{{ route('viewPrintable', $book->id) }}" type="button" class="btn btn-success">Print</a>
                                                @endif
                                            </td>
                                        </tr>
                                @endforeach
                            @else
                            <h3>
                                No books found!
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