<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ShowAlbum') }}
        </h2>
    </x-slot>
    <div class="container-fluid py-5 bg-zinc-50">
        <div class="container">
            <div class=" align-items-center">
                <form action="/uploadalbum" method="post">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                    <div class="form-group">
                        <label for="namaalbum" class=" form-control-label " >Nama album</label>
                        <input type="text" name="namaalbum" id="namaalbum"  value="{{old('namaalbum')}}" placeholder="add your title" class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500 ">
                            <div class="invalid-feedback">
                                @error('namaalbum')
                                   {{ $message }}
                                @enderror
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class=" form-control-label " >deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi"  value="{{old('deskripsi')}}" placeholder="add your title" class="form-control rounded-xl  border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500 ">
                            <div class="invalid-feedback">
                                @error('deskripsi')
                                   {{ $message }}
                                @enderror
                            </div>
                    </div>
                    <div class="max-w-md mx-auto bg-white rounded-md shadow-md p-7 mt-6 ">
                        <label for="tanggal_dibuat" class="block text-sm font-medium text-gray-700">tanggal_dibuat</label>
                        <input type="date" id="tanggal_dibuat" name="tanggal_dibuat" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>                    
                    <button type="submit"class="text-lg font-medium text-blue-400 border-2 border-blue-400 px-12 py-3 rounded-full hover:text-white group relative  items-center overflow-hidden ">
                        <span class="absolute left-0 w-full h-0 transition-all bg-blue-400 opacity-100 group-hover:h-full group-hover:top-0 duration-400 ease"></span>
                        <span  class="relative">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>