<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FFEDD6] min-h-screen flex flex-col justify-between font-mono">
    <x-header />

    <main class="max-w-3xl w-full mx-auto p-4 flex-1">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>