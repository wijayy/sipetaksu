<section class="pb-4 text-white bg-mine-100 print:hidden">
    <div class="flex flex-wrap items-end p-6 mx-auto lg:justify-between lg:flex-nowrap max-w-7xl lg:px-8">
        <div class="w-full md:w-full lg:w-5/12">
            <a href="#" class="-m-1.5 p-1.5 flex items-center text-lg gap-2 font-semibold">
                <span class="sr-only">Your Company</span>
                <img class="w-auto h-28" src="{{ asset('asset/logo susut.png') }}" alt="">
                <div class="tracking-widest">SIPETAKSU</div>
            </a>
            <div class="">Selamat datang di Desa Susut! Desa ini memiliki beragam informasi mengenai UMKM serta
                berbagai produk unggulan yang dihasilkan oleh para pelaku UMKM di sini.</div>
        </div>
        <div class="w-full pt-4 lg:space-y-3 lg:text-center lg:pt-0 md:w-1/2 lg:w-4/12">
            <h2 class="text-xl font-bold ">Kontak Kami</h2>
            <div class="">Jl. Kusuma Yudha, Kab. Bangli, Bali</div>
            <div class="">Email : susutdesa@gmail.com</div>
            <div class="">Kode Pos : 80661</div>
        </div>
        <div class="w-full pt-4 lg:space-y-3 lg:text-center lg:pt-0 md:w-1/2 lg:w-3/12">
            <h2 class="flex flex-col text-xl font-bold">UMKM</h2>
            @foreach ($categories as $item)
            <div class="">
                <a href="{{ route('kategori.show', ['kategori'=>$item->slug]) }}" class="capitalize">{{ $item->nama }}</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
