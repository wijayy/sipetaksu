<x-auth-layout :title="'Tambah UMKM'">
    <form action="{{ route('umkm.store') }}" class="w-full mt-6" method="post" enctype="multipart/form-data">
        @csrf
        <h3 class="text-2xl font-bold">Tambah Umkm</h3>

        <x-input-label class="mt-4" for="" :value="__('foto UMKM')" />
        <div class="flex flex-wrap justify-start gap-4 mb-6 align-middle lg:flex-no-wrap" x-data="">
            <div class="relative flex text-center align-middle rounded-md shadow-md size-32 lg:size-48 "
                x-data="{
                    image: '',
                    text: 'gambar UMKM',
                    imagePreview() {
                        return event.target.files[0];
                    }
                }">
                <img :src="URL.createObjectURL(image)" :alt="'Gambar' + i"
                    class="z-10 object-cover rounded-md size-full" x-show="image">
                <input type="file" id="image" name="image" @change="image=imagePreview()"
                    class="sr-only">
                <label for="image" :class="{ 'opacity-100': !image, 'opacity-0': image }"
                    class="absolute top-0 left-0 z-20 flex items-center justify-center w-full h-full bg-transparent border border-black border-dashed rounded-md cursor-pointer text-sky-500 hover:text-blue-700"
                    x-text="text"></label>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

        </div>
        <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

            <div>
                <x-input-label for="nama" :value="__('Nama UMKM')" />
                <x-text-input id="nama" class="block w-full mt-1 " type="text" name="nama" :value="old('nama')"
                    required autofocus autocomplete="nama" />
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>
            @if (Auth::user()->is_admin)
                <div>
                    <x-input-label for="user_id" :value="__('pemilik')" />
                    <select id="pilihan" name="user_id"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}" @selected(old('user_id' == $item->id))>{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @else
                <div>
                    <x-input-label for="user_id" :value="__('pemilik')" />
                    <x-text-input id="user_id" class="block w-full mt-1 " type="text" name="user_id"
                        :value="old('user_id', Auth::user()->id)" required @readonly(true) />
                </div>
            @endif
            <div class="">
                <x-input-label for="pilihan" :value="'Kategori'" />
                <select id="pilihan" name="categories_id"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}" @selected(old('kategori' == $item->id))>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-input-label for="kontak" :value="__('kontak')" />
                <x-text-input id="kontak" class="block w-full mt-1" type="text"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="kontak" :value="old('kontak')" required
                    autocomplete="kontak" />
                <x-input-error :messages="$errors->get('kontak')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="maps" :value="__('link maps')" />
                <x-text-input id="maps" class="block w-full mt-1" type="text" name="maps" :value="old('maps')"
                    required autocomplete="maps" />
                <x-input-error :messages="$errors->get('maps')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="alamat" :value="__('alamat UMKM')" />
                <x-text-input id="alamat" class="block w-full mt-1 " type="text" name="alamat" :value="old('alamat')"
                    required autocomplete="alamat" />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="jamBuka" :value="__('jam Buka')" />
                <x-text-input id="jamBuka" class="block w-full mt-1 " type="time" name="jamBuka" :value="old('jamBuka')"
                    required autocomplete="jamBuka" />
                <x-input-error :messages="$errors->get('jamBuka')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="jamTutup" :value="__('Jam Tutup')" />
                <x-text-input id="jamTutup" class="block w-full mt-1" type="time" name="jamTutup" :value="old('jamTutup')"
                    required autocomplete="jamTutup" />
                <x-input-error :messages="$errors->get('jamTutup')" class="mt-2" />
            </div>
        </div>
        <div class="mt-8">
            <h4><a href="https://www.latlong.net/" target="_blank"
                    class="block text-sm font-medium text-gray-700 underline underline-offset-2">Klik untuk melihat
                    latitude dan longitude finder</a></h4>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <x-input-label for="latitude" :value="__('Latitude')" />
                    <x-text-input id="latitude" class="block w-full mt-1" type="number" name="latitude"
                        :value="old('latitude')" required step="0.00000000001" autocomplete="latitude" />
                    <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="longitude" :value="__('Longitude')" />
                    <x-text-input id="longitude" class="block w-full mt-1" type="number" name="longitude"
                        :value="old('longitude')" required step="0.00000000001" autocomplete="longitude" />
                    <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="mt-4">
            <x-input-label for="deskripsi" :value="__('deskripsi')" />
            <textarea class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                id="deskripsi" class="block w-full mt-1" type="time" name="deskripsi" required autocomplete="deskripsi">{{ old('deskripsi') }}</textarea>
            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
        </div>
        <x-input-label class="mt-4" for="" :value="__('foto produk')" />
        <div class="flex flex-wrap justify-start gap-4 mb-6 align-middle lg:flex-no-wrap" x-data="">

            @for ($i = 0; $i < 6; $i++)
                <div class="relative flex text-center align-middle rounded-md shadow-md size-24 md:size-32 lg:size-44 "
                    x-data="{
                        image: '',
                        text: 'gambar ' + {{ $i + 1 }},
                        imagePreview() {
                            return event.target.files[0];
                        }
                    }">
                    <img :src="URL.createObjectURL(image)" :alt="'Gambar' + i"
                        class="z-10 object-cover rounded-md size-full" x-show="image">
                    <input type="file" id="{{ __("images[$i]") }}" name="{{ __("images[$i]") }}"
                        @change="image=imagePreview()" class="sr-only">
                    <label for="{{ __("images[$i]") }}" :class="{ 'opacity-100': !image, 'opacity-0': image }"
                        class="absolute top-0 left-0 z-20 flex items-center justify-center w-full h-full bg-transparent border border-black border-dashed rounded-md cursor-pointer ALIGN text-sky-500 hover:text-blue-700"
                        x-text="text"></label>
                    <x-input-error :messages="$errors->get("images[$i]")" class="mt-2" />
                </div>
            @endfor
        </div>
        <div class="flex justify-center w-full mt-6">
            <x-auth-a onclick="event.preventDefault();
        this.closest('form').submit();">Simpan</x-auth-a>
        </div>
    </form>
</x-auth-layout>
