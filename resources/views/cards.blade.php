	<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>All Cards</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">  

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Card Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Card Library
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/cards">All Cards</a></li>
            <li><hr class="dropdown-divider"></li>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
            <!-- {{$cards->count()}} -->
            {{$cards->count()}}
              <span class="visually-hidden">cards in library</span>
            </span>
            <li><a class="dropdown-item disabled" href="#">Expansion (set)</a></li>
            <li><a class="dropdown-item disabled" href="#">Color</a></li>
            <li><a class="dropdown-item disabled" href="#">Rarity</a></li>
            <li><a class="dropdown-item disabled" href="#">Type</a></li>
            <li><a class="dropdown-item disabled" href="#">Subtype</a></li>
            <li><a class="dropdown-item disabled" href="#">Something else</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/cards/lookup">Add a card!</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown disabled">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Decks
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item disabled" href="/cards">All Decks</a></li>
            <li><hr class="dropdown-divider"></li>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
            33
              <span class="visually-hidden">decks in library</span>
            </span>
            <li><a class="dropdown-item disabled" href="#">Color</a></li>
            <li><a class="dropdown-item disabled" href="#">Something else</a></li>
          </ul>
        </li>   
        <li class="nav-item">
          <a class="nav-link" href="#">Game Log</a>
        </li>   
      </ul>
      <form class="d-flex" method="post" action="/cards/lookup" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input class="form-control me-2" type="search" placeholder="Lookup new card" aria-label="Search" name="name">
        <button class="btn btn-outline-success" type="submit">Go</button>
      </form>
    </div>
  </div>
</nav>	
<div class="container mt-3">
  <table class="table" id="cards">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Set Name</th>
        <th scope="col">Card no. (in set)</th>
        <th scope="col">Type</th>
        <th scope="col">Subtype</th>
        <th scope="col">Artist</th>
        <th scope="col">Rarity</th>
        <th scope="col">Colors</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cards as $card)
      <tr>
        <!-- <th scope="row">{{ $card->id }}</th> -->
        <td><a href="/cards/detail/{{ $card->id }}">{{ $card->name }}</a></td>
        <td>{{ $card->set_name }}</td>
        <td>{{ $card->number }}</td>
        <td>{{ $card->types }}</td>
        <td>{{ $card->subtypes }}</td>
        <td>{{ $card->artist }}</td>
        <td>{{ $card->rarity }}</td>
        <td>{{ $card->colors }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#cards').DataTable();
  } );
</script>
</body>
</html>