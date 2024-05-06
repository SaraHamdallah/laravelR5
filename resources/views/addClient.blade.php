<!DOCTYPE html>
<html>
<body>

<h2>Insert cient</h2>

<form action="{{ route('insertClient') }}" method="POST">
    @csrf  <!-- creating input hidden token (secret code) -->

  <label for="clientName">clientName:</label><br>
  <input type="text" id="clientName" name="clientName" ><br>
  
  <label for="phone">phone:</label><br>
  <input type="text" id="phone" name="phone" value=""><br>

  <label for="email">email:</label><br>
  <input type="email" id="email" name="email" value=""><br>

  <label for="website">website:</label><br>
  <input type="text" id="website" name="website" value=""><br><br>
  
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>