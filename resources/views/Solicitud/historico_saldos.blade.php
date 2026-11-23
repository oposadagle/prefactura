<x-header />
<style>
    .celdas {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #656C82;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg height="28px" width="28px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFFFFF;" d="M155.328,44.992h335.249c9.616,0,17.415,7.791,17.424,17.408v210.208 c0,9.627-7.805,17.432-17.432,17.432l0,0H155.32c-9.623,0-17.424-7.801-17.424-17.424l0,0V62.4 C137.909,52.782,145.71,44.992,155.328,44.992z"></path> <path style="fill:#CCCCCC;" d="M490.577,48.992c7.404,0.009,13.407,6.004,13.424,13.408v210.217 c-0.009,7.41-6.014,13.416-13.424,13.424H155.328c-7.41-0.009-13.416-6.014-13.424-13.424V62.4 c0.009-7.41,6.014-13.416,13.424-13.424h335.249 M490.577,40.976H155.328c-11.821,0.031-21.397,9.604-21.432,21.424v210.217 c0.036,11.818,9.606,21.389,21.424,21.424h335.257c11.818-0.036,21.389-9.606,21.424-21.424V62.4 C511.965,50.582,502.394,41.011,490.577,40.976z"></path> <rect x="133.899" y="80.256" width="378.101" height="59.08"></rect> <g> <rect x="175.867" y="184.334" style="fill:#999999;" width="134.806" height="11.816"></rect> <rect x="175.867" y="217.618" style="fill:#999999;" width="81.164" height="11.816"></rect> </g> <circle style="fill:#E21B1B;" cx="383.845" cy="216.069" r="40.304"></circle> <circle style="fill:#FF3333;" cx="432.918" cy="216.069" r="40.304"></circle> <path style="fill:#FFFFFF;" d="M21.432,221.96h335.24c9.627,0,17.432,7.805,17.432,17.432V449.6c0,9.627-7.805,17.432-17.432,17.432l0,0H21.424C11.801,467.032,4,459.231,4,449.608c0-0.003,0-0.005,0-0.008V239.392C4,229.765,11.805,221.96,21.432,221.96z"></path> <path style="fill:#CCCCCC;" d="M356.672,225.96c7.41,0.009,13.416,6.014,13.424,13.424v210.217 c-0.009,7.41-6.014,13.416-13.424,13.424H21.424c-7.41-0.009-13.416-6.014-13.424-13.424V239.384 c0.009-7.41,6.014-13.416,13.424-13.424H356.672 M356.672,217.96H21.424c-11.821,0.031-21.397,9.604-21.432,21.424v210.217 c0.036,11.818,9.606,21.389,21.424,21.424h335.257c11.818-0.036,21.389-9.606,21.424-21.424V239.384 C377.965,227.566,368.394,217.991,356.672,217.96z"></path> <path style="fill:#E21B1B;" d="M372.365,283.686c-15.606,0-28.28,12.673-28.28,28.28s12.673,28.28,28.28,28.28 c15.607,0,28.28-12.673,28.28-28.28S387.972,283.686,372.365,283.686z"></path> <path style="fill:#FF3333;" d="M431.55,283.686c-15.606,0-28.28,12.673-28.28,28.28s12.673,28.28,28.28,28.28 c15.607,0,28.28-12.673,28.28-28.28S447.157,283.686,431.55,283.686z"></path> <path style="fill:#E21B1B;" d="M372.365,352.796c-15.606,0-28.28,12.673-28.28,28.28s12.673,28.28,28.28,28.28 c15.607,0,28.28-12.673,28.28-28.28S387.972,352.796,372.365,352.796z"></path> <g> <path style="fill:#333333;" d="M79.365,283.686c-15.606,0-28.28,12.673-28.28,28.28s12.673,28.28,28.28,28.28 c15.607,0,28.28-12.673,28.28-28.28S94.972,283.686,79.365,283.686z"></path> <path style="fill:#333333;" d="M138.55,283.686c-15.606,0-28.28,12.673-28.28,28.28s12.673,28.28,28.28,28.28 c15.607,0,28.28-12.673,28.28-28.28S154.157,283.686,138.55,283.686z"></path> <path style="fill:#333333;" d="M79.365,352.796c-15.606,0-28.28,12.673-28.28,28.28s12.673,28.28,28.28,28.28 c15.607,0,28.28-12.673,28.28-28.28S94.972,352.796,79.365,352.796z"></path> </g> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">HISTÓRICO PAGO SALDOS</h4>
                </div>

                <div class="d-flex align-items-center">
                    <form method="GET" action="{{ route('solicitud.historicoSaldos') }}" class="d-flex align-items-center" style="gap: 8px;">
                        @php
                            $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                            $mesesDisponibles = $mesesMap[$anio] ?? [];
                            rsort($mesesDisponibles);
                        @endphp
                        <select name="anio" class="form-select form-select-sm" style="width: 100px; font-size: 12px;" onchange="this.form.submit()">
                            <option value="0" {{ $anio == 0 ? 'selected' : '' }}>Todos</option>
                            @foreach ($aniosDisponibles as $y)
                                <option value="{{ $y }}" {{ $anio == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endforeach
                        </select>
                        <select name="mes" class="form-select form-select-sm" style="width: 130px; font-size: 12px;" onchange="this.form.submit()">
                            <option value="0" {{ $mes == 0 ? 'selected' : '' }}>Todos</option>
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
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">FECHA DE PAGO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">📅 PAGO ANTICIPO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">CENTRO DE COSTO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">NIT</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CLIENTE</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CONDUCTOR</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGAR SALDO A</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA SALDO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">COSTO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">EXTRA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">ANTICIPO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">PAGO COMPLETO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RETEICA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RETEFUENTE</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">FOPAT</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SEGURO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">VALOR SALDO</th>
                                <th class="celdas" style="color: #00FF9C;border: 1px solid #0c213a;">NOVEDADES</th>
                                <th class="celdas" style="color: #00FF9C;border: 1px solid #0c213a;">DETALLE</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SALDO TOTAL</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">ESTADO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">NOTA PS</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center;">
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;font-weight:bold;">{{ $diario->fecha_pago }}</td>
                                    <td class="celdas" style="color: #000; font-weight: bold; border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->razon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_pago_anticipo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->centro_costo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->nit }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>
                                    <td class="celdas fw-bold" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;color: #021526;">
                                        @if ($diario->placa)
                                            <span style="border: 2px solid #e9af00; padding: 2px 6px; display: inline-block;">{{ $diario->placa }}</span>
                                        @else
                                            {{ $diario->placa }}
                                        @endif
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->conductor) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagsal }}</td>
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
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_saldo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->total_novedades, 0, ',', '.') }}</td>
                                    <td class="celdas text-center" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <button type="button" class="btn btn-sm btn-detalle-novedad"
                                            style="background-color: #00FF9C; color: #000; font-size: 14px; width: 30px; height: 30px; padding: 0;"
                                            data-manifiesto="{{ $diario->razon }}">
                                            👁
                                        </button>
                                    </td>
                                    <td class="celdas fw-bold" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->saldo_total, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @if ($diario->estado_pago === 'CONGELADO')
                                            <span class="badge bg-info">CONGELADO</span>
                                        @else
                                            <span class="badge bg-success">PAGADO</span>
                                        @endif
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->nota_ps }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetalleNovedad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" style="color: white;">Detalle novedades - <span id="detalleManifiesto" style="color: #00FF9C; font-weight: bold;"></span></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th style="color: #00FF9C;">MANIFIESTO</th>
                                <th style="color: #00FF9C;">TIPO</th>
                                <th style="color: #00FF9C;">CLASE</th>
                                <th style="color: #00FF9C;">VALOR</th>
                                <th style="color: #00FF9C;">NOTA</th>
                                <th style="color: #00FF9C;">SOPORTE</th>
                                <th style="color: #00FF9C;">USUARIO</th>
                                <th style="color: #00FF9C;">FECHA</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyDetalleNovedad" style="font-size: 11px;">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btn-detalle-novedad').click(function() {
            var manifiesto = $(this).data('manifiesto');
            $('#detalleManifiesto').text(manifiesto);
            $('#tbodyDetalleNovedad').html('<tr><td colspan="8" class="text-center">Cargando...</td></tr>');
            abrirModalSeguro('modalDetalleNovedad');

            $.get('/solicitud/novedad/detalle/' + manifiesto, function(data) {
                var html = '';
                if (data.length === 0) {
                    html = '<tr><td colspan="8" class="text-center">Sin novedades</td></tr>';
                } else {
                    data.forEach(function(n) {
                        var soporteHtml = n.soporte
                            ? '<a href="#" class="ver-soporte" data-soporte="' + n.soporte + '" data-tipo="' + n.soporte_tipo + '" title="Ver soporte">📄</a>'
                            : '';
                        var manifiestoMostrar = n.es_traslado
                            ? (n.manifiesto_origen + ' → ' + n.manifiesto)
                            : (n.manifiesto || '');
                        html += '<tr>' +
                            '<td>' + manifiestoMostrar + '</td>' +
                            '<td>' + n.tipo_novedad + '</td>' +
                            '<td>' + (n.clase_novedad || '') + '</td>' +
                            '<td style="text-align: right;">' + parseInt(n.valor).toLocaleString('es-CO') + '</td>' +
                            '<td>' + (n.nota || '') + '</td>' +
                            '<td class="text-center">' + soporteHtml + '</td>' +
                            '<td>' + n.update_user + '</td>' +
                            '<td>' + n.created_at + '</td>' +
                            '</tr>';
                    });
                }
                $('#tbodyDetalleNovedad').html(html);

                $('.ver-soporte').click(function(e) {
                    e.preventDefault();
                    var base64 = $(this).data('soporte');
                    var tipo = $(this).data('tipo');
                    if (tipo === 'application/pdf') {
                        var win = window.open('', '_blank');
                        win.document.write('<iframe src="data:application/pdf;base64,' + base64 + '" width="100%" height="100%" frameborder="0"></iframe>');
                    } else {
                        var win = window.open('', '_blank');
                        win.document.write('<img src="data:' + tipo + ';base64,' + base64 + '" style="max-width:100%; height:auto;">');
                    }
                });
            }).fail(function() {
                $('#tbodyDetalleNovedad').html('<tr><td colspan="8" class="text-center text-danger">Error al cargar</td></tr>');
            });
        });
    });
</script>

<x-footer />
