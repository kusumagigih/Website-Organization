@props([
    'navbar' => [
        [
            'label' => 'Tentang Organisasi dan Kader',
            'link' => 'tentangg.index',
        ],
        [
            'label' => 'Kontak',
            'link' => 'kontakk.index',
        ],
        [
            'label' => 'Opini Kader',
            'link' => 'blog.index',
        ],
        [
            'label' => 'Informasi Kegiatan Teknik',
            'link' => 'activiti.index',
        ],
    ],
])

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
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-start items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')
            
            {{-- <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
