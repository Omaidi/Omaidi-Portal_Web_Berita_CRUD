@extends('layouts.admin')

@section('title', 'Daftar Berita - Admin Panel')

@section('content')
    <header
        class="flex-shrink-0 px-8 py-6 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-background-light dark:bg-background-dark z-10">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Daftar Berita</h2>
            <p class="text-slate-500 dark:text-slate-400 font-sans text-sm">Kelola semua berita yang ada.</p>
        </div>
        <a href="{{ route('admin.news.create') }}"
            class="flex items-center justify-center gap-2 bg-primary text-white hover:bg-primary-dark px-5 py-2.5 rounded-lg shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5">
            <span class="material-symbols-outlined text-[20px]">add_circle</span>
            <span class="text-sm font-sans font-medium">Tambah Berita</span>
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
                                class="px-6 py-4 text-xs font-bold font-sans text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[40%]">
                                Judul</th>
                            <th
                                class="px-6 py-4 text-xs font-bold font-sans text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[15%]">
                                Kategori</th>
                            <th
                                class="px-6 py-4 text-xs font-bold font-sans text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[15%]">
                                Tanggal</th>
                            <th
                                class="px-6 py-4 text-xs font-bold font-sans text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[15%]">
                                Status</th>
                            <th
                                class="px-6 py-4 text-xs font-bold font-sans text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 text-right w-[15%]">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                        @forelse($news as $item)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        @if($item->image)
                                            <div class="h-10 w-14 rounded bg-cover bg-center flex-shrink-0"
                                                style="background-image: url('{{ asset('storage/' . $item->image) }}')"></div>
                                        @endif
                                        <span
                                            class="font-semibold text-slate-700 dark:text-slate-200 font-sans block line-clamp-2">{{ $item->title }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                        {{ $item->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="text-sm text-slate-600 dark:text-slate-300 font-sans block">{{ $item->created_at->format('d M Y') }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="text-xs font-bold capitalize {{ $item->status == 'published' ? 'text-green-600' : 'text-slate-500' }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.news.edit', $item->id) }}"
                                            class="p-2 text-slate-400 hover:text-primary hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-lg transition-colors"
                                            title="Edit">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </a>
                                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus berita ini?');" class="inline">
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
                                <td colspan="5" class="px-6 py-4 text-center text-slate-500 dark:text-slate-400 font-sans">
                                    Belum ada berita.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection