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
                    <svg fill="#FE252D" height="24px" width="24px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 345 345" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M203.922,233.952H93.189c-12.501,0-22.671-10.17-22.671-22.671v-83.513c0-2.762-2.238-5-5-5H9.356 c-5.159,0-9.356,4.197-9.356,9.356v130.63c0,5.158,4.197,9.355,9.356,9.355H24.41c1.618,0,3.143,0.788,4.079,2.108l25.405,35.859 c0.938,1.323,2.459,2.109,4.08,2.109c1.622,0,3.143-0.786,4.08-2.109l25.403-35.857c0.937-1.321,2.462-2.11,4.081-2.11h108.026 c5.159,0,9.357-4.197,9.357-9.355v-23.803C208.922,236.19,206.684,233.952,203.922,233.952z"></path> <path d="M332.329,32.813H98.189c-6.986,0-12.671,5.684-12.671,12.671v160.798c0,6.986,5.685,12.671,12.671,12.671h132.973 c1.619,0,3.145,0.788,4.08,2.109l33.157,46.801c0.938,1.323,2.459,2.109,4.08,2.109c1.622,0,3.143-0.786,4.08-2.109l33.155-46.8 c0.936-1.321,2.463-2.11,4.081-2.11h18.533c6.985,0,12.671-5.685,12.671-12.671V45.483C345,38.496,339.315,32.813,332.329,32.813z M227.577,166.411v11.15c0,1.156-0.938,2.094-2.093,2.094h-16.049c-1.155,0-2.092-0.938-2.092-2.094v-11.559 c-8.457-2.031-16.275-6.367-21.653-12.047l-3.118-3.294c-0.381-0.403-0.586-0.941-0.572-1.497c0.017-0.554,0.253-1.08,0.654-1.463 l11.657-11.031c0.84-0.794,2.165-0.757,2.958,0.082l3.117,3.294c3.964,4.189,11.004,7.002,17.515,7.002 c5.149,0,13.862-1.36,13.862-6.458c0.036-4.405-1.871-6.174-15.357-10.259c-11.533-3.493-30.834-9.34-30.834-31.07 c0-12.172,8.297-21.852,21.771-25.582V61.737c0-1.156,0.937-2.094,2.092-2.094h16.049c1.155,0,2.093,0.938,2.093,2.094v10.834 c6.972,1.027,13.736,3.429,18.799,6.699l3.809,2.461c0.973,0.628,1.25,1.923,0.621,2.895L242.1,98.105 c-0.627,0.97-1.924,1.249-2.895,0.622l-3.811-2.461c-3.6-2.327-9.936-4.016-15.061-4.016c-5.396,0-14.528,1.477-14.528,7.01 c0,5.204,2.161,7.372,16.465,11.705c11.905,3.605,29.898,9.055,29.729,29.707C251.999,153.786,242.693,163.529,227.577,166.411z"></path> </g> </g></svg>
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
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#CAF4FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> FECHA DE CARGUE</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">FECHA TENTATIVA</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CLIENTE</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CENTRO DE COSTO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CONDUCTOR</th>                                
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TIPO DE VEHICULO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">PAGAR SALDO A</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">CEDULA SALDO</th>
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
                                    <td class="celdas fecha-tentativa" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;" data-fecha-envio="{{ $diario->fecha_envio }}">{{ $diario->fecha_tentativa }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->centro_costo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->origen) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->destino) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $claseBoton = $diario->placa ? 'btn btn-warning py-0 px-2' : '';
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
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->deducciones, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->saldo_total, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->notasded }}</td>
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
            } }, } );
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