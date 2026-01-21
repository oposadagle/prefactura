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

<form class="form-horizontal form-wizard-wrapper" action="{{ route('vehiculo.update2', ['id' => $datos->id]) }}" method="POST">
    @csrf
    @method('PUT')

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
                    <svg height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path style="fill:#FE252D;"
                                    d="M294.433,172.655c0-0.451,0.151-1.051,0.3-1.651l27.94-91.632c1.653-5.258,8.412-7.812,15.322-7.812 s13.67,2.553,15.322,7.812l28.09,91.632c0.151,0.602,0.3,1.2,0.3,1.651c0,5.559-8.561,9.615-15.022,9.615 c-3.756,0-6.759-1.202-7.661-4.356l-5.107-18.777H322.22l-5.107,18.777c-0.902,3.154-3.905,4.356-7.661,4.356 C302.994,182.269,294.433,178.213,294.433,172.655z M348.961,141.108l-10.966-40.257l-10.966,40.257H348.961z">
                                </path>
                                <path style="fill:#FE252D;"
                                    d="M385.143,99.685V89.022h-10.662c-3.079,0-5.166-2.748-5.166-6.924c0-3.957,2.089-7.034,5.166-7.034 h10.662V64.512c0-2.638,3.077-5.275,7.034-5.275c4.177,0,6.925,2.637,6.925,5.275v10.552h10.552c2.638,0,5.277,3.077,5.277,7.034 c0,4.176-2.638,6.924-5.277,6.924h-10.552v10.663c0,3.077-2.748,5.165-6.925,5.165C388.22,104.851,385.143,102.763,385.143,99.685z ">
                                </path>
                                <path style="fill:#FE252D;"
                                    d="M416.725,512H95.274c-29.149,0-52.864-23.715-52.864-52.865V116.121 c0-15.918,6.195-30.878,17.448-42.127l56.544-56.547c9.108-9.108,21.139-15.093,33.879-16.855C152.956,0.198,155.731,0,158.53,0 h258.194c29.149,0,52.864,23.715,52.864,52.865v272.618c0,8.162-6.619,14.781-14.781,14.781c-8.162,0-14.781-6.619-14.781-14.781 V52.865c0-12.848-10.452-23.303-23.301-23.303H158.53c-1.385,0-2.73,0.095-3.998,0.284c-0.056,0.009-0.111,0.016-0.166,0.024 c-6.411,0.879-12.471,3.89-17.059,8.48L80.761,94.898c-5.667,5.666-8.787,13.203-8.787,21.222v343.015 c0,12.848,10.452,23.303,23.301,23.303h321.451c12.848,0,23.301-10.453,23.301-23.303v-48.669c0-8.162,6.619-14.781,14.781-14.781 c8.162,0,14.781,6.619,14.781,14.781v48.669C469.587,488.285,445.872,512,416.725,512z">
                                </path>
                            </g>
                            <path style="fill:#F7CFD8;"
                                d="M152.361,15.225v481.992H95.275c-21.032,0-38.084-17.052-38.084-38.084V116.121 c0-11.881,4.711-23.269,13.117-31.676l56.546-56.546C133.787,20.967,142.763,16.542,152.361,15.225z">
                            </path>
                            <g>
                                <path style="fill:#FE252D;"
                                    d="M152.359,512H95.274c-29.149,0-52.864-23.715-52.864-52.865V116.121 c0-15.918,6.196-30.878,17.448-42.127l56.544-56.547c9.127-9.126,21.183-15.115,33.951-16.864 c4.222-0.585,8.505,0.698,11.723,3.505c3.219,2.807,5.066,6.869,5.066,11.139v481.992C167.141,505.381,160.523,512,152.359,512z M137.578,38.083c-0.092,0.089-0.182,0.179-0.272,0.269L80.761,94.898c-5.667,5.666-8.787,13.203-8.787,21.222v343.015 c0,12.848,10.452,23.303,23.301,23.303h42.304V38.083H137.578z">
                                </path>
                                <path style="fill:#FE252D;"
                                    d="M371.291,340.263H152.359c-8.162,0-14.781-6.619-14.781-14.781s6.619-14.781,14.781-14.781h218.932 c8.162,0,14.781,6.619,14.781,14.781S379.455,340.263,371.291,340.263z">
                                </path>
                                <path style="fill:#FE252D;"
                                    d="M371.291,253.784H152.359c-8.162,0-14.781-6.619-14.781-14.781c0-8.162,6.619-14.781,14.781-14.781 h218.932c8.162,0,14.781,6.619,14.781,14.781C386.073,247.164,379.455,253.784,371.291,253.784z">
                                </path>
                                <path style="fill:#FE252D;"
                                    d="M371.291,426.743H152.359c-8.162,0-14.781-6.619-14.781-14.781s6.619-14.781,14.781-14.781h218.932 c8.162,0,14.781,6.619,14.781,14.781S379.455,426.743,371.291,426.743z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <h4 class="card-title" style="margin-left: 10px;">REEVALUAR VEHICULO</h4>
                </div>
                <div class="card-body">

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
                                <input type="text" value="{{ $datos->conductor }}" class="form-control"
                                    id="conductor" name="conductor" disabled placeholder="name@example.com">
                                <label style="font-size: 11px;">Conductor</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->cedula_conductor }}" class="form-control"
                                    id="cedula_conductor" name="cedula_conductor" disabled
                                    placeholder="name@example.com">
                                <label style="font-size: 11px;">Cedula conductor</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->propietario }}" class="form-control" id="propietario"
                                    name="propietario" disabled placeholder="name@example.com">
                                <label style="font-size: 11px;">Propietario</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->tipo_vehiculo }}" class="form-control"
                                    id="tipo_vehiculo" name="tipo_vehiculo" disabled placeholder="name@example.com">
                                <label style="font-size: 11px;">Tipo de vehiculo</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->estado }}" class="form-control"
                                    id="estado" name="estado" disabled placeholder="name@example.com">
                                <label style="font-size: 11px;">Estado</label>
                            </div>
                        </div>
                    </div><!--end row-->


                    <div class="row">
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="requisitos" name="requisitos" autocomplete="off"
                                    aria-label="Floating label select example">
                                    <option selected disabled>{{ $datos->requisitos }}</option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select>
                                <label style="font-size: 11px;">Cumple los requisitos</label>
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
                                <label style="font-size: 11px;">Estudio de seguridad</label>
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
                                <label style="font-size: 11px;">Acuerdo de seguridad</label>
                            </div>
                        </div>
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
                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $datos->nota_evaluacion }}" class="form-control"
                                    id="nota_evaluacion" name="nota_evaluacion" placeholder="name@example.com">
                                <label style="font-size: 11px;">Observaciones evaluacion</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="form-floating mb-3">                                
                                <input type="date" class="form-control" id="fecha_evaluacion" name="fecha_evaluacion"
                                    placeholder="name@example.com" >
                                <label style="font-size: 11px;">Fecha evaluación</label>                                
                            </div>
                        </div>
                    </div><!--end row-->

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
        Swal.fire("Vehiculo modificado correctamente!").then((result) => {
            if (result.isConfirmed) {
                window.location = "/vehiculo";
            }
        });
    </script>
@endif

</div>
<x-footer />
