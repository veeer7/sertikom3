{{-- Student Profile --}}
<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Header --}}
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Profile Siswa</h1>
                <p class="text-slate-600 dark:text-slate-400 mt-1">Detail informasi siswa</p>
            </div>
            <a href="{{ route('siswa.index') }}" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Profile Card --}}
                <div class="bg-white dark:bg-slate-800 rounded-lg shadow border border-slate-200 dark:border-slate-700">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-8 rounded-t-lg">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center shadow-lg">
                                <span class="text-2xl font-bold text-blue-600">
                                    {{ strtoupper(substr($siswa->nama_lengkap, 0, 1)) }}
                                </span>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">{{ $siswa->nama_lengkap }}</h2>
                                <p class="text-blue-100">{{ $siswa->nisn }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mb-1">Kelas</p>
                                <p class="font-semibold text-slate-900 dark:text-white">{{ $kelasSekarang->nama_kelas }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mb-1">Jurusan</p>
                                <p class="font-semibold text-slate-900 dark:text-white">{{ $siswa->jurusan->nama_jurusan }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mb-1">Tahun Ajaran</p>
                                <p class="font-semibold text-slate-900 dark:text-white">{{ $siswa->tahunAjar->kode_tahun_ajar }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mb-1">Jenis Kelamin</p>
                                <p class="font-semibold text-slate-900 dark:text-white">{{ ucfirst($siswa->jenis_kelamin) }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mb-1">Status</p>
                                <span class="inline-block px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-sm font-medium">
                                    {{ $siswa->status ?? 'Aktif' }}
                                </span>
                            </div>

                            <div class="col-span-2">
                                <p class="text-sm text-slate-600 dark:text-slate-400 mb-1">Alamat</p>
                                <p class="text-slate-900 dark:text-white">{{ $siswa->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Riwayat Kelas --}}
                <div class="bg-white dark:bg-slate-800 rounded-lg shadow border border-slate-200 dark:border-slate-700">
                    <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-bold text-slate-900 dark:text-white">Riwayat Kelas</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">History perpindahan kelas siswa</p>
                            </div>
                            <span class="inline-flex items-center gap-2 px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                {{ $riwayatKelas->count() }} Riwayat
                            </span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-slate-50 dark:bg-slate-900/50 border-b border-slate-200 dark:border-slate-700">
                                    <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">
                                        Kelas
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">
                                        Jurusan
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">
                                        Tahun Ajaran
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">
                                        Tanggal Masuk
                                    </th>
                                    <th class="px-6 py-3 text-center text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                @forelse($riwayatKelas as $riwayat)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-md">
                                                {{ substr($riwayat->kelas->nama_kelas, 0, 2) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-slate-900 dark:text-white">
                                                    {{ $riwayat->kelas->nama_kelas }}
                                                </p>
                                                @if($riwayat->is_active)
                                                    <p class="text-xs text-blue-600 dark:text-blue-400 font-medium">
                                                        Kelas Saat Ini
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-violet-100 dark:bg-violet-900 text-violet-800 dark:text-violet-200">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            {{ $riwayat->kelas->jurusan->nama_jurusan }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-sm text-slate-700 dark:text-slate-300 font-medium">
                                                {{ $riwayat->tahunAjar->kode_tahun_ajar }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-sm text-slate-700 dark:text-slate-300">
                                                {{ $riwayat->created_at->format('d M Y') }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($riwayat->is_active)
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-green-500 to-emerald-500 text-white shadow-md">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Aktif
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-400">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Non-Aktif
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center gap-3">
                                            <svg class="w-16 h-16 text-slate-400 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <div class="text-slate-500 dark:text-slate-400">
                                                <p class="font-semibold text-lg">Belum ada riwayat kelas</p>
                                                <p class="text-sm mt-1">Riwayat kelas akan muncul setelah siswa naik kelas</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-800 rounded-lg shadow border border-slate-200 dark:border-slate-700">
                    <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="font-bold text-slate-900 dark:text-white">Aksi</h3>
                    </div>

                    <div class="p-6 space-y-4">
                        {{-- Naik Kelas Form --}}
                        <form action="{{ route('siswa.naikKelas', $siswa->id) }}" method="POST" class="space-y-3">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    Naik Kelas
                                </label>
                                <select name="kelas_baru" 
                                        class="w-full px-3 py-2 bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-600 text-slate-900 dark:text-slate-100 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Pilih kelas</option>
                                    @foreach($kelas as $k)
                                        <option value="{{ $k->id }}">
                                            {{ $k->nama_kelas }} - {{ $k->jurusan->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" 
                                    class="w-full px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200">
                                <div class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    Naikkan Kelas
                                </div>
                            </button>
                        </form>

                        <div class="pt-4 border-t border-slate-200 dark:border-slate-700 space-y-2">
                            <a href="{{ route('siswa.edit', $siswa->id) }}" 
                               class="flex items-center justify-center gap-2 w-full px-4 py-2 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 font-medium rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Data
                            </a>

                            <a href="{{ route('siswa.index') }}" 
                               class="flex items-center justify-center gap-2 w-full px-4 py-2 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 font-medium rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                Daftar Siswa
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>