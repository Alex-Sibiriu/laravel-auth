@extends('layouts.admin')

@section('content')
  <div class="container">
    <h1 class="py-3 text-white rounded-3 fw-bold fs-2 p-3 mt-3">Numero Progetti: {{ $num_projects }}</h1>

    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Titolo</th>
          <th scope="col">Tipo</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($projects as $project)
          <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->type }}</td>
          </tr>
        @empty
          <h2>Nessun Progetto trovato</h2>
        @endforelse

      </tbody>
    </table>
  </div>
@endsection
