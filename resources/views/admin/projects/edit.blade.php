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
    
        <form action="{{ route('admin.projects.update', ["project" => $project->slug]) }}" method="POST">
            @csrf
            @method("PUT")
    
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $project->title }}">
            </div>

            <div class="mb-3">
                <label for="type_id"></label>
                <select class="form-select" aria-label="Default select example" id="type_id" name="type_id">
                    <option>Seleziona una categoria</option>
                    <option @selected($project->type?->name === 'front-end') value="1">Front-end</option>
                    <option @selected($project->type?->name === 'back-end') value="2">Back-end</option>
                    <option @selected($project->type?->name === 'fullstack') value="3">Fullstack</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') ?? $project->description }}</textarea>
            </div>      
            
            <button class="btn btn-warning" type="submit">Applica</button>
    
        </form>
    </div>
@endsection