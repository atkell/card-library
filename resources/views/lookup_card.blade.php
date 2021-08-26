<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Card Lookup</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        </head>
</head>
<body>

<a href="/cards">Back to library</a>

<div class="container">	
	<form method="post" action="/cards/lookup" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="mb-3">
			<label for="name" class="form-label">Card name</label>
			<input name="name" type="text" class="form-control">
			<div class="form-text">Source: api.magicthegathering.io</div>
		</div>
		<button type="submit" class="btn btn-primary">Lookup</button>
	</form>
</div>

</body>
</html>