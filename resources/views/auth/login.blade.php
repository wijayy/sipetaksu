<x-guest-layout :title="'Login'">
    <!-- Session Status -->

    <form method="POST" action="{{ route('login') }}" class="w-full px-10 sm:w-1/2 lg:w-5/12 xl:w-1/3">
        @csrf

        <img src="{{ asset('asset/login.png') }}" class="w-11/12" alt="">

        <h2 class="mt-10 text-2xl font-bold text-center">Masuk</h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-input :id="'email'">Email</x-input>
        <x-input :id="'password'" :type="'password'">Password</x-input>

        <button type="submit" class="w-full h-10 mt-3 text-white rounded-full bg-mine-100">
            {{ __('Masuk') }}
        </button>

        <div class="flex flex-wrap mt-3">
            <a class="flex justify-center w-1/2 mt-1 mb-4 text-xs font-bold text-center text-gray-500 focus:text-mine-100 hover:text-mine-100"
                href="{{ route('password.request') }}">
                {{ __('Lupa Password?') }}
            </a>
            <a class="flex justify-center w-1/2 mt-1 mb-4 text-xs font-bold text-center text-gray-500 focus:text-mine-100 hover:text-mine-100"
                href="{{ route('register') }}">
                {{ __('Belum punya akun?') }}
            </a>
        </div>
    </form>

</x-guest-layout>
