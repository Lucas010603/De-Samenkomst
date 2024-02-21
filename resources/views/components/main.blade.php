<link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet"
/>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<nav class="sidebar">
    <header>
        <div class="image-text">
          <span class="image">
            <img src="https://t4.ftcdn.net/jpg/04/06/91/91/240_F_406919147_D3WsGjwXj1qmFNrei2ZFvBWwiueRcFmg.jpg" alt="logo" />
          </span>
            <div class="text header-text">
                <span class="main">Sidebar</span>
                <span class="sub">Component</span>
            </div>
        </div>
        <i class="bx bx-chevron-right toggle"></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="search-bar">
                    <i class="bx bx-search icons"></i>
                    <input type="search" placeholder="Search..." />
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-home-alt icons"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-bar-chart-alt-2 icons"></i>
                        <span class="text nav-text">Revenue</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-bell icons"></i>
                        <span class="text nav-text">Notifications</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-pie-chart-alt icons"></i>
                        <span class="text nav-text">Analytics</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-heart icons"></i>
                        <span class="text nav-text">Likes</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-wallet-alt icons"></i>
                        <span class="text nav-text">Wallets</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="bottom-content">
            <li class="nav-link">
                <a href="#">
                    <i class="bx bx-log-out icons"></i>
                    <span class="text nav-text">Log Out</span>
                </a>
            </li>
            <li class="mode">
                <div class="moon-sun">
                    <i class="bx bx-moon icons moon"></i>
                    <i class="bx bx-sun icons sun"></i>
                </div>
                <span class="mode-text text">Dark Mode</span>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
    </div>
</nav>

<script>
    const body = document.querySelector("body"),
        sidebar = document.querySelector(".sidebar"),
        toggle = document.querySelector(".toggle"),
        modeSwitch = document.querySelector(".toggle-switch"),
        modeText = document.querySelector(".mode-text"),
        searchBtn = document.querySelector(".search-bar");

    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");
        //   document.querySelector(".mode-text").innertext=""

        if (body.classList.contains("dark")) {
            modeText.innerText = " Light Mode ";
        } else modeText.innerText = " Dark Mode ";
    });

    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });

    searchBtn.addEventListener("click", () => {
        sidebar.classList.remove("close");
    });
</script>
