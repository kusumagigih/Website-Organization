<x-guest-layout>
    <!-- HERO 1 -->
    <div class="w-screen relative bg-cover bg-center bg-no-repeat py-8"
        style="background-image: url('/images/bgabout.jpg')">
        <div
            class="backdrop-brightness-50 absolute inset-0 z-20 bg-gradient-to-r from-hero-gradient-from to-hero-gradient-to bg-cover bg-center bg-no-repeat">
        </div>

        <div class="container relative z-30 pt-20 pb-12 sm:pt-56 sm:pb-48 lg:pt-64 lg:pb-48">
            <div class="flex flex-col items-center justify-center lg:flex-row">
                <div class="rounded-full border-8 border-primary shadow-xl">
                    <img src="{{ url('/images/dpk.png') }}" class="h-48 rounded-full sm:h-56" alt="Image">
                </div>
                <div class="pt-8 sm:pt-10 lg:pl-8 lg:pt-0">
                    <h1 class="text-center font-header text-4xl text-white sm:text-left sm:text-5xl md:text-6xl">
                        DPK GmnI Teknik Universitas Trunojoyo Madura
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- HERO 3 -->
    <div class="container dark:text-white py-16 md:py-20" id="portfolio">
        <h2 class="text-center font-header text-4xl font-semibold text-primary sm:text-5xl lg:text-6xl">
            Kader DPK GmnI Teknik Universitas Trunojoyo Madura
        </h2>
        <div class="container my-12">
            <div class="grid grid-cols-3 gap-10 justify-center">
                @foreach ($list as $tentangs)
                    <x-tentang-card :tentang="$tentangs" />
                @endforeach
            </div>
        </div>
    </div>
    <!-- HERO 4 -->
    <div class="relative py-16">
        <div aria-hidden="true"
            class="absolute inset-0 h-max w-full m-auto grid grid-cols-2 -space-x-52 opacity-40 dark:opacity-20">
            <div class="blur-[106px] h-56 bg-gradient-to-br from-primary to-purple-400 dark:from-blue-700"></div>
            <div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400 to-sky-300 dark:to-indigo-600"></div>
        </div>
        <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
            <div class="relative">
                <div class="flex items-center justify-center -space-x-2">
                    <img loading="lazy" width="400" height="400" src="https://picsum.photos/id/120/200/200"
                        alt="member photo" class="h-8 w-8 rounded-full object-cover">
                    <img loading="lazy" width="200" height="200" src="https://picsum.photos/id/220/200/200"
                        alt="member photo" class="h-12 w-12 rounded-full object-cover">
                    <img loading="lazy" width="200" height="200" src="https://picsum.photos/id/320/200/200"
                        alt="member photo" class="z-10 h-16 w-16 rounded-full object-cover">
                    <img loading="lazy" width="200" height="200" src="https://picsum.photos/id/420/200/200"
                        alt="member photo" class="relative h-12 w-12 rounded-full object-cover">
                    <img loading="lazy" width="200" height="200" src="https://picsum.photos/id/520/200/200"
                        alt="member photo" class="h-8 w-8 rounded-full object-cover">
                </div>
                <div class="mt-6 m-auto space-y-6 md:w-8/12 lg:w-7/12">
                    <h1 class="text-center text-4xl font-bold text-gray-800 dark:text-white md:text-5xl">Tertarik?</h1>
                    <p class="text-center text-xl text-gray-600 dark:text-gray-300">
                        Be part of millions people around the world using tailus in modern User Interfaces.
                    </p>
                    <div class="flex flex-wrap justify-center gap-6">
                        {{-- <a href="/kontak"
                            class="relative flex h-12 w-full items-center justify-center px-8 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
                            <span class="relative text-base font-semibold text-white dark:text-dark">Join With
                                Us!!!</span>
                        </a> --}}
                        <a href="/kontak"
                            class="relative flex h-12 w-full items-center justify-center px-8 before:absolute before:inset-0 before:rounded-full before:border before:border-transparent before:bg-primary/10 before:bg-gradient-to-b before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 dark:before:border-gray-700 dark:before:bg-gray-800 sm:w-max">
                            <span class="relative text-base font-semibold text-primary dark:text-white">
                                Join With Us !!!!
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
