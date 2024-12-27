<x-auth-layout :title="'List Umkm'">
    <div class="w-full mt-6">
        <div class="flex justify-between">
            <h3 class="text-2xl font-bold">List Umkm</h3>
            <x-auth-a href="{{ route('umkm.create') }}">Tambah UMKM</x-auth-a>
        </div>

<div class="overflow-x-auto ">
    <table class="min-w-full px-2 mt-4 overflow-x-auto table-auto w-fit text-start">
        <thead>
            <tr>
                <th class="text-start">#</th>
                <th class="text-start">Nama</th>
                <th class="text-start">Owner</th>
                <th class="text-start">alamat</th>
                <th class="text-start">Kategori</th>
                <th class="text-start">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($umkm as $item)
                <tr class="h-12 odd:bg-white">
                    <td class="pr-1">{{ $loop->iteration }}</td>
                    <td class="pr-2">{{ $item->nama }}</td>
                    <td class="pr-2">{{ $item->user->name }}</td>
                    <td class="pr-2"><a href="{{ $item->maps }}" target="_blank">{{ $item->alamat }}</a></td>
                    <td class="pr-2">{{ $item->categories->nama }}</td>
                    <td class="space-x-3">
                        <div class="grid w-20 grid-cols-2 gap-2 md:w-40 md:grid-cols-4">
                            <a href="{{ route('umkm.show', ['umkm' => $item->slug, 'kategori' => $item->categories->slug]) }}"><i
                                    class="text-2xl text-center border border-black rounded-lg size-9 bx bx-show-alt"></i></a>
                            <a href="{{ $item->maps }}" target="_blank"><i
                                    class="text-2xl text-center bg-teal-300 rounded-lg size-9 bx bxs-map"></i></a>
                            <a href="{{ route('umkm.edit', ['umkm' => $item->slug]) }}"><i
                                    class="text-2xl text-center bg-yellow-300 rounded-lg size-9 bx bx-edit"></i></a>
                            <form action="{{ route('umkm.destroy', ['umkm' => $item->slug]) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('umkm.destroy', ['umkm' => $item->slug]) }}"
                                    onclick="event.preventDefault();
                            this.closest('form').submit();">
                                    <i
                                        class="text-2xl text-center rounded-lg bg-rose-500 size-9 bx bx-trash"></i></a>
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
