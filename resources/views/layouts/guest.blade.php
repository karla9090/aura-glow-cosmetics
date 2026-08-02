<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Aura Glow') }}</title>

        <!-- Fonts & Tailwind -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-slate-50">
        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
            
            <!-- Logo Superior -->
            <div class="mb-6 text-center">
                <a href="/" class="text-3xl font-extrabold text-pink-600 tracking-wide hover:opacity-90 transition">
                    Aura Glow ✨
                </a>
            </div>

            <!-- Contenedor Principal (Más ancho, padding amplio y bordes elegantes) -->
            <div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-2xl shadow-xl border border-gray-100">
                {{ $slot }}
            </div>

            <!-- Botón Volver -->
            <div class="mt-8 text-center">
                <a href="/" class="text-sm text-gray-500 hover:text-pink-600 font-medium transition">
                    ← Volver a la tienda
                </a>
            </div>
        </div>
    </body>
</html>