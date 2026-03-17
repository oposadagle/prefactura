<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carta Cuenta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 40px;
            line-height: 1.6;
        }
        .header-section {
            text-align: center;
            margin-bottom: 40px;
        }
        .header-section h3 {
            margin: 0;
            font-weight: bold;
        }
        .header-section p {
            margin: 5px 0;
        }
        .debe-a {
            text-align: center;
            font-weight: bold;
            margin: 30px 0;
            font-size: 16px;
        }
        .body-info {
            margin-bottom: 30px;
        }
        .body-info p {
            margin: 8px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            width: 35%;
        }
        .footer-section {
            margin-top: 60px;
        }
        .signature-space {
            margin-top: 80px;
        }
        
        /* Print rules for combo file */
        @media print {
            body { margin: 20px; }
            .page-break {
                page-break-after: always;
            }
        }
    </style>
</head>
<body>
    @foreach ($registros as $index => $r)
        <div class="page {{ $index < count($registros) - 1 ? 'page-break' : '' }}">
            <div style="float: left; margin-bottom: 20px;">
                FECHA: {{ $r->fecha_envio ? \Carbon\Carbon::parse($r->fecha_envio)->format('d-m-Y') : 'N/A' }}
            </div>
            <div style="clear: both;"></div>

            <div class="header-section">
                <h3>GRUPO LOGISTICO ESPECIALIZADO SAS</h3>
                <p>NIT: 900.614.022-2</p>
            </div>

            <div class="debe-a">DEBE A:</div>

            <div class="body-info">
                <p><strong>NOMBRE:</strong> {{ $r->pagcon }}</p>
                <p><strong>CEDULA:</strong> {{ $r->cpagcon }}</p>
                <p style="margin-top: 15px;">POR CONCEPTO DE TRANSPORTE DE CARGA</p>
            </div>

            @php
                $total = floatval($r->cargaone) + floatval($r->cargatwo) + floatval($r->standby) + floatval($r->costo_desplazamiento);
            @endphp
            <table>
                <tr>
                    <th>RADICADO</th>
                    <td>{{ $r->guia }}</td>
                </tr>
                <tr>
                    <th>PLACA</th>
                    <td>{{ $r->placa }}</td>
                </tr>
                <tr>
                    <th>VALOR PARA PAGAR $</th>
                    <td>${{ number_format($total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>NOMBRE DEL CLIENTE ORIGEN</th>
                    <td>{{ $r->cliente }}</td>
                </tr>
                <tr>
                    <th>NOMBRE DEL CLIENTE DESTINO</th>
                    <td>{{ $r->cliente }}</td>
                </tr>
                <tr>
                    <th>MANIFIESTO</th>
                    <td>{{ $r->razon }}</td>
                </tr>
            </table>

            <div class="footer-section">
                <p>ATENTAMENTE,</p>
                <div class="signature-space"></div>
                <p><strong>{{ $r->pagcon }}</strong></p>
                <p>CC. {{ $r->cpagcon }}</p>
            </div>
        </div>
    @endforeach


</body>
</html>
