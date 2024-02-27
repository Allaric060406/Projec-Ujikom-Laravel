<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ShowAlbum') }}
        </h2>
    </x-slot>
    <dh-component>
        <div class="py-12 transition duration-150 ease-in-out z-10 fixed top-0 right-0 bottom-0 left-0" id="modal" style="display:none;">
            <div class="bg-black opacity-50 absolute top-0 right-0 bottom-0 left-0"></div>
            <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg relative z-10">
                <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                    <div class="w-full flex justify-start text-gray-600 mb-3">
                    </div>

                    <form action="{{ route('uploadalbum') }}" method="post" enctype="multipart/form-data">
                        @csrf
                                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4 text-center">Upload Your Album</h1>
                                <label for="namaalbum" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Title your Gallery</label>
                                <input type="text" name="namaalbum" id="namaalbum"  value="{{old('namaalbum')}}" placeholder="add your title" class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500 ">
                                            <div class="invalid-feedback">
                                                @error('namaalbum')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                <div class="py-3">
                                    <label for="deskripsi" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Deskription</label>
                                    <input type="text" name="deskripsi" id="deskripsi"  value="{{old('deskripsi')}}" placeholder="add your title" class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500 ">
                                                <div class="invalid-feedback">
                                                    @error('deskripsi')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                </div>
                                <div class="my-3">
                                    <label for="tanggal_dibuat" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Expiry Date</label>
                                    <input type="date" id="tanggal_dibuat" name="tanggal_dibuat" class="mt-1 block w-full shadow-sm sm:text-sm focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500 rounded-md">
                                </div>

                                <div class="mb-3">
                                    <label for="coverimage" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Upload Cover Album</label>
                                    <input type="file" id="coverimage" name="coverimage" class="file-input border">
                                    @error('coverimage')
                                    <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="flex items-center justify-start w-full">
                                    {{-- submmit button --}}
                                    <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm" onclick="modalHandler()">Submit</button>

                                    <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" onclick="modalHandler(false)">Cancel</button>
                                </div>
                                <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler(false)" aria-label="close modal" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </button>
                                </div>
                            </div>
                        </div>
                    </form>
                        <div class="w-full flex justify-end pr-24 py-9" id="button">
                            <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 transition duration-150 ease-in-out hover:bg-blue-600 bg-blue-700 rounded-full text-white px-4 sm:px-8 py-3 text-xs sm:text-sm " onclick="modalHandler(true)">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="fill-current mr-2" style="width: 1em; height: 1em;"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                                    <span>Add Gallery</span>
                                </span>
                            </button>
                        </div>
                        <div class="bg-gray-200 p-8">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach ($coverimage as $ci)
                                    <a href="{{ route('showPhotos', ['album' => $ci->id]) }}" class="relative overflow-hidden bg-gray-400 rounded-xl group">
                                        <img src="{{ asset('images/' . $ci->coverimage) }}" alt="{{ $ci->coverimage }}" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 bg-black bg-opacity-50 group-hover:opacity-100 transition-opacity duration-300">
                                            <span class="text-white text-lg font-semibold">{{ $ci->namaalbum }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        
    <script>
        let modal = document.getElementById("modal");
        function modalHandler(open) {
            if (open) {
                fadeIn(modal);
            } else {
                fadeOut(modal);
            }
        }
        function fadeOut(el) {
            el.style.opacity = 1;
            (function fade() {
                if ((el.style.opacity -= 0.1) < 0) {
                    el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        }
        function fadeIn(el, display) {
            el.style.opacity = 0;
            el.style.display = display || "flex";
            (function fade() {
                let val = parseFloat(el.style.opacity);
                if (!((val += 0.2) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        }
    </script>
</dh-component>
<!-- Code block ends -->

</x-app-layout>