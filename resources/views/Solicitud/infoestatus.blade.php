<x-header />

<style>
.celdas {    
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #656C82;    
    }  
.celdasa {
    cursor: pointer;
    }
.selected-row {
    background-color: #FEEAEE;
  }
</style>

<div class="row">
    <div class="col-sm-12"> 
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">  
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 392.58 392.58" xml:space="preserve" width="24" height="24" fill="#FFF" stroke="#FFF"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"> <path style="fill:#FF2029FFFFF;" d="M337.227,43.304c0-6.012-4.848-10.925-10.925-10.925H66.359c-6.012,0-10.925,4.848-10.925,10.925 v217.341h281.729L337.227,43.304L337.227,43.304z" /> <rect x="88.08" y="65.025" style="fill:#6495BB;" width="216.372" height="162.909" /> <g> <path style="fill:#000;" d="M125.704,203.369c6.012,0,10.925-4.848,10.925-10.925v-60.38c0-6.012-4.848-10.925-10.925-10.925 s-10.925,4.848-10.925,10.925v60.38C114.843,198.391,119.692,203.369,125.704,203.369z" /> <path style="fill:#000;" d="M172.767,203.369c6.012,0,10.925-4.848,10.925-10.925v-39.499c0-6.012-4.848-10.925-10.925-10.925 c-6.077,0-10.925,4.848-10.925,10.925v39.499C161.906,198.391,166.755,203.369,172.767,203.369z" /> <path style="fill:#000;" d="M219.829,203.369c6.012,0,10.925-4.848,10.925-10.925v-70.788c0-6.012-4.848-10.925-10.925-10.925 c-6.012,0-10.925,4.848-10.925,10.925v70.788C208.969,198.391,213.817,203.369,219.829,203.369z" /> <path style="fill:#000;" d="M266.892,203.369c6.012,0,10.925-4.848,10.925-10.925V100.71c0-6.012-4.849-10.925-10.925-10.925 c-6.012,0-10.925,4.848-10.925,10.925v91.669C256.031,198.391,260.88,203.369,266.892,203.369z" /> </g> <path style="fill:#FF2029;" d="M51.619,282.561l-3.556,10.731h33.099c6.012,0,10.925,4.848,10.925,10.925 c0,6.012-4.848,10.925-10.925,10.925h-40.21l-4.073,12.541h16.549c6.012,0,10.925,4.848,10.925,10.925 c0,6.012-4.848,10.925-10.925,10.925H29.704l-3.556,10.731h340.493l-25.471-77.64H51.619V282.561z" /> <g> <path style="fill:#000;" d="M391.918,367.7l-32.711-99.556c-0.065-0.129-0.129-0.323-0.259-0.453V43.304 c0-18.036-14.675-32.711-32.711-32.711H66.359c-18.036,0-32.711,14.675-32.711,32.711v224.323 c-0.065,0.129-0.259,0.323-0.259,0.517L0.613,367.7c-2.392,6.335,2.457,14.287,10.343,14.287h370.618 C388.233,381.987,394.698,375.199,391.918,367.7z M26.148,360.201l3.556-10.731h23.661c6.012,0,10.925-4.848,10.925-10.925 s-4.848-10.925-10.925-10.925H36.815l4.073-12.541h40.21c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925 h-32.97l3.556-10.731h289.358l25.471,77.64H26.148V360.201z M55.433,43.304c0-6.012,4.848-10.925,10.925-10.925h259.943 c6.012,0,10.925,4.848,10.925,10.925v217.341H55.433V43.304z" /> <path style="fill:#000;" d="M220.411,326.068h-48.226c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.848,10.925,10.925,10.925 h48.226c6.012,0,10.925-4.848,10.925-10.925S226.423,326.068,220.411,326.068z" /> </g> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">INFOESTATUS MAESTRO</h4>
                </div>
                @can('solicitud.create')
                    <div class="col-lg-3">
                        <form action="{{ route('procesar.archivos') }}" method="post" enctype="multipart/form-data" id="facturaForm">
                        @csrf
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" name="archivo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-outline-primary" style="font-size: 12px;font-family: Titillium Web;font-weight: 700;" type="submit" id="inputGroupFileAddon04">CARGAR</button>
                            </div>
                        </form>
                    </div>
                @endcan
                @php
                    $monthsNames = [
                        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                    ];
                @endphp

            <form action="{{ route('solicitud.estatus') }}" method="GET" class="d-flex align-items-center">
                <div class="me-2">
                    <select class="form-select" name="year" id="year_select" style="min-width: 100px; font-size: 14px;">
                        <!-- Options populated by JS -->
                    </select>
                </div>
                <div class="me-2">
                    <select class="form-select" name="month" id="month_select" style="min-width: 130px; font-size: 14px;">
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
                    const yearSelect = document.getElementById('year_select');
                    const monthSelect = document.getElementById('month_select');

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
                            option.textContent = monthsNames[month] || month; // Usar nombre o número si no hay nombre
                            monthSelect.appendChild(option);
                        });
                        
                        // Seleccionar el mes más reciente por defecto, o 'todos' si se prefiere
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
                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table id="exampleie" class="table table-striped">
                        <thead class="table-dark" style="font-size: 11px;position: sticky;top: 0;z-index: 1000;">
                            <tr>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">ID</th>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">GUIA</th>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">REMESA</th>
                                <th class="celdas" style="color: #FF7D7D;border: 1px solid #0c213a;">RADICADO</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">NIT</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">CLIENTE</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="      " style="color: #C4F4FF;border: 1px solid #0c213a;">DOCUMENTO CLIENTE</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">DESTINATARIO</th>
                                <th class="celdas" style="color: #50d6f4;border: 1px solid #0c213a;">DIRECCION</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PIEZAS</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PESO</th>
                                <th class="      " style="color: #FFAF61;border: 1px solid #0c213a;">VALOR DECLARADO</th>                                
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">TIPO VEHICULO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">TIPO CARROCERIA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">CONDUCTOR</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">PAGAR A:</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">PROVEEDORES</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;">FECHA CARGUE</th>                           
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;">CAUSAL+</th>
                                <th class="celdas" style="color: #F7E6AD;border: 1px solid #0c213a;">TIPO SERVICIO</th>
                                <th class="celdas" style="color: #F7E6AD;border: 1px solid #0c213a;">NOTA SERVICIO</th>
                                @can('egresos')
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO COSTO FLETE</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO TIPO SERVICIO</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO CYD 1</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO CYD 2</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO STANDBY</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO MONTACARGA</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO ESCOLTA</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO CANDADO SATELITAL</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO MONITOREO</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO ESTUDIO SEGURIDAD</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO SOBRECOSTO TRANSPORTE</th>
                                @endcan
                                @can('egresos.lectura')
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO COSTO FLETE</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO TIPO SERVICIO</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO CYD 1</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO CYD 2</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO STANDBY</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO MONTACARGA</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO ESCOLTA</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO CANDADO SATELITAL</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO MONITOREO</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO ESTUDIO SEGURIDAD</th>
                                    <th class="" style="color: #FFACAC;border: 1px solid #0c213a;">DOCUMENTO SOBRECOSTO TRANSPORTE</th>
                                @endcan
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO DE FLETE</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">DESC COND Y/O PROPIETARIO</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">% COSTO SEGURO</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO SEGURO</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO TIPO SERVICIO</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">PCYD1</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO CARGUE Y DESCARGUE1</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">PCYD2</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO CARGUE Y DESCARGUE2</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">PSBY</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO STAND BY</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">PMTC</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO MONTACARGAS</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">PESC</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO ESCOLTA</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">PCAS</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO CANDADO SATELITAL</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">PMON</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO MONITOREO</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">PESG</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO ESTUDIO SEGURIDAD</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO AMPLIACION POLIZA</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">SOBRECOSTOS TRANSPORTADORA</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">SEGURO VEHICULO</th>
                                <th class="      " style="color: #F7E6AD;border: 1px solid #0c213a;">COSTO TOTAL</th>                                
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">VALOR FACTURAR EN FLETE</th>
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">% FACTURAR SEGURO</th>
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">VALOR COBRAR_EN SEGURO</th>
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">VALOR COBRAR SOBRECOSTOS</th>
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">VALOR SERVICIOS COMP.</th>
                                <th class="      " style="color: #C3FF93;border: 1px solid #0c213a;">VALOR TOTAL_A COBRAR</th>
                                <th class="celdas" style="color: #F0F3FF;border: 1px solid #0c213a;">UTILIDAD</th>
                                <th class="celdas" style="color: #F0F3FF;border: 1px solid #0c213a;">RENTABILIDAD</th>
                                <th class="celdas" style="color: #B6FFFA;border: 1px solid #0c213a;"><i class="ti ti-calendar"></i>CIERRE</th>
                                <th class="celdas" style="color: #B6FFFA;border: 1px solid #0c213a;">CONGELADO</th>
                                <th class="celdas" style="color: #B6FFFA;border: 1px solid #0c213a;"><i class="ti ti-calendar"></i>CONGELADO</th>
                                @can('egresos')
                                    <th class="celdas" style="color: #FFACAC;border: 1px solid #0c213a;">EGRESO ANTICIPO</th>
                                    <th class="celdas" style="color: #FFACAC;border: 1px solid #0c213a;">EGRESO SALDO</th>
                                    <th class="celdas" style="color: #FFACAC;border: 1px solid #0c213a;">FECHA PAGO SALDO</th>                                    
                                @endcan
                                @can('egresos.lectura')
                                    <th class="celdas" style="color: #FFACAC;border: 1px solid #0c213a;">EGRESO ANTICIPO</th>
                                    <th class="celdas" style="color: #FFACAC;border: 1px solid #0c213a;">EGRESO SALDO</th>
                                    <th class="celdas" style="color: #FFACAC;border: 1px solid #0c213a;">FECHA PAGO SALDO</th>                                    
                                @endcan
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr class="celdasa" style="text-align: center">
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->id }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->guia }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->razon) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->remesa) }}</td>                                   
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->radicado) }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->nit) }}</td>  
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->cliente) }}</td>  
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->origen) }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->destino_final) }}</td>
                                @if ($diario->facturar == 'NO')       
                                    @can('nuevos.costos')
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editablex truncated" data-type="text" data-name="documento_cliente" data-pk="{{$diario->ide}}">
                                                {{ strlen(strToUpper($diario->documento_cliente)) > 10 ? substr(strToUpper($diario->documento_cliente), 0, 10) . '...' : strToUpper($diario->documento_cliente) }}
                                            </a>
                                            <span class="full-text" style="display:none;">
                                                {{ strToUpper($diario->documento_cliente) }}
                                            </span>
                                            <a href="#" class="toggle-text">+</a>
                                        </td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editablex truncated" data-type="text" data-name="destinatario" data-pk="{{$diario->ide}}">
                                                {{ strlen(strToUpper($diario->destinatario)) > 10 ? substr(strToUpper($diario->destinatario), 0, 10) . '...' : strToUpper($diario->destinatario) }}
                                            </a>
                                            <span class="full-text" style="display:none;">
                                                {{ strToUpper($diario->destinatario) }}
                                            </span>
                                            <a href="#" class="toggle-text">+</a>
                                        </td> 
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editablex truncated" data-type="text" data-name="documento_cliente" data-pk="{{$diario->ide}}">
                                                {{ strlen(strToUpper($diario->direccion)) > 10 ? substr(strToUpper($diario->direccion), 0, 10) . '...' : strToUpper($diario->direccion) }}
                                            </a>
                                            <span class="full-text" style="display:none;">
                                                {{ strToUpper($diario->direccion) }}
                                            </span>
                                            <a href="#" class="toggle-text">+</a>
                                        </td> 
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editablex" data-type="text" data-name="piezas" data-pk="{{$diario->ide}}">
                                                {{ $diario->piezas }}
                                            </a>
                                        </td> 
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editablex" data-type="text" data-name="peso" data-pk="{{$diario->ide}}">
                                                {{ $diario->peso }}
                                            </a>
                                        </td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editablex" data-type="text" data-name="valor_declarado" data-pk="{{$diario->ide}}">
                                                {{ number_format($diario->valor_declarado, 0, ',', '.') }}
                                            </a>                                        
                                        </td>                                         
                                    @else
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->documento_cliente) }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->destinatario) }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->direccion) }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->piezas }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->peso }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_declarado, 0, ',', '.') }}</td>                                        
                                    @endcan 
                                @else
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->documento_cliente) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->destinatario) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->direccion) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->piezas }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->peso }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_declarado, 0, ',', '.') }}</td>                                        
                                @endif                                   
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_vehiculo }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->carroceria }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                        $claseBoton = $diario->placa ? 'btn btn-warning py-0 px-2' : '';
                                        @endphp
                                            <a href="#" class="{{ $claseBoton }}">{{ $diario->placa }}</a>    
                                    </td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->conductor }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->asociado }}</td> 
                                @if ($diario->facturar == 'NO')    
                                    @can('nuevos.costos')
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editablex" data-type="select" data-name="proveedores" data-pk="{{$diario->ide}}" data-source='@json($autos)'>
                                                {{$diario->proveedores}}
                                            </a>
                                        </td>
                                    @else
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->proveedores }}</td>
                                    @endcan
                                @else
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->proveedores }}</td>
                                @endif
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_cargue }}</td>
                                @if ($diario->facturar == 'NO')
                                    @can('nuevos.costos')
                                        
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editablex" data-type="text" data-name="causal_mas" data-pk="{{$diario->ide}}">
                                                {{ $diario->causal_mas }}
                                            </a>
                                        </td>                                        
                                    @else
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->causal_mas }}</td>                                                                             
                                    @endcan
                                @else
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->causal_mas }}</td>                                                                       
                                @endif
                                @if ($diario->facturar == 'NO')
                                @can('nuevos.costos')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                        <a href="#" class="editablex" data-type="select" data-name="tipo_servicio" data-pk="{{$diario->ide}}" data-source='@json($servicios)'>
                                            {{$diario->tipo_servicio}}
                                        </a>
                                    </td>
                                @else
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{$diario->tipo_servicio}}</td>
                                @endcan
                                @else
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{$diario->tipo_servicio}}</td>
                                @endif
                                <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                    @if ($diario->facturar == 'NO')
                                        @can('nuevos.costos')
                                            <a href="#" class="editablex truncated" data-type="text" data-name="nota_servicio" data-pk="{{$diario->ide}}">
                                                {{ strlen($diario->nota_servicio) > 10 ? substr($diario->nota_servicio, 0, 10) . '...' : $diario->nota_servicio }}
                                            </a>
                                            <span class="full-text" style="display:none;">
                                                {{ strToUpper($diario->nota_servicio) }}
                                            </span>
                                            <a href="#" class="toggle-text">+</a>
                                        @else
                                            {{$diario->nota_servicio}}
                                        @endcan
                                    @else
                                        {{$diario->nota_servicio}}
                                    @endif
                                </td>   
                                @can('egresos')
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dcf" data-pk="{{$diario->ide}}">{{ $diario->dcf }}</a></td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dts" data-pk="{{$diario->ide}}">{{ $diario->dts }}</a></td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dcyd" data-pk="{{$diario->ide}}">{{ $diario->dcyd }}</a></td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dpaux" data-pk="{{$diario->ide}}">{{ $diario->dpaux }}</a></td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dpsby" data-pk="{{$diario->ide}}">{{ $diario->dpsby }}</a></td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dpmtc" data-pk="{{$diario->ide}}">{{ $diario->dpmtc }}</a></td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dpesc" data-pk="{{$diario->ide}}">{{ $diario->dpesc }}</a></td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dpcas" data-pk="{{$diario->ide}}">{{ $diario->dpcas }}</a></td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dpmon" data-pk="{{$diario->ide}}">{{ $diario->dpmon }}</a></td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dpesg" data-pk="{{$diario->ide}}">{{ $diario->dpesg }}</a></td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="dst" data-pk="{{$diario->ide}}">{{ $diario->dst }}</a></td>
                                @endcan
                                @can('egresos.lectura')
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dcf }}</td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dts }}</td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dcyd }}</td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dpaux }}</td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dpsby }}</td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dpmtc }}</td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dpesc }}</td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dpcas }}</td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dpmon }}</td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dpesg }}</td>
                                    <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->dst }}</td>
                                @endcan       
                                @if ($diario->facturar == 'NO')
                                    @can('nuevos.costos')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editabler" data-type="text" data-name="costo_flete" data-pk="{{$diario->ide}}">
                                            {{ number_format($diario->costo_flete, 0, ',', '.') }}
                                        </a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editabler" data-type="text" data-name="desconductor" data-pk="{{$diario->ide}}">
                                            {{ number_format($diario->desconductor, 0, ',', '.') }}
                                        </a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editablex" data-type="text" data-name="monto_costo" data-pk="{{$diario->ide}}">
                                            {{ $diario->monto_costo }}
                                        </a>                                         
                                    </td>  
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editablex" data-type="text" data-name="costo_seguro" data-pk="{{$diario->ide}}">
                                            {{ number_format($diario->costo_seguro, 0, ',', '.') }}
                                        </a>                                         
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="costo_tiposerv" data-pk="{{$diario->ide}}">{{ number_format($diario->costo_tiposerv, 0, ',', '.') }}
									</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                        <a href="#" class="editablex" data-type="select" data-name="pcyd" data-pk="{{$diario->ide}}" data-source='@json($autos)'>
                                            {{$diario->pcyd}}
                                        </a>
                                    </td>                                  
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="costo_cardes" data-pk="{{$diario->ide}}">{{ number_format($diario->costo_cardes, 0, ',', '.') }}
									</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                        <a href="#" class="editablex" data-type="select" data-name="paux" data-pk="{{$diario->ide}}" data-source='@json($autos)'>
                                            {{$diario->paux}}
                                        </a>
                                    </td>                                  
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="costo_auxiliar " data-pk="{{$diario->ide}}">{{ number_format($diario->costo_auxiliar, 0, ',', '.') }}
									</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                        <a href="#" class="editablex" data-type="select" data-name="psby" data-pk="{{$diario->ide}}" data-source='@json($autos)'>
                                            {{$diario->psby}}
                                        </a>
                                    </td>                                   
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="costo_standby" data-pk="{{$diario->ide}}">{{ number_format($diario->costo_standby, 0, ',', '.') }}
										</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                        <a href="#" class="editablex" data-type="select" data-name="pmtc" data-pk="{{$diario->ide}}" data-source='@json($autos)'>
                                            {{$diario->pmtc}}
                                        </a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="costo_montacarga" data-pk="{{$diario->ide}}">{{ number_format($diario->costo_montacarga, 0, ',', '.') }}
										</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                        <a href="#" class="editablex" data-type="select" data-name="pesc" data-pk="{{$diario->ide}}" data-source='@json($autos)'>
                                            {{$diario->pesc}}
                                        </a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="costo_escolta" data-pk="{{$diario->ide}}">{{ number_format($diario->costo_escolta, 0, ',', '.') }}
										</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                        <a href="#" class="editablex" data-type="select" data-name="pcas" data-pk="{{$diario->ide}}" data-source='@json($autos)'>
                                            {{$diario->pcas}}
                                        </a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="costo_cs" data-pk="{{$diario->ide}}">{{ number_format($diario->costo_cs, 0, ',', '.') }}
										</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                        <a href="#" class="editablex" data-type="select" data-name="pmon" data-pk="{{$diario->ide}}" data-source='@json($autos)'>
                                            {{$diario->pmon}}
                                        </a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="costo_monitoreo" data-pk="{{$diario->ide}}">{{ number_format($diario->costo_monitoreo, 0, ',', '.') }}
										</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                        <a href="#" class="editablex" data-type="select" data-name="pesg" data-pk="{{$diario->ide}}" data-source='@json($autos)'>
                                            {{$diario->pesg}}
                                        </a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="costo_estudio" data-pk="{{$diario->ide}}">{{ number_format($diario->costo_estudio, 0, ',', '.') }}
										</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="costo_ampoliza" data-pk="{{$diario->ide}}">{{ number_format($diario->costo_ampoliza, 0, ',', '.') }}
										</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
										<a href="#" class="editabler" data-type="text" data-name="sobrecosto_op" data-pk="{{$diario->ide}}">{{ number_format($diario->sobrecosto_op, 0, ',', '.') }}
									</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editabler" data-type="text" data-name="seguros" data-pk="{{$diario->ide}}">
                                            {{ number_format($diario->seguros, 0, ',', '.') }}
                                        </a>
                                    </td> 
                                    @else
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_flete, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->desconductor, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->monto_costo }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_seguro, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_tiposerv, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pcyd }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_cardes, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->paux }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_auxiliar, 0, ',', '.') }}</td>                                        
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->psby }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_standby, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pmtc }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_montacarga, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pesc }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_escolta, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pcas }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_cs, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pmon }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_monitoreo, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pesg }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_estudio, 0, ',', '.') }}</td>                                        
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_ampoliza, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->sobrecosto_op, 0, ',', '.') }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->seguros, 0, ',', '.') }}</td>
                                    @endcan
                                @else
                                <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_flete, 0, ',', '.') }}</td>
                                <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->desconductor, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->monto_costo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_seguro, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_tiposerv, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pcyd }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_cardes, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->paux }}</td>
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_auxiliar, 0, ',', '.') }}</td>                                        
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->psby }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_standby, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pmtc }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_montacarga, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pesc }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_escolta, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pcas }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_cs, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pmon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_monitoreo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pesg }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_estudio, 0, ',', '.') }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_ampoliza, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->sobrecosto_op, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->seguros, 0, ',', '.') }}</td>
                                @endif
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_total, 0, ',', '.') }}</td>
                                @if ($diario->facturar == 'NO')
                                    @can('nuevos.costos')
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editabler" data-type="text" data-name="valor_cliente" data-pk="{{$diario->ide}}">
                                            {{ number_format($diario->valor_cliente, 0, ',', '.') }}
                                        </a>                                        
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editablex" data-type="text" data-name="monto_seguro" data-pk="{{$diario->ide}}">
                                            {{ $diario->monto_seguro }}
                                        </a>                                         
                                    </td>  
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editablex" data-type="text" data-name="seguro_03" data-pk="{{$diario->ide}}">
                                            {{ number_format($diario->seguro_03, 0, ',', '.') }}
                                        </a>                                         
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editabler" data-type="text" data-name="valor_sobrecosto" data-pk="{{$diario->ide}}">
                                            {{ number_format($diario->valor_sobrecosto, 0, ',', '.') }}
                                        </a>                                        
                                    </td>
                                        
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editabler" data-type="text" data-name="valor_servicios" data-pk="{{$diario->ide}}">
                                            {{ number_format($diario->valor_servicios, 0, ',', '.') }}
                                        </a>                                        
                                    </td>
                                @else                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_cliente, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->monto_seguro }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->seguro_03, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_sobrecosto, 0, ',', '.') }}</td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_servicios, 0, ',', '.') }}</td>                                @endif
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_cobrar, 0, ',', '.') }}</td>                             
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->utilidad, 0, ',', '.') }}</td>                                    
                                        @php
                                            $estadoClase = '';
                                            if ($diario->rentabilidad <= 0) {
                                                $estadoClase = 'badge bg-danger';
                                            } 
                                            if ($diario->rentabilidad >= 1) {
                                                $estadoClase = 'badge bg-success';
                                            }
                                        @endphp   
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <span class="{{$estadoClase}}" style="font-weight: 600">{{ number_format($diario->rentabilidad, 1) }} %</span>    
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_cierre }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC; padding-top: 10px; padding-bottom: 10px;">
                                        @php
                                            $estadoClase = '';
                                            if ($diario->facturar == 'SI') {
                                                $estadoClase = 'badge bg-info';
                                            } 
                                            if ($diario->facturar == 'NO') {
                                                $estadoClase = 'badge bg-secondary';
                                            }
                                        @endphp
                                    
                                        @if ($diario->facturar == 'NO')
                                            <!-- Sin lista desplegable, solo un enlace clickeable -->
                                            <a href="#" class="editablef {{ $estadoClase }}" data-type="text" data-name="facturar" data-pk="{{$diario->ide}}">
                                                {{$diario->facturar}}
                                            </a>
                                        @else
                                            <span class="{{ $estadoClase }}">{{$diario->facturar}}</span>
                                        @endif
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->ffacturar }}</td>
                                    @else                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_cliente, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->monto_seguro }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->seguro_03, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_sobrecosto, 0, ',', '.') }}</td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_servicios, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_cobrar, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->utilidad, 0, ',', '.') }}</td>
                                        @php
                                            $estadoClase = '';
                                            if ($diario->rentabilidad <= 0) {
                                                $estadoClase = 'badge bg-danger';
                                            } 
                                            if ($diario->rentabilidad >= 1) {
                                                $estadoClase = 'badge bg-success';
                                            }
                                        @endphp  
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <span class="{{$estadoClase}}" style="font-weight: 600">{{ number_format($diario->rentabilidad, 1) }} %</span>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_cierre }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                                                                
                                        @php
                                            $estadoClase = '';
                                            if ($diario->facturar == 'SI') {
                                                $estadoClase = 'badge bg-info';
                                            } 
                                            if ($diario->facturar == 'NO') {
                                                $estadoClase = 'badge bg-secondary';
                                            }
                                        @endphp                 
                                        <span class="{{$estadoClase}}">{{$diario->facturar}}</span>                                                                   
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->ffacturar }}</td>                                   
                                    @endcan
                                    @can('egresos')
                                        <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="egreso_anticipo" data-pk="{{$diario->ide}}">{{ $diario->egreso_anticipo }}</a></td>
                                        <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="egreso_saldo" data-pk="{{$diario->ide}}">{{ $diario->egreso_saldo }}</a></td>
                                        <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;"><a href="#" class="editablex" data-type="text" data-name="fecha_saldo" data-pk="{{$diario->ide}}">{{ $diario->fecha_saldo }}</a></td>                                    
                                    @endcan
                                    @can('egresos.lectura')
                                        <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->egreso_anticipo }}</td>
                                        <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->egreso_saldo }}</td>
                                        <td style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">{{ $diario->fecha_saldo }}</td>                                    
                                    @endcan 
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
      // Seleccionamos todas las filas de la tabla
      const rows = document.querySelectorAll('tr');
      
      // Iteramos sobre cada fila
      rows.forEach(function (row) {
        row.addEventListener('click', function () {
          // Remover la clase 'selected-row' de todas las filas
          rows.forEach(function (r) {
            r.classList.remove('selected-row');
          });
  
          // Agregar la clase 'selected-row' a la fila clickeada
          row.classList.add('selected-row');
        });
      });
    });
