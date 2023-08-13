<!doctype html>
<head>
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('css/app.css') }}"
        />
</head>
<body>
    <main>
    {{ $slot }}
    </main>

    <div
        _="on click hide"
        style="display: none;"
        id="modal">
        <div id="modal-card">
            <p id="modal-message"></p>
            <small>Klik di mana saja untuk keluar</small>
        </div>
    </div>
    <script type="text/hyperscript" src="{{ asset('js/app._hs') }}"></script>
    <script src="{{ asset('js/_hyperscript.min.js') }}"></script>
    <script src="{{ asset('js/htmx.min.js') }}"></script>
</body>
</html>

