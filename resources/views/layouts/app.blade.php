<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Berita')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#0f172a',
                            dark: '#020617',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen text-slate-800">

    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="bg-primary text-white p-1.5 rounded-lg">
                    <span class="material-symbols-outlined text-[24px]">newspaper</span>
                </div>
                <span class="text-xl font-bold tracking-tight text-slate-900">Portal<span
                        class="text-primary">News</span></span>
            </a>

            <nav class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}"
                    class="text-sm font-medium text-slate-700 hover:text-primary transition-colors">Beranda</a>
                @foreach(\App\Models\Category::all() as $category)
                    <a href="{{ route('category.show', $category->slug) }}"
                        class="text-sm font-medium text-slate-700 hover:text-primary transition-colors {{ request()->routeIs('category.show') && request('slug') == $category->slug ? 'text-primary font-bold' : '' }}">{{ $category->name }}</a>
                @endforeach
            </nav>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-sm font-medium text-slate-700 hover:text-primary transition-colors">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-medium text-slate-700 hover:text-primary transition-colors px-4 py-2 border rounded-full hover:bg-slate-50">Masuk</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-12 mt-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-2">
                    <span class="text-xl font-bold tracking-tight text-slate-900">Portal<span
                            class="text-primary">News</span></span>
                </div>
                <p class="text-slate-500 text-sm">
                    &copy; {{ date('Y') }} Portal Berita. All rights reserved.
                    @if(\App\Models\Setting::where('key', 'footer_text')->exists())
                        {{ \App\Models\Setting::where('key', 'footer_text')->value('value') }}
                    @endif
                </p>
            </div>
        </div>
    </footer>

</body>

</html>