<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Modifica una Persona</title>
        <meta charset="utf-8">
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script>
            var actionUrl;
            $(function(){
                actionUrl = $('#form').attr('action');
                //Modifica l'attributo action del form alla modifica del testo nel campo input dell'ID
                $('#setId').on('input',function(){
                    var id = $(this).val();
                    $('#form').attr({
                        action : actionUrl+id
                    });
                });
            });//$(function(){
        </script>
    </head>
    <body>
        <h3 class="text-center text-uppercase mt-4">Modifica una persona esistente</h3>
        <div id="divForm" class="w-100 d-flex justify-content-center mt-3">
            <form id="form" class="mt-2" method="post" action="/personas/">
                @method('PUT')
                @csrf
                <table class="table table-borderless">
                    <tr>
                        <td>
                            <label for="setId" class="mr-1">Id da modificare:</label>
                        </td>
                        <td>
                            <input id="setId" type="number" name="setId">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="mr-1" for="nome">Nuovo nome</label>
                        </td>
                        <td>
                            <input id="nome" type="text" name="nome">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="mr-1" for="cognome">Nuovo cognome</label>
                        </td>
                        <td>
                            <input id="cognome" type="text" name="cognome">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="mr-1" for="eta">Nuova età</label>
                        </td>
                        <td>
                            <input id="eta" type="number" name="eta">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="mr-1" for="altezza">Nuova altezza</label>
                        </td>
                        <td>
                            <input id="altezza" type="number" name="altezza">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="mr-1" for="residenza">Nuova residenza</label>
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