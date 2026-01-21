<x-header />

<div class="row">
    <div class="col-lg-9">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-0 fw-semibold">Sesiones</p>
                                <h3 class="m-0">24k</h3>
                                <p class="mb-0 text-truncate text-muted"><span class="text-success"><i
                                            class="mdi mdi-trending-up"></i>8,5%</span> Sesiones nuevas hoy</p>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-0 fw-semibold">Duración promedio</p>
                                <h3 class="m-0">00:18</h3>
                                <p class="mb-0 text-truncate text-muted"><span class="text-success"><i
                                            class="mdi mdi-trending-up"></i>1,5%</span> Duración promedio sem</p>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <i data-feather="clock" class="align-self-center text-muted icon-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-0 fw-semibold">Tasa de rebote</p>
                                <h3 class="m-0">$2400</h3>
                                <p class="mb-0 text-truncate text-muted"><span class="text-danger"><i
                                            class="mdi mdi-trending-down"></i>35%</span> Tasa de rebote sem</p>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <i data-feather="activity" class="align-self-center text-muted icon-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-0 fw-semibold">Objetivos completados</p>
                                <h3 class="m-0">85000</h3>
                                <p class="mb-0 text-truncate text-muted"><span class="text-success"><i
                                            class="mdi mdi-trending-up"></i>10,5%</span> Finalizaciones sem</p>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <i data-feather="briefcase" class="align-self-center text-muted icon-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Descripción general de la audiencia</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <div class="dropdown">
                            <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Este año<i class="las la-angle-down ms-1"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Hoy</a>
                                <a class="dropdown-item" href="#">Ultima semana</a>
                                <a class="dropdown-item" href="#">Ultimo mes</a>
                                <a class="dropdown-item" href="#">Ultimo año</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body">
                <div class="">
                    <div id="ana_dash_1" class="apex-charts"></div>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Sesiones por dispositivo</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body">
                <div class="text-center">
                    <div id="ana_device" class="apex-charts"></div>
                    <h6 class="bg-light-alt py-3 px-2 mb-0">
                        <i data-feather="calendar" class="align-self-center icon-xs me-1"></i>
                        01 Enero 2025 to 30 Septiembre 2025
                    </h6>
                </div>
                <div class="table-responsive mt-2">
                    <table class="table border-dashed mb-0">
                        <thead>
                            <tr>
                                <th>Dispositivo</th>
                                <th class="text-end">Sesiones</th>
                                <th class="text-end">Día</th>
                                <th class="text-end">Semana</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PCs</td>
                                <td class="text-end">1843</td>
                                <td class="text-end">-3</td>
                                <td class="text-end">-12</td>
                            </tr>
                            <tr>
                                <td>Tabletas</td>
                                <td class="text-end">2543</td>
                                <td class="text-end">-5</td>
                                <td class="text-end">-2</td>
                            </tr>
                            <tr>
                                <td>Moviles</td>
                                <td class="text-end">3654</td>
                                <td class="text-end">-5</td>
                                <td class="text-end">-6</td>
                            </tr>

                        </tbody>
                    </table><!--end /table-->
                </div><!--end /div-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div><!--end row-->

<x-footer />
