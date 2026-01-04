@extends('layouts.admin')

@section('title', 'Komentar - Admin Panel')

@section('content')
    <header
        class="flex-shrink-0 px-8 py-6 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-background-light dark:bg-background-dark z-10">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Komentar</h2>
            <p class="text-slate-500 dark:text-slate-400 font-sans text-sm">Kelola komentar masuk pada berita.</p>
        </div>
    </header>

    <div class="flex-1 overflow-hidden px-8 pb-8">
        <div
            class="h-full flex flex-col bg-white dark:bg-[#16202a] rounded-xl shadow-sm border border-slate-200 dark:border-slate-800">
            <div class="flex-1 overflow-auto w-full">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 sticky top-0 z-10">
                        <tr>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[20%]">
                                Pengirim</th>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[50%]">
                                Isi Komentar</th>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[20%]">
                                Berita</th>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 text-right w-[10%]">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                        @forelse($comments as $comment)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors group">
                                <td class="px-6 py-4">
                                    <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ $comment->name }}</p>
                                    <p class="text-xs text-slate-500">{{ $comment->email }}</p>
                                    <p class="text-xs text-slate-400 mt-1">{{ $comment->created_at->diffForHumans() }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-slate-600 dark:text-slate-300">
                                        {{ Str::limit($comment->content, 100) }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.news.edit', $comment->news_id) }}"
                                        class="text-sm text-primary hover:underline line-clamp-1">
                                        {{ $comment->news->title ?? 'Berita dihapus' }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus komentar ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors"
                                            title="Hapus">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-slate-500 dark:text-slate-400 font-sans">
                                    Belum ada komentar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection