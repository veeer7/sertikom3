<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-slate-900 dark:text-slate-100">
                Data Siswa
            </h2>
            <a href="{{ route('siswa.create') }}" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 transition-all duration-200 transform hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Siswa
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6" 
         x-data="{
             search: '',
             filterKelas: '',
             filterJurusan: '',
             get filteredSiswa() {
                 let filtered = this.$refs.tableBody.querySelectorAll('tr');
                 let count = 0;
                 
                 filtered.forEach(row => {
                     let nama = row.dataset.nama.toLowerCase();
                     let nisn = row.dataset.nisn.toLowerCase();
                     let kelas = row.dataset.kelas.toLowerCase();
                     let jurusan = row.dataset.jurusan.toLowerCase();
                     
                     let searchMatch = nama.includes(this.search.toLowerCase()) || 
                                     nisn.includes(this.search.toLowerCase());
                     let kelasMatch = this.filterKelas === '' || kelas === this.filterKelas.toLowerCase();
                     let jurusanMatch = this.filterJurusan === '' || jurusan === this.filterJurusan.toLowerCase();
                     
                     if (searchMatch && kelasMatch && jurusanMatch) {
                         row.style.display = '';
                         count++;
                     } else {
                         row.style.display = 'none';
                     }
                 });
                 
                 // Show/hide no results message
                 this.$refs.noResults.style.display = count === 0 ? '' : 'none';
                 
                 return count;
             }
         }">
        
        {{-- Filters --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                    Cari Nama / NISN
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" 
                           x-model="search"
                           @input="filteredSiswa"
                           placeholder="Cari siswa..."
                           class="w-full pl-10 pr-3 py-2 border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                    Filter Kelas
                </label>
                <select x-model="filterKelas"
                        @change="filteredSiswa"
                        class="w-full px-3 py-2 border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    <option value="">Semua Kelas</option>
                    @foreach($siswas->pluck('kelas.nama_kelas')->unique()->sort() as $kelas)
                        @if($kelas)
                            <option value="{{ $kelas }}">{{ $kelas }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                    Filter Jurusan
                </label>
                <select x-model="filterJurusan"
                        @change="filteredSiswa"
                        class="w-full px-3 py-2 border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    <option value="">Semua Jurusan</option>
                    @foreach($siswas->pluck('jurusan.nama_jurusan')->unique()->sort() as $jurusan)
                        @if($jurusan)
                            <option value="{{ $jurusan }}">{{ $jurusan }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Results Counter --}}
        <div class="mb-4 text-sm text-slate-600 dark:text-slate-400">
            <span x-text="'Menampilkan ' + filteredSiswa + ' dari {{ $siswas->count() }} siswa'"></span>
        </div>

        {{-- Table --}}
        <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl shadow-2xl border border-slate-700/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-slate-800 via-slate-700 to-slate-800 border-b border-slate-600">
                            <th class="px-8 py-5 text-left text-xs font-bold text-slate-200 uppercase tracking-wider">Nama</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-slate-200 uppercase tracking-wider">NISN</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-slate-200 uppercase tracking-wider">Gender</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-slate-200 uppercase tracking-wider">Tanggal Lahir</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-slate-200 uppercase tracking-wider">Kelas</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-slate-200 uppercase tracking-wider">Jurusan</th>
                            <th class="px-8 py-5 text-center text-xs font-bold text-slate-200 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50" x-ref="tableBody">
                        @foreach ($siswas as $siswa)
                        <tr class="hover:bg-slate-700/30 transition-all duration-200 group"
                            data-nama="{{ $siswa->nama_lengkap }}"
                            data-nisn="{{ $siswa->nisn }}"
                            data-kelas="{{ $siswa->kelas->nama_kelas ?? '' }}"
                            data-jurusan="{{ $siswa->jurusan->nama_jurusan ?? '' }}">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold text-lg shadow-lg group-hover:scale-110 transition-transform">
                                        {{ strtoupper(substr($siswa->nama_lengkap, 0, 1)) }}
                                    </div>
                                    <span class="text-sm font-semibold text-slate-100 group-hover:text-blue-400 transition-colors">
                                        {{ $siswa->nama_lengkap }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-sm text-slate-300 font-medium">
                                {{ $siswa->nisn }}
                            </td>
                            <td class="px-8 py-5">
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold shadow-md
                                    {{ $siswa->jenis_kelamin == 'laki-laki' ? 'bg-gradient-to-r from-blue-500 to-cyan-500 text-white' : 'bg-gradient-to-r from-pink-500 to-rose-500 text-white' }}">
                                    @if($siswa->jenis_kelamin == 'laki-laki')
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                                        </svg>
                                    @else
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                                        </svg>
                                    @endif
                                    {{ ucfirst($siswa->jenis_kelamin) }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-sm text-slate-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $siswa->tanggal_lahir ? $siswa->tanggal_lahir->format('d/m/Y') : '-' }}
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold bg-gradient-to-r from-emerald-500 to-teal-500 text-white shadow-md">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    {{ $siswa->kelas->nama_kelas ?? '-' }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold bg-gradient-to-r from-violet-500 to-purple-500 text-white shadow-md">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    {{ $siswa->jurusan->nama_jurusan ?? '-' }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('siswa.show', $siswa->id) }}" 
                                       class="group/btn p-3 bg-gradient-to-br from-slate-700 to-slate-800 hover:from-slate-600 hover:to-slate-700 text-slate-300 hover:text-white rounded-xl transition-all duration-200 hover:scale-110 hover:shadow-lg shadow-slate-900/50"
                                       title="Detail">
                                        <svg class="w-4 h-4 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('siswa.edit', $siswa->id) }}" 
                                       class="group/btn p-3 bg-gradient-to-br from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white rounded-xl transition-all duration-200 hover:scale-110 hover:shadow-lg shadow-blue-900/50"
                                       title="Edit">
                                        <svg class="w-4 h-4 group-hover/btn:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('siswa.destroy', $siswa->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Yakin mau hapus siswa ini?')" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="group/btn p-3 bg-gradient-to-br from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl transition-all duration-200 hover:scale-110 hover:shadow-lg shadow-red-900/50"
                                                title="Hapus">
                                            <svg class="w-4 h-4 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                        {{-- No Results Row --}}
                        <tr x-ref="noResults" style="display: none;">
                            <td colspan="7" class="px-8 py-12 text-center">
                                <div class="flex flex-col items-center justify-center gap-4">
                                    <svg class="w-16 h-16 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-slate-400">
                                        <p class="text-lg font-semibold mb-1">Tidak ada data yang ditemukan</p>
                                        <p class="text-sm">Coba ubah kata kunci pencarian atau filter Anda</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>