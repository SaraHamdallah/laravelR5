<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body>

@include('includes.nav2')

<div class="container" style="margin-left: 20px">
<h2>Insert student</h2>

<form action="{{ route('updateStudent', $student->id) }}" method="POST">

    @csrf  <!-- creating input hidden token (secret code) -->

    @method('put') <!-- to add the updated data only -->

  <label for="studentName">student name:</label><br>
  <input type="text" id="studentName" name="studentName" class="form-control" value="{{ $student->studentName }}"><br>
  
  <label for="age">age:</label><br>
  <input type="text" id="age" name="age" class="form-control" value="{{ $student->age }}"><br>

  
  <input type="submit" value="Submit">
</form> 
</div>

</body>
</html>