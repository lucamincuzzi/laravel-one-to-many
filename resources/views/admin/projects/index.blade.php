@extends('layouts.admin')

@section('content')
    <div class="container my-4">
        @include('partials.back')
        
        <div class="text-end">
            <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Aggiungi un progetto</a>
        </div>
        {{-- Messaggio di avvenuta eliminazione di un elemento --}}
        @if (session('delete_message'))
            <div class="container my-3 w-50 text-center alert alert-success">
                <span class="text-danger">{{ session('delete_message') }}</span>
            </div>
        @endif
        {{-- /Messaggio di avvenuta eliminazione di un elemento --}}

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th class="text-center" scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td class="w-25 text-center">
                            <a class="btn btn-success" href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">Dettagli</a>
                            <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">Modifica</a>
                            @include('admin.projects.partials.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
