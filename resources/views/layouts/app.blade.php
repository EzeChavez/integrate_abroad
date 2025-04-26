<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @if (app()->environment('testing'))
        <style>
            /* Tailwind CSS básico para pruebas */
            .min-h-screen { min-height: 100vh; }
            .bg-gray-100 { background-color: #f3f4f6; }
            .bg-white { background-color: #ffffff; }
            .shadow { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); }
        </style>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Contenido principal -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html> 