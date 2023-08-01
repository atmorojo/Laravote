<!doctype html>
<head>
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('css/app.css') }}"
        />
</head>
<body>
    {{ $slot }}
    <script type="text/hyperscript" src="{{ asset('js/app._hs') }}"></script>
    <script src="{{ asset('js/_hyperscript.min.js') }}"></script>
    <script src="{{ asset('js/htmx.min.js') }}"></script>
</body>
</html>

