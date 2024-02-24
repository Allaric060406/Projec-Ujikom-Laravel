<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container-fluid bg-zinc-50">
      <div class="container">
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-4">
              @foreach ($semuaFoto as $item)
              <a href="{{ asset('images/'.$item->imagefile) }}" data-toggle="lightbox" data-gallery="gallery">
                  <img src="{{  asset('images/'.$item->imagefile) }}" class="w-full h-auto rounded-md">
              </a>
              @endforeach
          </div>
      </div>
  </div>
  
    
</x-app-layout>
