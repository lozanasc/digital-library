@extends('auth0.user.layout.user')
@section('user_root')
<div class="container">
    <div class="row">
        <div>
            <h2 class="mb-3">Newest Book Additions </h2>
        </div>
        <div>
            <div  class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                        @if(count($newest_books) > 0)
                            @foreach ($newest_books as $book)
                                @if($book->physical_qty > 0 || $book->digital_copy !== "")
                                <div class="col-md-4 mb-3">
                                    <a class="card" style="cursor: pointer;" href="{{ route('preview', $book->id) }}">
                                        <img class="img-fluid" alt="100%x280" src="{{ Storage::url($book->book_cover) }}">
                                        <div class="card-body">
                                            <h4 class="card-title">{{$book->name}}</h4>
                                            <p class="card-text truncate">{{ $book->synopsis }}</p>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        @else
                            <h3 style="text-align: center;">
                                Stay tune for new book additions!
                            </h3>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection