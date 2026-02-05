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
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.50959 2C4.01895 2 1.99988 4.01907 1.99988 6.50971V17.4903C1.99988 19.9809 4.01895 22 6.50959 22H11.8499C12.3191 22 12.6994 21.6197 12.6994 21.1505C12.6994 20.6813 12.3191 20.301 11.8499 20.301H6.50959C4.9573 20.301 3.69892 19.0426 3.69892 17.4903V6.50971C3.69892 4.95742 4.9573 3.69904 6.50959 3.69904H17.1902C18.7425 3.69904 20.0008 4.95742 20.0008 6.50971V12C20.0008 12.4692 20.3812 12.8495 20.8504 12.8495C21.3195 12.8495 21.6999 12.4692 21.6999 12V6.50971C21.6999 4.01907 19.6808 2 17.1902 2H6.50959ZM7.00245 11.1503C6.53327 11.1503 6.15293 11.5306 6.15293 11.9998C6.15293 12.469 6.53327 12.8493 7.00245 12.8493H10.0016C10.4708 12.8493 10.8511 12.469 10.8511 11.9998C10.8511 11.5306 10.4708 11.1503 10.0016 11.1503H7.00245ZM6.15293 8.00201C6.15293 7.53283 6.53327 7.15248 7.00245 7.15248H12.9991C13.4683 7.15248 13.8486 7.53283 13.8486 8.00201C13.8486 8.47119 13.4683 8.85153 12.9991 8.85153H7.00245C6.53327 8.85153 6.15293 8.47119 6.15293 8.00201ZM19.4325 13.2912C18.9054 12.7553 18.0508 12.7553 17.5237 13.2912L13.7673 17.1101C13.4779 17.4044 13.3355 17.8162 13.38 18.2297L13.5949 20.2252C13.6508 20.7447 14.0542 21.1549 14.5652 21.2117L16.528 21.4301C16.9348 21.4754 17.3398 21.3306 17.6292 21.0364L21.3856 17.2174C21.9126 16.6815 21.9126 15.8127 21.3856 15.2768L19.4325 13.2912ZM15.0725 18.2059L18.4781 14.7435L19.9571 16.2471L16.5515 19.7095L15.2184 19.5612L15.0725 18.2059Z" fill="#FF2029" /></g></svg>
                <h4 class="card-title" style="margin-left: 10px;">CREAR SOLICITUD DE SERVICIO</h4>
            </div><!--end card-header-->
            <div class="card-body">


                <form id="solicitudForm" class="form-horizontal form-wizard-wrapper" action="{{ url('/solicitud') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <!--container 1-->
                    <div class="container">
                        <div class="row gx-1 justify-content-between py-4">

                            <div class="col-lg-2 col-md-12">
                                <div class="form-floating mb-3">
                                    <input style="text-align: right" type="text" class="form-control"
                                        id="fecha_solicitud" name="fecha_solicitud"
                                        value="{{ now()->setTimezone('America/Bogota')->format('Y-m-d H:i:s') }}"
                                        placeholder="name@example.com" readonly autocomplete="off">

                                    <label for="fecha_solicitud">Fecha de solicitud</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input style="text-align: right" type="text" class="form-control" id="date"
                                        name="fecha_cargue" readonly autocomplete="off">
                                    <label for="fecha_cargue">Fecha de cargue</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input style="text-align: right" type="text" class="form-control" id="timepikcr"
                                        name="hora_cargue" readonly autocomplete="off">
                                    <label for="hora_cargue">Hora de cargue</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input style="text-align: right" type="text" class="form-control" id="date"
                                        name="fecha_descargue" readonly autocomplete="off">
                                    <label for="fecha_descargue">Fecha de descargue</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input style="text-align: right" type="text" class="form-control" id="timepikcr"
                                        name="hora_descargue" readonly autocomplete="off">
                                    <label for="hora_descargue">Hora de descargue</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--container 2-->
                    <div class="container">
                        <div class="row gx-1 justify-content-between">

                            <div class="col-lg-2 col-md-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="cliente" name="cliente" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->nombre }}">{{ $cliente->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label for="cliente">Cliente</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="origen" name="origen" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($municipios as $municipio)
                                            <option value="{{ $municipio->municipio }}">{{ $municipio->municipio }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="origen">Origen</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="destino" name="destino" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($municipios as $municipio)
                                            <option value="{{ $municipio->municipio }}">{{ $municipio->municipio }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="destino">Destino</label>
                                </div>
                            </div>                            

                            <div class="col-lg-2 col-md-3">                                
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="tipo_trayecto" name="tipo_trayecto" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>URBANO</option>
                                        <option>NACIONAL</option>                                        
                                        <option>MUNICIPAL</option>                                        
                                        <option>TRAYECTO ESPECIAL</option>                                        
                                    </select>
                                    <label for="ejecutivo">Tipo de trayecto</label>
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
                                    <label for="tipo_vehiculo">Tipo de vehículo</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <br>
                    <!--container 3-->
                    <div class="container">
                        <div class="row gx-1 justify-content-between">

                            <div class="col-lg-2 col-md-3">                                
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="carroceria" name="carroceria" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>CARROZADO</option>                                        
                                        <option>FURGONADO</option>
                                        <option>MOTO</option>                   
                                        <option>PLANCHON</option>
                                        <option>PORTACONTENEDOR</option>
                                    </select>
                                    <label for="ejecutivo">Tipo de carrocería</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-2 col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="documento_cliente" name="documento_cliente">
                                    <label for="cliente">Documento cliente</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="destinatario" name="destinatario">
                                    <label for="cliente">Destinatario</label>                                    
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                    <label for="cliente">Direccion</label>                                    
                                </div>
                            </div>                            

                            <div class="col-lg-2 col-md-3">                                
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="piezas" name="piezas">
                                    <label for="cliente">Piezas</label>                                    
                                </div>
                            </div>

                            

                        </div>
                    </div>

                    <div class="container">
                        <div class="row gx-1 justify-content-between py-4">                            

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="peso" name="peso">
                                    <label for="cliente">Peso (Kg)</label>                                    
                                </div>
                            </div>
                           
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="valor_declarado" name="valor_declarado">
                                    <label for="ejecutivo">$ Valor declarado</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="ejecutivo" name="ejecutivo" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>Derney Santana</option>
                                        <option>GLE</option>
                                        <option>Jessica Motta</option>
                                        <option>Juan Medina</option>
                                        <option>Maicol Palomino</option>
                                        <option>Martha Duarte</option>
                                    </select>
                                    <label for="ejecutivo">Ejecutivo de cuenta</label>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-6">
                                <div class="form-floating mb-3">
                                    <textarea name="observaciones" id="textarea" class="form-control" maxlength="255" rows="4"
                                        autocomplete="off" placeholder="This textarea has a limit of 225 chars."></textarea>
                                    <label for="fecha_solicitud">Observaciones</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-6 pt-4">
                                <div class="button-items" style="text-align: right">
                                    <button type="submit" class="btn btn-outline-primary py-2"><i
                                            class="mdi mdi-content-save-all me-2"></i>Guardar</button>
                                    <a class="btn btn-outline-secondary py-2"
                                        href="{{ route('solicitud.create') }}"><i
                                            class="mdi mdi-backspace me-2"></i>Cancelar</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </form><!--end form-->


                @if (session('success'))
                    <script>
                        Swal.fire("Solicitud creada correctamente!").then((result) => {
                            if (result.isConfirmed) {
                                window.location = "/solicitud";
                            }
                        });
                    </script>
                @endif

            </div>
        </div>
    </div>
</div>

<footer class="footer text-center text-sm-start">
    &copy;
    <script>
        document.write(new Date().getFullYear())
    </script> Prefactura
    <span class="text-muted d-none d-sm-inline-block float-end"><span class="text-danger">GLE </span> Grupo Logístico
        Especializado </span>
    {{-- <i
            class="mdi mdi-heart text-danger"></i> --}}
</footer><!--end footer-->
</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('solicitudForm');
        
        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                
                try {
                    const response = await fetch('{{ url('/solicitud') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });

                    if (response.ok) {
                        Swal.fire({
                            title: "¡Éxito!",
                            text: "Solicitud creada correctamente",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then(() => {
                            window.location = "/solicitud";
                        });
                    } else {
                        const contentType = response.headers.get('content-type');
                        
                        if (response.status === 422 && contentType && contentType.includes('application/json')) {
                            const errors = await response.json();
                            let errorMessages = '';
                            
                            document.querySelectorAll('.form-control, .form-select').forEach(el => {
                                el.classList.remove('is-invalid');
                            });

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
                            let errorText = 'Hubo un error al guardar la solicitud';
                            try {
                                const data = await response.json();
                                if (data.message) {
                                    errorText = data.message;
                                }
                            } catch (e) {}

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

        document.getElementById('valor_declarado').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            value = Number(value).toLocaleString('es');
            e.target.value = value;
        });
    });
</script>

<!-- jQuery  -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Plugins js -->

<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('plugins/huebee/huebee.pkgd.min.js') }}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.forms-advanced.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- Flatpickr JS -->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr.js') }}"></script>
