{{-- ULTRA Modern Kelas Table - Fully Responsive --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-4 sm:p-6 rounded-2xl 
                   bg-gradient-to-br from-white/50 via-white/30 to-white/10 
                   dark:from-slate-900/70 dark:via-slate-900/50 dark:to-slate-900/30
                   backdrop-blur-3xl
                   border border-white/60 dark:border-slate-700/50
                   shadow-[0_20px_60px_-15px_rgba(0,0,0,0.3)]
                   relative overflow-hidden">

            <!-- Animated gradient background -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 via-purple-500/5 to-pink-500/5 blur-3xl animate-pulse"></div>

            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 dark:text-white tracking-tight flex items-center gap-3 relative z-10">
                <span class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 animate-pulse shadow-[0_0_15px_#2563eb]"></span>
                Data Kelas
            </h2>

            <a href="{{ route('kelas.create') }}"
               class="w-full sm:w-auto px-5 py-3 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 
                      hover:from-blue-700 hover:via-indigo-700 hover:to-purple-700 
                      text-white rounded-xl font-semibold text-sm sm:text-base
                      shadow-[0_10px_30px_rgba(79,70,229,0.4)]
                      hover:shadow-[0_15px_40px_rgba(79,70,229,0.6)]
                      active:scale-95 transition-all duration-300 
                      flex items-center justify-center gap-2 relative z-10
                      group">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Kelas
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 mt-6 sm:mt-8">

        <!-- Desktop Table View -->
        <div class="hidden lg:block rounded-3xl overflow-hidden
                   bg-gradient-to-br from-white/70 via-white/40 to-white/20 
                   dark:from-slate-900/60 dark:via-slate-900/50 dark:to-slate-900/30
                   backdrop-blur-3xl
                   border border-slate-300/50 dark:border-slate-700/50
                   shadow-[0_40px_100px_-25px_rgba(0,0,0,0.3)]">

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r 
                                   from-slate-100/90 via-slate-50/80 to-slate-100/90 
                                   dark:from-slate-800/80 dark:via-slate-700/70 dark:to-slate-800/80
                                   border-b-2 border-slate-300/70 dark:border-slate-600/70">

                            <th class="px-6 py-5 text-left text-[11px] font-black text-slate-700 dark:text-slate-300 uppercase tracking-[0.15em]">Level</th>
                            <th class="px-6 py-5 text-left text-[11px] font-black text-slate-700 dark:text-slate-300 uppercase tracking-[0.15em]">Nama Kelas</th>
                            <th class="px-6 py-5 text-left text-[11px] font-black text-slate-700 dark:text-slate-300 uppercase tracking-[0.15em]">Jurusan</th>
                            <th class="px-6 py-5 text-center text-[11px] font-black text-slate-700 dark:text-slate-300 uppercase tracking-[0.15em]">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200/60 dark:divide-slate-700/60">
                        @foreach ($kelas as $k)
                            <tr class="transition-all duration-300 
                                       hover:bg-white/60 dark:hover:bg-slate-800/60 
                                       hover:backdrop-blur-2xl
                                       hover:shadow-[0_0_30px_rgba(59,130,246,0.3)]
                                       border-l-4 border-transparent hover:border-l-blue-600
                                       group">

                                <td class="px-6 py-5">
                                    <span class="inline-flex px-4 py-2 bg-gradient-to-r from-blue-600/15 to-indigo-600/15 
                                                text-blue-700 dark:text-blue-300 
                                                border border-blue-600/30 rounded-xl text-xs font-bold
                                                shadow-sm group-hover:shadow-md transition-shadow">
                                        {{ $k->level_kelas }}
                                    </span>
                                </td>

                                <td class="px-6 py-5 text-sm font-semibold text-slate-800 dark:text-slate-200 tracking-wide">
                                    {{ $k->nama_kelas }}
                                </td>

                                <td class="px-6 py-5">
                                    <span class="inline-flex px-4 py-2 
                                                border border-purple-600/30 
                                                bg-gradient-to-r from-purple-600/15 to-pink-600/15 
                                                text-purple-700 dark:text-purple-300 
                                                rounded-xl text-xs font-semibold
                                                shadow-sm group-hover:shadow-md transition-shadow">
                                        {{ $k->jurusan->nama_jurusan }}
                                    </span>
                                </td>

                                <td class="px-6 py-5">
                                    <div class="flex items-center justify-center gap-3">

                                        <a href="{{ route('kelas.edit', $k->id) }}"
                                           class="p-2.5 rounded-xl 
                                                  bg-slate-200/70 dark:bg-slate-800/60 
                                                  hover:bg-gradient-to-r hover:from-blue-600 hover:to-indigo-600
                                                  hover:text-white text-slate-700 dark:text-slate-300
                                                  transition-all duration-300 shadow-md 
                                                  hover:shadow-[0_0_20px_rgba(37,99,235,0.5)]
                                                  active:scale-90 group/edit">
                                            <svg class="w-5 h-5 group-hover/edit:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2.5 rounded-xl 
                                                       bg-slate-200/70 dark:bg-slate-800/60 
                                                       hover:bg-gradient-to-r hover:from-red-600 hover:to-pink-600
                                                       hover:text-white text-slate-700 dark:text-slate-300
                                                       transition-all duration-300 shadow-md
                                                       hover:shadow-[0_0_20px_rgba(220,38,38,0.5)]
                                                       active:scale-90 group/delete">
                                                <svg class="w-5 h-5 group-hover/delete:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mobile/Tablet Card View -->
        <div class="lg:hidden space-y-4">
            @foreach ($kelas as $k)
                <div class="rounded-2xl overflow-hidden
                           bg-gradient-to-br from-white/70 via-white/40 to-white/20 
                           dark:from-slate-900/60 dark:via-slate-900/50 dark:to-slate-900/30
                           backdrop-blur-3xl
                           border border-slate-300/50 dark:border-slate-700/50
                           shadow-[0_20px_50px_-15px_rgba(0,0,0,0.3)]
                           hover:shadow-[0_25px_60px_-15px_rgba(59,130,246,0.4)]
                           transition-all duration-300
                           border-l-4 border-l-blue-600">
                    
                    <div class="p-5 space-y-4">
                        <!-- Level Badge -->
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Level</span>
                            <span class="px-4 py-2 bg-gradient-to-r from-blue-600/15 to-indigo-600/15 
                                        text-blue-700 dark:text-blue-300 
                                        border border-blue-600/30 rounded-xl text-sm font-bold
                                        shadow-sm">
                                {{ $k->level_kelas }}
                            </span>
                        </div>

                        <!-- Nama Kelas -->
                        <div>
                            <div class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">Nama Kelas</div>
                            <div class="text-base font-semibold text-slate-800 dark:text-slate-200">{{ $k->nama_kelas }}</div>
                        </div>

                        <!-- Jurusan -->
                        <div>
                            <div class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">Jurusan</div>
                            <span class="inline-flex px-4 py-2 
                                        border border-purple-600/30 
                                        bg-gradient-to-r from-purple-600/15 to-pink-600/15 
                                        text-purple-700 dark:text-purple-300 
                                        rounded-xl text-sm font-semibold
                                        shadow-sm">
                                {{ $k->jurusan->nama_jurusan }}
                            </span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 pt-3 border-t border-slate-300/50 dark:border-slate-700/50">
                            <a href="{{ route('kelas.edit', $k->id) }}"
                               class="flex-1 py-3 rounded-xl 
                                      bg-gradient-to-r from-blue-600 to-indigo-600
                                      hover:from-blue-700 hover:to-indigo-700
                                      text-white text-sm font-semibold
                                      shadow-md hover:shadow-lg
                                      active:scale-95 transition-all duration-200
                                      flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>

                            <form action="{{ route('kelas.destroy', $k->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus kelas ini?')"
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full py-3 rounded-xl 
                                           bg-gradient-to-r from-red-600 to-pink-600
                                           hover:from-red-700 hover:to-pink-700
                                           text-white text-sm font-semibold
                                           shadow-md hover:shadow-lg
                                           active:scale-95 transition-all duration-200
                                           flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>