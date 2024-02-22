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
                            {{-- <td class="p-4 text-sm text-gray-700 whitespace-nowrap">{{$shw->tanggalunggah}}</td> --}}
                            <td class="p-4 text-sm text-gray-700 whitespace-nowrap">{{ \Carbon\Carbon::parse($shw->tanggalunggah)->toFormattedDateString() }}</td>
                            <td>
                                <button type="button" class="bg-sky-600 px-4 py-2 text-white rounded flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-4 h-4 mr-2">
                                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z" fill="white"/>
                                    </svg>
                                    Edit
                                </button>                                                         
                            </td>
                            <td>
                                <form id="deleteForm"  action="{{ route('foto.delete', $shw->id) }}"  method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="bg-red-500 px-4 py-2 text-white rounded flex items-center" id="deleteButton">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 mr-2">
                                            <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" fill="white"/>
                                        </svg>
                                        Delete
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButton = document.getElementById('deleteButton');

        deleteButton.addEventListener('click', function () {
            Swal.fire({
                title: 'Yakin?',
                text: "Anda akan menghapus data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengkonfirmasi penghapusan, kirim form
                    document.getElementById('deleteForm').submit();
                }
            });
        });
    });
</script>