@extends('layouts.admin')

@section('title', 'Kategori Berita - Admin Panel')

@section('content')
    <header
        class="flex-shrink-0 px-8 py-6 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-background-light dark:bg-background-dark z-10">
        <div class="flex flex-col gap-1">
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Kategori Berita</h2>
            <p class="text-slate-500 dark:text-slate-400 font-sans text-sm">Kelola kategori untuk pengelompokan berita.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}"
            class="flex items-center justify-center gap-2 bg-primary hover:bg-primary-dark text-white px-5 py-2.5 rounded-lg shadow-lg shadow-primary/30 transition-all active:scale-95">
            <span class="material-symbols-outlined text-[20px]">add_circle</span>
            <span class="text-sm font-sans font-medium">Tambah Kategori</span>
        </a>
    </header>

    <div class="flex-1 overflow-hidden px-8 pb-8">
        <div
            class="h-full flex flex-col bg-white dark:bg-[#16202a] rounded-xl shadow-sm border border-slate-200 dark:border-slate-800">
            <div class="flex-1 overflow-auto w-full">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 sticky top-0 z-10">
                        <tr>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[40%]">
                                Nama Kategori</th>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[40%]">
                                Slug</th>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 text-right w-[20%]">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                        @forelse($categories as $category)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors group">
                                <td class="px-6 py-4">
                                    <p class="text-base font-semibold text-slate-900 dark:text-white">{{ $category->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <code
                                        class="text-sm text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">{{ $category->slug }}</code>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors"
                                            title="Edit">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus kategori ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors"
                                                title="Hapus">
                                                <span class="material-symbols-outlined text-[20px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-slate-500 dark:text-slate-400 font-sans">
                                    Belum ada kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection