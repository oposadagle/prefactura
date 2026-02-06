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
                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#fe252d"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><g><path fill="none" d="M0 0h24v24H0z" /><path d="M19.938 8H21a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-1.062A8.001 8.001 0 0 1 12 23v-2a6 6 0 0 0 6-6V9A6 6 0 1 0 6 9v7H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1.062a8.001 8.001 0 0 1 15.876 0zM3 10v4h1v-4H3zm17 0v4h1v-4h-1zM7.76 15.785l1.06-1.696A5.972 5.972 0 0 0 12 15a5.972 5.972 0 0 0 3.18-.911l1.06 1.696A7.963 7.963 0 0 1 12 17a7.963 7.963 0 0 1-4.24-1.215z" /></g></g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">REPORTE SERVICIO AL CLIENTE</h4>
                </div> 
                
                <form method="GET" action="{{ route('solicitud.sac') }}" class="d-flex">
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
                    $monthsNames = [
                        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                    ];
                @endphp

            <form action="{{ route('solicitud.servicio') }}" method="GET" class="d-flex align-items-center ms-3">
                <div class="me-2">
                    <select class="form-select text-white" name="year" id="year_select_download" style="min-width: 100px; font-size: 14px; background-color: #3f4764; border:none;">
                        <!-- Options populated by JS -->
                    </select>
                </div>
                <div class="me-2">
                    <select class="form-select text-white" name="month" id="month_select_download" style="min-width: 130px; font-size: 14px; background-color: #3f4764; border:none;">
                        <!-- Options populated by JS -->
                    </select>
                </div>
                
                <button type="submit" class="btn btn-outline-primary d-flex align-items-center" style="margin-left:5px;font-size: 12px;font-family: Titillium Web;font-weight: 700;">
                    <svg style="margin-right: 6px;" width="16" height="16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832" y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse"> <stop offset="0" stop-color="#18884f" /> <stop offset="0.5" stop-color="#117e43" /> <stop offset="1" stop-color="#0b6631" /> </linearGradient> </defs> <title>file_type_excel</title> <path d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z" style="fill:#185c37" /> <path d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z" style="fill:#21a366" /> <path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41" /> <path d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z" style="opacity:0.10000000149011612;isolation:isolate" /> <path d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z" style="fill:url(#a)" /> <path d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z" style="fill:#fff" /> <path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481" /> <path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41" /> </svg>
                    DESCARGAR
                </button>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const availableDates = @json($availableDates);
                    const monthsNames = @json($monthsNames);
                    const yearSelect = document.getElementById('year_select_download');
                    const monthSelect = document.getElementById('month_select_download');

                    if (!availableDates || !yearSelect || !monthSelect) return;

                    // Ordenar años descendente
                    const years = Object.keys(availableDates).sort((a, b) => b - a);

                    // Poblar selector de años
                    years.forEach(year => {
                        const option = document.createElement('option');
                        option.value = year;
                        option.textContent = year;
                        yearSelect.appendChild(option);
                    });

                    function updateMonths() {
                        const selectedYear = yearSelect.value;
                        const months = availableDates[selectedYear] || [];
                        
                        // Limpiar selector de meses
                        monthSelect.innerHTML = '';
                        
                        // Opción por defecto "Todos"
                        const allOption = document.createElement('option');
                        allOption.value = 'todos';
                        allOption.textContent = 'Todo el año';
                        monthSelect.appendChild(allOption);

                        // Ordenar meses numéricamente
                        months.sort((a, b) => a - b);

                        // Poblar meses
                        months.forEach(month => {
                            const option = document.createElement('option');
                            option.value = month;
                            option.textContent = monthsNames[month] || month; 
                            monthSelect.appendChild(option);
                        });
                        
                        // Seleccionar el último mes si hay meses disponibles
                        if (months.length > 0) {
                             monthSelect.value = months[months.length - 1]; 
                        }
                    }

                    // Evento cambio de año
                    yearSelect.addEventListener('change', updateMonths);

                    // Inicializar
                    if (years.length > 0) {
                        yearSelect.value = years[0]; 
                        updateMonths();
                    }
                });
            </script>
            </div>                    

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;">ID</th>                                
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> SOLICITUD</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;">MES</th>                                                                                                
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> CARGUE</th>                                
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> DESCARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M12 7V12L9.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> CARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M12 7V12L9.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> DESCARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> LLEGADA</th>                                
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M12 7V12L9.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> LLEGADA</th>                                
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">ESTADO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">NOTAS</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">NIT</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CLIENTE</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">TIPO TRAYECTO</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">EJECUTIVO</th>                                
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TIPO VEHICULO</th>                                
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">MANIFIESTO</th>                                                                
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->id }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ \Carbon\Carbon::parse($diario->fecha_solicitud)->format('Y-m-d') }}</td>                                                                                                                                                
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ \Carbon\Carbon::parse($diario->fecha_solicitud)->format('m') }}</td>                                                                                                                                                
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_cargue }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_descargue }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ \Carbon\Carbon::parse($diario->hora_cargue)->format('h:i:s A') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ \Carbon\Carbon::parse($diario->hora_descargue)->format('h:i:s A') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ \Carbon\Carbon::parse($diario->desdate)->format('Y-m-d') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ \Carbon\Carbon::parse($diario->desdate)->format('h:i:s A') }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <span class="badge bg-{{$diario->color}}" style="color:{{$diario->font}};font-weight:600;">{{strToUpper($diario->states)}}</span></td>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="{{ url('/solicitud/'.$diario->id) }}"><svg height="16" width="16" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 385 385" xml:space="preserve"><g id="XMLID_1027_">	<polygon id="XMLID_1029_" style="fill:#FF9811;" points="77.326,355 83.327,385 233.318,355 157.5,355  " />	<polygon id="XMLID_1030_" style="fill:#FF9811;" points="307.5,340.163 377.5,326.162 318.663,31.988 203.612,55 307.5,55  " />	<path id="XMLID_1031_" style="fill:#FFE98F;" d="M157.5,150c-24.813,0-45-20.186-45-45V85h30v20c0,8.271,6.729,15,15,15V55h-15h-30   H7.5v300h69.826H157.5V150z" />	<path id="XMLID_1032_" style="fill:#FFDA44;" d="M307.5,340.163V55H203.612H202.5v50c0,24.814-20.187,45-45,45v205h75.818H307.5   V340.163z" />	<path id="XMLID_1033_" style="fill:#FFDA44;" d="M172.5,105V55h-15v65C165.771,120,172.5,113.271,172.5,105z" />	<path id="XMLID_1034_" style="fill:#565659;" d="M142.5,45c0-8.271,6.729-15,15-15s15,6.729,15,15v10v50c0,8.271-6.729,15-15,15   s-15-6.729-15-15V85h-30v20c0,24.814,20.187,45,45,45s45-20.186,45-45V55V45c0-24.813-20.187-45-45-45s-45,20.187-45,45v10h30V45z" /></g></svg></a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->nit }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->origen) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->destino) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_trayecto }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->ejecutivo) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $claseBoton = $diario->placa ? 'btn btn-warning py-0 px-2' : '';
                                        @endphp
                                        <a href="#" class="{{ $claseBoton }}">{{ $diario->placa }}</a>  
                                    </td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_vehiculo }}</td>                                                                        
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->razon }}</td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table><!--end /table-->
                </div><!--end /tableresponsive-->
           
            </div>
        </div>
    </div>
</div>

<x-footer />
