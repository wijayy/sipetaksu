<nav class="fixed top-0 bottom-0 left-0 flex flex-col items-center w-16 h-screen md:w-60 bg-mine-100 ">
    <a href="{{ route('home') }}">
        <img src="{{ asset('asset/logo susut.png') }}" class="w-32 px-2 pt-4">
    </a>
    <div class="flex flex-col justify-between h-full pb-4 text-xl text-white">
        <div class="w-full px-2 ">
            <h2 class="hidden mt-4 text-gray-100 md:block">Menu</h2>
            <div class="block w-full h-px px-3 mt-3 bg-gray-100 md:hidden"></div>
            <div class="flex flex-wrap justify-center gap-3 mt-2">
                <x-sidebar-a href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="">
                    <i class="text-3xl md:pr-2 bx bx-home"></i>
                    <div class="hidden md:block">Dashboard</div>
                </x-sidebar-a>
                <x-sidebar-a href="{{ route('umkm.index') }}" class="">
                    <i class="text-3xl md:pr-2 bx bxs-store-alt"></i>
                    <div class="hidden md:block">UMKM</div>
                </x-sidebar-a>

            </div>
            <h2 class="hidden mt-4 text-gray-100 md:block">Master Data</h2>
            <div class="block w-full h-px px-3 mt-3 bg-gray-100 md:hidden"></div>
            <div class="flex flex-wrap justify-center gap-3 mt-2">
                <x-sidebar-a href="{{ route('dashboard.kategori.index') }}" class="">
                    <i class="text-3xl md:pr-2 bx bxs-category-alt"></i>
                    <div class="hidden md:block">Kategori</div>
                </x-sidebar-a>
                <x-sidebar-a href="{{ route('dashboard.user') }}" class="">
                    <i class="text-3xl md:pr-2 bx bx-user"></i>
                    <div class="hidden md:block">User</div>
                </x-sidebar-a>

            </div>
        </div>

    </div>
</nav>

<div class="flex items-center justify-end w-full h-16 gap-4 pl-20 pr-4 bg-white shadow-lg md:pl-64">
    <a href="{{ route('profile.edit') }}" class="flex items-center">{{ Auth::user()->name }} <i class="text-2xl bx bx-chevron-down"></i></a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <x-auth-a onclick="event.preventDefault();
        this.closest('form').submit();">Log out</x-auth-a>
    </form>
</div>
