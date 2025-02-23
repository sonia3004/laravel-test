<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles <!-- Nécessaire pour les styles Livewire -->

    <!-- Ajout Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content') <!-- Utilisation correcte de Blade -->
        </main>
    </div>

    @livewireScripts <!-- Ajouté pour Livewire -->

    <!--  Vérification automatique de Livewire et Alpine.js dans la console -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (typeof Livewire === "undefined") {
                console.error("❌ Livewire n'est pas chargé !");
            } else {
                console.log("✅ Livewire est bien chargé !");
            }

            if (typeof Alpine === "undefined") {
                console.error("❌ Alpine.js n'est pas chargé !");
            } else {
                console.log("✅ Alpine.js est bien chargé !");
            }
        });
    </script>
</body>
</html>
