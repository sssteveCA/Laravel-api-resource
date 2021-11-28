<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Indice</title>
        <meta charset="utf-8">
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
        </style>
        <script>
        </script>
    </head>
    <body>
        <div id="divForm" class="w-100 d-flex justify-content-center mt-3">
            <form id="form" method="post" action="method.php">
                @method('POST')
                @csrf
                <input type="hidden" id="ajax" name="ajax" value="ajaxOK">
                <div class="mt-2">
                    <label for="selAzione" class="mr-1">Azione da eseguire:</label>
                    <select id="selAzione" name="azione">
                        <option value="1">Vedi tutte le persone registrate</option>
                        <option value="2">Vedi una persona registrata a scelta</option>
                        <option value="3">Registra una nuova persona</option>
                        <option value="4">Modifica una persona</option>
                        <option value="5">Cancella una persona</option>
                    </select>
                </div class="mt-2">
                <div class="d-flex justify-content-center">
                    <button id="submit" type="submit">PROCEDI</button>
                </div>
            </form>
        </div>
    </body>
</html>