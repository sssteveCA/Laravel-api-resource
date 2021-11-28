<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Crea Persona</title>
        <meta charset="utf-8">
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <h3 class="text-center text-uppercase mt-4">Crea una nuova persona</h3>
        <div id="divForm" class="w-100 d-flex justify-content-center mt-3">
            <form id="form" class="mt-2" method="post" action="/personas">
                @method('POST')
                @csrf
                <table class="table table-borderless">
                    <tr>
                        <td>
                            <label class="mr-1" for="nome">Nome</label>
                        </td>
                        <td>
                            <input id="nome" type="text" name="nome">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="mr-1" for="cognome">Cognome</label>
                        </td>
                        <td>
                            <input id="cognome" type="text" name="cognome">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="mr-1" for="eta">Età</label>
                        </td>
                        <td>
                            <input id="età" type="number" name="età">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="mr-1" for="altezza">Altezza</label>
                        </td>
                        <td>
                            <input id="altezza" type="number" name="altezza">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="mr-1" for="residenza">Residenza</label>
                        </td>
                        <td>
                            <input id="residenza" type="text" name="residenza">
                        </td>
                    </tr>
                </table>
                <div class="d-flex justify-content-center">
                    <button id="submit" type="submit">PROCEDI</button>
                </div>
            </form>
        </div>
    </body>
</html>