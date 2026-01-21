<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>GLE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.css" rel="stylesheet" type="text/css" />

</head>

<body class="account-body accountbg">

    <!-- Log In page -->
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box" style="background-color: #021526">
                                <div class="text-center p-3">
                                    <br>
                                    <a class="logo logo-admin">
                                        <img src="assets/images/logo-sm-dark.png" height="60" alt="logo"
                                            class="auth-logo">
                                    </a>
                                    <br>                                   
                                    <p class="mb-0 text-white" style="font-size: 8px">SISTEMA DE FACTURACION</p>
                                    <br>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav-border nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" role="tab" style="color: #FF2029">
                                            <div id="reloj"></div>
                                        </a>
                                    </li>
                                </ul>
                                <br>
                                <x-validation-errors class="mb-4" />

                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf




                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                                            <form class="form-horizontal auth-form" action="index.html">

                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="email"
                                                        value="{{ __('Email') }}">Correo</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="email"
                                                            :value="old('email')" required autofocus
                                                            autocomplete="username" id="email"
                                                            placeholder="Ingrese su correo">
                                                    </div>
                                                </div><!--end form-group-->

                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="password"
                                                        value="{{ __('Password') }}">Contraseña</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" name="password"
                                                            required autocomplete="current-password" id="password"
                                                            placeholder="Ingrese su contraseña">
                                                    </div>
                                                </div><!--end form-group-->

                                                <div class="form-group row my-3">
                                                    <div class="col-sm-6">
                                                        <label for="remember_me" class="flex items-center">
                                                            <x-checkbox id="remember_me" name="remember" />
                                                            <span
                                                                class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordarme') }}</span>
                                                        </label>
                                                    </div><!--end col-->
                                                    <div class="col-sm-6 text-end">
                                                        @if (Route::has('password.request'))
                                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                                href="{{ route('password.request') }}">
                                                                {{ __('Olvido su contraseña?') }}
                                                            </a>
                                                        @endif
                                                    </div><!--end col-->
                                                </div><!--end form-group-->

                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <button class="btn btn-secondary w-100 waves-effect waves-light" style="background-color: #FF2029"
                                                            type="submit">{{ __('Iniciar sesión') }}<i
                                                                class="fas fa-sign-in-alt ms-1"></i></button>
                                                    </div><!--end col-->
                                                </div> <!--end form-group-->
                                            </form><!--end form-->
                                            <br><br><br>
                                        </div>

                                    </div>
                            </div><!--end card-body-->
                            <div class="card-body bg-light-alt text-center">
                                <span class="text-muted d-none d-sm-inline-block">GLE Grupo Logístico Especializado ©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script><br><a href="https://www.glecolombia.com/" target="blank"
                                        style="color: #ff2029">www.glecolombia.com</a>
                                </span>

                            </div>
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!-- End Log In page -->

    <script>
        // Función para obtener la fecha y la hora actual y actualizar el contenido del elemento HTML
        function actualizarReloj() {
            var ahora = new Date();
            var dia = ahora.getDate();
            var mes = ahora.getMonth() + 1; // Los meses en JavaScript se cuentan desde 0
            var anio = ahora.getFullYear();
            var horas = ahora.getHours();
            var minutos = ahora.getMinutes();
            var segundos = ahora.getSeconds();

            // Formatear la fecha como DD/MM/YYYY y la hora como HH:MM:SS
            var fechaHoraFormateada =
                `${dia.toString().padStart(2, '0')}.${mes.toString().padStart(2, '0')}.${anio} ${horas.toString().padStart(2, '0')}:${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;

            // Actualizar el contenido del elemento con el ID "reloj"
            document.getElementById("reloj").innerText = fechaHoraFormateada;
        }

        // Llamar a la función inicialmente para que muestre la fecha y la hora actual
        actualizarReloj();

        // Actualizar el reloj cada segundo (1000 milisegundos)
        setInterval(actualizarReloj, 1000);
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>


</body>

</html>
