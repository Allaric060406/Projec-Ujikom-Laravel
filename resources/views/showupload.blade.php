<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show  Your Upload') }}
        </h2>
    </x-slot>

    <div class="p-5 h-screen bg-gray-100">
        <div class="overflow-auto rounded-lg shadow">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">No.</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Username</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Nama Album</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Image</th>
                        <th class=" p-4 text-sm font-semibold tracking-wide text-left">Deskription</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Date Upload Image</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $no=1; ?>
                    @foreach ($User as $shw)
                        <tr class="bg-gray-50">
                            <td class="p-4 text-sm text-gray-700 whitespace-nowrap">{{$no++}}</td>
                            <td class="p-4 text-sm text-gray-700 whitespace-nowrap">{{$shw->user->username}}</td>
                            <td class="p-4 text-sm text-gray-700 whitespace-nowrap">{{$shw->album->namaalbum}}</td>
                            <td class="p-4 text-sm text-gray-700 whitespace-nowrap">
                                <img src="{{asset('images/'.$shw->imagefile)}}" alt="{{asset('images/'.$shw->imagefile)}}" srcset="" style="max-width: 100px;"> 
                            </td>
                            <td class="p-4 text-sm text-gray-700 whitespace-nowrap">{{$shw->deskripsifoto}}</td>
                            <td class="p-4 text-sm text-gray-700 whitespace-nowrap">{{ \Carbon\Carbon::parse($shw->tanggalunggah)->toFormattedDateString() }}</td>
                            <td>
                                <div x-data="{ showModal: false, email: '' }">
                                <!-- Button to open the modal -->
                                      <button @click="showModal = true" class="bg-sky-600 px-4 py-2 text-white rounded flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4 h-4 mr-2">
                                            <path fill="white" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                        </svg>
                                        Detail 
                                      </button>                                    
                                      <!-- Background overlay -->
                                      <div x-show="showModal" class="fixed inset-0 transition-opacity" aria-hidden="true" @click="showModal = false">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                      </div>
                                      <!-- Modal -->
                                      <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed z-10 inset-0 overflow-y-auto" x-cloak>
                                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                          <!-- Modal panel -->
                                          <div class="w-full inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                              <!-- Modal content -->

                                              {{-- Button edit --}}
                                              <a href="/viewupdate/{{$shw->id}}" class="fixed top-4 right-4 bg-blue-400 hover:bg-blue-500 text-white rounded-full p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4 h-4 text-white">
                                                    <path fill="white" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1 .8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"/>
                                                </svg>
                                            </a>                                            
                                             {{-- End Button edit --}}

                                              <div class="sm:flex sm:items-start">
                                                <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <div class="aspect-w-16 aspect-h-9 flex justify-center items-center">
                                                        <img src="{{asset('images/'.$shw->imagefile)}}" alt="{{asset('images/'.$shw->imagefile)}}" class="max-w-full max-h-full rounded-xl">
                                                    </div>
                                                    <div class="p-3">
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900 font-serif " id="modal-headline"> Detail Upload Your Image </h3>
                                                        <hr class="w-48 h-1 mx-auto my-2 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
                                                    </div>
                                                    <div class="mt-2">
                                                        <p class="text-base text-gray-500 text-left py-2 ">Detail Album</p>
                                                    
                                                        <div class="grid grid-cols-2 gap-4">
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">Nama Album </p>
                                                            </div>
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">:{{$shw->album->namaalbum}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-2 gap-4">
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">Deskripsi Album </p>
                                                            </div>
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">:{{$shw->album->deskripsi}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-2 gap-4">
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">Date Create Album </p>
                                                            </div>
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">:{{ \Carbon\Carbon::parse($shw->album->tanggaldibuat)->toDayDateTimeString() }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <p class="text-base text-gray-500 text-left py-2 ">Detail Image</p>
                                                    
                                                        <div class="grid grid-cols-2 gap-4">
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">Image Name </p>
                                                            </div>
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">:{{$shw->judulfoto}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-2 gap-4">
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">Deskription Image </p>
                                                            </div>
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">:{{$shw->deskripsifoto}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-2 gap-4">
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">Date Upload Image</p>
                                                            </div>
                                                            <div class="text-justify">
                                                                <p class="text-sm text-gray-700 py-1">:{{ \Carbon\Carbon::parse($shw->tanggalunggah)->toDayDateTimeString() }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                              <!-- Cancel button -->
                                              <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"> Close </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            </td>
                            <td>
                                <form id="deleteForm{{$shw->id}}" action="{{ route('foto.delete', $shw->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="bg-red-500 px-4 py-2 text-white rounded flex items-center deleteButton" data-id="{{$shw->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5" width="24" height="24">
                                            <path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.7 23.7 0 0 0 -21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"/>
                                        </svg>
                                        <span class="ml-2">Delete</span>
                                    </button>
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

{{-- js Delete --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.deleteButton');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const dataId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Sure?',
                    text: "You Will Delete This Post",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengkonfirmasi penghapusan, kirim form
                        document.getElementById('deleteForm' + dataId).submit();
                    }
                });
            });
        });
    });
</script>