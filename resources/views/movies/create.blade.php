<!DOCTYPE html>
<html>

<head>
  <title>Add Movie</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <style>
    body {
      background: #355C7D;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to left, #C06C84, #6C5B7B, #355C7D);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to left, #C06C84, #6C5B7B, #355C7D);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    form {
      width: 30%;
      margin: 0 auto;
      text-align: center;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input {
      margin-top: 5px;
      padding: 5px;
      border-radius: 5px;
      border: 2px solid #ccc;
      width: 100%;
    }

    label {
      color: aliceblue;
      font-size: 22px;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <form action="/movies" method="post">
    @csrf
    <label for="titel">Titel:</label>
    <input type="text" id="titel" name="titel" genre required placeholder="Film titel...">

    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre" placeholder="Drama, Action, Libesfilm etc....">

    <label for="darsteller">Darsteller:</label>
    <input type="text" id="darsteller" name="darsteller">

    <label for="erscheinungsjahr">Erscheinungsjahr:</label>
    <input type="number" id="erscheinungsjahr" name="erscheinungsjahr">

    <label for="medium">Medium:</label>
    <input type="text" id="medium" name="medium" placeholder="DVD, Blueray...">

    <input type="submit" class="btn btn-info" name="submit" id="submit" value="Movie speichern" style="font-size: 16px;
            font-weight: bold; margin: 18px;">
  </form>
@if ($errors->any())
 <div class="alert alert-danger" role="alert">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
</body>

</html>