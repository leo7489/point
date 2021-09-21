<!DOCTYPE html>
<html lang="en">
<head>
  <title>...</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add more points to the user</h2>
  <p>The form below contains six input </p>
  <form action="/action" method="post">
    @csrf 
    <input type="hidden" value={{ $user_id }} name="user_id" />
    <div class="form-group">
      <label for="usr">Source A (0-100 poins):</label>
      <input type="number" name="pointa" min="0" max="100" value=1 class="form-control">
    </div>
    <div class="form-group">
    <label for="usr">Source B (0-100 poins):</label>
      <input type="number" name="pointb" min="0" max="100" value=0 class="form-control">
    </div>

    <div class="form-group">
      <label for="usr">Source C (0-100 poins):</label>
      <input type="number" name="pointc" min="0" max="100" value=0 class="form-control">
    </div>
    <div class="form-group">
    <label for="usr">Source D (0-100 poins):</label>
      <input type="number" name="pointd" min="0" max="100" value=0 class="form-control">
    </div>

    <div class="form-group">
      <label for="usr">Source E (0-100 poins):</label>
      <input type="number" name="pointe" min="0" max="100" value=0 class="form-control">
    </div>
    <div class="form-group">
    <label for="usr">Source F (0-100 poins):</label>
      <input type="number" name="pointf" min="0" max="100" value=0 class="form-control">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
