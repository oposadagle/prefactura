<x-header />

<style>
    .is-invalid {
        border-color: #dc3545 !important;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath fill='%23dc3545' d='M8 4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3A.5.5 0 0 0 8 4z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
        padding-right: calc(1.5em + .75rem);
    }
</style>

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
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="24px" height="24px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <rect x="84.722" y="441.952" style="fill:#0E0A57;" width="72.231" height="70.048"></rect> <rect x="353.168" y="441.952" style="fill:#0E0A57;" width="72.22" height="70.048"></rect> </g> <rect x="39.711" style="fill:#FCDED6;" width="432.578" height="374.435"></rect> <g> <path style="fill:#FF7039;" d="M39.711,253.327v-43.035c0-4.661-3.779-8.44-8.44-8.44s-8.44,3.779-8.44,8.44v51.475 c0,4.661,3.779,8.44,8.44,8.44h53.451v-16.879H39.711z"></path> <path style="fill:#FF7039;" d="M472.289,253.327v-43.035c0-4.661,3.779-8.44,8.44-8.44s8.44,3.779,8.44,8.44v51.475 c0,4.661-3.779,8.44-8.44,8.44h-53.451v-16.879H472.289z"></path> </g> <path style="fill:#E42105;" d="M399.146,115.341H112.854c-21.662,0-39.385,17.723-39.385,39.385v178.03l39.115,24.801 l-39.115,16.879v33.758h365.062v-33.758l-39.115-16.879l39.115-24.801v-178.03C438.531,133.064,420.808,115.341,399.146,115.341z"></path> <path style="fill:#FFFFFF;" d="M247.56,132.22H112.854c-12.41,0-22.505,10.096-22.505,22.505v107.042H247.56V132.22z"></path> <path style="fill:#B8DDFF;" d="M399.146,132.22H264.44v129.547h157.212V154.725C421.652,142.316,411.556,132.22,399.146,132.22z"></path> <rect x="73.469" y="408.193" style="fill:#4C7FE1;" width="365.062" height="45.011"></rect> <g> <path style="fill:#FF7039;" d="M168.847,374.435H73.469v-41.68h53.698C150.19,332.755,168.847,351.412,168.847,374.435z"></path> <path style="fill:#FF7039;" d="M438.531,332.755v41.68h-95.378c0-23.023,18.657-41.68,41.68-41.68H438.531z"></path> </g> </g></svg>
                <h4 class="card-title" style="margin-left: 10px;">AGREGAR VEHICULO</h4>
            </div><!--end card-header-->
            <div class="card-body">


                <form class="form-horizontal form-wizard-wrapper" id="vehiculoForm" action="{{ url('/vehiculo') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- linea 1 --}}
                    <div class="row">
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="placa" name="placa"
                                    placeholder="name@example.com">
                                <label style="font-size: 11px;">Placa</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="tipo_vehiculo" name="tipo_vehiculo"
                                    autocomplete="off" aria-label="Floating label select example">
                                    <option selected disabled>Seleccionar</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->tipo }}">{{ $tipo->tipo }}</option>
                                    @endforeach
                                </select>
                                <label style="font-size: 11px;">Tipo vehiculo</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="conductor" name="conductor" placeholder="name@example.com">
                                <label style="font-size: 11px;">Conductor</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="cedula_conductor" name="cedula_conductor" placeholder="name@example.com">
                                <label style="font-size: 11px;">Documento conductor</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
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
                                <input type="text" class="form-control"
                                    id="propietario" name="propietario" placeholder="name@example.com">
                                <label style="font-size: 11px;">Propietario</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="cedpro" name="cedpro" placeholder="name@example.com">
                                <label style="font-size: 11px;">Documento propietario</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control"
                                    id="corpro" name="corpro" placeholder="name@example.com">
                                <label style="font-size: 11px;">Correo propietario</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="dirpro" name="dirpro" placeholder="name@example.com">
                                <label style="font-size: 11px;">Dirección propietario</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="telpro" name="telpro" placeholder="name@example.com">
                                <label style="font-size: 11px;">Teléfono propietario</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="facele" name="facele" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled></option>
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
                                    <option selected disabled></option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select>
                                <label style="font-size: 11px;">Tenedor</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="nomten" name="nomten" placeholder="name@example.com">
                                <label style="font-size: 11px;">Nombre tenedor</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="cedten" name="cedten" placeholder="name@example.com">
                                <label style="font-size: 11px;">Documento tenedor</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control"
                                    id="corten" name="corten" placeholder="name@example.com">
                                <label style="font-size: 11px;">Correo tenedor</label>
                            </div>
                        </div>


                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="dirten" name="dirten" placeholder="name@example.com">
                                <label style="font-size: 11px;">Dirección tenedor</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
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
                                    <option selected disabled></option>
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
                                    <option selected disabled></option>
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
                                    <option selected disabled></option>
                                    <option>CONDUCTOR</option>
                                    <option>PROPIETARIO</option>
                                    <option>TENEDOR</option>
                                </select>
                                <label style="font-size: 11px;">Pagar contado a</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="usuario_gps" name="usuario_gps" placeholder="name@example.com">
                                <label style="font-size: 11px;">Usuario GPS</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="clave_gps" name="clave_gps" placeholder="name@example.com">
                                <label style="font-size: 11px;">Clave GPS</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
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
                                    <option selected disabled></option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select>
                                <label style="font-size: 11px;">Creado contable</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="estudio3" name="estudio3" placeholder="name@example.com">
                                <label style="font-size: 11px;">Estudio 3+</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="requisitos" name="requisitos" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled></option>
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
                                    <option selected disabled></option>
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
                                    <option selected disabled></option>
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
                                        <option selected disabled></option>
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
                                <input type="text" class="form-control"
                                    id="num_chasis" name="num_chasis" placeholder="name@example.com">
                                <label style="font-size: 11px;">Numero chasis</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="num_motor" name="num_motor" placeholder="name@example.com">
                                <label style="font-size: 11px;">Numero motor</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="ano_fabricacion" name="ano_fabricacion" placeholder="name@example.com">
                                <label style="font-size: 11px;">Año fabricacion</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="especificacion" name="especificacion" placeholder="name@example.com">
                                <label style="font-size: 11px;">Especificacion</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="soat" name="soat" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled></option>
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
                                    <option selected disabled></option>
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
                                        <option selected disabled></option>
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
                                        <option selected disabled></option>
                                        <option>Posee multas y/o Infracciones</option>
                                        <option>No posee multas y/o Infracciones</option>
                                    </select>
                                    <label style="font-size: 11px;">Simit</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control"
                                        id="infracciones" name="infracciones" placeholder="name@example.com">
                                    <label style="font-size: 11px;">Infracciones</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-floating mb-3">
                                    <textarea name="observacion" id="textarea" class="form-control" maxlength="255" rows="4" autocomplete="off"
                                        placeholder="This textarea has a limit of 225 chars."></textarea>
                                    <label for="fecha_solicitud">Observaciones: </label>
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

                @if (session('success'))
                    <script>
                        Swal.fire("Vehiculo creado correctamente!").then((result) => {
                            if (result.isConfirmed) {
                                window.location = "/vehiculo";
                            }
                        });
                    </script>
                @endif

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

        // Evento para el formulario
        const form = document.getElementById('vehiculoForm');
        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                
                try {
                    const response = await fetch('{{ url('/vehiculo') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    // Si la respuesta es exitosa (2xx)
                    if (response.ok) {
                        const contentType = response.headers.get('content-type');
                        if (contentType && contentType.includes('application/json')) {
                            const data = await response.json();
                            Swal.fire({
                                title: "¡Éxito!",
                                text: data.message || "Vehículo creado correctamente!",
                                icon: "success",
                                confirmButtonText: "Aceptar"
                            }).then(() => {
                                window.location = "/vehiculo";
                            });
                        } else {
                            // Redirigir normalmente
                            window.location = "/vehiculo";
                        }
                    } else {
                        // Error HTTP (422 = validación, 500 = servidor, etc.)
                        const contentType = response.headers.get('content-type');
                        
                        if (response.status === 422 && contentType && contentType.includes('application/json')) {
                            // Error de validación
                            const errors = await response.json();
                            let errorMessages = '';
                            
                            // Limpiar estilos de error previos
                            document.querySelectorAll('.form-control, .form-select').forEach(el => {
                                el.classList.remove('is-invalid');
                            });

                            // Mostrar errores
                            if (errors.errors) {
                                Object.keys(errors.errors).forEach(field => {
                                    const messages = errors.errors[field];
                                    const fieldElement = document.querySelector(`[name="${field}"]`);
                                    
                                    if (fieldElement) {
                                        fieldElement.classList.add('is-invalid');
                                    }
                                    
                                    errorMessages += '<li>' + messages.join('</li><li>') + '</li>';
                                });
                            }

                            Swal.fire({
                                title: "¡Validación fallida!",
                                html: '<div style="text-align: left;"><ul style="list-style: disc; margin-left: 20px;">' + errorMessages + '</ul></div>',
                                icon: "error",
                                confirmButtonText: "Aceptar",
                                allowOutsideClick: false,
                                width: '500px'
                            });
                        } else {
                            // Error del servidor
                            let errorText = 'Hubo un error al guardar el vehículo';
                            try {
                                const data = await response.json();
                                if (data.message) {
                                    errorText = data.message;
                                }
                            } catch (e) {
                                // No es JSON, usar el texto por defecto
                            }

                            Swal.fire({
                                title: "¡Error!",
                                text: errorText,
                                icon: "error",
                                confirmButtonText: "Aceptar"
                            });
                        }
                    }
                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire({
                        title: "¡Error!",
                        text: "Error de red: " + error.message,
                        icon: "error",
                        confirmButtonText: "Aceptar"
                    });
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
