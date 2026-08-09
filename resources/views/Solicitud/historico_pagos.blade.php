<x-header />
<style>.celdas {    
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #656C82;    
    }
    #example th:nth-child(1),
    #example td:nth-child(1) {
        position: sticky;
        left: 0;
        z-index: 10 !important;
        background-clip: padding-box;
    }
    #example th:nth-child(2),
    #example td:nth-child(2) {
        position: sticky;
        left: 120px;
        z-index: 10 !important;
        background-clip: padding-box;
    }
    #example th:nth-child(1), #example td:nth-child(1) {
        min-width: 120px;
    }
    #example thead th:nth-child(1),
    #example thead th:nth-child(2) {
        background-color: #212529 !important;
        z-index: 11 !important;
    }
    #example tbody tr:nth-of-type(odd) td:nth-child(1),
    #example tbody tr:nth-of-type(odd) td:nth-child(2) {
        background-color: #f2f2f2 !important; 
    }
    #example tbody tr:nth-of-type(even) td:nth-child(1),
    #example tbody tr:nth-of-type(even) td:nth-child(2) {
        background-color: #ffffff !important;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve" width="28px" height="28px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFFFFF;" d="M155.328,44.992h335.249c9.616,0,17.415,7.791,17.424,17.408v210.208 c0,9.627-7.805,17.432-17.432,17.432l0,0H155.32c-9.623,0-17.424-7.801-17.424-17.424l0,0V62.4 C137.909,52.782,145.71,44.992,155.328,44.992z"></path> <path style="fill:#CCCCCC;" d="M490.577,48.992c7.404,0.009,13.407,6.004,13.424,13.408v210.217 c-0.009,7.41-6.014,13.416-13.424,13.424H155.328c-7.41-0.009-13.416-6.014-13.424-13.424V62.4 c0.009-7.41,6.014-13.416,13.424-13.424h335.249 M490.577,40.976H155.328c-11.821,0.031-21.397,9.604-21.432,21.424v210.217 c0.036,11.818,9.606,21.389,21.424,21.424h335.257c11.818-0.036,21.389-9.606,21.424-21.424V62.4 C511.965,50.582,502.394,41.011,490.577,40.976z"></path> <rect x="133.899" y="80.256" width="378.101" height="59.08"></rect> <g> <rect x="175.867" y="184.334" style="fill:#999999;" width="134.806" height="11.816"></rect> <rect x="175.867" y="217.618" style="fill:#999999;" width="81.164" height="11.816"></rect> </g> <circle style="fill:#E21B1B;" cx="383.845" cy="216.069" r="40.304"></circle> <circle style="fill:#FF3333;" cx="432.918" cy="216.069" r="40.304"></circle> <path style="fill:#FFFFFF;" d="M21.432,221.96h335.24c9.627,0,17.432,7.805,17.432,17.432V449.6c0,9.627-7.805,17.432-17.432,17.432 l0,0H21.424C11.801,467.032,4,459.231,4,449.608c0-0.003,0-0.005,0-0.008V239.392C4,229.765,11.805,221.96,21.432,221.96z"></path> <path style="fill:#CCCCCC;" d="M356.672,225.96c7.41,0.009,13.416,6.014,13.424,13.424v210.217 c-0.009,7.41-6.014,13.416-13.424,13.424H21.424c-7.41-0.009-13.416-6.014-13.424-13.424V239.384 c0.009-7.41,6.014-13.416,13.424-13.424H356.672 M356.672,217.96H21.424C9.606,217.995,0.036,227.566,0,239.384v210.217 c0.036,11.818,9.606,21.389,21.424,21.424h335.248c11.821-0.031,21.397-9.604,21.432-21.424V239.384 c-0.036-11.818-9.606-21.389-21.424-21.424H356.672z"></path> <rect y="257.229" width="378.101" height="59.08"></rect> <g> <rect x="41.969" y="361.306" style="fill:#999999;" width="134.806" height="11.816"></rect> <rect x="41.969" y="394.581" style="fill:#999999;" width="81.164" height="11.816"></rect> </g> <circle style="fill:#E21B1B;" cx="249.936" cy="393.042" r="40.304"></circle> <circle style="fill:#FF3333;" cx="299.019" cy="393.042" r="40.304"></circle> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">HISTÓRICO PAGOS</h4>
                </div>

                <div class="d-flex align-items-center">
                    <form method="GET" action="{{ route('solicitud.historicoPagos') }}" class="d-flex align-items-center" style="gap: 8px;">
                        @php
                            $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                            $mesesDisponibles = $mesesMap[$anio] ?? [];
                            rsort($mesesDisponibles);
                        @endphp
                        <select name="anio" class="form-select form-select-sm" style="width: 100px; font-size: 12px;" onchange="this.form.submit()">
                            @foreach ($aniosDisponibles as $y)
                                <option value="{{ $y }}" {{ $anio == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endforeach
                        </select>
                        <select name="mes" class="form-select form-select-sm" style="width: 130px; font-size: 12px;" onchange="this.form.submit()">
                            @foreach ($mesesDisponibles as $m)
                                <option value="{{ $m }}" {{ $mes == $m ? 'selected' : '' }}>{{ $meses[$m-1] }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary" style="font-size: 12px;">Filtrar</button>
                    </form>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">📅 RECIBIDO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">📅 PAGO COMPLETO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">NOTA PC</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">📅 PAGO ANTICIPO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">NOTA PA</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">📅 PAGO SALDO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">NOTA PS</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">CENTRO DE COSTO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">CONDICION DE PAGO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">NIT</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CLIENTE</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CONDUCTOR</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGAR ANTICIPO A</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA ANTICIPO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TELEFONO ANTICIPO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGAR SALDO A</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA SALDO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGAR CONTADO A</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA CONTADO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TIPO VEHICULO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">COSTO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">EXTRA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">ANTICIPO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">PAGO COMPLETO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RETEICA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RETEFUENTE</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">FOPAT</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SEGURO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">VALOR A PAGAR</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">
                                    <td class="celdas" style="color: #000; font-weight: bold; border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->razon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_llegada }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_pago_completo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->nota_pc }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_pago_anticipo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->nota_pa }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_pago_saldo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->nota_ps }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->centro_costo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            @php
                                                $estadoClase = '';
                                                switch ($diario->paytype) {
                                                    case 'AM. ANTICIPAR': $estadoClase = 'badge badge-outline-info'; break;
                                                    case 'PM. ANTICIPAR': $estadoClase = 'badge badge-outline-primary'; break;
                                                    case 'ANTICIPO NOCHE': $estadoClase = 'badge badge-outline-dark'; break;
                                                    case 'CONTADO': $estadoClase = 'badge badge-outline-success'; break;
                                                    case 'CONTADO AM.': $estadoClase = 'badge badge-outline-success'; break;
                                                    case 'CONTADO PM.': $estadoClase = 'badge badge-outline-success'; break;
                                                    default: $estadoClase = 'badge badge-outline-light';
                                                }
                                            @endphp
                                        <span class="{{ $estadoClase }}">{{ $diario->paytype }}</span>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->nit }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->origen) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->destino) }}</td>
                                    <td class="celdas fw-bold" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;color: #021526;">{{ $diario->placa }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->conductor) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagant }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagant }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tpagant }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagcon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagcon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_vehiculo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_tiposerv, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->anticipo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $estadoClase = '';
                                            if ($diario->pago_completo == 'SI') { $estadoClase = 'badge bg-info'; }
                                            if ($diario->pago_completo == 'NO') { $estadoClase = 'badge bg-danger'; }
                                        @endphp
                                        <span class="{{ $estadoClase }}">{{ $diario->pago_completo }}</span>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->reteica, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->retefuente, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->fopat, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->seguro, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_a_pagar, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
