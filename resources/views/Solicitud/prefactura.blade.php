<x-header />
<style>
    .celdas {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #656C82;
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<style>
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dt-buttons,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 0;
    }
    .dataTables_wrapper .dt-buttons {
        margin-left: 10px;
    }
    .dataTables_wrapper .dataTables_filter {
        margin-left: auto;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg height="24" width="24" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 507.9 507.9" xml:space="preserve"
                        fill="#fe252d" stroke="#fe252d">
                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                        <g id="SVGRepo_iconCarrier">
                            <path style="fill:#FFFFFF;"
                                d="M398.75,28.2h-289.6c-7.8,0-14.1,6.3-14.1,14.1v423.3c0,7.8,6.3,14.1,14.1,14.1h289.6 c7.8,0,14.1-6.3,14.1-14.1V42.3C412.85,34.6,406.55,28.2,398.75,28.2z" />
                            <path style="fill:#ffc3c3e252d;"
                                d="M398.75,0h-289.6c-23.3,0-42.3,19-42.3,42.3v423.3c0,23.3,19,42.3,42.3,42.3h289.6 c23.3,0,42.3-19,42.3-42.3V42.3C441.05,19,422.05,0,398.75,0z M412.85,465.7c0,7.8-6.3,14.1-14.1,14.1h-289.6 c-7.8,0-14.1-6.3-14.1-14.1V42.3c0-7.8,6.3-14.1,14.1-14.1h289.6c7.8,0,14.1,6.3,14.1,14.1V465.7z" />
                            <path style="fill:#ffc3c3;"
                                d="M342.35,84.7h-176.8c-7.8,0-14.1,6.3-14.1,14.1v253c0,7.8,6.3,14.1,14.1,14.1h176.7 c7.8,0,14.1-6.3,14.1-14.1v-253C356.45,91,350.05,84.7,342.35,84.7z" />
                            <path style="fill:#ffc3c3e252d;"
                                d="M342.35,56.4h-176.8c-23.3,0-42.3,19-42.3,42.3v253c0,23.3,19,42.3,42.3,42.3h176.7 c23.3,0,42.3-19,42.3-42.3v-253C384.65,75.4,365.65,56.4,342.35,56.4z M356.45,351.8c0,7.8-6.3,14.1-14.1,14.1h-176.8 c-7.8,0-14.1-6.3-14.1-14.1v-253c0-7.8,6.3-14.1,14.1-14.1h176.7c7.8,0,14.1,6.3,14.1,14.1v253H356.45z" />
                            <circle style="fill:#fff;" cx="253.95" cy="437" r="26.3" />
                            <g>
                                <path style="fill:#ffc3c3e252d;"
                                    d="M197.55,234.5c-7.8,0-14.1,6.3-14.1,14.1v80.2c0,7.8,6.3,14.1,14.1,14.1s14.1-6.3,14.1-14.1v-80.2 C211.65,240.9,205.25,234.5,197.55,234.5z" />
                                <path style="fill:#ffc3c3e252d;"
                                    d="M253.95,178.1c-7.8,0-14.1,6.3-14.1,14.1v136.7c0,7.8,6.3,14.1,14.1,14.1c7.8,0,14.1-6.3,14.1-14.1 V192.2C268.05,184.4,261.75,178.1,253.95,178.1z" />
                                <path style="fill:#ffc3c3e252d;"
                                    d="M310.35,107.5c-7.8,0-14.1,6.3-14.1,14.1v207.2c0,7.8,6.3,14.1,14.1,14.1c7.8,0,14.1-6.3,14.1-14.1 V121.6C324.55,113.9,318.15,107.5,310.35,107.5z" />
                            </g>
                        </g>
                    </svg>
                    <h4 class="card-title" style="margin-left: 10px;">ESTATUS MASIVOS</h4>
                </div>

                <form method="GET" action="{{ route('solicitud.prefactura') }}" class="d-flex">
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

                <div class="col-lg-3">
                    <form action="{{ route('procesar.registros') }}" method="post" enctype="multipart/form-data"
                        id="facturaForm">
                        @csrf
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04" name="archivo"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" autocomplete="off">
                            <button class="btn btn-outline-primary"
                                style="font-size: 12px;font-family: Titillium Web;font-weight: 700;" type="submit"
                                id="inputGroupFileAddon04">CARGAR</button>
                        </div>
                    </form>
                </div>

                <div>
                    <form method="POST" id="print-form">
                        @csrf
                        <input type="hidden" name="guia" id="selected-mms-ids">
                        <select id="tipo-prefactura" class="form-select me-2">
                            <option value="{{ route('generar.prefacturas') }}">Prefactura Estandar</option>
                            <option value="{{ route('generar.facturas') }}">Prefactura Completa</option>
                        </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-primary"
                        style="font-size: 12px; font-family: Titillium Web; font-weight: 700;">                        
                        GENERAR
                    </button>
                    </form>
                </div>

                @php
                    use Carbon\Carbon;
                
                    $months = [
                        1 => 'Enero', 2 => 'Febrero',
                        3 => 'Marzo', 4 => 'Abril',
                        5 => 'Mayo', 6 => 'Junio',
                        7 => 'Julio', 8 => 'Agosto',
                        9 => 'Septiembre', 10 => 'Octubre',
                        11 => 'Noviembre', 12 => 'Diciembre'
                    ];
                
                    // Obtener los últimos 12 meses desde la fecha actual
                    $last12Months = collect();
                    $currentDate = Carbon::now();

                    for ($i = 0; $i < 12; $i++) {
                        $last12Months->push([
                            'month' => $currentDate->format('m'),
                            'year' => $currentDate->format('Y'),
                            'label' => $months[$currentDate->month] . ' ' . $currentDate->year,
                        ]);
                        $currentDate->subMonth();
                    }

                @endphp

            <form action="{{ route('solicitud.prefacturas') }}" method="GET" class="d-flex">
                <select class="form-select" aria-label="Default select example" name="month_year" id="month_year">                                    
                    @foreach ($last12Months as $monthData)
                        <option value="{{ $monthData['year'] }}-{{ $monthData['month'] }}">
                            {{ $monthData['label'] }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-primary d-flex" style="margin-left:10px;font-size: 12px;font-family: Titillium Web;font-weight: 700;">
                    <svg style="margin-right: 6px;" width="16" height="16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832" y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse"> <stop offset="0" stop-color="#18884f" /> <stop offset="0.5" stop-color="#117e43" /> <stop offset="1" stop-color="#0b6631" /> </linearGradient> </defs> <title>file_type_excel</title> <path d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z" style="fill:#185c37" /> <path d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z" style="fill:#21a366" /> <path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41" /> <path d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z" style="opacity:0.10000000149011612;isolation:isolate" /> <path d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z" style="fill:url(#a)" /> <path d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z" style="fill:#fff" /> <path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481" /> <path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41" /> </svg>
                    DESCARGAR
                </button>
            </form>
            </div>

            <div class="col-sm-12 card-header d-flex justify-content-center align-items-center">
                
                    <!-- Select de Clientes -->
                    <select id="cliente-filter" class="form-select me-2" style="width: 200px;">
                        <option value="">Todos los clientes</option>
                        @foreach ($diarias->pluck('cliente')->unique() as $cliente)
                            <option value="{{ $cliente }}">{{ $cliente }}</option>
                        @endforeach
                    </select>

                    <!-- Rango de Fechas -->
                    <input type="date" id="fecha-inicial" class="form-control me-2" autocomplete="off" style="width: 150px;"
                        placeholder="Fecha Inicial">
                    <input type="date" id="fecha-final" class="form-control me-2" autocomplete="off" style="width: 150px;"
                        placeholder="Fecha Final">

                    <!-- Select de Fecha SIIGO -->
                    <span class="me-2">Facturados: </span>
                    <select id="fecha-siigo-filter" class="form-select me-2" style="width: 150px;">
                        <option value="">Todos</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>

                    <!-- Botón para filtrar -->
                    <button id="apply-filters" style="display: none" class="btn btn-primary">Filtrar</button>
                
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="exampleb" class="table table-striped display nowrap" style="width:100%">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;"x|><input
                                        type="checkbox" id="select-all"></th>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">ID</th>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">GUIA</th>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">REMESA</th>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">RADICADO</th>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">TIPO SERVICIO
                                </th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">NIT</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">CLIENTE</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="      " style="color: #C4F4FF;border: 1px solid #0c213a;">DOCUMENTO CLIENTE
                                </th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">DESTINATARIO</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">DIRECCION</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">PIEZAS</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">PESO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">TIPO VEHICULO
                                </th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">FECHA CARGUE</th>
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">VALOR EN FLETE
                                </th>
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">VALOR SOBRE
                                    COSTOS</th>
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">VALOR COSTO
                                    MANEJO</th>
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">VALOR SERVICIOS
                                    COMP.</th>
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">VALOR POR COBRAR
                                </th>
                                <th class="      " style="color: #F0F3FF;border: 1px solid #0c213a;">NOTA SERVICIO
                                </th>
                                <th class="celdas" style="color: #F0F3FF;border: 1px solid #0c213a;">PLF-PLI</th>
                                <th class="celdas" style="color: #F0F3FF;border: 1px solid #0c213a;">FRECUENCIA</th>
                                <th class="celdas" style="color: #F0F3FF;border: 1px solid #0c213a;">FECHA_CIERRE</th>
                                <th class="      " style="color: #FF004D;border: 1px solid #0c213a;">ALERTA
                                    FACTURACION</th>
                                <th class="celdas" style="color: #FF004D;border: 1px solid #0c213a;">FACTURA_SIIGO
                                </th>
                                <th class="celdas" style="color: #FF004D;border: 1px solid #0c213a;">FECHA_SIIGO</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;"><input
                                            type="checkbox" class="mms-checkbox" name="mms_ids[]"
                                            value="{{ $diario->guia }}"></td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->id }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->guia }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->razon) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->remesa) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->radicado) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->tipo_servicio) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->nit }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->cliente) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->origen) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->destino) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->documento_cliente) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->destinatario) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->direccion) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->piezas }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->peso }}</td>
                                    <td class="      "
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->tipo_vehiculo) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $claseBoton = $diario->placa ? 'btn btn-warning py-0 px-2' : '';
                                        @endphp
                                        <a href="#" class="{{ $claseBoton }}">{{ $diario->placa }}</a>
                                    </td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->fecha_cargue }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->valor_cliente, 0, ',', '.') }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->valor_sobrecosto, 0, ',', '.') }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->valor_manejo, 0, ',', '.') }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->valor_servicios, 0, ',', '.') }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->valor_cobrar, 0, ',', '.') }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->nota_servicio }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->plfpli }}</td>
                                    @php
                                        $estadoClase = '';
                                        if ($diario->frecuencia == 'QUINCENAL') {
                                            $estadoClase = 'badge bg-info';
                                        }
                                        if ($diario->frecuencia == 'NO APLICA') {
                                            $estadoClase = 'badge bg-secondary';
                                        }
                                        if ($diario->frecuencia == 'MES VENCIDO') {
                                            $estadoClase = 'badge bg-danger';
                                        }
                                        if ($diario->frecuencia == 'SEMANAL') {
                                            $estadoClase = 'badge bg-primary';
                                        }
                                        if ($diario->frecuencia == 'MENSUAL') {
                                            $estadoClase = 'badge bg-success';
                                        }
                                    @endphp
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <span class="{{ $estadoClase }}"
                                            style="font-weight: 600">{{ $diario->frecuencia }}</span>
                                    </td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->fecha_cierre }}</td>
                                    @php
                                        $svg = '';
                                        $fechaCierre = (int) $diario->fecha_cierre;
                                        $diaActual = now()->day;
                                        $facturaSiigo = $diario->factura_siigo;
                                        if ($fechaCierre == 0) {
                                            $svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="26" viewBox="0 0 60 26">
                                                      <image id="Fondo" width="60" height="26" xlink:href="data:img/png;base64,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"/>
                                                      <image id="Capa_2" data-name="Capa 2" x="5" y="4" width="17" height="17" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAARCAYAAAA7bUf6AAADB0lEQVQ4jS2TS4skRRSFvxsVWZVdj+yqmmGmq6bHgWmYofGxaJhZiLgQ0X+g4FKX/gMXIogL8Q+MoAsZEV248xdIi4/NIDIIjWDPdPWr7O56dXVlZWZESEQWSeSFzDznnnvuSdnZ2XnfOfeatZaKCEQRz2ZTzk9OYTxGi6JwDtrrJJ02N6MqRZZRGIPzz2FXA28D74gI1VqNfyZjzk9OeHmZ81KjRV0Ul9byJM3YOzvHdTv0qjWMJwFP1PAkCwGqccxvgwPuDY75vNniQdIh0RrBIQijouCX+SWfHQzY63bYandYLhZeyUI752yjXmf32T5vDA75amOTQikOTM5xnqMEfJMK8GaS8FazxXunx/zh4G6SsMwyq+pxzNPRBduDI77ZuM0QODQ5EYqKRwfRYIHnxjAV+PZGj83RmMN0QTWKUHNgPDji40bCTAlXzgb5GTYoiJBgbBgZGPkFaMUnzYTleMJZUaD2J2NeXWbstBL2ixwDLJ0LFF6DX5gWCSRqVffynAdrde4bx+zqCjWbXfKig3pFEXuEn18keGBxoRaBFBbO3yV819UVHmoNaYqy8znXtSZdza5XJvqONYSJdTSVCm89RV5mgxzoaY3y5vtwpcYEsFqBvaE1kQCqigSgCpmASMrjl39lHVYEVW01ee4cVUqQP8Z5X8puHuxjpYJCCTUvU8bfRQZxjNpIEn6tCEfLlKaSoIiVD7GUJFXUythyzE5F8W+25HfrkLUYtVlvcNjt8PXogjs6Yu4c/orEhYh4UIELyjzhzFn6SvPldMplPebWWh2VpSmv3N7kUaT56fyCh7VacKZwkJY8peUhePB6vMbj0QXfYem12yjvp/8bG0pxZ/s+H/z1lP+GQ97tXqMQvxkbclMTR0sqGOv4YjjkU5Nx/VafmrXkxlDp9/sf5kWx1dGaxs0b/DCb8PNkEgLmjfVnYAy7acpH0xE/1iL6/R5Nb7zxLTjzPn4vIoNFnrMeabbvbvHn8JQnx6f0gERVGFnD0I9zrcsLyTpVY1iWBAC7/wMFRGLHoANc1wAAAABJRU5ErkJggg=="/>
                                                      <image id="Capa_1" data-name="Capa 1" x="22" y="4" width="16" height="17" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAARCAYAAADUryzEAAADBUlEQVQ4jT2Uy2tdVRTGf3ud13029xHztDFNJLMOvAURIZ06cFQfszhzUgr2PxAyzR8gxJlgFRzozEmNCGYopQMvNDQxsZo2aW+uedzcc8+55+wl+wS62RvWgr3W962Pb2/T6XTWrbXX1VrCMKSXjNl/fgonF8AlYIAKNMu82a5QxpKkY1QVa+22D3ymqjeiMOAss+wf9JhLUzoLsNSukVulewx/vIz5N814a/YavghplgGUfVUd1UoRT89i+k/+Zv2W4d5qjfZCCBNcrRPYO0jYeHjJ10+HtBdaTPgeyThL/VIQjPcGKRdP/uLRWp2bH1bgbER8mqJ9LerFGpZvGTbfm+SDby74eKuHXJ+kLJJLLB5H3Wf89kmJm3dChvsj4nNADVx6MBJUlOErSF7EfHSvwlfvR7z6p0/uecjjvWPur4x598414v0UjIHcgCimmmMiCx5gDXkmjA9H3F2b4HbTcPhygFT+G/DFagnyFLWCCRQccwtqTRFraorchJZ04EEr5/5qBMMRshINWVqqkx0aGAuaCOpr0cPkVxoao5hKBr5iMgOHyupyhZZkyNuTAm3IAosJbEGdVIrYnobFUU/R2EdjKVjYIOeNtrBc9fDjNC9oOhQVgymgtZgZT8E1dhq4Jk4btx2IhSRTZKfvwXFG4CzlOvl6ddkaTDXDVHIoMLRAdw40kWH3KGUnVmRXa/zevUBmvNcIOpLCwK74taipFKhF0vD5+c+YBB8pzzdY/2UMPR8/BDsUiK60KARNDKoCbvYMKk0DXWVjOyVqVZHOXJOtyzobmyeEcyWimkWdzR2qU9wxEfdwDFVXLGU+3exz6IfMNsp401NTd1vzjenvHg0o755z+5064bQQOL6BJQiVsCqE7QCOPD7f6PHgRcDCYoM8SR97M7OzX0aq9cZ8g++7I37dPqc6yGmMfRoaIQOP3YOMH7Zi1r4d8HAUsrjYhHSMVT1w/8GPeZ6vOAcHYchO74Lz56c084z5Sk5m4dmlMPSF+lSVmXJAkiTuL0BVf/ofQ3F20ihkQ7sAAAAASUVORK5CYII="/>
                                                    </svg>';
                                        } elseif ($diaActual < $fechaCierre - 2) {
                                            $svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="26" viewBox="0 0 60 26">
                                                      <image id="Fondo" width="60" height="26" xlink:href="data:img/png;base64,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"/>
                                                    </svg>';
                                        } elseif (
                                            ($diaActual == $fechaCierre - 1 || $diaActual == $fechaCierre - 2) &&
                                            is_null($facturaSiigo)
                                        ) {
                                            $svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="26" viewBox="0 0 60 26">
                                                      <image id="Fondo" width="60" height="26" xlink:href="data:img/png;base64,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"/>
                                                    </svg>';
                                        } elseif ($diaActual >= $fechaCierre && is_null($facturaSiigo)) {
                                            $svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="26" viewBox="0 0 60 26">
                                                      <image id="Fondo" width="60" height="26" xlink:href="data:img/png;base64,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"/>
                                                    </svg>';
                                        }
                                    @endphp
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC; padding-top: 10px; padding-bottom: 10px;">
                                        {!! $svg !!}
                                    </td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editablex" data-type="text"
                                            data-name="factura_siigo" data-pk="{{ $diario->ide }}">
                                            {{ $diario->factura_siigo }}
                                        </a>
                                    </td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editablex" data-type="text" data-name="fecha_siigo"
                                            data-pk="{{ $diario->ide }}">
                                            {{ $diario->fecha_siigo }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- <div class="py-2 px-2">
                        {{ $diarias->links('vendor.pagination.custom') }}
                    </div> --}}

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#exampleb').DataTable({
            responsive: true,
            autoWidth: false,
            paging: true,
            pageLength: 10,
            lengthMenu: [[10, 100, 200], [10, 100, 200]],
            "order": [[0, "desc"]],
            dom: '<"d-flex justify-content-between"<"d-flex"lB><"d-flex"f>>rtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: 'Copiar',
                    className: 'btn btn-outline-primary'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Filtro a Excel',
                    className: 'btn btn-outline-primary',
                    title: 'Datos Filtrados',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron registros",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "buttons": {
                    "copyTitle": 'Copiado al portapapeles',
                    "copySuccess": {
                        _: '%d líneas copiadas',
                        1: '1 línea copiada'
                    }
                }
            }
        });

        // Función para aplicar filtros
        $('#apply-filters').on('click', function(e) {
            e.preventDefault();

            // Obtener los valores de los filtros
            var cliente = $('#cliente-filter').val().toLowerCase();
            var fechaInicial = $('#fecha-inicial').val();
            var fechaFinal = $('#fecha-final').val();
            var fechaSiigo = $('#fecha-siigo-filter').val();

            // Filtros personalizados
            table.column(8).search(cliente); // Columna de cliente
            table.columns(18).search(''); // Limpiar búsqueda en fecha cargue

            // Filtro de rango de fechas
            if (fechaInicial || fechaFinal) {
                $.fn.dataTable.ext.search.push(function(settings, data) {
                    var fechaCargue = data[18]; // Índice de la columna de fecha cargue
                    if (!fechaCargue) return false;

                    var fechaCargueDate = new Date(fechaCargue);
                    var inicio = fechaInicial ? new Date(fechaInicial) : null;
                    var fin = fechaFinal ? new Date(fechaFinal) : null;

                    if (
                        (!inicio || fechaCargueDate >= inicio) &&
                        (!fin || fechaCargueDate <= fin)
                    ) {
                        return true;
                    }
                    return false;
                });
            }

            // Filtro de Fecha SIIGO
            table.column(28).search(fechaSiigo === 'no' ? '.+' : fechaSiigo === 'si' ? '^$' : '', true,
                false);

            table.draw();
        });

        // Resetear filtros al cambiar algún filtro individual
        $('#cliente-filter, #fecha-inicial, #fecha-final, #fecha-siigo-filter').on('change', function() {
            $('#apply-filters').click();
        });
    });
