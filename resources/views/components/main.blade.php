<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="red-header">
    <div class="logo">De Samenkomst</div>
</div>
@include("components.sidebar")
@yield('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openMenuBtn = document.querySelector('.open-menu-btn');
        const body = document.body;
        const breakpoint = 768;

        function toggleMenu() {
            const isMenuClosed = body.classList.contains('closed-menu');
            body.classList.toggle('closed-menu', !isMenuClosed);
        }

        function updateMenuState() {
            const isScreenSmall = window.innerWidth <= breakpoint;
            body.classList.toggle('closed-menu', isScreenSmall);
        }

        updateMenuState();

        window.addEventListener('resize', function() {
            updateMenuState();

            if (window.innerWidth <= breakpoint && !body.classList.contains('closed-menu')) {
                toggleMenu();
            }
        });

        openMenuBtn.addEventListener('click', toggleMenu);
    });
</script>
</body>
</html>