</script> 

<script>
        $.fn.editable.defaults.mode = "inline";
        var ide = $(this).data('ide');
        $.ajaxSetup({
            headers:{
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
                } }, 
            params: function(params) {        
            params._method = 'PUT';
            return params;
            }
            } );
</script>

<script>
$('.editablef').on('click', function(e) {
    e.preventDefault();

    var enlace = $(this); // guardamos la referencia al enlace
    var pk = enlace.data('pk');
    var url = '/solicitud/' + pk + '/update12';

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            facturar: 'SI',
            _method: 'PUT',
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                // Actualiza el texto y el estilo del enlace
                enlace.text('SI')
                      .removeClass('bg-secondary')
                      .addClass('bg-info');

                // Actualiza la fecha en la siguiente celda <td>
                enlace.closest('td').next('td').text(response.fecha);
            } else {
                alert('Error al actualizar: ' + response.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
            console.log(jqXHR.responseText);
            alert('Ocurrió un error al intentar actualizar.');
        }
    });
});
</script>

<script>
    $.fn.editable.defaults.mode = "inline";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editabler').editable({
        url: '/solicitud/' + ide + '/update11',
        type: 'text',
        emptytext: 'Sin datos',
        method: 'PUT',
        inputclass: 'editable-costo', // Clase personalizada para el campo editable
        success: function(response, newValue) {
            if (response.success) {
                $(this).text(formatNumber(newValue));
            }
        },   
        params: function(params) {        
            params._method = 'PUT';
            return params;
            },     
        display: function(value, sourceData) {            
                $(this).text(formatNumber(value));            
            }        
    });
    // Formatear el n迆mero con separadores de miles
    function formatNumber(value) {
        value = value.replace(/\D/g, '');
        return Number(value).toLocaleString('es');
    }
    // Usar delegaci車n de eventos para aplicar el formateo en tiempo real
    $(document).on('input', '.editable-costo', function() {
        let value = $(this).val().replace(/\D/g, '');
        value = Number(value).toLocaleString('es');
        $(this).val(value);
    });
    // Aplicar el formateo al mostrar el campo editable
    $(document).on('shown', '.editable', function(e, editable) {        
            $('.editable-costo').trigger('input');         
    });
