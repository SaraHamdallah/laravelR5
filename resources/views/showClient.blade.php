<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Show {{$client->clientName}}</title>
</head>
<body>
<p><img src="{{ asset('assets/images/' . $client->image) }}" alt=""></p><br>
<p><h1>{{$client->clientName}}</p></h1><br>
<p><h1>{{$client->phone}}</p></h1><br>
<p><h1>{{$client->email}}</p></h1><br>
<p><h1>{{$client->website}}</p></h1><br>
<p><h1>{{$client->city}}</p></h1><br>


</body>
</html>