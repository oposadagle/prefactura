<x-header />
<div class="row">
    <div class=" col-sm-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Facturacion</h4>
            </div><!--end card-header-->
            <div class="card-body">

                <div class="row">
                    <div class="col-12 mb-3 d-flex input-group">
                        <span class="input-group-text" style="font-size: 11px;font-weight:600;">AÑO</span>
                        <select id="anio-select" class="form-control" style="width: 80px;">
                            @php
                                $anios = $periodosDisponibles->pluck('anio')->unique()->sortDesc();
                            @endphp
                            @foreach ($anios as $anio)
                                <option value="{{ $anio }}" {{ $anio == $anioActual ? 'selected' : '' }}>
                                    {{ $anio }}</option>
                            @endforeach
                        </select>

                        <span class="input-group-text" style="font-size: 11px;font-weight:600;">MES</span>
                        <select id="mes-select" class="form-control">
                            @foreach ($periodosDisponibles as $periodo)
                                <option value="{{ $periodo->mes }}" data-anio="{{ $periodo->anio }}"
                                    {{ $periodo->anio == $anioActual && $periodo->mes == $mesActual ? 'selected' : '' }}>
                                    {{ $periodo->mes_nombre }}
                                </option>
                            @endforeach
                        </select>
                        <span class="input-group-text" style="font-size: 11px;font-weight:600;"
                            id="basic-addon1">DIA</span>
                        <select id="dia-select" class="form-control" autocomplete="off" style="width: 10px;">
                            <option value="">Todos</option>
                            @foreach ($diasDisponibles as $dia)
                                <option value="{{ $dia }}">{{ $dia }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-text" style="font-size: 11px;font-weight:600;"
                            id="basic-addon1">CLIENTE</span>
                        <select id="cliente-select" class="form-control" autocomplete="off" style="width: 130px;">
                            <option value="">Todos</option>
                            @foreach ($clientesDisponibles as $cliente)
                                <option value="{{ $cliente }}">{{ $cliente }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tabla Congelado -->
                    <div class="col-12 mb-0">
                        <table id="tabla-congelado" class="table table-bordered">
                            <thead style="font-size: 11px;background-color:#F1F5FA;font-weight:600">
                                <tr>
                                    <th style="color: #fff;background-color: #059BFF">CONGELADO</th>
                                    <th style="border-color: #fff">SERVICIOS</th>
                                    <th style="border-color: #fff">GUIAS</th>
                                    <th>VALOR</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;"></tbody>
                        </table>
                    </div>

                    <!-- Gráficos de pie -->
                    <div class="col-md-6">
                        <h6>CONGELADO</h6>
                        <canvas id="graficoCongelado"></canvas>
                    </div>
                    <div class="col-md-6">
                        <h6>FACTURADO</h6>
                        <canvas id="graficoFacturado"></canvas>
                    </div>

                    <!-- Tabla Facturado -->
                    <div class="col-12 mt-4">
                        <table id="tabla-facturado" class="table table-bordered">
                            <thead style="font-size: 11px;background-color:#F1F5FA;font-weight:600">
                                <tr>
                                    <th style="color: #fff;background-color: #47CB52">FACTURADO</th>
                                    <th style="border-color: #fff">SERVICIOS</th>
                                    <th style="border-color: #fff">GUIAS</th>
                                    <th>VALOR</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" col-sm-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Anticipos</h4>
            </div><!--end card-header-->
            <div class="card-body">

                <div class="container">
                    <!-- Línea del select para elegir el mes y el valor de manifiestos -->
                    <div class="row">
                        <div class="col-12 mb-3 d-flex input-group">
                            <span class="input-group-text" style="font-size: 11px;font-weight:600;">AÑO</span>
                            <select id="select-anio" class="form-control" style="width: 80px;"></select>

                            <span class="input-group-text" style="font-size: 11px;font-weight:600;">MES</span>
                            <select id="select-mes" class="form-control" style="width: 5px;"></select>

                            <span id="manifiestos-value" class="input-group-text"
                                style="font-size: 11px;font-weight:600"></span>
                        </div>

                        <!-- Tabla Estado de Anticipos -->
                        <div class="row mb-0">
                            <div class="col-12">
                                <table id="tabla-estado-anticipo" class="table table-bordered mb-0 pb-0">
                                    <thead style="font-size: 11px;background-color:#F1F5FA;font-weight:600">
                                        <tr>
                                            <th>MANIFIESTOS</th>
                                            <th style="border-color: #fff">ANTICIPOS</th>
                                            <th style="border-color: #fff">SALDOS</th>
                                            <th style="border-color: #fff">TOTAL</th>
                                            <th style="color: #fff;background-color: #059BFF">ESTADO ANTICIPOS</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;font-size:12px;"></tbody>
                                </table>
                                <table id="tabla-estado-saldo" class="table table-bordered mt-0 pt-0 mb-0 pb-0">
                                    <thead style="font-size: 11px;background-color:#F1F5FA;font-weight:600">
                                        <tr>
                                            <th>MANIFIESTOS</th>
                                            <th style="border-color: #fff">ANTICIPOS</th>
                                            <th style="border-color: #fff">SALDOS</th>
                                            <th style="border-color: #fff">TOTAL</th>
                                            <th style="color: #fff;background-color: #FE252D">ESTADO SALDOS</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;font-size:12px;"></tbody>
                                </table>
                                <table id="tabla-estado-pago" class="table table-bordered mt-0 pt-0">
                                    <thead style="font-size: 11px;background-color:#F1F5FA;font-weight:600">
                                        <tr>
                                            <th>MANIFIESTOS</th>
                                            <th style="border-color: #fff">ANTICIPOS</th>
                                            <th style="border-color: #fff">SALDOS</th>
                                            <th style="border-color: #fff">TOTAL</th>
                                            <th style="color: #fff;background-color: #47CB52">ESTADO PAGO</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;font-size:12px;"></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Gráfico Estado de Saldos -->
                        <div class="row mb-0 mt-0">
                            <div class="col-6 d-flex flex-column justify-content-center">
                                <h6>ESTADOS DE PAGO DE SALDOS</h6>
                                <ul id="labels-estado-pago" class="list-unstyled">
                                </ul>
                            </div>
                            <div class="col-6">
                                <canvas id="grafico-estado-pago"></canvas>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-0 mt-2">
                            <div class="col-12">
                                <canvas id="grafico-estado-saldo" class="hidden"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const anioSelect = document.getElementById('anio-select');
            const mesSelect = document.getElementById('mes-select');
            const diaSelect = document.getElementById('dia-select');
            const clienteSelect = document.getElementById('cliente-select');
            const tablaCongeladoBody = document.querySelector('#tabla-congelado tbody');
            const tablaFacturadoBody = document.querySelector('#tabla-facturado tbody');
            let graficoCongelado, graficoFacturado;

            // Filtrar meses por año al cambiar el año
            function filtrarMesesPorAnio(anioSeleccionado) {
                Array.from(mesSelect.options).forEach(option => {
                    option.style.display = option.dataset.anio == anioSeleccionado ? 'block' : 'none';
                });
                // Seleccionar primer mes visible
                const primerMesVisible = Array.from(mesSelect.options).find(opt => opt.style.display !== 'none');
                if (primerMesVisible) {
                    mesSelect.value = primerMesVisible.value;
                    actualizarDiasClientes(anioSeleccionado, mesSelect.value);
                }
            }

            // Inicializar
            filtrarMesesPorAnio(anioSelect.value);
            actualizarDatos();

            anioSelect.addEventListener('change', () => {
                filtrarMesesPorAnio(anioSelect.value);
                actualizarDatos();
            });
            mesSelect.addEventListener('change', actualizarDatos);
            diaSelect.addEventListener('change', actualizarDatos);
            clienteSelect.addEventListener('change', actualizarDatos);

            function formatoMoneda(valor) {
                return valor.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            function actualizarDiasClientes(anio, mes) {
                fetch(`/informe/dias-clientes/${anio}/${mes}`)
                    .then(response => response.json())
                    .then(data => {
                        diaSelect.innerHTML = '<option value="">Todos</option>';
                        data.dias.forEach(dia => {
                            diaSelect.innerHTML += `<option value="${dia}">${dia}</option>`;
                        });

                        clienteSelect.innerHTML = '<option value="">Todos</option>';
                        data.clientes.forEach(cliente => {
                            clienteSelect.innerHTML += `<option value="${cliente}">${cliente}</option>`;
                        });
                    });
            }

            function actualizarDatos() {
                const anio = anioSelect.value;
                const mes = mesSelect.value;
                const dia = diaSelect.value || '';
                const cliente = clienteSelect.value || '';

                fetch(`/informe/${anio}/${mes}?dia=${dia}&cliente=${cliente}`)
                    .then(response => response.json())
                    .then(data => {
                        tablaCongeladoBody.innerHTML = '';
                        data.datosCongelado.forEach(row => {
                            tablaCongeladoBody.innerHTML += `<tr>
                        <td style="text-align:center">${row.congelado}</td>
                        <td style="text-align:center">${row.total_servicios}</td>
                        <td style="text-align:center">${row.total_guias}</td>
                        <td style="text-align:center">$ ${formatoMoneda(row.total_valor)}</td>
                    </tr>`;
                        });

                        tablaFacturadoBody.innerHTML = '';
                        data.datosFacturadoSi.forEach(row => {
                            tablaFacturadoBody.innerHTML += `<tr>
                        <td style="text-align:center">${row.facturado}</td>
                        <td style="text-align:center">${row.total_servicios}</td>
                        <td style="text-align:center">${row.total_guias}</td>
                        <td style="text-align:center">$ ${formatoMoneda(row.total_valor)}</td>
                    </tr>`;
                        });

                        actualizarGraficoCongelado(data.datosCongelado);
                        actualizarGraficoFacturado(data.datosFacturadoSi);
                    });
            }

            function actualizarGraficoCongelado(datos) {
                if (graficoCongelado) graficoCongelado.destroy();
                const ctx = document.getElementById('graficoCongelado').getContext('2d');
                graficoCongelado = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: datos.map(d => d.congelado),
                        datasets: [{
                            data: datos.map(d => d.total_valor),
                            backgroundColor: ['#36A2EB', '#FE252D']
                        }]
                    },
                    options: {
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: tooltipItem => {
                                        const valor = formatoMoneda(datos[tooltipItem.dataIndex]
                                            .total_valor);
                                        return `Valor: $${valor}`;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            function actualizarGraficoFacturado(datos) {
                if (graficoFacturado) graficoFacturado.destroy();
                const ctx = document.getElementById('graficoFacturado').getContext('2d');
                graficoFacturado = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: datos.map(d => d.facturado),
                        datasets: [{
                            data: datos.map(d => d.total_valor),
                            backgroundColor: ['#72BF78', '#FFBF11']
                        }]
                    },
                    options: {
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: tooltipItem => {
                                        const valor = formatoMoneda(datos[tooltipItem.dataIndex]
                                            .total_valor);
                                        return `Valor: $${valor}`;
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const data = @json($diarios); // ahora es un objeto con claves "2024-9", etc.

            const selectAnio = document.getElementById("select-anio");
            const selectMes = document.getElementById("select-mes");

            // Extraer años únicos
            const anios = [...new Set(Object.values(data).map(d => d.anio))].sort((a, b) => b - a);
            anios.forEach(anio => {
                const opt = document.createElement("option");
                opt.value = anio;
                opt.textContent = anio;
                selectAnio.appendChild(opt);
            });

            let anioActual = anios[0] || null;
            selectAnio.value = anioActual;
            actualizarMesesPorAnio(anioActual);

            selectAnio.addEventListener("change", () => {
                actualizarMesesPorAnio(selectAnio.value);
            });

            selectMes.addEventListener("change", () => {
                const anio = selectAnio.value;
                const mes = selectMes.value;
                const key = `${anio}-${mes}`;
                if (data[key]) {
                    actualizarVista(data[key]);
                }
            });

            function actualizarMesesPorAnio(anio) {
                // Limpiar
                selectMes.innerHTML = '';
                // Filtrar meses del año
                const mesesDelAnio = Object.values(data)
                    .filter(d => d.anio == anio)
                    .map(d => ({
                        mes: d.mes,
                        nombre: new Date(0, d.mes - 1).toLocaleString('es', {
                            month: 'long'
                        })
                    }))
                    .sort((a, b) => b.mes - a.mes);

                mesesDelAnio.forEach(m => {
                    const opt = document.createElement("option");
                    opt.value = m.mes;
                    opt.textContent = m.nombre;
                    selectMes.appendChild(opt);
                });

                if (mesesDelAnio.length > 0) {
                    selectMes.value = mesesDelAnio[0].mes;
                    const key = `${anio}-${mesesDelAnio[0].mes}`;
                    if (data[key]) actualizarVista(data[key]);
                }
            }

            function actualizarVista(datosMes) {
                document.getElementById("manifiestos-value").textContent = `MANIFIESTOS: ${datosMes.manifiestos}`;
                actualizarTabla("tabla-estado-anticipo", datosMes.estado_anticipo);
                actualizarTabla("tabla-estado-saldo", datosMes.estado_saldo);
                actualizarTabla("tabla-estado-pago", datosMes.estado_pago);
                renderizarGraficoPie("grafico-estado-pago", datosMes.estado_pago);
            }

            function actualizarTabla(idTabla, datos) {
                const tbody = document.getElementById(idTabla).querySelector("tbody");
                tbody.innerHTML = "";
                for (const [estado, valores] of Object.entries(datos)) {
                    tbody.innerHTML += `<tr>
                <td>${valores.count}</td>
                <td>$ ${valores.anticipo.toLocaleString()}</td>
                <td>$ ${valores.saldo_final.toLocaleString()}</td>
                <td>$ ${valores.total.toLocaleString()}</td>
                <td>${estado.toUpperCase()}</td>
            </tr>`;
                }
            }

            function renderizarGraficoPie(idCanvas, datos) {
                const labels = Object.keys(datos);
                const dataTotal = Object.values(datos).map(item => item.total);
                const colores = ['rgba(254, 37, 45, 1)', 'rgba(245, 180, 0, 1)', 'rgba(71, 203, 82, 1)',
                    'rgba(5, 155, 255, 1)'
                ];

                const labelsContainer = document.getElementById('labels-estado-pago');
                labelsContainer.innerHTML = '';
                labels.forEach((label, i) => {
                    const li = document.createElement('li');
                    li.textContent = label.toUpperCase();
                    li.style.color = colores[i % colores.length];
                    li.style.fontSize = '0.8rem';
                    li.style.fontWeight = '500';
                    li.style.marginBottom = '2px';
                    li.style.textAlign = 'right';
                    labelsContainer.appendChild(li);
                });

                const ctx = document.getElementById(idCanvas).getContext('2d');
                if (window.graficoEstadoPago) window.graficoEstadoPago.destroy();
                window.graficoEstadoPago = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: dataTotal,
                            backgroundColor: colores
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            }
        });
    </script>
