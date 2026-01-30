<x-header />
<style>.celdas {    
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #656C82;    
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C20.1752 21.4816 19.3001 21.7706 18 21.8985" stroke="#FF2029" stroke-width="1.5" stroke-linecap="round" /><path d="M7 4V2.5" stroke="#FF2029" stroke-width="1.5" stroke-linecap="round" /><path d="M17 4V2.5" stroke="#FF2029" stroke-width="1.5" stroke-linecap="round" /><path d="M21.5 9H16.625H10.75M2 9H5.875" stroke="#FF2029" stroke-width="1.5" stroke-linecap="round" /><path d="M18 17C18 17.5523 17.5523 18 17 18C16.4477 18 16 17.5523 16 17C16 16.4477 16.4477 16 17 16C17.5523 16 18 16.4477 18 17Z" fill="#FF2029" /><path d="M18 13C18 13.5523 17.5523 14 17 14C16.4477 14 16 13.5523 16 13C16 12.4477 16.4477 12 17 12C17.5523 12 18 12.4477 18 13Z" fill="#FF2029" /><path d="M13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17Z" fill="#FF2029" /><path d="M13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13Z" fill="#FF2029" /><path d="M8 17C8 17.5523 7.55228 18 7 18C6.44772 18 6 17.5523 6 17C6 16.4477 6.44772 16 7 16C7.55228 16 8 16.4477 8 17Z" fill="#FF2029" /><path d="M8 13C8 13.5523 7.55228 14 7 14C6.44772 14 6 13.5523 6 13C6 12.4477 6.44772 12 7 12C7.55228 12 8 12.4477 8 13Z" fill="#FF2029" /></g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">REGISTRO HISTORICO</h4>
                </div>
                
                <form method="GET" action="{{ route('solicitud.historico') }}" class="d-flex">
                    <!-- Select de Año -->
                    <select name="year" class="form-select me-2" onchange="this.form.submit()"  style="width: 80px;">
                        @foreach ($years as $availableYear)
                            <option value="{{ $availableYear }}" {{ $year == $availableYear ? 'selected' : '' }}>
                                {{ $availableYear }}
                            </option>
                        @endforeach
                    </select>            
                    <!-- Select de Mes -->
                    <select name="month" class="form-select border-danger text-white me-2" onchange="this.form.submit()" style="width: 120px;background-color:#fe252d;">
                        @foreach ($months as $availableMonth)
                            <option value="{{ $availableMonth }}" {{ $month == $availableMonth ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($availableMonth)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>                    
                </form>
                
                    
            <form action="{{ route('solicitud.total') }}" method="GET" class="d-flex">
                <select name="year" class="form-select me-2" style="width: 100px;">
                    @foreach ($years as $availableYear)
                        <option value="{{ $availableYear }}" {{ $year == $availableYear ? 'selected' : '' }}>
                            {{ $availableYear }}
                        </option>
                    @endforeach
                </select>
                <select name="month" class="form-select me-2" style="width: 150px;">
                     @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $month == $i ? 'selected' : '' }}>
                            {{ ucfirst(\Carbon\Carbon::create()->month($i)->translatedFormat('F')) }}
                        </option>
                    @endfor
                </select>
                <button type="submit" class="btn btn-outline-primary d-flex" style="margin-left:10px;font-size: 12px;font-family: Titillium Web;font-weight: 700;">
                    <svg style="margin-right: 6px;" width="16" height="16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832" y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse"> <stop offset="0" stop-color="#18884f" /> <stop offset="0.5" stop-color="#117e43" /> <stop offset="1" stop-color="#0b6631" /> </linearGradient> </defs> <title>file_type_excel</title> <path d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z" style="fill:#185c37" /> <path d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z" style="fill:#21a366" /> <path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41" /> <path d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z" style="opacity:0.10000000149011612;isolation:isolate" /> <path d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z" style="fill:url(#a)" /> <path d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z" style="fill:#fff" /> <path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481" /> <path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41" /> </svg>
                    DESCARGAR
                </button>
            </form>

                    
            </div><!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped">
                        <thead class="table-dark" style="font-size: 11px;">
                            <tr>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">ID</th>
                                <th class="celdas" hidden style="color: #C3FF93;border: 1px solid #0c213a;">FECHA SOLICITUD</th>                                                                
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> CARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M12 7V12L9.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> CARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> DESCARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M12 7V12L9.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> DESCARGUE</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">NIT</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CLIENTE</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">ESTADO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">CONDICION DE PAGO</th>
                                <th class="celdas" style="color: #FF55BB;border: 1px solid #0c213a;">PEDIDO</th>
                                <th class="celdas" style="color: #FF55BB;border: 1px solid #0c213a;">REMESA</th>
                                <th class="celdas" style="color: #FF55BB;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #FF55BB;border: 1px solid #0c213a;">RADICADO</th> 
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">📄 CUMPLIDO</th>                                                              
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">▲ ORIGEN</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SALIDA ►</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">▼ DESTINO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">FINALIZAR ◄</th>
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">⛔ CANCELAR</th> 
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">RESPONSABLE</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">TIPO TRAYECTO</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">TIPO VEHICULO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">TIPO CARROCERIA</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">EJECUTIVO</th>                                
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                @can('costos')
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">COSTO FLETE</th>
                                @endcan
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA POR</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">COSTO POR</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">NOTAS</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CONDUCTOR</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CEDULA CONDUCTOR</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TELEFONO CONDUCTOR</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">USUARIO GPS</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CLAVE GPS</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">EMPRESA GPS</th>                                
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;font-family: Titillium Web;">
                            @foreach ($diarias as $diario)
                                <tr style="text-align: center">
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->id }}</td>
                                    <td class="celdas" hidden style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ \Carbon\Carbon::parse($diario->fecha_solicitud)->format('Y-m-d') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_cargue }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ \Carbon\Carbon::parse($diario->hora_cargue)->format('h:i:s A') }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_descargue }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ \Carbon\Carbon::parse($diario->hora_descargue)->format('h:i:s A') }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->nit }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;"><span class="badge bg-{{$diario->color}}" style="color:{{$diario->font}};font-weight:600;">{{strToUpper($diario->states)}}</span></td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->paytype }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->retorno }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->remesa }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->razon }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->radicado }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->nota_cumplido) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="background-color:{{$diario->oricolor}}"><i class="{{$diario->orimage}}" style="color: white"></i></a>
                                    </td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" style="background-color:{{$diario->salcolor}}"><i class="{{$diario->salimage}}" style="color: white"></i></a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter3" style="background-color:{{$diario->descolor}}"><i class="{{$diario->desimage}}" style="color: white"></i></a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter4" style="background-color:{{$diario->fincolor}}"><i class="{{$diario->finimage}}" style="color: white"></i></a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                                        
                                        <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" style="background-color:{{$diario->cancolor}}"><i class="{{$diario->canimage}}" style="color: white"></i></a>                                       
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->responsable) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->origen) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->destino) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_trayecto }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_vehiculo }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->carroceria }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->ejecutivo) }}</td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->placa }}</td>
                                    @can('costos')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" class="editable" data-type="text" data-name="costo" data-pk="{{$diario->id}}" style="color: #747b8e">
                                            {{ number_format($diario->costo, 0, ',', '.') }}
                                        </a>
                                    </td>
                                    @endcan
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->asignado }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->registrado }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="{{ url('/solicitud/'.$diario->id) }}"><svg height="16" width="16" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 385 385" xml:space="preserve"><g id="XMLID_1027_">	<polygon id="XMLID_1029_" style="fill:#FF9811;" points="77.326,355 83.327,385 233.318,355 157.5,355  " />	<polygon id="XMLID_1030_" style="fill:#FF9811;" points="307.5,340.163 377.5,326.162 318.663,31.988 203.612,55 307.5,55  " />	<path id="XMLID_1031_" style="fill:#FFE98F;" d="M157.5,150c-24.813,0-45-20.186-45-45V85h30v20c0,8.271,6.729,15,15,15V55h-15h-30   H7.5v300h69.826H157.5V150z" />	<path id="XMLID_1032_" style="fill:#FFDA44;" d="M307.5,340.163V55H203.612H202.5v50c0,24.814-20.187,45-45,45v205h75.818H307.5   V340.163z" />	<path id="XMLID_1033_" style="fill:#FFDA44;" d="M172.5,105V55h-15v65C165.771,120,172.5,113.271,172.5,105z" />	<path id="XMLID_1034_" style="fill:#565659;" d="M142.5,45c0-8.271,6.729-15,15-15s15,6.729,15,15v10v50c0,8.271-6.729,15-15,15   s-15-6.729-15-15V85h-30v20c0,24.814,20.187,45,45,45s45-20.186,45-45V55V45c0-24.813-20.187-45-45-45s-45,20.187-45,45v10h30V45z" /></g></svg></a>
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{$diario->conductor}}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{$diario->cedula_conductor}}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC; padding-top: 10px; padding-bottom: 10px;">
                                        {{$diario->telefono_conductor}}
                                        @if(!empty($diario->telefono_conductor))
                                            @php                                                
                                                $telefono = preg_replace('/\D/', '', $diario->telefono_conductor);                                                
                                                $mensaje = urlencode('Hola te escribimos de GLE, ');
                                            @endphp
                                            <a href="https://wa.me/{{ $telefono }}?text={{ $mensaje }}" target="_blank"><svg width="14" height="14" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0" /><path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)" /><path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white" /><path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white" /><defs><linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse"><stop stop-color="#5BD066" /><stop offset="1" stop-color="#27B43E" /></linearGradient></defs></svg></a>
                                        @endif
                                    </td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{$diario->usuario_gps}}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{$diario->clave_gps}}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{$diario->empresa_gps}}</td>                                     
                                </tr>
                            @endforeach
                        </tbody>
                    </table><!--end /table-->
                </div><!--end /tableresponsive-->

            </div>
        </div>
    </div>
</div>

<x-footer />
