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
    <div class="">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 4H6C4.89543 4 4 4.89543 4 6V14C4 15.1046 4.89543 16 6 16H18C19.1046 16 20 15.1046 20 14V12" stroke="#FE252D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.5 9V3M17.5 3L15 5.5M17.5 3L20 5.5" stroke="#FE252D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16V20" stroke="#FE252D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8 20H16" stroke="#FE252D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">CARGUE DE FACTURAS</h4>
                </div>
                <form action="{{ route('cuenta.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="file" name="archivo" class="form-control" accept=".xlsx, .xls">
                        <button type="submit" class="btn btn-primary">Cargar Archivo</button>
                    </div>
                    @error('archivo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </form>
                <form method="GET" action="{{ route('cuenta.index') }}" class="d-flex">
                    <!-- Select de Año -->
                    <select name="year" class="form-select me-2" onchange="this.form.submit()"  style="width: 80px;">
                        @foreach ($years as $availableYear)
                            <option value="{{ $availableYear }}" {{ $year == $availableYear ? 'selected' : '' }}>
                                {{ $availableYear }}
                            </option>
                        @endforeach
                    </select>            
                    <!-- Select de Mes -->
                    <select name="month" class="form-select border-danger text-white me-2" onchange="this.form.submit()" style="width: 120px;background-color:#fe252d;">
                        @foreach ($months as $availableMonth)
                            <option value="{{ $availableMonth }}" {{ $month == $availableMonth ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($availableMonth)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>                    
                </form>                
                    
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

                <form action="{{ route('cuenta.facturar') }}" method="GET" class="d-flex">
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

            
            @if (session('message'))
                <div class="alert alert-info">{{ session('message') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table id="exampled" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">GUIA</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">VALOR</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">FACTURA</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">USUARIO</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">FECHA</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($cuentas as $cuenta)
                                <tr style="text-align: center;">
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $cuenta->guia }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $cuenta->valor }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $cuenta->factura }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $cuenta->usuario }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $cuenta->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<x-footer />