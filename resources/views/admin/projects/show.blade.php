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

  <div class="d-flex container text-white pt-5">

    <div class="w-50 text-end">
      <img class=" w-100" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->original_image_name }}"
        onerror="this.src='{{ asset('img/no-image.png') }}'">
      <p>{{ $project->original_image_name }}</p>
    </div>

    <div class="ps-5 w-50">
      <p class="py-2"><strong>Titolo: </strong>{{ $project->title }}</p>
      <p class="py-2"><strong>Link: </strong>{{ $project->link }}</p>
      <p class="py-2"><strong>Descrizione: </strong>{{ $project->description }}</p>
    </div>

  </div>
  <div class="p-5 text-white text-center">
    <a class="btn btn-info btn-outline-primary  text-white" href="{{ route('admin.projects.index') }}">Lista dei
      Progetti</a>
  </div>
@endsection
