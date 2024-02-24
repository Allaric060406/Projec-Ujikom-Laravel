<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container-fluid bg-zinc-50">
      <div class="container">
        <div class="container mx-auto bg-zinc-50 px-4 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($semuaFoto as $item)
                    <a href="{{ asset('images/'.$item->imagefile) }}" data-toggle="lightbox" data-gallery="gallery" class="block aspect-w-1 aspect-h-1">
                        <img src="{{ asset('images/'.$item->imagefile) }}" class="object-cover w-full h-full rounded-md">
                    </a>
                @endforeach
            </div>
        </div>
        
      </div>
    </div>
  
    
</x-app-layout>
