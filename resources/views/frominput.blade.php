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
                    <img id="preview"  />
                </div>
                <div class="col-5 offset-1">
                    <form action="/inputimage" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="company" class=" form-control-label " >Title</label>
                            <input type="text" name="judulfoto" id="judulfoto"  value="{{old('judulfoto')}}" placeholder="add your title" class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500 ">
                                <div class="invalid-feedback">
                                    @error('nama')
                                       {{ $message }}
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="company" class=" form-control-label">Description</label>
                            <input type="text" name="deksipsifoto"  value="{{old('deksipsifoto')}}" id="deksipsifoto" placeholder="add detailed Description" class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500  @error('nama') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('nama')
                                       {{ $message }}
                                    @enderror
                                </div>
                        </div>
                        {{-- <div class="form-group mt-3">
                            <label for="company" class=" form-control-label">Category</label>
                            <input type="text" name="nama"  value="{{old('nama')}}" id="company" placeholder="Category image" class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500   @error('nama') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('nama')
                                       {{ $message }}
                                    @enderror
                                </div>
                        </div>  --}}
                        <div class="form-group">
                            <label for="lokasifoto">Category</label>
                            <select class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500" id="lokasifoto" name="lokasifoto">
                                <option selected>Category Image</option>
                                <option value="rumah">Rumah</option>
                                <option value="kantor">Kantor</option>
                                <option value="taman">Taman</option>
                                <!-- tambahkan opsi lain sesuai kebutuhan -->
                            </select>
                        </div>
                        {{-- <input type="file" name="image" class="border" onchange="previewImage(event)"> --}}
                        <div id="drop-area" class="drop-area">
                            <input type="file" id="imagefile" class="file-input border" name="imagefile" onchange="previewImage(event)">
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

{{-- <script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script> --}}

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const dropArea = document.getElementById("drop-area");
    
        ["dragenter", "dragover", "dragleave", "drop"].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });
    
        function preventDefaults (e) {
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
    
        function handleDrop(e) {
            let dt = e.dataTransfer;
            let files = dt.files;
    
            handleFiles(files);
        }
    
        function handleFiles(files) {
            if(files.length === 0) return;
    
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