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