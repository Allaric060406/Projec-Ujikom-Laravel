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
                            <td class="p-4 text-sm text-gray-700 whitespace-nowrap">{{$shw->tanggalunggah}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- <div class="grid grid-cols-1 gap-4 md:hidden">
                <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="font-bold">
                            Username
                        </div>
                        <div>
                            Nama Album
                        </div>
                        <div class="text-gray-500">
                            10/12/2012
                        </div>
                    </div>
                    <div class="text-sm text-gray-700">
                        oto ini merupakan foto terbaik yang saya pernah buat
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</x-app-layout>