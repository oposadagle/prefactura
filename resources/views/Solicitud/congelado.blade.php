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
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="24" height="24" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"> <g> <rect x="132" y="483.584" style="fill:#5f6379;" width="248.005" height="16" /> <rect x="248.005" y="411.891" style="fill:#5f6379;" width="16" height="75.714" /> </g> <path style="fill:#FFFFFF;" d="M32.784,53.248h446.432c13.688,0,24.784,11.096,24.784,24.784v307.712 c0,13.688-11.096,24.784-24.784,24.784H32.784C19.097,410.527,8,399.431,8,385.743V78.032C8,64.344,19.097,53.248,32.784,53.248z" /> <path style="fill:#5f6379;" d="M479.2,61.216c9.278,0,16.8,7.522,16.8,16.8v307.728c0,9.278-7.522,16.8-16.8,16.8H32.8 c-9.278,0-16.8-7.522-16.8-16.8V78.016c0-9.278,7.522-16.8,16.8-16.8l0,0H479.2 M479.2,45.216H32.8 C14.704,45.259,0.044,59.92,0,78.016v307.728c0.044,18.096,14.704,32.756,32.8,32.8h446.4c18.096-0.044,32.756-14.704,32.8-32.8 V78.016C511.956,59.92,497.296,45.259,479.2,45.216z" /> <rect x="356.627" y="186.563" style="fill:#CCCCCC;" width="72.548" height="143.426" /> <rect x="219.728" y="104.62" width="72.548" height="225.38" /> <rect x="82.83" y="12.416" style="fill:#E21B1B;" width="72.548" height="317.573" /> <rect x="82.83" y="325.988" style="fill:#5f6379;" width="346.345" height="8" /> </g></svg>                                        
                    <h4 class="card-title" style="margin-left: 10px;">HISTORICO ESTATUS</h4>
                </div>
                
                @can('egresos')
                    <div class="col-lg-3">
                        <form action="{{ route('procesar.items') }}" method="post" enctype="multipart/form-data" id="facturaForm">
                        @csrf
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" name="archivo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-outline-primary" style="font-size: 12px;font-family: Titillium Web;font-weight: 700;" type="submit" id="inputGroupFileAddon04">CARGAR</button>
                            </div>
                        </form>
                    </div>
                @endcan
                
                <form method="GET" action="{{ route('solicitud.congelado') }}" class="d-flex">
                    <!-- Select de Año -->
                    <select name="year" class="form-select me-2" onchange="this.form.submit()"  style="width: 80px;">
                        @foreach ($years as $availableYear)
                            <option value="{{ $availableYear }}" {{ $year == $availableYear ? 'selected' : '' }}>
                                {{ $availableYear }}
                            </option>
                        @endforeach
                    </select>            
                    <!-- Select de Mes -->
                    <select name="month" class="form-select me-2" onchange="this.form.submit()" style="width: 180px;">
                        @foreach ($months as $availableMonth)
                            <option value="{{ $availableMonth }}" {{ $month == $availableMonth ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($availableMonth)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>                    
                </form>
            </div>
            <div class="card-body">                
                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table id="exampleie" class="table table-striped">
                        <thead class="table-dark" style="font-size: 11px;position: sticky;top: 0;z-index: 1000;">
                            <tr>
                                <th class="celdas" style="color: #FF2029;border: 1px solid #0c213a;">ID</th>
                                <th class="celdas" style="color: #FF2029;border: 1px solid #0c213a;">GUIA</th>
                                <th class="celdas" style="color: #FF2029;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #FF2029;border: 1px solid #0c213a;">REMESA</th>
                                <th class="celdas" style="color: #FF2029;border: 1px solid #0c213a;">RADICADO</th>
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
                                <th class="celdas" style="color: #B6FFFA;border: 1px solid #0c213a;">CONGELADO</th>
                                <th class="celdas" style="color: #B6FFFA;border: 1px solid #0c213a;">PLF-PLI</th>
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
                                <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                    @if ($diario->facturar == 'SI')
                                        @can('nuevos.costos')
                                            <a href="#" class="editablex" data-type="select" data-name="tipo_servicio" data-pk="{{$diario->ide}}" data-source='@json($servicios)'>
                                                {{$diario->tipo_servicio}}
                                            </a>
                                        @else
                                            {{$diario->tipo_servicio}}
                                        @endcan
                                    @else
                                        {{$diario->tipo_servicio}}
                                    @endif
                                </td>
                                <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-size: 11px;">
                                    @if ($diario->facturar == 'SI')
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
                                @if ($diario->facturar == 'SI')
                                    @can('nuevos.costos')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editabler" data-type="text" data-name="costo_flete" data-pk="{{$diario->ide}}">
                                            {{ number_format($diario->costo_flete, 0, ',', '.') }}
                                        </a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editablex" data-type="text" data-name="desconductor" data-pk="{{$diario->ide}}">
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
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->desconductor }}</td>
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
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editablex" data-type="text" data-name="plfpli" data-pk="{{$diario->ide}}">
                                            {{ $diario->plfpli }}
                                        </a>
                                    </td>
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
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->plfpli }}</td>
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
    e.preventDefault(); // Evita la acción predeterminada del enlace

    var pk = $(this).data('pk');  // Obtén el ID del registro
    var url = '/solicitud/' + pk + '/update12';  // URL para la actualización

    // Realiza la solicitud AJAX para cambiar el valor
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            facturar: 'SI',  // Enviar el valor "SI" directamente
            _method: 'PUT',   // Método PUT para la actualización
            _token: '{{ csrf_token() }}' // Asegurarse de enviar el token CSRF
        },
        success: function(response) {
            if (response.success) {
                // Actualiza el texto del enlace editable
                $(e.target).text('SI').removeClass('bg-secondary').addClass('bg-info');
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

   
@if(session('success'))
<script>
    Swal.fire({
        title: "Datos insertados correctamente!",
        text: "{{ session('cantidad') }} registros fueron insertados.",
        icon: "success"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/congelado";
        }
    });
</script>
@endif

<x-footer />