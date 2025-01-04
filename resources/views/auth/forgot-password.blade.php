<x-guest-layout :title="'Reset Password'">
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

        <form method="POST" action="{{ route('password.email') }}" class="w-full px-10 sm:w-1/2 lg:w-2/6 xl:w-1/4">
            @csrf
            <img src="{{ asset('asset/login.png') }}" class="w-11/12" alt="">

            <div class="my-4 text-sm text-gray-600">
                {{ __('Kamu lupa password? Tenang, cukup masukan Email, dan kami akan membantu untuk mengembalikan Akummu') }}
            </div>
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <x-input :id="'email'">Email</x-input>

            <button type="submit" class="w-full h-10 mt-3 text-white rounded-full bg-mine-100">
                {{ __('Submit') }}
            </button>

            <div class="flex flex-wrap mt-3">
                <a class="flex justify-start w-full mt-1 mb-4 text-xs font-bold text-gray-500 underline underline-offset-1 focus:text-mine-100 hover:text-mine-100"
                    href="{{ route('login') }}">
                    {{ __('Sudah ingat passwordmu?') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
