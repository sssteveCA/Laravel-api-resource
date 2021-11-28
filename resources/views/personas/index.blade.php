<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Tutte le persone registrate</title>
        <meta charset="utf-8">
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <table class="table table-info table-hover">
            <thead>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Età</th>
                <th scope="col">Altezza</th>
                <th scope="col">Residenza</th>
            </thead>
            <tbody>
            @foreach($persone as $k => $persona)
                <tr>
                    <td>{{$persona->id}}</td>
                    <td>{{$persona->nome}}</td>
                    <td>{{$persona->età}}</td>
                    <td>{{$persona->altezza}}</td>
                    <td>{{$persona->residenza}}</td>
                </tr>
            @endforeach 
            </tbody>
        </table>
    </body>
</html>