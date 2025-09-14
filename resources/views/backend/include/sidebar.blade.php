        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <div class="sidenav-menu-heading d-sm-none">Account</div>
                        <a class="nav-link d-sm-none" href="#!">
                            <div class="nav-link-icon"><i data-feather="bell"></i></div>
                            Alerts
                            <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                        </a>
                        <a class="nav-link d-sm-none" href="#!">
                            <div class="nav-link-icon"><i data-feather="mail"></i></div>
                            Messages
                            <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                        </a>
                        <div>
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <p>Pages</p>
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
                <!-- Sidenav Footer-->
        </div>
