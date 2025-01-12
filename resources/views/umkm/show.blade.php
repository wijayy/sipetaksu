<x-app-layout :title="'Kategori Kerajinan'">
    <div class="relative flex items-center justify-center w-full h-72 lg:h-96"
        style="background-image: url({{ asset('storage/' . $categories->image) }})">
        <div class="absolute top-0 left-0 z-30 size-full bg-black/80"></div>
        <div class="z-40 p-6 pt-20 mx-auto text-xl font-bold text-center text-white max-w-7xl lg:px-8 lg:text-4xl">
            Kategori
            <span class="capitalize">{{ " $categories->nama " }}</span> UMKM Desa Susut
        </div>
    </div>

    <div class="grid grid-cols-1 gap-8 p-6 mx-auto lg:grid-cols-2 max-w-7xl lg:px-8">
        <div class="flex flex-col items-center gap-3">
            <h2 class="p-2 text-xl font-bold text-white rounded-lg lg:text-3xl bg-mine-100">{{ $umkm->nama }}</h2>
            <div class="relative w-4/6 p-3 overflow-hidden rounded-xl bg-mine-100 aspect-square">
                <img class="absolute -translate-x-1/2 -translate-y-1/2 rounded-3xl top-1/2 left-1/2 size-11/12" src="{{ asset('storage/' . $umkm->image) }}" alt="">
            </div>
        </div>
        <div class="">
            @auth
                <div class="flex justify-start gap-4 mb-3 print:hidden">
                    @if (Auth::user()->id == $umkm->user->id)
                        <a href="{{ route('umkm.edit', ['umkm' => $umkm->slug]) }}"
                            class="px-3 py-2 space-y-2 bg-yellow-300 rounded-lg cursor-pointer"><i
                                class="bx bx-edit"></i>Edit</a>
                        <form action="{{ route('umkm.destroy', ['umkm' => $umkm->slug]) }}" method="post">
                            <button type="submit" class="px-3 py-2 space-y-2 rounded-lg cursor-pointer bg-rose-500"><i
                                    class="bx bx-trash"></i>Hapus</button>
                        </form>
                    @endif
                </div>
            @endauth
            <div class="">
                <div class="pb-2 text-xl font-bold">Deskripsi</div>
                <div class="max-w-full p-2 text-white rounded-xl bg-mine-100 w-fit ">{{ $umkm->deskripsi }}</div>
            </div>
            <div class="mt-3">
                <div class="pb-2 text-xl font-bold">Lokasi Usaha</div>
                <div class="max-w-full p-2 text-white rounded-xl bg-mine-100 "><a target="_blank" rel="noreferrer"
                        href="{{ $umkm->maps }}" class="">{{ $umkm->alamat }}</a></div>
            </div>
            <div class="mt-3">
                <div class="pb-2 text-xl font-bold">Kontak</div>
                <div class="max-w-full p-2 text-white rounded-xl bg-mine-100 w-fit ">{{ $umkm->kontak }}</div>
            </div>
            <div class="mt-3">
                <div class="pb-2 text-xl font-bold">Jam Buka</div>
                <div class="max-w-full p-2 text-white rounded-xl bg-mine-100 w-fit ">
                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $umkm->jamBuka)->format('H:i') }} -
                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $umkm->jamTutup)->format('H:i') }}</div>
            </div>
            <div class="mt-3">
                <div class="pb-2 text-xl font-bold">Kategori</div>
                <div class="max-w-full p-2 text-white rounded-xl bg-mine-100 w-fit ">{{ $umkm->categories->nama }}
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 mx-auto max-w-7xl lg:px-8">
        <div class="flex justify-center w-full text-lg font-bold text-white rounded-lg lg:text-2xl">
            <div class="px-3 py-2 rounded-lg bg-mine-100">Foto Produk {{ $umkm->nama }}</div>
        </div>
        <div class="grid grid-cols-2 gap-3 pt-4 sm:grid-cols-3 lg:grid-cols-6">
            @foreach ($umkm->foto as $item)
                <div class="relative overflow-hidden rounded-lg aspect-square">
                    <img class="absolute object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 size-full"
                        src="{{ asset('storage/' . $item->image) }}" alt="">
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
