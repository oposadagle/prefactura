<x-header />
<style>.celdas {    
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #656C82;    
    }
    /* Freeze first column (Checkbox) */
    #example th:nth-child(1),
    #example td:nth-child(1) {
        position: sticky;
        left: 0;
        z-index: 10 !important;
        background-clip: padding-box;
    }

    /* Freeze second column (MANIFIESTO) */
    #example th:nth-child(2),
    #example td:nth-child(2) {
        position: sticky;
        left: 31px; /* Adjust this value if the checkbox column width is different */
        z-index: 10 !important;
        background-clip: padding-box;
    }
    
    /* Set fixed width for the first column to make the second column's offset stable */
    #example th:nth-child(1), #example td:nth-child(1) {
        min-width: 30px;
        max-width: 30px;
    }

    /* Handle backgrounds for sticky header */
    #example thead th:nth-child(1),
    #example thead th:nth-child(2) {
        background-color: #212529 !important; /* Table dark header */
        z-index: 11 !important; /* Higher than body cells */
    }

    /* Handle backgrounds for striped sticky body rows */
    #example tbody tr:nth-of-type(odd) td:nth-child(1),
    #example tbody tr:nth-of-type(odd) td:nth-child(2) {
        background-color: #f2f2f2 !important; 
    }
    #example tbody tr:nth-of-type(even) td:nth-child(1),
    #example tbody tr:nth-of-type(even) td:nth-child(2) {
        background-color: #ffffff !important;
    }
</style>

