<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-slate-900 text-slate-100 font-sans p-6">
    
    <header class="mb-8 border-b border-slate-700 pb-4">
        <h1 class="text-3xl font-bold text-blue-400">Agencia Espacial - Backoffice Livewire</h1>
        <p class="text-slate-400">Panel de Telemetría y Comandos en Tiempo Real</p>
    </header>

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>