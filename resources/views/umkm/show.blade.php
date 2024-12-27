<x-app-layout :title="'Kategori Kerajinan'">
    <div class="relative flex items-center justify-center w-full h-72 lg:h-96"
        style="background-image: url({{ asset('storage/' . $categories->image) }})">
        <div class="absolute top-0 left-0 z-30 size-full bg-black/80"></div>
        <div class="z-40 p-6 pt-20 mx-auto text-xl font-bold text-center text-white max-w-7xl lg:px-8 lg:text-4xl">Kategori
            <span class="capitalize">{{ " $categories->nama " }}</span> UMKM Desa Susut</div>
    </div>

    <div class="grid grid-cols-1 gap-8 p-6 mx-auto lg:grid-cols-2 max-w-7xl lg:px-8">
        <div class="flex flex-col items-center gap-3">
            <h2 class="p-2 text-xl font-bold text-white rounded-lg lg:text-3xl bg-mine-100">{{ $umkm->nama }}</h2>
            <div class="p-3 rounded-xl w-fit bg-mine-100">
                <img class="rounded-3xl" src="{{ asset('storage/' . $umkm->image) }}" alt="">
            </div>
        </div>
        <div class="">
            <div class="">
                <div class="pb-2 text-xl font-bold">Deskripsi</div>
                <div class="max-w-full p-2 text-white rounded-xl bg-mine-100 w-fit ">{{ $umkm->deskripsi }}</div>
            </div>
            <div class="mt-3">
                <div class="pb-2 text-xl font-bold">Lokasi Usaha</div>
                <div
                    class="max-w-full p-2 text-white rounded-xl bg-mine-100 "><a target="_blank" rel="noreferrer" href="{{ $umkm->maps }}" class="">{{ $umkm->alamat }}</a></div>
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
        <div class="grid grid-cols-2 gap-3 pt-4 lg:grid-cols-3">
            @foreach ($umkm->foto as $item)
                <img class="" src="{{ asset('storage/' . $item->image) }}" alt="">
            @endforeach
        </div>
    </div>

</x-app-layout>

