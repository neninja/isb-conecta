<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>{{env('APP_NAME')}}</title>
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script src="{{ asset('js/index.js') }}"></script>
    </body>
</html>
