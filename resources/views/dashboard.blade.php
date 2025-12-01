<x-app-layout>
    <x-slot name="header">
        <div class="space-y-2">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-4xl font-bold text-white tracking-tight">
                        Dashboard
                    </h2>
                    <p class="text-slate-400 text-sm flex items-center gap-2 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        Selamat datang, <span class="text-white font-semibold">{{ Auth::user()->name }}</span>
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Stats Grid dengan Gradient & Animation -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Tahun Ajar Card -->
            <div class="group relative bg-gradient-to-br from-blue-500/10 to-blue-600/5 backdrop-blur-xl rounded-2xl border border-blue-500/20 shadow-xl p-6 transition-all duration-500 hover:scale-105 hover:shadow-blue-500/25 hover:shadow-2xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="px-2 py-1 bg-blue-500/20 text-blue-400 text-xs font-semibold rounded-lg">Aktif</span>
                    </div>
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-wide mb-2">Tahun Ajar</p>
                    <h3 class="text-3xl font-bold text-white tracking-tight">
                        {{ $tahunAjarAktif->kode_tahun_ajar ?? '-' }}
                    </h3>
                </div>
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl"></div>
            </div>

            <!-- Jurusan Card -->
            <div class="group relative bg-gradient-to-br from-purple-500/10 to-purple-600/5 backdrop-blur-xl rounded-2xl border border-purple-500/20 shadow-xl p-6 transition-all duration-500 hover:scale-105 hover:shadow-purple-500/25 hover:shadow-2xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div class="flex items-center gap-1 text-green-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-wide mb-2">Jurusan</p>
                    <h3 class="text-3xl font-bold text-white tracking-tight">
                        {{ $totalJurusan }}
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">Program tersedia</p>
                </div>
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl"></div>
            </div>

            <!-- Kelas Card -->
            <div class="group relative bg-gradient-to-br from-emerald-500/10 to-emerald-600/5 backdrop-blur-xl rounded-2xl border border-emerald-500/20 shadow-xl p-6 transition-all duration-500 hover:scale-105 hover:shadow-emerald-500/25 hover:shadow-2xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="flex items-center gap-1 text-green-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-wide mb-2">Total Kelas</p>
                    <h3 class="text-3xl font-bold text-white tracking-tight">
                        {{ $totalKelas }}
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">Kelas terdaftar</p>
                </div>
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl"></div>
            </div>

            <!-- Siswa Card -->
            <div class="group relative bg-gradient-to-br from-orange-500/10 to-orange-600/5 backdrop-blur-xl rounded-2xl border border-orange-500/20 shadow-xl p-6 transition-all duration-500 hover:scale-105 hover:shadow-orange-500/25 hover:shadow-2xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="flex items-center gap-1 text-green-400">
                            <span class="text-xs font-semibold">+12%</span>
                        </div>
                    </div>
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-wide mb-2">Total Siswa</p>
                    <h3 class="text-3xl font-bold text-white tracking-tight">
                        {{ $totalSiswa }}
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">Siswa aktif</p>
                </div>
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-orange-500/10 rounded-full blur-2xl"></div>
            </div>
        </div>

        <!-- Recent Students Table -->
        <div class="bg-gradient-to-br from-slate-900/95 to-slate-800/95 backdrop-blur-xl rounded-2xl border border-slate-700/50 shadow-2xl overflow-hidden">
            <!-- Header dengan Gradient -->
            <div class="px-6 py-5 border-b border-slate-700/50 bg-gradient-to-r from-slate-800/50 to-slate-900/50">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-gradient-to-br from-blue-500/20 to-purple-600/20 rounded-lg">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">Siswa Terbaru</h3>
                            <p class="text-slate-400 text-xs mt-0.5">10 pendaftaran terakhir</p>
                        </div>
                    </div>
                    <span class="px-3 py-1.5 bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-semibold rounded-lg">
                        Live Data
                    </span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-800/80 border-b border-slate-700/70">
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2 text-xs font-bold text-slate-300 uppercase tracking-wider">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                    Nama Lengkap
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2 text-xs font-bold text-slate-300 uppercase tracking-wider">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                                    </svg>
                                    NISN
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2 text-xs font-bold text-slate-300 uppercase tracking-wider">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                    </svg>
                                    Kelas
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2 text-xs font-bold text-slate-300 uppercase tracking-wider">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                                    </svg>
                                    Jurusan
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2 text-xs font-bold text-slate-300 uppercase tracking-wider">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    Tahun Ajar
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-800/50">
                        @foreach ($siswas as $index => $siswa)
                        <tr class="group hover:bg-gradient-to-r hover:from-slate-800/40 hover:to-slate-700/20 transition-all duration-300">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        {{ substr($siswa->nama_lengkap, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-white group-hover:text-blue-400 transition-colors">
                                            {{ $siswa->nama_lengkap }}
                                        </p>
                                        <p class="text-xs text-slate-500">Siswa #{{ $index + 1 }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1.5 rounded-lg bg-slate-800/70 border border-slate-700/50 text-slate-300 text-xs font-mono font-medium shadow-inner">
                                        {{ $siswa->nisn }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gradient-to-r from-emerald-500/10 to-emerald-600/5 border border-emerald-500/20 text-emerald-400 text-xs font-semibold shadow-sm">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                                    </svg>
                                    {{ $siswa->kelas->nama_kelas ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gradient-to-r from-purple-500/10 to-purple-600/5 border border-purple-500/20 text-purple-400 text-xs font-semibold shadow-sm">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $siswa->jurusan->nama_jurusan ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-sm text-slate-400 font-medium">
                                        {{ $siswa->tahunAjar->kode_tahun_ajar ?? '-' }}
                                    </span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <!-- Footer Table -->
            <div class="px-6 py-4 bg-slate-800/40 border-t border-slate-700/50">
                <p class="text-xs text-slate-500 text-center">
                    Menampilkan <span class="text-white font-semibold">{{ count($siswas) }}</span> dari total siswa terdaftar
                </p>
            </div>
        </div>
    </div>
</x-app-layout>