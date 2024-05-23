@extends('layouts.admin')

@section('content')
  <div class="row pt-2 pb-5 px-5">

    <div class="col-12">
      @if (session('success'))
        <div class="alert alert-success" role="alert">
          <p class="m-0">{{ session('success') }}</p>
        </div>
      @endif
    </div>

    <div class="col-12">
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

                <td class="align-content-center">
                  {{ $project->title }}
                </td>
                <td class="align-content-center">
                  {{ $project->link }}
                </td>

                <td class="text-center">
                  <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info me-2">
                    <i class="fa-solid fa-eye"></i>
                  </a>

                  <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning me-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>

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
  </div>
@endsection
