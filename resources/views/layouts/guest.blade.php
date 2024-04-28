@props([
    'navbar' => [
        [
            'label' => 'Beranda',
            'link' => 'home',
        ],
        [
            'label' => 'Tentang Organisasi dan Kader',
            'link' => 'tentang.index',
        ],
        [
            'label' => 'Kontak',
            'link' => 'contact',
        ],
        [
            'label' => 'Opini Kader',
            'link' => 'blogs.index',
        ],
        [
            'label' => 'Informasi Kegiatan Teknik',
            'link' => 'activity.index',
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
    <div class="w-full">
      <nav
        class="container relative flex flex-wrap items-center justify-between p-8 mx-auto lg:justify-between xl:px-0">
        <div class="flex flex-wrap items-center justify-between w-full lg:w-auto">
          <button aria-label="Toggle Menu"
            class="px-2 py-1 ml-auto text-gray-500 rounded-md lg:hidden hover:text-indigo-500 focus:text-indigo-500 focus:bg-indigo-100 focus:outline-none dark:text-gray-300 dark:focus:bg-trueGray-700"
            id="headlessui-disclosure-button-:R956:" type="button" aria-expanded="false" data-headlessui-state="">
            <svg
              class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
              </path>
            </svg>
          </button>
        </div>
        <div class="hidden text-center lg:flex lg:items-center">
          <ul class="items-center justify-end flex-1 pt-6 list-none lg:pt-0 lg:flex">
            @foreach ($navbar as $item)
                
            <li class="mr-3 nav__item">
              <x-nav-link :active="request()->routeIs($item['link'])"
                :href="route($item['link'])"
                class="text-3xl">
                {{$item['label']}}
              </x-nav-link>
            </li>
            @endforeach
          </ul>
        </div>
        <div class="hidden mr-3 space-x-4 lg:flex nav__item">
          <a
            class="btn btn-link dark:text-white" href="{{ route('login') }}">
            Login
          </a>
          {{-- <a
            class="btn btn-primary dark:text-white" href="{{ route('register') }}">
            Register
          </a> --}}
        </div>
      </nav>
    </div>

    <div>
    </div>

    {{ $slot }}
  </div>
</body>

</html>