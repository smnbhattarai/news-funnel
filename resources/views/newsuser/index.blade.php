@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @foreach($myNews as $news)


                    <div class="card" style="width: 20rem; float: left; margin-right: 24px;">
                        <img src="{{ $news->imageUrl }}" class="card-img-top" alt="{{ $news->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $news->title }}</h5>
                            <p class="card-text">{{ $news->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $news->source }}</li>
                            <li class="list-group-item">{{ $news->newsPublishedAt }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ $news->url }}" class="card-link">Visit source</a>
                            <a href="{{ route('deleteMyNews', $news->id) }}" class="card-link text-danger">Delete</a>
                        </div>
                    </div>


                @endforeach

            </div>

            {{ $myNews->links() }}
        </div>
    </div>
@endsection
