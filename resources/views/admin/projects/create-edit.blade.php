@extends('layouts.admin')

@section('content')
  <h1 class="py-5 text-white text-center mt-3 rounded-3 bg-gray">{{ $title }}</h1>

  <form class="row text-white rounded-3 bg-gray p-5" enctype="multipart/form-data" action='{{ $route }}'
    method='POST'>
    @csrf
    @method($method)

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="col-6 mb-3">
      <label for="title" class="form-label">Titolo (*)</label>
      <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title"
        value="{{ old('title', $project?->title) }}">
      @error('title')
        <small class="text-danger fw-bold">
          {{ $message }}
        </small>
      @enderror
    </div>

    <div class="col-6 mb-3">
      <label for="thumb" class="form-label">Link (*)</label>
      <input name="link" type="text" class="form-control @error('link') is-invalid @enderror" id="link"
        value="{{ old('link', $project?->link) }}">
      @error('link')
        <small class="text-danger fw-bold">
          {{ $message }}
        </small>
      @enderror
    </div>

    <div class="col-6 mb-3">
      <label for="image" class="form-label">Caricare un' immagine</label>
      <input name="image" type="file" class="form-control" id="image" onchange="showImage(event)">
    </div>

    <div class="col-12 mb-3">
      <img src="" id="test-img">
    </div>

    <div class="col-12 mb-3">
      <label for="description" class="form-label">Descrizione</label>
      <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
        rows="10">{{ old('description', $project?->description) }}</textarea>
      @error('description')
        <small class="text-danger fw-bold">
          {{ $message }}
        </small>
      @enderror
    </div>

    <div class="text-center pt-3">
      <button type="submit" class="btn btn-primary w-25 me-3">Invia</button>
      <button type="reset" class="btn btn-warning w-25">Reset</button>
    </div>
  </form>

  <script>
    function showImage(event) {
      const image = document.getElementById('test-img');
      image.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>
@endsection
