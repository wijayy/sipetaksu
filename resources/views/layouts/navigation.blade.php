<header class="fixed top-0 left-0 z-50 w-full text-white bg-mine-100 print:hidden" x-data="{ open: false }">
    <nav class="flex items-center justify-between p-6 mx-auto max-w-7xl lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5 flex items-center text-lg gap-2 font-semibold">
                <span class="sr-only">Your Company</span>
                <img class="w-auto h-8" src="{{ asset('asset/logo susut.png') }}" alt="">
                <div class="tracking-widest">SIPETAKSU</div>
            </a>

        </div>
        <div class="flex lg:hidden">
            <button type="button" @click="open = true"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5">
                <span class="sr-only">Open main menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-8 ">
            <a href="{{ route('home') }}" class="font-semibold text-sm/6">Beranda</a>
            <a href="{{ route('kategori.index') }}" class="font-semibold text-sm/6">UMKM</a>
            <a href="{{ route('about') }}" class="font-semibold text-sm/6">Tentang Kami</a>
            @guest
                <a href="{{ route('register') }}" class="flex items-center text-sm font-semibold">Register
                    <i class='pl-1 text-xl bx bx-log-in bx-fade-right-hover'></i>
                </a>
                <a href="{{ route('login') }}" class="flex items-center text-sm font-semibold">Log in
                    <i class='pl-1 text-xl bx bx-log-in bx-fade-right-hover'></i>
                </a>
            @endguest
            @auth
                <a href="{{ route('dashboard') }}" class="flex items-center text-sm font-semibold">Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="flex items-center text-sm font-semibold">Log out
                        <i class='pl-1 text-xl bx bx-log-in bx-fade-right-hover'></i>
                    </button>
                </form>
            @endauth
        </div>

    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" x-show="open" @click.outside="open = false" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div
            class="fixed inset-y-0 right-0 z-10 w-full px-6 py-6 overflow-y-auto bg-mine-100 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Sipetaksu</span>
                    <img class="w-auto h-8" src="{{ asset('asset/logo susut.png') }}" alt="">
                </a>

                <button type="button" class="-m-2.5 rounded-md p-2.5" @click="open=false">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flow-root mt-6">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="py-6 space-y-2">
                        <div class="-mx-3">
                            <a href="{{ route('home') }}"
                                class="block px-3 py-2 -mx-3 font-semibold rounded-lg hover:text-black text-base/7 hover:bg-gray-50">Beranda</a>
                            <a href="{{ route('kategori.index') }}"
                                class="block px-3 py-2 -mx-3 font-semibold rounded-lg hover:text-black text-base/7 hover:bg-gray-50">UMKM</a>
                            <a href="{{ route('about') }}"
                                class="block px-3 py-2 -mx-3 font-semibold rounded-lg hover:text-black text-base/7 hover:bg-gray-50">Tentang
                                Kami</a>
                        </div>
                        <div class="py-6">
                            @guest
                                <a href="{{ route('register') }}"
                                    class="-mx-3 block rounded-lg hover:text-black px-3 py-2.5 text-base/7 font-semibold  hover:bg-gray-50">Register</a>
                                <a href="{{ route('login') }}"
                                    class="-mx-3 block rounded-lg hover:text-black px-3 py-2.5 text-base/7 font-semibold  hover:bg-gray-50">Log
                                    in</a>
                            @endguest
                            @auth
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="-mx-3 block rounded-lg hover:text-black px-3 py-2.5 text-base/7 font-semibold  hover:bg-gray-50">Logout</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
