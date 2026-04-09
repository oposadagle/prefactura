<x-header />
<style>
    .celdas {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #656C82;
    }
</style>

<!-- Sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg width="28px" height="28px" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                        class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M4 83.05v-38.1c0-5.26 4.27-9.53 9.53-9.53h100.94c5.26 0 9.53 4.27 9.53 9.53v38.11c0 5.26-4.27 9.53-9.53 9.53H13.53C8.27 92.58 4 88.32 4 83.05z"
                                fill="#424242"></path>
                            <circle cx="27.29" cy="65.26" r="13.41" fill="#4caf50"></circle>
                            <path
                                d="M17.93 66.44c-1.14-.36-1.45-4.36 1.22-7.57c3.98-4.79 9.71-4.67 10.32-2.12c.85 3.57-3.67 2.16-7.11 5.04c-2.14 1.8-2.62 5.21-4.43 4.65z"
                                fill="#6fd86f"></path>
                            <circle cx="64" cy="65.26" r="13.41" fill="#ffca28"></circle>
                            <path
                                d="M54.64 66.45c-1.14-.36-1.45-4.36 1.22-7.57c3.98-4.79 9.71-4.67 10.32-2.12c.85 3.57-3.67 2.16-7.11 5.04c-2.15 1.8-2.62 5.21-4.43 4.65z"
                                fill="#fff59d"></path>
                            <circle cx="100.71" cy="65.26" r="13.41" fill="#f44336"></circle>
                            <path
                                d="M91.35 66.45c-1.14-.36-1.45-4.36 1.22-7.57c3.98-4.79 9.71-4.67 10.32-2.12c.85 3.57-3.67 2.16-7.11 5.04c-2.15 1.8-2.62 5.21-4.43 4.65z"
                                fill="#ff8155"></path>
                            <path
                                d="M12.77 58.77c-.47.92-1.89.88-1.76-.52c.32-3.41 2.26-6.09 3.85-7.73c3.16-3.32 7.8-5.21 12.43-5.2c4.63-.02 9.27 1.88 12.44 5.19c1.59 1.64 3.85 5.3 3.86 7.85c0 1.11-1.26 1.41-1.72.51c-1.15-2.24-4.71-9.55-14.57-9.55s-13.39 7.23-14.53 9.45z"
                                fill="#757575"></path>
                            <path
                                d="M49.48 58.77c-.47.92-1.89.88-1.76-.52c.32-3.41 2.26-6.09 3.85-7.73c3.16-3.32 7.8-5.21 12.43-5.2c4.63-.02 9.27 1.88 12.44 5.19c1.59 1.64 3.85 5.3 3.86 7.85c0 1.11-1.26 1.41-1.72.51c-1.15-2.24-4.71-9.55-14.57-9.55s-13.39 7.23-14.53 9.45z"
                                fill="#757575"></path>
                            <path
                                d="M86.18 58.77c-.47.92-1.89.88-1.76-.52c.32-3.41 2.26-6.09 3.85-7.73c3.16-3.32 7.8-5.21 12.43-5.2c4.63-.02 9.27 1.88 12.44 5.19c1.59 1.64 3.85 5.3 3.86 7.85c0 1.11-1.26 1.41-1.72.51c-1.15-2.24-4.71-9.55-14.57-9.55s-13.38 7.23-14.53 9.45z"
                                fill="#757575"></path>
                        </g>
                    </svg>
                    <h4 class="card-title" style="margin-left: 10px;">TRAFICO</h4>
                </div>

                <a class="btn btn-primary py-2" style="font-size: 12px;font-family: Titillium Web;font-weight: 700;"
                    href="{{ route('solicitud.transito') }}">
                    <svg width="16" height="16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832" y2="-2075.914"
                                gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#18884f" />
                                <stop offset="0.5" stop-color="#117e43" />
                                <stop offset="1" stop-color="#0b6631" />
                            </linearGradient>
                        </defs>
                        <title>file_type_excel</title>
                        <path
                            d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z"
                            style="fill:#185c37" />
                        <path d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z"
                            style="fill:#21a366" />
                        <path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41" />
                        <path
                            d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z"
                            style="opacity:0.10000000149011612;isolation:isolate" />
                        <path
                            d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z"
                            style="opacity:0.20000000298023224;isolation:isolate" />
                        <path
                            d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z"
                            style="opacity:0.20000000298023224;isolation:isolate" />
                        <path
                            d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z"
                            style="opacity:0.20000000298023224;isolation:isolate" />
                        <path
                            d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z"
                            style="fill:url(#a)" />
                        <path
                            d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z"
                            style="fill:#fff" />
                        <path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481" />
                        <path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41" />
                    </svg>
                    <i class="me-2"></i>
                    DESCARGAR
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">ID</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14"
                                        height="14" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z"
                                                stroke="#C3FF93" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg> CARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg
                                        width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M12 7V12L9.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                stroke="#C3FF93" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg> CARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg
                                        width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z"
                                                stroke="#C3FF93" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg> DESCARGUE</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">NIT</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CLIENTE</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">ESTADO</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">CONDICION PAGO
                                </th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">PEDIDO</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">REMESA</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">RADICADO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">TIPO TRAYECTO
                                </th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">TIPO VEHICULO
                                </th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CONDUCTOR</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA CONDUCTOR
                                </th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TELEFONO
                                    CONDUCTOR</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">USUARIO GPS</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CLAVE GPS</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">EMPRESA GPS</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">OBSERVACIONES
                                </th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->id }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->fecha_cargue }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->hora_cargue }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->fecha_descargue }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->nit }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->cliente }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <span class="badge bg-{{ $diario->color }}"
                                            style="color:{{ $diario->font }};font-weight:600;">{{ strToUpper($diario->state) }}</span>
                                    </td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->paytype) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->retorno) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->remesa) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->razon) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strToUpper($diario->radicado) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strtoupper($diario->origen) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ strtoupper($diario->destino) }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->tipo_trayecto }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->tipo_vehiculo }}</td>
                                    <td class="celdas fw-bold"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;color: #021526;">
                                        {{ $diario->placa }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->conductor }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->cedula_conductor }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->telefono_conductor }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->usuario_gps }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->clave_gps }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        {{ $diario->empresa_gps }}</td>
                                    <td class="celdas"
                                        style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @if (is_null($diario->tradate))
                                            <!-- Enlace habilitado si tradate es nulo -->
                                            <a href="#" data-id="{{ $diario->id }}"
                                                class="btn btn-outline-primary py-0 my-0" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter7">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        @else
                                            <!-- Enlace deshabilitado si tradate no es nulo -->
                                            <a href="#" class="btn btn-outline-primary py-0 my-0 disabled"
                                                tabindex="-1" aria-disabled="true">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        @endif
                                        <!-- El segundo enlace siempre habilitado -->
                                        <a href="#" data-id="{{ $diario->id }}"
                                            class="btn btn-outline-success py-0 my-0" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter8">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><!--end /table-->
                </div><!--end /tableresponsive-->

            </div>
        </div>
    </div>
