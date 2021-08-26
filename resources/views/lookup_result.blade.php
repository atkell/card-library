<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Card Details</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
		    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">  
</head>
<body>



<div class="container mt-3">
  <table class="table" id="result">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Set Name</th>
        <th scope="col">Card no.</th>
        <th scope="col">Rarity</th>
        <th scope="col">Artist</th>
        <th scope="col">Image URL</th>
        <th scope="col">Multiverse no.</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cards as $card)
      <form method="post" action="/cards" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input name="name" type="hidden" value="{{$card['name']}}">
      <input name="mana_cost" type="hidden" value="{{$card['manaCost']}}">
      <input name="mana_cost_converted" type="hidden" value="{{$card['cmc']}}">
      <input name="type" type="hidden" value="{{$card['type']}}">
      @foreach ($card['types'] as $type)
      	<input name="types" type="hidden" value="{{$type}}">
      @endforeach
      @if ($card['subtypes'] == '')
        <input name="subtypes" type="hidden" value="">
      @else
        @foreach ($card['subtypes'] as $subtype)
        	<input name="subtypes" type="hidden" value="{{$subtype}}">
        @endforeach
      @endif
      <input name="rarity" type="hidden" value="{{$card['rarity']}}">
      <input name="set" type="hidden" value="{{$card['set']}}">
      <input name="set_name" type="hidden" value="{{$card['setName']}}">
      <input name="text" type="hidden" value="{{$card['text']}}">
      <input name="artist" type="hidden" value="{{$card['artist']}}">
      <input name="number" type="hidden" value="{{$card['number']}}">
      <input name="power" type="hidden" value="{{$card['power']}}">
      <input name="toughness" type="hidden" value="{{$card['toughness']}}">
      <input name="layout" type="hidden" value="{{$card['layout']}}">
      @if ($card['colors'] == '')
          <input name="colors" type="hidden" value="">
      @else
      	@foreach ($card['colors'] as $colors)
      		<input name="colors" type="hidden" value="{{$colors}}">
      	@endforeach
      @endif
      @if ($card['flavor'] == '')
      	<input name="flavor" type="hidden" value="">
      @else
      	<input name="flavor" type="hidden" value="{{$card['flavor']}}">
      @endif				    
      @if ($card['multiverseid'] == '')
      	<input name="multiverseid" type="hidden" value="">
      @else
      	<input name="multiverseid" type="hidden" value="{{$card['multiverseid']}}">
      @endif
      @if ($card['imageUrl'] == '')
      	<input name="imageUrl" type="hidden" value="">	
      @else
      	<input name="imageUrl" type="hidden" value="{{$card['imageUrl']}}">	
      @endif	
	      <tr>
	        <td>{{ $card['name'] }}</td>
	        <td>{{ $card['setName'] }}</td>
          <td>{{ $card['number'] }}</td>
          <td>{{ $card['rarity'] }}</td>
          <td>{{ $card['artist'] }}</td>
          @if ($card['imageUrl'] == '')
            <td>No image found</td>
          @else
            <td><a href="{{ $card['imageUrl'] }}" target="_blank">View image</a></td>
          @endif
	        <td>{{ $card['multiverseid'] }}</td>
	        <td><button type="submit" class="btn btn-primary">Add to library</button></td>
	      </tr>
  		</form>
      @endforeach
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<!-- <script type="text/javascript">
  $(document).ready( function () {
      $('#result').DataTable();
  } );
</script> -->

</body>
</html>