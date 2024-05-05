<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />

    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: hidden !important;
        }
    </style>

    @filamentStyles
    @wireUiScripts
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <header class="flex flex-wrap w-full border-b border-gray-200">
        <nav class="flex items-center justify-between px-12 py-6 xl:max-w-5xl xl:px-10 w-full max-w-4xl mx-auto">
            <div>
                <a href="{{ route('cars') }}" class="text-2xl font-semibold">{{ config('app.name') }}</a>
            </div>
            <div>
                <a href="{{ route('filament.admin.pages.dashboard') }}" class="flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span>Log In</span>
                </a>

            </div>
        </nav>
    </header>
    <section class="mx-auto max-w-4xl px-4 sm:px-6 xl:max-w-5xl xl:px-0">
        <div class="p-6">
            {{ $slot }}
        </div>
    </section>

    @livewire('notifications')

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>