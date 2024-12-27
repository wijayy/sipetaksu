<x-app-layout :title="'Kategori Kerajinan'">
    <div class="relative flex items-center justify-center w-full h-96" style="background-image: url({{ asset('storage/' . $categories->image) }})">
        <div class="absolute top-0 left-0 z-30 size-full bg-black/80"></div>
        <div class="z-40 p-6 mx-auto text-xl font-bold text-center text-white max-w-7xl lg:px-8 lg:text-4xl">Kategori <span class="capitalize">{{ " $categories->nama " }}</span> UMKM Desa Susut</div>
    </div>

    <div class="">
        <div class="p-6 mx-auto max-w-7xl lg:px-8">
            <x-umkm :umkm="$umkm"></x-umkm>
            <div class="">
                {{ $umkm->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
