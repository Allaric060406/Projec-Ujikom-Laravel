<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('DetailAlbum') }}
        </h2>
    </x-slot>
    <div class="bg-gray-200 p-8">       
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @if ($Detailalbum->isEmpty())
                <div class="flex justify-center items-center h-full">
                    <p>Foto belum dimasukkan ke dalam album ini.</p>
                </div>
            @else
                @foreach ($Detailalbum as $ci)
                    <div class="relative overflow-hidden bg-gray-400 rounded-xl group">
                        <img src="{{ asset('images/' . $ci->imagefile) }}" alt="{{ $ci->imagefile }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 bg-black bg-opacity-50 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-white text-lg font-semibold">{{ $ci->judulfoto }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
</x-app-layout>

