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
                @can('bancos') 
                <div class="d-flex align-items-center">
                    <a class="btn btn-dark py-2 mr-2" id="btnPagarBulk" style="font-size: 12px;font-family: Titillium Web;font-weight: 700; margin-right:10px;" href="javascript:void(0);">
                        <svg class="me-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="16px" height="16px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#E7E8E3;" d="M512,402.282c0,16.716-13.55,30.267-30.265,30.267H30.265C13.55,432.549,0,418.996,0,402.282V109.717 c0-16.716,13.55-30.266,30.265-30.266h451.469c16.716,0,30.265,13.551,30.265,30.266L512,402.282L512,402.282z"></path> <rect y="148.13" style="fill:#34495E;" width="512" height="72.01"></rect> <rect y="220.16" style="fill:#FFFFFF;" width="512" height="44.555"></rect> <path style="opacity:0.15;fill:#202121;enable-background:new ;" d="M21.517,402.282V109.717 c0-16.716,13.552-30.266,30.267-30.266h-21.52C13.55,79.451,0,93.003,0,109.717v292.565c0,16.716,13.55,30.267,30.265,30.267h21.52 C35.07,432.549,21.517,418.996,21.517,402.282z"></path> <path style="fill:#EA001B;" d="M374.957,348.191c0-15.018,6.92-28.418,17.742-37.193c-8.227-6.669-18.705-10.669-30.12-10.669 c-26.433,0-47.861,21.428-47.861,47.862s21.428,47.862,47.861,47.862c11.415,0,21.894-3.999,30.12-10.669 C381.876,376.609,374.957,363.209,374.957,348.191z"></path> <path style="fill:#F79F1A;" d="M422.817,300.329c-11.415,0-21.894,3.999-30.119,10.669c10.824,8.775,17.741,22.175,17.741,37.193 s-6.918,28.418-17.741,37.193c8.227,6.669,18.705,10.669,30.119,10.669c26.435,0,47.863-21.428,47.863-47.862 C470.68,321.757,449.252,300.329,422.817,300.329z"></path> <path style="fill:#FF5F01;" d="M410.439,348.191c0-15.018-6.918-28.418-17.741-37.193c-10.822,8.775-17.742,22.175-17.742,37.193 s6.92,28.418,17.742,37.193C403.522,376.609,410.439,363.209,410.439,348.191z"></path> <g> <path style="fill:#FFFFFF;" d="M160.063,322.723H55.437c-4.611,0-8.348-3.736-8.348-8.348c0-4.611,3.736-8.348,8.348-8.348h104.626 c4.611,0,8.348,3.736,8.348,8.348S164.674,322.723,160.063,322.723z"></path> <path style="fill:#FFFFFF;" d="M160.063,357.422H55.437c-4.611,0-8.348-3.736-8.348-8.348s3.736-8.348,8.348-8.348h104.626 c4.611,0,8.348,3.736,8.348,8.348S164.674,357.422,160.063,357.422z"></path> <path style="fill:#FFFFFF;" d="M160.063,392.121H55.437c-4.611,0-8.348-3.736-8.348-8.348c0-4.611,3.736-8.348,8.348-8.348h104.626 c4.611,0,8.348,3.736,8.348,8.348C168.411,388.383,164.674,392.121,160.063,392.121z"></path> </g> </g></svg>
                        PAGAR
                    </a>
                    <a class="btn btn-primary py-2" id="btnArchivoPlano" style="font-size: 12px;font-family: Titillium Web;font-weight: 700;" href="javascript:void(0);">
                        <svg class="me-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="16px" height="16px" fill="#000000" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon style="fill:#CFDCE5;" points="343.754,75.864 413.408,75.864 413.408,512 98.593,512 98.593,75.864 168.234,75.864 "></polygon> <polygon style="fill:#FF6F52;" points="255.999,0 180.391,94.832 218.755,94.832 218.755,175.93 293.241,175.93 293.241,94.832 331.606,94.832 "></polygon> <g> <rect x="157.018" y="206.045" style="fill:#314A5F;" width="28.793" height="17.998"></rect> <rect x="203.801" y="206.045" style="fill:#314A5F;" width="151.174" height="17.998"></rect> <rect x="157.018" y="253.201" style="fill:#314A5F;" width="102.579" height="17.998"></rect> <rect x="277.594" y="253.201" style="fill:#314A5F;" width="77.393" height="17.998"></rect> <rect x="157.018" y="300.344" style="fill:#314A5F;" width="197.97" height="17.998"></rect> <rect x="157.018" y="347.5" style="fill:#314A5F;" width="64.194" height="17.998"></rect> <rect x="239.198" y="347.5" style="fill:#314A5F;" width="115.777" height="17.998"></rect> <rect x="279.394" y="441.787" style="fill:#314A5F;" width="75.591" height="17.998"></rect> </g> </g></svg>
                        ARCHIVO PLANO
                    </a>
                </div>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                @can('bancos')
                                <th class="celdas text-center" style="border: 1px solid #0c213a;">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                </th>
                                @endcan
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
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TELEFONO SALDO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">COSTO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">VALOR ANTICIPO</th>                               
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">EXTRA</th>                                
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RETEFUENTE</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RETEICA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SEGURO</th>                                
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">VALOR SALDO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">OTRAS DEDUCCIONES</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SALDO TOTAL</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">ESTADO SALDO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">NOTAS DEDUCCIONES</th>                                
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">
                                    @can('bancos')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <input class="form-check-input row-checkbox" type="checkbox" value="{{ $diario->id }}">
                                    </td>
                                    @endcan
                                    <td class="celdas" style="color: #021526; font-weight: bold; border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->razon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_cargue }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_envio }}</td>                                    
                                    <td class="celdas fecha-tentativa" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;" data-fecha-envio="{{ $diario->fecha_envio }}">{{ $diario->fecha_tentativa }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->centro_costo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->origen) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->destino) }}</td>
                                    <td class="celdas fw-bold" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;color: #021526;">{{ $diario->placa }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strToUpper($diario->conductor) }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_vehiculo }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->pagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cpagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tpagsal }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->valor_a_pagar, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->costo_tiposerv, 0, ',', '.') }}</td>                                                                        
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->retefuente, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->reteica, 0, ',', '.') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ number_format($diario->seguro, 0, ',', '.') }}</td>                                    
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
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC; padding-top:10px; padding-bottom:10px;">
                                        <span class="badge {{ $diario->pagado ? 'bg-green' : 'bg-orange' }}" style="font-weight:600;">
                                            {{ $diario->pagado ? 'PAGADO' : 'PENDIENTE POR PAGAR' }}
                                        </span>
                                    </td>

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
        </script>
    @endif

