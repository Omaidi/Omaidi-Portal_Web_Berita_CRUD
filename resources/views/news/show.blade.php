@extends('layouts.app')

@section('title', $newsItem->title . ' - Portal Berita')

@section('content')
    <div class="grid lg:grid-cols-12 gap-12">

        <!-- Main Content -->
        <article class="lg:col-span-8">
            <header class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <span
                        class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">{{ $newsItem->category }}</span>
                    <span class="text-slate-500 text-sm font-medium">{{ $newsItem->created_at->format('d M Y, H:i') }}
                        WIB</span>
                </div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 leading-tight mb-6">
                    {{ $newsItem->title }}
                </h1>
                <div class="flex items-center gap-3 border-b border-slate-100 pb-8">
                    <div
                        class="w-10 h-10 bg-slate-200 rounded-full flex items-center justify-center text-slate-500 font-bold text-lg">
                        {{ substr($newsItem->author ?? 'A', 0, 1) }}
                    </div>
                    <div>
                        <p class="font-semibold text-slate-900 text-sm">{{ $newsItem->author ?? 'Admin' }}</p>
                        <p class="text-xs text-slate-500">Penulis</p>
                    </div>
                </div>
            </header>

            <figure class="mb-10 rounded-xl overflow-hidden shadow-sm">
                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}"
                    class="w-full h-auto object-cover">
                @if($newsItem->brief_overview)
                    <figcaption class="mt-2 text-center text-slate-500 text-sm italic py-2 bg-slate-50">
                        {{ $newsItem->brief_overview }}
                    </figcaption>
                @endif
            </figure>

            <div class="prose prose-lg prose-slate max-w-none mb-12 text-slate-700 leading-relaxed">
                {!! nl2br(e($newsItem->content)) !!}
            </div>

            <!-- Share / Tags (Placeholder) -->
            <div class="flex items-center justify-between border-t border-b border-slate-100 py-6 mb-12">
                <div class="flex gap-2">
                    <span class="text-slate-500 font-medium">Bagikan:</span>
                    <!-- Social icons placeholders -->
                    <button class="text-slate-400 hover:text-[#1877F2] transition-colors"><span
                            class="material-symbols-outlined">share</span></button>
                </div>
            </div>

            <!-- Comments Section -->
            <section id="comments" class="bg-slate-50 rounded-2xl p-6 md:p-8">
                <h3 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                    Komentar <span
                        class="bg-slate-200 text-slate-600 text-sm py-0.5 px-2 rounded-full">{{ $newsItem->comments->count() }}</span>
                </h3>

                <!-- Comment Form -->
                <form action="{{ route('news.comment.store', $newsItem->id) }}" method="POST"
                    class="mb-10 bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                    @csrf
                    <h4 class="text-lg font-bold text-slate-800 mb-4">Tulis Komentar</h4>
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div class="flex flex-col gap-1.5">
                            <label class="text-sm font-semibold text-slate-600">Nama</label>
                            <input type="text" name="name" required
                                class="px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                                placeholder="Nama Anda">
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label class="text-sm font-semibold text-slate-600">Email</label>
                            <input type="email" name="email" required
                                class="px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                                placeholder="email@contoh.com">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5 mb-4">
                        <label class="text-sm font-semibold text-slate-600">Komentar</label>
                        <textarea name="content" rows="4" required
                            class="px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                            placeholder="Tulis pendapat Anda disini..."></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-primary text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-primary-dark transition-colors shadow-lg shadow-primary/30">Kirim
                            Komentar</button>
                    </div>
                </form>

                <!-- Comment List -->
                <div class="space-y-6">
                    @forelse($newsItem->comments as $comment)
                        <div class="flex gap-4">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-slate-200 rounded-full flex items-center justify-center font-bold text-slate-500">
                                {{ substr($comment->name, 0, 1) }}
                            </div>
                            <div class="flex-grow">
                                <div class="bg-white p-4 rounded-xl rounded-tl-none border border-slate-200 shadow-sm">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <h5 class="font-bold text-slate-800">{{ $comment->name }}</h5>
                                            <span
                                                class="text-xs text-slate-500">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <p class="text-slate-600 text-sm leading-relaxed">{{ $comment->content }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-slate-500 py-8 italic">Belum ada komentar. Jadilah yang pertama berkomentar!
                        </p>
                    @endforelse
                </div>
            </section>
        </article>

        <!-- Sidebar -->
        <aside class="lg:col-span-4 space-y-8">
            <!-- Categories Widget -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                <h3 class="font-bold text-lg text-slate-800 mb-4 pb-2 border-b border-slate-100">Kategori</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($categories as $category)
                        <a href="#"
                            class="bg-slate-50 hover:bg-primary hover:text-white text-slate-600 text-sm px-3 py-1.5 rounded-lg transition-all border border-slate-200 hover:border-primary">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Recent News Widget -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                <h3 class="font-bold text-lg text-slate-800 mb-6 pb-2 border-b border-slate-100">Berita Terpopuler</h3>
                <div class="space-y-6">
                    @foreach($recentNews as $news)
                        <div class="flex gap-4 group">
                            <div class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden relative">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform">
                            </div>
                            <div>
                                <h4
                                    class="text-sm font-bold text-slate-800 leading-snug mb-1 group-hover:text-primary transition-colors">
                                    <a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a>
                                </h4>
                                <span class="text-xs text-slate-400">{{ $news->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </aside>

    </div>
@endsection