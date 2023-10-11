<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Laravel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Acceuil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('stagiaires.create') }}">Ajouter un stagiaire</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('stagiaires.index') }}">List des stagiaires</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" id="search-form">
      <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search" name="search" id="search-input">
    </form>
  </div>
</nav>
