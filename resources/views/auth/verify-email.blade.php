<x-guest-layout :title="'Verifikasi Email'">
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    <div class="flex flex-col items-center justify-center lg:flex-row">
        <div class="relative w-full bg-right bg-no-repeat bg-cover h-52 lg:h-screen lg:w-4/6 xl:w-3/4"
            style="background-image: url({{ asset('asset/guest.png') }})">
            <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full text-center text-white ">
                <div class="w-11/12 text-2xl lg:text-4xl lg:w-3/4 xl:w-1/2 lg:text-start">Kembangkan Potensi UMKM Susut,
                    Majukan
                    Ekonomi Desa!</div>
            </div>
        </div>

        <div class="w-full px-10 lg:w-2/6 xl:w-1/4">
            <img src="{{ asset('asset/login.png') }}" class="w-11/12" alt="">
            <div class="mb-4 text-gray-600 text-wrap">
                {{ __('Terimakasih sudah mau menjadi bagian dari perkembangan UMKM Desa Susut. Sebelum lanjut anda harus melakukan verifikasi akun terlebih dahulu. Cukup klik link yang sudah kami kirimkan ke email anda. jika email belum diterima, kami akan mengirimkannya lagi untuk anda') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm font-medium text-green-600">
                    {{ __('Email Verifikasi yang baru sudah kami kirimkan ke email anda') }}
                </div>
            @endif

            <div class="flex items-center justify-between mt-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('Kirim Ulang Email') }}
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
