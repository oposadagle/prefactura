<x-header />
<style>.celdas {    
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #656C82;
    }
</style>

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="row">
    <div class="">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex align-items-center">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="28px" height="28px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#E21B1B;" d="M0.2,137.376v282.816c0.044,15.976,12.984,28.916,28.96,28.96H483.04 c15.976-0.044,28.916-12.984,28.96-28.96V91.808c-0.044-15.976-12.984-28.916-28.96-28.96H74.512"></path> <path d="M59.592,137.328H0l74.488-74.464v59.592C74.448,130.663,67.798,137.301,59.592,137.328z"></path> <g> <rect x="147.058" y="230.773" style="fill:#FFFFFF;" width="26.216" height="103.067"></rect> <path style="fill:#FFFFFF;" d="M254.096,123.912L128.96,207.808H379.2L254.096,123.912z M254.096,185.84 c-7.63,0-13.816-6.186-13.816-13.816s6.186-13.816,13.816-13.816c7.63,0,13.816,6.186,13.816,13.816l0,0 C267.912,179.655,261.726,185.84,254.096,185.84z"></path> <rect x="119.571" y="358.061" style="fill:#FFFFFF;" width="269.049" height="26.216"></rect> <path style="fill:#FFFFFF;" d="M250.288,325.232v-10.744c-5.759-0.019-11.399-1.643-16.288-4.688l2.552-7.136 c4.564,2.965,9.885,4.554,15.328,4.576c7.56,0,12.672-4.36,12.672-10.4c0-5.856-4.152-9.472-12-12.672 c-10.856-4.256-17.56-9.152-17.56-18.4c0.141-9.005,7.103-16.427,16.08-17.144v-10.8h6.528v10.328 c4.859,0.037,9.627,1.321,13.848,3.728l-2.648,7.048c-4.052-2.413-8.691-3.664-13.408-3.616c-8.208,0-11.288,4.896-11.288,9.152 c0,5.536,3.944,8.304,13.208,12.136c10.968,4.48,16.504,10.008,16.504,19.488c-0.171,9.433-7.406,17.229-16.8,18.104v11.072h-6.704 L250.288,325.232z"></path> <rect x="187.686" y="230.773" style="fill:#FFFFFF;" width="26.216" height="103.067"></rect> <rect x="294.281" y="230.773" style="fill:#FFFFFF;" width="26.216" height="103.067"></rect> <rect x="334.909" y="230.773" style="fill:#FFFFFF;" width="26.216" height="103.067"></rect> </g> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">HISTORIAL BANCARIO</h4>
                </div>
                <div class="button-items">
                    <a class="btn btn-outline-primary py-2" target="_blank" style="font-size: 12px; font-family: Titillium Web; font-weight: 700;" href="{{ route('datos-bancarios.create') }}">
                        <i class="fas fa-plus-circle me-1"></i>
                        AGREGAR DATO BANCARIO
                    </a>     
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">                    
                    <table id="example" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>                              
                                <th class="celdas" style="color: #FFEB00;border: 1px solid #0C213A;">PLACA</th>                                
                                <th class="celdas" style="color: #FFEB00;border: 1px solid #0C213A;">ESTADO</th>
                                <th class="celdas" style="color: #FFEB00;border: 1px solid #0C213A;"><i class="ti ti-calendar me-1"></i>FECHA CREACIÓN</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0C213A;">CERTIFICACIÓN 1</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0C213A;">CERTIFICACIÓN 2</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">CONDUCTOR</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">CÉDULA CONDUCTOR</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">TELÉFONO CONDUCTOR</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">PROPIETARIO</th>                          
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">CÉDULA PROPIETARIO</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">TELÉFONO PROPIETARIO</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">TENEDOR</th> 
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">CÉDULA TENEDOR</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">TELÉFONO TENEDOR</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($vehiculos as $vehiculo)
                                <tr style="text-align: center;">

                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        @php
                                            $claseBoton = 'btn btn-warning py-0 px-2 fw-bold fs-6';
                                        @endphp
                                        <span class="{{ $claseBoton }}">{{ strToUpper($vehiculo->placa) }}</span>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        @php
                                            $claseBoton = 'btn btn-success py-0 px-2 fw-bold fs-6';
                                        @endphp
                                        <span class="{{ $claseBoton }}">{{ strToUpper($vehiculo->states) }}</span>
                                    </td>   
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->created_at }}</td>

                                    <!-- Certificacion 1 -->
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        @if($vehiculo->certia_base64)
                                            <a href="{{ route('vehiculo.certificado', ['id' => $vehiculo->id, 'tipo' => 'a']) }}" target="_blank" class="btn btn-info px-2 py-0" title="Ver archivo">
                                                <svg height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#E2E5E7;" d="M128,0c-17.6,0-32,14.4-32,32v448c0,17.6,14.4,32,32,32h320c17.6,0,32-14.4,32-32V128L352,0H128z"></path> <path style="fill:#B0B7BD;" d="M384,128h96L352,0v96C352,113.6,366.4,128,384,128z"></path> <polygon style="fill:#CAD1D8;" points="480,224 384,128 480,128 "></polygon> <path style="fill:#FE252D;" d="M416,416c0,8.8-7.2,16-16,16H48c-8.8,0-16-7.2-16-16V256c0-8.8,7.2-16,16-16h352c8.8,0,16,7.2,16,16 V416z"></path> <g> <path style="fill:#FFFFFF;" d="M101.744,303.152c0-4.224,3.328-8.832,8.688-8.832h29.552c16.64,0,31.616,11.136,31.616,32.48 c0,20.224-14.976,31.488-31.616,31.488h-21.36v16.896c0,5.632-3.584,8.816-8.192,8.816c-4.224,0-8.688-3.184-8.688-8.816V303.152z M118.624,310.432v31.872h21.36c8.576,0,15.36-7.568,15.36-15.504c0-8.944-6.784-16.368-15.36-16.368H118.624z"></path> <path style="fill:#FFFFFF;" d="M196.656,384c-4.224,0-8.832-2.304-8.832-7.92v-72.672c0-4.592,4.608-7.936,8.832-7.936h29.296 c58.464,0,57.184,88.528,1.152,88.528H196.656z M204.72,311.088V368.4h21.232c34.544,0,36.08-57.312,0-57.312H204.72z"></path> <path style="fill:#FFFFFF;" d="M303.872,312.112v20.336h32.624c4.608,0,9.216,4.608,9.216,9.072c0,4.224-4.608,7.68-9.216,7.68 h-32.624v26.864c0,4.48-3.184,7.92-7.664,7.92c-5.632,0-9.072-3.44-9.072-7.92v-72.672c0-4.592,3.456-7.936,9.072-7.936h44.912 c5.632,0,8.96,3.344,8.96,7.936c0,4.096-3.328,8.704-8.96,8.704h-37.248V312.112z"></path> </g> <path style="fill:#CAD1D8;" d="M400,432H96v16h304c8.8,0,16-7.2,16-16v-16C416,424.8,408.8,432,400,432z"></path> </g></svg>
                                            </a>
                                        @else
                                            <span class="text-muted"><i class="mdi mdi-close"></i></span>
                                        @endif
                                    </td>
                                    
                                    <!-- Certificacion 2 -->
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        @if($vehiculo->certib_base64)
                                            <a href="{{ route('vehiculo.certificado', ['id' => $vehiculo->id, 'tipo' => 'b']) }}" target="_blank" class="btn btn-info px-2 py-0" title="Ver archivo">
                                                <svg height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#E2E5E7;" d="M128,0c-17.6,0-32,14.4-32,32v448c0,17.6,14.4,32,32,32h320c17.6,0,32-14.4,32-32V128L352,0H128z"></path> <path style="fill:#B0B7BD;" d="M384,128h96L352,0v96C352,113.6,366.4,128,384,128z"></path> <polygon style="fill:#CAD1D8;" points="480,224 384,128 480,128 "></polygon> <path style="fill:#FE252D;" d="M416,416c0,8.8-7.2,16-16,16H48c-8.8,0-16-7.2-16-16V256c0-8.8,7.2-16,16-16h352c8.8,0,16,7.2,16,16 V416z"></path> <g> <path style="fill:#FFFFFF;" d="M101.744,303.152c0-4.224,3.328-8.832,8.688-8.832h29.552c16.64,0,31.616,11.136,31.616,32.48 c0,20.224-14.976,31.488-31.616,31.488h-21.36v16.896c0,5.632-3.584,8.816-8.192,8.816c-4.224,0-8.688-3.184-8.688-8.816V303.152z M118.624,310.432v31.872h21.36c8.576,0,15.36-7.568,15.36-15.504c0-8.944-6.784-16.368-15.36-16.368H118.624z"></path> <path style="fill:#FFFFFF;" d="M196.656,384c-4.224,0-8.832-2.304-8.832-7.92v-72.672c0-4.592,4.608-7.936,8.832-7.936h29.296 c58.464,0,57.184,88.528,1.152,88.528H196.656z M204.72,311.088V368.4h21.232c34.544,0,36.08-57.312,0-57.312H204.72z"></path> <path style="fill:#FFFFFF;" d="M303.872,312.112v20.336h32.624c4.608,0,9.216,4.608,9.216,9.072c0,4.224-4.608,7.68-9.216,7.68 h-32.624v26.864c0,4.48-3.184,7.92-7.664,7.92c-5.632,0-9.072-3.44-9.072-7.92v-72.672c0-4.592,3.456-7.936,9.072-7.936h44.912 c5.632,0,8.96,3.344,8.96,7.936c0,4.096-3.328,8.704-8.96,8.704h-37.248V312.112z"></path> </g> <path style="fill:#CAD1D8;" d="M400,432H96v16h304c8.8,0,16-7.2,16-16v-16C416,424.8,408.8,432,400,432z"></path> </g></svg>
                                            </a>
                                        @else
                                            <span class="text-muted"><i class="mdi mdi-close"></i></span>
                                        @endif
                                    </td>                            
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ strToUpper($vehiculo->conductor) }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->cedula_conductor }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->telefono_conductor }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->propietario }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->cedpro }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->telpro }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->tenedor }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->cedten }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->telten }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><!--end /table-->
                </div><!--end /tableresponsive-->
            </div>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('success') }}"
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}"
        });
    </script>
@endif

<x-footer />
