<!DOCTYPE html>
<html>
<body>

<h2>Add student</h2>

<form action="{{ route('addStudent') }}" method="POST">
    @csrf  <!-- creating input hidden token (secret code) -->
  <label for="studentName">Student Name</label><br>
  <input type="text" id="studentName" name="studentName"><br>
  <label for="age">Age:</label><br>
  <input type="number" id="age" name="age"><br><br>
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>