<table class="table table-striped mb-0">
    <thead style="font-size: 10px;background-color:#FE252D">
        <tr>
            <th style="color: #FFF;border: 1px solid #FFF;">GUIA</th>
            <th style="color: #FFF;border: 1px solid #FFF;">OPERADOR</th>
            <th style="color: #FFF;border: 1px solid #FFF;">CLIENTE</th>
            <th style="color: #FFF;border: 1px solid #FFF;">TRAYECTO</th>
            <th style="color: #FFF;border: 1px solid #FFF;">PESO</th>
            <th style="color: #FFF;border: 1px solid #FFF;">VALOR FACTURA</th>
            <th style="color: #FFF;border: 1px solid #FFF;">CONSOLIDADO</th>
            <th style="color: #FFF;border: 1px solid #FFF;">DIF</th>
            <th style="color: #FFF;border: 1px solid #FFF;">No FACTURA</th>            
        </tr>
    </thead>
    <tbody style="font-size: 11px;font-family: Titillium Web;">
        @foreach ($locales as $local)
            <tr style="text-align: center;" data-guia="{{ $local->guia }}"
                data-factura="{{ $local->factura }}">
                <td style="border: 1px solid #9FAACC;">{{ $local->guia }}</td>
                <td style="border: 1px solid #9FAACC;">{{ $local->operador }}</td>
                <td style="border: 1px solid #9FAACC;">{{ $local->cliente }}</td>
                <td style="border: 1px solid #9FAACC;">{{ $local->trayecto }}</td>
                <td style="border: 1px solid #9FAACC;">{{ $local->peso }}</td>
                <td style="border: 1px solid #9FAACC;">${{ number_format($local->original, 0, ',', '.') }}</td>
                <td style="border: 1px solid #9FAACC;">${{ number_format($local->total, 0, ',', '.') }}</td>
                <td style="border: 1px solid #9FAACC;">${{ number_format($local->dif, 0, ',', '.') }}</td>
                <td style="border: 1px solid #9FAACC;">{{ $local->factura }}</td>                
            </tr>
        @endforeach
    </tbody>
</table>
