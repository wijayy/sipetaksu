<x-guest-layout :title="'Reset Password'">
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}


        <form method="POST" action="{{ route('password.email') }}" class="w-full px-10 sm:w-1/2 lg:w-5/12 xl:w-1/3">
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
</x-guest-layout>
