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
</style>

@if (count($errors) > 0)
    <div class="box-body">
        <div class="bg-red-50 border border-red-200 alert mb-0" role="alert">
            <div class="flex">
                <div class="ltr:ml-2 rtl:mr-2">
                    <div class="alert alert-danger border-0" role="alert">
                        <strong>Atención!</strong> Se ha presentado un problema al tratar de actualizar sus datos.
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
            <div class="card-header d-flex align-items-center m-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FE252D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                <h4 class="card-title" style="margin-left: 10px; color: #000; font-family: Titillium Web; font-weight: 700;">EDITAR CENTRO COSTO</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('centro-costo.update', $centro->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="container">
                        <div class="row gx-1 justify-content-between py-4">
                            
                            <!-- NIT -->
                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('nit') is-invalid @enderror" id="nit" name="nit" value="{{ old('nit') ?? $centro->nit }}" placeholder="NIT" required autocomplete="off">
                                    <label for="nit">NIT</label>
                                </div>
                            </div>

                            <!-- Cliente -->
                            <div class="col-lg-6 col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('cliente') is-invalid @enderror" id="cliente" name="cliente" value="{{ old('cliente') ?? $centro->cliente }}" placeholder="Cliente" style="text-transform: uppercase;" required autocomplete="off">
                                    <label for="cliente">Cliente</label>
                                </div>
                            </div>

                            <!-- Centro Costo -->
                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('centro_costo') is-invalid @enderror" id="centro_costo" name="centro_costo" value="{{ old('centro_costo') ?? $centro->centro_costo }}" placeholder="Centro de Costo" style="text-transform: uppercase;" required autocomplete="off">
                                    <label for="centro_costo">Centro de Costo</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="container">
                        <div class="row gx-1 justify-content-between">
                            
                            <!-- Día Cierre -->
                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" min="0" max="31" class="form-control @error('dia_cierre') is-invalid @enderror" id="dia_cierre" name="dia_cierre" value="{{ old('dia_cierre') ?? $centro->dia_cierre }}" placeholder="Día Cierre" required autocomplete="off">
                                    <label for="dia_cierre">Día de Cierre (0-31)</label>
                                </div>
                            </div>

                            <!-- Frecuencia -->
                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select @error('frecuencia') is-invalid @enderror" id="frecuencia" name="frecuencia" required autocomplete="off">
                                        <option value="MENSUAL" {{ (old('frecuencia') ?? $centro->frecuencia) == 'MENSUAL' ? 'selected' : '' }}>MENSUAL</option>
                                        <option value="QUINCENAL" {{ (old('frecuencia') ?? $centro->frecuencia) == 'QUINCENAL' ? 'selected' : '' }}>QUINCENAL</option>
                                        <option value="SEMANAL" {{ (old('frecuencia') ?? $centro->frecuencia) == 'SEMANAL' ? 'selected' : '' }}>SEMANAL</option>
                                        <option value="NO APLICA" {{ (old('frecuencia') ?? $centro->frecuencia) == 'NO APLICA' ? 'selected' : '' }}>NO APLICA</option>
                                    </select>
                                    <label for="frecuencia">Frecuencia</label>
                                </div>
                            </div>

                            <!-- Estado -->
                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required autocomplete="off">
                                        <option value="ACTIVO" {{ (old('estado') ?? $centro->estado) == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                                        <option value="INACTIVO" {{ (old('estado') ?? $centro->estado) == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                                    </select>
                                    <label for="estado">Estado</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="container">
                        <div class="row gx-1 justify-content-between py-4">                            
                            <div class="col-lg-12 col-md-6 pt-4">
                                <div class="button-items" style="text-align: right">
                                    <button type="submit" class="btn btn-outline-primary py-2"><i class="mdi mdi-content-save-all me-2"></i>Guardar Cambios</button>
                                    <a class="btn btn-outline-secondary py-2" href="{{ route('centro-costo.index') }}"><i class="mdi mdi-backspace me-2"></i>Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<x-footer />
