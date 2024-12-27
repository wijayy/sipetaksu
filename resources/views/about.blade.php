<x-app-layout :title="'Kategori Kerajinan'">
    <div class="relative flex flex-wrap items-center justify-center w-full bg-center bg-no-repeat bg-cover "
        style="background-image: url({{ asset('asset/guest.png') }})">
        <div
            class="z-40 flex flex-col items-center w-full mx-auto mb-10 text-2xl font-bold text-center text-white mt-28 max-w-7xl lg:px-8 lg:text-5xl">
            <div class="">Kenali Kami Lebih Dekat</div>
            <div class="w-1/2 mt-6 font-normal lg:text-lg">Kami adalah UMKM Desa Susut yang tumbuh dari semangat
                kebersamaan dan cinta terhadap produk lokal. Setiap produk yang kami buat memiliki cerita, berasal dari
                tangan-tangan terampil warga desa yang selalu menjaga keaslian dan kualitas. Mari bersama kami
                menjelajahi lebih dalam potensi dan kearifan lokal yang kami tawarkan.</div>
        </div>
    </div>

    <div class="bg-mine-100">
        <div class="grid grid-cols-1 gap-8 p-6 mx-auto lg:grid-cols-2 max-w-7xl lg:px-8">
            <div class="p-4 bg-white rounded-3xl">
                <div class="flex justify-center p-4 border-4 border-mine-100 rounded-3xl">
                    <img src="{{ asset('asset/about.png') }}" class="rounded-7xl " alt="">
                </div>
            </div>
            <div class="px-4 pt-5 text-white" >
                <div class="text-3xl">Tentang Kami</div>
                <div class="mt-5 text-xl">“Selamat Datang di Website UMKM Desa Susut, Bangli “</div>
                <div class="mt-5 text-lg"> Website ini merupakan pusat informasi lengkap tentang kegiatan, produk, dan
                    inovasi yang dihasilkan oleh UMKM Desa Susut, Bangli. Kami hadir untuk memperkenalkan potensi desa
                    kami serta mendukung pertumbuhan ekonomi lokal melalui karya kreatif dan produk unggulan. Jelajahi
                    lebih jauh dan temukan beragam informasi menarik di sini.</div>
                <div class=""></div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="p-6 mx-auto max-w-7xl lg:px-8">
            <div class="w-full text-3xl font-bold text-center">Lokasi UMKM Kami</div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15786.461926581425!2d115.3296163029701!3d-8.439367139603629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd219077fbb6e81%3A0x19780a29a39361e9!2sSusut%2C%20Bangli%20Regency%2C%20Bali!5e0!3m2!1sen!2sid!4v1735277806750!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
    </div>


</x-app-layout>
