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
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" stroke="#1761FD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg>
                <h4 class="card-title" style="margin-left: 10px;">AGREGAR PROVEEDOR</h4>
            </div><!--end card-header-->
            <div class="card-body">


                <form id="proveedorForm" class="form-horizontal form-wizard-wrapper" action="{{ url('/proveedor') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    
                        <div class="row justify-content-left">
                            
                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off"
                                        placeholder="name@example.com" style="width: 300px;">
                                    <label style="font-size: 11px;">Proveedor</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="estado" name="estado" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>ACTIVO</option>
                                        <option>DESHABILITADO</option>                                                                                
                                    </select>
                                    <label style="font-size: 11px;">Estado</label>
                                </div>
                            </div>                            
                            
                        </div><!--end row-->

                        
                        
                                <div class="col-lg-12 col-md-4 pt-4">
                                    <div class="button-items" style="text-align: right">
                                        <button type="submit" class="btn btn-outline-primary py-2"><i
                                                class="mdi mdi-content-save-all me-2"></i>Guardar</button>
                                        <a class="btn btn-outline-secondary py-2" href="{{ route('proveedor.index') }}"><i
                                                class="mdi mdi-backspace me-2"></i>Cancelar</a>
                                    </div>
                                </div>                               
                            </div>
                </form>

                @if (session('success'))
                    <script>
                        Swal.fire("¡Proveedor creado correctamente!").then((result) => {
                            if (result.isConfirmed) {
                                window.location = "/proveedor";
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
        const form = document.getElementById('proveedorForm');
        
        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                
                try {
                    const response = await fetch('{{ url('/proveedor') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (response.ok) {
                        Swal.fire({
                            title: "¡Éxito!",
                            text: "Proveedor creado correctamente",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then(() => {
                            window.location = "/proveedor";
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
                            let errorText = 'Hubo un error al guardar el proveedor';
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
    });
</script>

<x-footer />
