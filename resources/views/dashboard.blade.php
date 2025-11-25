{{-- Modern dashboard with improved card styling and spacing --}}
<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-2xl text-slate-900 dark:text-slate-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </div>
</x-slot>
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen">
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <!-- Tahun Ajar Card -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 hover:shadow-md transition duration-150">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Tahun Ajar</p>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">{{ $tahunAjarAktif->kode_tahun_ajar ?? '-' }}</h3>
                    </div>
                    <div class="p-3 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 dark:text-green-400 text-sm font-semibold">
                        ✓ Aktif
                    </span>
                </div>
            </div>

            <!-- Jurusan Card -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 hover:shadow-md transition duration-150">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Jurusan</p>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">{{ $totalJurusan }}</h3>
                    </div>
                    <div class="p-3 rounded-lg bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('jurusan.index') }}" class="text-blue-600 dark:text-blue-400 text-sm font-semibold hover:text-blue-700 dark:hover:text-blue-300">
                        Lihat Semua →
                    </a>
                </div>
            </div>

            <!-- Kelas Card -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 hover:shadow-md transition duration-150">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Kelas</p>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">{{ $totalKelas }}</h3>
                    </div>
                    <div class="p-3 rounded-lg bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('kelas.index') }}" class="text-blue-600 dark:text-blue-400 text-sm font-semibold hover:text-blue-700 dark:hover:text-blue-300">
                        Lihat Semua →
                    </a>
                </div>
            </div>

            <!-- Siswa Card -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 hover:shadow-md transition duration-150">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Siswa</p>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">{{ $totalSiswa }}</h3>
                    </div>
                    <div class="p-3 rounded-lg bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM4.318 20H3c-1.1 0-2-1.1-2-2.469V4.469C1 3.369 1.899 2.5 3.217 2.5h15.566c1.318 0 2.217 0.869 2.217 1.969v13.062c0 1.369-.9 2.469-2.217 2.469h-15.405" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('siswa.index') }}" class="text-blue-600 dark:text-blue-400 text-sm font-semibold hover:text-blue-700 dark:hover:text-blue-300">
                        Lihat Semua →
                    </a>
                </div>
            </div>
            
        </div>

        <!-- Recent Students Section -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Siswa Terbaru</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-700/50">
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">NISN</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Jurusan</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Tahun Ajar</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        @foreach ($siswas as $siswa)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-150">
                            <td class="px-6 py-4 text-sm text-slate-900 dark:text-slate-100 font-medium">{{ $siswa->nama_lengkap }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">{{ $siswa->nisn }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">{{ $siswa->jurusan->nama_jurusan ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">{{ $siswa->tahunAjar->kode_tahun_ajar ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

</x-app-layout>
