@extends('layouts.admin')

@section('title', 'Pengaturan - Admin Panel')

@section('content')
    <header
        class="flex-shrink-0 px-8 py-6 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-background-light dark:bg-background-dark z-10">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Pengaturan</h2>
            <p class="text-slate-500 dark:text-slate-400 font-sans text-sm">Konfigurasi umum aplikasi.</p>
        </div>
    </header>

    <div class="flex-1 overflow-auto px-8 pb-8">
        <div
            class="bg-white dark:bg-[#16202a] p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm max-w-2xl">
            <form action="{{ route('admin.settings.store') }}" method="POST" class="flex flex-col gap-6">
                @csrf

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Nama Situs</label>
                    <input type="text" name="site_name" value="{{ $settings['site_name'] ?? '' }}"
                        class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Deskripsi
                        Situs</label>
                    <textarea name="site_description" rows="3"
                        class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">{{ $settings['site_description'] ?? '' }}</textarea>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Teks Footer</label>
                    <input type="text" name="footer_text" value="{{ $settings['footer_text'] ?? '' }}"
                        class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800 mt-2">
                    <button type="submit"
                        class="px-6 py-2.5 rounded-lg bg-primary text-white hover:bg-primary-dark font-sans font-medium shadow-lg shadow-primary/30 transition-all">Simpan
                        Pengaturan</button>
                </div>
            </form>
        </div>
    </div>
@endsection