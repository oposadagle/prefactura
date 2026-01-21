<x-header />

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header py-4">
                <h4 class="card-title">Editar cliente</h4>
                
            </div><!--end card-header-->
            <div class="card-body">                
                <div class="table-responsive">
                    <table id="example" class="table table-bordered mb-0 table-centered py-4">
                        <thead class="thead-light" style="font-size: 11px">
                            <tr>
                                <th style="text-align: center">EDITAR</th>
                                <th style="text-align: center">ELIMINAR</th>
                                <th style="text-align: center">NIT</th>
                                <th style="text-align: center">RAZON SOCIAL</th>                                
                                <th style="text-align: center">RAZON COMERCIAL</th>                                
                                <th style="text-align: center">TIPO DE SERVICIO</th>
                                <th style="text-align: center">CONTACTO</th>
                                <th style="text-align: center">ESTADO</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;font-size:11px">
                            <tr>
                                @foreach ($clientes as $cliente)
                                    <td>
                                        <a href="{{ url('/cliente/'.$cliente->id.'/edit') }}">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M13 21H21" stroke="#FFB822" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M20.0651 7.39423L7.09967 20.4114C6.72438 20.7882 6.21446 21 5.68265 21H4.00383C3.44943 21 3 20.5466 3 19.9922V18.2987C3 17.7696 3.20962 17.2621 3.58297 16.8873L16.5517 3.86681C19.5632 1.34721 22.5747 4.87462 20.0651 7.39423Z" stroke="#FFB822" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M15.3097 5.30981L18.7274 8.72755" stroke="#FFB822" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M10 12V17" stroke="#F5325C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M14 12V17" stroke="#F5325C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M4 7H20" stroke="#F5325C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#F5325C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#F5325C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg></a>
                                    </td>
                                    <td>{{ $cliente->nit }}</td>
                                    <td>{{ $cliente->razon_social }}</td>                                    
                                    <td>{{ $cliente->razon_comercial }}</td>                                    
                                    <td>{{ $cliente->tipo_servicio }}</td>
                                    <td>{{ $cliente->contacto }}</td>
                                    <td><span
                                        class="badge badge-boxed  badge-outline-{{ $cliente->color }}">{{ $cliente->estado }}</span>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table><!--end /table-->
                </div><!--end /tableresponsive-->

            </div>
        </div>
    </div>
</div>

<x-footer />