<!-- Sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="28px" height="28px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#999999;" d="M108.967,329.31v132.167c0,0,60.479-31.68,90.72-16.479c30.24,15.2,113.447,37.12,163.367,32.96 c49.92-4.16,130.087-70.239,145.287-92.159c15.2-22.08-19.68-24.8-54.4-6.88c-34.72,17.92-146.727,53.6-199.686,0 c0,0,122.567,11.04,127.047,0c4.48-11.04-13.6-28.96-108.967-49.6C176.967,308.679,108.967,329.31,108.967,329.31z"></path> <rect y="329.311" style="fill:#231F20;" width="72.639" height="148.646"></rect> <path style="fill:#E21B1B;" d="M308.846,293.542V262.71c-18.075-0.205-35.799-5.019-51.496-13.984l8.583-29.872 c15.033,8.901,32.131,13.722,49.6,13.984c20,0,33.696-9.856,33.696-25.112c0-14.304-11.128-23.52-34.648-32.112 c-33.375-12.08-54.991-27.336-54.991-56.896c0-27.336,19.072-48.32,51.2-54.04V33.527h26.008v29.6 c15.222,0.165,30.213,3.75,43.864,10.488l-8.583,29.248c-13.331-6.998-28.143-10.707-43.2-10.816 c-22.248,0-30.191,11.448-30.191,22.248c0,13.04,11.44,20.344,38.464,31.16c35.6,13.352,51.496,30.512,51.496,58.808 c0,27.015-18.752,50.856-53.719,56.575v32.744L308.846,293.542z"></path> <g> <rect x="72.639" y="119.905" style="fill:#999999;" width="158.419" height="15.999"></rect> <rect x="129.1" y="179.26" style="fill:#999999;" width="101.963" height="15.999"></rect> </g> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">ANTICIPOS DIARIOS</h4>
                </div>               

                <div class="d-flex align-items-center">
                    <a class="btn btn-dark py-2 mr-2" id="btnConfirmarBulk" style="font-size: 12px;font-family: Titillium Web;color:#FFAB00;font-weight: 700; margin-right:10px;" href="javascript:void(0);">
                        <svg class="me-1" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#FAFAFA" d="M20,20H4c-1.1,0-2-0.9-2-2V6c0-1.1,0.9-2,2-2h16c1.1,0,2,0.9,2,2v12C22,19.1,21.1,20,20,20z"></path> <path id="Bottom-Bar" fill="#303F9F" d="M2,16h20v2c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V16z"></path> <path id="Top-Bar" fill="#FFAB00" d="M4,4h16c1.1,0,2,0.9,2,2v2H2V6C2,4.9,2.9,4,4,4z"></path> <path opacity="0.12" fill="#020202" d="M20,4H4C2.9,4,2,4.9,2,6v12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V6C22,4.9,21.1,4,20,4z M21,18c0,0.6-0.4,1-1,1H4c-0.6,0-1-0.4-1-1V6c0-0.6,0.4-1,1-1h16c0.6,0,1,0.4,1,1V18z"></path> <path fill="#303F9F" d="M15,13H9c-0.6,0-1-0.4-1-1v0c0-0.6,0.4-1,1-1h6c0.6,0,1,0.4,1,1v0C16,12.6,15.6,13,15,13z"></path> </g></svg>
                        CONFIRMAR
                    </a>
                    
                    @can('bancos')
                    <a class="btn btn-primary py-2 mr-2" id="btnArchivoPlano" style="font-size: 12px;font-family: Titillium Web;font-weight: 700; margin-right:10px;" href="javascript:void(0);">
                        <svg class="me-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="16px" height="16px" fill="#000000" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon style="fill:#CFDCE5;" points="343.754,75.864 413.408,75.864 413.408,512 98.593,512 98.593,75.864 168.234,75.864 "></polygon> <polygon style="fill:#FF6F52;" points="255.999,0 180.391,94.832 218.755,94.832 218.755,175.93 293.241,175.93 293.241,94.832 331.606,94.832 "></polygon> <g> <rect x="157.018" y="206.045" style="fill:#314A5F;" width="28.793" height="17.998"></rect> <rect x="203.801" y="206.045" style="fill:#314A5F;" width="151.174" height="17.998"></rect> <rect x="157.018" y="253.201" style="fill:#314A5F;" width="102.579" height="17.998"></rect> <rect x="277.594" y="253.201" style="fill:#314A5F;" width="77.393" height="17.998"></rect> <rect x="157.018" y="300.344" style="fill:#314A5F;" width="197.97" height="17.998"></rect> <rect x="157.018" y="347.5" style="fill:#314A5F;" width="64.194" height="17.998"></rect> <rect x="239.198" y="347.5" style="fill:#314A5F;" width="115.777" height="17.998"></rect> <rect x="279.394" y="441.787" style="fill:#314A5F;" width="75.591" height="17.998"></rect> </g> </g></svg>
                        ARCHIVO PLANO
                    </a>
                    @endcan

                    <a class="btn btn-outline-primary py-2" style="font-size: 12px;font-family: Titillium Web;font-weight: 700;" href="{{ route('solicitud.diario') }}">
                        <svg width="16" height="16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832" y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse"> <stop offset="0" stop-color="#18884f" /> <stop offset="0.5" stop-color="#117e43" /> <stop offset="1" stop-color="#0b6631" /> </linearGradient> </defs> <title>file_type_excel</title> <path d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z" style="fill:#185c37" /> <path d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z" style="fill:#21a366" /> <path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41" /> <path d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z" style="opacity:0.10000000149011612;isolation:isolate" /> <path d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z" style="fill:url(#a)" /> <path d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z" style="fill:#fff" /> <path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481" /> <path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41" /> </svg>
                        <i class="me-2"></i>
                        DESCARGAR
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th class="celdas text-center" style="border: 1px solid #0c213a;">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                </th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CARGUE</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CONDICION DE PAGO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CLIENTE</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CONDUCTOR</th>                                
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGAR ANTICIPO A</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA ANTICIPO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGAR SALDO A</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA SALDO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGAR CONTADO A</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA CONTADO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TIPO VEHICULO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">COSTO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">EXTRA</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">ANTICIPO</th>
                                <th class="celdas" style="color: #00F7FF;border: 1px solid #0c213a;">PAGO COMPLETO</th>
                                <th class="celdas" style="color: #00F7FF;border: 1px solid #0c213a;">CENTRO DE COSTO</th>
                                <th class="celdas" style="color: #00F7FF;border: 1px solid #0c213a;">RETEICA</th>
                                <th class="celdas" style="color: #00F7FF;border: 1px solid #0c213a;">RETEFUENTE</th>
                                <th class="celdas" style="color: #00F7FF;border: 1px solid #0c213a;">SEGURO</th>
                                <th class="celdas" style="color: #00F7FF;border: 1px solid #0c213a;">VALOR A PAGAR</th>                               
                                {{-- <th class="celdas" style="color: #E4FF30;border: 1px solid #0c213a;">CONFIRMAR</th> --}}
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <input class="form-check-input row-checkbox" type="checkbox" value="{{ $diario->id }}">
                                    </td>
                                    <td class="celdas" style="color: #000; font-weight: bold; border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->razon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_cargue }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            @php
                                                $estadoClase = '';
                                                switch ($diario->paytype) {
                                                    case 'AM. ANTICIPAR':
                                                        $estadoClase = 'badge badge-outline-info';
                                                        break;
                                                    case 'PM. ANTICIPAR':
                                                        $estadoClase = 'badge badge-outline-primary';
                                                        break;                                                    
                                                    case 'CONTADO':
                                                        $estadoClase = 'badge badge-outline-success';
                                                        break;
                                                    case 'CONTADO AM.':
                                                        $estadoClase = 'badge badge-outline-success';
                                                        break;
                                                    case 'CONTADO PM.':
                                                        $estadoClase = 'badge badge-outline-success';
                                                        break;
                                                    default:
                                                        $estadoClase = 'badge badge-outline-light';
                                                }
                                            @endphp
                                        <span class="{{ $estadoClase }}">{{ $diario->paytype }}</span>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->origen) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->destino) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $claseBoton = $diario->placa ? 'btn btn-warning py-0 px-2 fw-bold f-6' : '';
                                        @endphp
                                        <a href="#" class="{{ $claseBoton }}">{{ $diario->placa }}</a>  
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->conductor) }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagant }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagant }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagcon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagcon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_vehiculo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_tiposerv, 0, ',', '.') }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->anticipo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $estadoClase = '';
                                            if ($diario->pago_completo == 'SI') {
                                                $estadoClase = 'badge bg-info';
                                            } 
                                            if ($diario->pago_completo == 'NO') {
                                                $estadoClase = 'badge bg-danger';
                                            }
                                        @endphp
                                        <span class="{{ $estadoClase }}">{{ $diario->pago_completo }}</span>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->centro_costo }}</td>

                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->reteica, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->retefuente, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->seguro, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_a_pagar, 0, ',', '.') }}</td>

                                    {{-- <td class="celdas" style="border: 1px solid #9FAACC; padding-top: 10px; padding-bottom: 10px;">
                                        @php
                                            $estadoClase = '';
                                            if ($diario->confirmado == 'SI') {
                                                $estadoClase = 'badge bg-success';
                                            } 
                                            if ($diario->confirmado == 'NO') {
                                                $estadoClase = 'badge bg-warning';
                                            }
                                        @endphp
                                    
                                    @if ($diario->confirmado == 'NO')                                            
                                        <span class="{{ $estadoClase }}">
                                            <i class="dripicons-dots-3"></i>
                                        </span>
                                    @else
                                        <span class="{{ $estadoClase }}">
                                            <i class="dripicons-checkmark"></i>
                                        </span>
                                    @endif
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table><!--end /table-->
                </div><!--end /tableresponsive-->               
           
            </div>
        </div>
    </div>
</div>

<!-- Inicio modal notas cargue -->
<div class="modal fade" id="exampleModalCenter9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Evento: </h6>
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FFFFFF">Notas de cargue</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn3" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" name="antuser" value="{{$userName}}" readonly>
                                <label>Usuario</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control" name="antdate" value="" autocomplete="off">
                                <label>Fecha y hora</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="floatingTextarea2" name="antnote" autocomplete="off" style="height: 100px"></textarea>
                                <label>Observación evento</label>
                            </div>
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<!-- Inicio modal DATOS -->
<div class="modal fade" id="exampleModalCenter15" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Editar</h6>                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn4" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" name="egreso_anticipo" autocomplete="off">
                                <label for="floatingPassword">Egreso anticipo</label>
                            </div> 
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" name="egreso_saldo" autocomplete="off">
                                <label for="floatingPassword">Egreso saldo</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="date" class="form-control" name="fecha_saldo" autocomplete="off">
                                <label for="floatingPassword">Fecha de pago saldo</label>
                            </div>                                         
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter9');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acción del formulario
            var routeTemplate = '{{ route('solicitud.update9', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acción del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acción del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter13');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acción del formulario
            var routeTemplate = '{{ route('solicitud.update13', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acción del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acción del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter15');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acción del formulario
            var routeTemplate = '{{ route('solicitud.update15', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acción del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acción del formulario
        });
    });
