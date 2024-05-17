<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body>

@include('includes.nav')

<div class="container" style="margin-left: 20px">
<h2>Insert client</h2>

<form action="{{ route('updateClient', $client->id) }}" method="POST">

    @csrf  <!-- creating input hidden token (secret code) -->

    @method('put') <!-- to add the updated data only -->

  <label for="clientName">client name:</label><br>
  <p style="color:red">
    @error('clientName')
      {{ $message }}
    @enderror
  </p>
  <input type="text" id="clientName" name="clientName" class="form-control" value="{{ $client->clientName }}"><br>
  
  <label for="phone">phone:</label><br>
  <p style="color:red">
    @error('phone')
      {{ $message }}
    @enderror
  </p>
  <input type="text" id="phone" name="phone" class="form-control" value="{{ $client->phone }}"><br>

  <label for="email">email:</label><br>
  <p style="color:red">
    @error('email')
      {{ $message }}
    @enderror
  </p>
  <input type="email" id="email" name="email" class="form-control" value="{{ $client->email }}"><br>

  <label for="website">website:</label><br>
  <p style="color:red">
    @error('website')
      {{ $message }}
    @enderror
  </p>
  <input type="text" id="website" name="website" class="form-control" value="{{ $client->website }}"><br><br>
  
  <input type="submit" value="Submit">
</form> 
</div>

</body>
</html>