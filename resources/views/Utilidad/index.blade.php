<x-header />
<style>
    .celdas {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #656C82;
    }
</style>
<style>
    /* Cambiar el color de los botones de paginación */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: red !important;
        /* Cambia el color del texto */
    }

    /* Cambiar el color de fondo de los botones de paginación */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        background-color: transparent;
        /* Para evitar un fondo azul */
        border-color: red;
        /* Cambia el color del borde si lo deseas */
    }

    /* Cambiar el color cuando el botón está activo */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: red !important;
        /* Cambia el fondo del botón activo */
        color: white !important;
        /* Cambia el color del texto del botón activo */
    }

    /* Cambiar el color cuando el botón está en hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #ffcccc !important;
        /* Color de fondo en hover */
        color: red !important;
        /* Color del texto en hover */
    }
</style>


<div class="card">
    <div class="card-header">
        <div class="card-header d-flex justify-content-between align-items-center m-2">
            <div class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g id="surface1">
                        <path
                            style=" stroke:none;fill-rule:nonzero;fill:rgb(85.09804%,85.490197%,88.627452%);fill-opacity:1;"
                            d="M 11.25 14.625 L 12.75 14.625 L 12.75 22.875 L 11.25 22.875 Z M 11.25 14.625 " />
                        <path
                            style=" stroke:none;fill-rule:nonzero;fill:rgb(81.176472%,81.176472%,85.09804%);fill-opacity:1;"
                            d="M 17.625 22.125 L 12 19.125 L 6.375 22.125 L 5.625 20.625 L 12 17.25 L 18.375 20.625 Z M 17.625 22.125 " />
                        <path
                            style=" stroke:none;fill-rule:nonzero;fill:rgb(89.803922%,90.196079%,92.156863%);fill-opacity:1;"
                            d="M 2.625 2.625 L 21.375 2.625 L 21.375 15.375 L 2.625 15.375 Z M 2.625 2.625 " />
                        <path
                            style=" stroke:none;fill-rule:nonzero;fill:rgb(85.09804%,85.490197%,88.627452%);fill-opacity:1;"
                            d="M 2.625 2.625 L 21.375 2.625 L 21.375 15.375 L 2.625 15.375 Z M 2.625 2.625 " />
                        <path
                            style=" stroke:none;fill-rule:nonzero;fill:rgb(89.803922%,90.196079%,92.156863%);fill-opacity:1;"
                            d="M 2.625 2.625 L 21.375 2.625 C 21.375 9.667969 15.667969 15.375 8.625 15.375 L 2.625 15.375 Z M 2.625 2.625 " />
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,12.54902%,16.078432%);fill-opacity:1;"
                            d="M 8.625 7.875 C 8.625 7.046875 7.953125 6.375 7.125 6.375 C 6.296875 6.375 5.625 7.046875 5.625 7.875 C 5.625 8.703125 6.296875 9.375 7.125 9.375 C 7.953125 9.375 8.625 8.703125 8.625 7.875 Z M 8.625 7.875 " />
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,12.54902%,16.078432%);fill-opacity:1;"
                            d="M 16.125 7.875 L 18.375 7.875 L 18.375 9.375 L 16.125 9.375 Z M 16.125 7.875 " />
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,12.54902%,16.078432%);fill-opacity:1;"
                            d="M 16.125 10.875 L 18.375 10.875 L 18.375 12.375 L 16.125 12.375 Z M 16.125 10.875 " />
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,12.54902%,16.078432%);fill-opacity:1;"
                            d="M 7.390625 12.640625 L 6.859375 12.109375 L 9.859375 9.109375 C 9.929688 9.039062 10.027344 9 10.125 9 L 11.46875 9 L 13.234375 7.234375 L 13.765625 7.765625 L 11.890625 9.640625 C 11.820312 9.710938 11.722656 9.75 11.625 9.75 L 10.28125 9.75 Z M 7.390625 12.640625 " />
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,12.54902%,16.078432%);fill-opacity:1;"
                            d="M 11.625 6.375 L 14.625 6.375 L 14.625 9.375 Z M 11.625 6.375 " />
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"
                            d="M 1.125 1.125 L 22.875 1.125 L 22.875 3.375 L 1.125 3.375 Z M 1.125 1.125 " />
                        <path
                            style=" stroke:none;fill-rule:nonzero;fill:rgb(26.666668%,26.666668%,26.666668%);fill-opacity:1;"
                            d="M 2.625 1.125 L 21.375 1.125 L 21.375 3.375 L 2.625 3.375 Z M 2.625 1.125 " />
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,12.54902%,16.078432%);fill-opacity:1;"
                            d="M 3.375 6.375 L 3.375 4.125 L 5.625 4.125 Z M 3.375 6.375 " />
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"
                            d="M 22.875 0.75 L 1.125 0.75 C 0.917969 0.75 0.75 0.917969 0.75 1.125 L 0.75 3.375 C 0.75 3.582031 0.917969 3.75 1.125 3.75 L 2.25 3.75 L 2.25 15.375 C 2.25 15.582031 2.417969 15.75 2.625 15.75 L 10.875 15.75 L 10.875 17.421875 L 5.449219 20.292969 C 5.269531 20.390625 5.199219 20.609375 5.289062 20.792969 L 6.039062 22.292969 C 6.085938 22.382812 6.164062 22.453125 6.261719 22.484375 C 6.359375 22.511719 6.460938 22.503906 6.550781 22.457031 L 10.875 20.148438 L 10.875 22.875 C 10.875 23.082031 11.042969 23.25 11.25 23.25 L 12.75 23.25 C 12.957031 23.25 13.125 23.082031 13.125 22.875 L 13.125 20.148438 L 17.449219 22.457031 C 17.539062 22.503906 17.640625 22.511719 17.738281 22.484375 C 17.835938 22.453125 17.914062 22.382812 17.960938 22.292969 L 18.710938 20.792969 C 18.800781 20.609375 18.730469 20.390625 18.550781 20.292969 L 13.125 17.421875 L 13.125 15.75 L 21.375 15.75 C 21.582031 15.75 21.75 15.582031 21.75 15.375 L 21.75 3.75 L 22.875 3.75 C 23.082031 3.75 23.25 3.582031 23.25 3.375 L 23.25 1.125 C 23.25 0.917969 23.082031 0.75 22.875 0.75 Z M 3 3 L 3 1.5 L 21 1.5 L 21 3 Z M 1.5 1.5 L 2.25 1.5 L 2.25 3 L 1.5 3 Z M 12.375 22.5 L 11.625 22.5 L 11.625 19.75 L 12 19.550781 L 12.375 19.75 Z M 17.460938 21.613281 L 12.175781 18.792969 C 12.066406 18.734375 11.933594 18.734375 11.824219 18.792969 L 6.539062 21.613281 L 6.125 20.785156 L 12 17.675781 L 17.875 20.785156 Z M 12.375 17.023438 L 12.175781 16.917969 C 12.066406 16.863281 11.933594 16.863281 11.824219 16.917969 L 11.625 17.023438 L 11.625 15.75 L 12.375 15.75 Z M 21 15 L 3 15 L 3 3.75 L 21 3.75 Z M 22.5 3 L 21.75 3 L 21.75 1.5 L 22.5 1.5 Z M 22.5 3 " />
                    </g>
                </svg>
                <h4 class="card-title" style="margin-left: 10px;">TABLERO DE UTILIDADES PAQUETEO</h4>
            </div>

            {{-- @php
                $months = [
                    1 => 'Enero',
                    2 => 'Febrero',
                    3 => 'Marzo',
                    4 => 'Abril',
                    5 => 'Mayo',
                    6 => 'Junio',
                    7 => 'Julio',
                    8 => 'Agosto',
                    9 => 'Septiembre',
                    10 => 'Octubre',
                    11 => 'Noviembre',
                    12 => 'Diciembre',
                ];
                $currentMonth = date('n');
            @endphp
            <form action="{{ route('solicitud.paqtotal') }}" method="GET" class="d-flex">
                <select class="form-select" aria-label="Default select example" name="month" id="month">
                    @for ($month = 1; $month <= $currentMonth; $month++)
                        <option value="{{ $month }}">{{ $months[$month] }}</option>
                    @endfor
                </select>
                <button type="submit" class="btn btn-outline-primary d-flex"
                    style="margin-left:10px;font-size: 12px;font-family: Titillium Web;font-weight: 700;">
                    <svg style="margin-right: 6px;" width="16" height="16" viewBox="0 0 32 32"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832" y2="-2075.914"
                                gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#18884f" />
                                <stop offset="0.5" stop-color="#117e43" />
                                <stop offset="1" stop-color="#0b6631" />
                            </linearGradient>
                        </defs>
                        <title>file_type_excel</title>
                        <path
                            d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z"
                            style="fill:#185c37" />
                        <path d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z"
                            style="fill:#21a366" />
                        <path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41" />
                        <path
                            d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z"
                            style="opacity:0.10000000149011612;isolation:isolate" />
                        <path
                            d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z"
                            style="opacity:0.20000000298023224;isolation:isolate" />
                        <path
                            d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z"
                            style="opacity:0.20000000298023224;isolation:isolate" />
                        <path
                            d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z"
                            style="opacity:0.20000000298023224;isolation:isolate" />
                        <path
                            d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z"
                            style="fill:url(#a)" />
                        <path
                            d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z"
                            style="fill:#fff" />
                        <path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481" />
                        <path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41" />
                    </svg>
                    DESCARGAR
                </button>
            </form> --}}
        </div>
    </div>
