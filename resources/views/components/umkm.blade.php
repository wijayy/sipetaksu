@props(['umkm'])

<div class="grid grid-cols-2 gap-4 mt-4 lg:grid-cols-4">
    @foreach ($umkm as $item)
        <div
            class="border-[3px] hover:scale-105 transition-transform duration-300 flex flex-col justify-between items-center border-black rounded-3xl">
            <div class="">
                <img class="rounded-3xl size-max aspect-square" src="{{ asset('storage/' . $item->image) }}" alt="">
                <div class="p-3">
                    <h4 class=" lg:text-2xl">{{ $item->nama }}</h4>
                    <p class="text-xs md:text-sm">{{ $item->deskripsi }}</p>
                </div>
            </div>
            <x-a href="{{ route('umkm.show', ['kategori' => $item->categories->slug, 'umkm' => $item->slug]) }}"
                class="self-center mt-3 mb-3 font-semibold justify-items-end hover:text-white hover:bg-mine-100">Lihat
                Selengkapnya</x-a>
        </div>
    @endforeach
</div>