</script>

<script> 
$(document).ready(function() {
        $('#examplex').DataTable({
            responsive: true,
            autoWidth: false,
            paging: false,
            info: false,
            "order": [[1, "desc"]],
            "language": {               
                "search": "Buscar:",                
            }
        });
    });

    $.fn.editable.defaults.mode = "inline";
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editable').editable({
        url:"/solicitud/update",
        type: 'text',
        emptytext: 'Sin datos',
        //inputclass: 'form-control',
        success: function(response, newValue) {
            if (response.success) {
                // Actualizar solo el valor del enlace editable
                $(this).text(newValue);                
            } }, } );
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const festivos = @json($festivos).map(f => new Date(f + 'T00:00:00')); // Convertir a Date y normalizar a medianoche
        const diasParaSumar = 9;

        function esFestivo(fecha) {
            return festivos.some(f => f.getTime() === fecha.getTime());
        }

        function sumarDiasSinFestivos(fecha, dias) {
            let contadorDias = 0;
            while (contadorDias < dias) {
                fecha.setDate(fecha.getDate() + 1);
                if (!esFestivo(fecha)) {
                    contadorDias++;
                }
            }
            return fecha;
        }

        const elementosFechaTentativa = document.querySelectorAll('.fecha-tentativa');
        elementosFechaTentativa.forEach(function (elemento) {
            const fechaEnvio = new Date(elemento.getAttribute('data-fecha-envio') + 'T00:00:00');
            const fechaTentativa = sumarDiasSinFestivos(new Date(fechaEnvio), diasParaSumar);
            elemento.textContent = fechaTentativa.toISOString().split('T')[0];
        });
    });
