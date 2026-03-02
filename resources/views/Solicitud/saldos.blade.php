<x-header />
<style>.celdas {    
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #656C82;    
    }

    /* Freeze first column */
    #example th:nth-child(1),
    #example td:nth-child(1) {
        position: sticky;
        left: 0;
        z-index: 10 !important;
        background-clip: padding-box;
    }

    /* Handle backgrounds for sticky header */
    #example thead th:nth-child(1) {
        background-color: #212529 !important; /* Table dark header */
        z-index: 11 !important; /* Higher than body cells */
    }

    /* Handle backgrounds for striped sticky body rows */
    #example tbody tr:nth-of-type(odd) td:nth-child(1) {
        background-color: #f2f2f2 !important; 
    }
    #example tbody tr:nth-of-type(even) td:nth-child(1) {
        background-color: #ffffff !important;
    }
</style>

<!-- Sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg height="28px" width="28px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFFFFF;" d="M256,504C119.033,504,8,392.967,8,256S119.033,8,256,8s248,111.033,248,248 C503.846,392.902,392.902,503.846,256,504z"></path> <path style="fill:#E21B1B;" d="M256,16c132.549,0,240,107.451,240,240s-107.452,240-240,240S16,388.548,16,256 C16.15,123.514,123.514,16.15,256,16 M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z"></path> <path style="fill:#FFFFFF;" d="M256,467.896c-117.027,0-211.896-94.869-211.896-211.896S138.973,44.104,256,44.104 S467.896,138.973,467.896,256l0,0C467.764,372.972,372.972,467.764,256,467.896z"></path> <path style="fill:#CCCCCC;" d="M256,48.104c114.818,0,207.896,93.078,207.896,207.896S370.818,463.897,256,463.897 S48.104,370.818,48.104,256C48.232,141.235,141.235,48.232,256,48.104 M256,40.104c-119.237,0-215.896,96.66-215.896,215.896 S136.764,471.897,256,471.897S471.897,375.237,471.897,256l0,0C471.896,136.764,375.236,40.104,256,40.104z"></path> <path d="M294.912,133.521c-67.647-26.686-144.119,6.519-170.806,74.166s6.519,144.119,74.166,170.806 c67.647,26.686,144.119-6.519,170.806-74.166c6.071-15.388,9.187-31.783,9.187-48.325H246.593L294.912,133.521z"></path> <path style="fill:#E21B1B;" d="M321.96,124.328l-43.56,110.384h118.68C397.075,185.985,367.286,142.213,321.96,124.328z"></path> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">SALDOS</h4>
                </div>               

                <a class="btn btn-outline-primary py-2" style="font-size: 12px;font-family: Titillium Web;font-weight: 700;" href="#">
                    <svg width="16" height="16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832" y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse"> <stop offset="0" stop-color="#18884f" /> <stop offset="0.5" stop-color="#117e43" /> <stop offset="1" stop-color="#0b6631" /> </linearGradient> </defs> <title>file_type_excel</title> <path d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z" style="fill:#185c37" /> <path d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z" style="fill:#21a366" /> <path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41" /> <path d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z" style="opacity:0.10000000149011612;isolation:isolate" /> <path d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z" style="fill:url(#a)" /> <path d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z" style="fill:#fff" /> <path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481" /> <path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41" /> </svg>
                    <i class="me-2"></i>
                    DESCARGAR
                </a>
            </div>            

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">FECHA CARGUE</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">FECHA ENVIO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">FECHA TENTATIVA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CLIENTE</th>                                
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CENTRO DE COSTO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CONDUCTOR</th>                                
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TIPO DE VEHICULO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PAGAR SALDO A</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA SALDO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">EXTRA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RETEFUENTE</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RETEICA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SEGURO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">VALOR A PAGAR</th>                               
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">VALOR SALDO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">OTRAS DEDUCCIONES</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SALDO TOTAL</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">NOTAS DEDUCCIONES</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">                                                                        
                                    <td class="celdas" style="color: #000; font-weight: bold; border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->razon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_cargue }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_envio }}</td>                                    
                                    <td class="celdas fecha-tentativa" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;" data-fecha-envio="{{ $diario->fecha_envio }}">{{ $diario->fecha_tentativa }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->centro_costo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->origen) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->destino) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $claseBoton = $diario->placa ? 'btn btn-warning py-0 px-2 fw-bold f-6' : '';
                                        @endphp
                                        <a href="#" class="{{ $claseBoton }}">{{ $diario->placa }}</a>  
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->conductor) }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_vehiculo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_tiposerv, 0, ',', '.') }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->retefuente, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->reteica, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->seguro, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_a_pagar, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_saldo, 0, ',', '.') }}</td>
                                    @can('deducir')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editable-deducciones" data-type="text" data-name="deducciones" data-pk="{{$diario->id}}">
                                            {{ number_format($diario->deducciones, 0, ',', '.') }}
                                        </a>
                                    </td>
                                    @else
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->deducciones, 0, ',', '.') }}</td>
                                    @endcan
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->saldo_total, 0, ',', '.') }}</td>
                                    @can('deducir')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editable-notasded" data-type="text" data-name="notasded" data-pk="{{$diario->id}}">
                                            {{ $diario->notasded }}
                                        </a>
                                    </td>
                                    @else
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->notasded) }}</td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table><!--end /table-->
                </div><!--end /tableresponsive-->               
           
            </div>
        </div>
    </div>
