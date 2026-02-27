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
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="24px" height="24px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#F2F2F2;" d="M509.653,113.512l-85.511-85.511c-1.505-1.503-3.543-2.347-5.669-2.347H93.528 c-4.428,0-8.017,3.588-8.017,8.017v470.313c0,4.428,3.588,8.017,8.017,8.017h410.455c4.428,0,8.017-3.588,8.017-8.017V119.182 C512,117.056,511.156,115.017,509.653,113.512z"></path> <g> <path style="fill:#E5E5E5;" d="M511.982,118.826c-0.089-1.996-0.912-3.893-2.33-5.312L424.14,28.002 c-1.504-1.504-3.542-2.348-5.668-2.348h-0.356v85.156c0,4.427,3.589,8.017,8.017,8.017H511.982z"></path> <path style="fill:#E5E5E5;" d="M93.528,25.653c-4.428,0-8.017,3.588-8.017,8.017v470.313c0,4.428,3.588,8.017,8.017,8.017h375.888 L136.144,25.653H93.528z"></path> </g> <path style="fill:#666666;" d="M214.313,0H24.05C10.789,0,0,10.789,0,24.05v258.672c0,13.261,10.789,24.05,24.05,24.05h190.263 c13.261,0,24.05-10.789,24.05-24.05V24.05C238.363,10.789,227.574,0,214.313,0z"></path> <path style="fill:#F7D04A;" d="M358.614,247.983c-65.717,0-119.182,53.465-119.182,119.182s53.465,119.182,119.182,119.182 s119.182-53.465,119.182-119.182S424.33,247.983,358.614,247.983z"></path> <path style="fill:#F3B41B;" d="M382.129,462.831c-65.717,0-119.182-53.465-119.182-119.182c0-26.875,8.946-51.698,24.009-71.656 c-28.845,21.772-47.525,56.331-47.525,95.172c0,65.717,53.465,119.182,119.182,119.182c38.841,0,73.4-18.68,95.172-47.525 C433.828,453.885,409.005,462.831,382.129,462.831z"></path> <path style="fill:#EB6836;" d="M376.915,360.217l-12.423-0.366v-44.528h28.326c4.428,0,8.017-3.588,8.017-8.017 c0-4.428-3.588-8.017-8.017-8.017h-28.326v-9.086c0-4.428-3.588-8.017-8.017-8.017c-4.428,0-8.017,3.588-8.017,8.017v9.086h-8.017 c-13.261,0-24.05,10.789-24.05,24.05v27.791c0,13.217,10.719,23.98,23.92,24.05l8.147,0.239v43.585h-24.05 c-4.428,0-8.017,3.588-8.017,8.017s3.588,8.017,8.017,8.017h24.05v9.086c0,4.428,3.588,8.017,8.017,8.017 c4.428,0,8.017-3.588,8.017-8.017v-9.086h12.292c13.261,0,24.05-10.789,24.05-24.05v-26.722 C400.835,371.05,390.116,360.288,376.915,360.217z M340.679,359.151c-0.078-0.002-0.157-0.003-0.236-0.003 c-4.421,0-8.017-3.596-8.017-8.017V323.34c0-4.421,3.596-8.017,8.017-8.017h8.017v44.057L340.679,359.151z M384.802,410.99 c0,4.421-3.596,8.017-8.017,8.017h-12.292v-43.114l12.056,0.355c0.078,0.002,0.157,0.003,0.236,0.003 c4.421,0,8.017,3.596,8.017,8.017V410.99z"></path> <path style="fill:#F2F2F2;" d="M204.693,25.653H33.67c-4.428,0-8.017,3.588-8.017,8.017v42.756c0,4.428,3.588,8.017,8.017,8.017 h171.023c4.428,0,8.017-3.588,8.017-8.017V33.67C212.71,29.242,209.122,25.653,204.693,25.653z"></path> <g> <path style="fill:#62C9CC;" d="M33.67,25.653c-4.428,0-8.017,3.588-8.017,8.017v42.756c0,4.428,3.588,8.017,8.017,8.017h34.739 l58.789-58.789H33.67z"></path> <path style="fill:#62C9CC;" d="M204.693,25.653h-29.929l-58.789,58.789h88.718c4.428,0,8.017-3.588,8.017-8.017V33.67 C212.71,29.242,209.122,25.653,204.693,25.653z"></path> </g> <g> <path style="fill:#EF9D3C;" d="M67.875,94.063H33.67c-4.428,0-8.017,3.588-8.017,8.017v34.205c0,4.428,3.588,8.017,8.017,8.017 h34.205c4.428,0,8.017-3.588,8.017-8.017v-34.205C75.891,97.651,72.303,94.063,67.875,94.063z"></path> <path style="fill:#EF9D3C;" d="M135.749,94.063h-34.205c-4.428,0-8.017,3.588-8.017,8.017v34.205c0,4.428,3.588,8.017,8.017,8.017 h34.205c4.428,0,8.017-3.588,8.017-8.017v-34.205C143.766,97.651,140.178,94.063,135.749,94.063z"></path> <path style="fill:#EF9D3C;" d="M67.875,162.472H33.67c-4.428,0-8.017,3.588-8.017,8.017v34.205c0,4.428,3.588,8.017,8.017,8.017 h34.205c4.428,0,8.017-3.588,8.017-8.017v-34.205C75.891,166.06,72.303,162.472,67.875,162.472z"></path> <path style="fill:#EF9D3C;" d="M135.749,162.472h-34.205c-4.428,0-8.017,3.588-8.017,8.017v34.205c0,4.428,3.588,8.017,8.017,8.017 h34.205c4.428,0,8.017-3.588,8.017-8.017v-34.205C143.766,166.06,140.178,162.472,135.749,162.472z"></path> <path style="fill:#EF9D3C;" d="M67.875,230.881H33.67c-4.428,0-8.017,3.588-8.017,8.017v34.205c0,4.428,3.588,8.017,8.017,8.017 h34.205c4.428,0,8.017-3.588,8.017-8.017v-34.205C75.891,234.469,72.303,230.881,67.875,230.881z"></path> <path style="fill:#EF9D3C;" d="M135.749,230.881h-34.205c-4.428,0-8.017,3.588-8.017,8.017v34.205c0,4.428,3.588,8.017,8.017,8.017 h34.205c4.428,0,8.017-3.588,8.017-8.017v-34.205C143.766,234.469,140.178,230.881,135.749,230.881z"></path> <path style="fill:#EF9D3C;" d="M204.159,94.063h-34.205c-4.428,0-8.017,3.588-8.017,8.017v34.205c0,4.428,3.588,8.017,8.017,8.017 h34.205c4.428,0,8.017-3.588,8.017-8.017v-34.205C212.175,97.651,208.587,94.063,204.159,94.063z"></path> </g> <path style="fill:#F7D04A;" d="M204.693,162.472h-34.205c-4.428,0-8.017,3.588-8.017,8.017v102.614c0,4.428,3.588,8.017,8.017,8.017 h34.205c4.428,0,8.017-3.588,8.017-8.017V170.489C212.71,166.06,209.122,162.472,204.693,162.472z"></path> <path style="fill:#666666;" d="M297.846,92.994c-2.183,0-4.358-0.886-5.941-2.632l-15.51-17.102 c-2.974-3.279-2.727-8.35,0.554-11.324c3.276-2.976,8.349-2.729,11.324,0.554l15.51,17.102c2.974,3.279,2.727,8.35-0.554,11.324 C301.695,92.308,299.767,92.994,297.846,92.994z"></path> <g> <path style="fill:#62C9CC;" d="M464.11,214.126L336.377,86.391c-1.12-1.119-2.545-1.882-4.097-2.192l-30.233-6.046 c-2.627-0.522-5.344,0.297-7.241,2.192c-1.894,1.895-2.717,4.612-2.192,7.241l6.046,30.233c0.31,1.552,1.073,2.977,2.192,4.097 l127.735,127.735c5.116,5.116,12.417,7.67,19.607,6.89c6.428-0.697,11.449-3.932,15.917-8.402 C473.488,238.761,473.488,223.505,464.11,214.126z"></path> <rect x="300.46" y="122.86" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 514.0678 508.8909)" style="fill:#62C9CC;" width="123.937" height="50.238"></rect> </g> <path style="fill:#F7D04A;" d="M302.047,78.153c-5.513-1.096-10.535,3.916-9.433,9.433l6.046,30.233 c0.31,1.552,1.073,2.977,2.192,4.097l35.525-35.525c-1.12-1.119-2.545-1.882-4.097-2.192L302.047,78.153z"></path> <path style="fill:#50A9A9;" d="M464.11,214.126l-40.095-40.095l-35.525,35.525l40.095,40.095c5.021,5.021,12.2,7.479,19.248,6.84 c6.562-0.595,11.719-3.795,16.276-8.351C473.488,238.761,473.488,223.505,464.11,214.126z"></path> <path style="fill:#666666;" d="M451.639,221.01c-2.051,0-4.103-0.782-5.669-2.347c-3.131-3.132-3.131-8.207,0-11.338l12.323-12.322 l-37.701-35.802c-3.211-3.05-3.342-8.124-0.293-11.333c3.051-3.211,8.125-3.342,11.333-0.293l43.668,41.467 c1.568,1.489,2.469,3.548,2.496,5.71c0.028,2.161-0.819,4.243-2.346,5.772l-18.14,18.14 C455.742,220.226,453.69,221.01,451.639,221.01z"></path> <g> <path style="fill:#808080;" d="M198.28,383.733h-53.445c-4.428,0-8.017-3.588-8.017-8.017c0-4.428,3.588-8.017,8.017-8.017h53.445 c4.428,0,8.017,3.588,8.017,8.017C206.296,380.145,202.708,383.733,198.28,383.733z"></path> <path style="fill:#808080;" d="M198.28,426.489h-53.445c-4.428,0-8.017-3.588-8.017-8.017s3.588-8.017,8.017-8.017h53.445 c4.428,0,8.017,3.588,8.017,8.017S202.708,426.489,198.28,426.489z"></path> </g> </g></svg>
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