</script>

<script>
    document.getElementById('select-all').addEventListener('change', function(e) {
        let checkboxes = document.querySelectorAll('.mms-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = e.target.checked;
        });
    });

    // Script para manejar el formulario de impresión
    document.getElementById('print-form').addEventListener('submit', function(e) {
        let selectedMms = [];
        let checkboxes = document.querySelectorAll('.mms-checkbox:checked');
        let selectedOption = document.getElementById('tipo-prefactura')
            .value; // Obtiene la URL seleccionada en el select

        checkboxes.forEach(checkbox => {
            selectedMms.push(checkbox.value);
        });

        if (selectedMms.length === 0) {
            e.preventDefault();
            alert('Por favor selecciona al menos una guía para generar una prefactura.');
        } else {
            // Configura la URL basada en la opción seleccionada
            this.action = selectedOption;
            document.getElementById('selected-mms-ids').value = selectedMms.join(',');
        }
    });
</script>

<script>
    $.fn.editable.defaults.mode = "inline";
    var ide = $(this).data('ide');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editablex').editable({
        url: '/solicitud/' + ide + '/update11',
        type: 'text',
        emptytext: 'Sin datos',
        method: 'PUT',
        //inputclass: 'form-control',
        success: function(response, newValue) {
            if (response.success) {
                // Actualizar solo el valor del enlace editable
                $(this).text(newValue);
            }
        },
        params: function(params) {
            params._method = 'PUT';
            return params;
        }
    });