<script>
$(document).ready(function() {
    // 1. Maestro checkbox synchronizer
    $('#selectAll').change(function() {
        var isChecked = $(this).prop('checked');
        $('.row-checkbox').prop('checked', isChecked);
    });

    // 2. If row checkbox unchecked, uncheck maestro
    $('.row-checkbox').change(function() {
        if (!$(this).prop('checked')) {
            $('#selectAll').prop('checked', false);
        } else {
            // Check if all rows are selected to re-check master
            if ($('.row-checkbox:checked').length === $('.row-checkbox').length) {
                $('#selectAll').prop('checked', true);
            }
        }
    });

    // 3. Pagar bulk action
    $('#btnPagarBulk').click(function(e) {
        e.preventDefault();
        
        var selectedIds = [];
        $('.row-checkbox:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Debe seleccionar al menos un registro para pagar.'
            });
            return;
        }

        Swal.fire({
            title: '¿Está seguro de pagar los registros seleccionados?',
            text: "Se marcarán como pagados " + selectedIds.length + " registro(s)",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, pagar',
            cancelButtonText: 'Cancelar',
            customClass: {
                confirmButton: 'btn',
                cancelButton: 'btn'
            },
            didOpen: () => {
                const confirmBtn = Swal.getConfirmButton();
                const cancelBtn = Swal.getCancelButton();
                confirmBtn.style.setProperty('background-color', '#FE252D', 'important');
                confirmBtn.style.setProperty('border-color', '#FE252D', 'important');
                confirmBtn.style.setProperty('color', '#ffffff', 'important');
                
                cancelBtn.style.setProperty('background-color', '#758A93', 'important');
                cancelBtn.style.setProperty('border-color', '#758A93', 'important');
                cancelBtn.style.setProperty('color', '#ffffff', 'important');
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // disable button to prevent double clicks
                $('#btnPagarBulk').addClass('disabled').html('<i class="ti ti-loader fa-spin me-2"></i> PROCESANDO...');
                
                $.ajax({
                    url: '{{ route("solicitud.pagarSaldos") }}',
                    type: 'POST',
                    data: {
                        ids: selectedIds,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: '¡Pagados!',
                                text: 'Los registros se han actualizado correctamente.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: true
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            $('#btnPagarBulk').removeClass('disabled').html('<i class="ti ti-credit-card me-2"></i> PAGAR');
                            Swal.fire('Error', response.message || 'Error desconocido', 'error');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error AJAX:', textStatus, errorThrown);
                        $('#btnPagarBulk').removeClass('disabled').html('<i class="ti ti-credit-card me-2"></i> PAGAR');
                        Swal.fire('Error', 'Hubo un problema de conexión al procesar los pagos.', 'error');
                    }
                });
            }
        });
    });

    // 4. Archivo plano download
    $('#btnArchivoPlano').click(function(e) {
        e.preventDefault();

        var selectedIds = [];
        $('.row-checkbox:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Debe seleccionar al menos un registro para generar el archivo plano.'
            });
            return;
        }

        // Create a hidden form to POST and trigger the file download
        var form = $('<form>', {
            method: 'POST',
            action: '{{ route("solicitud.archivoPlano") }}'
        });

        form.append($('<input>', { type: 'hidden', name: '_token', value: '{{ csrf_token() }}' }));

        selectedIds.forEach(function(id) {
            form.append($('<input>', { type: 'hidden', name: 'ids[]', value: id }));
        });

        $('body').append(form);
        form.submit();
        form.remove();
    });
});
</script>

<x-footer />