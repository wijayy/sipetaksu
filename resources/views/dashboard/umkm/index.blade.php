<x-auth-layout :title="'List Umkm'">
    <div class="w-full mt-6">
        <div class="flex justify-between">
            <h3 class="text-2xl font-bold">List Umkm</h3>
            <div class="flex gap-4 print:hidden">
                <div class="px-3 py-2 font-semibold text-white bg-blue-500 rounded-lg cursor-pointer" onclick="window.print()" >Cetak</div>
                <x-auth-a href="{{ route('umkm.create') }}">Tambah UMKM</x-auth-a>
            </div>
        </div>

        <div class="overflow-x-auto ">
            <table class="min-w-full px-2 mt-4 overflow-x-auto table-auto w-fit text-start">
                <thead>
                    <tr>
                        <th class="print:text-sm text-start">#</th>
                        <th class="print:text-sm text-start">Nama</th>
                        <th class="print:text-sm text-start">Pemilik</th>
                        <th class="print:text-sm text-start">Alamat</th>
                        <th class="print:text-sm text-start">Kategori</th>
                        <th class="print:text-sm text-start">Kontak</th>
                        <th class="print:text-sm text-start">Jam Operasional</th>
                        <th class="print:text-sm text-start print:hidden">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($umkm as $item)
                        <tr class="h-12 odd:bg-white">
                            <td class="pr-1 print:text-sm">{{ $loop->iteration }}</td>
                            <td class="pr-2 print:text-sm">{{ $item->nama }}</td>
                            <td class="pr-2 print:text-sm">{{ $item->user->name }}</td>
                            <td class="pr-2 print:text-sm"><a href="{{ $item->maps }}" target="_blank">{{ $item->alamat }}</a>
                            </td>
                            <td class="pr-2 print:text-sm">{{ $item->categories->nama }}</td>
                            <td class="pr-2 print:text-sm"><a href="https://api.whatsapp.com/send/?phone={{ $item->kontak }}&text&type=phone_number&app_absent=0">{{ $item->kontak }}</a></td>
                            <td class="pr-2 print:text-sm">{{ \Carbon\Carbon::parse($item->jamBuka)->format('H:i') }}-{{ \Carbon\Carbon::parse($item->jamTutup)->format('H:i') }}</td>
                            <td class="space-x-3 print:text-sm print:hidden">
                                <div class="grid w-20 grid-cols-2 gap-2 md:w-40 md:grid-cols-4">
                                    <a
                                        href="{{ route('umkm.show', ['umkm' => $item->slug, 'kategori' => $item->categories->slug]) }}"><i
                                            class="text-2xl text-center bg-gray-300 border border-black rounded-lg size-9 bx bx-show-alt"></i></a>
                                    <a href="{{ $item->maps }}" target="_blank"><i
                                            class="text-2xl text-center bg-teal-100 border border-teal-300 rounded-lg size-9 bx bxs-map"></i></a>
                                    <a href="{{ route('umkm.edit', ['umkm' => $item->slug]) }}"><i
                                            class="text-2xl text-center bg-yellow-100 border border-yellow-300 rounded-lg size-9 bx bx-edit"></i></a>
                                    <form action="{{ route('umkm.destroy', ['umkm' => $item->slug]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('umkm.destroy', ['umkm' => $item->slug]) }}"
                                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                                            <i
                                                class="text-2xl text-center border rounded-lg bg-rose-100 border-rose-500 size-9 bx bx-trash"></i></a>
                                </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $umkm->links() }}</div>
    </div>
</x-auth-layout>
