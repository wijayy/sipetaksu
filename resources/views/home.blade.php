<x-app-layout :title="'Beranda'">
    <div class="text-white bg-gradient-to-b from-mine-100 to-mine-100/80">
        <div class="relative z-0 h-screen p-6 mx-auto max-w-7xl lg:px-8">
            <div class="flex flex-col items-center justify-center h-full pt-20 md:gap-12 md:w-2/3 lg:w-1/2">
                <h2 class="text-4xl font-semibold lg:text-5xl">Potensi UMKM
                    Desa Susut Bangli</h2>
                <p class="mt-6 text-xl">Selamat datang di Desa Susut,potensi UMKM di desa ini tumbuh dan berkembang
                    dengan pesat. Temukan
                    produk unggulan, cerita inspiratif, dan peluang usaha yang dapat memperkuat ekonomi lokal.</p>
                <img src="{{ asset('asset/dashboard.png') }}"
                    class="mt-6 md:h-72 lg:h-96 md:absolute md:bottom-8 md:right-8" alt="">
                <x-a class="mt-6 text-xl font-semibold">Selengkapnya</x-a>
            </div>
        </div>
    </div>

    <div class="">
        <div class="p-6 mx-auto max-w-7xl lg:px-8">
            <div class="flex items-center text-2xl text-mine-100">
                <i class="p-2 mr-2 text-4xl text-white rounded-lg bg-mine-100 bx bx-show-alt "></i>Sedang banyak dilihat
            </div>
            <div class="mt-1 text-3xl">Produk Kreatifitas UMKM Desa Susut</div>
            <x-umkm :$umkm></x-umkm>
        </div>
    </div>

    <div class="">
        <div class="p-6 mx-auto max-w-7xl lg:px-8">
            <div class="flex items-center text-2xl text-mine-100">
                <i class="p-2 mr-2 text-4xl text-white rounded-lg bg-mine-100 bx bxs-grid-alt "></i>Kategori
            </div>

            <div class="flex gap-4 mt-4">
                <x-a class="text-lg capitalize rounded-none" :active="(!request()->has('kategori') || is_null(request(['kategori'])))" href="{{ route('dashboard') }}">All</x-a>
                @foreach ($categories as $item)
                    <x-a class="text-lg capitalize rounded-none" href="{{ route('home', ['kategori' => $item->slug]) }}" :active="($item->slug == request('kategori'))">{{ $item->nama }}</x-a>
                @endforeach
            </div>

            <x-umkm :umkm="$umkm_categories"></x-umkm>

            {{ $umkm_categories->links() }}
        </div>
    </div>
</x-app-layout>
