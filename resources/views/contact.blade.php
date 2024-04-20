<x-guest-layout>
    <div x-data="{ open: false }" class="container dark:text-white py-16 md:py-20" id="contact">
      <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
        Here's a contact form
      </h2>
      <div class="text-center my-8">
        <x-primary-button
        @click="open = !open"
        class="pt-6 text-center font-header text-xl font-medium sm:text-2xl lg:text-3xl">
          Have Any Questions?
        </x-primary-button>  
      </div>
      <div class="mx-auto w-full pt-5 text-center sm:w-2/3 lg:pt-6">
        <p class="font-body text-grey-10">
          Lorem ipsum dolor sit amet consectetur adipiscing elit hendrerit
          condimentum turpis nisl sem, viverra habitasse urna ante lobortis
          fermentum accumsan. Viverra habitasse urna ante lobortis fermentum
          accumsan.
        </p>
      </div>
  
      <form x-show="open" class="mx-auto w-full pt-10 sm:w-3/4">
        <div class="flex flex-col md:flex-row">
          <input class="mr-3 w-full rounded border-grey-50 px-4 py-3 font-body md:w-1/2 lg:mr-5"
            placeholder="Name" type="text" id="name">
          <input
            class="mt-6 w-full rounded border-grey-50 px-4 py-3 font-body md:mt-0 md:ml-3 md:w-1/2 lg:ml-5"
            placeholder="Email" type="text" id="email">
        </div>
        <textarea class="mt-6 w-full rounded border-grey-50 px-4 py-3 font-body md:mt-8" placeholder="Message"
          id="message" cols="30" rows="10"></textarea>
        
        <x-primary-button class="text-3xl">
          Send
        </x-primary-button>
       
      </form>
      <div class="flex flex-col pt-16 lg:flex-row">
        <div class="w-full border-l-2 border-t-2 border-r-2 border-b-2 border-grey-60 px-6 py-6 sm:py-8 lg:w-1/3">
          <div class="flex items-center">
            <i class="bx bx-phone text-2xl text-grey-40"></i>
            <p class="pl-2 font-body font-bold uppercase text-grey-40 lg:text-lg">
              Contact Person
            </p>
          </div>
          <x-secondary-button>
          {{-- <p class="pt-2 text-left font-body font-bold text-primary lg:text-lg">
            (+62) 82273002691
          </p> --}}
          <a target="_blank" href="https://wa.link/d3lnje" class="pt-2 text-left font-body font-bold text-primary lg:text-lg">
            (+62) 82273002691
          </a>
          </x-secondary-button>
        </div>
        <div
          class="w-full border-l-2 border-t-0 border-r-2 border-b-2 border-grey-60 px-6 py-6 sm:py-8 lg:w-1/3 lg:border-l-0 lg:border-t-2">
          <div class="flex items-center">
            <i class="bx bx-envelope text-2xl text-grey-40"></i>
            <p class="pl-2 font-body font-bold uppercase text-grey-40 lg:text-lg">
              Email Organisasi
            </p>
          </div>
          <p class="pt-2 text-left font-body font-bold text-primary lg:text-lg">
            dpkteknik@gmail.com
          </p>
        </div>
        <div
          class="w-full border-l-2 border-t-0 border-r-2 border-b-2 border-grey-60 px-6 py-6 sm:py-8 lg:w-1/3 lg:border-l-0 lg:border-t-2">
          <div class="flex items-center">
            <i class="bx bx-map text-2xl text-grey-40"></i>
            <p class="pl-2 font-body font-bold uppercase text-grey-40 lg:text-lg">
              Sekretariat DPK GmnI Teknik
            </p>
          </div>
          <p class="pt-2 text-left font-body font-bold text-primary lg:text-lg">
            Kontrakan Bung Raka
          </p>
        </div>
      </div>
    </div>
  </x-guest-layout>
  