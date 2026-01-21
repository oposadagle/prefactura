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
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" stroke="#1761FD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg>
                <h4 class="card-title" style="margin-left: 10px;">AGREGAR CLIENTE</h4>
            </div><!--end card-header-->
            <div class="card-body">


                <form class="form-horizontal form-wizard-wrapper" action="{{ url('/nit') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    
                        <div class="row justify-content-between">
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nit" name="nit" autocomplete="off"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Nit</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Cliente</label>
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
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="fecha_cierre" name="fecha_cierre" autocomplete="off"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Fecha de cierre</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="frecuencia" name="frecuencia" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>QUINCENAL</option>
                                        <option>MES VENCIDO</option>                                        
                                        <option>NO APLICA</option>
                                        <option>SEMANAL</option>
                                        <option>MENSUAL</option>
                                    </select>
                                    <label style="font-size: 11px;">Frecuencia</label>
                                </div>
                            </div>
                            
                        </div><!--end row-->

                        
                        
                                <div class="col-lg-12 col-md-4 pt-4">
                                    <div class="button-items" style="text-align: right">
                                        <button type="submit" class="btn btn-outline-primary py-2"><i
                                                class="mdi mdi-content-save-all me-2"></i>Guardar</button>
                                        <a class="btn btn-outline-secondary py-2" href="{{ route('nit.index') }}"><i
                                                class="mdi mdi-backspace me-2"></i>Cancelar</a>
                                    </div>
                                </div>                               
                            </div>
                </form>

                @if (session('success'))
                    <script>
                        Swal.fire("Cliente creado correctamente!").then((result) => {
                            if (result.isConfirmed) {
                                window.location = "/nit";
                            }
                        });
                    </script>
                @endif

            </div>
        </div>
    </div>
</div>

<x-footer />
