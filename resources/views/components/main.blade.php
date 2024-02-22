<link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet"
/>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="red-header">
    <div class="logo">De Samenkomst</div>
</div>
<nav class="vertical-menu-wrapper">
    <div class="vertical-menu-logo">
        <span class="open-menu-btn"><hr><hr><hr></span>
    </div>
    <ul class="vertical-menu">
        <li class="menu-item">
            <i class='bx bxs-dashboard'></i>
            <span>Dashboard</span>
        </li>
        <li class="menu-item">
            <i class='bx bxs-calendar'></i>
            <span>Reserveringen</span>
        </li>
        <li class="menu-item">
            <i class='bx bxs-add-to-queue'></i>
            <span>Nieuwe Reservering</span>
        </li>
        <li class="menu-item">
            <i class='bx bxs-user'></i>
            <span>Klanten</span>
        </li>
        <li class="menu-item">
            <i class='bx bxs-user-plus'></i>
            <span>Klant toevoegen</span>
        </li>
        <li class="menu-item">
            <i class='bx bxs-bed'></i>
            <span>Kamers</span>
        </li>
        <li class="menu-item">
            <i class='bx bxs-add-to-queue'></i>
            <span>Kamers toevoegen</span>
        </li>
        <li class="menu-item">
            <i class='bx bxs-user-detail'></i>
            <span>Medewerkers</span>
        </li>
        <li id="user-info">Test user<span>online</span></li>
    </ul>
</nav>
<div class="content-wrapper">
    @yield("content")
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openMenuBtn = document.querySelector('.open-menu-btn');
        const body = document.body;
        const breakpoint = 768;

        // Function to handle menu state
        function toggleMenu() {
            const isMenuClosed = body.classList.contains('closed-menu');
            body.classList.toggle('closed-menu', !isMenuClosed);
        }

        // Function to update menu state based on window width
        function updateMenuState() {
            const isScreenSmall = window.innerWidth <= breakpoint;
            body.classList.toggle('closed-menu', isScreenSmall);
        }

        // Initial setup
        updateMenuState();

        // Listen for window resize
        window.addEventListener('resize', function() {
            updateMenuState();

            if (window.innerWidth <= breakpoint && !body.classList.contains('closed-menu')) {
                toggleMenu(); // Close menu automatically when screen size is small
            }
        });

        // Manual toggle when button is clicked
        openMenuBtn.addEventListener('click', toggleMenu);
    });
</script>
