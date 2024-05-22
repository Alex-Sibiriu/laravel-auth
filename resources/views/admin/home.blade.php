@extends('layouts.admin')

@section('content')
  <div class="container">

    <div class="container">
      <h2 class="text-white py-3 fw-bold">
        {{ __('Dashboard') }}
      </h2>
      <div class="row justify-content-center">
        <div class="col">
          <div class="card bg-black text-white border-white">
            <div class="card-header border-white fw-bold fs-5">{{ __('User Dashboard') }}</div>

            <div class="card-body bg-dark">
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
              @endif

              {{ __('You are logged in!') }}
            </div>
          </div>

          <div class="card bg-black text-white border-white mt-3">
            <div class="p-3 border-white fw-bold fs-5">DATA</div>

            <div class="p-3 bg-dark border-top border-white">
              <p class="m-0">
                <span class="fw-bold text-primary">Progetti totali: </span>
                <strong>{{ $count_project }}</strong>
              </p>
            </div>

            <div class="p-3 bg-dark border-top border-white">
              <p class="m-0">
                <span class="fw-bold text-primary">Ultimo progetto:
                </span><strong>{{ $last_project->title }}</strong> creato il
                <strong>{{ $last_project->created_at }}</strong>
              </p>
            </div>

            <div class="p-3 bg-dark border-top border-white">
              <p class="m-0">
                <span class="fw-bold text-primary">Ultima modifica: </span>progetto
                <strong>{{ $updated_project->title }}</strong>
                modificato il
                <strong>{{ $updated_project->updated_at }}</strong>
              </p>
            </div>

            <div class="p-3 bg-dark border-top border-white">
              <p class="m-0">
                <span class="fw-bold text-primary">Tecnologie utilizzate: </span>
                <strong>{{ $count_technologies }}</strong>
              </p>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
