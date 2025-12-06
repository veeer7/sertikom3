<nav x-data="{ open: false }" 
     class="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/70 border-b border-slate-800/40 shadow-[0_4px_20px_rgba(0,0,0,0.7)]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- LOGO + TITLE -->
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <div class="p-2 bg-slate-900/60 rounded-xl border border-slate-700 group-hover:border-indigo-500 transition-all shadow-md">
                    <x-application-logo class="block h-6 w-auto fill-current text-slate-100 group-hover:text-indigo-400 transition" />
                </div>
                <span class="text-xl font-bold text-slate-100 hidden sm:block group-hover:text-indigo-400 transition tracking-wide">
                    Dashboard
                </span>
            </a>

            <!-- DESKTOP NAV -->
            <div class="hidden sm:flex items-center gap-1">

                @php
                    $nav = "px-4 py-2 rounded-lg text-slate-400 transition-all hover:text-white hover:bg-slate-900 relative group";
                    $active = "bg-slate-900 text-white shadow-inner border border-slate-700";
                    $role = Auth::user()->role;
                @endphp

                <!-- Dashboard -->
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    class="{{ $nav }} {{ request()->routeIs('dashboard') ? $active : '' }}">
                    <span>
                        Dashboard
                        <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                    </span>
                </x-nav-link>

                <!-- Non-Siswa -->
                @if ($role !== 'siswa')

                <x-nav-link :href="route('tahun-ajar.index')" :active="request()->routeIs('tahun-ajar.*')"
                    class="{{ $nav }} {{ request()->routeIs('tahun-ajar.*') ? $active : '' }}">
                    <span>
                        Tahun Ajar
                        <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                    </span>
                </x-nav-link>

                <x-nav-link :href="route('jurusan.index')" :active="request()->routeIs('jurusan.*')"
                    class="{{ $nav }} {{ request()->routeIs('jurusan.*') ? $active : '' }}">
                    <span>
                        Jurusan
                        <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                    </span>
                </x-nav-link>

                <x-nav-link :href="route('kelas.index')" :active="request()->routeIs('kelas.*')"
                    class="{{ $nav }} {{ request()->routeIs('kelas.*') ? $active : '' }}">
                    <span>
                        Kelas
                        <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                    </span>
                </x-nav-link>

                <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.*')"
                    class="{{ $nav }} {{ request()->routeIs('siswa.*') ? $active : '' }}">
                    <span>
                        Siswa
                        <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                    </span>
                </x-nav-link>

                @if ($role === 'admin')
                <x-nav-link :href="route('user-management.index')" :active="request()->routeIs('user-management.*')"
                    class="{{ $nav }} {{ request()->routeIs('user-management.*') ? $active : '' }}">
                    <span>
                        User Management
                        <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                    </span>
                </x-nav-link>
                @endif

                @endif

            </div>

            <!-- AVATAR + DROPDOWN -->
            <div class="hidden sm:block">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 px-4 py-2 bg-slate-900/40 border border-slate-700 hover:border-indigo-500 hover:bg-slate-900/60 rounded-xl transition-all shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-sm font-bold text-slate-100">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="text-slate-300 group-hover:text-white">
                                {{ Auth::user()->name }}
                            </span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-slate-300 hover:text-white">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-slate-300 hover:text-white">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- MOBILE BUTTON -->
            <div class="sm:hidden">
                <button @click="open = ! open"
                    class="p-2 rounded-lg text-slate-300 hover:bg-slate-800 border border-slate-700 transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor">
                        <path :class="{'hidden': open }" class="inline-flex"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open }" class="hidden"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- MOBILE NAV -->
    <div :class="{'block': open, 'hidden': ! open}" 
         class="hidden sm:hidden bg-slate-900/90 border-t border-slate-800 backdrop-blur-xl">

        <div class="pt-2 pb-3 space-y-1">

            @php
                $m = "text-slate-300 hover:text-white hover:bg-slate-800 transition px-3 py-2 rounded-lg";
                $ma = "bg-slate-800 text-white";
            @endphp

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="{{ $m }} {{ request()->routeIs('dashboard') ? $ma : '' }}">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('tahun-ajar.index')" :active="request()->routeIs('tahun-ajar.*')"
                class="{{ $m }} {{ request()->routeIs('tahun-ajar.*') ? $ma : '' }}">
                Tahun Ajar
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('jurusan.index')" :active="request()->routeIs('jurusan.*')"
                class="{{ $m }} {{ request()->routeIs('jurusan.*') ? $ma : '' }}">
                Jurusan
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('kelas.index')" :active="request()->routeIs('kelas.*')"
                class="{{ $m }} {{ request()->routeIs('kelas.*') ? $ma : '' }}">
                Kelas
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.*')"
                class="{{ $m }} {{ request()->routeIs('siswa.*') ? $ma : '' }}">
                Siswa
            </x-responsive-nav-link>

            @if ($role === 'admin')
            <x-responsive-nav-link :href="route('user-management.index')" :active="request()->routeIs('user-management.*')"
                class="{{ $m }} {{ request()->routeIs('user-management.*') ? $ma : '' }}">
                User Management
            </x-responsive-nav-link>
            @endif

        </div>

        <!-- PROFILE -->
        <div class="border-t border-slate-800 px-4 py-3">
            <div class="text-base font-semibold text-white">{{ Auth::user()->name }}</div>
            <div class="text-sm text-slate-400">{{ Auth::user()->email }}</div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-slate-300 hover:text-white">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-slate-300 hover:text-white">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

    </div>

</nav>
