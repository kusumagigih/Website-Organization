@props(['header' => ''])

<x-app-layout>
  <div class="mx-auto container my-12">
    <div
      class="flex flex-col p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
      <h1 class="flex">
        <span class="m-auto">
          {{ $header }}
        </span>
        {{ $pageButtons ?? '' }}
      </h1>
      @if (count($errors) > 0)
        <div class="alert alert-error">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach

        </div>
      @endif
      {{ $slot }}
    </div>
  </div>
</x-app-layout>
