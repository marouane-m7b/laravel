@extends('layout.app')

@section('contenu')
    <div class="card w-75" style="margin: 0 auto">
        {{-- <img class="card-img-top" src="holder.js/100x180/" alt="Title" /> --}}
        <div class="card-body">
            <h4 class="card-title">Titre: {{ $post->titre }}</h4>
            <p class="card-text">Contenu: {{ $post->contenu }}</p>
            <p class="card-text">Date de Creation: {{ $post->created_at }}</p>
        </div>
    </div>
@endsection

@section('title')
    Post Info
@endsection
