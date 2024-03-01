<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="bg-white dark:bg-gray-800 h-screen h-full py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
                @foreach ($semuaFoto as $item)
                <!-- image - start -->
                <a href="{{ route('komentar.foto', ['fotoId' => $item->id]) }}"
                    class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                    <img src="{{ asset('images/'.$item->imagefile) }}" loading="lazy" alt="Photo by Minh Pham"
                        class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
    
                    <div
                        class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                    </div>
    
                    <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">{{$item->judulfoto}}</span>
                </a>
                    
                @endforeach
            </div>
        </div>
    </div>
    
  
    
</x-app-layout>

