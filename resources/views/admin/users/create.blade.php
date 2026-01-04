@extends('layouts.admin')

@section('title', 'Tambah Pengguna - Admin Panel')

@section('content')
    <header
        class="flex-shrink-0 px-8 py-6 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-background-light dark:bg-background-dark z-10">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Tambah Pengguna</h2>
            <p class="text-slate-500 dark:text-slate-400 font-sans text-sm">Buat akun pengguna baru.</p>
        </div>
        <a href="{{ route('admin.users.index') }}"
            class="flex items-center justify-center gap-2 bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 px-5 py-2.5 rounded-lg transition-all">
            <span class="material-symbols-outlined text-[20px]">arrow_back</span>
            <span class="text-sm font-sans font-medium">Kembali</span>
        </a>
    </header>

    <div class="flex-1 overflow-auto px-8 pb-8">
        <div
            class="bg-white dark:bg-[#16202a] p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm max-w-lg">
            <form action="{{ route('admin.users.store') }}" method="POST" class="flex flex-col gap-6">
                @csrf
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                    @error('email')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Password</label>
                    <input type="password" name="password" required
                        class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                    @error('password')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Konfirmasi
                        Password</label>
                    <input type="password" name="password_confirmation" required
                        class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800 mt-2">
                    <a href="{{ route('admin.users.index') }}"
                        class="px-6 py-2.5 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-50 font-sans font-medium transition-colors">Batal</a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-lg bg-primary text-white hover:bg-primary-dark font-sans font-medium shadow-lg shadow-primary/30 transition-all">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection