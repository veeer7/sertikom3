{{-- ULTRA MODERN – PURPLE NEON EDITION 2025 --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-6 rounded-3xl
            bg-gradient-to-br from-white/40 via-white/10 to-white/5
            dark:from-slate-900/60 dark:via-slate-900/40 dark:to-slate-900/20
            backdrop-blur-3xl border border-white/30 dark:border-slate-700/40
            shadow-[0_20px_60px_-10px_rgba(0,0,0,0.4)]
            relative overflow-hidden">

            <!-- Animated glowing orbs -->
            <div class="absolute -top-10 -left-10 w-40 h-40 bg-fuchsia-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-indigo-500/20 rounded-full blur-3xl animate-ping"></div>

            <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight flex items-center gap-3 relative z-10">
                <span class="w-3 h-3 rounded-full bg-gradient-to-r from-fuchsia-500 to-indigo-500 animate-pulse shadow-[0_0_20px_#d946ef]"></span>
                Data Tahun Ajar
            </h2>

            <a href="{{ route('tahun-ajar.create') }}"
               class="w-full sm:w-auto px-6 py-3 rounded-2xl bg-gradient-to-r 
               from-fuchsia-600 via-purple-600 to-indigo-600
               hover:from-fuchsia-700 hover:via-purple-700 hover:to-indigo-700
               text-white font-semibold text-sm shadow-lg
               hover:shadow-[0_10px_40px_rgba(168,85,247,0.6)]
               transition-all duration-300 active:scale-95 flex items-center gap-2 relative z-10 group">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
                Tambah Tahun Ajar
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 mt-8">

        <!-- DESKTOP TABLE -->
        <div class="hidden md:block rounded-3xl overflow-hidden
            bg-gradient-to-br from-white/60 via-white/20 to-white/5
            dark:from-slate-900/60 dark:via-slate-900/40 dark:to-slate-900/20
            backdrop-blur-3xl border border-white/30 dark:border-slate-700/40
            shadow-[0_40px_120px_-20px_rgba(0,0,0,0.45)]">

            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-slate-100 via-slate-50 to-slate-100
                        dark:from-slate-800 dark:via-slate-700 dark:to-slate-800
                        border-b border-slate-300/50 dark:border-slate-700/50">

                        <th class="px-6 py-5 text-left text-[10px] font-extrabold text-slate-600 dark:text-slate-300 uppercase tracking-[0.2em]">
                            Kode Tahun Ajar
                        </th>

                        <th class="px-6 py-5 text-left text-[10px] font-extrabold text-slate-600 dark:text-slate-300 uppercase tracking-[0.2em]">
                            Status
                        </th>

                        <th class="px-6 py-5 text-center text-[10px] font-extrabold text-slate-600 dark:text-slate-300 uppercase tracking-[0.2em]">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200/50 dark:divide-slate-700/50">
                    @foreach ($tahunAjar as $tA)
                    <tr class="transition-all duration-300 hover:bg-white/40 dark:hover:bg-slate-800/40
                        hover:shadow-[0_0_30px_rgba(168,85,247,0.35)]
                        hover:backdrop-blur-xl border-l-4 border-transparent hover:border-fuchsia-500">

                        <td class="px-6 py-5 text-sm font-bold text-slate-800 dark:text-white">
                            <span class="inline-flex px-4 py-2 rounded-xl text-xs font-bold
                                bg-gradient-to-r from-fuchsia-600/20 to-indigo-600/20
                                text-fuchsia-700 dark:text-fuchsia-300
                                border border-fuchsia-500/20 shadow-sm">
                                {{ $tA->kode_tahun_ajar }}
                            </span>
                        </td>

                        <td class="px-6 py-5 text-sm font-semibold text-slate-800 dark:text-slate-200">
                            {{ $tA->nama_tahun_ajar }}
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center gap-3">

                                <a href="{{ route('tahun-ajar.edit', $tA->id) }}"
                                   class="p-3 rounded-xl bg-slate-200/70 dark:bg-slate-800/60
                                   hover:bg-gradient-to-r hover:from-purple-600 hover:to-indigo-600
                                   hover:text-white text-slate-700 dark:text-slate-300
                                   transition-all duration-300 shadow-md
                                   hover:shadow-[0_0_20px_rgba(139,92,246,0.5)] active:scale-90">
                                    ✏️
                                </a>

                                <form action="{{ route('tahun-ajar.destroy', $tA->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="p-3 rounded-xl bg-slate-200/70 dark:bg-slate-800/60
                                        hover:bg-gradient-to-r hover:from-red-600 hover:to-pink-600
                                        hover:text-white text-slate-700 dark:text-slate-300
                                        transition-all duration-300 shadow-md
                                        hover:shadow-[0_0_20px_rgba(244,63,94,0.5)] active:scale-90">
                                        🗑️
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- MOBILE CARD -->
        <div class="md:hidden space-y-5 mt-4">
            @foreach ($tahunAjar as $tA)
            <div class="rounded-3xl p-5 bg-gradient-to-br from-white/60 via-white/20 to-white/5
                dark:from-slate-900/60 dark:via-slate-900/40 dark:to-slate-900/20
                backdrop-blur-3xl border border-white/20 dark:border-slate-700/40
                shadow-[0_20px_70px_-15px_rgba(0,0,0,0.4)]
                hover:shadow-[0_20px_80px_-10px_rgba(168,85,247,0.5)]
                transition-all duration-300">

                <div>
                    <span class="text-xs font-bold text-slate-500">Kode</span>
                    <div class="mt-1 px-4 py-2 rounded-xl bg-fuchsia-600/20 border border-fuchsia-500/20 text-fuchsia-700 font-bold">
                        {{ $tA->kode_tahun_ajar }}
                    </div>
                </div>

                <div class="mt-4">
                    <span class="text-xs font-bold text-slate-500">Status</span>
                    <div class="text-lg font-semibold text-slate-900 dark:text-slate-200">
                        {{ $tA->nama_tahun_ajar }}
                    </div>
                </div>

                <div class="flex gap-3 mt-5 pt-4 border-t border-slate-300/30 dark:border-slate-700/30">
                    <a href="{{ route('tahun-ajar.edit', $tA->id) }}"
                        class="flex-1 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600
                        hover:from-purple-700 hover:to-indigo-700 text-white text-sm font-semibold
                        shadow-md hover:shadow-xl active:scale-95 transition-all">
                        Edit
                    </a>

                    <form action="{{ route('tahun-ajar.destroy', $tA->id) }}" method="POST"
                          class="flex-1" onsubmit="return confirm('Yakin hapus data?')">
                        @csrf @method('DELETE')

                        <button type="submit"
                            class="w-full py-3 rounded-xl bg-gradient-to-r from-red-600 to-pink-600
                            hover:from-red-700 hover:to-pink-700 text-white text-sm font-semibold
                            shadow-md hover:shadow-xl active:scale-95 transition-all">
                            Hapus
                        </button>
                    </form>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
