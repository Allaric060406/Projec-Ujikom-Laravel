    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Upload Image') }}
            @vite('resources/css/app.css')
        </h2>
    </x-slot>
    <div class="container-fluid py-5 bg-zinc-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4 offset-1">
                    <img id="preview" class="w-full h-auto" />
                </div>
                <div class="col-5 offset-1">
                    <form action="/inputimage" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judulfoto" class=" form-control-label " >Title</label>
                            <input type="text" name="judulfoto" id="judulfoto"  value="{{old('judulfoto')}}" placeholder="add your title" class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500" required>
                                <div class="invalid-feedback">
                                    @error('judulfoto')
                                       {{ $message }}
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="deskripsifoto" class=" form-control-label">Description</label>
                            <input type="text" name="deskripsifoto"  value="{{old('deskripsifoto')}}" id="deskripsifoto" placeholder="add detailed Description" class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500  @error('deskripsifoto') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('deskripsifoto')
                                       {{ $message }}
                                    @enderror
                                </div>
                        </div>                                                             
                        <div class="form-group mt-3">
                            <label for="lokasifoto" class=" form-control-label">Lokasi Foto</label>
                            <input type="text" name="lokasifoto"  value="{{old('lokasifoto')}}" id="lokasifoto" placeholder="add detailed Description" class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500  @error('lokasifoto') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('lokasifoto')
                                       {{ $message }}
                                    @enderror
                                </div>
                        </div>                                                             
                        <div class="form-group">
                            <label for="album_id">Add Your Album</label>
                            <select class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500" id="album_id" name="album_id">
                                <option selected>Album Image</option>
                                @foreach ($datacategory as $ct)
                                    <option value="{{$ct->id}}">{{$ct->namaalbum}}</option>
                                @endforeach
                                <!-- tambahkan opsi lain sesuai kebutuhan -->
                            </select>
                        </div>
                        {{-- <input type="file" name="image" class="border" onchange="previewImage(event)"> --}}
                        <div id="drop-area" class="drop-area">
                            <label  for="imagefile">
                                <input type="file" id="imagefile" class="file-input border" name="imagefile" onchange="previewImage(event)">
                            </label>
                                <div class="flex items-center justify-center m-3 border-dashed border-2 border-indigo-600 h-20 rounded-xl text-slate-300">
                                    Drag & Drop files here
                                </div>
                        </div>
                        <br>
                            <button type="submit"class="text-lg font-medium text-blue-400 border-2 border-blue-400 px-12 py-3 rounded-full hover:text-white group relative  items-center overflow-hidden ">
                                <span class="absolute left-0 w-full h-0 transition-all bg-blue-400 opacity-100 group-hover:h-full group-hover:top-0 duration-400 ease"></span>
                                <span  class="relative">Submit</span>
                            </button>
                    </form>
                    {{-- test aja ini mah --}}
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const dropArea = document.getElementById("drop-area");
        const inputFile = document.getElementById("imagefile");

        // Menambahkan preventDefault pada event dragover dan drop
        ["dragenter", "dragover", "dragleave", "drop"].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ["dragenter", "dragover"].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ["dragleave", "drop"].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropArea.classList.add('highlight');
        }

        function unhighlight(e) {
            dropArea.classList.remove('highlight');
        }

        dropArea.addEventListener('drop', handleDrop, false);
        // Hapus event listener untuk change input file
        // inputFile.addEventListener('change', handleFiles);

        // Fungsi untuk menangani event change pada input file
        inputFile.addEventListener('change', function(event) {
            const files = event.target.files;
            handleFiles(files);
        });

        function handleDrop(e) {
            let dt = e.dataTransfer;
            let files = dt.files;

            handleFiles(files);
        }

        function handleFiles(files) {
            if (files.length === 0) return;

            const file = files[0];
            if (!file.type.startsWith('image/')) {
                alert('Please upload an image file.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(event) {
                const previewImage = document.getElementById('preview');
                previewImage.src = event.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

