<x-header />

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Permisos</h4>
                <p class="text-muted mb-0">Ver lista de usuarios y editar permisos de acceso</p>
            </div><!--end card-header-->
            <div class="card-body">

                <div class="table-responsive">
                    <table id="exampleq" class="table table-bordered mb-0 table-centered py-4">
                        <thead class="thead-light" style="font-size: 11px">
                            <tr>
                                <th style="text-align: center">EDITAR</th>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">NOMBRE</th>
                                <th style="text-align: center">EMAIL</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;font-size:11px">
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <a aria-label="anchor" href="{{ route('admin.edit', $user) }}">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M13 21H21" stroke="#FFB822" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M20.0651 7.39423L7.09967 20.4114C6.72438 20.7882 6.21446 21 5.68265 21H4.00383C3.44943 21 3 20.5466 3 19.9922V18.2987C3 17.7696 3.20962 17.2621 3.58297 16.8873L16.5517 3.86681C19.5632 1.34721 22.5747 4.87462 20.0651 7.39423Z"
                                                        stroke="#FFB822" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M15.3097 5.30981L18.7274 8.72755" stroke="#FFB822"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                            </svg>
                                        </a>

                                    </td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><!--end /table-->
                </div><!--end /tableresponsive-->

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#exampleq').DataTable({
            responsive: true,
            autoWidth: false,
            "order": [[1, "asc"]],
            "pageLength": 25,
            "lengthMenu": [[25, 50, 100], [25, 50, 100]],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron registros",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
<x-footer />
