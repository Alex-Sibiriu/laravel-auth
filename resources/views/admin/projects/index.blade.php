@extends('layouts.admin')

@section('content')
  <div class="container">
    <h1 class="py-3 text-white rounded-3 fw-bold fs-2 p-3 mt-3">Numero Progetti: {{ $num_projects }}</h1>

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th class="w-25" scope="col">Titolo</th>
          <th scope="col">Link</th>
          <th class="text-center" scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($projects as $project)
          <tr>
            <td>{{ $project->id }}</td>

            <form action="{{ route('admin.projects.update', $project) }}" method="POST"
              id="edit-form-{{ $project->id }}">
              @csrf
              @method('PUT')
              <td class="align-content-center">
                <input class="transparent-input" type="text" name="title" value="{{ $project->title }}">
              </td>
              <td class="align-content-center">
                <input class="transparent-input" type="text" name="link" value="{{ $project->link }}">
              </td>
            </form>

            <td class="text-center">
              <button type="submit" class="btn btn-warning" onclick="sendEdit(`edit-form-{{ $project->id }}`)">
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
              <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
            </td>

          </tr>
        @empty
          <h2>Nessun Progetto trovato</h2>
        @endforelse

      </tbody>
    </table>
  </div>

  <script>
    function sendEdit(id) {
      const form = document.getElementById(id);
      form.submit();
    }
  </script>
@endsection
