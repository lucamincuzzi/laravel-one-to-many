@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @include('partials.back')
    
    <h2 class="text-center">Aggiungi un nuovo progetto</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="type_id"></label>
            <select class="form-select" aria-label="Default select example" id="type_id" name="type_id">
                <option>Seleziona una categoria</option>
                <option value="1">Front-end</option>
                <option value="2">Back-end</option>
                <option value="3">Fullstack</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
        </div>      
        
        <button class="btn btn-success" type="submit">Salva</button>

    </form>
</div>
@endsection
