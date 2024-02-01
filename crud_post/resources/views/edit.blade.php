@extends('layout.app')

@section('contenu')
    <form action="{{ route('updatePost', $post->id) }}" method="POST" class="w-50" style="margin: 10px auto">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" value="{{ $post->titre }}" class="form-control" placeholder="Entre Titre" />
        </div>

        <div class="mb-3">
            <label for="titre" class="form-label">Contenu</label>
            <input type="text" name="contenu" id="contenu" value="{{ $post->contenu }}" class="form-control" placeholder="Entre Contenu" />
        </div>

        <div class="mb-3 d-grid">
            <button class="btn btn-primary">Edit</button>
        </div>
    </form>
@endsection

@section('title')
Edit
@endsection
