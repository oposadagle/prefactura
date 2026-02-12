C<x-header />

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
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g id="surface1"> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 11.046875 19.089844 L 3.925781 19.089844 C 3.230469 19.089844 2.667969 18.53125 2.667969 17.835938 L 2.667969 10.402344 L 5.007812 10.402344 C 5.375 10.402344 5.675781 10.105469 5.675781 9.734375 C 5.675781 9.363281 5.378906 9.066406 5.007812 9.066406 L 2.664062 9.066406 L 2.664062 7.234375 L 6.492188 7.234375 C 6.859375 7.234375 7.160156 6.941406 7.160156 6.566406 C 7.160156 6.199219 6.863281 5.898438 6.492188 5.898438 L 2.695312 5.898438 C 2.816406 5.335938 3.320312 4.910156 3.925781 4.910156 L 11.042969 4.910156 C 11.527344 4.910156 11.9375 5.1875 12.152344 5.589844 C 12.617188 5.320312 13.113281 5.089844 13.632812 4.921875 L 13.632812 2.003906 C 13.632812 1.636719 13.335938 1.335938 12.964844 1.335938 L 2 1.335938 C 1.632812 1.335938 1.332031 1.632812 1.332031 2.003906 L 1.332031 22 C 1.332031 22.367188 1.628906 22.667969 2 22.667969 L 12.96875 22.667969 C 13.335938 22.667969 13.636719 22.371094 13.636719 22 L 13.636719 19.949219 C 12.914062 19.710938 12.234375 19.367188 11.621094 18.941406 C 11.445312 19.035156 11.25 19.089844 11.046875 19.089844 Z M 11.046875 19.089844 "/> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(33.72549%,67.45098%,87.843137%);fill-opacity:1;" d="M 11.046875 4.914062 L 3.925781 4.914062 C 3.320312 4.914062 2.816406 5.339844 2.695312 5.902344 L 6.496094 5.902344 C 6.863281 5.902344 7.164062 6.199219 7.164062 6.570312 C 7.164062 6.941406 6.867188 7.238281 6.496094 7.238281 L 2.664062 7.238281 L 2.664062 9.070312 L 5.003906 9.070312 C 5.371094 9.070312 5.671875 9.367188 5.671875 9.738281 C 5.671875 10.105469 5.375 10.40625 5.003906 10.40625 L 2.664062 10.40625 L 2.664062 17.839844 C 2.664062 18.535156 3.226562 19.09375 3.921875 19.09375 L 11.039062 19.09375 C 11.246094 19.09375 11.441406 19.039062 11.609375 18.949219 C 9.539062 17.523438 8.175781 15.144531 8.175781 12.441406 C 8.175781 9.511719 9.777344 6.960938 12.148438 5.59375 C 11.941406 5.1875 11.523438 4.914062 11.046875 4.914062 Z M 11.046875 4.914062 "/> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,75.686275%,5.098039%);fill-opacity:1;" d="M 16.089844 5.863281 C 12.464844 5.863281 9.511719 8.8125 9.511719 12.441406 C 9.511719 16.066406 12.460938 19.015625 16.089844 19.015625 C 19.710938 19.015625 22.664062 16.070312 22.664062 12.441406 C 22.664062 8.8125 19.710938 5.863281 16.089844 5.863281 Z M 16.089844 5.863281 "/> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 8.691406 20.328125 L 6.277344 20.328125 C 5.90625 20.328125 5.609375 20.625 5.609375 20.996094 C 5.609375 21.367188 5.902344 21.664062 6.277344 21.664062 L 8.691406 21.664062 C 9.058594 21.664062 9.359375 21.367188 9.359375 20.996094 C 9.359375 20.628906 9.0625 20.328125 8.691406 20.328125 Z M 8.691406 20.328125 "/> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 9.207031 3.964844 C 9.574219 3.964844 9.875 3.667969 9.875 3.296875 C 9.875 2.925781 9.578125 2.628906 9.207031 2.628906 L 5.757812 2.628906 C 5.390625 2.628906 5.089844 2.925781 5.089844 3.296875 C 5.089844 3.667969 5.386719 3.964844 5.757812 3.964844 Z M 9.207031 3.964844 "/> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 16.292969 11.765625 L 15.886719 11.769531 C 15.351562 11.769531 14.917969 11.335938 14.917969 10.800781 C 14.914062 10.265625 15.347656 9.832031 15.886719 9.832031 L 17.933594 9.832031 C 18.300781 9.832031 18.601562 9.535156 18.601562 9.164062 C 18.601562 8.792969 18.304688 8.496094 17.933594 8.496094 L 16.757812 8.496094 L 16.757812 7.882812 C 16.757812 7.515625 16.460938 7.214844 16.089844 7.214844 C 15.714844 7.214844 15.421875 7.511719 15.421875 7.882812 L 15.421875 8.542969 C 14.375 8.757812 13.578125 9.6875 13.578125 10.800781 C 13.578125 12.074219 14.613281 13.105469 15.890625 13.105469 L 16.296875 13.101562 C 16.832031 13.101562 17.265625 13.535156 17.265625 14.070312 C 17.265625 14.601562 16.832031 15.039062 16.296875 15.039062 L 14.25 15.039062 C 13.882812 15.039062 13.582031 15.332031 13.582031 15.703125 C 13.582031 16.078125 13.878906 16.371094 14.25 16.371094 L 15.429688 16.371094 L 15.429688 16.984375 C 15.429688 17.351562 15.726562 17.652344 16.097656 17.652344 C 16.46875 17.652344 16.765625 17.355469 16.765625 16.984375 L 16.765625 16.324219 C 17.8125 16.113281 18.605469 15.183594 18.605469 14.070312 C 18.601562 12.800781 17.566406 11.765625 16.292969 11.765625 Z M 16.292969 11.765625 "/> <path style=" stroke:none;fill-rule:nonzero;fill:rgb(9.803922%,30.980392%,50.980392%);fill-opacity:1;" d="M 16.089844 4.527344 C 15.703125 4.527344 15.332031 4.554688 14.964844 4.609375 L 14.964844 2 C 14.964844 0.898438 14.070312 0 12.964844 0 L 2 0 C 0.898438 0 0 0.898438 0 2 L 0 21.996094 C 0 23.101562 0.898438 24 2 24 L 12.96875 24 C 14.074219 24 14.96875 23.101562 14.96875 22 L 14.96875 20.261719 C 15.335938 20.3125 15.710938 20.339844 16.09375 20.339844 C 20.453125 20.339844 24 16.792969 24 12.433594 C 24 8.074219 20.445312 4.527344 16.089844 4.527344 Z M 13.632812 22 C 13.632812 22.367188 13.335938 22.667969 12.964844 22.667969 L 2 22.667969 C 1.632812 22.667969 1.332031 22.371094 1.332031 22 L 1.332031 2.003906 C 1.332031 1.636719 1.628906 1.335938 2 1.335938 L 12.96875 1.335938 C 13.335938 1.335938 13.636719 1.632812 13.636719 2.003906 L 13.636719 4.925781 C 10.472656 5.957031 8.179688 8.929688 8.179688 12.4375 C 8.179688 15.941406 10.472656 18.917969 13.628906 19.953125 L 13.628906 22 Z M 16.089844 19.011719 C 12.464844 19.011719 9.511719 16.066406 9.511719 12.4375 C 9.511719 8.8125 12.460938 5.859375 16.089844 5.859375 C 19.710938 5.859375 22.664062 8.808594 22.664062 12.4375 C 22.664062 16.066406 19.710938 19.011719 16.089844 19.011719 Z M 16.089844 19.011719 "/> </g> </svg>
                <h4 class="card-title" style="margin-left: 10px;">INGRESAR COTIZACION</h4>
            </div><!--end card-header-->
            <div class="card-body">


                <form id="priceForm" class="form-horizontal form-wizard-wrapper" action="{{ url('/price') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                  

                    <!--container 1-->
                    <div class="container">
                        <div class="row gx-1 justify-content-between">

                            <div class="col-lg-3 col-md-12">
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="CLIENTE" name="cliente" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->nombre }}">{{ $cliente->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label for="cliente">Cliente</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">                                
                                <div class="form-floating mb-3 mx-3">
                                    <input type="datetime-local" class="form-control" id="datetime" name="fecha_solicitud" autocomplete="off">
                                    <label for="ejecutivo">Fecha de solicitud</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 mx-3">
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

                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 mx-3">
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

                        </div>
                    </div>

                    <br>
                    <!--container 2-->
                    <div class="container">
                        <div class="row gx-1 justify-content-between">

                            <div class="col-lg-3 col-md-3">                                
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="tipo_trayecto" name="trayecto" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>URBANO</option>
                                        <option>MUNICIPAL</option>
                                        <option>NACIONAL</option>                                        
                                        <option>TRAYECTO ESPECIAL</option>
                                        <option>IMPORTACION</option>
                                        <option>EXPORTACION</option>
                                        <option>VIAJE REDONDO</option>
                                        <option>RUTA LOGICA</option>
                                    </select>
                                    <label for="ejecutivo">Tipo de trayecto</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">                                
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="TIPO_VEHICULO" name="tipo_vehiculo" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>PATINETA 9 A 15_CONTENEDOR</option>
                                        <option>PATINETA 9 A 18_FURGONADO</option>
                                        <option>PATINETA PODEROSA_CONTENEDOR</option>
                                        <option>PATINETA PODEROSA_FURGON,CARROZADO,PLANCHON</option>
                                        <option>TRACTOMULA_CONTENEDOR_DOS EJES</option>
                                        <option>TRACTOMULA_CARRROZADO,PLANCHON_DOS EJES</option>
                                        <option>TRACTOMULA_CONTENEDOR_TRES EJES</option>
                                        <option>TRACTOMULA_CARROZADO,PLANCHON_TRES EJES</option>
                                        <option>CARRY</option>
                                        <option>NHR</option>
                                        <option>NKR</option>
                                        <option>SENCILLO</option>
                                        <option>TURBO</option>
                                        <option>TURBO SENCILLO</option>
                                    </select>
                                    <label for="ejecutivo">Tipo de vehiculo</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 mx-3">
                                    <input type="text" class="form-control" id="CAPACIDAD" name="capacidad" autocomplete="off">
                                    <label for="cliente">Capacidad de carga (Kg)</label>                                    
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 mx-3">
                                    <input type="text" class="form-control" id="SISETAC" name="sisetac" autocomplete="off">
                                    <label for="sisetac">Sisetac ($)</label>                                    
                                </div>
                            </div>                                                       

                        </div>
                    </div>

                    <br>
                    <!--container 3-->
                    <div class="container">
                        <div class="row gx-1 justify-content-between">

                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 mx-3">
                                    <input type="text" class="form-control" id="COSTO" name="costo" autocomplete="off">
                                    <label for="cliente">Base cotización ($)</label>                                    
                                </div>
                            </div> 

                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 mx-3">
                                    <input type="text" class="form-control" id="PUNTOS" name="puntos" autocomplete="off">
                                    <label for="cliente">Puntos</label>                                    
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 mx-3">
                                    <input type="text" class="form-control" id="COSTO_NEGOCIO" name="costo_negocio" autocomplete="off">
                                    <label for="cliente">Tarifa conductor ($)</label>                                    
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">                                
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="TIPO_CARROCERIA" name="tipo_carroceria" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>FURGONADO</option>
                                        <option>CARROZADO</option>
                                        <option>PLANCHON</option>                                        
                                        <option>PANEL</option>
                                        <option>PORTACONTENEDOR - 20</option>
                                        <option>PORTACONTENEDOR - 40</option>
                                    </select>
                                    <label for="ejecutivo">Tipo de carroceria</label>
                                </div>
                            </div>                                                     

                        </div>
                    </div>
                    
                    <br>
                    <!--container 4-->
                    <div class="container">
                        <div class="row gx-1 justify-content-between">                            

                            <div class="col-lg-3 col-md-3">                                
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="ESTADO_COTIZACION" name="estado_cotizacion" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>APROBADO</option>
                                        <option>COMERCIAL</option>
                                        <option>COTIZACION</option>                                        
                                        <option>NO APROBADO</option>
                                    </select>
                                    <label for="ejecutivo">Estado de cotizacion</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">                                
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="RESPONSABLE" name="responsable" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>MASIVOS CALI</option>
                                        <option>MASIVOS BOGOTA</option>
                                        <option>MASIVOS COSTA</option>
                                        <option>MASIVOS MEDELLIN</option>
                                        <option>PROVEEDOR HUMADEA</option>
                                        <option>PROVEEDOR LOGYSTEEL</option>
                                        <option>PROVEEDOR LINKARGA</option>
                                    </select>
                                    <label for="ejecutivo">Responsable</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 mx-3">
                                    <input type="number" min="0" class="form-control" id="COSTO_ADICIONAL" name="costo_adicional" autocomplete="off">
                                    <label for="cliente">Otros costos</label>                                    
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">                                
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="QUIEN_SOLICITA" name="quien_solicita" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>Eryka Lopez / medellin</option>
                                        <option>Hernan  Humberto/ cali</option>
                                        <option>Javier Hernandez / Bogota</option>
                                        <option>Judith  Palacin/ Barranquilla</option>
                                        <option>Leidy Yasmin / Bogota</option>
                                        <option>Liliana Sanchez / Bogota</option>
                                        <option>Mayra Molina / cali</option>
                                        <option>Oscar Pardo / Bogota</option>
                                        <option>Roger Rodriguez / Barranquilla</option>
                                        <option>Sandra Gutierrez / Bogota</option>
                                        <option>Stefania Jaramillo / medellin</option>
                                        <option>Vivian Celis / Bogota</option>
                                        <option>Yonathan Reyes / Cali</option>
                                        <option>Yenifer Sánchez / Medellin</option>
                                        <option>Masivos - Despachos</option>
                                        <option>Operaciones</option>
                                        <option>Marco / Barranquilla</option>
                                        <option>Cristian  Tique / Medellin</option>
                                        <option>Martha Duarte / Bogotá</option>
                                        <option>Cristian vargas / Bogotá</option>
                                        <option>Daniel / Bogotá</option>
                                        <option>Magaly / Bogotá</option>
                                        <option>Jessica Motta / Bogotá</option>
                                        <option>Sebastian / Bogotá</option>
                                        <option>Lina Giraldo / Bogotá</option>
                                        <option>David Molina / Bogotá</option>
                                        <option>Rolando / Bogota / Operaciones</option>
                                        <option>Santiago / Bogota</option>
                                        <option>Fabian Posada / Bogota</option>
                                        <option>Milena  Patricia / Barranquilla</option>
                                        <option>Carolina / Bogota / despachos</option>
                                        <option>Zuly Moreno / Bogota / despachos</option>
                                        <option>Mariano Callejas / Medellin</option>
                                        <option>Deneider Jesus / Medellin / Coordinador</option>
                                        <option>Andres / Barranquilla</option>
                                    </select>
                                    <label for="ejecutivo">Quien solicita</label>
                                </div>
                            </div> 
                            
                            <div class="col-lg-12 col-md-6 mt-4">
                                <div class="form-floating mb-3 mx-3">
                                    <input type="text" min="0" class="form-control" id="OBSERVACIONES" name="observaciones" autocomplete="off">
                                    <label for="cliente">Observaciones</label>                                    
                                </div>
                            </div>

                        </div>
                    </div>

                    <br>

                    <div class="container">
                        <div class="row gx-1 justify-content-between py-4">                            

           
                            
                            <div class="col-lg-12 col-md-6 pt-4">
                                <div class="button-items" style="text-align: right">
                                    <button type="submit" class="btn btn-outline-primary py-2"><i
                                            class="mdi mdi-content-save-all me-2"></i>Guardar</button>
                                    <a class="btn btn-outline-secondary py-2"
                                        href="{{ route('price.index') }}"><i
                                            class="mdi mdi-backspace me-2"></i>Cancelar</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </form><!--end form-->


                @if (session('success'))
                    <script>
                        Swal.fire("Cotización ingresada correctamente!").then((result) => {
                            if (result.isConfirmed) {
                                window.location = "/price";
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
        const form = document.getElementById('priceForm');
        
        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                
                try {
                    const response = await fetch('{{ url('/price') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (response.ok) {
                        Swal.fire({
                            title: "¡Éxito!",
                            text: "Cotización ingresada correctamente",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then(() => {
                            window.location = "/price";
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
                            let errorText = 'Hubo un error al guardar la cotización';
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

        document.getElementById('CAPACIDAD').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            value = Number(value).toLocaleString('es');
            e.target.value = value;
        });
        document.getElementById('COSTO').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            value = Number(value).toLocaleString('es');
            e.target.value = value;
        });
        document.getElementById('SISETAC').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            value = Number(value).toLocaleString('es');
            e.target.value = value;
        });
        document.getElementById('COSTO_NEGOCIO').addEventListener('input', function (e) {
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
