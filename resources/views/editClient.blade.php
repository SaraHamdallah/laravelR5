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

<form action="{{ route('updateClient', $client->id) }}" method="POST" enctype="multipart/form-data">

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

  <label for="city">City:</label><br>
  <p style="color:red">
    @error('city')
      {{ $message }}
    @enderror
  </p>
  <select name="city" id="city" class="form-control" >
    <option value="">Please select city</option>
    <option value="Cairo" {{old('city') == 'Cairo' ? 'selected' : ($client->city == 'Cairo' ? 'selected' : '') }}>Cairo</option>
    <option value="Giza" {{old('city') == 'Giza' ? 'selected' : ($client->city == 'Giza' ? 'selected' : '') }} >Giza</option>
    <option value="Qena" {{old('city') == 'Qena' ? 'selected' : ($client->city == 'Qena' ? 'selected' : '') }}>Qena</option>
  </select>
  <br>  <br>

  <label for="active">Active</label><br>
  <input type="hidden" name="active" value="0">
<input type="checkbox" id="activeCheckbox" name="active" class="form-control" value="1" @if($client->active) checked @endif><br><br>

  
  <p><img src="{{ asset('assets/images/' . $client->image) }}" alt=""></p><br>
  <label for="image">New Image</label><br>
  <input type="file" id="image" name="image" class="form-control"><br><br>

  
  <input type="submit" value="Submit">
</form> 
</div>

</body>
</html>