<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Album') }}
        </h2>   
    </x-slot>

    <form action="{{ route('updateAlbum', ['id' => $albumedit->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96 mx-auto py-14">
            <div class="relative h-56 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                <img src="{{ asset('images/'.$albumedit->coverimage) }}" alt="{{ $albumedit->namaalbum }}" id="preview" class="mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
            </div>
            <div class="p-1 m-2">
                <label for="namaalbum" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Title your Gallery</label>
                <input type="text" name="namaalbum" id="namaalbum" value="{{ $albumedit->namaalbum }}" placeholder="Add your title" class="form-control rounded-xl border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500">
                @error('namaalbum')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="p-1 m-2">
                <label for="coverimage" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Upload Cover Album</label>
                <input type="file" id="coverimage" name="coverimage" class="file-input border" onchange="previewImage(event)">
                @error('coverimage')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="p-1 m-2">
                <label for="deskripsi" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" value="{{ $albumedit->deskripsi }}" placeholder="Add your description" class="form-control rounded-xl border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500">
                @error('deskripsi')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="pt-1 m-1">
                <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" type="button">
                    Update
                </button>
            </div>
        </div>
    </form>

    <script>
        // Function to preview image when selected
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
