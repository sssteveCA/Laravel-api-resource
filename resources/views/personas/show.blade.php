<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Informazioni Persona</title>
        <meta charset="utf-8">
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="divTable">
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{$persona->nome}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Cognome</th>
                        <td>{{$persona->cognome}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Età</th>
                        <td>{{$persona->età}} Anni</td>
                    </tr>
                    <tr>
                        <th scope="row">Altezza</th>
                        <td>{{$persona->altezza}} cm</td>
                    </tr>
                    <tr>
                        <th scope="row">Residenza</th>
                        <td>{{$persona->residenza}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>