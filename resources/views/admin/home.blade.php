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
            <div class="card-header border-white">{{ __('User Dashboard') }}</div>

            <div class="card-body bg-dark">
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
              @endif

              {{ __('You are logged in!') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