</script>

<script>     
    $.fn.editable.defaults.mode = "inline";
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editable').editable({
        url:"/solicitud/update",
        type: 'text',
        emptytext: 'Sin asignar',
        //inputclass: 'form-control',
        success: function(response, newValue) {
            if (response.success) {
                // Actualizar solo el valor del enlace editable
                $(this).text(newValue);
                //location.reload();
            } }, } );
</script>

<script>
    $(document).ready(function() {
        // Inicializa el DataTable
        $('#exampleie').DataTable({
            responsive: true,
            autoWidth: false,
            "order": [[1, "asc"]],
            "lengthMenu": [[100, 500], [100, 500]],            
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
                }
            }
        });

        // Maneja el clic en el enlace +/-
        $('#exampleie').on('click', '.toggle-text', function(e) {
            e.preventDefault();
            var $truncated = $(this).siblings('.editable.truncated');
            var $fullText = $(this).siblings('.full-text');

            if ($fullText.is(':visible')) {
                $fullText.hide();
                $truncated.show();
                $(this).text('+');
            } else {
                $fullText.show();
                $truncated.hide();
                $(this).text('-');
            }
        });

        // Inicializa x-editable solo en la versión truncada
        $('.editable').editable();
    });
</script>


 @if(session('success'))
<script>
    Swal.fire({
        title: "Datos insertados correctamente!",
        text: "{{ session('cantidad') }} registros fueron insertados.",
        icon: "success"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/infoestatus";
        }
    });
</script>
@endif

<x-footer />