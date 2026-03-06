<x-header />
<style>.celdas {    
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #656C82;    
    }

    /* Freeze first column */
    #example th:nth-child(1),
    #example td:nth-child(1) {
        position: sticky;
        left: 0;
        z-index: 10 !important;
        background-clip: padding-box;
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
                    <svg height="28px" width="28px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#E21B1B;" d="M473.657,442.182L473.657,442.182l-54.413-54.365l-11.942-11.926 c-13.567-13.552-35.551-13.539-49.104,0.028c-13.552,13.567-13.539,35.551,0.028,49.104l20.606,20.59l0.08,0.104l20.879,20.838 l45.493,45.445l49.075-49.131L473.657,442.182z"></path> <ellipse cx="266.338" cy="284.064" rx="167.722" ry="167.613"></ellipse> <ellipse style="fill:#FFFFFF;" cx="266.338" cy="284.064" rx="139.615" ry="139.526"></ellipse> <path style="fill:#CCCCCC;" d="M266.335,409.818c-69.452-0.044-125.718-56.382-125.673-125.833 c0.044-69.452,56.382-125.718,125.833-125.673c69.421,0.044,125.673,56.333,125.673,125.753 C392.067,353.505,335.776,409.76,266.335,409.818z M266.335,174.332c-60.598,0.044-109.688,49.205-109.644,109.804 c0.045,60.598,49.205,109.688,109.804,109.644c60.568-0.044,109.644-49.156,109.644-109.724 C376.046,223.464,326.927,174.38,266.335,174.332z"></path> <g> <path style="fill:#E21B1B;" d="M266.335,409.049c-69.026-0.027-124.962-56.005-124.936-125.033 c0.027-69.026,56.005-124.962,125.033-124.936c69.008,0.027,124.936,55.976,124.936,124.984 C391.266,353.067,335.339,408.973,266.335,409.049z M266.335,163.095c-66.814,0.027-120.955,54.212-120.929,121.025 c0.027,66.813,54.211,120.956,121.025,120.929c66.795-0.027,120.929-54.182,120.929-120.977 c-0.093-66.795-54.23-120.914-121.025-120.985L266.335,163.095L266.335,163.095z"></path> <path style="fill:#E21B1B;" d="M256.412,363.139v-19.187c-11.254-0.123-22.289-3.119-32.059-8.704l5.338-18.586 c9.35,5.544,19.988,8.545,30.857,8.704c12.455,0,20.959-6.132,20.959-15.621c0-8.897-6.924-14.635-21.552-19.973 c-20.766-7.51-34.216-17.007-34.216-35.394c0-17.007,11.862-30.064,31.843-33.615v-19.388h16.206v18.387 c9.47,0.107,18.796,2.336,27.29,6.524l-5.338,18.194c-8.301-4.349-17.52-6.654-26.89-6.725c-13.85,0-18.795,7.125-18.795,13.85 c0,8.111,7.125,12.656,23.933,19.38c22.145,8.304,32.059,18.988,32.059,36.579c0,16.831-11.67,31.643-33.422,35.201v20.374 L256.412,363.139z"></path> <path style="fill:#E21B1B;" d="M40.467,260.813v-13.665c-8.012-0.091-15.868-2.223-22.827-6.196l3.839-13.241 c6.66,3.945,14.236,6.08,21.976,6.196c8.872,0,14.931-4.368,14.931-11.133c0-6.34-4.929-10.419-15.356-14.226 c-14.796-5.353-24.373-12.119-24.373-25.215c0.248-12.638,10.054-23.021,22.659-23.988v-13.77h11.549v13.104 c6.747,0.074,13.393,1.663,19.444,4.649l-3.807,12.96c-5.913-3.108-12.483-4.757-19.164-4.809c-9.859,0-13.385,5.074-13.385,9.859 c0,5.779,5.074,9.016,17.048,13.809c15.782,5.915,22.827,13.529,22.827,26.064c-0.252,13.262-10.574,24.143-23.804,25.095v14.507 H40.467z"></path> <path style="fill:#E21B1B;" d="M191.179,99.337V87.554c-6.903-0.081-13.672-1.918-19.669-5.338l3.278-11.422 c5.739,3.402,12.268,5.245,18.939,5.346c7.654,0,12.872-3.767,12.872-9.617c0-5.466-4.248-8.985-13.233-12.263 c-12.751-4.617-21.007-10.419-21.007-21.736c0.225-10.895,8.69-19.835,19.556-20.655V0h9.955v11.301 c5.816,0.062,11.544,1.432,16.759,4.008l-3.278,11.173c-5.097-2.677-10.761-4.095-16.519-4.135c-8.504,0-11.533,4.376-11.533,8.512 c0,4.977,4.376,7.775,14.691,11.894c13.625,5.105,19.677,11.662,19.677,22.442c-0.226,11.432-9.122,20.811-20.526,21.64v12.511 L191.179,99.337z"></path> </g> <path style="fill:#999999;" d="M111.768,145.775v-8.969c-5.248-0.065-10.392-1.466-14.948-4.071l2.5-8.688 c4.371,2.593,9.345,3.997,14.427,4.071c5.835,0,9.81-2.861,9.81-7.31c0-4.16-3.206-6.844-10.083-9.338 c-9.706-3.503-16.03-7.943-16.03-16.543c0.17-8.292,6.607-15.099,14.876-15.733v-9.057h7.582v8.608 c4.428,0.047,8.79,1.09,12.759,3.054l-2.5,8.504c-3.878-2.035-8.188-3.112-12.568-3.142c-6.476,0-8.817,3.326-8.817,6.476 c0,3.791,3.335,5.915,11.221,9.057c10.355,3.879,14.972,8.872,14.972,17.112c-0.172,8.698-6.944,15.831-15.621,16.455v9.522 L111.768,145.775z"></path> <path d="M386.775,124.399v-8.969c-5.256-0.061-10.409-1.463-14.972-4.071l2.5-8.688c4.371,2.593,9.345,3.997,14.427,4.071 c5.835,0,9.81-2.861,9.81-7.31c0-4.16-3.206-6.844-10.083-9.338c-9.706-3.503-16.03-7.943-16.03-16.543 c0.178-8.289,6.617-15.089,14.884-15.717v-9.096h7.582v8.632c4.428,0.047,8.79,1.09,12.759,3.054l-2.5,8.504 c-3.882-2.04-8.198-3.12-12.583-3.15c-6.476,0-8.817,3.326-8.817,6.476c0,3.791,3.335,5.915,11.221,9.057 c10.355,3.879,14.972,8.872,14.972,17.112c-0.172,8.698-6.944,15.831-15.621,16.455v9.522 C394.324,124.399,386.775,124.399,386.775,124.399z"></path> <path d="M65.746,431.538v-8.969c-5.256-0.061-10.409-1.462-14.972-4.071l2.5-8.688c4.371,2.593,9.345,3.997,14.427,4.071 c5.835,0,9.81-2.861,9.81-7.31c0-4.16-3.206-6.844-10.083-9.338c-9.706-3.503-16.03-7.943-16.03-16.543 c0.178-8.289,6.618-15.089,14.884-15.717v-9.065h7.582v8.616c4.428,0.047,8.79,1.09,12.759,3.054l-2.5,8.504 c-3.878-2.035-8.188-3.112-12.568-3.142c-6.476,0-8.817,3.326-8.817,6.476c0,3.791,3.335,5.915,11.221,9.057 c10.355,3.879,14.972,8.872,14.972,17.112c-0.172,8.698-6.944,15.831-15.621,16.455v9.522L65.746,431.538z"></path> <path style="fill:#999999;" d="M45.396,83.54v-6.748c-3.939-0.048-7.8-1.099-11.221-3.054l1.875-6.524 c3.287,1.946,7.025,2.999,10.844,3.054c4.376,0,7.357-2.156,7.357-5.49c0-3.126-2.404-5.146-7.566-7.013 c-7.293-2.645-12.023-5.979-12.023-12.439c0.13-6.22,4.954-11.329,11.157-11.814v-6.813h5.691v6.468 c3.338,0.034,6.624,0.817,9.617,2.293l-1.875,6.412c-2.926-1.533-6.178-2.344-9.482-2.365c-4.857,0-6.596,2.5-6.596,4.857 c0,2.845,2.5,4.448,8.407,6.805c7.783,2.917,11.221,6.668,11.221,12.824c-0.117,6.522-5.167,11.888-11.67,12.399v7.158L45.396,83.54 z"></path> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">CUENTAS DE COBRO</h4>
                </div>         
                @can('bancos') 
                <div class="d-flex align-items-center">
                    <a class="btn btn-dark py-2 mr-2" id="btnPagarBulk" style="font-size: 12px;font-family: Titillium Web;font-weight: 700; margin-right:10px;" href="javascript:void(0);">
                        <svg class="me-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="16px" height="16px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#E7E8E3;" d="M512,402.282c0,16.716-13.55,30.267-30.265,30.267H30.265C13.55,432.549,0,418.996,0,402.282V109.717 c0-16.716,13.55-30.266,30.265-30.266h451.469c16.716,0,30.265,13.551,30.265,30.266L512,402.282L512,402.282z"></path> <rect y="148.13" style="fill:#34495E;" width="512" height="72.01"></rect> <rect y="220.16" style="fill:#FFFFFF;" width="512" height="44.555"></rect> <path style="opacity:0.15;fill:#202121;enable-background:new ;" d="M21.517,402.282V109.717 c0-16.716,13.552-30.266,30.267-30.266h-21.52C13.55,79.451,0,93.003,0,109.717v292.565c0,16.716,13.55,30.267,30.265,30.267h21.52 C35.07,432.549,21.517,418.996,21.517,402.282z"></path> <path style="fill:#EA001B;" d="M374.957,348.191c0-15.018,6.92-28.418,17.742-37.193c-8.227-6.669-18.705-10.669-30.12-10.669 c-26.433,0-47.861,21.428-47.861,47.862s21.428,47.862,47.861,47.862c11.415,0,21.894-3.999,30.12-10.669 C381.876,376.609,374.957,363.209,374.957,348.191z"></path> <path style="fill:#F79F1A;" d="M422.817,300.329c-11.415,0-21.894,3.999-30.119,10.669c10.824,8.775,17.741,22.175,17.741,37.193 s-6.918,28.418-17.741,37.193c8.227,6.669,18.705,10.669,30.119,10.669c26.435,0,47.863-21.428,47.863-47.862 C470.68,321.757,449.252,300.329,422.817,300.329z"></path> <path style="fill:#FF5F01;" d="M410.439,348.191c0-15.018-6.918-28.418-17.741-37.193c-10.822,8.775-17.742,22.175-17.742,37.193 s6.92,28.418,17.742,37.193C403.522,376.609,410.439,363.209,410.439,348.191z"></path> <g> <path style="fill:#FFFFFF;" d="M160.063,322.723H55.437c-4.611,0-8.348-3.736-8.348-8.348c0-4.611,3.736-8.348,8.348-8.348h104.626 c4.611,0,8.348,3.736,8.348,8.348S164.674,322.723,160.063,322.723z"></path> <path style="fill:#FFFFFF;" d="M160.063,357.422H55.437c-4.611,0-8.348-3.736-8.348-8.348s3.736-8.348,8.348-8.348h104.626 c4.611,0,8.348,3.736,8.348,8.348S164.674,357.422,160.063,357.422z"></path> <path style="fill:#FFFFFF;" d="M160.063,392.121H55.437c-4.611,0-8.348-3.736-8.348-8.348c0-4.611,3.736-8.348,8.348-8.348h104.626 c4.611,0,8.348,3.736,8.348,8.348C168.411,388.383,164.674,392.121,160.063,392.121z"></path> </g> </g></svg>
                        PAGAR
                    </a>
                    {{-- Oculto temporalmente: Archivo Plano
                    <a class="btn btn-primary py-2" id="btnArchivoPlano" style="font-size: 12px;font-family: Titillium Web;font-weight: 700;" href="javascript:void(0);">
                        <svg class="me-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="16px" height="16px" fill="#000000" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon style="fill:#CFDCE5;" points="343.754,75.864 413.408,75.864 413.408,512 98.593,512 98.593,75.864 168.234,75.864 "></polygon> <polygon style="fill:#FF6F52;" points="255.999,0 180.391,94.832 218.755,94.832 218.755,175.93 293.241,175.93 293.241,94.832 331.606,94.832 "></polygon> <g> <rect x="157.018" y="206.045" style="fill:#314A5F;" width="28.793" height="17.998"></rect> <rect x="203.801" y="206.045" style="fill:#314A5F;" width="151.174" height="17.998"></rect> <rect x="157.018" y="253.201" style="fill:#314A5F;" width="102.579" height="17.998"></rect> <rect x="277.594" y="253.201" style="fill:#314A5F;" width="77.393" height="17.998"></rect> <rect x="157.018" y="300.344" style="fill:#314A5F;" width="197.97" height="17.998"></rect> <rect x="157.018" y="347.5" style="fill:#314A5F;" width="64.194" height="17.998"></rect> <rect x="239.198" y="347.5" style="fill:#314A5F;" width="115.777" height="17.998"></rect> <rect x="279.394" y="441.787" style="fill:#314A5F;" width="75.591" height="17.998"></rect> </g> </g></svg>
                        ARCHIVO PLANO
                    </a>
                    --}}
                </div>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                @can('bancos')
                                <th class="celdas text-center" style="border: 1px solid #0c213a;">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                </th>
                                @endcan
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">ID</th>                                
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">APROBAR</th>
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">VALIDAR</th>
                                <th class="celdas" style="color: #F3F8FF;border: 1px solid #0c213a;">ESTADO</th>                               
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CARGA 1</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CARGA 2</th>                                
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">STANDBY</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">COSTO DESPLAZAMIENTO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CÉDULA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PROPIETARIO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CLIENTE</th>                                
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">
                                    @can('bancos')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <input class="form-check-input row-checkbox" type="checkbox" value="{{ $diario->id }}">
                                    </td>
                                    @endcan
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-weight: bold;">{{ $diario->razon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->id }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @if($diario->avalado)
                                            <button type="button" class="btn btn-success btn-xs disabled" style="width: 100%; pointer-events: none;">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @else
                                            @can('originar')
                                                <button type="button" class="btn btn-warning btn-xs btn-aprobar" data-id="{{$diario->id}}" style="width: 100%;">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-warning btn-xs disabled" style="width: 100%; pointer-events: none;">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            @endcan
                                        @endif
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @if($diario->verificado)
                                            <button type="button" class="btn btn-success btn-xs disabled" style="width: 100%; pointer-events: none;">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @elseif($diario->avalado && $diario->cedula == 0 && $diario->cargaone == 0 && $diario->cargatwo == 0 && $diario->standby == 0 && $diario->costo_desplazamiento == 0)
                                            <button type="button" class="btn btn-secondary btn-xs disabled" style="width: 100%; pointer-events: none;">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        @else
                                            @can('verificar')
                                                <button type="button" class="btn btn-info btn-xs btn-verificar" data-id="{{$diario->id}}" style="width: 100%;">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-info btn-xs disabled" style="width: 100%; pointer-events: none;">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            @endcan
                                        @endif
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC; padding-top:10px; padding-bottom:10px;">
                                        @php
                                            $estadoClass = 'bg-secondary';
                                            if($diario->estado_cuenta == 'PENDIENTE POR APROBAR') $estadoClass = 'bg-danger';
                                            elseif($diario->estado_cuenta == 'PENDIENTE POR VALIDAR') $estadoClass = 'bg-warning text-dark';
                                            elseif($diario->estado_cuenta == 'PENDIENTE POR PAGAR') $estadoClass = 'bg-info';
                                            elseif($diario->estado_cuenta == 'CUENTA PAGADA') $estadoClass = 'bg-success';
                                        @endphp
                                        <span class="badge {{ $estadoClass }}" style="font-weight:600;">
                                            {{ $diario->estado_cuenta }}
                                        </span>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $claseBoton = $diario->placa ? 'btn btn-warning py-0 px-2 fw-bold f-6' : '';
                                        @endphp
                                        <a href="#" class="{{ $claseBoton }}">{{ $diario->placa }}</a>  
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->cargaone, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->cargatwo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->standby, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_desplazamiento, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cedula }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->asociado) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>                                                                        
                                </tr>
                            @endforeach
                        </tbody>
                    </table><!--end /table-->
                </div><!--end /tableresponsive-->               
           
            </div>
        </div>
    </div>
