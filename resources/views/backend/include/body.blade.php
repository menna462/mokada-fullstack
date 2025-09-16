@extends('backend.dashboard')
@section('main')
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                                    لوحة تحكم المقايضه
                                </h1>
                                <div class="page-header-subtitle">مرحبا بك فى لوحة تحكم موقع المقايضه
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="row">
                    <div class="col-xl-4 mb-4">
                        <!-- Dashboard example card 1-->
                        <a class="card lift h-100" href="#!">
                            <div class="card-body d-flex justify-content-center flex-column">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="me-3">
                                        <i class="feather-xl text-primary mb-3" data-feather="package"></i>
                                        <h5>عدد الطلبات</h5>
                                        <div class="text-muted small" style="font-size: 40px; color: black;">{{ $totalOrdersCount }}</div>
                                    </div>
                                    <img src={{ asset('backend/assets/img/illustrations/browser-stats.svg') }}
                                        alt="..." style="width: 8rem" />
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 mb-4">
                        <!-- Dashboard example card 2-->
                        <a class="card lift h-100" href="#!">
                            <div class="card-body d-flex justify-content-center flex-column">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="me-3">
                                        <i class="feather-xl text-secondary mb-3" data-feather="book"></i>
                                        <h5>عدد الطلبات المقبوله</h5>
                                        <div class="text-muted small" style="font-size: 40px; color: black;">{{ $acceptedOrdersCount }}</div>
                                    </div>
                                    <img src={{ asset('backend/assets/img/illustrations/processing.svg') }} alt="..."
                                        style="width: 8rem" />
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 mb-4">
                        <!-- Dashboard example card 3-->
                        <a class="card lift h-100" href="#!">
                            <div class="card-body d-flex justify-content-center flex-column">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="me-3">
                                        <i class="feather-xl text-green mb-3" data-feather="layout"></i>
                                        <h5>عدد الطلبات المرفوضه</h5>
                                        <div class="text-muted small" style="font-size: 40px; color: black;">{{ $rejectedOrdersCount }}</div>
                                    </div>
                                    <img src={{ asset('backend/assets/img/illustrations/windows.svg') }} alt="..."
                                        style="width: 8rem" />
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
