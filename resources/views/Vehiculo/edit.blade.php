<x-header />

@if (count($errors) > 0)
    <div class="box-body">
        <div class="bg-red-50 border border-red-200 alert mb-0" role="alert">
            <div class="flex">
                <div class="ltr:ml-2 rtl:mr-2">
                    <div class="alert alert-danger border-0" role="alert">
                        <strong>Atención!</strong> Se ha presentado un problema al tratar de ingresar sus datos.
                    </div>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc space-y-1 ltr:pl-5 rtl:pr-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if (session('error'))
    <div class="box-body">
        <div class="bg-red-50 border border-red-200 alert mb-0" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-4 w-4 text-red-400 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                    </svg>
                </div>
                <div class="ltr:ml-2 rtl:mr-2">
                    <h3 class="text-sm text-red-800 font-semibold">
                        {{ session('error') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex m-2 py-3">
                <svg fill="#FE252D" height="26px" width="26px" version="1.1" id="Capa_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 488.326 488.326" xml:space="preserve" stroke="#FE252D">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <g>
                                <path
                                    d="M473.6,279.713v-42.9c0-15.8-13-29.3-29.3-29.3l-38.9-3.4l-34.4-51.9c-0.6-0.6-0.6-1.1-1.1-1.7 c-5.1-7.3-14.1-12.4-23.7-12.4h-73.3H133.6c-14.7,0-27.1,11.3-28.8,25.4h-93c-6.2,0-11.8,5.1-11.8,11.8c0,6.2,5.1,11.8,11.8,11.8 h106.6c0.6,0,1.1,0,1.7,0c5.6,0.6,10.1,5.6,10.1,11.3c0,6.2-5.1,11.8-11.8,11.8h-14.1H40c-6.2,0-11.8,5.1-11.8,11.8 c0,6.2,5.1,11.8,11.8,11.8h64.3h52.4c6.2,0,11.8,5.1,11.8,11.8c0,6.2-5.1,11.8-11.8,11.8h-52.4H73.8c-6.2,0-11.8,5.1-11.8,11.8 c0,6.2,5.1,11.8,11.8,11.8h30.4c-7.3,1.7-12.4,8.5-12.4,16.4v21.4c0,9,7.3,16.9,16.9,16.9h23.7c5.1,18.6,22.6,32.7,42.9,32.7 s37.8-13.2,42.8-32.3h54.1h92.5c5.1,18.6,22.6,32.7,42.9,32.7s37.8-13.5,42.9-32.7h20.9c9,0,16.9-7.3,16.9-16.9v-21.4 C488.8,287.613,482,280.213,473.6,279.713z M175.3,344.013c-12.4,0-22.6-10.1-22.6-22.6s10.1-22.6,22.6-22.6 c12.4,0,22.6,10.1,22.6,22.6S187.7,344.013,175.3,344.013z M408.2,344.013c-12.4,0-22.6-10.1-22.6-22.6s10.1-22.6,22.6-22.6 c12.4,0,22.6,10.1,22.6,22.6S420.6,344.013,408.2,344.013z">
                                </path>
                                <path
                                    d="M210,422.013l-52.7-30.4c-2.7-1.6-6.2,0.4-6.2,3.6v16.7H73.3c-21.1,0-38.2-17.1-38.2-38.2v-40.1H7.6v40.1 c0,36.2,29.5,65.7,65.7,65.7h77.9v16.7c0,3.2,3.4,5.2,6.2,3.6l52.7-30.4C212.8,427.613,212.8,423.613,210,422.013z">
                                </path>
                                <path
                                    d="M251.1,66.213l52.7,30.4c2.7,1.6,6.2-0.4,6.2-3.6v-16.6h77.9c21.1,0,38.2,17.1,38.2,38.2v40.1h27.5v-40.1 c0-36.2-29.5-65.7-65.7-65.7H310v-16.7c0-3.2-3.4-5.2-6.2-3.6l-52.7,30.4C248.4,60.613,248.4,64.613,251.1,66.213z">
                                </path>
                            </g>
                        </g>
                    </g>
                </svg>
                <h4 class="card-title" style="margin-left: 10px;">EDITAR VEHICULO</h4>
            </div>
            <div class="card-body">

                <form class="form-horizontal form-wizard-wrapper" action="{{ url('/vehiculo/' . $datos->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}

                    {{-- linea 1 --}}
                    <div class="row">
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->placa }}" class="form-control" id="placa"
                                    name="placa" disabled placeholder="name@example.com">
                                <label style="font-size: 11px;">Placa</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="tipo_vehiculo" name="tipo_vehiculo" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->tipo_vehiculo }}</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->tipo }}">{{ $tipo->tipo }}</option>
                                    @endforeach
                                </select>
                                <label style="font-size: 11px;">Tipo vehiculo</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->conductor }}" class="form-control"
                                    id="conductor" name="conductor" placeholder="name@example.com">
                                <label style="font-size: 11px;">Conductor</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->cedula_conductor }}" class="form-control"
                                    id="cedula_conductor" name="cedula_conductor" placeholder="name@example.com">
                                <label style="font-size: 11px;">Documento conductor</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->telefono_conductor }}" class="form-control"
                                    id="telefono_conductor" name="telefono_conductor" placeholder="name@example.com">
                                <label style="font-size: 11px;">Telefono conductor</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="fec_nac_con" name="fec_nac_con"
                                    placeholder="name@example.com">
                                <label style="font-size: 11px;">Fecha nacimiento conductor</label>
                            </div>
                        </div>



                    </div><!--end row-->

                    {{-- linea 2 --}}
                    <div class="row">
                        
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->propietario }}" class="form-control"
                                    id="propietario" name="propietario" placeholder="name@example.com">
                                <label style="font-size: 11px;">Propietario</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->cedpro }}" class="form-control"
                                    id="cedpro" name="cedpro" placeholder="name@example.com">
                                <label style="font-size: 11px;">Documento propietario</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" value="{{ $datos->corpro }}" class="form-control"
                                    id="corpro" name="corpro" placeholder="name@example.com">
                                <label style="font-size: 11px;">Correo propietario</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->dirpro }}" class="form-control"
                                    id="dirpro" name="dirpro" placeholder="name@example.com">
                                <label style="font-size: 11px;">Dirección propietario</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->telpro }}" class="form-control"
                                    id="telpro" name="telpro" placeholder="name@example.com">
                                <label style="font-size: 11px;">Teléfono propietario</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="facele" name="facele" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->facele }}</option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select>
                                <label style="font-size: 11px;">Factura electrónica</label>
                            </div>
                        </div>

                    </div><!--end row-->

                    {{-- linea 3 --}}
                    <div class="row">

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="tenedor" name="tenedor" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->tenedor }}</option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select>
                                <label style="font-size: 11px;">Tenedor</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->nomten }}" class="form-control"
                                    id="nomten" name="nomten" placeholder="name@example.com">
                                <label style="font-size: 11px;">Nombre tenedor</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->cedten }}" class="form-control"
                                    id="cedten" name="cedten" placeholder="name@example.com">
                                <label style="font-size: 11px;">Documento tenedor</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" value="{{ $datos->corten }}" class="form-control"
                                    id="corten" name="corten" placeholder="name@example.com">
                                <label style="font-size: 11px;">Correo tenedor</label>
                            </div>
                        </div>


                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->dirten }}" class="form-control"
                                    id="dirten" name="dirten" placeholder="name@example.com">
                                <label style="font-size: 11px;">Dirección tenedor</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->telten }}" class="form-control"
                                    id="telten" name="telten" placeholder="name@example.com">
                                <label style="font-size: 11px;">Teléfono tenedor</label>
                            </div>
                        </div>

                    </div><!--end row-->

                    {{-- linea 4 --}}
                    <div class="row">

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="pagant" name="pagant" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->pagant }}</option>
                                    <option>CONDUCTOR</option>
                                    <option>PROPIETARIO</option>
                                    <option>TENEDOR</option>
                                </select>
                                <label style="font-size: 11px;">Pagar anticipo a</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="pagsal" name="pagsal" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->pagsal }}</option>
                                    <option>CONDUCTOR</option>
                                    <option>PROPIETARIO</option>
                                    <option>TENEDOR</option>
                                </select>
                                <label style="font-size: 11px;">Pagar saldo a</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="pagcon" name="pagcon" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->pagcon }}</option>
                                    <option>CONDUCTOR</option>
                                    <option>PROPIETARIO</option>
                                    <option>TENEDOR</option>
                                </select>
                                <label style="font-size: 11px;">Pagar contado a</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->usuario_gps }}" class="form-control"
                                    id="usuario_gps" name="usuario_gps" placeholder="name@example.com">
                                <label style="font-size: 11px;">Usuario GPS</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->clave_gps }}" class="form-control"
                                    id="clave_gps" name="clave_gps" placeholder="name@example.com">
                                <label style="font-size: 11px;">Clave GPS</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->empresa_gps }}" class="form-control"
                                    id="empresa_gps" name="empresa_gps" placeholder="name@example.com">
                                <label style="font-size: 11px;">Empresa GPS</label>
                            </div>
                        </div>

                    </div><!--end row-->

                    {{-- linea 5 --}}
                    <div class="row">
                        
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="creado_contable" name="creado_contable"
                                    autocomplete="off" aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->creado_contable }}</option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select>
                                <label style="font-size: 11px;">Creado contable</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->estudio3 }}" class="form-control"
                                    id="estudio3" name="estudio3" placeholder="name@example.com">
                                <label style="font-size: 11px;">Estudio 3+</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="requisitos" name="requisitos" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->requisitos }}</option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select>
                                <label style="font-size: 11px;">Requisitos</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="estudio_seguridad" name="estudio_seguridad"
                                    autocomplete="off" aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->estudio_seguridad }}</option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select>
                                <label style="font-size: 11px;">Estudio seguridad</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="acuerdo_seguridad" name="acuerdo_seguridad"
                                    autocomplete="off" aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->acuerdo_seguridad }}</option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select>
                                <label style="font-size: 11px;">Acuerdo seguridad</label>
                            </div>
                        </div>
                        @can('activacion')
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="evaluacion" name="evaluacion" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>{{ $datos->evaluacion }}</option>
                                        <option>SI</option>
                                        <option>NO</option>
                                    </select>
                                    <label style="font-size: 11px;">Cumple con los compromisos establecidos en el acuerdo
                                        de seguridad</label>
                                </div>
                            </div>
                        @endcan

                    </div><!--end row-->

                    {{-- linea 6 --}}
                    <div class="row">

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->num_chasis }}" class="form-control"
                                    id="num_chasis" name="num_chasis" placeholder="name@example.com">
                                <label style="font-size: 11px;">Numero chasis</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->num_motor }}" class="form-control"
                                    id="num_motor" name="num_motor" placeholder="name@example.com">
                                <label style="font-size: 11px;">Numero motor</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->ano_fabricacion }}" class="form-control"
                                    id="ano_fabricacion" name="ano_fabricacion" placeholder="name@example.com">
                                <label style="font-size: 11px;">Año fabricacion</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->especificacion }}" class="form-control"
                                    id="especificacion" name="especificacion" placeholder="name@example.com">
                                <label style="font-size: 11px;">Especificacion</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="soat" name="soat" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->soat }}</option>
                                    <option>Vigente</option>
                                    <option>Vencido</option>
                                    <option>Sin validar</option>
                                </select>
                                <label style="font-size: 11px;">Soat</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="tecnomecanica" name="tecnomecanica"
                                    autocomplete="off" aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->tecnomecanica }}</option>
                                    <option>Vigente</option>
                                    <option>Vencido</option>
                                    <option>Vehículo nuevo</option>
                                </select>
                                <label style="font-size: 11px;">Tecnomecanica</label>
                            </div>
                        </div>

                        {{-- linea 7 --}}
                        <div class="row">
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="simur" name="simur" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>{{ $datos->simur }}</option>
                                        <option>Presenta siniestros viales</option>
                                        <option>No presenta siniestros viales</option>
                                    </select>
                                    <label style="font-size: 11px;">Simur</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="simit" name="simit" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>{{ $datos->simit }}</option>
                                        <option>Posee multas y/o Infracciones</option>
                                        <option>No posee multas y/o Infracciones</option>
                                    </select>
                                    <label style="font-size: 11px;">Simit</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" value="{{ $datos->infracciones }}" class="form-control"
                                        id="infracciones" name="infracciones" placeholder="name@example.com">
                                    <label style="font-size: 11px;">Infracciones</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-floating mb-3">
                                    <textarea name="observacion" id="textarea" class="form-control" maxlength="255" rows="4" autocomplete="off"
                                        placeholder="This textarea has a limit of 225 chars."></textarea>
                                    <label for="fecha_solicitud">Observaciones: <p style="font-size:8px">
                                            {{ $datos->observacion }}</p></label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-4 pt-4">
                                <div class="button-items" style="text-align: right">
                                    <button type="submit" class="btn btn-outline-primary py-2"><i
                                            class="mdi mdi-content-save-all me-2"></i>Guardar</button>
                                    <a class="btn btn-outline-secondary py-2" href="{{ route('vehiculo.index') }}"><i
                                            class="mdi mdi-backspace me-2"></i>Cancelar</a>
                                </div>
                            </div>
                        </div>
                </form>




            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tenedorSelect = document.getElementById('tenedor');
        const camposTenedor = ['nomten', 'cedten', 'corten', 'dirten', 'telten'];

        // Función para habilitar/deshabilitar campos
        function toggleCamposTenedor() {
            const habilitar = tenedorSelect.value === 'SI';
            camposTenedor.forEach(id => {
                const campo = document.getElementById(id);
                if (campo) {
                    campo.disabled = !habilitar;
                    // Opcional: limpiar el valor si se deshabilita
                    if (!habilitar) campo.value = '';
                }
            });
        }

        // Ejecutar al cargar (por si ya tiene valor cargado desde el backend)
        toggleCamposTenedor();

        // Escuchar cambios
        tenedorSelect.addEventListener('change', toggleCamposTenedor);
    });
</script>


@if (session('success'))
    <script>
        Swal.fire({
            title: "¡Éxito!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/vehiculo";
            }
        });
    </script>
@endif

@if (session('info'))
    <script>
        Swal.fire({
            title: "Información",
            text: "{{ session('info') }}",
            icon: "info",
            confirmButtonText: "Aceptar"
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            title: "¡Error!",
            text: "{{ session('error') }}",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
    </script>
@endif

<x-footer />