</script>

<script>
    $.fn.editable.defaults.mode = "inline";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editable').editable({
        url: "/solicitud/update",
        type: 'text',
        emptytext: 'Sin asignar',
        //inputclass: 'form-control',
        success: function(response, newValue) {
            if (response.success) {
                // Actualizar solo el valor del enlace editable
                $(this).text(newValue);
                //location.reload();
            }
        },
    });
</script>

@if (session('success'))
    <script>
        Swal.fire("Actualización correcta!").then((result) => {
            if (result.isConfirmed) {
                window.location = "/prefactura";
            }
        });
    </script>
@endif

<footer class="footer text-center text-sm-start">
    &copy;
    <script>
        document.write(new Date().getFullYear())
    </script> Prefactura
    <span class="text-muted d-none d-sm-inline-block float-end"><span class="text-danger">GLE </span> Grupo Logístico
        Especializado </span>
    {{-- <i
            class="mdi mdi-heart text-danger"></i> --}}
</footer><!--end footer-->

<!-- jQuery  -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/apex-charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.analytics_dashboard.init.js') }}"></script>
<script src="{{ asset('plugins/jquery-steps/jquery.steps.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-wizard.init.js') }}"></script>
<script src="{{ asset('plugins/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-repeater.js') }}"></script>
<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<!-- Flatpickr JS -->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>