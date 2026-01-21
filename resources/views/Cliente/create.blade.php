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
            <div class="card-header">
                <h4 class="card-title">Crear cliente</h4>
                <p class="text-muted mb-0">Por favor complete todos los pasos del formulario</p>
            </div><!--end card-header-->
            <div class="card-body">

                <form id="form-horizontal" class="form-horizontal form-wizard-wrapper" action="{{ url('/cliente') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3>Información de cliente</h3>
                    <fieldset>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nit" name="nit"
                                        placeholder="name@example.com">
                                    <label for="nit">NIT</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="razonsocial" name="razon_social"
                                        placeholder="name@example.com">
                                    <label for="razonsocial">Razón social</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="razoncomercial"
                                        name="razon_comercial" placeholder="name@example.com">
                                    <label for="razoncomercial">Razón comercial</label>
                                </div>
                            </div>
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="direccion" name="direccion"
                                        placeholder="name@example.com">
                                    <label for="direccion">Dirección</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        placeholder="name@example.com">
                                    <label for="telefono">Teléfono</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="contacto" name="contacto"
                                        placeholder="name@example.com">
                                    <label for="contacto">Nombre de contacto</label>
                                </div>
                            </div>
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="email_1" name="email_1"
                                        placeholder="name@example.com">
                                    <label for="email1">Email de facturación electrónica 1</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="email_2" name="email_2"
                                        placeholder="name@example.com">
                                    <label for="email2">Email de facturación electrónica 2</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="email_3" name="email_3"
                                        placeholder="name@example.com">
                                    <label for="email3">Email de facturación electrónica 3</label>
                                </div>
                            </div>
                        </div><!--end row-->

                    </fieldset><!--end fieldset-->

                    <h3>Personal asociado</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="comercial" name="comercial"
                                        aria-label="Floating label select example" onchange="actualizarComerciales()">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($comerciales as $comercial)
                                            <option value="{{ $comercial->nombre }}">{{ $comercial->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label for="comercial">Nombre comercial</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="analista" name="analista"
                                        aria-label="Floating label select example" onchange="actualizarAnalistas()">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($analistas as $analista)
                                            <option value="{{ $analista->nombre }}">{{ $analista->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label for="analista">Nombre analista de facturación</label>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="emailcomercial"
                                        name="email_comercial" placeholder="name@example.com" readonly>
                                    <label for="emailcomercial">Email comercial asociado</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="emailanalista"
                                        name="email_analista" placeholder="name@example.com" readonly>
                                    <label for="emailanalista">Email analista de facturación</label>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="procesocomercial"
                                        name="proceso_comercial" placeholder="name@example.com" readonly>
                                    <label for="procesocomercial">Proceso</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="procesoanalista"
                                        name="proceso_analista" placeholder="name@example.com" readonly>
                                    <label for="procesoanalista">Proceso</label>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="regionalcomercial"
                                        name="regional_comercial" placeholder="name@example.com" readonly>
                                    <label for="regionalcomercial">Regional</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="regionalanalista"
                                        name="regional_analista" placeholder="name@example.com" readonly>
                                    <label for="regionalanalista">Regional</label>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </fieldset><!--end fieldset-->

                    <h3>Parámetros</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="tipo_servicio" name="tipo_servicio"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>Mensajería</option>
                                        <option>Paqueteo</option>
                                    </select>
                                    <label for="comercial">Tipo de servicio</label>
                                </div>
                            </div><!--end col-->
                            {{-- Hidden inputs --}}
                            <select name="factor" hidden>
                                <option selected>400</option>
                            </select>
                            <select name="estado" hidden>
                                <option selected>Activo</option>
                            </select>
                            {{-- Hidden inputs --}}
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="centrocosto" name="centrocosto"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($centros as $centro)
                                            <option>{{ $centro->nombrecentro }}</option>
                                        @endforeach
                                    </select>
                                    <label for="comercial">Centro de costo</label>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-md-3 my-2 form-label">Transportadoras</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="transporte[]"
                                        id="inlineCheckbox1" value="ALDIA" checked>
                                    <label class="form-check-label" for="inlineCheckbox1">ALDIA</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="transporte[]"
                                        id="inlineCheckbox2" value="DEPRISA" checked>
                                    <label class="form-check-label" for="inlineCheckbox2">DEPRISA</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="transporte[]"
                                        id="inlineCheckbox3" value="EXXE" checked>
                                    <label class="form-check-label" for="inlineCheckbox3">EXXE</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="transporte[]"
                                        id="inlineCheckbox1" value="SERVIENTREGA" checked>
                                    <label class="form-check-label" for="inlineCheckbox1">SERVIENTREGA</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="transporte[]"
                                        id="inlineCheckbox2" value="SOLISTICA" checked>
                                    <label class="form-check-label" for="inlineCheckbox2">SOLISTICA</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="transporte[]"
                                        id="inlineCheckbox3" value="TCC" checked>
                                    <label class="form-check-label" for="inlineCheckbox3">TCC</label>
                                </div>
                                <br>
                                <label class="col-md-3 my-2 form-label">Coberturas</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="cobertura[]"
                                        id="inlineCheckbox1" value="Urbano" checked>
                                    <label class="form-check-label" for="inlineCheckbox1">Urbano</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="cobertura[]"
                                        id="inlineCheckbox2" value="Nacional" checked>
                                    <label class="form-check-label" for="inlineCheckbox2">Nacional</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="cobertura[]"
                                        id="inlineCheckbox3" value="Trayecto especial" checked>
                                    <label class="form-check-label" for="inlineCheckbox3">Trayecto especial</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="cobertura[]"
                                        id="inlineCheckbox1" value="Díficil acceso" checked>
                                    <label class="form-check-label" for="inlineCheckbox1">Díficil acceso</label>
                                </div>
                            </div><!--end col-->

                            <div class="col-md-6">

                                <fieldset>
                                    <div class="repeater-default">
                                        <div data-repeater-list="costo">
                                            <div data-repeater-item="">
                                                <div class="form-group row d-flex align-items-end">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" id="centrocosto"
                                                                name="costo[0][subcentro]"
                                                                aria-label="Floating label select example">
                                                                <option selected disabled>Seleccionar</option>
                                                                @foreach ($centros as $centro)
                                                                    <option>{{ $centro->nombrecentro }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="telefono">Subcentro de costo</label>
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-sm-2">
                                                        <div class="form-floating mb-3">
                                                            <span data-repeater-delete=""
                                                                class="btn btn-outline-danger"
                                                                style="padding-top: 18px; padding-bottom: 18px;">
                                                                <span class="far fa-trash-alt me-1"></span> Borrar
                                                            </span>
                                                        </div>
                                                    </div><!--end col-->
                                                </div><!--end row-->
                                            </div><!--end /div-->
                                        </div><!--end repet-list-->
                                        <div class="form-group mb-0 row">
                                            <div class="col-sm-12">
                                                <span data-repeater-create="" class="btn btn-outline-primary">
                                                    <span class="fas fa-plus"></span> Agregar</span>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div> <!--end repeter-->
                                </fieldset><!--end fieldset-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </fieldset><!--end fieldset-->

                    <h3>Oferta comercial</h3>
                    <fieldset>
                        <h4 class="card-title mb-2">Urbano</h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="upmu" name="upmu"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Peso mínimo por unidad</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="upmd" name="upmd"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Peso mínimo por despacho</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ufmu" name="ufmu"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Flete mínimo por unidad</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ufmd" name="ufmd"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Flete mínimo por despacho</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="utm" name="utm"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Tasa de manejo</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ucmum" name="ucmum"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Costo mínimo por unidad</label>
                                </div>
                            </div>
                        </div><!--end row-->

                        <h4 class="card-title mb-2">Nacional</h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="npmu" name="npmu"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Peso mínimo por unidad</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="npmd" name="npmd"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Peso mínimo por despacho</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nfmu" name="nfmu"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Flete mínimo por unidad</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nfmd" name="nfmd"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Flete mínimo por despacho</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ntm" name="ntm"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Tasa de manejo</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ncmum" name="ncmum"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Costo mínimo por unidad</label>
                                </div>
                            </div>
                        </div><!--end row-->

                        <h4 class="card-title mb-2">Trayecto especial</h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="epmu" name="epmu"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Peso mínimo por unidad</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="epmd" name="epmd"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Peso mínimo por despacho</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="efmu" name="efmu"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Flete mínimo por unidad</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="efmd" name="efmd"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Flete mínimo por despacho</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="etm" name="etm"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Tasa de manejo</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ecmum" name="ecmum"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Costo mínimo por unidad</label>
                                </div>
                            </div>
                        </div><!--end row-->

                        <h4 class="card-title mb-2">Díficil acceso</h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="dpmu" name="dpmu"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Peso mínimo por unidad</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="dpmd" name="dpmd"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Peso mínimo por despacho</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="dfmu" name="dfmu"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Flete mínimo por unidad</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="dfmd" name="dfmd"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Flete mínimo por despacho</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="dtm" name="dtm"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Tasa de manejo</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="dcmum" name="dcmum"
                                        placeholder="name@example.com">
                                    <label style="font-size: 11px;">Costo mínimo por unidad</label>
                                </div>
                            </div>
                            <div class="nav-link">
                                <div class="btn btn-sm btn-soft-primary">
                                    <svg height="16" width="16" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.573 511.573" xml:space="preserve"><g transform="translate(1 1)">	<path style="fill:#FFDD09;" d="M433.987,250.52c0,98.987-80.213,179.2-179.2,179.2s-179.2-80.213-179.2-179.2   s80.213-179.2,179.2-179.2S433.987,151.533,433.987,250.52" />	<path style="fill:#FD9808;" d="M254.787,71.32c-4.267,0-8.533,0-12.8,0.853c93.013,5.973,166.4,83.627,166.4,178.347   S335,422.893,241.987,428.867c4.267,0,8.533,0.853,12.8,0.853c98.987,0,179.2-80.213,179.2-179.2S353.773,71.32,254.787,71.32" />	<g>		<polygon style="fill:#54C9FD;" points="288.92,327.32 288.92,233.453 288.92,199.32 212.12,199.32 212.12,233.453 237.72,233.453     237.72,327.32 203.587,327.32 203.587,361.453 237.72,361.453 288.92,361.453 323.053,361.453 323.053,327.32   " />		<path style="fill:#54C9FD;" d="M280.387,139.587c0,14.507-11.093,25.6-25.6,25.6s-25.6-11.093-25.6-25.6    c0-14.507,11.093-25.6,25.6-25.6S280.387,125.08,280.387,139.587" />	</g>	<g>		<path style="fill:#FFDD09;" d="M79.853,446.787c-2.56,0-4.267-0.853-5.973-2.56c-99.84-99.84-99.84-261.973,0-361.813    c3.413-3.413,8.533-3.413,11.947,0c3.413,3.413,3.413,8.533,0,11.947c-93.013,93.013-93.013,244.907,0,337.92    c3.413,3.413,3.413,8.533,0,11.947C84.12,445.933,82.413,446.787,79.853,446.787z" />		<path style="fill:#FFDD09;" d="M429.72,446.787c-2.56,0-4.267-0.853-5.973-2.56c-3.413-3.413-3.413-8.533,0-11.947    c93.013-93.013,93.013-244.907,0-337.92c-3.413-3.413-3.413-8.533,0-11.947c3.413-3.413,8.533-3.413,11.947,0    c99.84,99.84,99.84,261.973,0,361.813C433.987,445.933,432.28,446.787,429.72,446.787z" />	</g>	<path d="M254.787,438.253c-103.253,0-187.733-84.48-187.733-187.733s84.48-187.733,187.733-187.733S442.52,147.267,442.52,250.52   S358.04,438.253,254.787,438.253z M254.787,79.853c-93.867,0-170.667,76.8-170.667,170.667s76.8,170.667,170.667,170.667   s170.667-76.8,170.667-170.667S348.653,79.853,254.787,79.853z" />	<path d="M79.853,433.987c-2.56,0-4.267-0.853-5.973-2.56c-99.84-99.84-99.84-261.973,0-361.813c3.413-3.413,8.533-3.413,11.947,0   c3.413,3.413,3.413,8.533,0,11.947c-93.013,93.013-93.013,244.907,0,337.92c3.413,3.413,3.413,8.533,0,11.947   C84.12,433.133,82.413,433.987,79.853,433.987z" />	<path d="M429.72,433.987c-2.56,0-4.267-0.853-5.973-2.56c-3.413-3.413-3.413-8.533,0-11.947c93.013-93.013,93.013-244.907,0-337.92   c-3.413-3.413-3.413-8.533,0-11.947c3.413-3.413,8.533-3.413,11.947,0c99.84,99.84,99.84,261.973,0,361.813   C433.987,433.133,432.28,433.987,429.72,433.987z" />	<path d="M323.053,369.987H203.587c-5.12,0-8.533-3.413-8.533-8.533V327.32c0-5.12,3.413-8.533,8.533-8.533h25.6v-76.8H212.12   c-5.12,0-8.533-3.413-8.533-8.533V199.32c0-5.12,3.413-8.533,8.533-8.533h76.8c5.12,0,8.533,3.413,8.533,8.533v119.467h25.6   c5.12,0,8.533,3.413,8.533,8.533v34.133C331.587,366.573,328.173,369.987,323.053,369.987z M212.12,352.92h102.4v-17.067h-25.6   c-5.12,0-8.533-3.413-8.533-8.533V207.853h-59.733v17.067h17.067c5.12,0,8.533,3.413,8.533,8.533v93.867   c0,5.12-3.413,8.533-8.533,8.533h-25.6V352.92z" />	<path d="M254.787,173.72c-18.773,0-34.133-15.36-34.133-34.133s15.36-34.133,34.133-34.133s34.133,15.36,34.133,34.133   S273.56,173.72,254.787,173.72z M254.787,122.52c-9.387,0-17.067,7.68-17.067,17.067c0,9.387,7.68,17.067,17.067,17.067   c9.387,0,17.067-7.68,17.067-17.067C271.853,130.2,264.173,122.52,254.787,122.52z" /></g></svg>
                                    Los campos de la oferta comercial se pueden diligenciar más adelante.</div>
                            </div>                                                        
                        </div><!--end row-->
                    </fieldset><!--end fieldset-->
                </form><!--end form-->

                @if (session('success'))
                    <script>
                        Swal.fire("Cliente creado correctamente!").then((result) => {
                            if (result.isConfirmed) {
                                window.location = "/dashboard";
                            }
                        });
                    </script>
                @endif

            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->



<script>
    function actualizarComerciales() {
        var comerciales = @json($comerciales);
        var comercial = document.getElementById("comercial").value;
        // Convierte la matriz de cadenas en una matriz de objetos
        var comercialesDB = comerciales.map(function(comercial) {
            return {
                datos: comercial,
            };
        });
        var comercialDB = comercialesDB.find(function(item) {
            return item.datos.nombre === comercial;
        });
        var email = document.getElementById("emailcomercial").value = comercialDB.datos.email;
        var proceso = document.getElementById("procesocomercial").value = comercialDB.datos.proceso;
        var regional = document.getElementById("regionalcomercial").value = comercialDB.datos.regional;
    }

    function actualizarAnalistas() {
        var analistas = @json($analistas);
        var analista = document.getElementById("analista").value;
        var analistasDB = analistas.map(function(analista) {
            return {
                datos: analista,
            };
        });
        var analistaDB = analistasDB.find(function(item) {
            return item.datos.nombre === analista;
        });
        var email = document.getElementById("emailanalista").value = analistaDB.datos.email;
        var proceso = document.getElementById("procesoanalista").value = analistaDB.datos.proceso;
        var regional = document.getElementById("regionalanalista").value = analistaDB.datos.regional;
    }
</script>



<x-footer />
