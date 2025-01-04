<x-guest-layout :title="'Login'">
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

        <form method="POST" action="{{ route('password.store') }}" class="w-full px-10 sm:w-1/2 lg:w-2/6 xl:w-1/4">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <img src="{{ asset('asset/login.png') }}" class="w-11/12" alt="">

            <h2 class="mt-10 text-2xl font-bold text-center">Masuk</h2>

            <x-input :id="'email'" :old="$request->email" :readonly="true">Email</x-input>
            <x-input :id="'password'" :type="'password'">Password</x-input>
            <x-input :id="'password_confirmation'" :type="'password'">Konfirmasi Password</x-input>

            <button type="submit" class="w-full h-10 mt-3 text-white rounded-full bg-mine-100">
                {{ __('Submit') }}
            </button>
        </form>
    </div>
</x-guest-layout>
