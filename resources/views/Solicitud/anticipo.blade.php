<x-header />
<style>.celdas {    
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #656C82;    
    }
</style>

<!-- Sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg height="24" width="24" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508.065 508.065" xml:space="preserve"><g>	<polygon style="fill:#FFFFFF;" points="365.609,147.483 463.109,97.183 333.109,30.183 235.609,80.483  " />	<polygon style="fill:#FFFFFF;" points="258.609,202.683 128.609,135.683 45.009,178.783 175.009,245.883  " /></g><path style="fill:#194F82;" d="M500.409,264.583c6.9-3.6,9.6-12.1,6.1-19c-3.6-6.9-12.1-9.6-19-6.1l-107.8,55.6v-45.6l120.7-62.3  c6.9-3.6,9.6-12.1,6.1-19c-3.6-6.9-12.1-9.6-19-6.1l-107.8,55.6v-45.7l120.7-62.3c9.6-5.1,10.8-18.6,0-25.1l-160.8-82.9  c-4.1-2.1-8.9-2.1-12.9,0l-318.9,164.6c-9.7,5.3-11.1,18.6,0,25.1l160.8,82.9c4.7,2.2,9,2,12.9,0l93.8-48.4v45.7l-100.3,51.7  l-154.3-79.6c-6.9-3.6-15.4-0.9-19,6.1c-3.6,6.9-0.9,15.4,6.1,19l160.8,82.9c4.4,2.1,8.7,2.1,12.9,0l93.8-48.4v45.6l-100.3,51.7  l-154.3-79.6c-6.9-3.6-15.4-0.9-19,6.1c-3.6,6.9-0.9,15.4,6.1,19l160.7,83c4.1,2,8.4,2.1,12.9,0l93.8-48.4v45.7l-100.2,51.6  l-154.3-79.6c-6.9-3.6-15.4-0.9-19,6.1c-3.6,6.9-0.9,15.4,6.1,19l160.8,82.9c4.4,2.1,8.7,2.1,12.9,0l318.9-164.5  c6.9-3.6,9.6-12.1,6.1-19c-3.6-6.9-12.1-9.6-19-6.1l-107.8,55.6v-45.7L500.409,264.583z M175.009,245.883l-130-67.1l83.6-43.1  l130,67.1L175.009,245.883z M159.409,119.783l45.4-23.4l129.9,67l-45.4,23.4L159.409,119.783z M351.409,386.983l-45.8,23.6l-2.2,1.1  v-200.4l48-24.8V386.983z M365.609,147.483l-130-67.1l97.5-50.3l130,67.1L365.609,147.483z" /><g>	<path style="fill:#FF2029;" d="M389.309,90.783l-53.1-27.4c-2,1-4.4,1-6.5,0l-63.6,32.8l68.5,35.3l54.7-28.2   C384.209,100.683,384.209,93.383,389.309,90.783z" />	<path style="fill:#FF2029;" d="M118.609,184.883l53.1,27.4c2-1,4.4-1,6.5,0l49.5-25.5l-68.5-35.3l-40.6,20.9   C123.709,174.983,123.709,182.183,118.609,184.883z" /></g><g>	<polygon style="fill:#FF2029;" points="289.309,186.783 334.809,163.383 204.809,96.283 159.409,119.783  " />	<polygon style="fill:#FF2029;" points="303.509,411.783 305.609,410.683 351.409,386.983 351.409,186.583 303.509,211.283  " /></g></svg>
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
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> CARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;">CONDICION DE PAGO</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;">ESTADO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">NOTAS</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CLIENTE</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CONDUCTOR</th>                                
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGAR ANTICIPO A</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA ANTICIPO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGAR SALDO A</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA SALDO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">FACT ELECTRONICA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TIPO VEHICULO</th>                                
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">NOTAS</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">NOTA CUMPLIDO</th>                                                              
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">COSTO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">EXTRA</th>
                                <th class="celdas" style="color: #FFF;border: 1px solid #0c213a;">EDITAR</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">PAGO COMPLETO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">OBSERVACION PAGO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">ANTICIPO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">ESTADO ANTICIPO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">SALDO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">SALDO FINAL</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">ESTADO SALDO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">RECIBIDO CUMPLIDO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">CUMPLIDO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">PAGAR SALDO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">TIPO PAGO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">FECHA ENVIO</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">FECHA TENTATIVA</th>
                                @can('vehiculo.index')
                                    <th class="celdas" style="color: #FFF;border: 1px solid #0c213a;">ENVIAR</th>
                                @endcan
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">ESTADO PAGO SALDO</th>
                                @can('anticipos')
                                    <th class="celdas" style="color: #FFF;border: 1px solid #0c213a;">EDITAR</th>
                                @endcan
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">EGRESO ANTICIPO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">EGRESO SALDO</th>                                
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">FECHA PAGO SALDO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">CONFIRMADO</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">                                                                        
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_cargue }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->razon }}</td>
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
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $claseBoton = $diario->placa ? 'btn btn-warning py-0 px-2' : '';
                                        @endphp
                                        <a href="#" class="{{ $claseBoton }}">{{ $diario->placa }}</a>  
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->conductor) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->asociado) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->cedula_asociado) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->pagarsaldo) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->cedula_saldo) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->facele }}</td>                                                                        
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_vehiculo }}</td>                                                                        
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="{{ url('/solicitud/'.$diario->id) }}"><svg height="16" width="16" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 385 385" xml:space="preserve"><g id="XMLID_1027_">	<polygon id="XMLID_1029_" style="fill:#FF9811;" points="77.326,355 83.327,385 233.318,355 157.5,355  " />	<polygon id="XMLID_1030_" style="fill:#FF9811;" points="307.5,340.163 377.5,326.162 318.663,31.988 203.612,55 307.5,55  " />	<path id="XMLID_1031_" style="fill:#FFE98F;" d="M157.5,150c-24.813,0-45-20.186-45-45V85h30v20c0,8.271,6.729,15,15,15V55h-15h-30   H7.5v300h69.826H157.5V150z" />	<path id="XMLID_1032_" style="fill:#FFDA44;" d="M307.5,340.163V55H203.612H202.5v50c0,24.814-20.187,45-45,45v205h75.818H307.5   V340.163z" />	<path id="XMLID_1033_" style="fill:#FFDA44;" d="M172.5,105V55h-15v65C165.771,120,172.5,113.271,172.5,105z" />	<path id="XMLID_1034_" style="fill:#565659;" d="M142.5,45c0-8.271,6.729-15,15-15s15,6.729,15,15v10v50c0,8.271-6.729,15-15,15   s-15-6.729-15-15V85h-30v20c0,24.814,20.187,45,45,45s45-20.186,45-45V55V45c0-24.813-20.187-45-45-45s-45,20.187-45,45v10h30V45z" /></g></svg></a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->nota_cumplido) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_tiposerv, 0, ',', '.') }}</td>
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
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $estadoClase = '';
                                            if ($diario->observacion_pago == 'DESCONTAR 6.000') {
                                                $estadoClase = 'badge badge-outline-info';
                                            } 
                                            if ($diario->observacion_pago == 'DESCONTAR 10.000') {
                                                $estadoClase = 'badge badge-outline-primary';
                                            }                                            
                                        @endphp
                                        <span class="{{ $estadoClase }}">{{$diario->observacion_pago}}</span>
                                    </td>                                      
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->anticipo, 0, ',', '.') }}</td>
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
                                        <span class="{{ $estadoClase }}">{{$diario->estado_anticipo}}</span>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->saldo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->saldo_final, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                             
                                        @php
                                            $estadoClase = '';
                                            if ($diario->estado_saldo == 'CONFIRMADO') {
                                                $estadoClase = 'badge bg-success';
                                            } 
                                            if ($diario->estado_saldo == 'PENDIENTE POR APLICAR') {
                                                $estadoClase = 'badge bg-warning';
                                            }
                                        @endphp                                        
                                            <span class="{{ $estadoClase }}">{{$diario->estado_saldo}}</span> 
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                                        
                                        <span>{{ $diario->recibido_cumplido }}</span>                                        
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                             
                                        @php
                                            $estadoClase = '';
                                            if ($diario->cumplido == 'SI') {
                                                $estadoClase = 'badge bg-info';
                                            } 
                                            if ($diario->cumplido == 'NO') {
                                                $estadoClase = 'badge bg-danger';
                                            }
                                        @endphp
                                        <span class="{{ $estadoClase }}">{{$diario->cumplido}}</span>    
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                             
                                        @php
                                            $estadoClase = '';
                                            if ($diario->pagar_saldo == 'SI') {
                                                $estadoClase = 'badge bg-info';
                                            } 
                                            if ($diario->pagar_saldo == 'NO') {
                                                $estadoClase = 'badge bg-danger';
                                            }
                                        @endphp
                                        <span class="{{ $estadoClase }}">{{$diario->pagar_saldo}}</span>    
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
                                                <a href="#" class="editablef {{ $estadoClase }}" data-type="text" data-name="enviado" data-pk="{{$diario->id}}">
                                                    <i class="dripicons-dots-3"></i>
                                                </a>
                                            @else
                                                <span class="{{ $estadoClase }}">
                                                    <i class="dripicons-checkmark"></i>
                                                </span>
                                            @endif
                                        </td>
                                    @endcan

                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
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
                                    
                                     @can('anticipos')
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                                        
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter15"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" height="16" width="16"><path style="fill:#DCE5FA;" d="M354.051,8.414H61.167c-18.093,0-32.759,14.667-32.759,32.759v429.653  c0,18.093,14.667,32.759,32.759,32.759h292.885c18.093,0,32.759-14.667,32.759-32.759V41.173  C386.811,23.08,372.144,8.414,354.051,8.414z" /><path style="opacity:0.1;enable-background:new    ;" d="M386.811,104.541c-10.408,2.671-19.954,8.08-27.75,15.877L156.393,323.085  l-4.583,144.975l144.976-4.58l90.025-90.024V104.541H386.811z" /><path style="fill:#FF999A;" d="M475.656,198.696l-54.479-54.479c-10.582-10.582-27.738-10.582-38.32,0l-30.269,30.268l25.777,67.022  l67.022,25.777l30.269-30.269C486.239,226.434,486.239,209.277,475.656,198.696z" /><polygon style="fill:#FFEBBF;" points="186.581,433.292 189.61,337.464 218.416,308.657 311.216,401.456 282.409,430.263 " /><polygon style="fill:#FFD782;" points="282.409,430.263 189.61,337.464 313.464,213.609 378.367,241.507 406.264,306.408 " /><rect x="313.801" y="212.786" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 477.6891 678.7643)" style="fill:#515262;" width="131.24" height="55.328" /><path style="opacity:0.1;enable-background:new    ;" d="M475.656,198.696l-39.662-39.662c10.582,10.582,10.582,27.738,0,38.32  L242.746,390.6l-54.872,1.734l-1.295,40.957l95.828-3.029l193.247-193.247C486.239,226.434,486.239,209.277,475.656,198.696z" /><path d="M427.136,138.267c-6.707-6.707-15.625-10.4-25.11-10.4c-2.306,0-4.578,0.222-6.794,0.65V41.173  C395.232,18.47,376.762,0,354.06,0H134.375c-4.648,0-8.414,3.767-8.414,8.414s3.766,8.414,8.414,8.414H354.06  c13.424,0,24.345,10.921,24.345,24.346v95.692c-0.009,0.008-0.018,0.017-0.027,0.026c-0.497,0.444-0.985,0.9-1.461,1.375  c0,0-95.944,95.941-95.961,95.958c-3.245,3.245-3.242,8.657,0,11.898c3.19,3.192,8.635,3.265,11.899,0l20.617-20.616l80.9,80.9  L282.417,418.363l-80.9-80.901l67.543-67.541c3.286-3.286,3.286-8.613,0-11.898c-3.286-3.286-8.612-3.286-11.899,0l-73.492,73.49  c-0.036,0.036-0.067,0.076-0.102,0.112c-0.061,0.063-0.116,0.128-0.174,0.192c-1.29,1.424-2.071,3.304-2.167,5.223  c-0.002,0.053-0.015,0.103-0.017,0.156l-3.029,95.828c-0.073,2.322,0.818,4.571,2.459,6.215c1.581,1.581,3.721,2.465,5.95,2.465  c0.088,0,0.177-0.001,0.266-0.004l95.828-3.029c0.053-0.001,0.103-0.013,0.156-0.017c2-0.103,3.97-0.948,5.414-2.34  c0.037-0.036,0.077-0.067,0.113-0.103l90.038-90.037v124.652c0,13.425-10.921,24.346-24.345,24.346h-60.687  c-4.648,0-8.414,3.767-8.414,8.414c0,4.647,3.766,8.414,8.414,8.414h60.687c22.702,0,41.172-18.47,41.172-41.173V329.347  l86.382-86.382c13.844-13.844,13.844-36.373,0-50.218L427.136,138.267z M195.282,424.599l2.131-67.442l57.847,57.847l7.462,7.462  L195.282,424.599z M406.272,294.509l-80.9-80.9l27.224-27.224l80.901,80.9L406.272,294.509z M469.715,231.066l-24.319,24.319  l-4.597-4.597l-76.303-76.303c0,0,24.312-24.312,24.321-24.321c3.488-3.488,8.278-5.471,13.208-5.471  c4.99,0,9.681,1.943,13.209,5.472l54.479,54.479C476.999,211.93,476.999,223.782,469.715,231.066z" /><path d="M268.133,503.586c0-4.647-3.766-8.414-8.414-8.414H61.175c-13.425,0-24.346-10.921-24.346-24.346V41.173  c0-13.425,10.921-24.346,24.346-24.346h39.545c4.648,0,8.414-3.767,8.414-8.414S105.368,0,100.721,0H61.175  C38.473,0,20.002,18.47,20.002,41.173v429.654C20.002,493.53,38.473,512,61.175,512h198.543  C264.366,512,268.133,508.233,268.133,503.586z" /></svg></a>
                                        </td>                                        
                                    @endcan
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->egreso_anticipo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->egreso_saldo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_saldo }}</td>
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
                                    </td>    
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
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FFFFFF">�9�0  Notas de cargue</h6>
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
                                <label>Observaci��n evento</label>
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
                            <div class="form-floating mb-2">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="tipo_pago" autocomplete="off">
                                    <option selected></option>
                                    <option>CUENTA DE COBRO</option>
                                    <option>FACTURA</option>                                        
                                </select>
                                <label for="floatingSelectGrid">Tipo de pago</label>
                            </div> 
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-2">
                                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="cumplido" autocomplete="off">
                                        <option selected></option>
                                        <option>SI</option>
                                        <option>NO</option>                                        
                                    </select>
                                    <label for="floatingSelectGrid">Cumplido</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-2">
                                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="pagar_saldo" autocomplete="off">
                                        <option selected></option>
                                        <option>SI</option>
                                        <option>NO</option>                                        
                                    </select>
                                    <label for="floatingSelectGrid">Pagar saldo</label>
                                    </div>
                                </div>
                            </div>
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

<script>
    $('.editablef').on('click', function(e) {
    e.preventDefault(); // Evita la acci��n predeterminada del enlace

    var pk = $(this).data('pk');  // Obt��n el ID del registro
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
            console.log(jqXHR.responseText);  // Mostrar el detalle del error en la consola
            alert('Ocurrió un error al intentar actualizar.');
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