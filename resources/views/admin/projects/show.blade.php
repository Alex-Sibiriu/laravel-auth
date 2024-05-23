@extends('layouts.admin')

@section('content')
  <h1 class="text-center fw-bold py-5 mt-3 text-white rounded-3 p-3 text-center">{{ $project->title }}
    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-outline-dark"><i
        class="fa-solid fa-pencil"></i></a>

    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
      onsubmit="return confirm('Sei sicuro di voler eliminare {{ $project->title }}?')" class="d-inline-block">
      @csrf
      @method('DELETE')

      <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
    </form>

  </h1>
  <div class="text-center text-white pt-5 rounded-3">

    <div class="ps-5">
      <p class="py-2"><strong>Titolo: </strong>{{ $project->title }}</p>
      <p class="py-2"><strong>Link: </strong>{{ $project->link }}</p>

    </div>
  </div>
  <div class="p-5 text-white rounded-3 text-center">
    <p><strong>Descrizione: </strong>{{ $project->description }}</p>
    <a class="btn btn-info btn-outline-primary  text-white" href="{{ route('admin.projects.index') }}">Comics Index</a>
  </div>
@endsection
