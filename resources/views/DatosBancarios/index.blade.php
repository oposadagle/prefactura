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
                    <svg width="24px" height="24px" viewBox="0 0 64 64" id="fill" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polygon points="26 53 30 49 44 49 55 34 51 31 43 39 24 39 18 45 26 53" style="fill:#e5e6eb"></polygon><rect height="15.556" style="fill:#FFA6A6" transform="translate(-31.205 28.665) rotate(-45)" width="9.899" x="14.05" y="44.222"></rect><rect height="3.536" style="fill:#FE252D" transform="translate(-32.965 32.915) rotate(-45)" width="9.899" x="18.3" y="54.482"></rect><polygon points="36 43 36 39 38 39 38 45 30 45 30 43 36 43" style="fill:#d9dae2"></polygon><polygon points="16 53 19 50 22 53 16 53" style="fill:#fff"></polygon><circle cx="32" cy="27" r="8" style="fill:#FE252D"></circle><circle cx="50" cy="17" r="6" style="fill:#FE252D"></circle><circle cx="15" cy="13" r="4" style="fill:#FE252D"></circle><path d="M34.14,32.114a3.028,3.028,0,0,0-.2-4.464l-2.593-2.16a1.025,1.025,0,0,1-.069-1.512,1.051,1.051,0,0,1,1.45,0l1.568,1.568,1.414-1.414-1.568-1.569a2.99,2.99,0,0,0-1.139-.7v-2.79a7.281,7.281,0,0,0-2,0v2.789a3,3,0,0,0-1.14.7,3.027,3.027,0,0,0,.2,4.464l2.593,2.161a1.025,1.025,0,0,1,.07,1.511,1.027,1.027,0,0,1-1.451,0l-1.568-1.568-1.414,1.414,1.568,1.569a2.983,2.983,0,0,0,1.139.7v2.113a7.281,7.281,0,0,0,2,0V32.818A3,3,0,0,0,34.14,32.114Z" style="fill:#fff"></path><line style="fill:none;stroke:#FE252D;stroke-linejoin:round" x1="32" x2="32" y1="9" y2="16"></line><line style="fill:none;stroke:#FE252D;stroke-linejoin:round" x1="28" x2="28" y1="7" y2="14"></line><line style="fill:none;stroke:#FE252D;stroke-linejoin:round" x1="36" x2="36" y1="7" y2="14"></line><line style="fill:none;stroke:#FE252D;stroke-linejoin:round" x1="15" x2="15" y1="2" y2="6"></line><line style="fill:none;stroke:#FE252D;stroke-linejoin:round" x1="19" x2="19" y1="2" y2="8"></line><line style="fill:none;stroke:#FE252D;stroke-linejoin:round" x1="11" x2="11" y1="2" y2="4"></line><line style="fill:none;stroke:#FE252D;stroke-linejoin:round" x1="46" x2="46" y1="4" y2="9"></line><line style="fill:none;stroke:#FE252D;stroke-linejoin:round" x1="50" x2="50" y1="3" y2="8"></line><line style="fill:none;stroke:#FE252D;stroke-linejoin:round" x1="54" x2="54" y1="2" y2="5"></line><path d="M55.6,33.2l-4-3a1,1,0,0,0-1.307.093L42.586,38H24a1,1,0,0,0-.707.293L18.5,43.086l-.793-.793a1,1,0,0,0-1.414,0l-7,7a1,1,0,0,0,0,1.414l11,11a1,1,0,0,0,1.414,0l7-7a1,1,0,0,0,0-1.414l-.793-.793,2.5-2.5H44a1,1,0,0,0,.807-.408l11-15A1,1,0,0,0,55.6,33.2ZM21,59.586,11.414,50,17,44.414,26.586,54ZM43.493,48H30a1,1,0,0,0-.707.293L26.5,51.086,19.914,44.5l4.5-4.5H37v4H30v2h8a1,1,0,0,0,1-1V40h4a1,1,0,0,0,.707-.293l7.387-7.387,2.514,1.886Z"></path></g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">DATOS BANCARIOS</h4>
                </div>
                <div class="button-items">
                    <a class="btn btn-outline-primary py-2" style="font-size: 12px; font-family: Titillium Web; font-weight: 700;" href="{{ route('datos-bancarios.create') }}">
                        <svg height="16" width="16" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 297 297"><g><g><g><g><circle style="fill:#6AAC4B;" cx="148.5" cy="148.5" r="148.5" /></g></g></g><path style="fill:#508733;" d="M296.994,148.006l-73.68-73.676L74.359,223.308l73.686,73.686c0.152,0,0.302,0.006,0.454,0.006 c82.014,0,148.5-66.486,148.5-148.5C297,148.335,296.994,148.171,296.994,148.006z" /><g><path style="fill:#345F41;" d="M93.334,66h110.333C218.762,66,231,78.238,231,93.334v110.333C231,218.762,218.762,231,203.667,231 H93.334C78.238,231,66,218.762,66,203.667V93.334C66,78.238,78.238,66,93.334,66z" /></g><polygon style="fill:#ECF0F1;" points="201,134.5 162.5,134.5 162.5,96 134.5,96 134.5,134.5 96,134.5 96,162.5 134.5,162.5 134.5,201 162.5,201 162.5,162.5 201,162.5  " /></g></svg>
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
