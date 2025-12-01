<nav x-data="{ open: false }" 
    class="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/80 border-b border-slate-800/60 shadow-[0_0_10px_rgba(15,15,25,0.4)] transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-8">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                    <div class="p-2 bg-slate-900/80 backdrop-blur-md rounded-xl border border-slate-700 group-hover:border-slate-500 transition-all shadow-md group-hover:shadow-slate-800/40">
                        <x-application-logo class="block h-6 w-auto fill-current text-slate-100 group-hover:text-white transition" />
                    </div>
                    <span class="text-xl font-bold text-slate-100 hidden sm:inline group-hover:text-white transition">
                        Dashboard
                    </span>
                </a>

                <!-- Main Navigation -->
                <div class="hidden sm:flex items-center gap-1">

                    @php
                        $navClass = "px-4 py-2 rounded-lg text-slate-400 relative transition-all
                                     hover:text-white hover:bg-slate-900 group";
                        $activeClass = "text-white bg-slate-900 shadow-inner";
                    @endphp

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="{{ $navClass }} {{ request()->routeIs('dashboard') ? $activeClass : '' }}">
                        <span class="relative">
                            Dashboard
                            <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                        </span>
                    </x-nav-link>

                    <x-nav-link :href="route('tahun-ajar.index')" :active="request()->routeIs('tahun-ajar.*')"
                        class="{{ $navClass }} {{ request()->routeIs('tahun-ajar.*') ? $activeClass : '' }}">
                        <span class="relative">
                            Tahun Ajar
                            <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                        </span>
                    </x-nav-link>

                    <x-nav-link :href="route('jurusan.index')" :active="request()->routeIs('jurusan.*')"
                        class="{{ $navClass }} {{ request()->routeIs('jurusan.*') ? $activeClass : '' }}">
                        <span class="relative">
                            Jurusan
                            <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                        </span>
                    </x-nav-link>

                    <x-nav-link :href="route('kelas.index')" :active="request()->routeIs('kelas.*')"
                        class="{{ $navClass }} {{ request()->routeIs('kelas.*') ? $activeClass : '' }}">
                        <span class="relative">
                            Kelas
                            <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                        </span>
                    </x-nav-link>

                    <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.*')"
                        class="{{ $navClass }} {{ request()->routeIs('siswa.*') ? $activeClass : '' }}">
                        <span class="relative">
                            Siswa
                            <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                        </span>
                    </x-nav-link>

                    <x-nav-link :href="route('user-management.index')" :active="request()->routeIs('user-management.*')"
                        class="{{ $navClass }} {{ request()->routeIs('user-management.*') ? $activeClass : '' }}">
                        <span class="relative">
                            User Management
                            <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-indigo-500 group-hover:w-full transition-all"></span>
                        </span>
                    </x-nav-link>
                </div>
            </div>

            <!-- User Menu -->
            <div class="flex items-center gap-4">
                <div class="hidden sm:block">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-900/40 border border-slate-700 hover:border-slate-500 hover:bg-slate-900 transition-all shadow-sm">
                                <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-sm font-bold text-slate-100">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="text-sm text-slate-300 group-hover:text-white transition">
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

                <!-- Mobile Menu Button -->
                <div class="sm:hidden">
                    <button @click="open = ! open" 
                        class="inline-flex items-center justify-center p-2 rounded-lg text-slate-400 hover:text-white hover:bg-slate-900 border border-transparent hover:border-slate-700 transition-all">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" 
                                class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" 
                                class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div :class="{'block': open, 'hidden': ! open }" 
        class="hidden sm:hidden bg-slate-900/90 backdrop-blur-xl border-t border-slate-800">
        <div class="pt-2 pb-3 space-y-1">

            @php
                $mClass = "text-slate-300 hover:text-white hover:bg-slate-800 transition";
                $mActive = "bg-slate-800 text-white";
            @endphp

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="{{ $mClass }} {{ request()->routeIs('dashboard') ? $mActive : '' }}">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('tahun-ajar.index')" :active="request()->routeIs('tahun-ajar.*')"
                class="{{ $mClass }} {{ request()->routeIs('tahun-ajar.*') ? $mActive : '' }}">
                Tahun Ajar
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('jurusan.index')" :active="request()->routeIs('jurusan.*')"
                class="{{ $mClass }} {{ request()->routeIs('jurusan.*') ? $mActive : '' }}">
                Jurusan
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('kelas.index')" :active="request()->routeIs('kelas.*')"
                class="{{ $mClass }} {{ request()->routeIs('kelas.*') ? $mActive : '' }}">
                Kelas
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.*')"
                class="{{ $mClass }} {{ request()->routeIs('siswa.*') ? $mActive : '' }}">
                Siswa
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('user-management.index')" :active="request()->routeIs('user-management.*')"
                class="{{ $mClass }} {{ request()->routeIs('user-management.*') ? $mActive : '' }}">
                User Management
            </x-responsive-nav-link>
        </div>

        <div class="border-t border-slate-800 pt-4 pb-3">
            <div class="px-4 py-2">
                <div class="text-base font-semibold text-white">{{ Auth::user()->name }}</div>
                <div class="text-sm text-slate-400">{{ Auth::user()->email }}</div>
            </div>

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
