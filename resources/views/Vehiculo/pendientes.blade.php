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
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve" width="28px" height="28px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFFFFF;" d="M256,508C116.825,508,4,395.175,4,255.999S116.825,4,256,4S508,116.825,508,256 C507.842,395.111,395.111,507.842,256,508z"></path> <path style="fill:#CCCCCC;" d="M256,8c136.966,0,248,111.034,248,248S392.967,504,256,504S8,392.967,8,256 C8.154,119.097,119.097,8.154,256,8 M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z"></path> <path d="M64,353.176V120.672c0.105-4.229,3.602-7.58,7.832-7.504H440.16c4.229-0.076,7.727,3.276,7.832,7.504v226.304 c0,3.42-2.772,6.192-6.192,6.192H64V353.176z"></path> <path style="fill:#2D2D2D;" d="M448,353.176v32c0.031,4.365-3.467,7.939-7.832,8H71.832c-4.365-0.062-7.863-3.634-7.832-8v-25.808 c0-3.42,2.772-6.192,6.192-6.192H448z"></path> <path style="fill:#C9C9C9;" d="M207.137,449.176h97.728c3.42-0.001,6.191-2.775,6.19-6.195c0-0.291-0.021-0.582-0.062-0.87 l-6.232-43.624c-0.437-3.048-3.048-5.312-6.128-5.312h-85.264c-3.079,0.001-5.69,2.263-6.128,5.312l-6.232,43.624 c-0.481,3.386,1.873,6.52,5.258,7.002C206.555,449.156,206.846,449.176,207.137,449.176z"></path> <path style="fill:#AAAAAA;" d="M298.632,393.176h-85.264c-3.079,0.001-5.69,2.263-6.128,5.312l-2.976,20.8 c-0.481,3.386,1.874,6.52,5.259,7.001c0.717,0.102,1.448,0.077,2.157-0.074l88.528-18.816c3.167-0.696,5.261-3.718,4.8-6.928 l-0.288-2.008C304.274,395.44,301.688,393.195,298.632,393.176z"></path> <rect x="171.999" y="449.179" style="fill:#2D2D2D;" width="168.004" height="8"></rect> <path style="fill:#939393;" d="M207.24,398.488c0.437-3.048,3.048-5.312,6.128-5.312H304l0.544,3.784l-90.904,12.545 c-3.388,0.467-6.512-1.9-6.98-5.288c-0.079-0.571-0.078-1.15,0.004-1.72L207.24,398.488z"></path> <g> <path style="fill:#999999;" d="M256,58.984L138.784,137.6h234.44L256,58.984z M256,116.992c-7.149,0-12.944-5.795-12.944-12.944 c0-7.149,5.795-12.944,12.944-12.944s12.944,5.795,12.944,12.944l0,0C268.944,111.197,263.149,116.992,256,116.992z"></path> <rect x="129.988" y="278.316" style="fill:#999999;" width="252.026" height="24.56"></rect> </g> <path style="fill:#E21B1B;" d="M252.44,247.56v-10.064c-5.395-0.019-10.678-1.54-15.256-4.392l2.4-6.688 c4.287,2.785,9.287,4.275,14.4,4.288c7.08,0,11.872-4.088,11.872-9.776c0-5.488-3.888-8.872-11.272-11.872 c-10.168-4-16.448-8.576-16.448-17.248c0.127-8.439,6.651-15.397,15.064-16.064v-10.056h6.176v9.672 c4.551,0.037,9.016,1.24,12.968,3.496l-2.504,6.584c-3.796-2.262-8.141-3.436-12.56-3.392c-7.688,0-10.576,4.584-10.576,8.576 c0,5.184,3.696,7.784,12.368,11.368c10.272,4.192,15.456,9.376,15.456,18.256c-0.159,8.845-6.95,16.154-15.76,16.96v10.4h-6.28 L252.44,247.56z"></path> <g> <rect x="155.74" y="159.078" style="fill:#FFFFFF;" width="24.56" height="96.544"></rect> <rect x="193.796" y="159.078" style="fill:#FFFFFF;" width="24.56" height="96.544"></rect> <rect x="293.638" y="159.078" style="fill:#FFFFFF;" width="24.56" height="96.544"></rect> <rect x="331.714" y="159.078" style="fill:#FFFFFF;" width="24.56" height="96.544"></rect> </g> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">PENDIENTES BANCARIOS</h4>
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
                                <th class="celdas" style="color: #FFEB00;border: 1px solid #0C213A;">CONDICION</th>
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
                                            $claseBoton = 'btn btn-primary py-0 px-2 fw-bold fs-6';
                                        @endphp
                                        <span class="{{ $claseBoton }}">{{ strToUpper($vehiculo->states) }}</span>
                                    </td>   
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->created_at }}</td>
                                    <!-- Creado Toggle Button -->
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        <form action="{{ route('vehiculo.toggleCreado', $vehiculo->id) }}" method="POST" style="margin: 0;">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary px-2 py-0" title="Marcar como Creado">
                                                <svg width="24px" height="24px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M118.9 388.7h328.6c14.3 0 25.9 11.6 25.9 25.9v208.7c0 14.3-11.6 25.9-25.9 25.9H275.6l-52.1 50.1-54.1-50.1h-50.5c-14.3 0-25.9-11.6-25.9-25.9V414.6c0-14.3 11.6-25.9 25.9-25.9z" fill="#FFEB00"></path><path d="M223.5 699.2l-54.1-50.1h-50.5c-14.3 0-25.9-11.6-25.9-25.9V414.6c0-14.3 11.6-25.9 25.9-25.9h328.7c14.3 0 25.9 11.6 25.9 25.9v208.7c0 14.3-11.6 25.9-25.9 25.9H275.7l-52.2 50z m-91.7-88.9h52.8l38.4 35.5 37-35.5h174.6V427.5H131.8v182.8z" fill="#333333"></path><path d="M321.6 267.9h508.9c14.3 0 25.9 11.6 25.9 25.9v399c0 14.3-11.6 25.9-25.9 25.9h-177L584 785.5l-72.2-66.8H321.5c-14.3 0-25.9-11.6-25.9-25.9v-399c0.1-14.3 11.7-25.9 26-25.9z" fill="#FFFFFF"></path><path d="M584.4 821.1l-82.6-76.5H321.6c-28.5 0-51.8-23.2-51.8-51.8v-399c0-28.5 23.2-51.8 51.8-51.8h508.9c28.5 0 51.8 23.2 51.8 51.8v399c0 28.5-23.2 51.8-51.8 51.8H663.9l-79.5 76.5zM321.6 293.8v399H522l61.7 57.1 59.4-57.1h187.4v-399H321.6z" fill="#333333"></path><path d="M642.2 509.5H582l-0.2 10.9c-0.3 14.1-11.8 25.4-25.9 25.4h-0.1c-13.8 0-25-11.2-25-25v-0.5l0.7-37.1c0.3-13.8 11.3-24.9 24.9-25.4 0.8-0.1 1.6-0.1 2.4-0.1h57.3v-47.4H520c-14.3 0-25.9-11.6-25.9-25.9s11.6-25.9 25.9-25.9H642c14.3 0 25.9 11.6 25.9 25.9v99.2c0 14.2-11.5 25.7-25.7 25.9z m-112.3 96.1V603c0-14.3 11.6-25.9 25.9-25.9s25.9 11.6 25.9 25.9v2.6c0 14.3-11.6 25.9-25.9 25.9s-25.9-11.6-25.9-25.9z" fill="#333333"></path></g></svg>
                                                <i class="mdi mdi-circle-outline me-1 text-warning"></i>
                                            </button>
                                        </form>
                                    </td>
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
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $vehiculo->nomten }}</td>
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
