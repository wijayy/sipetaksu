<x-auth-layout :title="'Edit Kategori UMKM'">
    <form action="{{ route('dashboard.kategori.update', ['kategori' => $kategori->slug]) }}" class="w-full mt-6" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h3 class="text-2xl font-bold">Edit Kategori Umkm</h3>

        <!-- Image Upload -->
        <div class="flex flex-wrap justify-start gap-4 my-6 lg:flex-no-wrap" x-data="">

            <div class="relative flex text-center rounded-md shadow-md size-24 md:size-32 lg:size-48"
                x-data="{
                    image: '{{ asset("storage/" . $kategori->image) }}',
                    text: 'gambar',
                    imagePreview() {
                        return URL.createObjectURL(event.target.files[0]);
                    }
                }">
                <img :src="image" :alt="'Gambar' + i"
                    class="z-10 object-cover rounded-md size-full" x-show="image">
                <input type="file" id="image" name="image" @change="image=imagePreview()" class="sr-only">
                <label for="image" :class="{ 'opacity-100': !image, 'opacity-0': image }"
                    class="absolute top-0 left-0 z-20 flex items-center justify-center w-full h-full bg-transparent border border-black border-dashed rounded-md cursor-pointer ALIGN text-sky-500 hover:text-blue-700"
                    x-text="text"></label>
            </div>

        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <x-input-label for="nama" :value="__('Nama Kategori UMKM')" />
                <x-text-input id="nama" class="block w-full mt-1 " type="text" name="nama" :value="old('nama', $kategori->nama)"
                    required autofocus autocomplete="nama" />
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>
        </div>

        <div class="flex justify-center w-full mt-6">
            <x-auth-a onclick="event.preventDefault();
        this.closest('form').submit();">Simpan</x-auth-a>
        </div>
    </form>
    @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
    @endforeach
</x-auth-layout>
