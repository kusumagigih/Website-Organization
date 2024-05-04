{{-- @props(['kontak']) --}}
<x-guest-layout>
    <div x-data="{ open: false }" class="container dark:text-white py-16 md:py-20" id="contact">
        <h2
            class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl whitespace-pre-line">
            Contact Person
            DPK GmnI Teknik
            Universitas Trunojoyo Madura
        </h2>

        <div class="flex flex-col pt-16 lg:flex-row">
            @foreach ($list as $kontak)
            <div class="w-full border-l-2 border-t-2 border-r-2 border-b-2 border-grey-60 px-6 py-6 sm:py-8 lg:w-1/3">
                <div class="items-center">
                    <i class="bx bx-phone text-2xl text-grey-40"></i>
                    <p class="font-body font-bold uppercase text-grey-40 lg:text-lg text-center">
                        Contact Person
                    </p>
                </div>
                
                <div class="text-center">
                    
                    <x-secondary-button>
                        <a target="_blank" href="{{ $kontak->linkwa }}"
                            class="text-center font-body font-bold text-primary lg:text-lg">
                            {{ $kontak->nomer }}
                        </a>
                    </x-secondary-button>
                    
                </div>
                
            </div>
            <div
                class="w-full border-l-2 border-t-0 border-r-2 border-b-2 border-grey-60 px-6 py-6 sm:py-8 lg:w-1/3 lg:border-l-0 lg:border-t-2">
                <div class="items-center">
                    <i class="bx bx-envelope text-2xl text-grey-40"></i>
                    <p class="font-body font-bold uppercase text-grey-40 lg:text-lg text-center">
                        Email Organisasi
                    </p>
                </div>
                <p class="pt-2 text-center font-body font-bold text-primary lg:text-lg">
                    {{ $kontak->email }}
                </p>
            </div>
            <div
                class="w-full border-l-2 border-t-0 border-r-2 border-b-2 border-grey-60 px-6 py-6 sm:py-8 lg:w-1/3 lg:border-l-0 lg:border-t-2">
                <div class="items-center">
                    <i class="bx bx-map text-2xl text-grey-40"></i>
                    <p class="font-body font-bold uppercase text-grey-40 lg:text-lg text-center">
                        Sekretariat DPK GmnI Teknik
                    </p>
                </div>
                <p class="pt-2 text-center font-body font-bold text-primary lg:text-lg">
                    {{ $kontak->sekret }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
