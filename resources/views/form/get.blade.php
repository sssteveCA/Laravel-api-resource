<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Cerca persona</title>
        <meta charset="utf-8">
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script>
            var actionUrl;
            $(function(){
                actionUrl = $('#form').attr('action');
                //Modifica l'attributo action del form alla modifica del testo nel campo input dell'ID
                $('#getId').on('input',function(){
                    var id = $(this).val();
                    $('#form').attr({
                        action : actionUrl+id
                    });
                });
            });//$(function(){
        </script>
    </head>
    <body>
        <h3 class="text-center text-uppercase mt-4">Ottieni una persona con ID specifico</h3>
        <div id="divForm" class="w-100 d-flex justify-content-center mt-3">
            <form id="form" class="mt-2" method="post" action="/personas/">
                @method('GET')
                @csrf
                <table class="table table-borderless">
                    <tr>
                        <td>
                            <label for="getId" class="mr-1">Id da cercare:</label>
                        </td>
                        <td>
                            <input id="getId" type="number">
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