@extends('layout.app')

@section('contenu')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">
                <h3>{{ session('message') }}</h3>
            </div>
        @endif

        <a href="{{ route('createPost') }}" class="btn btn-primary mb-1">Create Post</a>
        @foreach ($posts as $post)
            <div class="card w-25">
                <img class="card-img-top" style="width: 100px; height: 100px;" src="{{ asset('image/'. $post->image) }}" alt="{{ $post->image }}" />
                <div class="card-body">
                    <h4 class="card-title">Titre: {{ $post->titre }}</h4>
                    <p class="card-text">Contenu: {{ $post->contenu }}</p>
                    <p class="card-text">Date de Creation: {{ $post->created_at }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('showPost', $post->id) }}" class="btn btn-success">Show</a>
                    <a href="{{ route('editPost', $post->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('deletePost', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection

@section('title')
    Posts
@endsection
