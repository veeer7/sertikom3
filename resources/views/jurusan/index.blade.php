{{-- ULTRA MODERN PREMIUM DASHBOARD TABLE 2025 --}}
<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">

        <h2 class="font-bold text-4xl text-slate-900 dark:text-slate-100 tracking-tight drop-shadow-sm">
            Jurusan
        </h2>

        <a href="{{ route('jurusan.create') }}"
           class="inline-flex items-center px-6 py-3 
                  bg-gradient-to-br from-indigo-600 to-blue-700 
                  hover:from-indigo-500 hover:to-blue-600 
                  text-white font-semibold text-sm rounded-xl
                  shadow-[0_4px_16px_rgba(0,0,0,0.25)]
                  hover:shadow-[0_6px_22px_rgba(0,0,0,0.35)]
                  transition-all duration-300 active:scale-95">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4" />
            </svg>
            Tambah Jurusan
        </a>
    </div>
</x-slot>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Search bar modern floating --}}
    <div class="mt-3 mb-5 flex justify-end">
        <input type="text" placeholder="Cari jurusan..."
               class="px-4 py-2 rounded-xl w-64
                      bg-white/60 dark:bg-slate-800/60 
                      backdrop-blur-xl border border-slate-300/40 dark:border-slate-700/40
                      placeholder:text-slate-400 dark:placeholder:text-slate-500
                      focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400
                      focus:outline-none transition-all duration-300 shadow-sm">
    </div>

    {{-- MAIN CARD CONTAINER --}}
    <div class="bg-white/70 dark:bg-slate-900/60 backdrop-blur-2xl 
                rounded-3xl shadow-2xl 
                border border-slate-300/40 dark:border-slate-700/40
                overflow-hidden transition-all duration-300">

        <div class="overflow-x-auto">
            <table class="w-full text-left">

                {{-- HEADER SUPER FUTURISTIC --}}
                <thead>
                    <tr class="bg-gradient-to-r from-slate-100 to-slate-200 
                               dark:from-slate-800/60 dark:to-slate-900/40
                               border-b border-slate-300 dark:border-slate-700">
                        <th class="px-6 py-4 text-[12px] font-bold 
                                   text-slate-700 dark:text-slate-300 uppercase tracking-widest">
                            Kode Jurusan
                        </th>

                        <th class="px-6 py-4 text-[12px] font-bold 
                                   text-slate-700 dark:text-slate-300 uppercase tracking-widest">
                            Nama Jurusan
                        </th>

                        <th class="px-6 py-4 text-center text-[12px] font-bold 
                                   text-slate-700 dark:text-slate-300 uppercase tracking-widest">
                            Aksi
                        </th>
                    </tr>
                </thead>

                {{-- BODY ULTRA CLEAN --}}
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">

                    @foreach ($jurusan as $j)
                    <tr class="transition-all duration-200 group
                               hover:bg-slate-50 dark:hover:bg-slate-800/50
                               hover:shadow-lg hover:-translate-y-[2px]
                               cursor-pointer">

                        <td class="px-6 py-4 text-sm font-bold 
                                   text-slate-900 dark:text-slate-100">
                            {{ $j->kode_jurusan }}
                        </td>

                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                            {{ $j->nama_jurusan }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-3">

                                {{-- EDIT BUTTON – GLASS NEON --}}
                                <a href="{{ route('jurusan.edit', $j->id) }}"
                                   class="px-3 py-1.5 rounded-lg
                                          bg-blue-500/10 hover:bg-blue-500/20
                                          text-blue-600 dark:text-blue-300
                                          border border-blue-500/20
                                          backdrop-blur-lg
                                          shadow-[0_0_8px_rgba(60,130,255,0.2)]
                                          hover:shadow-[0_0_12px_rgba(60,130,255,0.35)]
                                          transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 
                                              0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 
                                              0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                {{-- DELETE BUTTON – RED NEON --}}
                                <form action="{{ route('jurusan.destroy', $j->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus jurusan ini?')" 
                                      class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1.5 rounded-lg
                                                   bg-red-500/10 hover:bg-red-500/20
                                                   text-red-600 dark:text-red-300
                                                   border border-red-500/20
                                                   backdrop-blur-lg
                                                   shadow-[0_0_8px_rgba(255,0,0,0.2)]
                                                   hover:shadow-[0_0_12px_rgba(255,0,0,0.35)]
                                                   transition-all duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 
                                                  0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 
                                                  4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 
                                                  0 00-1 1v3M4 7h16" />
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

</div>

</x-app-layout>
