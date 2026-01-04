@extends('layouts.app')

@section('title', $category->name . ' - Portal Berita')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-10 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-primary/10 text-primary text-sm font-bold mb-4 uppercase tracking-wider">Kategori</span>
            <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-4">{{ $category->name }}</h1>
            <p class="text-slate-500 max-w-2xl mx-auto">Menampilkan berita terkini seputar
                {{ strtolower($category->name) }}.</p>
        </div>

        <!-- News Grid -->
        @if($news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $item)
                    <article
                        class="flex flex-col h-full bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-lg transition-all duration-300 group">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 mb-3 text-xs text-slate-500 font-medium font-sans">
                                <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                                {{ $item->created_at->format('d M Y') }}
                            </div>

                            <h4
                                class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-primary transition-colors">
                                <a href="{{ route('news.show', $item->slug) }}" class="line-clamp-2">
                                    {{ $item->title }}
                                </a>
                            </h4>

                            <p class="text-slate-600 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                                {{ $item->brief_overview ?? Str::limit(strip_tags($item->content), 120) }}
                            </p>

                            <a href="{{ route('news.show', $item->slug) }}"
                                class="inline-flex items-center text-primary font-bold text-sm hover:gap-1.5 transition-all">
                                Baca Selengkapnya <span class="material-symbols-outlined text-[18px] ml-1">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $news->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-slate-50 rounded-xl border border-dashed border-slate-300">
                <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">article_off</span>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Berita</h3>
                <p class="text-slate-500">Maaf, belum ada artikel berita untuk kategori ini saat ini.</p>
                <a href="{{ route('home') }}" class="inline-flex items-center mt-6 text-primary hover:underline">
                    <span class="material-symbols-outlined text-[20px] mr-1">arrow_back</span> Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
@endsection