</div>

@if(session('success'))
        <script>
            Swal.fire("Actualización correcta").then((result) => {
                if (result.isConfirmed) {
                    window.location = "/cuentas";
                }
            });
        </script>
    @endif

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
            // Check if all rows are selected to re-check master
            if ($('.row-checkbox:checked').length === $('.row-checkbox').length) {
                $('#selectAll').prop('checked', true);
            }
        }
    });

    // 3. Pagar bulk action
    $('#btnPagarBulk').click(function(e) {
        e.preventDefault();
        
        var selectedIds = [];
        $('.row-checkbox:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Debe seleccionar al menos un registro para pagar.'
            });
            return;
        }

        Swal.fire({
            title: '¿Está seguro de pagar los registros seleccionados?',
            text: "Se marcarán como pagados " + selectedIds.length + " registro(s)",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, pagar',
            cancelButtonText: 'Cancelar',
            customClass: {
                confirmButton: 'btn',
                cancelButton: 'btn'
            },
            didOpen: () => {
                const confirmBtn = Swal.getConfirmButton();
                const cancelBtn = Swal.getCancelButton();
                confirmBtn.style.setProperty('background-color', '#FE252D', 'important');
                confirmBtn.style.setProperty('border-color', '#FE252D', 'important');
                confirmBtn.style.setProperty('color', '#ffffff', 'important');
                
                cancelBtn.style.setProperty('background-color', '#758A93', 'important');
                cancelBtn.style.setProperty('border-color', '#758A93', 'important');
                cancelBtn.style.setProperty('color', '#ffffff', 'important');
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // disable button to prevent double clicks
                $('#btnPagarBulk').addClass('disabled').html('<i class="ti ti-loader fa-spin me-2"></i> PROCESANDO...');
                
                $.ajax({
                    url: '{{ route("solicitud.pagarCuentas") }}',
                    type: 'POST',
                    data: {
                        ids: selectedIds,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                '¡Pagados!',
                                'Los registros se han actualizado correctamente.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            $('#btnPagarBulk').removeClass('disabled').html('<i class="ti ti-credit-card me-2"></i> PAGAR');
                            Swal.fire('Error', response.message || 'Error desconocido', 'error');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error AJAX:', textStatus, errorThrown);
                        $('#btnPagarBulk').removeClass('disabled').html('<i class="ti ti-credit-card me-2"></i> PAGAR');
                        Swal.fire('Error', 'Hubo un problema de conexión al procesar los pagos.', 'error');
                    }
                });
            }
        });
    });

    // 4. Archivo plano download
    $('#btnArchivoPlano').click(function(e) {
        e.preventDefault();

        var selectedIds = [];
        $('.row-checkbox:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Debe seleccionar al menos un registro para generar el archivo plano.'
            });
            return;
        }

        // Create a hidden form to POST and trigger the file download
        var form = $('<form>', {
            method: 'POST',
            action: '{{ route("solicitud.archivoPlano") }}'
        });

        form.append($('<input>', { type: 'hidden', name: '_token', value: '{{ csrf_token() }}' }));

        selectedIds.forEach(function(id) {
            form.append($('<input>', { type: 'hidden', name: 'ids[]', value: id }));
        });

        $('body').append(form);
        form.submit();
        form.remove();
    });
});
</script>

<x-footer />