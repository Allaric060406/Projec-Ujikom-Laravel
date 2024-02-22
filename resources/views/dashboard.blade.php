<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container-fluid bg-zinc-50">
      <div class="container">
        <div class="row">
          @foreach ($semuaFoto as $item)
              <a href="{{asset('images/'.$item->imagefile)}}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="{{asset('images/'.$item->imagefile)}}" class="img-fluid rounded">
              </a>
              <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=252" class="img-fluid rounded">
              </a>
              <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=253" class="img-fluid rounded">
              </a>
            </div>
            <div class="row">
              <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid rounded">
              </a>
              <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid rounded">
              </a>
              <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid rounded">
              </a>
            </div>
          @endforeach
      </div>
    </div>
    
</x-app-layout>
