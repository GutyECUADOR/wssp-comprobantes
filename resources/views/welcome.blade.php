<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KAO Sport:. Registro de Comprobantes de pago</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            <div class="w-full max-w-2xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <!-- Logo -->
                    <img src="{{ asset('images/logo-kao.png') }}" alt="Logo" class="h-10 w-auto">
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                       
                        <div class="flex flex-col w-full scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex focus:outline focus:outline-2 focus:outline-red-500" style="width: 600px; margin: 0 auto;">
                            <div class="w-full text-center">
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Registro de Comprobantes de pago</h2>
                                <p class="mt-2 mb-5 text-sm text-gray-600 dark:text-gray-400">Ingresa tus datos para registrar tus comprobantes de pago.</p>

                            </div>
                            <div class="w-full mt-6">
                                <livewire:upload-comprobantes-form />
                            </div>
                        </div>
                    </div>
                </div>

        
            </div>
        </div>
    </body>
</html>

