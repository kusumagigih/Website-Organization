<x-guest-layout>
    <div class="container">
        <div class="bg-white rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{ asset('images'.$tentang->image) }}}" alt="">
            <div class="px-6 py-4">
                <h5 class="font-bold text-xl mb-2">{{ $tentang->nama }}</h5>
                <p class="text-gray-700 text-base">{{ $tentang->kaderisasi }}</p>
            </div>
        </div>
    </div>
</x-guest-layout>
