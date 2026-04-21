<x-header />
<style>    .celdas {    
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #656C82;    
    }

    /* Freeze first column (MANIFIESTO) */
    #example th:nth-child(1),
    #example td:nth-child(1) {
        position: sticky;
        left: 0;
        z-index: 10 !important;
        background-clip: padding-box;
        overflow: visible; /* Allow content to be seen complete */
        text-overflow: clip;
        max-width: none;
        width: auto;
    }

    /* Handle backgrounds for sticky header */
    #example thead th:nth-child(1) {
        background-color: #212529 !important; /* Table dark header */
        z-index: 11 !important; /* Higher than body cells */
    }

    /* Handle backgrounds for striped sticky body rows */
    #example tbody tr:nth-of-type(odd) td:nth-child(1) {
        background-color: #f2f2f2 !important; 
    }
    #example tbody tr:nth-of-type(even) td:nth-child(1) {
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
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="28px" height="28px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="68.002" y="3.995" style="fill:#FFFFFF;" width="375.996" height="504.001"></rect> <path style="fill:#000000;" d="M440.001,8V504H72V8H440.001 M448,0H64v512H448V0z"></path> <rect x="106.636" y="370.238" style="fill:#002833;" width="298.639" height="10.64"></rect> <g> <rect x="106.636" y="412.876" style="fill:#000000;" width="298.639" height="10.64"></rect> <rect x="106.636" y="434.236" style="fill:#000000;" width="298.639" height="10.64"></rect> <rect x="106.636" y="455.525" style="fill:#000000;" width="298.639" height="10.64"></rect> </g> <g> <path style="fill:#E21B1B;" d="M392,338.24h-272c-8.826-0.026-15.974-7.175-16-16V124.88c0.026-8.826,7.175-15.974,16-16h272 c8.826,0.026,15.973,7.175,16,16v197.361C407.974,331.066,400.826,338.214,392,338.24z"></path> <rect x="103.996" y="44.88" style="fill:#E21B1B;" width="53.358" height="31.999"></rect> </g> <rect x="189.363" y="44.88" style="fill:#000000;" width="218.642" height="31.999"></rect> <rect x="163.361" y="269.838" style="fill:#FFFFFF;" width="21.36" height="24.88"></rect> <rect x="204.316" y="240.479" style="fill:#999999;" width="21.36" height="54.245"></rect> <rect x="245.361" y="211.12" style="fill:#FFFFFF;" width="21.36" height="83.6"></rect> <rect x="286.316" y="181.762" style="fill:#999999;" width="21.36" height="112.962"></rect> <rect x="327.36" y="152.403" style="fill:#FFFFFF;" width="21.36" height="142.321"></rect> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">CONTABLE Y TESORERIA</h4>
                </div>  
                
                <div class="col-lg-3">
                        <form action="{{ route('procesar.anticipos') }}" method="post" enctype="multipart/form-data" id="facturaForm">
                        @csrf
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" name="archivo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-outline-primary" style="font-size: 12px;font-family: Titillium Web;font-weight: 700;" type="submit" id="inputGroupFileAddon04">CARGAR</button>
                            </div>
                        </form>
                    </div>

                <a class="btn btn-outline-primary py-2" style="font-size: 12px;font-family: Titillium Web;font-weight: 700;" href="{{ route('solicitud.adelanto') }}">
                    <svg width="16" height="16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832" y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse"> <stop offset="0" stop-color="#18884f" /> <stop offset="0.5" stop-color="#117e43" /> <stop offset="1" stop-color="#0b6631" /> </linearGradient> </defs> <title>file_type_excel</title> <path d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z" style="fill:#185c37" /> <path d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z" style="fill:#21a366" /> <path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41" /> <path d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z" style="opacity:0.10000000149011612;isolation:isolate" /> <path d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z" style="fill:url(#a)" /> <path d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z" style="fill:#fff" /> <path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481" /> <path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41" /> </svg>
                    <i class="me-2"></i>
                    DESCARGAR
                </a>
            </div>            

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">FECHA CARGUE</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">FACTURA</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CONDICION DE PAGO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">ESTADO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">NOTAS</th>
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
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">FACT ELECTRONICA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TIPO VEHICULO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">EDITAR</th>                               
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGO COMPLETO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TIPO LEGALIZACION</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CENTRO DE COSTO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">COSTO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">VALOR ANTICIPO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">EXTRA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">VALOR A PAGAR</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RETEFUENTE</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RETEICA</th>                                
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SEGURO</th>                                
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">VALOR SALDO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">OTRAS DEDUCCIONES</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SALDO TOTAL</th>
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">ESTADO ANTICIPO</th>                                
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">ESTADO SALDO</th>
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">RECIBIDO CUMPLIDO</th>                               
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">TIPO PAGO</th>
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">FECHA ENVIO</th>
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">FECHA TENTATIVA</th>
                                @can('vehiculo.index')
                                    <th class="celdas" style="color: #FFF;border: 1px solid #0c213a;">ENVIAR</th>
                                @endcan
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">NOTAS DEDUCCIONES</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">                                                                        
                                    <td class="celdas fw-bold" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;color: #021526;">{{ $diario->razon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_cargue }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('validar')
                                            <a href="#" class="editable" data-type="text" data-name="factura" data-pk="{{ $diario->id }}">
                                                {{ $diario->factura }}
                                            </a>
                                        @else
                                            {{ $diario->factura }}
                                        @endcan
                                    </td>                                    
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
                                                    case 'ANTICIPO NOCHE':
                                                        $estadoClase = 'badge badge-outline-dark';
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
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <span class="badge bg-{{$diario->color}}" style="color:{{$diario->font}};font-weight:600;">{{strToUpper($diario->state)}}</span></td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $colorB = '';
                                            if ($diario->antdate !== null) {
                                                $colorB = '#4CCD99';
                                            } 
                                            if ($diario->antdate == null) {
                                                $colorB = '#E2DFD0';
                                            }
                                        @endphp
                                        <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter9" style="background-color:{{ $colorB }}"><svg width="16" height="16" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/"><g transform="translate(0 -1028.4)"><path d="m2 4v13.531 2.469c0 1.105 0.8954 2 2 2h4 8l6-6v-12h-20z" transform="translate(0 1028.4)" fill="#f1c40f" /><path d="m22 1044.4-6 6v-4c0-1.1 0.895-2 2-2h4z" fill="#f39c12" /><path d="m4 2c-1.1046 0-2 0.8954-2 2v1 1h20v-1-1c0-1.1046-0.895-2-2-2h-4-8-4z" transform="translate(0 1028.4)" fill="#f1c40f" /><g fill="#f39c12"><rect height="2" width="14" y="1034.4" x="5" /><rect height="2" width="14" y="1038.4" x="5" /><rect height="2" width="9" y="1042.4" x="5" /></g></g></svg></a>
                                    </td>

                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->origen) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->destino) }}</td>
                                    <td class="celdas fw-bold" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;color: #021526;">{{ $diario->placa }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->conductor) }}</td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagant }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagant }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagcon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagcon }}</td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->facele }}</td>                                                                        
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_vehiculo }}</td>                                                                       
                                    {{-- @if ($diario->enviado == 'NO') --}}
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                                        
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter13"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" height="16" width="16"><path style="fill:#DCE5FA;" d="M354.051,8.414H61.167c-18.093,0-32.759,14.667-32.759,32.759v429.653  c0,18.093,14.667,32.759,32.759,32.759h292.885c18.093,0,32.759-14.667,32.759-32.759V41.173  C386.811,23.08,372.144,8.414,354.051,8.414z" /><path style="opacity:0.1;enable-background:new    ;" d="M386.811,104.541c-10.408,2.671-19.954,8.08-27.75,15.877L156.393,323.085  l-4.583,144.975l144.976-4.58l90.025-90.024V104.541H386.811z" /><path style="fill:#FF999A;" d="M475.656,198.696l-54.479-54.479c-10.582-10.582-27.738-10.582-38.32,0l-30.269,30.268l25.777,67.022  l67.022,25.777l30.269-30.269C486.239,226.434,486.239,209.277,475.656,198.696z" /><polygon style="fill:#FFEBBF;" points="186.581,433.292 189.61,337.464 218.416,308.657 311.216,401.456 282.409,430.263 " /><polygon style="fill:#FFD782;" points="282.409,430.263 189.61,337.464 313.464,213.609 378.367,241.507 406.264,306.408 " /><rect x="313.801" y="212.786" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 477.6891 678.7643)" style="fill:#515262;" width="131.24" height="55.328" /><path style="opacity:0.1;enable-background:new    ;" d="M475.656,198.696l-39.662-39.662c10.582,10.582,10.582,27.738,0,38.32  L242.746,390.6l-54.872,1.734l-1.295,40.957l95.828-3.029l193.247-193.247C486.239,226.434,486.239,209.277,475.656,198.696z" /><path d="M427.136,138.267c-6.707-6.707-15.625-10.4-25.11-10.4c-2.306,0-4.578,0.222-6.794,0.65V41.173  C395.232,18.47,376.762,0,354.06,0H134.375c-4.648,0-8.414,3.767-8.414,8.414s3.766,8.414,8.414,8.414H354.06  c13.424,0,24.345,10.921,24.345,24.346v95.692c-0.009,0.008-0.018,0.017-0.027,0.026c-0.497,0.444-0.985,0.9-1.461,1.375  c0,0-95.944,95.941-95.961,95.958c-3.245,3.245-3.242,8.657,0,11.898c3.19,3.192,8.635,3.265,11.899,0l20.617-20.616l80.9,80.9  L282.417,418.363l-80.9-80.901l67.543-67.541c3.286-3.286,3.286-8.613,0-11.898c-3.286-3.286-8.612-3.286-11.899,0l-73.492,73.49  c-0.036,0.036-0.067,0.076-0.102,0.112c-0.061,0.063-0.116,0.128-0.174,0.192c-1.29,1.424-2.071,3.304-2.167,5.223  c-0.002,0.053-0.015,0.103-0.017,0.156l-3.029,95.828c-0.073,2.322,0.818,4.571,2.459,6.215c1.581,1.581,3.721,2.465,5.95,2.465  c0.088,0,0.177-0.001,0.266-0.004l95.828-3.029c0.053-0.001,0.103-0.013,0.156-0.017c2-0.103,3.97-0.948,5.414-2.34  c0.037-0.036,0.077-0.067,0.113-0.103l90.038-90.037v124.652c0,13.425-10.921,24.346-24.345,24.346h-60.687  c-4.648,0-8.414,3.767-8.414,8.414c0,4.647,3.766,8.414,8.414,8.414h60.687c22.702,0,41.172-18.47,41.172-41.173V329.347  l86.382-86.382c13.844-13.844,13.844-36.373,0-50.218L427.136,138.267z M195.282,424.599l2.131-67.442l57.847,57.847l7.462,7.462  L195.282,424.599z M406.272,294.509l-80.9-80.9l27.224-27.224l80.901,80.9L406.272,294.509z M469.715,231.066l-24.319,24.319  l-4.597-4.597l-76.303-76.303c0,0,24.312-24.312,24.321-24.321c3.488-3.488,8.278-5.471,13.208-5.471  c4.99,0,9.681,1.943,13.209,5.472l54.479,54.479C476.999,211.93,476.999,223.782,469.715,231.066z" /><path d="M268.133,503.586c0-4.647-3.766-8.414-8.414-8.414H61.175c-13.425,0-24.346-10.921-24.346-24.346V41.173  c0-13.425,10.921-24.346,24.346-24.346h39.545c4.648,0,8.414-3.767,8.414-8.414S105.368,0,100.721,0H61.175  C38.473,0,20.002,18.47,20.002,41.173v429.654C20.002,493.53,38.473,512,61.175,512h198.543  C264.366,512,268.133,508.233,268.133,503.586z" /></svg></a>
                                        </td>
                                    {{-- @else
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                                        
                                            <span class="py-0 my-0"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" height="16" width="16"><path style="fill:#DCE5FA;" d="M354.051,8.414H61.167c-18.093,0-32.759,14.667-32.759,32.759v429.653  c0,18.093,14.667,32.759,32.759,32.759h292.885c18.093,0,32.759-14.667,32.759-32.759V41.173  C386.811,23.08,372.144,8.414,354.051,8.414z" /><path style="opacity:0.1;enable-background:new    ;" d="M386.811,104.541c-10.408,2.671-19.954,8.08-27.75,15.877L156.393,323.085  l-4.583,144.975l144.976-4.58l90.025-90.024V104.541H386.811z" /><path style="fill:#FF999A;" d="M475.656,198.696l-54.479-54.479c-10.582-10.582-27.738-10.582-38.32,0l-30.269,30.268l25.777,67.022  l67.022,25.777l30.269-30.269C486.239,226.434,486.239,209.277,475.656,198.696z" /><polygon style="fill:#FFEBBF;" points="186.581,433.292 189.61,337.464 218.416,308.657 311.216,401.456 282.409,430.263 " /><polygon style="fill:#FFD782;" points="282.409,430.263 189.61,337.464 313.464,213.609 378.367,241.507 406.264,306.408 " /><rect x="313.801" y="212.786" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 477.6891 678.7643)" style="fill:#515262;" width="131.24" height="55.328" /><path style="opacity:0.1;enable-background:new    ;" d="M475.656,198.696l-39.662-39.662c10.582,10.582,10.582,27.738,0,38.32  L242.746,390.6l-54.872,1.734l-1.295,40.957l95.828-3.029l193.247-193.247C486.239,226.434,486.239,209.277,475.656,198.696z" /><path d="M427.136,138.267c-6.707-6.707-15.625-10.4-25.11-10.4c-2.306,0-4.578,0.222-6.794,0.65V41.173  C395.232,18.47,376.762,0,354.06,0H134.375c-4.648,0-8.414,3.767-8.414,8.414s3.766,8.414,8.414,8.414H354.06  c13.424,0,24.345,10.921,24.345,24.346v95.692c-0.009,0.008-0.018,0.017-0.027,0.026c-0.497,0.444-0.985,0.9-1.461,1.375  c0,0-95.944,95.941-95.961,95.958c-3.245,3.245-3.242,8.657,0,11.898c3.19,3.192,8.635,3.265,11.899,0l20.617-20.616l80.9,80.9  L282.417,418.363l-80.9-80.901l67.543-67.541c3.286-3.286,3.286-8.613,0-11.898c-3.286-3.286-8.612-3.286-11.899,0l-73.492,73.49  c-0.036,0.036-0.067,0.076-0.102,0.112c-0.061,0.063-0.116,0.128-0.174,0.192c-1.29,1.424-2.071,3.304-2.167,5.223  c-0.002,0.053-0.015,0.103-0.017,0.156l-3.029,95.828c-0.073,2.322,0.818,4.571,2.459,6.215c1.581,1.581,3.721,2.465,5.95,2.465  c0.088,0,0.177-0.001,0.266-0.004l95.828-3.029c0.053-0.001,0.103-0.013,0.156-0.017c2-0.103,3.97-0.948,5.414-2.34  c0.037-0.036,0.077-0.067,0.113-0.103l90.038-90.037v124.652c0,13.425-10.921,24.346-24.345,24.346h-60.687  c-4.648,0-8.414,3.767-8.414,8.414c0,4.647,3.766,8.414,8.414,8.414h60.687c22.702,0,41.172-18.47,41.172-41.173V329.347  l86.382-86.382c13.844-13.844,13.844-36.373,0-50.218L427.136,138.267z M195.282,424.599l2.131-67.442l57.847,57.847l7.462,7.462  L195.282,424.599z M406.272,294.509l-80.9-80.9l27.224-27.224l80.901,80.9L406.272,294.509z M469.715,231.066l-24.319,24.319  l-4.597-4.597l-76.303-76.303c0,0,24.312-24.312,24.321-24.321c3.488-3.488,8.278-5.471,13.208-5.471  c4.99,0,9.681,1.943,13.209,5.472l54.479,54.479C476.999,211.93,476.999,223.782,469.715,231.066z" /><path d="M268.133,503.586c0-4.647-3.766-8.414-8.414-8.414H61.175c-13.425,0-24.346-10.921-24.346-24.346V41.173  c0-13.425,10.921-24.346,24.346-24.346h39.545c4.648,0,8.414-3.767,8.414-8.414S105.368,0,100.721,0H61.175  C38.473,0,20.002,18.47,20.002,41.173v429.654C20.002,493.53,38.473,512,61.175,512h198.543  C264.366,512,268.133,508.233,268.133,503.586z" /></svg></span>
                                        </td>
                                    @endif --}}
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
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_legalizacion }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->centro_costo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->anticipo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_tiposerv, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_a_pagar, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->retefuente, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->reteica, 0, ',', '.') }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->seguro, 0, ',', '.') }}</td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_saldo, 0, ',', '.') }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->deducciones, 0, ',', '.') }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->saldo_total, 0, ',', '.') }}</td>

                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $estadoClase = '';
                                            if ($diario->estado_anticipo == 'CONFIRMADO') {
                                                $estadoClase = 'badge bg-success';
                                            } 
                                            if ($diario->estado_anticipo == 'PENDIENTE POR APLICAR') {
                                                $estadoClase = 'badge bg-warning';
                                            }
                                        @endphp
                                        <span class="{{ $estadoClase }}" style="font-weight:600;">{{$diario->estado_anticipo}}</span>
                                    </td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC; padding-top:10px; padding-bottom:10px;">
                                        <span class="badge {{ $diario->pagado ? 'bg-info' : 'bg-orange' }}" style="font-weight:600;">
                                            {{ $diario->pagado ? 'PAGADO' : 'PENDIENTE POR PAGAR' }}
                                        </span>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                                        
                                        <span>{{ $diario->recibido_cumplido }}</span>                                        
                                    </td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                             
                                        @php
                                            $estadoClase = '';
                                            if ($diario->tipo_pago == 'CUENTA DE COBRO') {
                                                $estadoClase = 'badge bg-secondary';
                                            } 
                                            if ($diario->tipo_pago == 'FACTURA') {
                                                $estadoClase = 'badge bg-dark';
                                            }
                                        @endphp
                                        <span class="{{ $estadoClase }}">{{$diario->tipo_pago}}</span>    
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                                        
                                        <span>{{ $diario->fecha_envio }}</span>                                      
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_tentativa }}</td>
                                    
                                    @can('vehiculo.index')
                                        <td class="celdas" style="border: 1px solid #9FAACC; padding-top: 10px; padding-bottom: 10px;">
                                            @php
                                                $estadoClase = '';
                                                if ($diario->enviado == 'SI') {
                                                    $estadoClase = 'badge bg-success';
                                                } 
                                                if ($diario->enviado == 'NO') {
                                                    $estadoClase = 'badge bg-warning';
                                                }
                                            @endphp                                        
                                            @if ($diario->enviado == 'NO')                                            
                                                <a href="#" class="editablef {{ $estadoClase }}" 
                                                   data-type="text" 
                                                   data-name="enviado" 
                                                   data-pk="{{$diario->id}}"
                                                   data-pagant="{{ $diario->pagant ?? '' }}"
                                                   data-cpagant="{{ $diario->cpagant ?? '' }}"
                                                   data-tpagant="{{ $diario->tpagant ?? '' }}">
                                                    <i class="dripicons-dots-3"></i>
                                                </a>
                                            @else
                                                <span class="{{ $estadoClase }}">
                                                    <i class="dripicons-checkmark"></i>
                                                </span>
                                            @endif
                                        </td>
                                    @endcan
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->notasded) }}</td>

                                    {{-- <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $estadoClase = '';
                                            $estadoPago = $diario->estado_pago;
                                            $fechaActual = \Carbon\Carbon::now();
                                            $fechaTentativa = \Carbon\Carbon::parse($diario->fecha_tentativa);
                                    
                                            if ($diario->estado_pago == 'PAGADO') {
                                                $estadoClase = 'badge bg-success';
                                            } 
                                            elseif ($diario->estado_pago == 'PAGO PENDIENTE') {
                                                if ($fechaTentativa->lt($fechaActual)) { // Si la fecha tentativa es menor a la fecha actual
                                                    $estadoPago = 'PAGO VENCIDO';
                                                    $estadoClase = 'badge bg-danger';
                                                } else {
                                                    $estadoClase = 'badge bg-warning';
                                                }
                                            } 
                                            elseif ($diario->estado_pago == 'EN PROCESO') {
                                                $estadoClase = 'badge bg-info';
                                            }
                                        @endphp
                                        <span class="{{ $estadoClase }}" style="font-weight: 600">{{ $estadoPago }}</span>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC; padding-top: 10px; padding-bottom: 10px;">
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
                                    </td>   --}}  
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
<div class="modal fade" id="exampleModalCenter13" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Editar</h6>                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn3" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}                            
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-2">                                    
                                    <input type="date" class="form-control" name="recibido_cumplido" autocomplete="off">
                                    <label>Recibido cumplido</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-2">
                                        <input type="date" class="form-control" name="fecha_envio" autocomplete="off">
                                        <label>Fecha de envio</label>                                    
                                    </div>
                                </div>
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
            var button = event.relatedTarget; // Bot��n que activ�� el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acci��n del formulario
            var routeTemplate = '{{ route('solicitud.update9', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acci��n del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acci��n del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter13');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Bot��n que activ�� el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acci��n del formulario
            var routeTemplate = '{{ route('solicitud.update13', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acci��n del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acci��n del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter15');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Bot��n que activ�� el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acci��n del formulario
            var routeTemplate = '{{ route('solicitud.update15', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acci��n del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acci��n del formulario
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

