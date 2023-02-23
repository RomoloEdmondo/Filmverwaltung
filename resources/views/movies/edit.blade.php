<!DOCTYPE html>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Edit Movie</title>
    <style>
        form {
            width: 30%;
            margin: 0 auto;
            text-align: center;
        }

        body {
            background: #355C7D;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #C06C84, #6C5B7B, #355C7D);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #C06C84, #6C5B7B, #355C7D);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

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

        div {
            text-align: center;
        }

        label {
            color: aliceblue;
            font-size: 22px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div>
        <h1>Edit: " {{$movie->titel}} " Movie</h1>
    </div>
    

    <form action="/movies/{{$movie->id}}" method="post">
        @csrf
        @method('PUT')
        <label for="titel">Titel:</label>
        <input type="text" id="titel" name="titel" value="{{$movie->titel}}" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="{{$movie->genre}}">

        <label for="darsteller">Dersteller:</label>
        <input type="text" id="darsteller" name="darsteller" value="{{$movie->darsteller}}">

        <label for="erscheinungsjahr">Erscheinungsjahr:</label>
        <input type="number" id="erscheinungsjahr" name="erscheinungsjahr" value="{{$movie->erscheinungsjahr}}">

        <label for="medium">Medium:</label>
        <input type="text" id="medium" name="medium" value="{{$movie->medium}}">

        <input type="submit" class="btn btn-warning" name="submit" id="submit" value="Movie Ändern" style="font-size: 16px;
            font-weight: bold;">
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