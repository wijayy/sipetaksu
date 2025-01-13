<x-guest-layout :title="'Reset Password'">

        <form method="POST" action="{{ route('password.store') }}" class="w-full px-10 sm:w-1/2 lg:w-5/12 xl:w-1/3">
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

</x-guest-layout>
