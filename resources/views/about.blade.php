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
            <div class="px-4 pt-5 text-white">
                <div class="text-3xl">Tentang Kami</div>
                <div class="mt-5 text-xl">“Selamat Datang di Website UMKM Desa Susut, Bangli “</div>
                <div class="mt-5 text-lg">Website ini merupakan pusat informasi lengkap tentang kegiatan, produk, dan
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
            <div id="map" class="relative z-10 w-full mt-3 h-96"></div>
        </div>
    </div>


    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        var map = L.map('map').setView([-8.423198, 115.346537], 14);
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: ''
        }).addTo(map);

        var umkms = @json($umkms);

        // Tambahkan marker untuk setiap lokasi
        umkms.forEach(function(lokasi) {
            if (lokasi.latitude !== undefined && lokasi.longitude !== undefined) {
                L.marker([lokasi.latitude, lokasi.longitude]).addTo(map)
                    .bindPopup(lokasi.nama);
            } else {
                console.error("Data lokasi tidak valid:", lokasi);
            }
        });
    </script>


</x-app-layout>
