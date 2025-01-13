<x-guest-layout :title="'Buat Akun Baru'">
    <form method="POST" action="/register" class="w-full px-10 sm:w-1/2 lg:w-5/12 xl:w-1/3">
        @csrf

        <img src="{{ asset('asset/login.png') }}" class="w-11/12" alt="">

        <h2 class="mt-10 text-2xl font-bold text-center">Buat Akun</h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-input :id="'name'">Nama</x-input>
        <x-input :id="'email'">Email</x-input>
        <x-input :id="'password'" :type="'password'">Password</x-input>
        <x-input :id="'password_confirmation'" :type="'password'">Konfirmasi Password</x-input>

        <button type="submit" class="w-full h-10 mt-3 text-white rounded-full bg-mine-100">
            {{ __('Register') }}
        </button>

        <a class="flex justify-start w-full mt-2 mb-4 text-xs font-bold text-center text-gray-500"
            href="{{ route('login') }}">
            {{ __('Sudah punya akun?') }}
        </a>
    </form>
</x-guest-layout>
