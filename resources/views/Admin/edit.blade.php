<x-header />

@if (session('info'))
    <div class="bg-success/10 border border-success/10 alert text-success" role="alert">
        {{ session('info') }}
    </div>
@endif

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Roles</h4>
                <p class="text-muted mb-0">Seleccionar uno o más roles para cada usuario del sistema</p>
            </div><!--end card-header-->
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">{{ $usuario->name }}<br></h4>                      
                                        <span style="font-size: 13px;color:#1761FD;">{{ $usuario->email }}</span>
                                    </div><!--end col-->
                                    
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            
                            <div class="card-body">

                                <div class="flex">
            
                                    {!! Form::model($usuario, ['route' => ['admin.update', $usuario], 'method' => 'put']) !!}
                                    @foreach ($roles as $role)
                                        <div>
                                            <label>
                                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-5']) !!}
                                    {!! Form::close() !!}
                                    
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
