<x-guest-layout :title="'Verifikasi Email'">
    <div class="w-full px-10 sm:w-1/2 lg:w-5/12 xl:w-1/3">
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

                <button type="submit"
                    class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
