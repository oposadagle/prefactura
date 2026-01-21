<x-header />

<style>.celdas {    
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #656C82;
    }
    .text-sm {
    font-size: 0.6rem; 
}
</style>

<!-- Sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center m-2">
                <div class="d-flex">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M18 16L16 16M16 16L14 16M16 16L16 14M16 16L16 18" stroke="#FF2029" stroke-width="1.5" stroke-linecap="round" /><path d="M7 4V2.5" stroke="#FF2029" stroke-width="1.5" stroke-linecap="round" /><path d="M17 4V2.5" stroke="#FF2029" stroke-width="1.5" stroke-linecap="round" /><path d="M21.5 9H16.625H10.75M2 9H5.875" stroke="#FF2029" stroke-width="1.5" stroke-linecap="round" /><path d="M14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C20.1752 21.4816 19.3001 21.7706 18 21.8985" stroke="#FF2029" stroke-width="1.5" stroke-linecap="round" /></g></svg>
                    <h4 class="card-title" style="margin-left: 10px;">REGISTROS ACTIVOS</h4>
                </div> 
                
                <form method="GET" action="{{ route('solicitud.index') }}" class="ms-3 d-flex">
                    <input 
                        type="text" 
                        name="id" 
                        class="form-control" 
                        placeholder="Buscar por ID" 
                        value="{{ request('id') }}" 
                        style="width: 150px;"
                    />
                    <button type="submit" class="btn btn-primary py-2">Buscar</button>
                </form>

                <a class="btn btn-outline-primary py-2" style="font-size: 12px;font-family: Titillium Web;font-weight: 700;" href="{{ route('solicitud.diaria') }}">
                    <svg width="16" height="16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832" y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse"> <stop offset="0" stop-color="#18884f" /> <stop offset="0.5" stop-color="#117e43" /> <stop offset="1" stop-color="#0b6631" /> </linearGradient> </defs> <title>file_type_excel</title> <path d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z" style="fill:#185c37" /> <path d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z" style="fill:#21a366" /> <path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41" /> <path d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z" style="opacity:0.10000000149011612;isolation:isolate" /> <path d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z" style="opacity:0.20000000298023224;isolation:isolate" /> <path d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z" style="fill:url(#a)" /> <path d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z" style="fill:#fff" /> <path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481" /> <path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41" /> </svg>
                    <i class="me-2"></i>
                    DESCARGAR
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card-body">
                
                <form action="{{ url('/solicitud/store2') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="container">
                    <div class="d-flex flex-wrap justify-content-center align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:140px">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg height="18" width="18" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#FFFFFF" stroke="#FFFFFF"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"> <path style="fill:#FF2029FFFFF;" d="M377.741,195.011c-20.923,0-40.542,5.532-57.525,15.172v38.762c0,22.163-17.967,40.131-40.131,40.131 h-14.211h-2.642c-1.443,7.332-2.217,14.905-2.217,22.66c0,64.465,52.259,116.726,116.725,116.726s116.725-52.259,116.725-116.726 S442.206,195.011,377.741,195.011z" /> <g> <path style="fill:#FF2029;" d="M377.741,444.255c-73.072,0-132.519-59.448-132.519-132.517c0-8.585,0.846-17.234,2.516-25.71 c1.458-7.403,7.948-12.741,15.495-12.741h16.853c13.42,0,24.339-10.919,24.339-24.339v-38.762c0-5.684,3.054-10.928,7.996-13.733 c19.856-11.272,42.443-17.231,65.32-17.231c73.07,0,132.517,59.448,132.517,132.517S450.812,444.255,377.741,444.255z M277.044,304.87c-0.158,2.291-0.235,4.581-0.235,6.868c0,55.655,45.279,100.933,100.934,100.933s100.933-45.278,100.933-100.933 s-45.278-100.933-100.933-100.933c-14.417,0-28.677,3.106-41.732,9.038v29.105c0,30.836-25.087,55.923-55.923,55.923h-3.043V304.87 z" /> <path style="fill:#FF2029;" d="M373.829,362.669c-17.073-0.569-31.014-9.39-31.014-18.494c0-4.837,4.269-11.95,9.674-11.95 c5.976,0,10.813,8.394,21.34,10.243v-23.047c-13.089-4.979-28.454-11.097-28.454-29.307c0-18.068,13.373-26.747,28.454-28.881 v-3.983c0-1.991,2.276-3.841,5.406-3.841c2.702,0,5.406,1.849,5.406,3.841v3.556c8.82,0.284,25.466,2.561,25.466,12.376 c0,3.842-2.561,11.667-8.822,11.667c-4.695,0-7.399-4.553-16.645-5.264v20.771c12.946,4.837,28.026,11.524,28.026,30.73 c0,17.641-11.381,28.312-28.026,31.014v4.127c0,1.991-2.704,3.841-5.406,3.841c-3.13,0-5.406-1.849-5.406-3.841L373.829,362.669 L373.829,362.669z M375.251,296.94v-16.929c-6.402,1.281-9.106,4.553-9.106,7.967C366.147,292.103,369.845,294.665,375.251,296.94z M383.218,323.26v19.064c4.837-1.139,8.679-3.842,8.679-8.964C391.897,328.667,388.339,325.679,383.218,323.26z" /> <path style="fill:#FF2029;" d="M168.877,295.417c-58.644,0-106.354-47.71-106.354-106.352v-37.262 c0-8.72,7.072-15.792,15.792-15.792h111.888c8.72,0,15.792,7.072,15.792,15.792c0,8.72-7.072,15.792-15.792,15.792H94.107v21.471 c0,41.227,33.539,74.768,74.768,74.768s74.77-33.539,74.77-74.768v-37.263c0-8.72,7.072-15.792,15.792-15.792 c8.72,0,15.792,7.072,15.792,15.792v37.263C275.228,247.707,227.518,295.417,168.877,295.417z" /> </g> <path style="fill:#FF2029FFFFF;" d="M230.686,327.531l-61.811,61.811l-61.811-61.811c-38.561,21.755-64.765,63.113-64.765,110.315v58.362 h253.15v-58.362C295.451,390.643,269.247,349.287,230.686,327.531z" /> <path style="fill:#FF2029;" d="M295.451,512H42.299c-8.72,0-15.792-7.072-15.792-15.792v-58.362 c0-51.195,27.894-98.736,72.797-124.068c6.176-3.484,13.914-2.426,18.927,2.587l50.644,50.644l50.642-50.644 c5.017-5.012,12.754-6.069,18.927-2.587c44.903,25.332,72.797,72.875,72.797,124.068v58.362 C311.243,504.928,304.172,512,295.451,512z M58.092,480.416h221.568v-42.569c0-35.878-17.652-69.47-46.746-90.21l-52.871,52.871 c-6.168,6.165-16.165,6.165-22.335,0l-52.871-52.871c-29.094,20.74-46.746,54.331-46.746,90.21v42.569H58.092z" /> <path id="SVGCleanerId_0" style="fill:#FF2029;" d="M280.085,304.868h-14.21c-8.72,0-15.792-7.072-15.792-15.792 s7.072-15.792,15.792-15.792h14.21c13.42,0,24.339-10.917,24.339-24.337v-81.811c0.002-74.743-60.806-135.551-135.548-135.551 c-74.743,0-135.551,60.808-135.551,135.551v81.811c0,13.42,10.919,24.337,24.339,24.337h14.211c8.72,0,15.792,7.072,15.792,15.792 s-7.072,15.792-15.792,15.792H57.665c-30.836,0-55.923-25.087-55.923-55.922v-81.811C1.742,74.977,76.717,0,168.875,0 S336.01,74.977,336.01,167.135v81.811C336.01,279.781,310.923,304.868,280.085,304.868z" /> <g> <path id="SVGCleanerId_0_1_" style="fill:#FF2029;" d="M280.085,304.868h-14.21c-8.72,0-15.792-7.072-15.792-15.792 s7.072-15.792,15.792-15.792h14.21c13.42,0,24.339-10.917,24.339-24.337v-81.811c0.002-74.743-60.806-135.551-135.548-135.551 c-74.743,0-135.551,60.808-135.551,135.551v81.811c0,13.42,10.919,24.337,24.339,24.337h14.211c8.72,0,15.792,7.072,15.792,15.792 s-7.072,15.792-15.792,15.792H57.665c-30.836,0-55.923-25.087-55.923-55.922v-81.811C1.742,74.977,76.717,0,168.875,0 S336.01,74.977,336.01,167.135v81.811C336.01,279.781,310.923,304.868,280.085,304.868z" /> </g> </g></svg></span>
                                <select class="form-select" autocomplete="off" name="cliente" style="font-size: 11px">
                                    <option selected disabled>CLIENTE</option>
                                    @foreach ($clientes as $cliente)
                                            <option value="{{$cliente->cliente}}">{{ strToUpper($cliente->cliente) }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:140px">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg fill="#FF2029" height="18" width="18" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 297 297" xml:space="preserve" stroke="#FF2029"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"> <g> <path d="M176.816,188.027h-18.248v-18.248c0-5.56-4.508-10.068-10.068-10.068s-10.068,4.508-10.068,10.068v18.248h-18.248 c-5.56,0-10.068,4.508-10.068,10.068s4.508,10.068,10.068,10.068h18.248v18.248c0,5.56,4.508,10.068,10.068,10.068 s10.068-4.508,10.068-10.068v-18.248h18.248c5.56,0,10.068-4.508,10.068-10.068S182.376,188.027,176.816,188.027z" /> <path d="M286.932,112.476h-7.236V18.72c0-5.56-4.508-10.068-10.068-10.068H27.372c-5.56,0-10.068,4.508-10.068,10.068v59.148 h-7.236C4.508,77.868,0,82.376,0,87.936v156.872c0,24.008,19.532,43.54,43.54,43.54H253.46c24.008,0,43.54-19.532,43.54-43.54 V122.544C297,116.984,292.492,112.476,286.932,112.476z M37.44,28.788H259.56v83.689H120.115l-14.522-29.042 c-1.706-3.412-5.191-5.566-9.005-5.566H37.44V28.788z M276.864,244.808c0,12.905-10.499,23.405-23.405,23.405H43.54 c-12.905,0-23.405-10.499-23.405-23.405V98.004h70.23l14.522,29.042c1.706,3.412,5.191,5.566,9.005,5.566h162.972V244.808z" /> <path d="M148.5,60.375h86.52c3.892,0,7.047-3.155,7.047-7.047s-3.155-7.047-7.047-7.047H148.5c-3.892,0-7.047,3.155-7.047,7.047 S144.608,60.375,148.5,60.375z" /> <path d="M120.939,53.328c0-3.892-3.155-7.047-7.047-7.047H79.284c-3.892,0-7.047,3.155-7.047,7.047s3.155,7.047,7.047,7.047h34.608 C117.784,60.375,120.939,57.22,120.939,53.328z" /> <path d="M148.5,94.983h86.52c3.892,0,7.047-3.155,7.047-7.047c0-3.892-3.155-7.047-7.047-7.047H148.5 c-3.892,0-7.047,3.155-7.047,7.047C141.453,91.828,144.608,94.983,148.5,94.983z" /> </g> </g></svg></span>
                                <select class="form-select" autocomplete="off" name="states" style="font-size: 11px">
                                    <option selected disabled>ESTADO</option>
                                    @foreach ($estados as $estado)
                                            <option value="{{$estado->states}}">{{ strToUpper($estado->states) }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:150px">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg width="18" height="18" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M182.52 146.2h585.14v402.28h73.15V73.06H109.38v877.71h402.28v-73.14H182.52z" fill="#fe252d" /><path d="M255.67 219.34h438.86v73.14H255.67zM255.67 365.63h365.71v73.14H255.67zM255.67 511.91H475.1v73.14H255.67zM731.02 585.06c-100.99 0-182.86 81.87-182.86 182.86s81.87 182.86 182.86 182.86 182.86-81.87 182.86-182.86-81.87-182.86-182.86-182.86z m0 292.57c-60.5 0-109.71-49.22-109.71-109.71 0-60.5 49.22-109.71 109.71-109.71 60.5 0 109.71 49.22 109.71 109.71 0 60.49-49.22 109.71-109.71 109.71z" fill="#fe252d" /><path d="M717.88 777.65l-42.55-38.13-36.61 40.86 84.02 75.27 102.98-118.47-41.39-36z" fill="#fe252d" /></g></svg></span>
                                <select class="form-select" autocomplete="off" name="radicado" style="font-size: 11px">
                                    <option selected disabled>RADICADO</option>
                                    @foreach ($radicados as $radical)
                                            <option value="{{$radical->radicado}}">{{ strToUpper($radical->radicado) }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:180px">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"> <style type="text/css"> .bentblocks_een{fill:#FF2029;} .st0{fill:#FF2029;} </style> <path class="bentblocks_een" d="M26,10h-2.485l-6-6l-5.888,6H6c-1.1,0-2,1.4-2,2.5V26c0,1.1,0.9,2,2,2h20c1.1,0,2-0.9,2-2V12 C28,10.9,27.1,10,26,10z M23.172,12.485L20.873,15h-0.481c-0.463-2.282-2.481-4-4.9-4c-1.115,0-2.14,0.366-2.967,0.984l4.989-5.155 L23.172,12.485z M18.32,15h-5.643c0.411-1.163,1.513-2,2.815-2C16.796,13,17.907,13.836,18.32,15z M11.418,13.128 c-0.386,0.552-0.663,1.187-0.802,1.872H9.607L11.418,13.128z M6,12h3.569l-2.855,3H6V12z M26,26H6v-9h20V26z M26,15h-2.298 L26,12.485L25.515,12H26V15z" /> </g></svg></span>
                                <select class="form-select" autocomplete="off" name="paytype" style="font-size: 11px">
                                    <option selected disabled>MEDIO DE PAGO</option>
                                    @foreach ($pagos as $pago)
                                            <option value="{{$pago->paytype}}">{{ strToUpper($pago->paytype) }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:180px">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF2029"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M9 15L11 17L15 13M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#FF2029" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg></span>
                                <select class="form-select" autocomplete="off" name="fecha_cargue" style="font-size: 11px">
                                    <option selected disabled>FECHA CARGUE</option>
                                    @foreach ($cargues as $cargue)
                                            <option value="{{$cargue->fecha_cargue}}">{{ $cargue->fecha_cargue }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:180px">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF2029"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M9 15L11 17L15 13M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#FF2029" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg></span>
                                <select class="form-select" autocomplete="off" name="fecha_descargue" style="font-size: 11px">
                                    <option selected disabled>FECHA DESCARGUE</option>
                                    @foreach ($descargues as $descargue)
                                            <option value="{{$descargue->fecha_descargue}}">{{ $descargue->fecha_descargue }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:140px">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M15 4.00098C18.1143 4.01009 19.7653 4.10853 20.8284 5.17162C22 6.34319 22 8.22881 22 12C22 15.7713 22 17.6569 20.8284 18.8285C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8285C2 17.6569 2 15.7713 2 12C2 8.22881 2 6.34319 3.17157 5.17162C4.23467 4.10853 5.8857 4.01009 9 4.00098" stroke="#FF2029" stroke-width="1.6320000000000001" stroke-linecap="round" /><path d="M12 5L12 3" stroke="#FF2029" stroke-width="1.6320000000000001" stroke-linecap="round" /><path d="M8 10.5H16" stroke="#FF2029" stroke-width="1.6320000000000001" stroke-linecap="round" /><path d="M8 14H13.5" stroke="#FF2029" stroke-width="1.6320000000000001" stroke-linecap="round" /></g></svg></span>
                                <select class="form-select" autocomplete="off" name="placa" style="font-size: 11px">
                                    <option selected disabled>PLACA</option>
                                    @foreach ($matriculas as $matricula)
                                            <option value="{{$matricula->placa}}">{{ $matricula->placa }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:160px">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M12 6H12.01M9 20L3 17V4L5 5M9 20L15 17M9 20V14M15 17L21 20V7L19 6M15 17V14M15 6.2C15 7.96731 13.5 9.4 12 11C10.5 9.4 9 7.96731 9 6.2C9 4.43269 10.3431 3 12 3C13.6569 3 15 4.43269 15 6.2Z" stroke="#ff2029" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg></span>
                                <select class="form-select" autocomplete="off" name="razon" style="font-size: 11px">
                                    <option selected disabled>MANIFIESTO</option>
                                    @foreach ($manifiestos as $manifiesto)
                                            <option value="{{$manifiesto->razon}}">{{ $manifiesto->razon }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>                        
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:150px">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><g id="Navigation / Building_04"><path id="Vector" d="M2 20H4M4 20H14M4 20V6.2002C4 5.08009 4 4.51962 4.21799 4.0918C4.40973 3.71547 4.71547 3.40973 5.0918 3.21799C5.51962 3 6.08009 3 7.2002 3H10.8002C11.9203 3 12.4796 3 12.9074 3.21799C13.2837 3.40973 13.5905 3.71547 13.7822 4.0918C14 4.5192 14 5.07899 14 6.19691V12M14 20H20M14 20V12M20 20H22M20 20V12C20 11.0681 19.9999 10.6024 19.8477 10.2349C19.6447 9.74481 19.2557 9.35523 18.7656 9.15224C18.3981 9 17.9316 9 16.9997 9C16.0679 9 15.6019 9 15.2344 9.15224C14.7443 9.35523 14.3552 9.74481 14.1522 10.2349C14 10.6024 14 11.0681 14 12M7 10H11M7 7H11" stroke="#ff2029" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></g></svg></span>
                                <select class="form-select" autocomplete="off" name="sucursal" style="font-size: 11px">
                                    <option selected disabled>SUCURSAL</option>
                                    @foreach ($sucursales as $sucursal)
                                            <option value="{{$sucursal->sucursal}}">{{ $sucursal->sucursal }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:150px">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><g id="Navigation / Building_04"><path id="Vector" d="M2 20H4M4 20H14M4 20V6.2002C4 5.08009 4 4.51962 4.21799 4.0918C4.40973 3.71547 4.71547 3.40973 5.0918 3.21799C5.51962 3 6.08009 3 7.2002 3H10.8002C11.9203 3 12.4796 3 12.9074 3.21799C13.2837 3.40973 13.5905 3.71547 13.7822 4.0918C14 4.5192 14 5.07899 14 6.19691V12M14 20H20M14 20V12M20 20H22M20 20V12C20 11.0681 19.9999 10.6024 19.8477 10.2349C19.6447 9.74481 19.2557 9.35523 18.7656 9.15224C18.3981 9 17.9316 9 16.9997 9C16.0679 9 15.6019 9 15.2344 9.15224C14.7443 9.35523 14.3552 9.74481 14.1522 10.2349C14 10.6024 14 11.0681 14 12M7 10H11M7 7H11" stroke="#ff2029" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></g></svg></span>
                                <select class="form-select" autocomplete="off" name="tipo_trayecto" style="font-size: 11px">
                                    <option selected disabled>TRAYECTO</option>
                                    @foreach ($trayectos as $trayecto)
                                            <option value="{{$trayecto->tipo_trayecto}}">{{ $trayecto->tipo_trayecto }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>        
                        <div class="col-lg-2 col-md-3 col-sm-4 mx-1" style="width:50px">
                            <button type="submit" class="mb-3 btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                
                    </div>
                </div>
                </form>
                
                <div class="table-responsive">
                    <table id="exampl" class="table table-striped mb-0">
                        <thead class="table-darke" style="font-size: 11px;background-color:#021526">
                            <tr>
                                <th class="celdas" style="color: #C4F4FF;border: 1px solid #0c213a;">ID</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> SOLICITUD</th>                                                                
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> CARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M12 7V12L9.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> CARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> DESCARGUE</th>
                                <th class="celdas" style="color: #C3FF93;border: 1px solid #0c213a;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0" /><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" /><g id="SVGRepo_iconCarrier"><path d="M12 7V12L9.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#C3FF93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></g></svg> DESCARGUE</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">NIT</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">CLIENTE</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">ESTADO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">CONDICION DE PAGO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SUCURSAL</th>
                                <th class="celdas" style="color: #FF55BB;border: 1px solid #0c213a;">PEDIDO</th>
                                <th class="celdas" style="color: #FF55BB;border: 1px solid #0c213a;">REMESA</th>
                                <th class="celdas" style="color: #FF55BB;border: 1px solid #0c213a;">MANIFIESTO</th>
                                <th class="celdas" style="color: #FF55BB;border: 1px solid #0c213a;">RADICADO</th>                  
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">📄 CARGUE</th>
                                <th class="celdas" style="color: #FBB454;border: 1px solid #0c213a;">🚚 TRAFICO</th>
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">📄 CUMPLIDO</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">▲ ORIGEN</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">▲ HORA</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">SALIDA ►</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">HORA ►</th>
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">▼ DESTINO</th>                                
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">▼ HORA</th>                                
                                <th class="celdas" style="color: #FFDB00;border: 1px solid #0c213a;">FINALIZAR ◄</th>                                
                                <th class="celdas" style="color: #FF5580;border: 1px solid #0c213a;">⛔ CANCELAR</th>
                                @can('cierres')
                                <th class="celdas" style="color: #FFFFFF;border: 1px solid #0c213a;">☑️ CERRAR</th>
                                @endcan                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">ORIGEN</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">DESTINO</th>
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">TIPO TRAYECTO</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">TIPO VEHICULO</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">TIPO CARROCERIA</th>                                
                                <th class="celdas" style="color: #CAF4FF;border: 1px solid #0c213a;">EJECUTIVO</th>                                
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">FECHA/HORA PLACA</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">CLASE</th>
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">MODELO</th>
                                @can('costos')
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">COSTO FLETE</th>
                                @endcan
                                @can('solicitud.despacho')
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">COSTO FLETE</th>
                                @endcan
                                <th class="celdas" style="color: #FFAF61;border: 1px solid #0c213a;">TIPO 🚗</th>
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
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ \Carbon\Carbon::parse($diario->fecha_solicitud)->format('Y-m-d') }}</td>

                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('fechas')
                                            <a href="#" class="editable" data-type="text" data-name="fecha_cargue" data-pk="{{$diario->id}}">
                                                {{ $diario->fecha_cargue }}
                                            </a>
                                        @else
                                            {{ $diario->fecha_cargue }}
                                        @endcan
                                    </td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('fechas')
                                            <a href="#" class="editable" data-type="text" data-name="hora_cargue" data-pk="{{$diario->id}}">
                                                {{ $diario->hora_cargue }}
                                            </a>
                                        @else
                                            {{ ($diario->hora_cargue) }}
                                        @endcan
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('fechas')
                                            <a href="#" class="editable" data-type="text" data-name="fecha_descargue" data-pk="{{$diario->id}}">
                                                {{ $diario->fecha_descargue }}
                                            </a>
                                        @else
                                            {{ $diario->fecha_descargue }}
                                        @endcan
                                    </td>                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('fechas')
                                            <a href="#" class="editable" data-type="text" data-name="hora_descargue" data-pk="{{$diario->id}}">
                                                {{ $diario->hora_descargue }}
                                            </a>
                                        @else
                                            {{ ($diario->hora_descargue) }}
                                        @endcan
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->nit }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->cliente }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <span class="badge bg-{{$diario->color}}" style="color:{{$diario->font}};font-weight:600;">{{strToUpper($diario->states)}}</span></td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('placa')
                                            @php
                                                $estadoClase = '';
                                                switch ($diario->paytype) {
                                                    case 'AM. ANTICIPAR':
                                                        $estadoClase = 'badge badge-outline-info';
                                                        break;
                                                    case 'PM. ANTICIPAR':
                                                        $estadoClase = 'badge badge-outline-primary';
                                                        break;
                                                    case 'CONTADO':
                                                        $estadoClase = 'badge badge-outline-success';
                                                        break;
                                                    case 'CONTADO AM.':
                                                        $estadoClase = 'badge badge-outline-success';
                                                        break;
                                                    case 'CONTADO PM.':
                                                        $estadoClase = 'badge badge-outline-success';
                                                        break;
                                                    case 'CREDITO':
                                                        $estadoClase = 'badge badge-outline-warning';
                                                        break;
                                                    case 'SEMANAL':
                                                        $estadoClase = 'badge badge-outline-danger';
                                                        break;
                                                    default:
                                                        $estadoClase = 'badge badge-outline-light';
                                                }
                                            @endphp
                                            @if ($diario->enviado == 'NO')
                                                <a href="#" class="editable {{ $estadoClase }}" data-type="select" data-name="paytype" data-pk="{{$diario->id}}" data-source='@json($medios)' style="font-weight:500;font-size:10px;">
                                                    {{$diario->paytype}}
                                                </a>
                                            @else
                                                <a href="#" class="{{ $estadoClase }}">{{$diario->paytype}}</a>
                                            @endif
                                        @else   
                                            @php
                                                $estadoClase = '';
                                                switch ($diario->paytype) {
                                                    case 'AM. ANTICIPAR':
                                                        $estadoClase = 'badge badge-outline-info';
                                                        break;
                                                    case 'PM. ANTICIPAR':
                                                        $estadoClase = 'badge badge-outline-primary';
                                                        break;
                                                    case 'CONTADO':
                                                        $estadoClase = 'badge badge-outline-success';
                                                        break;
                                                    case 'CREDITO':
                                                        $estadoClase = 'badge badge-outline-warning';
                                                        break;
                                                    case 'SEMANAL':
                                                        $estadoClase = 'badge badge-outline-danger';
                                                        break;
                                                    default:
                                                        $estadoClase = 'badge badge-outline-light';
                                                }
                                            @endphp
                                        <a href="#" class="{{ $estadoClase }}">{{$diario->paytype}}</a>
                                        @endcan
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $clase = '';
                                            $colortexto = '';
                                                if ($diario->sucursal == 'GLE') {
                                                    $clase = 'badge bg-danger';
                                                    $colortexto = 'white';
                                                } 
                                                if ($diario->sucursal == 'PROVEEDOR') {
                                                    $clase = 'badge bg-warning';
                                                    $colortexto = 'black'; }
                                        @endphp
                                        <span class="{{$clase}}" style="color:{{$colortexto}};font-weight:600">{{$diario->sucursal}}</span>                                        
                                    </td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('remesa')
                                            <a href="#" class="editable" data-type="text" data-name="retorno" data-pk="{{$diario->id}}">
                                                {{ strToUpper($diario->retorno) }}
                                            </a>
                                        @else
                                            {{ strToUpper($diario->retorno) }}
                                        @endcan
                                    </td>
                                   <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('remesa')
                                            <a href="#" class="editable" data-type="text" data-name="remesa" data-pk="{{$diario->id}}">
                                                {{ strToUpper($diario->remesa) }}
                                            </a>
                                        @else
                                            {{ strToUpper($diario->remesa) }}
                                        @endcan
                                    </td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('remesa')
                                            @php
                                                $estadoClase = '';
                                                if ($diario->razon !== null) {
                                                    $estadoClase = 'badge bg-primary';
                                                } 
                                                if (in_array(strToUpper($diario->razon), ['LINKARGA', 'HUMADEA', 'SERVICARGA', 'KONFIE', 'PROVEEDOR MOTO'])) {
                                                    $estadoClase = 'btn btn-warning py-0 px-1';
                                                }
                                            @endphp
                                    
                                            @if ($diario->razon === null)
                                                <a href="#" class="editable {{ $estadoClase }}" data-type="text" data-name="razon" data-pk="{{ $diario->id }}">
                                                    {{ strToUpper($diario->razon) }}
                                                </a>
                                            @else
                                                {{ strToUpper($diario->razon) }}
                                            @endif
                                        @else
                                            {{ strToUpper($diario->razon) }}
                                        @endcan
                                    </td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('remesa')
                                            <a href="#" class="editable" data-type="text" data-name="radicado" data-pk="{{$diario->id}}">
                                                {{ strToUpper($diario->radicado) }}
                                            </a>
                                        @else
                                            {{ strToUpper($diario->radicado) }}
                                        @endcan
                                    </td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter6" style="background-color:{{$diario->carcolor}}"><svg width="16" height="16" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/"><g transform="translate(0 -1028.4)"><path d="m2 4v13.531 2.469c0 1.105 0.8954 2 2 2h4 8l6-6v-12h-20z" transform="translate(0 1028.4)" fill="#f1c40f" /><path d="m22 1044.4-6 6v-4c0-1.1 0.895-2 2-2h4z" fill="#f39c12" /><path d="m4 2c-1.1046 0-2 0.8954-2 2v1 1h20v-1-1c0-1.1046-0.895-2-2-2h-4-8-4z" transform="translate(0 1028.4)" fill="#f1c40f" /><g fill="#f39c12"><rect height="2" width="14" y="1034.4" x="5" /><rect height="2" width="14" y="1038.4" x="5" /><rect height="2" width="9" y="1042.4" x="5" /></g></g></svg></a>
                                    </td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @php
                                            $fondo = '';
                                                if ($diario->trafico == 0) {
                                                    $fondo = '#E2DFD0';
                                                } 
                                                if ($diario->trafico == 1) {
                                                    $fondo = '#4CCD99'; }
                                        @endphp                                 
                                        @can('costos')
                                            <a href="{{ route('solicitudes.toggleTrafico', $diario->id) }}" class="btn btn-icon-square-xs py-0 my-0" 
                                                style="background-color: {{ $fondo }}">
                                                <svg width="24" height="24" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet"><path fill="#31373D" d="M36 23a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V13a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4v10z"></path><circle fill="#77B255" cx="7" cy="18" r="4"></circle><circle fill="#FFCC4D" cx="18" cy="18" r="4"></circle><circle fill="#DD2E44" cx="29" cy="18" r="4"></circle></svg>
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-icon-square-xs py-0 my-0" 
                                                style="background-color: {{ $fondo }}">
                                                <svg width="24" height="24" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet"><path fill="#31373D" d="M36 23a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V13a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4v10z"></path><circle fill="#77B255" cx="7" cy="18" r="4"></circle><circle fill="#FFCC4D" cx="18" cy="18" r="4"></circle><circle fill="#DD2E44" cx="29" cy="18" r="4"></circle></svg>
                                            </a>
                                        @endcan    
                                    </td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('servicio')                                                                             
                                            <a href="#" class="editable" data-type="select" data-name="nota_cumplido" data-pk="{{$diario->id}}" data-source='[{"value":"NO REQUIERE DOCUMENTOS","text":"NO REQUIERE DOCUMENTOS"},{"value":"REQUIERE DOCUMENTOS","text":"REQUIERE DOCUMENTOS"},{"value":"TRASLADO DE BODEGAS","text":"TRASLADO DE BODEGAS"},{"value":"","text":""}]' style="font-weight:500;font-size:10px;">
                                                {{$diario->nota_cumplido}}
                                            </a>
                                        @else                                            
                                            <a href="#">{{$diario->nota_cumplido}}</a>
                                        @endcan
                                    </td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <span class="btn btn-icon-square-xs py-0 my-0" style="background-color:#4CCD99"><i class="fas fa-check" style="color: white"></i></span>
                                        {{-- @can('servicio')
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="background-color:{{$diario->oricolor}}"><i class="{{$diario->orimage}}" style="color: white"></i></a>
                                        @else
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" style="background-color:{{$diario->oricolor}}"><i class="{{$diario->orimage}}" style="color: white"></i></a>
                                        @endcan --}}    
                                    </td>   
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ date('H:i', strtotime($diario->oridates)) }}</td>    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <span class="btn btn-icon-square-xs py-0 my-0" style="background-color:#4CCD99"><i class="fas fa-check" style="color: white"></i></span>
                                        {{-- @can('servicio')
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" style="background-color:{{$diario->salcolor}}"><i class="{{$diario->salimage}}" style="color: white"></i></a>
                                        @else
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" style="background-color:{{$diario->salcolor}}"><i class="{{$diario->salimage}}" style="color: white"></i></a>
                                        @endcan --}}
                                    </td>
                                    {{--<td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                                        
                                        @can('servicio')
                                        <a href="#" class="editable @if (!$diario->saldate) text-info text-lg @endif" data-type="text" data-name="saldate" data-pk="{{$diario->id}}">
                                            @if ($diario->saldate)
                                                {{ date('H:i', strtotime($diario->saldate)) }}
                                            @else
                                                {{ date('H:i', strtotime($diario->hora_cargue . ' +1 hour')) }}
                                            @endif
                                        </a>
                                        @endcan
                                    </td>--}}
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ date('H:i', strtotime($diario->saldates)) }}</td>    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <span class="btn btn-icon-square-xs py-0 my-0" style="background-color:#4CCD99"><i class="fas fa-check" style="color: white"></i></span>
                                        {{--@can('servicio')
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter3" style="background-color:{{$diario->descolor}}"><i class="{{$diario->desimage}}" style="color: white"></i></a>
                                        @else
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" style="background-color:{{$diario->descolor}}"><i class="{{$diario->desimage}}" style="color: white"></i></a>
                                        @endcan--}}
                                    </td>
                                    {{--<td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">                                        
                                        @can('servicio')
                                        <a href="#" class="editable @if (!$diario->desdate) text-info text-lg @endif" data-type="text" data-name="desdate" data-pk="{{$diario->id}}">
                                            @if ($diario->desdate)
                                                {{ date('H:i', strtotime($diario->desdate)) }}
                                            @else
                                                {{ date('H:i', strtotime($diario->hora_descargue)) }}
                                            @endif
                                        </a>
                                        @endcan                                        
                                    </td>--}}
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{date('H:i', strtotime($diario->desdates)) }}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('servicio')
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter4" style="background-color:{{$diario->fincolor}}"><i class="{{$diario->finimage}}" style="color: white"></i></a>
                                        @else
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" style="background-color:{{$diario->fincolor}}"><i class="{{$diario->finimage}}" style="color: white"></i></a>
                                        @endcan
                                    </td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('cancelar')
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter5" style="background-color:{{$diario->cancolor}}"><i class="{{$diario->canimage}}" style="color: white"></i></a>
                                        @else
                                            <a href="#" data-id="{{ $diario->id }}" class="btn btn-icon-square-xs py-0 my-0" style="background-color:{{$diario->cancolor}}"><i class="{{$diario->canimage}}" style="color: white"></i></a>
                                        @endcan
                                    </td>
                                    @can('cierres')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        <a href="" class="btn btn-icon-square-xs py-0 my-0 update-solicitud" data-id="{{ $diario->id }}" style="background-color: #7A64BA"><i class="fas fa-angle-double-right" style="color: white"></i></a>
                                    </td>
                                    @endcan
                                    
                                    @can('fechas')
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editable" data-type="select" data-name="origen" data-pk="{{$diario->id}}" data-source='@json($places)' style="font-weight:500;font-size:10px;">
                                                {{ strToUpper($diario->origen) }}
                                            </a>
                                        </td> 
                                    @else
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->origen) }}</td>
                                    @endcan
                                                                        
                                    @can('fechas')
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editable" data-type="select" data-name="destino" data-pk="{{$diario->id}}" data-source='@json($places)' style="font-weight:500;font-size:10px;">
                                                {{ strToUpper($diario->destino) }}
                                            </a>
                                        </td> 
                                    @else
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->destino) }}</td>
                                    @endcan
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_trayecto }}</td> 
                                    
                                    @can('fechas')
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                            <a href="#" class="editable" data-type="select" data-name="tipo_vehiculo" data-pk="{{$diario->id}}" data-source='@json($types)' style="font-weight:500;font-size:10px;">
                                                {{$diario->tipo_vehiculo}}
                                            </a>
                                        </td> 
                                    @else
                                        <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->tipo_vehiculo }}</td> 
                                    @endcan
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->carroceria }}</td> 
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ strtoupper($diario->ejecutivo) }}</td>
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('placa')
                                        @php
                                            $claseBoton = $diario->placa ? 'btn btn-warning py-0 px-2' : '';
                                        @endphp
                                            @if ($diario->enviado == 'NO')
                                                <a href="#" class="editable {{ $claseBoton }}" data-type="select" data-name="placa" data-pk="{{$diario->id}}" data-source='@json($placas)'>
                                                    {{ $diario->placa }}
                                                </a>
                                            @else
                                                <a href="#" class="{{ $claseBoton }}">{{ $diario->placa }}</a>
                                            @endif
                                        @else
                                        @php
                                            $claseBoton = $diario->placa ? 'btn btn-warning py-0 px-2' : '';
                                        @endphp
                                        <a href="#" class="{{ $claseBoton }}">{{ $diario->placa }}</a>                                        
                                        @endcan
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->fecha_placa }}</td>                                     
                                    
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->clase }}</td>                                     
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{ $diario->ano_fabricacion }}</td>                                     
                                    
                                    @can('costos')
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('placa')
                                            @if ($diario->enviado == 'NO')
                                                <a href="#" class="editabler" data-type="text" data-name="costo" data-pk="{{$diario->id}}" style="color: #747b8e">
                                                    {{ number_format($diario->costo, 0, ',', '.') }}
                                                </a>
                                            @else
                                                {{ number_format($diario->costo, 0, ',', '.') }}
                                            @endif
                                        @else
                                            {{ number_format($diario->costo, 0, ',', '.') }}
                                        @endcan
                                    </td>
                                    @endcan
                                    @can('solicitud.despacho')
                                            <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                                {{ number_format($diario->costo, 0, ',', '.') }}
                                            </td>
                                    @endcan
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">
                                        @can('placa')
                                        <a href="#" class="editable" data-type="select" data-name="tipo" data-pk="{{$diario->id}}" data-source='[{"value":"ANTIGUO","text":"ANTIGUO"},{"value":"NUEVO","text":"NUEVO"},{"value":"","text":""}]'>
                                            {{$diario->tipo}}
                                        </a>    
                                        @else
                                            {{ $diario->tipo }}
                                        @endcan
                                    </td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{$diario->asignado}}</td>
                                    <td class="celdas" style="border: 1px solid #9FAACC;padding-top:10px;padding-bottom:10px;">{{$diario->registrado}}</td>
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
           
                <div class="py-2 px-2">
                    {{ $diarias->links('vendor.pagination.custom') }}
                </div>
           
            </div>
        </div>
    </div>
