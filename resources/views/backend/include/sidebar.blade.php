<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-left sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <div>
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                        <p>الصفحات</p>
                        <a class="nav-link" href="{{ route('user') }}">المستخدمين </a>
                        <a class="nav-link" href="{{ route('category') }}">التصنيفات</a>
                        <a class="nav-link" href={{ route('order') }}>الطلبات</a>
                        <a class="nav-link" href={{ route('order.accepted') }}>الطلبات المقبوله</a>
                        <a class="nav-link" href={{ route('order.rejected') }}>الطلبات المرفوضه</a>
                        <a class="nav-link" href={{ route('deals') }}> العروض</a>
                    </nav>
                </div>
            </div>
        </div>
        </nav>
</div>
