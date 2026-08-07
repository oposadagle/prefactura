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
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="28px" height="28px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#999999;" d="M108.967,329.31v132.167c0,0,60.479-31.68,90.72-16.479c30.24,15.2,113.447,37.12,163.367,32.96 c49.92-4.16,130.087-70.239,145.287-92.159c15.2-22.08-19.68-24.8-54.4-6.88c-34.72,17.92-146.727,53.6-199.686,0 c0,0,122.567,11.04,127.047,0c4.48-11.04-13.6-28.96-108.967-49.6C176.967,308.679,108.967,329.31,108.967,329.31z"></path> <rect y="329.311" style="fill:#231F20;" width="72.639" height="148.646"></rect> <path style="fill:#E21B1B;" d="M308.846,293.542V262.71c-18.075-0.205-35.799-5.019-51.496-13.984l8.583-29.872 c15.033,8.901,32.131,13.722,49.6,13.984c20,0,33.696-9.856,33.696-25.112c0-14.304-11.128-23.52-34.648-32.112 c-33.375-12.08-54.991-27.336-54.991-56.896c0-27.336,19.072-48.32,51.2-54.04V33.527h26.008v29.6 c15.222,0.165,30.213,3.75,43.864,10.488l-8.583,29.248c-13.331-6.998-28.143-10.707-43.2-10.816 c-22.248,0-30.191,11.448-30.191,22.248c0,13.04,11.44,20.344,38.464,31.16c35.6,13.352,51.496,30.512,51.496,58.808 c0,27.015-18.752,50.856-53.719,56.575v32.744L308.846,293.542z"></path> <g> <rect x="72.639" y="119.905" style="fill:#999999;" width="158.419" height="15.999"></rect> <rect x="129.1" y="179.26" style="fill:#999999;" width="101.963" height="15.999"></rect> </g> </g></svg>
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
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">MLOG</th>
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
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">MLOG{{ substr($diario->razon, -7) }}</td>
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
