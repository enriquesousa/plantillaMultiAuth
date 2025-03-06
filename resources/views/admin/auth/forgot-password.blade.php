{{-- <!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin Login</title>

    <!-- CSS files -->
    <link href="{{ asset('admin/assets/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="{{ asset('admin/assets/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">

            <!-- Logo -->
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('images/school.svg') }}" width="80" height="80" alt="Logo">
                </a>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Card Inicio de Sesión email y contraseña -->
            <div class="card card-md">
                <!-- Enviar enlace para restablecer contraseña -->
                <div class="card-body">

                    <span class="text-muted d-block mb-3">¿Olvidó su contraseña? No hay problema. Simplemente déjenos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva. </span>

                    <form action="{{ route('admin.password.email') }}" method="POST" autocomplete="off" novalidate>
                        @csrf

                        <!-- Correo Electrónico -->
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico</label>

                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="tucorreo@email.com" autocomplete="off" required>

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Envía enlace para restablecer contraseña</button>
                            <button type="button" class="btn btn-link w-100" onclick="window.location.href='{{ route('admin.login') }}'">Regresar a Admin Login</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('admin/assets/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('admin/assets/dist/js/demo.min.js?1692870487') }}" defer></script>

</body>

</html> --}}

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
