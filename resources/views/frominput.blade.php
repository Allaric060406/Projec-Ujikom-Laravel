    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Upload Image') }}
            @vite('resources/css/app.css')
        </h2>
    </x-slot>
    <div class="container-fluid py-5" style="background-color: #EBF4FF ;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4 offset-1">
                    <img src="images/salmaimage.jpg" class="img-fluid" alt="" srcset="">
                </div>

                <div class="col-5 offset-2">
                    <div class="form-group">
                        <label for="company" class=" form-control-label " >Nama Pemesan</label>
                        <input type="text" name="nama"  value="{{old('nama')}}" id="company" placeholder="Nama" class="form-control rounded-full border-2 h-12 focus:border-white shadow-inner  @error('nama') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('nama')
                                   {{ $message }}
                                @enderror
                            </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="company" class=" form-control-label">Nama Pemesan</label>
                        <input type="text" name="nama"  value="{{old('nama')}}" id="company" placeholder="Nama" class="form-control form-control rounded-full border-2 h-12 focus:border-white  @error('nama') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('nama')
                                   {{ $message }}
                                @enderror
                            </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="company" class=" form-control-label">Nama Pemesan</label>
                        <input type="text" name="nama"  value="{{old('nama')}}" id="company" placeholder="Nama" class="form-control form-control rounded-full border-2 h-12 focus:border-white @error('nama') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('nama')
                                   {{ $message }}
                                @enderror
                            </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="company" class=" form-control-label">Nama Pemesan</label>
                        <input type="text" name="nama"  value="{{old('nama')}}" id="company" placeholder="Nama" class="form-control form-control rounded-full border-2 h-12 focus:border-0 @error('nama') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('nama')
                                   {{ $message }}
                                @enderror
                            </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="company" class=" form-control-label">Nama Pemesan</label>
                        <input type="text" name="nama"  value="{{old('nama')}}" id="company" placeholder="Nama" class="form-control form-control rounded-full border-2 h-12 focus:border-white  @error('nama') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('nama')
                                   {{ $message }}
                                @enderror
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
