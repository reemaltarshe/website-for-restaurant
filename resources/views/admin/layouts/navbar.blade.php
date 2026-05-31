<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">Feane Admin</a>
    
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    
    <div class="dropdown d-inline-block me-2" style="position: relative; id="bellContainer">
        <button class="btn btn-link text-white-50 position-relative dropdown-toggle text-decoration-none p-0 border-0" type="button" id="notificationBell" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none;">
            <i class="fas fa-bell fa-fw" style="font-size: 18px;"></i>
            <span id="notification-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 9px; padding: 2px 5px; display: none; transform: translate(-30%, -30%) !important;">0</span>
        </button>
        
        <ul class="dropdown-menu dropdown-menu-end shadow-lg mt-2" aria-labelledby="notificationBell" id="notification-list" style="min-width: 290px; max-height: 350px; overflow-y: auto; direction: rtl; text-align: right;">
            <li id="no-notifications" class="text-center py-3 text-muted" style="font-size: 13px;">لا توجد إشعارات جديدة</li>
        </ul>
    </div>
    
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item" style="border: none; background: none; width: 100%; text-align: left;">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>