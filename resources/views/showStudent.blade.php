<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Show {{$student->studentName}}</title>
</head>
<body>
<p><h1>{{$student->studentName}}</p></h1><br>
<p><h1>{{$student->age}}</p></h1><br>
<h1><p>
  Courses:
  <ul>
    @foreach($student->courses as $course)
      <li>{{ $course->name }}</li>
    @endforeach
  </ul>
</p></h1>
</body>
</html>