@extends('layouts.admin')

@section('title', 'Edit Berita - Admin Panel')

@section('content')
    <header
        class="flex-shrink-0 px-8 py-6 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-background-light dark:bg-background-dark z-10 transition-colors duration-300">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Edit Berita</h2>
            <p class="text-slate-500 dark:text-slate-400 font-sans text-sm">Perbarui konten artikel berita.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center justify-center gap-2 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 px-5 py-2.5 rounded-lg transition-all">
            <span class="material-symbols-outlined text-[20px]">arrow_back</span>
            <span class="text-sm font-sans font-medium">Kembali</span>
        </a>
    </header>

    <div class="flex-1 overflow-auto px-8 pb-8">
        <div
            class="bg-white dark:bg-[#16202a] p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm max-w-4xl transition-colors duration-300">
            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Judul
                            Berita</label>
                        <input type="text" name="title" value="{{ old('title', $news->title) }}" required
                            class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Kategori</label>
                        <select name="category"
                            class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            @foreach($categories as $category)
                                <option value="{{ $category->name }}" {{ $news->category == $category->name ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Konten Berita</label>
                    <textarea name="content" rows="10" required
                        class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">{{ old('content', $news->content) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Gambar
                            Unggulan</label>
                        @if($news->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $news->image) }}"
                                    class="h-24 w-auto rounded-lg object-cover border border-slate-200 dark:border-slate-700">
                            </div>
                        @endif
                        <input type="file" name="image" accept="image/*"
                            class="font-sans block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-all">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 font-sans">Status
                            Publikasi</label>
                        <select name="status"
                            class="font-sans px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            <option value="draft" {{ $news->status == 'draft' ? 'selected' : '' }}>Draft (Simpan sebagai
                                konsep)</option>
                            <option value="published" {{ $news->status == 'published' ? 'selected' : '' }}>Published
                                (Tayangkan sekarang)</option>
                            <option value="archived" {{ $news->status == 'archived' ? 'selected' : '' }}>Archived (Arsipkan)
                            </option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800 mt-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 font-sans font-medium transition-colors">Batal</a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-lg bg-primary text-white hover:bg-primary-dark font-sans font-medium shadow-lg shadow-primary/30 transition-all">Perbarui
                        Berita</button>
                </div>

            </form>
        </div>
    </div>
@endsection