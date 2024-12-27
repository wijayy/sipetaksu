<x-auth-layout :title="'List Umkm'">
    <div class="w-full mt-6">
        <div class="flex justify-between">
            <h3 class="text-2xl font-bold">List Kategori</h3>
            <x-auth-a href="{{ route('dashboard.kategori.create') }}">Tambah Kategori</x-auth-a>
        </div>

<div class="overflow-x-auto ">
    <table class="min-w-full px-2 mt-4 overflow-x-auto table-auto w-fit text-start">
        <thead>
            <tr>
                <th class="text-start">#</th>
                <th class="text-start">Nama</th>
                <th class="text-start">jumlah UMKM</th>
                <th class="text-start">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $item)
                <tr class="h-12 odd:bg-white">
                    <td class="pr-1">{{ $loop->iteration }}</td>
                    <td class="pr-2">{{ $item->nama }}</td>
                    <td class="pr-2">{{ $item->umkm->count() }}</td>
                    <td class="space-x-3">
                        <div class="grid w-20 grid-cols-2 gap-2 md:w-40 md:grid-cols-4">
                            <a href="{{ route('kategori.show', ['kategori' => $item->slug]) }}"><i
                                    class="text-2xl text-center border border-black rounded-lg size-9 bx bx-show-alt"></i></a>
                            <a href="{{ route('dashboard.kategori.edit', ['kategori' => $item->slug]) }}"><i
                                    class="text-2xl text-center bg-yellow-300 rounded-lg size-9 bx bx-edit"></i></a>
                            <form action="{{ route('dashboard.kategori.destroy', ['kategori' => $item->slug]) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('dashboard.kategori.destroy', ['kategori' => $item->slug]) }}"
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
        {{-- <div class="mt-4">{{ $umkm->links() }}</div> --}}
    </div>
</x-auth-layout>
