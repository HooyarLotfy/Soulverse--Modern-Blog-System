@php
    $user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Soulverse') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 min-h-screen text-gray-100">
    <header class="border-b border-gray-800 shadow-lg bg-gradient-to-r from-indigo-900 via-purple-900 to-gray-900">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-4">
            <a href="/" class="flex items-center gap-2 text-2xl font-bold text-indigo-400 hover:text-indigo-300 transition">
                <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m9-9H3"/></svg>
                Soulverse
            </a>
            @include('layouts.navigation')
        </div>
    </header>
    <main class="py-10 min-h-[80vh]">
        <div class="max-w-7xl mx-auto px-4">
            @isset($header)
                <div class="mb-8">
                    {{ $header }}
                </div>
            @endisset
            @yield('content')
        </div>
    </main>
    @include('layouts.footer')
</body>
</html>


