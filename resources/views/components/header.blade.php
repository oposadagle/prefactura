<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Prefactura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Prefactura" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Ap favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- jvectormap -->
    <link href="{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
    <!--Form Wizard-->
    <link rel="stylesheet" href="{{ asset('plugins/jquery-steps/jquery.steps.css') }}">
    <link href="{{ asset('plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">

    <!-- Plugins css -->
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/huebee/huebee.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Teachers:ital,wght@0,400..800;1,400..800&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@100..900&family=Teachers:ital,wght@0,400..800;1,400..800&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/jquery-editable.css') }}" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>


    <style>
        #customFinishButton {
            display: none;
        }
    </style>

    <style>
        th {
            text-align: center;
            background-color: #CDF7E5;
            color: #02824C;
            border: 1px solid #9FAACC;
        }
    </style>
    
    <style>
        .topbar {
            display: flex;
            align-items: center;
            height: 60px;
            /* Ajusta la altura del topbar */
        }

        .navbar-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .topbar-nav {
            display: flex;
            align-items: center;
        }

        .logo-center {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-sm {
            height: 50px;
            /* Ajusta la altura del logo si es necesario */
        }
    </style>

</head>

<body class="dark-sidenav">
    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <!-- LOGO -->
        <div class="brand">
            <a class="logor">
                <span>
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="my-3"
                        height="35px">
                </span>
                
                {{-- <span>
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large"  class="logo-lg logo-light">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
                </span> --}}
            </a>
        </div>
        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <ul class="metismenu left-sidenav-menu">
                <li class="menu-label mt-0">Principal</li>
                <li>
                    <a href="/dashboard"> <i data-feather="home"
                            class="align-self-center menu-icon"></i><span>Inicio</span><span class="menu-arrow">
                <li>
                    <a href="javascript: void(0);"><i data-feather="briefcase"
                            class="align-self-center menu-icon"></i><span>Comercial</span><span class="menu-arrow"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    {{-- <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('cliente.create') }}">Crear clientes</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('cliente.index') }}">Editar
                                clientes</a></li>
                        <li>
                            <a href="javascript: void(0);">Reportes<span class="menu-arrow left-has-menu"><i
                                        class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="apps-email-inbox.html">Informe comercial</a></li>
                                <li><a href="apps-email-read.html">Otros informes</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                </li>

                <li>
                    <a href="javascript: void(0);"><i data-feather="framer"
                            class="align-self-center menu-icon"></i><span>Facturación</span><span class="menu-arrow"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('admin.index')
                            <li class="nav-item"><a class="nav-link" href="{{ route('estado.create') }}"><i
                                        class="ti-control-record"></i>Cargar archivos</a></li>
                        @endcan
                        @can('cargar.facturas')
                            <li class="nav-item"><a class="nav-link" href="{{ route('cuenta.index') }}"><i
                                class="ti-control-record"></i>Cargar facturas</a></li>
                        @endcan
                        @can('utilidad')                            
                            <li class="nav-item"><a class="nav-link" href="{{ route('utilidad.indice') }}"><i
                                        class="ti-control-record"></i>Utilidad Masivos</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('utilidad.informe') }}"><i
                                        class="ti-control-record"></i>Informes Masivos</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('utilidad.reporte') }}"><i
                                        class="ti-control-record"></i>Reportes de masivos</a></li>
                        @endcan
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i data-feather="layers"
                            class="align-self-center menu-icon"></i><span>Masivos</span><span class="menu-arrow"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Operaciones<span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                        <ul class="nav-second-level" aria-expanded="false">
                                            @can('solicitud.create')
                                            <li class="nav-item"><a class="nav-link" href="{{ route('solicitud.create') }}">Solicitud de
                                                    servicio</a></li>
                                            @endcan
                                            @can('solicitud.index')
                                            <li class="nav-item"><a class="nav-link" href="{{ route('solicitud.index') }}">Registros
                                                    activos</a></li>
                                            @endcan
                                            @can('solicitud.historico')
                                            <li class="nav-item"><a class="nav-link" href="{{ route('solicitud.historico') }}">Registro
                                                    histórico</a></li>
                                            @endcan
                                            @can('solicitud.sac')
                                            <li class="nav-item"><a class="nav-link" href="{{ route('solicitud.sac') }}">Servicio al cliente</a></li>
                                            @endcan
                                            @can('solicitud.trafico')
                                            <li class="nav-item"><a class="nav-link" href="{{ route('solicitud.trafico') }}">Tráfico</a></li>
                                            @endcan
                                            @can('libre.index')                       
                                            <li class="nav-item"><a class="nav-link" href="{{ route('libre.index') }}">Vehículos disponibles</a></li>
                                            @endcan
                                            @can('vehiculo.index')
                                            <li class="nav-item"><a class="nav-link" href="{{ route('vehiculo.index') }}">Lista
                                                    de vehículos</a></li>
                                            @endcan
                                            @can('edita.cotizacion')
                                                <li class="nav-item"><a class="nav-link" href="{{ route('price.create') }}">Ingresar cotización</a></li>
                                            @endcan
                                            @can('ver.cotizacion')
                                            <li class="nav-item"><a class="nav-link" href="{{ route('price.index') }}">Lista de cotizaciones</a></li>
                                            @endcan
                                            @can('ver.cotizaciones')
                                            <li class="nav-item"><a class="nav-link" href="{{ route('price.index') }}">Lista de cotizaciones</a></li>
                                            @endcan
                                        </ul>
                                    </li>  
                                    <li>
                                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Financiero <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                        <ul class="nav-second-level" aria-expanded="false">
                                            @can('solicitud.infoestatus')
                                            <li class="nav-item"><a class="nav-link"
                                            href="{{ route('solicitud.infoestatus') }}">Infoestatus maestro</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                            href="{{ route('solicitud.congelado') }}">Historico estatus</a></li>
                                            @endcan
                                            @can('anticipo')
                                                <li><a href="{{ route('solicitud.anticipo') }}">Contable y tesorería</a></li>                                    
                                            @endcan
                                            @can('anticipos')
                                                <li><a href="{{ route('solicitud.anticipos') }}">Anticipos diarios</a></li>                                    
                                            @endcan
                                            @can('prefactura.masivos')
                                            <li><a href="{{ route('solicitud.prefactura') }}">Estatus masivos</a></li>                                                                           
                                            @endcan
                                            @can('bancos')
                                                <li><a href="{{ route('datos-bancarios.index') }}">Datos bancarios</a></li>
                                            @endcan
                                        </ul>
                                    </li>  
                                </ul>
                            </li>  

                <hr class="hr-dashed hr-menu">
                <li class="menu-label my-2">COMPONENTES</li>

                                            <li>
                                                <a href="javascript: void(0);"><i data-feather="box"
                                                        class="align-self-center menu-icon"></i><span>Ajustes</span><span class="menu-arrow"><i
                                                            class="mdi mdi-chevron-right"></i></span></a>
                                                 <ul class="nav-second-level" aria-expanded="false">
                                                    @can('clientes.masivos')
                                                    <li>
                                                        <a href="{{ route('nit.index') }}">Clientes de masivos</a>                                                        
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('proveedor.index') }}">Proveedores de masivos</a>
                                                    </li>
                                                    @endcan
                                                    @can('bancos')
                                                    <li>
                                                        <a href="{{ route('banco.index') }}">Bancos</a>
                                                    </li>
                                                    @endcan
                                                    {{-- <li>
                                                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Advanced UI <span
                                                                class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                                        <ul class="nav-second-level" aria-expanded="false">
                                                            <li><a href="advanced-animation.html">Animation</a></li>

                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Forms <span
                                                                class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                                        <ul class="nav-second-level" aria-expanded="false">
                                                            <li><a href="forms-advanced.html">Advance Elements</a></li>


                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Charts <span
                                                                class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                                        <ul class="nav-second-level" aria-expanded="false">
                                                            <li><a href="charts-apex.html">Apex</a></li>

                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Tables <span
                                                                class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                                        <ul class="nav-second-level" aria-expanded="false">
                                                            <li><a href="tables-basic.html">Basic</a></li>


                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Icons <span
                                                                class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                                        <ul class="nav-second-level" aria-expanded="false">

                                                            <li><a href="icons-dripicons.html">Dripicons</a></li>

                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Maps <span
                                                                class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                                        <ul class="nav-second-level" aria-expanded="false">
                                                            <li><a href="maps-google.html">Google Maps</a></li>

                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Email Template <span
                                                                class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                                        <ul class="nav-second-level" aria-expanded="false">
                                                            <li><a href="email-templates-alert.html">Alert Email</a></li>

                                                        </ul>
                                                    </li> --}}
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="#"><i data-feather="layers"
                                                        class="align-self-center menu-icon"></i><span>Costos</span><span
                            class="badge badge-soft-success menu-arrow">Nuevo</span></a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i data-feather="file-plus"
                            class="align-self-center menu-icon"></i><span>Modulos</span><span class="menu-arrow"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                                                    <li class="nav-item"><a class="nav-link" href="{{ route('solicitud.logs') }}"><i
                                                                class="ti-control-record"></i>Logs</a></li>

                                                </ul>
                </li>
            </ul>


        </div>
    </div>
    <!-- end left-sidenav-->


    <div class="page-wrapper col-sm-10">
        <!-- Top Bar Start -->
        <div class="topbar">
            <nav class="navbar-custom d-flex align-items-center justify-content-between w-100">
                <ul class="list-unstyled topbar-nav d-flex align-items-center mb-0">
                    <!-- Botón de menú -->
                    <li>
                        <button class="nav-link button-menu-mobile">
                            <i data-feather="menu" class="align-self-center topbar-icon"></i>
                        </button>
                    </li>
                    <!-- Botón de solicitar soporte -->
                    <li class="creat-btn">
                        <div class="nav-link">
                            <a class="btn btn-sm btn-soft-danger" href="https://mesadeayuda.glecolombia.com/"
                                target="blank">
                                <i class="fas fa-plus me-2"></i>Solicitar soporte
                            </a>
                        </div>
                    </li>
                </ul>

                <!-- Logo en el centro -->
                <div class="logo-center d-flex align-items-center">
                    <a class="logo">
                        <img src="{{ asset('assets/images/logo-sm-dark.png') }}" alt="logo-small" class="logo-sm">
                    </a>
                </div>

                <ul class="list-unstyled topbar-nav d-flex align-items-center float-end mb-0">
                    <!-- Iconos de la barra derecha (mantén tu código original aquí) -->
                    <li class="dropdown hide-phone">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect"
                            data-bs-toggle="dropdown" href="javascript:void(0);" aria-haspopup="false"
                            aria-expanded="false">
                            <i data-feather="search" class="topbar-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect"
                            data-bs-toggle="dropdown" href="javascript:void(0);" aria-haspopup="false"
                            aria-expanded="false">
                            <i data-feather="bell" class="align-self-center topbar-icon"></i>
                            <span class="badge bg-danger rounded-pill noti-icon-badge">2</span>
                        </a>
                        <!-- Notificaciones (mantén tu código original aquí) -->
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user"
                            data-bs-toggle="dropdown" href="javascript:void(0);" aria-haspopup="false"
                            aria-expanded="false">
                            <span class="ms-1 nav-user-name hidden-sm">{{ Auth::user()->name }}</span>
                            <img src="{{ asset('assets/images/users/user-5.png') }}" alt="profile-user"
                                class="rounded-circle thumb-xs" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('profile.show') }}"><i data-feather="user"
                                    class="align-self-center icon-xs icon-dual me-1"></i> Perfil</a>
                            @can('admin.index')
                                <a class="dropdown-item" href="{{ route('admin.index') }}"><i data-feather="user"
                                        class="align-self-center icon-xs icon-dual me-1"></i> Permisos</a>
                            @endcan
                            <div class="dropdown-divider mb-0"></div>
                            <!-- Authentication -->
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="power" class="align-self-center icon-xs icon-dual me-1"></i>
                                    {{ __('Cerrar sesión') }}
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Top Bar End -->

        
        <!-- Page Content-->
        <div class="page-content" style="background-color: #f4f5f7">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12 mt-3">

                        
                        