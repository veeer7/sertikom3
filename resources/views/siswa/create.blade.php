{{-- Modern form design with card layout and improved spacing --}}
<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Tambah Siswa</h1>
            <a href="{{ route('siswa.index') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 sm:p-8">
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                    <h3 class="text-sm font-semibold text-red-800 dark:text-red-200 mb-2">Terjadi Kesalahan</h3>
                    <ul class="text-sm text-red-700 dark:text-red-300 space-y-1">
                        @foreach ($errors->all() as $err)
                            <li>• {{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('siswa.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label value="NISN" />
                        <input type="text" name="nisn" placeholder="Nomor Induk Siswa Nasional" 
                               class="w-full px-3.5 py-2.5 border border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm" 
                               value="{{ old('nisn') }}">
                        <x-input-error :messages="$errors->get('nisn')" />
                    </div>
                    <div>
                        <x-input-label value="Nama Lengkap" />
                        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap Siswa" 
                               class="w-full px-3.5 py-2.5 border border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm" 
                               value="{{ old('nama_lengkap') }}">
                        <x-input-error :messages="$errors->get('nama_lengkap')" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label value="Jenis Kelamin" />
                        <select name="jenis_kelamin" class="w-full px-3.5 py-2.5 border border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki" {{ old('jenis_kelamin')=='laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{ old('jenis_kelamin')=='perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <x-input-error :messages="$errors->get('jenis_kelamin')" />
                    </div>
                    <div>
                        <x-input-label value="Tanggal Lahir" />
                        <input type="date" name="tanggal_lahir" 
                               class="w-full px-3.5 py-2.5 border border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm" 
                               value="{{ old('tanggal_lahir') }}">
                        <x-input-error :messages="$errors->get('tanggal_lahir')" />
                    </div>
                </div>

                <div>
                    <x-input-label value="Alamat" />
                    <textarea name="alamat" placeholder="Masukkan alamat lengkap" 
                              class="w-full px-3.5 py-2.5 border border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm h-28" 
                              style="resize: none;">{{ old('alamat') }}</textarea>
                    <x-input-error :messages="$errors->get('alamat')" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label value="Jurusan" />
                        <select name="jurusan_id" class="w-full px-3.5 py-2.5 border border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm">
                            <option value="">Pilih Jurusan</option>
                            @foreach ($jurusan as $j)
                                <option value="{{ $j->id }}" {{ old('jurusan_id')==$j->id ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('jurusan_id')" />
                    </div>

                    <div>
                        <x-input-label value="Kelas" />
                        <select name="kelas_id" class="w-full px-3.5 py-2.5 border border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm">
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_id')==$k->id ? 'selected' : '' }}>{{ $k->nama_kelas }} - {{ $k->jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('kelas_id')" />
                    </div>
                </div>

                <div>
                    <x-input-label value="Tahun Ajar" />
                    <select name="tahun_ajar_id" class="w-full px-3.5 py-2.5 border border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm">
                        <option value="">Pilih Tahun Ajar</option>
                        @foreach ($tahunAjar as $t)
                            <option value="{{ $t->id }}" {{ old('tahun_ajar_id')==$t->id ? 'selected' : '' }}>{{ $t->kode_tahun_ajar }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('tahun_ajar_id')" />
                </div>

                <div class="flex gap-3 justify-end pt-6 border-t border-slate-200 dark:border-slate-700">
                    <a href="{{ route('siswa.index') }}" class="px-6 py-2.5 text-slate-700 dark:text-slate-200 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 font-semibold rounded-lg transition duration-150">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-150">
                        Simpan Siswa
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
