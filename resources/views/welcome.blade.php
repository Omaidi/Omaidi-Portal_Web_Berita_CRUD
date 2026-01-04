@extends('layouts.app')

@section('title', 'Beranda - Portal Berita')

@section('content')

    <!-- Hero / Headline Section (Latest News) -->
    @if($latestNews->count() > 0)
        @php $featured = $latestNews->first(); @endphp
        <section class="mb-16">
            <div class="relative rounded-2xl overflow-hidden shadow-2xl group h-[500px]">
                <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-80 decoration-clone">
                </div>
                <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full md:w-2/3 flex flex-col gap-4">
                    <span
                        class="inline-block bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-full w-fit uppercase tracking-wider">{{ $featured->category }}</span>
                    <h2 class="text-3xl md:text-5xl font-bold text-white leading-tight">
                        <a href="{{ route('news.show', $featured->slug) }}"
                            class="hover:underline decoration-primary decoration-4 underline-offset-4">
                            {{ $featured->title }}
                        </a>
                    </h2>
                    <p class="text-slate-200 text-lg line-clamp-2 md:line-clamp-3 leading-relaxed">
                        {{ $featured->brief_overview ?? Str::limit(strip_tags($featured->content), 150) }}
                    </p>
                    <div class="flex items-center gap-4 text-slate-300 text-sm mt-2">
                        <span>{{ $featured->author ?? 'Redaksi' }}</span>
                        <span>&bull;</span>
                        <span>{{ $featured->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- News Per Topic Section -->
    <section class="space-y-16">
        <div class="flex items-center justify-between mb-8 border-b border-gray-200 pb-4">
            <h3 class="text-2xl font-bold text-slate-900 flex items-center gap-2">
                <span class="w-2 h-8 bg-primary rounded-full"></span>
                Berita Per Topik
            </h3>
        </div>

        @if(count($newsPerCategory) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($newsPerCategory as $item)
                    <article
                        class="flex flex-col h-full bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-lg transition-all duration-300 group">
                        <!-- Category Badge (Top Right) -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $item['news']->image) }}" alt="{{ $item['news']->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div
                                class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-slate-800 shadow-sm border border-slate-100">
                                {{ $item['category']->name }}
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 mb-3 text-xs text-slate-500 font-medium font-sans">
                                <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                                {{ $item['news']->created_at->format('d M Y') }}
                            </div>

                            <h4
                                class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-primary transition-colors">
                                <a href="{{ route('news.show', $item['news']->slug) }}" class="line-clamp-2">
                                    {{ $item['news']->title }}
                                </a>
                            </h4>

                            <p class="text-slate-600 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                                {{ $item['news']->brief_overview ?? Str::limit(strip_tags($item['news']->content), 120) }}
                            </p>

                            <a href="{{ route('news.show', $item['news']->slug) }}"
                                class="inline-flex items-center text-primary font-bold text-sm hover:gap-1.5 transition-all">
                                Baca Selengkapnya <span class="material-symbols-outlined text-[18px] ml-1">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 bg-slate-50 rounded-xl border border-dashed border-slate-300">
                <span class="material-symbols-outlined text-4xl text-slate-400 mb-2">newspaper</span>
                <p class="text-slate-500 font-medium">Belum ada berita yang dipublikasikan per kategori.</p>
            </div>
        @endif
    </section>

@endsection