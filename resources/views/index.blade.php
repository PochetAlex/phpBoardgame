<html>
<head>
    <title>Liste des jeux</title>
    <style>
        table, td {
            border: 1px solid;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }
        tr, td, body {
            text-align: center;
            padding: 5px;
        }
    </style>
</head>
<body>
<h2>La liste des jeux</h2>

@if(!empty($jeux))
    <table>
        <thead>
        <tr>
            <td>ID</td>
            <td>name</td>
            <td>description</td>
            <td>price</td>
            <td>number_gamer</td>
            <td>playing_time</td>
            <td>complexity</td>
            <td>rating</td>
        </tr>
        </thead>
        <tbody>
        @foreach($jeux as $jeu)
            <tr>
                <td>{{$jeu["id"]}}</td>
                <td>{{$jeu["name"]}}</td>
                <td>{{$jeu["description"]}}</td>
                <td>{{$jeu["price"]}}</td>
                <td>{{$jeu["number_gamer"]}}</td>
                <td>{{$jeu["playing_time"]}}</td>
                <td>{{$jeu["complexity"]}}</td>
                <td>{{$jeu["rating"]}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>

@else
    <h3>aucun jeu</h3>
@endif

</body>
</html>
