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


<form action="{{ route('addStudent') }}" method="POST">
    @csrf  <!-- creating input hidden token (secret code) -->
  <label for="studentName">Student Name:</label><br>
  <input type="text" id="studentName" name="studentName"><br>
  <label for="age">Age:</label><br>
  <input type="number" id="age" name="age"><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>