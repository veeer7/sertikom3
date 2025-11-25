{{-- Modern detail page with cards and improved styling --}}
<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Detail Siswa</h1>
            <a href="{{ route('siswa.index') }}" class="inline-flex items-center px-4 py-2 text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 bg-slate-100 dark:bg-slate-800 rounded-lg transition duration-150">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-slate-100 mb-6 pb-4 border-b border-slate-200 dark:border-slate-700">Data Siswa</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <p class="text-sm font-semibold text-slate-600 dark:text-slate-400">Nama Lengkap</p>
                            <p class="text-lg font-medium text-slate-900 dark:text-slate-100">{{ $siswa->nama_lengkap }}</p>
                        </div>

                        <div class="space-y-1">
                            <p class="text-sm font-semibold text-slate-600 dark:text-slate-400">NISN</p>
                            <p class="text-lg font-medium text-slate-900 dark:text-slate-100">{{ $siswa->nisn }}</p>
                        </div>

                        <div class="space-y-1">
                            <p class="text-sm font-semibold text-slate-600 dark:text-slate-400">Kelas</p>
                            <p class="text-lg font-medium text-slate-900 dark:text-slate-100">{{ $kelasSekarang->nama_kelas }}</p>
                        </div>

                        <div class="space-y-1">
                            <p class="text-sm font-semibold text-slate-600 dark:text-slate-400">Jurusan</p>
                            <p class="text-lg font-medium text-slate-900 dark:text-slate-100">{{ $siswa->jurusan->nama_jurusan }}</p>
                        </div>

                        <div class="space-y-1">
                            <p class="text-sm font-semibold text-slate-600 dark:text-slate-400">Tahun Ajar</p>
                            <p class="text-lg font-medium text-slate-900 dark:text-slate-100">{{ $siswa->tahunAjar->kode_tahun_ajar }}</p>
                        </div>

                        <div class="space-y-1">
                            <p class="text-sm font-semibold text-slate-600 dark:text-slate-400">Jenis Kelamin</p>
                            <p class="text-lg font-medium text-slate-900 dark:text-slate-100">{{ ucfirst($siswa->jenis_kelamin) }}</p>
                        </div>

                        <div class="col-span-1 md:col-span-2 space-y-1">
                            <p class="text-sm font-semibold text-slate-600 dark:text-slate-400">Alamat</p>
                            <p class="text-base text-slate-900 dark:text-slate-100 leading-relaxed">{{ $siswa->alamat }}</p>
                        </div>

                        <div class="space-y-1">
                            <p class="text-sm font-semibold text-slate-600 dark:text-slate-400">Status</p>
                            <p class="text-lg font-bold uppercase text-blue-600 dark:text-blue-400">{{ $siswa->status ?? 'Aktif' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Actions -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100 mb-6 pb-4 border-b border-slate-200 dark:border-slate-700">Aksi</h3>

                    <form action="{{ route('siswa.naikKelas', $siswa->id) }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2 block">Naik Kelas ke:</label>
                            <select name="kelas_baru" class="w-full px-3.5 py-2.5 border border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm">
                                <option value="">-- Pilih Kelas Baru --</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">
                                        {{ $k->nama_kelas }} - {{ $k->jurusan->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-150">
                            Naik Kelas
                        </button>
                    </form>

                    <div class="mt-6 pt-6 border-t border-slate-200 dark:border-slate-700 space-y-3">
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="flex items-center justify-center px-4 py-2.5 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 font-semibold rounded-lg transition duration-150">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Siswa
                        </a>
                        <a href="{{ route('siswa.index') }}" class="flex items-center justify-center px-4 py-2.5 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 font-semibold rounded-lg transition duration-150">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
