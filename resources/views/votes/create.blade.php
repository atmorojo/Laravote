<!doctype html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
</head>
<body>

    <form autocomplete="off">
        <div class="candidate-list" >
           @include('votes.candidate-card')
        </div> <!-- end of candidate-list -->
    </form>
    <script type="text/hyperscript" src="{{ asset('js/app._hs') }}"></script>
    <script src="{{ asset('js/_hyperscript.min.js') }}"></script>
</body>
</html>
