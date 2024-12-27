<x-auth-layout :title="'Dashboard'">
    <div class="w-full mt-4">
        <h3 class="text-2xl font-bold">Dashboard</h3>

        <div class="grid w-full grid-cols-1 gap-4 mt-4 md:grid-cols-4">
            <div class="flex flex-wrap w-full py-4 text-center bg-white border-b-4 shadow-lg gap-y-4 rounded-xl border-mine-100">
                <div class="w-full text-7xl">{{ $kategori->count() }}</div>
                <div class="w-full text-xl">Kategori</div>
            </div>
            <div class="flex flex-wrap w-full py-4 text-center bg-white border-b-4 shadow-lg gap-y-4 rounded-xl border-mine-100">
                <div class="w-full text-7xl">{{ $umkm_all->count() }}</div>
                <div class="w-full text-xl">Total UMKM</div>
            </div>
            <div class="flex flex-wrap w-full py-4 text-center bg-white border-b-4 shadow-lg gap-y-4 rounded-xl border-mine-100">
                <div class="w-full text-7xl">{{ $umkm->count() }}</div>
                <div class="w-full text-xl">Total UMKM Anda</div>
            </div>


        </div>
    </div>
</x-auth-layout>

