<x-app-layout :title="'Kategori UMKM'">
    <div class="">
        <div class="h-screen p-6 pt-32 mx-auto max-w-7xl lg:px-8">
            <h2 class="text-3xl font-bold text-center text-mine-100">Semua kategori UMKM pada Desa Susut</h2>

            <div class="grid grid-cols-3 gap-4 mt-12">
                @foreach ($categories as $item)
                    <a href="{{ route('kategori.show', ['kategori' => $item->slug]) }}" class="relative flex items-center justify-center text-lg transition-all duration-300 h-28 hover:text-xl lg:text-4xl group/item hover:lg:text-5xl rounded-xl lg:h-80" style="background-image: url({{ asset('storage/' . $item->image) }})">
                        <div class="absolute top-0 left-0 z-30 w-full h-full group-hover/item:bg-black/70 rounded-xl"></div>
                        <div class="z-40 px-3 py-2 font-semibold text-white capitalize bg-mine-100/45 group-hover/item:bg-mine-100 rounded-2xl">{{ $item->nama }}</div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