</div>

<!-- Inicio modal origen -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Evento: </h6>
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FFDB00"> Llegada a origen</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn2" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" name="oriuser" value="{{$userName}}" readonly>
                                <label>Usuario</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control" name="oridate" value="" autocomplete="off">
                                <label>Fecha y hora</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="floatingTextarea2" name="orinote" autocomplete="off" style="height: 100px"></textarea>
                                <label>Observacion evento</label>
                            </div>
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<!-- Inicio modal salida -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Evento: </h6>
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FFDB00"> Salida</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn3" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}                            
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" name="saluser" value="{{$userName}}" readonly>
                                <label>Usuario</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control" name="saldate" value="" autocomplete="off">
                                <label>Fecha y hora</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="floatingTextarea2" name="salnote" autocomplete="off" style="height: 100px"></textarea>
                                <label>Observacion evento</label>
                            </div>
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<!-- Inicio modal destino -->
<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Evento: </h6>
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FFDB00">  Llegada a destino</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn3" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" name="desuser" value="{{$userName}}" readonly>
                                <label>Usuario</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control" name="desdate" value="" autocomplete="off">
                                <label>Fecha y hora</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="floatingTextarea2" name="desnote" autocomplete="off" style="height: 100px"></textarea>
                                <label>Observacion evento</label>
                            </div>
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<!-- Inicio modal final -->
<div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Evento: </h6>
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FFDB00"> Finalizar servicio</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn3" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" name="finuser" value="{{$userName}}" readonly>
                                <label>Usuario</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control" name="findate" value="" autocomplete="off">
                                <label>Fecha y hora</label>
                            </div>
                            <div class="form-floating mb-2">
                                <select class="form-select" id="floatingTextarea2" name="finnote" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>AUXILIAR LLEGA TARDE</option>
                                        <option>AUXILIAR NO SE PRESENTA</option>
                                        <option>AUXILIAR SIN EPP</option>
                                        <option>CAMBIO DE VEHÍCULO</option>
                                        <option>CUMPLIDO A CONFORMIDAD</option>
                                        <option>DESTINATARIO NO RECIBE</option>
                                        <option>DOCUMENTACION INCOMPLETA DEL VEHICULO</option>
                                        <option>ENTREGADO CON NOVEDAD</option>
                                        <option>LLEGADA TARDE DEL VEHICULO AL CARGUE</option>
                                        <option>LLEGADA TARDE DEL VEHICULO AL DESCARGUE</option>
                                        <option>VEHICULO NO CARGADO POR EL CLIENTE</option>
                                        <option>VEHICULO RETRASADO</option>
                                        <option>VEHICULO VARADO</option>                                        
                                    </select>
                                <label>Observacion evento</label>
                            </div>
                            <div class="form-floating mb-2">
                                <select class="form-select" id="floatingTextarea2" name="responsable" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>CLIENTE</option>
                                        <option>DESTINATARIO</option>
                                        <option>ENTE EXTERNO</option>
                                        <option>GLE</option>                                                                           
                                        <option>SIN NOVEDAD</option>                                                                           
                                    </select>
                                <label>Responsable</label>
                            </div>
                            <div class="form-floating mb-2">
                                <select class="form-select" id="floatingTextarea2" name="cte" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>                                                                           
                                        <option>5</option>                                                                           
                                    </select>
                                <label>Cumplimiento en tiempos de entrega</label>
                            </div>
                            <div class="form-floating mb-2">
                                <select class="form-select" id="floatingTextarea2" name="ays" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>                                                                           
                                        <option>5</option>                                                                           
                                    </select>
                                <label>Atención y servicio</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="floatingTextarea2" name="nota_cierre" autocomplete="off" style="height: 60px"></textarea>
                                <label>Observacion calificación (no obligatorio) hasta 255 caracteres.</label>
                            </div>
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<!-- Inicio modal cancelar -->
<div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Evento: </h6>
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FF5580"> Cancelar servicio</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn3" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" name="canuser" value="{{$userName}}" readonly>
                                <label>Usuario</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control" name="candate" value="" autocomplete="off">
                                <label>Fecha y hora</label>
                            </div>
                            <div class="form-floating mb-2">
                                <select class="form-select" id="floatingTextarea2" name="responsable" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>CLIENTE</option>
                                        <option>DESTINATARIO</option>
                                        <option>ENTE EXTERNO</option>
                                        <option>GLE</option> 
                                        <option>SIN NOVEDAD</option>                                                                           
                                    </select>
                                <label>Responsable</label>
                            </div>
                            <div class="form-floating mb-2">
                                    <select class="form-select" id="floatingTextarea2" name="cannote" autocomplete="off"
                                        aria-label="Floating label select example">
                                        <option selected disabled>Seleccionar</option>
                                        <option>NO TIENE MERCANCIA PARA DESPACHAR</option>
                                        <option>NO ACEPTA TARIFA</option>
                                        <option>SERVICIO DUPLICADO</option>
                                        <option>PROBLEMAS DE ORDEN PUBLICO</option>
                                        <option>VEHICULO VARADO</option>
                                        <option>PROBLEMAS EXTERNOS</option>
                                        <option>NO SE UBICA VEH PARA REALIZAR SERVICIO</option>                                                                           
                                    </select>
                                <label>Observacion evento</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="floatingTextarea2" name="cannotes" autocomplete="off" style="height: 60px"></textarea>
                                <label>Notas cancelacion. Hasta 255 caracteres.</label>
                            </div>
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<!-- Inicio modal notas cargue -->
<div class="modal fade" id="exampleModalCenter6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flex">
                <h6 class="modal-title" style="color: white;margin-right:5px;">Evento: </h6>
                <h6 class="modal-title m-0 flex" id="exampleModalCenterTitle" style="color: #FFFFFF">  Notas de cargue</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="crn3" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" name="caruser" value="{{$userName}}" readonly>
                                <label>Usuario</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control" name="cardate" value="" autocomplete="off">
                                <label>Fecha y hora</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="floatingTextarea2" name="carnote" autocomplete="off" style="height: 100px"></textarea>
                                <label>Observacion evento</label>
                            </div>
                            <button type="submit" class="btn btn-soft-primary">Guardar</button>
                            <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </div>
