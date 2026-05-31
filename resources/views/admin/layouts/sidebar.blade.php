<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">الرئيسية</div>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    لوحة التحكم
                </a>

                <div class="sb-sidenav-menu-heading">إدارة مطعم Feane</div>
                
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-utensils"></i></div>
                    الوجبات (Products)
                </a>

                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    الأقسام (Categories)
                </a>

                <a class="nav-link" href="{{ route('admin.books.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chair"></i></div>
                    طاولات الحجز (Books)
                </a>
                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                    <i class="fas fa-shopping-cart"></i> <span>الطلبات</span>
                </a>
            </div>
        </div>
        
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>