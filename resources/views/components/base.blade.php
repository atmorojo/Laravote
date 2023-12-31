<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Laravote</title>
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('css/app.css') }}"
            />
        <style>
.selected.card { background-color: var(--bs-success) !important; }
.selected .card-title, .selected .card-text { color: var(--bs-white); }
.selected .btn-outline-success { color: var(--bs-white); border: var(--bs-btn-border-width) solid var(--bs-white); }
        </style>
    </head>
    <body>
        <script type="text/hyperscript" src="{{ asset('js/app._hs') }}"></script>
        <script src="{{ asset('js/_hyperscript.min.js') }}"></script>
        <main>
            {{ $slot }}
        </main>

        @include('utils.alert')
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/htmx.min.js') }}"></script>
    </body>
</html>
