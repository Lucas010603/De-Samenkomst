<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
<nav class="vertical-menu-wrapper">
    <div class="vertical-menu-logo">
        <span class="open-menu-btn"><hr><hr><hr></span>
    </div>
    <ul class="vertical-menu">
        <a href="{{ route('reservation.dashboard') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-dashboard'></i>
                    <span>Dashboard</span>
            </li>
        </a>

        <a href="{{ route('reservation') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-dashboard'></i>
                <span>Reserveringen</span>
            </li>
        </a>
        <a href="{{ route('reservation.new') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-dashboard'></i>
                <span>Nieuwe Reservering</span>
            </li>
        </a>
        <a href="{{ route('customer') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-dashboard'></i>
                <span>Klanten</span>
            </li>
        </a>
        <a href="{{ route('customer.new') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-dashboard'></i>
                <span>Klant toevoegen</span>
            </li>
        </a>
        <li class="menu-item">
            <i class='bx bxs-bed'></i>
            <span>Kamers</span>
        </li>
        <li class="menu-item">
            <i class='bx bxs-add-to-queue'></i>
            <span>Kamers toevoegen</span>
        </li>
        @if(auth()->user()->role->name == "admin")
            <li class="menu-item">
                <i class='bx bxs-user-detail'></i>
                <span>Medewerkers</span>
            </li>
        @endif
    </ul>
</nav>
<div class="content-wrapper">
    @yield("content")
</div>