</div>

<!-- Inicio modal notas cargue -->
<div class="modal fade" id="exampleModalCenter9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Evento: </h6>
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FFFFFF">Notas de cargue</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn3" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" name="antuser" value="{{$userName}}" readonly>
                                <label>Usuario</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control" name="antdate" value="" autocomplete="off">
                                <label>Fecha y hora</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="floatingTextarea2" name="antnote" autocomplete="off" style="height: 100px"></textarea>
                                <label>Observación evento</label>
                            </div>
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<!-- Inicio modal DATOS -->
<div class="modal fade" id="exampleModalCenter15" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Editar</h6>                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn4" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" name="egreso_anticipo" autocomplete="off">
                                <label for="floatingPassword">Egreso anticipo</label>
                            </div> 
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" name="egreso_saldo" autocomplete="off">
                                <label for="floatingPassword">Egreso saldo</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="date" class="form-control" name="fecha_saldo" autocomplete="off">
                                <label for="floatingPassword">Fecha de pago saldo</label>
                            </div>                                         
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter9');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acción del formulario
            var routeTemplate = '{{ route('solicitud.update9', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acción del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acción del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter13');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acción del formulario
            var routeTemplate = '{{ route('solicitud.update13', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acción del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acción del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter15');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acción del formulario
            var routeTemplate = '{{ route('solicitud.update15', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acción del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acción del formulario
        });
    });
</script>