</div><!--final del modal-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // BotÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n que activÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var routeTemplate = '{{ route('solicitud.update2', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter2');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // BotÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n que activÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var routeTemplate = '{{ route('solicitud.update3', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter3');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // BotÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n que activÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var routeTemplate = '{{ route('solicitud.update4', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter4');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // BotÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n que activÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var routeTemplate = '{{ route('solicitud.update5', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter5');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // BotÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n que activÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var routeTemplate = '{{ route('solicitud.update6', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModalCenter6');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // BotÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n que activÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ el modal
            var id = button.getAttribute('data-id'); // Extraer info de atributos de datos
            
            // Construir la URL de la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var routeTemplate = '{{ route('solicitud.update7', ['id' => ':id']) }}';
            var actionUrl = routeTemplate.replace(':id', id);

            // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
            var form = exampleModal.querySelector('form'); // Encontrar el formulario dentro del modal
            form.action = actionUrl; // Actualizar la acciÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³n del formulario
        });
    });
</script>

<script> 
    $(document).ready(function() {
    $('#examples').DataTable({
        responsive: true,
        autoWidth: false,
        paging: false,
        ordering: false,
        info: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pÃƒÂ¡gina",
            "zeroRecords": "No se encontraron registros",            
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",            
        }
    });
});

    $.fn.editable.defaults.mode = "inline";
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editable').editable({
        url:"/solicitud/update",
        type: 'text',
        emptytext: 'Sin asignar',
        //inputclass: 'form-control',
        success: function(response, newValue) {
            if (response.success) {
                // Actualizar solo el valor del enlace editable
                $(this).text(newValue);
                //location.reload();
            } }, } );
            