</div>

<!-- Inicio modal agregar observaciones -->
<div class="modal fade" id="exampleModalCenter7" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FFFFFF">📄 Agregar
                    observaciones</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn3" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" name="trauser"
                                    value="{{ $userName }}" readonly>
                                <label>Usuario</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control" name="tradate"
                                    value="{{ $actual->format('Y-m-d H:i:s') }}" autocomplete="off" readonly>
                                <label>Fecha y hora</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="floatingTextarea2" name="tranote" autocomplete="off" style="height: 100px"></textarea>
                                <label>Observaciones</label>
                            </div>
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<!-- Inicio modal agregar observaciones -->
<div class="modal fade" id="exampleModalCenter8" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FFFFFF">📄 Ver
                    observaciones</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn3" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="mb-2">
                                <label>Usuario</label>
                                <p id="modalUser" class="form-control-plaintext"></p>
                            </div>
                            <div class="mb-2">
                                <label>Fecha y hora</label>
                                <p id="modalDate" class="form-control-plaintext"></p>
                            </div>
                            <div class="mb-2">
                                <label>Observaciones</label>
                                <p id="modalNote" class="form-control-plaintext"></p>
                            </div>
                            <button type="button" class="btn btn-soft-secondary"
                                data-bs-dismiss="modal">Cerrar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter7');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos

            // Construir la URL de la acción del formulario
            var routeTemplate = '{{ route('solicitud.update8', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acción del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acción del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter8');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos

            // Construir la URL para obtener los datos
            var routeTemplate = '{{ route('solicitud.show2', ['id' => ':id']) }}';
            var dataUrl = routeTemplate.replace(':id', id);

            // Realizar la solicitud AJAX para obtener los datos
            fetch(dataUrl)
                .then(response => response.json())
                .then(data => {
                    // Actualizar los campos del modal con los datos recibidos
                    document.getElementById('modalUser').innerText = data.trauser;
                    document.getElementById('modalDate').innerText = data.tradate;
                    document.getElementById('modalNote').innerText = data.tranote;
                })
                .catch(error => console.error('Error al obtener los datos:', error));
        });
    });
</script>


@if (session('success'))
    <script>
        Swal.fire("Observación agregada correctamente!").then((result) => {
            if (result.isConfirmed) {
                window.location = "/trafico";
            }
        });
    </script>
@endif

<x-footer />
