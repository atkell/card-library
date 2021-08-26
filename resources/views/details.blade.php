<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Card Details</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>


<div class="container">
  <div class="row">
    <div class="col">
        <img src="{{ $card->gatherer_image_url }}" alt="{{ $card->name }}">
    </div>
    <div class="col">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Card name: {{ $card->name }}</li>
        <li class="list-group-item">Converted manage cost: {{ $card->mana_cost_converted }}</li>
        <li class="list-group-item">Type: {{ $card->types }}</li>
        <li class="list-group-item">Subtype: {{ $card->subtypes }}</li>
        <li class="list-group-item">Card text: {{ $card->text }}</li>
        <li class="list-group-item">Flavor text: <em>{{ $card->flavor }}</em></li>
        <li class="list-group-item">Power: {{ $card->power }}</li>
        <li class="list-group-item">Toughness: {{ $card->toughness }}</li>
        <li class="list-group-item">Expansion (Set): {{ $card->set }} – {{ $card->set_name }}</li>
        <li class="list-group-item">Card number in set: {{ $card->number }}</li>
        <li class="list-group-item">Rarity: {{ $card->rarity }}</li>
        <li class="list-group-item">Artist: {{ $card->artist }}</li>
        <li class="list-group-item">Quantity on hand: {{ $card->quantity_owned }}</li>
        <li class="list-group-item">Date added: {{ $card->created_at }}</li>
        <li class="list-group-item text-center">
            <div class="btn" role="group" aria-label="Basic outlined example">
              <!-- <button type="button" class="btn btn-outline-primary disabled">Edit</button> -->
              <form method="get" action="/cards/destroy" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $card->id }}">
                <button type="submit" class="btn btn-outline-danger">Remove</button>
            </form>
            </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>