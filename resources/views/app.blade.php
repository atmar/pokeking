<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="app">
        <main-content>
            <div class="preload-body">
                <div class="loader">
                    <div class="box"></div>
                    <div class="box"></div>
                    <div class="box"></div>
                    <div class="box"></div>
                </div>
            </div>
        </main-content>
    </div>
</body>


<script src="{{ mix('/js/app.js') }}"></script>

</html>