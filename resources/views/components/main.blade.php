<link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet"
/>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<nav class="vertical-menu-wrapper">
    <div class="vertical-menu-logo">
        <div class="logo">De Samenkomst</div>
        <span class="open-menu-btn"><hr><hr><hr></span>
    </div>
    <ul class="vertical-menu">
        <li>Schedule</li>
        <li>Event</li>
        <hr />
        <li>Setting</li>
        <li>Privacy</li>
        <li id="user-info">MJ<span>online</span></li>
    </ul>
</nav>
<div class="content-wrapper">
    @yield("content")
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openMenuBtn = document.querySelector('.open-menu-btn');
        const logo = document.querySelector('.logo');
        const body = document.body;
        const breakpoint = 768;

        // Function to handle menu state
        function toggleMenu() {
            const isMenuClosed = body.classList.contains('closed-menu');
            body.classList.toggle('closed-menu', !isMenuClosed);
            document.querySelector('.vertical-menu-logo').classList.toggle('hidden-logo', !isMenuClosed);
            logo.style.visibility = isMenuClosed ? 'visible' : 'hidden';
        }

        // Function to update logo visibility based on window width
        function updateLogoVisibility() {
            logo.style.visibility = window.innerWidth > breakpoint ? 'visible' : 'hidden';
        }

        // Initial setup
        updateLogoVisibility();

        // Listen for window resize
        window.addEventListener('resize', function() {
            updateLogoVisibility();

            const isScreenSmall = window.innerWidth <= breakpoint;
            body.classList.toggle('closed-menu', isScreenSmall);

            if (isScreenSmall && !body.classList.contains('closed-menu')) {
                toggleMenu(); // Close menu automatically when screen size is small
            }
        });

        // Manual toggle when button is clicked
        openMenuBtn.addEventListener('click', toggleMenu);
    });
</script>
