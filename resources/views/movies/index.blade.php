<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Movies</title>
    <style>
        
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }
        thead {
            font-style: italic;
            background-color: #b6bfda
        }
        th {text-align: left;
            padding: 16px;
            font-weight: bold;
        }
        td {text-align: left;
            padding: 16px;}

        tr:nth-child(even) {
            background-color: #e4e9b6; }
        div {
            text-align: center;
        }

    </style>
</head>
<body>

<x-app-layout>

    <div class="container-fluid">
<table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titel</th>
                <th>Genre</th>
                <th>Darsteller</th>
                <th>Erscheinungsjahr</th>
                <th>Medium</th>
                <th>Ändern</th>
                <th>Löschen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $movies as $movie )
            <tr>
                <td>{{$movie->id}}</td>
                <td>{{$movie->titel}}</td>
                <td>{{$movie->genre}}</td>
                <td>{{$movie->darsteller}}</td>
                <td>{{$movie->erscheinungsjahr}}</td>
                <td>{{$movie->medium}}</td>
                <td>
                    <a  class="btn btn-warning" href="/movies/{{$movie->id}}/edit">Ändern</a>
                </td>
                <td>
                    <form action="/movies/{{$movie->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Löschen!" class="btn btn-outline-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div style="text-align: center; margin: 18px;" >
    <a class="btn btn-primary" href ="/movies/create">Neue Film erfassen </a>
</div>
    </x-app-layout>
    <x-footer>

    </x-footer>
</body>
</html>