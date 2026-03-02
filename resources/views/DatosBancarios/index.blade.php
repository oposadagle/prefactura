<x-header />
<style>
    .celdas {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #656C82;
    }
</style>
<div class="row">
    <div class="">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex align-items-center">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.026 512.026" xml:space="preserve" width="28px" height="28px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="434.185" y="382.331" transform="matrix(0.707 -0.7072 0.7072 0.707 -186.9206 451.3225)" width="34.08" height="137.836"></rect> <path style="fill:#E21B1B;" d="M238.413,0C106.748,0,0.014,106.735,0.014,238.399s106.735,238.399,238.399,238.399 s238.399-106.735,238.399-238.399l0,0C476.812,106.735,370.077,0,238.413,0z"></path> <path d="M238.413,38.608c-110.329-0.018-199.782,89.407-199.8,199.736c-0.018,110.329,89.407,199.782,199.736,199.8 c110.329,0.018,199.782-89.407,199.799-199.736c0-0.003,0-0.005,0-0.008C438.162,128.073,348.738,38.626,238.413,38.608z"></path> <g> <path style="fill:#FFFFFF;" d="M240.101,104l-108.559,72.8H348.66L240.101,104z M240.101,157.719c-6.628,0-12-5.373-12-11.999 c0-6.627,5.373-12,12-12c6.627,0,11.999,5.373,11.999,12c-0.009,6.621-5.379,11.984-11.999,11.984V157.719z"></path> <rect x="123.401" y="307.106" style="fill:#FFFFFF;" width="233.405" height="22.744"></rect> <path style="fill:#FFFFFF;" d="M236.813,278.631v-9.32c-4.998-0.015-9.893-1.423-14.136-4.064l2.216-6.192 c3.958,2.584,8.577,3.973,13.304,4c6.56,0,10.992-3.784,10.992-9.048c0-5.08-3.6-8.224-10.44-10.992 c-9.424-3.688-15.2-7.936-15.2-16c0.116-7.816,6.159-14.262,13.952-14.88V202.8h5.72v8.96c4.208,0.024,8.339,1.126,12,3.2 l-2.32,6.096c-3.515-2.096-7.539-3.184-11.632-3.144c-7.12,0-9.792,4.248-9.792,7.936c0,4.8,3.424,7.2,11.456,10.528 c9.512,3.888,14.312,8.68,14.312,16.904c-0.149,8.189-6.436,14.954-14.592,15.704v9.6h-5.84v0.047H236.813z"></path> <rect x="147.241" y="196.684" style="fill:#FFFFFF;" width="22.744" height="89.411"></rect> <rect x="182.497" y="196.684" style="fill:#FFFFFF;" width="22.744" height="89.411"></rect> <rect x="274.966" y="196.684" style="fill:#FFFFFF;" width="22.744" height="89.411"></rect> <rect x="310.213" y="196.684" style="fill:#FFFFFF;" width="22.744" height="89.411"></rect> </g> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">DATOS BANCARIOS</h4>
                </div>
                <div class="button-items">
                    <a class="btn btn-outline-primary py-2" style="font-size: 12px; font-family: Titillium Web; font-weight: 700;" href="{{ route('datos-bancarios.create') }}">
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
                                <th class="celdas" style="color: #FFFF80;border: 1px solid #0C213A;">EDITAR</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0C213A;">BORRAR</th>                                
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">DOCUMENTO</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">NIT / DOC</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">BENEFICIARIO</th>                                
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">BANCO</th>                                
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">TIPO CUENTA</th>                                
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">NÚMERO CUENTA</th>                                
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">ESTADO</th>                                
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($datosBancarios as $dato)
                                <tr style="text-align: center;">
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        <a class="btn btn-outline-warning px-2 py-0"
                                            href="{{ route('datos-bancarios.edit', $dato->id) }}">
                                            <svg height="20" width="20" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="-43.18 -43.18 478.87 478.87" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"> <path style="fill:#FFFFFF;" d="M116.981,340.978l-90.44,25.083l25.018-90.505c7.24,10.925,28.509,22.044,46.804,18.618 C94.549,323.523,115.688,339.943,116.981,340.978z" /> <g> <path style="fill:#56ACE0;" d="M70.371,264.048c-17.002-16.873-3.749-38.723-3.943-38.788l46.739-46.739h43.83 c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925h-22.044l18.036-18.036h54.691 c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925h-32.905l38.529-38.529l42.731,42.731L113.102,264.048 C101.337,275.814,82.201,275.814,70.371,264.048z" /> <path style="fill:#56ACE0;" d="M271.551,136.436l42.731,42.731L165.919,327.531c0,0-21.786,9.568-37.43-5.301 c-9.18-8.792-14.158-28.574,0-42.731L271.551,136.436z" /> </g> <path style="fill:#FFC10D;" d="M365.999,127.451l-36.331,36.331l-50.36-50.36l-50.36-50.36l36.331-36.331 c6.012-6.012,16.614-6.012,22.626,0l78.222,78.222C372.27,110.966,372.27,121.18,365.999,127.451z" /> <path style="fill:#00000;" d="M381.45,89.374l-78.222-78.222c-15.321-14.869-38.271-14.869-53.463,0L47.615,213.301 c-1.293,1.293-2.327,3.038-2.78,4.784L0.424,378.796c-1.099,3.814,0,7.822,2.78,10.602c2.78,2.715,6.271,3.685,10.602,2.78 l160.711-44.412c1.745-0.517,3.491-1.487,4.784-2.78L381.45,142.836C396.189,128.097,396.189,104.113,381.45,89.374z M66.428,225.261l46.739-46.739h43.83c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925h-22.044 l18.036-18.036h54.691c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925h-32.905l38.529-38.529l42.731,42.731 L113.102,264.048c-11.766,11.766-30.901,11.766-42.731,0C53.369,247.176,66.622,225.325,66.428,225.261z M26.541,366.061 l25.018-90.505c7.24,10.925,28.509,22.044,46.804,18.618c-3.814,29.35,17.325,45.77,18.618,46.804L26.541,366.061z M165.919,327.531 c0,0-21.786,9.568-37.43-5.301c-9.18-8.792-14.158-28.574,0-42.731l143.063-143.063l42.731,42.731L165.919,327.531z M365.999,127.451l-36.331,36.331l-50.36-50.36l-50.36-50.36l36.331-36.331c6.012-6.012,16.614-6.012,22.626,0l78.222,78.222 C372.27,110.966,372.27,121.18,365.999,127.451z" /> </g></svg>
                                        </a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        <form id="deleteForm-{{ $dato->id }}" action="{{ route('datos-bancarios.destroy', $dato->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger px-2 py-0" onclick="confirmDelete({{ $dato->id }})">
                                                <svg height="20" width="20" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="-27.21 -27.21 326.50 326.50" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#28D2E4;" d="M13.364,166.434c-7.811,7.811-7.811,20.474,0,28.284l63.988,63.989c7.81,7.81,20.474,7.81,28.284,0 l36.767-36.767L50.13,129.667L13.364,166.434z" /> <g> <path style="fill:#FFDB77;" d="M166.444,13.355L50.131,129.667l92.273,92.273l116.312-116.313c7.811-7.81,7.811-20.474,0-28.284 l-63.988-63.988C186.918,5.544,174.254,5.544,166.444,13.355z" /> <path style="fill:#22313F;" d="M264.02,72.04L200.031,8.052c-10.722-10.723-28.169-10.723-38.891,0 C159.878,9.314,11.792,157.4,8.061,161.131c-10.747,10.746-10.749,28.143,0,38.891l63.989,63.989 c10.746,10.747,28.143,10.749,38.891,0c0.951-0.951,150.325-150.325,153.08-153.08C274.767,100.185,274.769,82.788,264.02,72.04z M100.334,253.404c-4.885,4.885-12.792,4.885-17.678,0l-63.989-63.989c-4.885-4.885-4.886-12.792,0-17.678l31.464-31.464 l81.667,81.667L100.334,253.404z M253.414,100.325l-111.01,111.009l-81.666-81.666l111.009-111.01 c4.885-4.885,12.792-4.885,17.678,0l63.989,63.989C258.299,87.532,258.299,95.439,253.414,100.325z" /> </g> </g> </g></svg>
                                            </button>
                                        </form>
                                    </td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $dato->clase_documento }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $dato->nit }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $dato->beneficiario }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $dato->banco }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $dato->tipo_cuenta }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $dato->numero_cuenta }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $dato->estado }}</td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro(a)?',
            text: "Esta acción eliminará el dato bancario permanentemente.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + id).submit();
            }
        });
    }
</script>

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
