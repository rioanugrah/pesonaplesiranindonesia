<div class="startbar d-print-none">

    <div class="brand">
        <a href="index.html" class="logo">
            <span>
                <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                <img src="assets/images/logo-light.png" alt="logo-large" class="logo-lg logo-light">
                <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>


    <div class="startbar-menu">
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">

                <ul class="navbar-nav mb-auto w-100">
                    <li class="menu-label mt-2">
                        <span>Main</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.trip') }}">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Trips</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.booking') }}">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Booking</span>
                        </a>
                    </li>
                    <li class="menu-label mt-2">
                        <span>Transactions</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.transaction') }}">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Transactions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Invoices</span>
                        </a>
                    </li>
                    <li class="menu-label mt-2">
                        <span>User Management</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.roles') }}">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.permission') }}">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Permissions</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
