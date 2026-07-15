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
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 505 505" xml:space="preserve" width="24px" height="24px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#FE252D;" cx="252.5" cy="252.5" r="252.5"></circle> <path style="fill:#FFD05B;" d="M410.5,114.6h-316c-2.2,0-4,1.8-4,4v74.7c0,2.2,1.8,4,4,4h316c2.2,0,4-1.8,4-4v-74.7 C414.5,116.4,412.7,114.6,410.5,114.6z"></path> <rect x="108.8" y="135" style="fill:#324A5E;" width="287.5" height="42"></rect> <polygon style="fill:#EDF2F2;" points="161.4,389.9 162.5,389.9 174.9,377.5 187.3,389.9 188.4,389.9 200.7,377.5 213.1,389.9 214.2,389.9 226.6,377.5 239,389.9 240.1,389.9 252.5,377.5 264.9,389.9 266,389.9 278.4,377.5 290.8,389.9 291.9,389.9 304.3,377.5 316.6,389.9 317.7,389.9 330.1,377.5 342.5,389.9 343.6,389.9 356,377.5 365.3,386.7 365.3,156 139.7,156 139.7,386.7 149,377.5 "></polygon> <g> <rect x="177.1" y="213.4" style="fill:#4CDBC4;" width="150.9" height="14"></rect> <rect x="177.1" y="257" style="fill:#4CDBC4;" width="150.9" height="14"></rect> <rect x="177.1" y="300.5" style="fill:#4CDBC4;" width="90.6" height="14"></rect> </g> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">LISTA DE COTIZACIONES</h4>
                </div>

                @php
                    use Carbon\Carbon;

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

                    $currentYear = Carbon::now()->year;
                    $years = [$currentYear, $currentYear - 1, $currentYear - 2];
                @endphp

                <form action="{{ route('price.prices') }}" method="GET" class="d-flex" id="downloadForm">
                    <select class="form-select" name="year" id="year_select" style="margin-right: 10px;" required>
                        <option value="" disabled>Año</option>
                        @foreach ($years as $y)
                            <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>
                    <select class="form-select" name="month" id="month_select" required>
                        <option value="" disabled>Mes</option>
                    </select>
                    <button type="submit" class="btn btn-primary d-flex" id="download_btn"
                        style="margin-left:10px;font-size: 12px;font-family: Titillium Web;font-weight: 700;">
                        <svg style="margin-right: 6px;" width="16" height="16" viewBox="0 0 32 32"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832"
                                    y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#18884f" />
                                    <stop offset="0.5" stop-color="#117e43" />
                                    <stop offset="1" stop-color="#0b6631" />
                                </linearGradient>
                            </defs>
                            <title>file_type_excel</title>
                            <path
                                d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z"
                                style="fill:#185c37" />
                            <path
                                d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z"
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
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="exampled" class="table table-striped">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">ID</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">CLIENTE</th>
                                <th class="      " style="color: #EE66A6;border: 1px solid #0C213A;">FECHA SOLICITUD
                                </th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">CANAL</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">TIPO</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">QUIEN SOLICITA</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">TRAYECTO</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">ORIGEN</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0C213A;">DESTINO</th>
                                <th class="      " style="color: #C4F4FF;border: 1px solid #0C213A;">TIPO VEHICULO</th>
                                <th class="      " style="color: #C4F4FF;border: 1px solid #0C213A;">TIPO CARROCERIA
                                </th>
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">CAPACIDAD (KG)</th>
                                @can('edita.cotizacion')
                                    <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">SISETAC</th>
                                @endcan
                                @can('edicion')
                                    <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">BASE COTIZACION
                                    </th>
                                @endcan
                                @can('ver.base')
                                    <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">BASE COTIZACION
                                    </th>
                                @endcan
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">TARIFA CONDUCTOR
                                </th>
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">OTROS COSTOS</th>
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">COSTO NEGOCIO
                                </th>
                                @can('edicion')
                                    <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">DIFERENCIA B-N
                                    </th>
                                @endcan
                                <th class="      " style="color: #00FF9C;border: 1px solid #0C213A;">NUMERO PUNTOS
                                </th>
                                <th class="      " style="color: #C4F4FF;border: 1px solid #0C213A;">OBSERVACIONES
                                </th>
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
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->canal }}
                                    </td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->tipo }}
                                    </td>
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
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->tipo_vehiculo }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->tipo_carroceria }}</td>
                                    <td class="      "
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->capacidad, 0, ',', '.') }}</td>
                                    @can('edita.cotizacion')
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ number_format($diario->sisetac, 0, ',', '.') }}
                                        </td>
                                    @endcan
                                    @can('ver.base')
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ number_format($diario->sisetac, 0, ',', '.') }}
                                        </td>
                                    @endcan
                                    @can('edicion')
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ number_format($diario->costo, 0, ',', '.') }}
                                        </td>
                                    @endcan
                                    @can('edicion')
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ number_format($diario->costo_negocio, 0, ',', '.') }}
                                        </td>
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ number_format($diario->costo_adicional, 0, ',', '.') }}
                                        </td>
                                    @else
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ number_format($diario->costo_negocio, 0, ',', '.') }}
                                        </td>
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ number_format($diario->costo_adicional, 0, ',', '.') }}
                                        </td>
                                    @endcan
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ number_format($diario->totals, 0, ',', '.') }}</td>
                                    @can('edicion')
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ number_format($diario->difbn, 0, ',', '.') }}</td>
                                    @endcan
                                    @can('edita.cotizacion')
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ $diario->puntos }}
                                        </td>
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ $diario->observaciones }}
                                        </td>
                                    @else
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ number_format($diario->puntos, 0, ',', '.') }}</td>
                                        <td class="celdas"
                                            style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            {{ $diario->observaciones }}
                                        </td>
                                    @endcan
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->responsable }}</td>
                                    @can('edita.cotizacion')
                                        <td class="celdas" style="border: 1px solid #9FAACC">
                                            <form action="{{ route('price.destroy', $diario->id) }}" method="POST"
                                                onsubmit="return confirmDelete();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link"><svg width="16"
                                                        height="16" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M10 12V17" stroke="#FF3C00" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14 12V17" stroke="#FF3C00" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4 7H20" stroke="#FF3C00" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                                stroke="#FF3C00" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                                stroke="#FF3C00" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </svg></button>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
