<x-header />

<style>
    .dropify-wrapper:hover,
    .dropify-wrapper:focus-within {
        box-shadow: 0 0 0 2px #fefefe;
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
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg width="18" height="18" viewBox="0 0 1024 1024" class="icon" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M768 810.7c-23.6 0-42.7-19.1-42.7-42.7s19.1-42.7 42.7-42.7c94.1 0 170.7-76.6 170.7-170.7 0-89.6-70.1-164.3-159.5-170.1L754 383l-10.7-22.7c-42.2-89.3-133-147-231.3-147s-189.1 57.7-231.3 147L270 383l-25.1 1.6c-89.5 5.8-159.5 80.5-159.5 170.1 0 94.1 76.6 170.7 170.7 170.7 23.6 0 42.7 19.1 42.7 42.7s-19.1 42.7-42.7 42.7c-141.2 0-256-114.8-256-256 0-126.1 92.5-232.5 214.7-252.4C274.8 195.7 388.9 128 512 128s237.2 67.7 297.3 174.2C931.5 322.1 1024 428.6 1024 554.7c0 141.1-114.8 256-256 256z"
                                fill="#ff2029" />
                            <path
                                d="M640 789.3c-10.9 0-21.8-4.2-30.2-12.5L512 679l-97.8 97.8c-16.6 16.7-43.7 16.7-60.3 0-16.7-16.7-16.7-43.7 0-60.3l128-128c16.6-16.7 43.7-16.7 60.3 0l128 128c16.7 16.7 16.7 43.7 0 60.3-8.4 8.4-19.3 12.5-30.2 12.5z"
                                fill="#5F6379" />
                            <path
                                d="M512 960c-23.6 0-42.7-19.1-42.7-42.7V618.7c0-23.6 19.1-42.7 42.7-42.7s42.7 19.1 42.7 42.7v298.7c0 23.5-19.1 42.6-42.7 42.6z"
                                fill="#5F6379" />
                        </g>
                    </svg>
                    <h4 class="card-title" style="margin-left: 10px;">CENTRO DE CARGA DE ARCHIVOS</h4>
                </div>
            </div>

            <div class="container-fluid py-2">
                <div class="row">
                    <!-- Formulario para el archivo GLE -->
                    <div class="col-xl-6">
                        <form id="gle-form" action="{{ route('estado.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Consolidado Facturación GLE</h4>
                                    <p class="text-muted mb-0">Formato de archivo permitido: plano (.txt)</p>
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <input type="file" id="gle" name="gle" class="dropify" />
                                </div><!--end card-body-->
                            </div><!--end card-->
                            <div class="col-lg-12 col-md-6 pb-2" style="text-align: right">
                                <div class="button-items">
                                    <button type="submit" class="btn btn-outline-primary py-2"><i
                                            class="mdi mdi-content-save-all me-2"></i>Subir</button>
                                </div>
                            </div>
                        </form>
                    </div><!--end col-->
            
                    <!-- Formulario para el archivo Proveedor -->
                    <div class="col-xl-6">
                        <form id="proveedor-form" action="{{ route('estado.store2') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Consolidado Proveedores</h4>
                                    <p class="text-muted mb-0">Formato de archivo permitido: plano (.txt)</p>
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <input type="file" id="proveedor" name="proveedor" class="dropify" />
                                </div><!--end card-body-->
                            </div><!--end card-->
                            <div class="col-lg-12 col-md-6 pb-2" style="text-align: right">
                                <div class="button-items">
                                    <button type="submit" class="btn btn-outline-primary py-2"><i
                                            class="mdi mdi-content-save-all me-2"></i>Subir</button>
                                </div>
                            </div>
                        </form>
                    </div><!--end col-->
                </div><!--end row-->
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
</footer>



<script src="{{ asset('plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-upload.init.js') }}"></script>

<!-- jQuery  -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.js') }}"></script>
<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<!-- Flatpickr JS -->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

</div>
</div>
</body>



@if (session('success'))
    <script>
        // Obtener los valores de las variables de sesión
        const successMessage = "{{ session('success') }}";
        const recordsInserted = {{ session('recordsInserted') ?? 0 }};

        // Mostrar SweetAlert con el número de registros cargados
        Swal.fire({
            title: successMessage,            
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/estado/create";
            }
        });
    </script>
@endif

</html>
