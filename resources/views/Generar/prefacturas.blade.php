<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Adm GLE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Prefactura" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Ap favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

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
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Teachers:ital,wght@0,400..800;1,400..800&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@100..900&family=Teachers:ital,wght@0,400..800;1,400..800&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">

    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/jquery-editable.css') }}" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js">
    </script>

    <style>
        .celdas {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #656C82;
            font-size: 11px;
        }
    </style>

    <div class="py-6 my-6">
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">


                                </div><!--end col-->
                                <div class="col-auto align-self-center">

                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->
                <div class="">
                    <div class="col-lg-12 mx-auto">
                        <div class="card">
                            <div class="card-body invoice-head">
                                <div class="row">
                                    <div class="col-md-4 align-self-center">
                                        <img src="{{ asset('assets/images/logo-sm-dark.png') }}" alt="logo-small"
                                            class="" height="48">
                                        <p class="mt-0 mb-0" style="color: #fe252d;font-size: 10px;font-weight:600;">
                                            PREFACTURA SERVICIOS ESPECIALES</p>
                                    </div><!--end col-->
                                    <div class="col-md-8">
                                        <ul class="list-inline mb-0 contact-detail float-end">
                                            <li class="list-inline-item">
                                                <div class="ps-3">
                                                    <i class="mdi mdi-web" style="color: #fe252d"></i>
                                                    <p class="text-muted mb-0" style="font-size: 12px;">
                                                        www.glecolombia.com</p>

                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="ps-3">
                                                    <i class="mdi mdi-phone" style="color: #fe252d"></i>
                                                    <p class="text-muted mb-0" style="font-size: 12px;">+601 6953631</p>

                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="ps-3">
                                                    <i class="mdi mdi-map-marker" style="color: #fe252d"></i>
                                                    <p class="text-muted mb-0">Av. Cra. 70 No. 48 - 45, Bogotá</p>

                                                </div>
                                            </li>
                                        </ul>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end card-body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-unstyled faq-qa">
                                            <li class="mb-1">
                                                <h6 class="mb-0"><b>Cliente: </b>{{ $cliente }}</h6>
                                            </li>
                                            <li class="mb-1">
                                                <h6 class="mb-0"><b>Fecha de facturacion: </b>{{ $fecha }}
                                                </h6>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6" style="text-align: right">
                                        <ul class="list-unstyled faq-qa">
                                            <li class="mb-3 ">
                                                <h6 class="mb-0"><b>Periodo de facturacion</h6>
                                                <h6 class="mb-0">{{ $primero }} - {{ $ultimo }}</h6>
                                            </li>
                                        </ul>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-body-->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive project-invoice">
                                        <table class="table table-bordered mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th style="text-align: center">Item</th>
                                                    <th style="text-align: center">Fecha</th>
                                                    <th style="text-align: center">Tipo servicio</th>
                                                    <th style="text-align: center">Destinatario</th>
                                                    <th style="text-align: center">Direccion</th>
                                                    <th style="text-align: center">Remesa</th>
                                                    <th style="text-align: center">Origen</th>
                                                    <th style="text-align: center">Destino/Ciudad</th>
                                                    <th style="text-align: center">Valor servicio</th>
                                                </tr><!--end tr-->
                                            </thead>
                                            <tbody>
                                                @foreach ($datos as $dato)
                                                    <tr>
                                                        <td class="celdas">{{ $dato->guia }}</td>
                                                        <td class="celdas">{{ $dato->fecha_cargue }}</td>
                                                        <td class="celdas">Masivos</td>
                                                        <td class="celdas">{{ $dato->destinatario }}</td>
                                                        <td class="celdas">{{ $dato->direccion }}</td>
                                                        <td class="celdas">{{ $dato->remesa }}</td>
                                                        <td class="celdas">{{ $dato->origen }}</td>
                                                        <td class="celdas">{{ $dato->destino }}</td>
                                                        <td class="celdas" style="text-align: right;">$
                                                            {{ number_format($dato->valor_cobrar, 0, ',', '.') }}</td>
                                                    </tr><!--end tr-->
                                                @endforeach
                                                <tr>
                                                    <th colspan="2" class="border-0"></th>
                                                    <td class="border-0 font-14 text-dark"></td>
                                                    <td class="border-0 font-14 text-dark"></td>
                                                    <td class="border-0 font-14 text-dark"></td>
                                                    <td class="border-0 font-14 text-dark"></td>
                                                    <td class="border-0 font-14 text-dark"></td>
                                                    <td class="border-0 font-14 text-dark"><b></b></td>
                                                    <td class="border-0 font-14 text-dark"><b></b></td>
                                                </tr><!--end tr-->
                                                <tr class="bg-black text-white">
                                                    <th colspan="2" class="border-0"></th>
                                                    <td class="border-0 font-14"></td>
                                                    <td class="border-0 font-14"></td>
                                                    <td class="border-0 font-14"></td>
                                                    <td class="border-0 font-14"></td>
                                                    <td class="border-0 font-14"></td>
                                                    <td class="border-0 font-14"><b>Total</b></td>
                                                    <td class="border-0 font-14" style="text-align: right;"><b>$ {{ number_format($total, 0, ',', '.') }}</b></td>
                                                </tr><!--end tr-->
                                            </tbody>
                                        </table><!--end table-->
                                    </div> <!--end /div-->
                                </div> <!--end col-->
                            </div><!--end row-->

                            <hr>

                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-12 col-xl-4 ms-auto align-self-center">
                                    <div class="text-center"><small class="font-12">Gracias por hacer negocios con
                                            nosotros.</small></div>
                                </div><!--end col-->
                                <div class="col-lg-12 col-xl-4">
                                    <div class="float-end d-print-none">
                                    <button id="btnExcel" class="btn btn-soft-success btn-sm">Excel</button>
                                    <a href="javascript:window.print()" class="btn btn-soft-primary btn-sm">Imprimir</a>
                                    <a href="{{ route('solicitud.prefactura') }}" class="btn btn-soft-secondary btn-sm">Cancelar</a>
                                </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->

        </div><!-- container -->


    </div>
    <!-- end page content -->
    </div>
    
    <script>
    document.getElementById('btnExcel').addEventListener('click', function() {
        // Obtenemos la tabla
        let table = document.querySelector('.table');

        // Convertimos la tabla a una hoja de trabajo de Excel
        let workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });

        // Exportamos a un archivo .xlsx
        XLSX.writeFile(workbook, 'DatosPrefactura.xlsx');
    });
</script>
