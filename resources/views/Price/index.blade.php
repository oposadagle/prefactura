<x-header />

<style>
    .celdas {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #656C82;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g id="surface1"> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,75.686275%,5.098039%);fill-opacity:1;" d="M 22.667969 2 C 22.667969 1.632812 22.371094 1.332031 22 1.332031 L 2 1.332031 C 1.632812 1.332031 1.332031 1.628906 1.332031 2 L 1.332031 4.851562 L 22.667969 4.851562 Z M 22.667969 2 " /> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 9.566406 22.664062 L 22 22.664062 C 22.367188 22.664062 22.667969 22.367188 22.667969 21.996094 L 22.667969 6.1875 L 9.566406 6.1875 Z M 9.566406 22.664062 " /> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(33.72549%,67.45098%,87.843137%);fill-opacity:1;" d="M 1.332031 6.1875 L 1.332031 21.996094 C 1.332031 22.363281 1.628906 22.664062 2 22.664062 L 9.566406 22.664062 L 9.566406 6.1875 Z M 1.332031 6.1875 " /> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 22 0 L 2 0 C 0.898438 0 0.00390625 0.898438 0.00390625 2 L 0.00390625 21.996094 C 0.00390625 23.101562 0.898438 24 2 24 L 22 24 C 23.101562 24 23.996094 23.101562 23.996094 22 L 23.996094 2 C 23.996094 0.898438 23.101562 0 22 0 Z M 22.667969 21.996094 C 22.667969 22.363281 22.371094 22.664062 22 22.664062 L 2 22.664062 C 1.632812 22.664062 1.332031 22.367188 1.332031 21.996094 L 1.332031 6.1875 L 22.667969 6.1875 Z M 1.332031 2 C 1.332031 1.632812 1.628906 1.332031 2 1.332031 L 22 1.332031 C 22.367188 1.332031 22.667969 1.628906 22.667969 2 L 22.667969 4.851562 L 1.332031 4.851562 Z M 1.332031 2 " /> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 5.738281 16.425781 L 3.976562 16.425781 C 3.609375 16.425781 3.308594 16.71875 3.308594 17.09375 C 3.308594 17.460938 3.605469 17.761719 3.976562 17.761719 L 4.894531 17.761719 L 4.894531 18.195312 C 4.894531 18.5625 5.191406 18.863281 5.5625 18.863281 C 5.933594 18.863281 6.230469 18.566406 6.230469 18.195312 L 6.230469 17.695312 C 7.136719 17.476562 7.820312 16.65625 7.820312 15.683594 C 7.820312 14.542969 6.890625 13.609375 5.738281 13.609375 L 5.390625 13.613281 C 4.980469 13.613281 4.648438 13.28125 4.648438 12.871094 C 4.648438 12.460938 4.980469 12.128906 5.390625 12.128906 L 7.15625 12.128906 C 7.523438 12.128906 7.824219 11.832031 7.824219 11.460938 C 7.824219 11.09375 7.527344 10.792969 7.15625 10.792969 L 6.238281 10.792969 L 6.238281 10.359375 C 6.238281 9.992188 5.941406 9.691406 5.570312 9.691406 C 5.203125 9.691406 4.902344 9.988281 4.902344 10.359375 L 4.902344 10.855469 C 3.996094 11.078125 3.3125 11.894531 3.3125 12.867188 C 3.3125 14.007812 4.242188 14.941406 5.390625 14.941406 L 5.738281 14.9375 C 6.152344 14.9375 6.484375 15.269531 6.484375 15.679688 C 6.484375 16.09375 6.148438 16.425781 5.738281 16.425781 Z M 5.738281 16.425781 " /> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 15.578125 2.550781 L 14.328125 2.550781 C 13.960938 2.550781 13.660156 2.84375 13.660156 3.21875 C 13.660156 3.585938 13.957031 3.882812 14.328125 3.882812 L 15.578125 3.882812 C 15.945312 3.882812 16.246094 3.589844 16.246094 3.21875 C 16.242188 2.847656 15.945312 2.550781 15.578125 2.550781 Z M 15.578125 2.550781 " /> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 20.433594 2.550781 L 19.183594 2.550781 C 18.816406 2.550781 18.515625 2.84375 18.515625 3.21875 C 18.515625 3.585938 18.8125 3.882812 19.183594 3.882812 L 20.433594 3.882812 C 20.800781 3.882812 21.101562 3.589844 21.101562 3.21875 C 21.097656 2.847656 20.800781 2.550781 20.433594 2.550781 Z M 20.433594 2.550781 " /> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 11.734375 9.71875 L 20.492188 9.71875 C 20.859375 9.71875 21.160156 9.421875 21.160156 9.050781 C 21.160156 8.683594 20.863281 8.382812 20.492188 8.382812 L 11.734375 8.382812 C 11.367188 8.382812 11.066406 8.679688 11.066406 9.050781 C 11.0625 9.417969 11.367188 9.71875 11.734375 9.71875 Z M 11.734375 9.71875 " /> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 11.734375 13.257812 L 20.492188 13.257812 C 20.859375 13.257812 21.160156 12.960938 21.160156 12.589844 C 21.160156 12.21875 20.863281 11.921875 20.492188 11.921875 L 11.734375 11.921875 C 11.367188 11.921875 11.066406 12.21875 11.066406 12.589844 C 11.066406 12.960938 11.367188 13.257812 11.734375 13.257812 Z M 11.734375 13.257812 " /> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 11.734375 16.804688 L 20.492188 16.804688 C 20.859375 16.804688 21.160156 16.507812 21.160156 16.136719 C 21.160156 15.765625 20.863281 15.46875 20.492188 15.46875 L 11.734375 15.46875 C 11.367188 15.46875 11.066406 15.765625 11.066406 16.136719 C 11.066406 16.507812 11.367188 16.804688 11.734375 16.804688 Z M 11.734375 16.804688 " /> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 11.734375 20.347656 L 16.953125 20.347656 C 17.320312 20.347656 17.621094 20.050781 17.621094 19.679688 C 17.621094 19.3125 17.324219 19.011719 16.953125 19.011719 L 11.734375 19.011719 C 11.367188 19.011719 11.066406 19.308594 11.066406 19.679688 C 11.0625 20.046875 11.367188 20.347656 11.734375 20.347656 Z M 11.734375 20.347656 " /> </g> </svg>
                    <h4 class="card-title" style="margin-left: 10px;">LISTA DE COTIZACIONES</h4>
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
                            'month' => $currentDate->month,
                            'year' => $currentDate->year,
                            'label' => $months[$currentDate->month] . ' ' . $currentDate->year
                        ]);
                        $currentDate->subMonth();
                    }
                @endphp

            <form action="{{ route('price.prices') }}" method="GET" class="d-flex">
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
            <div class="card-body">
                <div class="table-responsive">
                    <table id="exampled" class="table table-striped">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">ID</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">CLIENTE</th>
                                <th class="      " style="color: #EE66A6;border: 1px solid #0C213A;">FECHA SOLICITUD</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">CODIGO SEGUIMIENTO</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">ESTADO COTIZACION</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">QUIEN SOLICITA</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">TRAYECTO</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">ORIGEN</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">DESTINO</th>
                                <th class="      " style="color: #C4F4FF;border: 1px solid #0C213A;">TIPO VEHICULO</th>
                                <th class="      " style="color: #C4F4FF;border: 1px solid #0C213A;">TIPO CARROCERIA</th>
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">CAPACIDAD (KG)</th>
                                @can('edita.cotizacion')
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">BASE COTIZACION</th>
                                @endcan
                                @can('ver.base')
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">BASE COTIZACION</th>
                                @endcan
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">TARIFA CONDUCTOR</th>
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">OTROS COSTOS</th>
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">COSTO NEGOCIO</th>
                                @can('edita.cotizacion')
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">DIFERENCIA B-N</th>
                                @endcan
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">NUMERO PUNTOS</th>
                                <th class="      " style="color: #C4F4FF;border: 1px solid #0C213A;">OBSERVACIONES</th>
                                <th class="      " style="color: #C4F4FF;border: 1px solid #0C213A;">RESPONSABLE</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;"></th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->id }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->cliente }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->fecha_solicitud }}</td>
                                        
                                        @can('edita.cotizacion')
                                            <td class="celdas"
                                                style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                                <a href="#" class="editable" data-type="text"
                                                    data-name="codigo_seguimiento" data-pk="{{ $diario->id }}">
                                                    {{ $diario->codigo_seguimiento }}
                                                </a>
                                            </td>
                                            <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                             
                                            @php
                                                $estadoClase = '';
                                                if ($diario->estado_cotizacion == 'COTIZACION') {
                                                    $estadoClase = 'badge bg-info';
                                                } 
                                                if ($diario->estado_cotizacion == 'APROBADO') {
                                                    $estadoClase = 'badge bg-success';
                                                }
                                                if ($diario->estado_cotizacion == 'COMERCIAL') {
                                                    $estadoClase = 'badge bg-secondary';
                                                }
                                                if ($diario->estado_cotizacion == 'NO APROBADO') {
                                                    $estadoClase = 'badge bg-danger';
                                                }
                                            @endphp
                                                <a href="#" class="editable {{ $estadoClase }}" data-type="select" data-name="ESTADO_COTIZACION" data-pk="{{$diario->id}}" data-source='[{"value":"APROBADO","text":"APROBADO"},{"value":"COMERCIAL","text":"COMERCIAL"},{"value":"COTIZACION","text":"COTIZACION"},{"value":"NO APROBADO","text":"NO APROBADO"}]'>
                                                    {{$diario->estado_cotizacion}}
                                                </a>    
                                            </td>
                                        @else
                                            <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ $diario->codigo_seguimiento }}</td>
                                            <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                                {{ $diario->estado_cotizacion }}
                                            </td>
                                        @endcan
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->quien_solicita) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->trayecto }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->origen) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->destino) }}</td>
                                    @can('edita.cotizacion')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                    	<a href="#" class="editable" data-type="select" data-name="tipo_vehiculo" data-pk="{{$diario->id}}" 
                                    	data-source='[
                                    	{"value":"PATINETA 9 A 15_CONTENEDOR","text":"PATINETA 9 A 15_CONTENEDOR"},
                                    	{"value":"PATINETA 9 A 18_FURGONADO","text":"PATINETA 9 A 18_FURGONADO"},
                                    	{"value":"PATINETA PODEROSA_CONTENEDOR","text":"PATINETA PODEROSA_CONTENEDOR"},
                                    	{"value":"PATINETA PODEROSA_FURGON,CARROZADO,PLANCHON","text":"PATINETA PODEROSA_FURGON,CARROZADO,PLANCHON"},
                                    	{"value":"TRACTOMULA_CONTENEDOR_DOS EJES","text":"TRACTOMULA_CONTENEDOR_DOS EJES"},
                                    	{"value":"TRACTOMULA_CARRROZADO,PLANCHON_DOS EJES","text":"TRACTOMULA_CARRROZADO,PLANCHON_DOS EJES"},
                                    	{"value":"TRACTOMULA_CONTENEDOR_TRES EJES","text":"TRACTOMULA_CONTENEDOR_TRES EJES"},
                                    	{"value":"TRACTOMULA_CARROZADO,PLANCHON_TRES EJES","text":"TRACTOMULA_CARROZADO,PLANCHON_TRES EJES"},
                                    	{"value":"CARRY","text":"CARRY"},
                                    	{"value":"NHR","text":"NHR"},
                                    	{"value":"NKR","text":"NKR"},
                                    	{"value":"SENCILLO","text":"SENCILLO"},
                                    	{"value":"TURBO","text":"TURBO"},
                                    	{"value":"TURBO SENCILLO","text":"TURBO SENCILLO"}
                                    	]'>
                                    	{{$diario->tipo_vehiculo}}
                                    	</a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                    	<a href="#" class="editable" data-type="select" data-name="tipo_carroceria" data-pk="{{$diario->id}}" 
                                    	data-source='[
                                    	{"value":"FURGONADO","text":"FURGONADO"},
                                    	{"value":"CARROZADO","text":"CARROZADO"},
                                    	{"value":"PLANCHON","text":"PLANCHON"},
                                    	{"value":"PANEL","text":"PANEL"},
                                    	{"value":"PORTACONTENEDOR - 20","text":"PORTACONTENEDOR - 20"},
                                    	{"value":"PORTACONTENEDOR - 40","text":"PORTACONTENEDOR - 40"}
                                    	]'>
                                    	{{$diario->tipo_carroceria}}
                                    	</a>
                                    </td>
                                    <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editable" data-type="text"
                                                data-name="capacidad" data-pk="{{ $diario->id }}">
                                                {{ number_format($diario->capacidad, 0, ',', '.') }}
                                            </a>
                                        </td>
                                    @else
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->tipo_vehiculo }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->tipo_carroceria }}</td>
                                    <td class="      "
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->capacidad, 0, ',', '.') }}</td>
                                    @endcan
                                    @can('edita.cotizacion')
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editable" data-type="text"
                                                data-name="costo" data-pk="{{ $diario->id }}">
                                                {{ number_format($diario->costo, 0, ',', '.') }}
                                            </a>
                                        </td>
                                    @endcan
                                    @can('ver.base')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->costo, 0, ',', '.') }}
                                    </td>
                                    @endcan
                                    @can('edita.cotizacion')
                                        <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editable" data-type="text"
                                            data-name="costo_negocio" data-pk="{{ $diario->id }}">
                                            {{ number_format($diario->costo_negocio, 0, ',', '.') }}
                                        </a>
                                    </td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editable" data-type="text"
                                            data-name="COSTO_ADICIONAL" data-pk="{{ $diario->id }}">
                                            {{ number_format($diario->costo_adicional, 0, ',', '.') }}
                                        </a>
                                    </td>
                                    @else
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->costo_negocio, 0, ',', '.') }}
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->costo_adicional, 0, ',', '.') }}
                                    </td>
                                    @endcan
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->totals, 0, ',', '.') }}</td>
                                    @can('edita.cotizacion')
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->difbn, 0, ',', '.') }}</td>
                                    @endcan
                                    @can('edita.cotizacion')
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editable" data-type="text"
                                                data-name="puntos" data-pk="{{ $diario->id }}">
                                                {{ $diario->puntos }}
                                            </a>
                                        </td>
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editable" data-type="text"
                                                data-name="observaciones" data-pk="{{ $diario->id }}">
                                                {{ $diario->observaciones }}
                                            </a>
                                        </td>
                                    @else
                                        <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->puntos, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->observaciones }}
                                        </td>
                                    @endcan
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->responsable }}</td>
                                    @can('edita.cotizacion')
                                        <td class="celdas" style="border: 1px solid #9FAACC">
                                        <form action="{{ route('price.destroy', $diario->id) }}" method="POST" onsubmit="return confirmDelete();">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M10 12V17" stroke="#FF3C00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M14 12V17" stroke="#FF3C00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M4 7H20" stroke="#FF3C00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#FF3C00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#FF3C00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg></button>
                                        </form>
                                    </td>
                                    @else
                                        <td></td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $.fn.editable.defaults.mode = "inline";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editable').editable({
        url: "/price/update",
        type: 'text',
        emptytext: 'sin datos',
        method: 'PUT',
        params: function(params) {
            params._method = 'PUT';
            return params;
        },
        success: function(response, newValue) {
            if (response.success) {
                $(this).text(newValue);
                
            } else {
                alert(response.message);
            }
        }
    });
</script>

<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar este registro?');
    }
</script>

@if (session('success'))
    <script>
        Swal.fire("Datos insertados correctamente!").then((result) => {
            if (result.isConfirmed) {
                window.location = "/infoestatus";
            }
        });
    </script>
@endif

<x-footer />