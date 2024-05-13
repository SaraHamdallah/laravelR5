<!DOCTYPE html>
<html lang="en">
<head>
  <title>Students</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>
@include('includes.nav2')


<div class="container">
  <h2>Students data</h2>
     
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student name</th>
        <th>Age</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($student as $student) <!-- foreach ("name of compact" as $client) -->
      <tr>
        <td>{{ $student->studentName }}</td>
        <td>{{ $student->age }}</td>
      @endforeach

    </tbody>
  </table>
</div>

</body>
</html>