<script> 
$(document).ready(function() {
        $('#examplex').DataTable({
            responsive: true,
            autoWidth: false,
            paging: false,
            info: false,
            "order": [[1, "desc"]],
            "language": {               
                "search": "Buscar:",                
            }
        });
    });

    $.fn.editable.defaults.mode = "inline";
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editable').editable({
        url:"/solicitud/update",
        type: 'text',
        emptytext: 'Sin datos',
        //inputclass: 'form-control',
        success: function(response, newValue) {
            if (response.success) {
                // Actualizar solo el valor del enlace editable
                $(this).text(newValue);                
            } 
        } 
    });

    // Iniciar x-editable para notas de deducción
    $('.editable-notasded').editable({
        url:"/solicitud/update",
        type: 'text',
        emptytext: 'Sin notas',
        success: function(response, newValue) {
            if (response.success) {
                $(this).text(newValue);
            }
        }
    });

    // Iniciar x-editable para valores de deducción con validación cruzada
    $('.editable-deducciones').editable({
        url:"/solicitud/update",
        type: 'text',
        emptytext: '0',
        validate: function(value) {
            // Leer el ID de la fila actual que estamos editando
            var idFila = $(this).data('pk');
            
            // Buscar en el DOM el valor *actual* text() o value del elemento hermano 'notasded' con el mismo ID
            var valorNotitas = $('.editable-notasded[data-pk="' + idFila + '"]').text().trim();
            
            // Requerir que las notas no estén vacías ni contengan el texto de predeterminado (placeholder)
            if (!valorNotitas || valorNotitas === 'Sin notas' || valorNotitas.toLowerCase() === 'empty') {
                return 'Debe ingresar primero la justificación en NOTAS DEDUCCIONES.';
            }

            // Normalizar valor numerico para forzar x-editable a que solo envíe digitos o puntos
            var regexp = /^[0-9.,]+$/;
            if(!regexp.test(value)) {
                return 'Este campo sólo admite números y puntos/comas.';
            }
        },
        success: function(response, newValue) {
            if (response.success) {
                // Agregar máscara de miles simple (opcional visualmente posterior al ajax)
                var numerico = newValue.replace(/\./g, '');
                $(this).text(new Intl.NumberFormat('es-CO').format(numerico));
                
                // Forzar recarga de página para recalcular SALDO TOTAL automáticamente mediante PHP
                setTimeout(function(){ location.reload(); }, 500);
            }
        }
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const festivos = @json($festivos).map(f => new Date(f + 'T00:00:00')); // Convertir a Date y normalizar a medianoche
        const diasParaSumar = 15;

        function esFestivo(fecha) {
            return festivos.some(f => f.getTime() === fecha.getTime());
        }

        function sumarDiasSinFestivos(fecha, dias) {
            let contadorDias = 0;
            while (contadorDias < dias) {
                fecha.setDate(fecha.getDate() + 1);
                if (!esFestivo(fecha)) {
                    contadorDias++;
                }
            }
            return fecha;
        }

        const elementosFechaTentativa = document.querySelectorAll('.fecha-tentativa');
        elementosFechaTentativa.forEach(function (elemento) {
            const fechaEnvio = new Date(elemento.getAttribute('data-fecha-envio') + 'T00:00:00');
            const fechaTentativa = sumarDiasSinFestivos(new Date(fechaEnvio), diasParaSumar);
            elemento.textContent = fechaTentativa.toISOString().split('T')[0];
        });
    });
</script>

<script>
    $('.editablef').on('click', function(e) {
    e.preventDefault(); // Evita la acción predeterminada del enlace

    var pk = $(this).data('pk');  // Obtén el ID del registro
    var url = '/solicitud/' + pk + '/update14';  // URL para la actualización

    // Realiza la solicitud AJAX para cambiar el valor
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            enviado: 'SI',  // Enviar el valor "SI" directamente
            _method: 'PUT',   // Método PUT para la actualización
            _token: '{{ csrf_token() }}' // Asegurarse de enviar el token CSRF
        },
        success: function(response) {
            if (response.success) {
                // Actualiza el texto del enlace editable
                $(e.target).text('SI').removeClass('bg-secondary').addClass('bg-info');
                location.reload();
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
    $('.editableg').on('click', function(e) {
    e.preventDefault(); // Evita la acción predeterminada del enlace

    var pk = $(this).data('pk');  // Obtén el ID del registro
    var url = '/solicitud/' + pk + '/update16';  // URL para la actualización

    // Realiza la solicitud AJAX para cambiar el valor
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            enviado: 'SI',  // Enviar el valor "SI" directamente
            _method: 'PUT',   // Método PUT para la actualización
            _token: '{{ csrf_token() }}' // Asegurarse de enviar el token CSRF
        },
        success: function(response) {
            if (response.success) {
                // Actualiza el texto del enlace editable
                $(e.target).text('SI').removeClass('bg-secondary').addClass('bg-info');
                location.reload();
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

@if(session('success'))
        <script>
            Swal.fire("Actualización correcta").then((result) => {
                if (result.isConfirmed) {
                    window.location = "/saldos";
                }
            });
        </script>
    @endif

<x-footer />