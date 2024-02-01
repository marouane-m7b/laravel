@extends('layout.app')

@section('contenu')
    <form action="{{ route('storePost') }}" method="POST" enctype="multipart/form-data" class="w-50" style="margin: 10px auto">
        @csrf
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" value="{{ old('titre') }}" class="form-control" placeholder="Entre Titre" />
        </div>

        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <input type="text" name="contenu" id="contenu" value="{{ old('contenu') }}" class="form-control" placeholder="Entre Contenu" />
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control" />
        </div>

        <div class="mb-3 d-grid">
            <button class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection

@section('title')
    Create
@endsection