</script>

<script>
    $.fn.editable.defaults.mode = "inline";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editabler').editable({
        url: "/solicitud/update",
        type: 'text',
        emptytext: 'Sin asignar',
        inputclass: 'editable-costo', // Clase personalizada para el campo editable
        success: function(response, newValue) {
            if (response.success) {
                $(this).text(formatNumber(newValue));
            }
        },        
        display: function(value, sourceData) {            
                $(this).text(formatNumber(value));            
            }        
    });
    // Formatear el número con separadores de miles
    function formatNumber(value) {
        value = value.replace(/\D/g, '');
        return Number(value).toLocaleString('es');
    }
    // Usar delegación de eventos para aplicar el formateo en tiempo real
    $(document).on('input', '.editable-costo', function() {
        let value = $(this).val().replace(/\D/g, '');
        value = Number(value).toLocaleString('es');
        $(this).val(value);
    });
    // Aplicar el formateo al mostrar el campo editable
    $(document).on('shown', '.editable', function(e, editable) {        
            $('.editable-costo').trigger('input');         
    });
</script>

<script>
    $(document).ready(function() {
        $('.update-solicitud').on('click', function(e) {
            e.preventDefault();
            
            var id = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var date = new Date();
            
            // Calcula las fechas necesarias
            var oridate = new Date(date.getTime() - (3 * 60 * 60 * 1000)).toISOString().slice(0, 19).replace('T', ' ');
            var saldate = new Date(date.getTime() - (2 * 60 * 60 * 1000)).toISOString().slice(0, 19).replace('T', ' ');
            var desdate = new Date(date.getTime() - (1 * 60 * 60 * 1000)).toISOString().slice(0, 19).replace('T', ' ');
            var findate = new Date(date.getTime()).toISOString().slice(0, 19).replace('T', ' ');
            
            $.ajax({
                url: '/solicitud/' + id + '/update10',
                type: 'POST',
                data: {
                    _method: 'PUT',  // Esto es necesario para engañar al servidor para que acepte la solicitud PUT
                    _token: token,
                    oriuser: "{{ Auth::user()->name }}",
                    oridate: oridate,
                    saluser: "{{ Auth::user()->name }}",
                    saldate: saldate,
                    desuser: "{{ Auth::user()->name }}",
                    desdate: desdate,
                    finuser: "{{ Auth::user()->name }}",
                    findate: findate,
                    finnote: 'Cierre masivo'
                },
                success: function(response) {
                    alert('Solicitud actualizada con éxito');
                },
                error: function(response) {
                    alert('Error al actualizar la solicitud: ' + response.responseJSON.message + '\n' + response.responseJSON.error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#exampl').DataTable({
            paging: false,      // desactiva paginación
            searching: false,   // desactiva búsqueda
            info: false,        // oculta "Mostrando X de Y"
            ordering: true,     // activa ordenación (es true por defecto)
            //order: [[2, 'desc']], // Opcional: orden inicial por columna 2 (fecha_cargue)
            columnDefs: [
                { orderable: false, targets: 'no-sort' } // opcional: desactivar orden en columnas específicas
            ]
        });
    });
</script>

@if (session('success'))
    <script>
        Swal.fire("Evento actualizado correctamente!").then((result) => {
            if (result.isConfirmed) {
                window.location = "/solicitud";
            }
        });
    </script>
@endif

<x-footer />
