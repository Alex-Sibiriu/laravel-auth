@extends('layouts.admin')

@section('content')
  <div class="row pt-2 pb-5 px-5">

    <div class="col-12">
      @if (session('success'))
        <div class="alert alert-success" role="alert">
          <p>{{ session('success') }}</p>
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>

    <div class="col-8">
      <div class="px-2 bg-dark rounded-3 pb-1">
        <h2 class="py-3 text-white rounded-3 fw-bold fs-2 p-3 mt-3">Lista Progetti</h2>

        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th class="ps-3" scope="col">ID</th>
              <th class="w-25" scope="col">Titolo</th>
              <th scope="col">Link</th>
              <th class="text-center" scope="col">Azioni</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($projects as $project)
              <tr>
                <td class="ps-3">{{ $project->id }}</td>

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
                  <button type="submit" class="btn btn-warning me-2" onclick="sendEdit(`edit-form-{{ $project->id }}`)">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </button>

                  <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                    onsubmit="return confirm('Sei sicuro di voler eliminare {{ $project->title }}?')"
                    class="d-inline-block">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                  </form>
                </td>

              </tr>
            @empty
              <h2>Nessun Progetto trovato</h2>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>

    <div class="col-4">
      <div class="rounded-3 bg-dark text-white px-3 pb-3 position-sticky top-0 ">
        <h2 class="py-3 text-white text-center rounded-3 fw-bold fs-2 p-3 mt-3">Aggiungi un nuovo progetto</h2>

        <form action="{{ route('admin.projects.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="title" class="form-label">Inserisci un titolo*</label>
            <input type="text" id="title" name="title" class="form-control bg-secondary-subtle"
              value="{{ old('title') }}">
          </div>

          <div class="mb-3">
            <label for="link" class="form-label">Inserisci un link*</label>
            <input type="text" id="link" name="link" class="form-control bg-secondary-subtle"
              value="{{ old('link') }}">
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Inserisci una descrizione</label>
            <textarea name="description" id="description" class="form-control bg-secondary-subtle" rows="10">{{ old('description') }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary">Crea il progetto</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    function sendEdit(id) {
      document.getElementById(id).submit();
    }
  </script>
@endsection
