@props(['umkm'])

<div class="grid grid-cols-2 gap-4 mt-4 lg:grid-cols-4">
    @foreach ($umkm as $item)
        <div class="border-[3px] flex flex-col justify-start items-center border-black rounded-3xl">
            <img class="rounded-3xl" src="{{ asset('storage/' . $item->image) }}" alt="">
            <div class="p-3">
                <h4 class=" lg:text-2xl">{{ $item->nama }}</h4>
                <p class="text-xs md:text-sm">{{ $item->deskripsi }}</p>
            </div>
            <x-a href="{{ route('umkm.show', ['kategori' => $item->categories->slug, 'umkm' => $item->slug]) }}" class="self-center mt-3 mb-3 font-semibold hover:text-white hover:bg-mine-100">Lihat Selengkapnya</x-a>
        </div>
    @endforeach
</div>
