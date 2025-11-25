{{-- Modern jurusan edit form --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-slate-900 dark:text-slate-100">
                Edit Jurusan
            </h2>
            <a href="{{ route('jurusan.index') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 sm:p-8">
            <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label value="Kode Jurusan" />
                    <x-text-input name="kode_jurusan" placeholder="Masukkan kode jurusan" class="mt-2 w-full" :value="old('kode_jurusan', $jurusan->kode_jurusan)" />
                    <x-input-error :messages="$errors->get('kode_jurusan')" class="mt-2" />
                </div>

                <div>
                    <x-input-label value="Nama Jurusan" />
                    <x-text-input name="nama_jurusan" placeholder="Masukkan nama jurusan" class="mt-2 w-full" :value="old('nama_jurusan', $jurusan->nama_jurusan)" />
                    <x-input-error :messages="$errors->get('nama_jurusan')" class="mt-2" />
                </div>

                <div class="flex gap-3 justify-end pt-6 border-t border-slate-200 dark:border-slate-700">
                    <a href="{{ route('jurusan.index') }}" class="px-6 py-2.5 text-slate-700 dark:text-slate-200 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 font-semibold rounded-lg transition duration-150">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-150">
                        Update Jurusan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
