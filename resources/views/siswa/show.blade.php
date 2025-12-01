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
            <div class="lg:col-span-2">
                {{-- Profile Card --}}
                <div class="bg-white dark:bg-slate-800 rounded-lg shadow border border-slate-200 dark:border-slate-700">
                    <div class="bg-blue-600 px-6 py-8 rounded-t-lg">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center">
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
                                    class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg">
                                Naikkan Kelas
                            </button>
                        </form>

                        <div class="pt-4 border-t border-slate-200 dark:border-slate-700 space-y-2">
                            <a href="{{ route('siswa.edit', $siswa->id) }}" 
                               class="flex items-center justify-center gap-2 w-full px-4 py-2 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 font-medium rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Data
                            </a>

                            <a href="{{ route('siswa.index') }}" 
                               class="flex items-center justify-center gap-2 w-full px-4 py-2 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 font-medium rounded-lg">
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