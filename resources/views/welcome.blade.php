<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
        <title>Laravel</title>

       
        <link href="/css/app.css" rel="stylesheet" type="text/css" >
    </head>
    <body class="">
        <div id="app">
            <example-component></example-component>
        </div>
         
        <script src="{{ asset('js/app.js') }}"></script> 
    </body>
</html>
