<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your_Post') }}
        </h2>
    </x-slot>
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
            <div class="rounded overflow-hidden flex flex-col max-w-xl mx-auto relative">

                <!-- Foto -->
                    <img class="w-full" src="{{ asset('images/'.$foto->imagefile) }}" alt="Foto">     

                <div x-data="{ showModal: false, email: '' }">
                    <!-- Button Icon di pojok kanan atas -->
                    <button type="button" @click="showModal = true" class="modal-open absolute top-0 right-0 mt-2 mr-2 bg-blue-400 text-white rounded-full p-2 hover:bg-blue-500">
                        <i class="fa-solid fa-comment text-xl"></i>
                    </button> 

                    {{-- <button type="button" class="mt-2 mr-2 bg-blue-400 text-white rounded-full p-2 hover:bg-blue-500">
                        <i class="fa-solid fa-heart text-xl"></i>
                    </button> --}}

                <!-- Form komentar -->
           <div class="relative -mt-16 px-10 pt-5 pb-16 bg-white m-10">
            
            <div class="form-group mt-2 flex items-center">
                
                
                <!-- Text "Comment now" -->
                <!-- Button LIke -->
                <form action="{{$foto->likeBy(auth()->user()) ? route('destroylike.foto',$foto->id) : route('like.photo',$foto->id)}}" method="post">
                    @csrf
                    @if($foto->likeBy(auth()->user()))
                        @method('DELETE')
                    @endif
                    <button type="submit" class="bg-transparent m-3 {{$foto->likeBy(auth()->user()) ? 'bg-red-200 text-red-500 hover:text-red-600 hover:bg-red-300': 'bg-gray-200 text-slate-500 hover:text-slate-600 hover:bg-gray-300'}}">
                        {{$foto->likeBy(auth()->user()) ? '':''}} 
                        <i class="fa-solid fa-heart text-2xl m-2"></i>
                    </button>                    
                    
                    
                </form>
                <h1 class="text-gray-900 text-center py-1 text-lg">Like Your Post</h1>
            </div>
            <h1 class="text-gray-900 text-center py-1 text-lg">Its Comment!!!</h1>
    @foreach ($komentar as $km)
        <div class="flex justify-center mt-5 relative">
            <div class="rounded [calc(1.5rem-1px)] p-11 bg-gray-100 dark:bg-gray-900 relative w-100">    
                <h4 class="text-lg font-medium text-gray-700 dark:text-white">{{$km->user->username}}</h4>
                <div class="mt-8 gap-3 flex items-center">
                    <img class="h-12 w-12 rounded-full ms-2" src="https://cdn-icons-png.freepik.com/256/1077/1077114.png" alt="{{ $km->user->username }} avatar">
                    <p class="text-gray-700 dark:text-gray-300 m-2">{{$km->isikomentar}}</p>
                    {{-- Tombol Delete --}}
                    <form action="{{ route('komentar.hapus', ['id' => $km->id]) }}" method="POST" class="absolute top-0 right-0 mt-2 mr-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

            <!-- Modal -->
                <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-x-full sm:translate-x-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-x-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-x-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-x-full sm:translate-x-0 sm:scale-95" class="fixed z-10 inset-0 overflow-y-auto" x-cloak>
                    <div class="flex items-end justify-end min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Modal panel -->
                        <form action="{{ route('createKomentar', $foto->id) }}" method="post">
                            @csrf
                            <div class="w-full inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline" style="background-color: rgba(0, 0, 0, 0.5);">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <!-- Modal content -->
                                    <div class="sm:flex sm:items-start">
                                        <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline"> Give Your Opinion </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-start text-gray-500 m-2"> Add Comment. </p>
                                                <!-- Comment input -->
                                                <input type="text" name="isikomentar" value="{{ old('isikomentar') }}" id="isikomentar" placeholder="Please Comment On This Content" class="form-control rounded-xl border-3 h-12 border-hidden focus:border-blue-400 ring-2 ring-blue-500 ring-offset-1 outline-blue-500 @error('isikomentar') is-invalid @enderror">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <!-- Submit button -->
                                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"> Submit </button>
                                    <!-- Close button -->
                                    <button @click="showModal = false" type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"> Close </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
    </div>
    
    <!-- component -->
</x-app-layout>
