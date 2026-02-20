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
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.37 2.15009L21.37 5.75006C21.72 5.89006 22 6.31006 22 6.68006V10.0001C22 10.5501 21.55 11.0001 21 11.0001H3C2.45 11.0001 2 10.5501 2 10.0001V6.68006C2 6.31006 2.28 5.89006 2.63 5.75006L11.63 2.15009C11.83 2.07009 12.17 2.07009 12.37 2.15009Z" stroke="#FE252D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 22H2V19C2 18.45 2.45 18 3 18H21C21.55 18 22 18.45 22 19V22Z" stroke="#FE252D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 18V11" stroke="#FE252D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8 18V11" stroke="#FE252D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 18V11" stroke="#FE252D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 18V11" stroke="#FE252D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20 18V11" stroke="#FE252D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M1 22H23" stroke="#FE252D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 8.5C12.8284 8.5 13.5 7.82843 13.5 7C13.5 6.17157 12.8284 5.5 12 5.5C11.1716 5.5 10.5 6.17157 10.5 7C10.5 7.82843 11.1716 8.5 12 8.5Z" stroke="#FE252D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">LISTADO DE BANCOS</h4>
                </div>
            </div>

            <div class="card-body">
                {{-- Formulario para crear nuevo banco --}}
                <div class="card mb-4" style="border: 1px solid #CDF7E5;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #FE252D; font-family: Titillium Web; font-weight: 700;">AGREGAR NUEVO BANCO</h5>
                        <form action="{{ route('banco.store') }}" method="POST">
                            @csrf
                            <div class="row align-items-end">
                                <div class="col-md-5">
                                    <label for="banco" class="form-label" style="font-family: Titillium Web; font-size: 13px; font-weight: 600;">Nombre del banco</label>
                                    <input type="text" class="form-control @error('banco') is-invalid @enderror" id="banco" name="banco" value="{{ old('banco') }}" placeholder="Ej: BANCOLOMBIA" style="text-transform: uppercase;">
                                    @error('banco')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="codigo" class="form-label" style="font-family: Titillium Web; font-size: 13px; font-weight: 600;">Código</label>
                                    <input type="number" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo') }}" placeholder="Ej: 1007" min="0" max="9999">
                                    @error('codigo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-outline-primary" style="font-size: 12px; font-family: Titillium Web; font-weight: 700;">
                                        <i class="fa fa-save"></i>
                                        GUARDAR
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Tabla de bancos --}}
                <div class="table-responsive">
                    <table id="exampled" class="table table-striped mb-0">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0C213A;">BORRAR</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">BANCO</th>
                                <th class="celdas" style="color: #A3D8FF;border: 1px solid #0C213A;">CÓDIGO</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($bancos as $banco)
                                <tr style="text-align: center;">
                                    <td class="celdas" style="border: 1px solid #9FAACC;">
                                        <form id="deleteForm-{{ $banco->id }}" action="{{ route('banco.destroy', $banco->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger px-2 py-0" onclick="confirmDelete({{ $banco->id }})">
                                                <svg height="20" width="20" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="-27.21 -27.21 326.50 326.50" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#28D2E4;" d="M13.364,166.434c-7.811,7.811-7.811,20.474,0,28.284l63.988,63.989c7.81,7.81,20.474,7.81,28.284,0 l36.767-36.767L50.13,129.667L13.364,166.434z" /> <g> <path style="fill:#FFDB77;" d="M166.444,13.355L50.131,129.667l92.273,92.273l116.312-116.313c7.811-7.81,7.811-20.474,0-28.284 l-63.988-63.988C186.918,5.544,174.254,5.544,166.444,13.355z" /> <path style="fill:#22313F;" d="M264.02,72.04L200.031,8.052c-10.722-10.723-28.169-10.723-38.891,0 C159.878,9.314,11.792,157.4,8.061,161.131c-10.747,10.746-10.749,28.143,0,38.891l63.989,63.989 c10.746,10.747,28.143,10.749,38.891,0c0.951-0.951,150.325-150.325,153.08-153.08C274.767,100.185,274.769,82.788,264.02,72.04z M100.334,253.404c-4.885,4.885-12.792,4.885-17.678,0l-63.989-63.989c-4.885-4.885-4.886-12.792,0-17.678l31.464-31.464 l81.667,81.667L100.334,253.404z M253.414,100.325l-111.01,111.009l-81.666-81.666l111.009-111.01 c4.885-4.885,12.792-4.885,17.678,0l63.989,63.989C258.299,87.532,258.299,95.439,253.414,100.325z" /> </g> </g> </g></svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ strtoupper($banco->banco) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;">{{ $banco->codigo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro(a)?',
            text: "Esta acción eliminará el banco permanentemente.",
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
