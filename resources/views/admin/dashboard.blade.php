@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')

@section('content')
    <!-- Top Header Area -->
    <header
        class="flex-shrink-0 px-8 py-6 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-background-light dark:bg-background-dark z-10 transition-colors duration-300">
        <div class="flex flex-col gap-1">
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Manajemen Berita</h2>
            <p class="text-slate-500 dark:text-slate-400 font-sans text-sm">Kelola semua artikel berita, status publikasi,
                dan kategori.</p>
        </div>
        <a href="{{ route('admin.news.create') }}"
            class="flex items-center justify-center gap-2 bg-primary hover:bg-primary-dark text-white px-5 py-2.5 rounded-lg shadow-lg shadow-primary/30 transition-all active:scale-95">
            <span class="material-symbols-outlined text-[20px]">add_circle</span>
            <span class="text-sm font-sans font-medium">Tambah Berita</span>
        </a>
    </header>

    <!-- Filters & Actions Bar -->
    <div class="flex-shrink-0 px-8 pb-6">
        <div
            class="bg-white dark:bg-[#16202a] p-1.5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col lg:flex-row items-center gap-2 transition-colors duration-300">
            <!-- Search -->
            <form action="{{ route('admin.dashboard') }}" method="GET" class="relative w-full lg:max-w-md group">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span
                        class="material-symbols-outlined text-slate-400 group-focus-within:text-primary transition-colors">search</span>
                </div>
                <input name="search" value="{{ request('search') }}"
                    class="block w-full pl-10 pr-3 py-2.5 border-none rounded-lg bg-transparent text-slate-900 dark:text-white placeholder-slate-400 focus:ring-0 font-sans text-sm"
                    placeholder="Cari judul berita..." type="text" />
            </form>
            <div class="h-8 w-px bg-slate-200 dark:bg-slate-700 hidden lg:block mx-1"></div>
            <!-- Category Chips Scrollable Area -->
            <div class="flex-1 w-full overflow-x-auto no-scrollbar flex items-center gap-2 px-2 lg:px-0 py-2 lg:py-0">
                <a href="{{ route('admin.dashboard', ['search' => request('search')]) }}"
                    class="flex-shrink-0 px-4 py-1.5 rounded-full {{ !request('category') ? 'bg-primary/10 text-primary border border-primary/20' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 border border-transparent' }} text-sm font-sans font-medium transition-colors">
                    Semua
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('admin.dashboard', ['category' => $category->name, 'search' => request('search')]) }}"
                        class="flex-shrink-0 px-4 py-1.5 rounded-full {{ request('category') == $category->name ? 'bg-primary/10 text-primary border border-primary/20' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 border border-transparent' }} text-sm font-sans font-medium transition-colors">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Table Container -->
    <div class="flex-1 overflow-hidden px-8 pb-8">
        <div
            class="h-full flex flex-col bg-white dark:bg-[#16202a] rounded-xl shadow-sm border border-slate-200 dark:border-slate-800 transition-colors duration-300">
            <!-- Table Header & Content -->
            <div class="flex-1 overflow-auto w-full">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 sticky top-0 z-10">
                        <tr>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[40%]">
                                Judul Berita</th>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[15%]">
                                Kategori</th>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[15%]">
                                Tanggal</th>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 w-[15%]">
                                Status</th>
                            <th
                                class="px-6 py-4 text-xs font-sans font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-800 text-right w-[15%]">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                        @forelse($news as $item)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="h-12 w-16 rounded-lg bg-cover bg-center bg-slate-200 flex-shrink-0 overflow-hidden"
                                            style='background-image: url("{{ $item->image ? asset("storage/" . $item->image) : "https://via.placeholder.com/150" }}");'>
                                        </div>
                                        <div class="flex flex-col">
                                            <p
                                                class="text-base font-semibold text-slate-900 dark:text-white line-clamp-2 leading-snug">
                                                {{ $item->title }}
                                            </p>
                                            <p class="text-xs text-slate-500 mt-1 font-sans">Oleh: {{ $item->author }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 font-sans">
                                        {{ $item->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-slate-600 dark:text-slate-400 font-sans">
                                        {{ $item->created_at->format('d M Y') }}</p>
                                    <p class="text-xs text-slate-400 font-sans">{{ $item->created_at->format('H:i') }} WIB</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="h-2 w-2 rounded-full {{ $item->status == 'published' ? 'bg-green-500' : 'bg-slate-400' }}"></span>
                                        <span
                                            class="text-sm font-medium text-slate-700 dark:text-slate-300 font-sans capitalize">{{ $item->status }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('admin.news.edit', $item->id) }}"
                                            class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors"
                                            title="Edit">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </a>
                                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');"
                                            class="inline">
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
                                    Belum ada berita yang ditambahkan.
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