</script>

<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar este registro?');
    }
</script>

<script>
    const months = {
        1: 'Enero',
        2: 'Febrero',
        3: 'Marzo',
        4: 'Abril',
        5: 'Mayo',
        6: 'Junio',
        7: 'Julio',
        8: 'Agosto',
        9: 'Septiembre',
        10: 'Octubre',
        11: 'Noviembre',
        12: 'Diciembre'
    };

    const yearSelect = document.getElementById('year_select');
    const monthSelect = document.getElementById('month_select');
    const selectedYear = {{ $year }};
    const selectedMonth = {{ $month }};

    function populateMonths(year, preselectMonth) {
        monthSelect.innerHTML = '<option value="" disabled>Mes</option>';
        
        const currentYear = new Date().getFullYear();
        const currentMonth = new Date().getMonth() + 1;
        const maxMonth = (parseInt(year) === currentYear) ? currentMonth : 12;
        
        for (let i = 1; i <= maxMonth; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = months[i];
            if (i === preselectMonth) {
                option.selected = true;
            }
            monthSelect.appendChild(option);
        }
    }

    populateMonths(selectedYear, selectedMonth);

    yearSelect.addEventListener('change', function() {
        const currentMonth = new Date().getMonth() + 1;
        const currentYear = new Date().getFullYear();
        const newYear = parseInt(this.value);
        let newMonth = selectedMonth;
        
        if (newYear === currentYear && newMonth > currentMonth) {
            newMonth = currentMonth;
        }
        
        window.location.href = '{{ url("price") }}?year=' + newYear + '&month=' + newMonth;
    });

    monthSelect.addEventListener('change', function() {
        window.location.href = '{{ url("price") }}?year=' + yearSelect.value + '&month=' + this.value;
    });
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
