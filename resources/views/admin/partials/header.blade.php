<header class="bg-black">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="{{ route('home') }}" target="_blanck">Sito
              Pubblico</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.home') }}">Home Privata</a>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item align-content-center me-3  text-white">
            Benvenuto <a class="text-decoration-none"
              href="{{ url('profile') }}"><strong>{{ Auth::user()->name }}</strong></a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger"><i
                  class="fa-solid fa-arrow-right-from-bracket"></i></button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
