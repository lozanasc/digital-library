@extends('auth0.user.layout.user')
@section('user_root')
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">List of Books</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Cover</th>
                                <th class="border-top-0">ISBN</th>
                                <th class="border-top-0">Title</th>
                                <th class="border-top-0">Author</th>
                                <th class="border-top-0">Physical Qty</th>
                                <th class="border-top-0">Publication Date</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($books) > 0)
                                @foreach ($books as $book)
                                    @if($book->physical_qty > 0 || $book->digital_copy !== "")
                                        <tr>
                                            <td>
                                            <img src="{{ Storage::url($book->book_cover) }}" alt="Cover of the book" height="160" width="128">
                                            </td>
                                            <td>{{ $book->isbn_no }}</td>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->physical_qty }}</td>
                                            <td>{{ $book->date_published }}</td>
                                            <td>
                                                <a href="{{ route('requestBookPreview', $book->id) }}" type="button" class="btn btn-primary">Request</a>
                                                <a href="{{ route('preview', $book->id) }}"  type="button" class="btn btn-warning">Preview</a>
                                            </td>
                                        </tr>
                                    @endif
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