</script>

<script>
    $('.editablef').on('click', function(e) {
    e.preventDefault(); // Evita la acción predeterminada del enlace

    var pk = $(this).data('pk');  // Obtén el ID del registro
    var url = '/solicitud/' + pk + '/update14';  // URL para la actualización

    // Realiza la solicitud AJAX para cambiar el valor
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            enviado: 'SI',  // Enviar el valor "SI" directamente
            _method: 'PUT',   // Método PUT para la actualización
            _token: '{{ csrf_token() }}' // Asegurarse de enviar el token CSRF
        },
        success: function(response) {
            if (response.success) {
                // Actualiza el texto del enlace editable
                $(e.target).text('SI').removeClass('bg-secondary').addClass('bg-info');
                location.reload();
            } else {
                alert('Error al actualizar: ' + response.message);  // Mostrar el mensaje de error del servidor
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
            console.log(jqXHR.responseText);  // Mostrar el detalle del error en la consola
            alert('Ocurrió un error al intentar actualizar.');
        }
    });
});
</script>

<script>
$(document).ready(function() {
    // 1. Maestro checkbox synchronizer
    $('#selectAll').change(function() {
        var isChecked = $(this).prop('checked');
        $('.row-checkbox').prop('checked', isChecked);
    });

    // 2. If row checkbox unchecked, uncheck maestro
    $('.row-checkbox').change(function() {
        if (!$(this).prop('checked')) {
            $('#selectAll').prop('checked', false);
        } else {
            if ($('.row-checkbox:checked').length === $('.row-checkbox').length) {
                $('#selectAll').prop('checked', true);
            }
        }
    });

    // 3. Confirmar bulk action
    $('#btnConfirmarBulk').click(function(e) {
        e.preventDefault();
        
        var selectedIds = [];
        $('.row-checkbox:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Debe seleccionar al menos un registro para confirmar.'
            });
            return;
        }

        Swal.fire({
            title: '¿Está seguro de confirmar los registros seleccionados?',
            text: "Se marcarán como confirmados " + selectedIds.length + " registro(s)",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, confirmar',
            cancelButtonText: 'Cancelar',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-secondary'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // disable button to prevent double clicks
                $('#btnConfirmarBulk').addClass('disabled').html('<i class="ti ti-loader fa-spin me-2"></i> PROCESANDO...');
                
                $.ajax({
                    url: '{{ route("solicitud.confirmarAnticipos") }}',
                    type: 'POST',
                    data: {
                        ids: selectedIds,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                '¡Confirmados!',
                                'Los registros se han actualizado correctamente.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            $('#btnConfirmarBulk').removeClass('disabled').html('<i class="ti ti-check me-2"></i> CONFIRMAR');
                            Swal.fire('Error', response.message || 'Error desconocido', 'error');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#btnConfirmarBulk').removeClass('disabled').html('<i class="ti ti-check me-2"></i> CONFIRMAR');
                        Swal.fire('Error', 'Hubo un problema de conexión al procesar los confirmados.', 'error');
                    }
                });
            }
        });
    });

    // Handle the ARCHIVO PLANO bulk download action
    $('#btnArchivoPlano').on('click', function() {
        var selectedIds = [];
        $('.row-checkbox:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Debe seleccionar al menos un registro para descargar.'
            });
            return;
        }

        var form = $('<form>', {
            'method': 'POST',
            'action': '{{ route("solicitud.archivoPlanoAnticipos") }}'
        });

        form.append($('<input>', {
            'type': 'hidden',
            'name': '_token',
            'value': '{{ csrf_token() }}'
        }));

        selectedIds.forEach(function(id) {
            form.append($('<input>', {
                'type': 'hidden',
                'name': 'ids[]',
                'value': id
            }));
        });

        $('body').append(form);
        form.submit();
        form.remove();
    });
});
</script>

@if(session('success'))
        <script>
            Swal.fire("Actualización correcta").then((result) => {
                if (result.isConfirmed) {
                    window.location = "/anticipos";
                }
            });
        </script>
    @endif

<x-footer />