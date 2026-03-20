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
    .btn-cancel {
        background-color: #021526 !important;
        color: white !important;
        transition: background-color 0.2s ease;
    }
    .btn-cancel:hover {
        background-color: #1452D7 !important;
        color: white !important;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex m-2 py-3" style="background-color: #F1F5FA;">
                <svg height="26px" width="26px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#021526"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M466.184,73.504H45.816C20.128,73.504,0,94.616,0,121.568v272.544h0.056c0.32,24.52,20.312,44.384,44.904,44.384h421.256 v-31.952H44.96c-7.176,0-13.008-5.832-13.008-13.008s5.832-13.008,13.008-13.008h421.256l0,0 c25.24-0.024,45.784-20.576,45.784-45.824V119.32C512,94.056,491.44,73.504,466.184,73.504z"></path> <path style="fill:#fd1f28;" d="M248.224,277.04v-46.568c-14.528-4.152-25.176-10.432-31.96-18.84 c-6.776-8.408-10.168-18.624-10.168-30.624c0-12.152,3.832-22.36,11.504-30.624c7.672-8.256,17.872-13.016,30.624-14.28v-11h16.12 v11c11.776,1.408,21.152,5.432,28.12,12.064c6.96,6.632,11.408,15.512,13.336,26.616l-28.12,3.672 c-1.704-8.744-6.152-14.672-13.336-17.784v43.464c17.784,4.816,29.904,11.064,36.344,18.728c6.448,7.664,9.672,17.504,9.672,29.512 c0,13.408-4.056,24.72-12.176,33.904c-8.112,9.184-19.392,14.816-33.84,16.896v20.784h-16.12v-20.232 c-12.824-1.552-23.232-6.336-31.232-14.344c-8.008-8-13.12-19.296-15.344-33.896l29.016-3.112c1.184,5.928,3.4,11.048,6.672,15.344 C240.584,272,244.216,275.112,248.224,277.04z M248.224,160.328c-4.376,1.48-7.856,4-10.448,7.56c-2.6,3.56-3.888,7.48-3.888,11.776 c0,3.928,1.184,7.576,3.56,10.952c2.376,3.376,5.968,6.096,10.784,8.168v-38.456H248.224z M264.336,278.6 c5.552-1.04,10.072-3.616,13.56-7.728c3.48-4.104,5.224-8.952,5.224-14.504c0-4.96-1.464-9.24-4.392-12.84 c-2.928-3.592-7.72-6.352-14.392-8.28V278.6z"></path> </g></svg>
                <h4 class="card-title" style="margin-left: 10px;">COTIZACION DE SERVICIOS MASIVOS</h4>
            </div>
            <div class="card-body">

                <form id="cotizarForm" class="form-horizontal form-wizard-wrapper" action="{{ route('price.storeCotizar') }}" method="POST">
                    @csrf

                    <div class="container">
                        <!-- Fila 1 -->
                        <div class="row gx-1 mb-3">

                            <!-- 1. Tipo de operacion -->
                            <div class="col-lg-4 col-md-12">
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="tipo_operacion" name="tipo_operacion" autocomplete="off">
                                        <option selected disabled>Seleccionar</option>
                                        <option value="MASIVOS">MASIVOS</option>
                                        <option value="CLIENTE">COMERCIAL</option>
                                    </select>
                                    <label for="tipo_operacion">Proceso</label>
                                </div>
                            </div>

                            <!-- 2. Cliente -->
                            <div class="col-lg-4 col-md-12">
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="cliente" name="cliente" autocomplete="off">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->nombre }}">{{ $cliente->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label for="cliente">Cliente</label>
                                </div>
                            </div>

                            <!-- 3. Quien solicita -->
                            @can('originar', 1) 
                            <div class="col-lg-4 col-md-12">
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="quien_solicita" name="quien_solicita" autocomplete="off">
                                        <option selected disabled>Seleccionar</option>
                                        <option>ANTONIO GARCIA / BOGOTA / MASIVOS</option>
                                        <option>ARTURO CAMPOS / BARRANQUILLA / MASIVOS</option>
                                        <option>CRISTIAN VARGAS / BOGOTA / OPERACIONES</option>
                                        <option>DANIEL DIMATE / BOGOTA / OPERACIONES</option>
                                        <option>DAVID MOLINA / BOGOTA / DIRECTOR</option>
                                        <option>DERNEY SANTANA / MEDELLIN / MASIVOS</option>
                                        <option>DIANA QUINTERO / BOGOTA / OPERACIONES</option>
                                        <option>ELIZABETH ARBOLEDA / BOGOTA / COMERCIAL</option>
                                        <option>ERYKA LOPEZ / MEDELLIN / DIRECCIONAMIENTO ESTRATEGICO</option>
                                        <option>FABIAN POSADA / BOGOTA / OPERACIONES</option>
                                        <option>HERNAN JURI / CALI / COMERCIAL</option>
                                        <option>JAVIER HERNANDEZ / BOGOTA / COMERCIAL</option>
                                        <option>JESSICA MOTTA / BOGOTA / MASIVOS</option>
                                        <option>LEIDY BAICUE / BOGOTA / COMERCIAL</option>
                                        <option>LILIANA SANCHEZ / BOGOTA / COMERCIAL</option>
                                        <option>LINA GIRALDO / BOGOTA / OPERACIONES</option>
                                        <option>MAGALY GIL / BOGOTA / MASIVOS</option>
                                        <option>MAICOL PALOMINO / BARRANQUILLA / MASIVOS</option>
                                        <option>MARTHA DUARTE / BOGOTA / MASIVOS</option>
                                        <option>MASIVOS / BOGOTA / MASIVOS</option>
                                        <option>MAYRA MOLINA / CALI / COMERCIAL</option>
                                        <option>MILENA BERARDINELLI / BARRANQUILLA / DIRECCIONAMIENTO ESTRATEGICO</option>
                                        <option>OPERACIONES / BOGOTA / OPERACIONES</option>
                                        <option>OSCAR PARDO / BOGOTA / COMERCIAL</option>
                                        <option>PAULINA LUCERO / BOGOTA / MASIVOS</option>
                                        <option>ROGER RODRIGUEZ / BARRANQUILLA / COMERCIAL</option>
                                        <option>ROLANDO CRUZ / BOGOTA / OPERACIONES</option>
                                        <option>SANDRA GUTIERREZ / BOGOTA / COMERCIAL</option>
                                        <option>SEBASTIAN MEDINA / BOGOTA / MASIVOS</option>
                                        <option>STEFANIA JARAMILLO / MEDELLIN / COMERCIAL</option>
                                        <option>VIVIAN CELIS / BOGOTA / COMERCIAL</option>
                                        <option>WILSON BERMUDEZ / CALI / COMERCIAL</option>
                                        <option>YENIFER SÁNCHEZ / MEDELLIN / COMERCIAL</option>
                                        <option>YONATHAN REYES / CALI / DIRECCIONAMIENTO ESTRATEGICO</option>
                                        <option>ZULY MORENO / BOGOTA / DESPACHOS</option>
                                    </select>
                                    <label for="quien_solicita">Quién solicita</label>
                                </div>
                            </div>
                            @endcan

                            <!-- Campo oculto para fecha -->
                            <input type="hidden" name="fecha_solicitud" value="{{ now()->format('Y-m-d H:i:s') }}">

                        </div>

                        <!-- Fila 2 -->
                        <div class="row gx-1 mb-3">

                            <!-- 4. Origen -->
                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="origen" name="origen" autocomplete="off">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($municipios as $municipio)
                                            <option value="{{ $municipio->municipio }}">{{ $municipio->municipio }}</option>
                                        @endforeach
                                    </select>
                                    <label for="origen">Origen</label>
                                </div>
                            </div>

                            <!-- 5. Destino -->
                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="destino" name="destino" autocomplete="off">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($municipios as $municipio)
                                            <option value="{{ $municipio->municipio }}">{{ $municipio->municipio }}</option>
                                        @endforeach
                                    </select>
                                    <label for="destino">Destino</label>
                                </div>
                            </div>

                            <!-- 6. Trayecto -->
                            <div class="col-lg-4 col-md-12">
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="trayecto" name="trayecto" autocomplete="off">
                                        <option selected disabled>Seleccionar</option>
                                        <option>DEDICADO URBANO</option>
                                        <option>DEVOLUCION CONSOLIDADO</option>
                                        <option>DEVOLUCION EXPRESA</option>
                                        <option>EXPORTACION</option>
                                        <option>IMPORTACION</option>
                                        <option>MULTIPARADA NACIONAL 1</option>
                                        <option>MULTIPARADA NACIONAL 2</option>
                                        <option>MULTIPARADA NACIONAL 3</option>
                                        <option>MULTIPARADA NACIONAL 4</option>
                                        <option>MULTIPARADA NACIONAL 5</option>
                                        <option>MUNICIPAL</option>
                                        <option>NACIONAL</option>
                                        <option>OPERACION FIJA</option>
                                        <option>RECOLECCION URBANA</option>
                                        <option>TRAYECTO ESPECIAL</option>
                                        <option>URBANO</option>
                                    </select>
                                    <label for="trayecto">Trayecto</label>
                                </div>
                            </div>

                        </div>

                        <!-- Fila 3 -->
                        <div class="row gx-1 mb-3">

                            <!-- 7. Tipo de vehiculo -->
                            <div class="col-lg-4 col-md-12">
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="tipo_vehiculo" name="tipo_vehiculo" autocomplete="off">
                                        <option selected disabled>Seleccionar</option>
                                        @foreach ($tipos_vehiculos as $tipo)
                                            <option value="{{ $tipo->tipo }}" data-minimo="{{ $tipo->minimo }}" data-maximo="{{ $tipo->maximo }}">{{ $tipo->tipo }}</option>
                                        @endforeach
                                    </select>
                                    <label for="tipo_vehiculo">Tipo de vehículo</label>
                                </div>
                            </div>

                            <!-- 8 y 9. Mínimo y Máximo (Agrupados) -->
                            <div class="col-lg-4 col-md-12">
                                <div class="row gx-1 mx-2">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="minimo" name="minimo" readonly placeholder="Mínimo">
                                            <label for="minimo">Mínimo</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="maximo" name="maximo" readonly placeholder="Máximo">
                                            <label for="maximo">Máximo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 10. Carroceria -->
                            <div class="col-lg-4 col-md-12">
                                <div class="form-floating mb-3 mx-3">
                                    <select class="form-select" id="tipo_carroceria" name="tipo_carroceria" autocomplete="off">
                                        <option selected disabled>Seleccionar</option>
                                        <option value="PANEL">PANEL</option>
                                        <option value="FURGONADO">FURGONADO</option>
                                        <option value="CARROZADO">CARROZADO</option>
                                        <option value="PLANCHON">PLANCHON</option>
                                        <option value="PORTACONTENEDOR -20">PORTACONTENEDOR -20"</option>
                                        <option value="PORTACONTENEDOR -40">PORTACONTENEDOR -40"</option>
                                    </select>
                                    <label for="tipo_carroceria">Carrocería</label>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- Actions -->
                    <div class="row m-2 py-3 px-3 d-flex align-items-center" style="background-color: #F1F5FA; border-radius: 4px;">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary py-2 me-2">
                                <svg class="me-1" width="16px" height="16px" viewBox="-0.01 -0.008 100.016 100.016" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#23475F" d="M88.555-.008H83v.016a2 2 0 0 1-2 2H19a2 2 0 0 1-2-2v-.016H4a4 4 0 0 0-4 4v92.016a4 4 0 0 0 4 4h92a4 4 0 0 0 4-4V11.517c.049-.089-11.436-11.454-11.445-11.525z"></path><path fill="#1C3C50" d="M81.04 53.008H18.96a2 2 0 0 0-2 2v45h66.08v-45c0-1.106-.895-2-2-2zm-61.957-10h61.834a2 2 0 0 0 2-2V.547A1.993 1.993 0 0 1 81 2.007H19c-.916 0-1.681-.62-1.917-1.46v40.46a2 2 0 0 0 2 2.001z"></path><path fill="#EBF0F1" d="M22 55.977h56a2 2 0 0 1 2 2v37.031a2 2 0 0 1-2 2H22c-1.104 0-2-.396-2-1.5V57.977a2 2 0 0 1 2-2z"></path><path fill="#BCC4C8" d="M25 77.008h50v1H25v-1zm0 10h50v1H25v-1z"></path><path fill="#1C3C50" d="M7 84.008h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm83 0h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2z"></path><path fill="#BCC4C8" d="M37 1.981v36.026a2 2 0 0 0 2 2h39a2 2 0 0 0 2-2V1.981c0 .007-42.982.007-43 0zm37 29.027a2 2 0 0 1-2 2h-6a2 2 0 0 1-2-2V10.981a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v20.027z"></path><path fill="#FF9D00" d="M78 55.977H22a2 2 0 0 0-2 2v10.031h60V57.977a2 2 0 0 0-2-2z"></path></g></svg>
                                Guardar
                            </button>
                            <a class="btn py-2 btn-cancel" href="{{ route('price.index') }}">
                                <svg class="me-1" height="16px" width="16px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.002 512.002" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FF3F62;" d="M372.364,141.307c-7.602-1.092-15.372-1.669-23.273-1.669c-7.903,0-15.67,0.577-23.273,1.669 c-21.879,3.142-42.367,10.643-60.551,21.602c-10.918,6.578-21.003,14.403-30.061,23.273c-24.987,24.458-42.152,56.868-47.354,93.092 c-1.094,7.602-1.669,15.371-1.669,23.273c0,7.9,0.576,15.669,1.669,23.273c11.328,78.842,79.312,139.636,161.24,139.636 c89.827,0,162.909-73.083,162.909-162.909C512,220.62,451.205,152.636,372.364,141.307z M398.46,319.003 c9.087,9.087,9.087,23.824,0,32.912c-4.546,4.544-10.501,6.816-16.454,6.816c-5.958,0-11.916-2.271-16.457-6.816l-16.458-16.457 v0.003l-16.454,16.454c-4.546,4.544-10.501,6.816-16.457,6.816c-5.955,0-11.913-2.271-16.454-6.816 c-7.061-7.059-8.609-17.517-4.703-26.096c1.125-2.467,2.673-4.786,4.703-6.816l16.455-16.457l-16.457-16.457 c-2.031-2.031-3.579-4.349-4.703-6.816c-3.907-8.581-2.358-19.039,4.703-26.098c7.058-7.058,17.512-8.608,26.093-4.703 c2.467,1.123,4.788,2.675,6.819,4.704l16.454,16.454v0.002l16.457-16.455c2.028-2.031,4.349-3.581,6.816-4.703 c8.578-3.908,19.037-2.357,26.096,4.701c9.087,9.089,9.087,23.824,0,32.914l-16.457,16.457L398.46,319.003z"></path> <path style="fill:#D6D5D8;" d="M186.182,186.181H46.545H23.273C10.422,186.181,0,175.761,0,162.908v139.638 c0,12.851,10.422,23.273,23.273,23.273h162.909v-23.273c0-7.902,0.576-15.67,1.669-23.273c5.204-36.225,22.367-68.634,47.354-93.092 H186.182z"></path> <path style="fill:#5286F9;" d="M349.091,46.546H186.182H23.273C10.422,46.546,0,56.966,0,69.819v93.089 c0,12.853,10.422,23.273,23.273,23.273h23.273h139.636h49.025c9.058-8.87,19.143-16.694,30.061-23.273 c18.185-10.958,38.673-18.458,60.551-21.602c7.602-1.092,15.369-1.669,23.273-1.669c7.9,0,15.67,0.577,23.273,1.669V69.819 C372.364,56.966,361.942,46.546,349.091,46.546z"></path> <path style="fill:#830018;" d="M382.003,302.546l16.457-16.457c9.087-9.089,9.087-23.824,0-32.914 c-7.061-7.058-17.518-8.609-26.096-4.701c-2.467,1.123-4.788,2.673-6.816,4.703l-16.457,16.455v-0.002l-16.454-16.454 c-2.031-2.031-4.352-3.582-6.819-4.704c-8.581-3.905-19.037-2.355-26.093,4.703c-7.061,7.061-8.609,17.517-4.703,26.098 c1.125,2.467,2.673,4.785,4.703,6.816l16.457,16.457l-16.457,16.457c-2.031,2.029-3.579,4.349-4.703,6.816 c-3.907,8.58-2.358,19.039,4.703,26.096c4.543,4.544,10.501,6.816,16.454,6.816c5.958,0,11.913-2.271,16.457-6.816l16.455-16.454 v-0.003l16.457,16.457c4.543,4.544,10.501,6.816,16.457,6.816c5.955,0,11.909-2.271,16.454-6.816c9.087-9.087,9.087-23.824,0-32.912 L382.003,302.546z"></path> <path style="fill:#FF0C38;" d="M332.637,351.915c-4.546,4.544-10.501,6.816-16.457,6.816c-5.955,0-11.913-2.271-16.454-6.816 c-7.061-7.059-8.609-17.517-4.703-26.096c1.125-2.467,2.673-4.786,4.703-6.816l16.455-16.457l-16.457-16.457 c-2.031-2.031-3.579-4.349-4.703-6.816c-3.907-8.581-2.358-19.037,4.703-26.098c7.058-7.058,17.512-8.608,26.093-4.703 c2.467,1.123,4.788,2.675,6.819,4.704l16.454,16.454V139.637c-7.903,0-15.67,0.577-23.273,1.669 c-21.879,3.142-42.367,10.643-60.551,21.602c-10.918,6.578-21.003,14.403-30.061,23.273c-24.987,24.458-42.152,56.868-47.354,93.092 c-1.094,7.602-1.669,15.371-1.669,23.273c0,7.9,0.576,15.669,1.669,23.273c11.328,78.842,79.312,139.636,161.24,139.636V335.462 L332.637,351.915z"></path> <path style="fill:#D6D5D8;" d="M186.182,325.819h1.669c-1.094-7.604-1.669-15.372-1.669-23.273V325.819z"></path> <path style="fill:#C3C3C7;" d="M186.182,186.181H46.545H23.273C10.422,186.181,0,175.761,0,162.908v139.638 c0,12.851,10.422,23.273,23.273,23.273h162.909v-23.273V186.181z"></path> <path style="fill:#3D6DEB;" d="M23.273,186.181h23.273h139.636V46.546H23.273C10.422,46.546,0,56.966,0,69.819v93.089 C0,175.761,10.422,186.181,23.273,186.181z"></path> </g></svg>
                                Cancelar
                            </a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tipoVehiculoSelect = document.getElementById('tipo_vehiculo');
        const minimoInput = document.getElementById('minimo');
        const maximoInput = document.getElementById('maximo');

        if (tipoVehiculoSelect) {
            tipoVehiculoSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption && !selectedOption.disabled) {
                    const minimo = selectedOption.getAttribute('data-minimo') || 'N/A';
                    const maximo = selectedOption.getAttribute('data-maximo') || 'N/A';
                    
                    // Format as currency or number if needed, but simple text updates fine.
                    minimoInput.value = formatNumber(minimo);
                    maximoInput.value = formatNumber(maximo);
                } else {
                    minimoInput.value = '';
                    maximoInput.value = '';
                }
            });
        }

        function formatNumber(num) {
            if (num && !isNaN(num)) {
                return Number(num).toLocaleString('es');
            }
            return num;
        }

        // AJAX Submission
        const form = document.getElementById('cotizarForm');
        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                
                try {
                    const response = await fetch('{{ route('price.storeCotizar') }}', {
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
                            text: "Cotización ingresada correctamente",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then(() => {
                            window.location = "{{ route('price.index') }}";
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
                            });
                        } else {
                            let errorText = 'Hubo un error al guardar';
                            Swal.fire({ title: "¡Error!", text: errorText, icon: "error" });
                        }
                    }
                } catch (error) {
                    Swal.fire({ title: "¡Error!", text: "Error de red: " + error.message, icon: "error" });
                }
            });
        }
    });
</script>

<x-footer />