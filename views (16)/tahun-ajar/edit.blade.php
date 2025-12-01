{{-- Modern tahun ajar edit form --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-slate-900 dark:text-slate-100">
                Edit Tahun Ajar
            </h2>
            <a href="{{ route('tahun-ajar.index') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 sm:p-8">
            <form action="{{ route('tahun-ajar.update', $tahunAjar->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label value="Kode Tahun Ajar" />
                    <x-text-input name="kode_tahun_ajar" placeholder="Contoh: 2024/2025" class="mt-2 w-full" :value="old('kode_tahun_ajar', $tahunAjar->kode_tahun_ajar)" />
                    <x-input-error :messages="$errors->get('kode_tahun_ajar')" class="mt-2" />
                </div>

                <div>
                    <x-input-label value="Nama Tahun Ajar" />
                    <x-text-input name="nama_tahun_ajar" placeholder="Masukkan nama tahun ajar" class="mt-2 w-full" :value="old('nama_tahun_ajar', $tahunAjar->nama_tahun_ajar)" />
                    <x-input-error :messages="$errors->get('nama_tahun_ajar')" class="mt-2" />
                </div>

                <div class="flex gap-3 justify-end pt-6 border-t border-slate-200 dark:border-slate-700">
                    <a href="{{ route('tahun-ajar.index') }}" class="px-6 py-2.5 text-slate-700 dark:text-slate-200 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 font-semibold rounded-lg transition duration-150">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-150">
                        Update Tahun Ajar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