<script>    $('.editablef').on('click', function(e) {
        e.preventDefault(); 

        var pk = $(this).data('pk'); 
        var pagant = $(this).data('pagant');
        var cpagant = $(this).data('cpagant');
        var tpagant = $(this).data('tpagant');

        // Validacion de datos del receptor
        if (!pagant || !cpagant || !tpagant) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'datos incompletos del receptor del anticipo'
            });
            return;
        }
  // Obt��n el ID del registro
    var url = '/solicitud/' + pk + '/update14';  // URL para la actualizaci��n

    // Realiza la solicitud AJAX para cambiar el valor
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            enviado: 'SI',  // Enviar el valor "SI" directamente
            _method: 'PUT',   // M��todo PUT para la actualizaci��n
            _token: '{{ csrf_token() }}' // Asegurarse de enviar el token CSRF
        },
        success: function(response) {
            if (response.success) {
                // Actualiza el texto del enlace editable
                $(e.target).text('SI').removeClass('bg-secondary').addClass('bg-info');
                //location.reload();
            } else {
                alert('Error al actualizar: ' + response.message);  // Mostrar el mensaje de error del servidor
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
            var mensajeError = 'Ocurrió un error al intentar actualizar.';
            if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                mensajeError += '\n\nDetalle: ' + jqXHR.responseJSON.message;
            } else if (jqXHR.responseText) {
                // Truncar para no saturar si es un HTML de error de Laravel
                mensajeError += '\n\nDetalle: ' + jqXHR.responseText.substring(0, 100);
            }
            alert(mensajeError);
        }
    });
});
</script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            html: `
                <p>{{ session('success') }}</p>
                @if (session('cantidad'))
                    <p><strong>Registros actualizados:</strong> {{ session('cantidad') }}</p>
                @endif
            `,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/anticipo";
            }
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}",
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Errores de validación',
            html: `
                <ul style="text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
            confirmButtonText: 'Entendido'
        });
    </script>
@endif

<x-footer />