</div>

<div class="d-flex">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <h4 class="card-title pt-1">Reporte detallado</h4>
                        <form method="GET" action="{{ route('utilidad.index') }}" class="d-flex">
                            <!-- Select de Año -->
                            <select name="year" class="form-select me-2" onchange="this.form.submit()" style="width: 80px;">
                                @foreach ($years as $availableYear)
                                    <option value="{{ $availableYear }}" {{ $year == $availableYear ? 'selected' : '' }}>
                                        {{ $availableYear }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- Select de Mes -->
                            <select name="month" class="form-select me-2" onchange="this.form.submit()" style="width: 120px;">
                                @foreach ($months as $availableMonth)
                                    <option value="{{ $availableMonth }}" {{ $month == $availableMonth ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($availableMonth)->translatedFormat('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                        

                    </div>
                    <div class="d-flex justify-content-between">
                        <select class="form-select mx-2 py-0" style="width: 110px;background-color:#F4F5F7;"
                            id="columnSelect" autocomplete="off">
                            <option selected disabled hidden>filtros</option>
                            <option value="1">operador</option>
                            <option value="2">cliente</option>
                            <option value="3">origen</option>
                            <option value="4">destino</option>
                            <option value="5">tipo trayecto</option>
                            <option value="8">utilidad</option>
                        </select>

                        <input class="form-control mx-2" type="text" id="searchBox" autocomplete="off">
                        <select id="operadorSelect" class="form-control mx-2" autocomplete="off"
                            style="display: none;">
                            <option value="">Seleccionar operador</option>
                            @foreach ($operadores as $operador)
                                <option value="{{ $operador->TRANSPORTADORA }}">{{ $operador->TRANSPORTADORA }}
                                </option>
                            @endforeach
                        </select>

                        <div id="clienteFilter" style="display: none;">
                            <input type="text" id="searchClientes" placeholder="Buscar clientes..."
                                autocomplete="off" style="margin-bottom: 10px; width: 100%;">

                            <label>
                                <input type="checkbox" id="selectAllClientes" checked>
                                Seleccionar Todos
                            </label>
                            <div id="clienteCheckboxList"
                                style="max-height: 200px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                                @foreach ($clientes as $cliente)
                                    <label class="cliente-item" style="display: block;">
                                        <input type="checkbox" class="clienteCheckbox"
                                            value="{{ $cliente->CLIENTE }}" checked>
                                        {{ $cliente->CLIENTE }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <select id="origenSelect" class="form-control mx-2" autocomplete="off"
                            style="display: none;">
                            <option value="">Seleccionar origen</option>
                            @foreach ($origenes as $origen)
                                <option value="{{ $origen->ORIGEN }}">{{ $origen->ORIGEN }}</option>
                            @endforeach
                        </select>

                        <select id="destinoSelect" class="form-control mx-2" autocomplete="off"
                            style="display: none;">
                            <option value="">Seleccionar destino</option>
                            @foreach ($destinos as $destino)
                                <option value="{{ $destino->DESTINO }}">{{ $destino->DESTINO }}</option>
                            @endforeach
                        </select>

                        <select id="trayectoSelect" class="form-control mx-2" autocomplete="off"
                            style="display: none;">
                            <option value="">Seleccionar trayecto</option>
                            @foreach ($trayectos as $trayecto)
                                <option value="{{ $trayecto->TIPO_TRAYECTO }}">{{ $trayecto->TIPO_TRAYECTO }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="examplew" class="table table-striped mb-0">
                        <thead class="" style="font-size: 10px;background-color:#FF2029">
                            <tr>
                                <th class="      " style="color: #FFF;border: 1px solid #FFF;">N° GUIAS</th>
                                <th class="celdas" style="color: #FFF;border: 1px solid #FFF;">OPERADOR</th>
                                <th class="      " style="color: #FFF;border: 1px solid #FFF;">CLIENTE</th>
                                <th class="celdas" style="color: #FFF;border: 1px solid #FFF;">ORIGEN</th>
                                <th class="celdas" style="color: #FFF;border: 1px solid #FFF;">DESTINO</th>
                                <th class="      " style="color: #FFF;border: 1px solid #FFF;">TRAYECTO</th>
                                <th class="      " style="color: #FFF;border: 1px solid #FFF;">TOTAL GLE</th>
                                <th class="      " style="color: #FFF;border: 1px solid #FFF;">TOTAL PROVEEDOR
                                </th>
                                <th class="      " style="color: #FFF;border: 1px solid #FFF;">UTILIDAD</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 11px;font-family: Titillium Web;">
                            @foreach ($utiles as $util)
                                <tr style="text-align: center;">
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $util->CANTIDAD_GUIAS }}
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $util->TRANSPORTADORA }}
                                    </td>
                                    <td class="      " style="border: 1px solid #9FAACC;">{{ $util->CLIENTE }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        {{ strToUpper($util->ORIGEN) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        {{ strToUpper($util->DESTINO) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        {{ strToUpper($util->TIPO_TRAYECTO) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        {{ number_format($util->TOTAL_GLE, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        {{ number_format($util->TOTAL_PROVEEDOR, 0, ',', '.') }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC; color: {{ $util->UTILIDAD >= 0 ? 'green' : 'red' }};">
                                        {{ $util->UTILIDAD >= 0 ? '+' : '' }}{{ $util->UTILIDAD }} %
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <div class="row mx-2 my-0">
                    <div class="col-12 col-lg-6 py-0">
                        <div class="card py-1">
                            <div class="card-body py-0">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <span id="sumTotalGle" class="h4">$0</span>
                                        <h6 class="text-uppercase text-muted m-0">TOTAL GLE</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 py-0">
                        <div class="card py-1">
                            <div class="card-body py-0">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <span id="sumTotalProveedor" class="h4">$0</span>
                                        <h6 class="text-uppercase text-muted m-0">TOTAL PROVEEDOR</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 py-0">
                        <div class="card py-1">
                            <div class="card-body py-0">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <span id="gleProveedorDiff" class="h4">0%</span>
                                        <h6 class="text-uppercase text-muted m-0">UTILIDAD GLOBAL</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 py-0">
                        <div class="card py-1">
                            <div class="card-body py-0">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <span id="sumTotalGuias" class="h4">0</span>
                                        <h6 class="text-uppercase text-muted m-0">TOTAL GUIAS</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="myChart" class="drop-shadow" height="300"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#examplew').DataTable({
                responsive: true,
                autoWidth: false,
                ordering: false,
                searching: true,
                language: {
                    lengthMenu: "Mostrar _MENU_ registros por página",
                    zeroRecords: "No se encontraron registros",
                    info: "Página _PAGE_ de _PAGES_",
                    infoEmpty: "No hay registros disponibles",
                    infoFiltered: "(filtrado de _MAX_ registros totales)",
                    search: "Buscar",
                    paginate: {
                        next: "Siguiente",
                        previous: "Anterior"
                    }
                }
            });

            // Manejo del filtro de clientes con checkboxes
            function applyClienteFilter() {
                var selectedClients = [];
                $('#clienteCheckboxList .clienteCheckbox:checked').each(function() {
                    selectedClients.push($(this).val());
                });

                // Filtrar en la tabla
                if (selectedClients.length > 0) {
                    var regex = selectedClients.join(
                    '|'); // Crear una expresión regular con los clientes seleccionados
                    table.column(2).search(regex, true, false).draw(); // Aplicar filtro a la columna CLIENTE
                } else {
                    table.column(2).search('').draw(); // Mostrar todos los datos si no hay clientes seleccionados
                }

                updateSums(); // Actualizar las sumas y el gráfico
            }

            // Manejo del checkbox "Select All"
            $('#selectAllClientes').on('change', function() {
                var isChecked = $(this).is(':checked');
                $('#clienteCheckboxList .clienteCheckbox').prop('checked', isChecked);
                applyClienteFilter();
            });

            // Manejo de checkboxes individuales
            $('#clienteCheckboxList').on('change', '.clienteCheckbox', function() {
                var allChecked = $('#clienteCheckboxList .clienteCheckbox:checked').length === $(
                    '#clienteCheckboxList .clienteCheckbox').length;
                $('#selectAllClientes').prop('checked',
                allChecked); // Actualizar "Select All" según los checkboxes individuales
                applyClienteFilter();
            });

            // Función para limpiar los valores monetarios y convertirlos a número
            function cleanNumber(value) {
                if (typeof value === 'string') {
                    value = value.replace(/\./g, ''); // Elimina los separadores de miles
                    value = value.replace(',', '.'); // Reemplaza la coma por un punto decimal
                }
                return parseFloat(value) || 0; // Convierte el valor a un número o devuelve 0 si no es válido
            }

            // Variables para el gráfico
            var myChart;

            // Función para crear o actualizar el gráfico
            function createOrUpdateChart(totalGle, totalProveedor, utilidadReal) {
                var ctx = document.getElementById('myChart').getContext('2d');

                if (myChart) {
                    // Actualiza los datos en el gráfico
                    myChart.data.datasets[0].data = [totalGle, totalProveedor, utilidadReal];
                    myChart.update(); // Actualiza el gráfico
                } else {
                    // Crear el gráfico si no existe
                    myChart = new Chart(ctx, {
                        type: 'bar', // Gráfico de pastel
                        data: {
                            labels: ['TOTAL GLE', 'TOTAL PROVEEDOR', 'UTILIDAD'],
                            datasets: [{
                                label: 'Valores',
                                data: [totalGle, totalProveedor, utilidadReal],
                                backgroundColor: [
                                    'rgba(255, 32, 41, 1)', // Color para TOTAL GLE
                                    'rgba(134, 163, 184, 1)', // Color para TOTAL PROVEEDOR
                                    'rgba(249, 197, 53, 1)' // Color para UTILIDAD
                                ],
                                borderColor: [
                                    'rgba(255, 255, 255, 1)',
                                    'rgba(255, 255, 255, 1)',
                                    'rgba(255, 255, 255, 1)'
                                ],
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            // Si es el tercer valor (utilidad), muestra el valor monetario
                                            if (context.dataIndex === 2) {
                                                return context.label + ': $' + context.raw
                                                    .toLocaleString(); // Formato de miles
                                            }
                                            return context.label + ': $' + context.raw
                                                .toLocaleString(); // Formato de miles
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }

            // Función para actualizar las sumas de las columnas TOTAL_GLE y TOTAL_PROVEEDOR
            function updateSums() {
                var totalGle = 0;
                var totalProveedor = 0;
                var totalGuias = 0;

                // Recorre las filas visibles (filtradas) en la tabla
                table.rows({
                    filter: 'applied'
                }).every(function() {
                    var row = this.node(); // Obtiene el nodo de la fila actual

                    // Obtiene los valores de las columnas TOTAL_GLE (7) y TOTAL_PROVEEDOR (8)
                    var gleValue = cleanNumber($(row).find('td:eq(6)').text());
                    var proveedorValue = cleanNumber($(row).find('td:eq(7)').text());
                    var guiasValue = cleanNumber($(row).find('td:eq(0)').text());

                    // Suma los valores obtenidos
                    totalGle += gleValue;
                    totalProveedor += proveedorValue;
                    totalGuias += guiasValue;
                });

                // Actualiza los spans con los totales formateados
                $('#sumTotalGle').text('$ ' + totalGle.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                $('#sumTotalProveedor').text('$ ' + totalProveedor.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g,
                    "."));
                $('#sumTotalGuias').text(totalGuias.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, "."));

                // Calcula la diferencia en valor absoluto entre TOTAL_GLE y TOTAL_PROVEEDOR (utilidad real)
                var utilidadReal = totalGle - totalProveedor;

                // Muestra la diferencia porcentual en el nuevo span
                var percentageDiff = 0;
                if (totalProveedor !== 0) {
                    percentageDiff = (utilidadReal / totalGle) * 100;
                    percentageDiff = Math.round(percentageDiff * 100) / 100; // Redondea a 2 decimales
                }
                $('#gleProveedorDiff').text(percentageDiff.toFixed(2) + ' %');

                // Actualiza el gráfico con los nuevos valores, incluyendo la utilidad real
                createOrUpdateChart(totalGle, totalProveedor, utilidadReal, totalGuias);
            }

            // Ejecuta la función de suma al cargar la página y cada vez que se aplique un filtro
            table.on('draw', function() {
                updateSums();
            });

            // Ejecuta la suma inicial al cargar la tabla
            updateSums();

            // Manejo de los filtros por columna
            $('#columnSelect').on('change', function() {
                var selectedColumn = $(this).val();

                $('#searchBox').hide();
                $('#operadorSelect').hide();
                $('#clienteFilter').hide();
                $('#searchClientes').hide();
                $('#selectAllClientes').hide();
                $('#clienteCheckboxList').hide();
                $('#origenSelect').hide();
                $('#destinoSelect').hide();
                $('#trayectoSelect').hide();

                switch (selectedColumn) {
                    case '1': // TRANSPORTADORA
                        $('#operadorSelect').show();
                        break;
                    case '2': // CLIENTE
                        $('#clienteFilter').show();
                        $('#searchClientes').show();
                        $('#selectAllClientes').show();
                        $('#clienteCheckboxList').show();
                        break;
                    case '3': // ORIGEN
                        $('#origenSelect').show();
                        break;
                    case '4': // DESTINO
                        $('#destinoSelect').show();
                        break;
                    default:
                        $('#searchBox').show();
                }
            });

            function searchColumn(columnIndex, value) {
                table
                    .column(columnIndex) // Aplica la búsqueda a la columna seleccionada
                    .search(value) // Usa el valor seleccionado o ingresado
                    .draw(); // Actualiza la tabla con los resultados filtrados
            }

            $('#searchBox').on('keyup', function() {
                var selectedColumn = $('#columnSelect').val();
                searchColumn(selectedColumn, this.value);
            });

            // Eventos para búsqueda con select
            $('#operadorSelect').on('change', function() {
                var selectedColumn = 1; // Columna TRANSPORTADORA
                searchColumn(selectedColumn, this.value);
            });

            $('#clienteFilter').on('change', function() {
                var selectedColumn = 2; // Columna CLIENTE
                searchColumn(selectedColumn, this.value);
            });

            $('#origenSelect').on('change', function() {
                var selectedColumn = 3; // Columna ORIGEN
                searchColumn(selectedColumn, this.value);
            });

            $('#destinoSelect').on('change', function() {
                var selectedColumn = 4; // Columna DESTINO
                searchColumn(selectedColumn, this.value);
            });

            $('#trayectoSelect').on('change', function() {
                var selectedColumn = 5; // Columna TIPO TRAYECTO
                searchColumn(selectedColumn, this.value);
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchClientes');
            const checkboxes = document.querySelectorAll('.clienteCheckbox');
            const selectAllCheckbox = document.getElementById('selectAllClientes');
            const clienteItems = document.querySelectorAll('.cliente-item');

            // Filtrar clientes al escribir en el campo de búsqueda
            searchInput.addEventListener('input', function() {
                const filter = searchInput.value.toLowerCase();
                clienteItems.forEach(item => {
                    const clienteName = item.textContent.toLowerCase();
                    if (clienteName.includes(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            // Seleccionar o deseleccionar todos los clientes
            selectAllCheckbox.addEventListener('change', function() {
                const isChecked = selectAllCheckbox.checked;
                checkboxes.forEach(checkbox => {
                    checkbox.checked = isChecked;
                });
            });

            // Actualizar el estado del "Seleccionar Todos" cuando se cambian los checkboxes individuales
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const allChecked = [...checkboxes].every(chk => chk.checked);
                    selectAllCheckbox.checked = allChecked;
                });
            });
        });
    </script>

    <x-footer />
