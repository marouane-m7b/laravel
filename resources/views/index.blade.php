@extends('layouts.app')
@section('content')
    <div class="d-flex flex-wrap gap-3 justify-content-center">
        @foreach ($posts as $post)
            <div class="card" style="width: 18rem;">
                <img src="{{ $post->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->titre }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-text">Created at {{ $post->created_at }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
