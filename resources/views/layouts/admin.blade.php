<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Admin Panel')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <!-- Icons -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#137fec",
                        "primary-dark": "#0f66bd",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                    },
                    fontFamily: {
                        "display": ["Newsreader", "serif"],
                        "sans": ["Noto Sans", "sans-serif"]
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .icon-filled {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 overflow-hidden">
    <div class="flex h-screen w-full">
        <!-- Sidebar -->
        <aside
            class="w-64 h-full flex-shrink-0 flex flex-col bg-white dark:bg-[#16202a] border-r border-slate-200 dark:border-slate-800 transition-colors duration-300">
            <div class="h-16 flex items-center px-6 border-b border-slate-100 dark:border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="bg-primary/10 p-2 rounded-lg text-primary">
                        <span class="material-symbols-outlined text-2xl icon-filled">newsmode</span>
                    </div>
                    <h1 class="text-xl font-bold tracking-tight text-slate-900 dark:text-white">Admin Berita</h1>
                </div>
            </div>
            <nav class="flex-1 overflow-y-auto py-4 px-3 flex flex-col gap-1">
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }} group transition-colors"
                    href="{{ route('admin.dashboard') }}">
                    <span
                        class="material-symbols-outlined {{ request()->routeIs('admin.dashboard') ? 'icon-filled' : 'group-hover:text-primary' }} transition-colors">dashboard</span>
                    <span class="text-sm font-medium">Dasbor</span>
                </a>

                <div class="px-3 pt-4 pb-2">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Konten</p>
                </div>

                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.news.*') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }} group transition-colors"
                    href="{{ route('admin.news.index') }}">
                    <span
                        class="material-symbols-outlined {{ request()->routeIs('admin.news.*') ? 'icon-filled' : 'group-hover:text-primary' }} transition-colors">article</span>
                    <span class="text-sm font-medium">Berita</span>
                </a>

                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.categories.*') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }} group transition-colors"
                    href="{{ route('admin.categories.index') }}">
                    <span
                        class="material-symbols-outlined {{ request()->routeIs('admin.categories.*') ? 'icon-filled' : 'group-hover:text-primary' }} transition-colors">category</span>
                    <span class="text-sm font-medium">Kategori</span>
                </a>

                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.comments.*') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }} group transition-colors"
                    href="{{ route('admin.comments.index') }}">
                    <span
                        class="material-symbols-outlined {{ request()->routeIs('admin.comments.*') ? 'icon-filled' : 'group-hover:text-primary' }} transition-colors">comment</span>
                    <span class="text-sm font-medium">Komentar</span>
                </a>

                <div class="px-3 pt-4 pb-2">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Sistem</p>
                </div>

                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }} group transition-colors"
                    href="{{ route('admin.users.index') }}">
                    <span
                        class="material-symbols-outlined {{ request()->routeIs('admin.users.*') ? 'icon-filled' : 'group-hover:text-primary' }} transition-colors">group</span>
                    <span class="text-sm font-medium">Pengguna</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.settings.*') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }} group transition-colors"
                    href="{{ route('admin.settings.index') }}">
                    <span
                        class="material-symbols-outlined {{ request()->routeIs('admin.settings.*') ? 'icon-filled' : 'group-hover:text-primary' }} transition-colors">settings</span>
                    <span class="text-sm font-medium">Pengaturan</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 w-full p-2 rounded-lg hover:bg-red-50 text-slate-600 hover:text-red-600 transition-colors"
                        onclick="return confirm('Logout?')">
                        <div
                            class="h-10 w-10 rounded-full bg-slate-200 dark:bg-slate-700 bg-cover bg-center flex items-center justify-center">
                            <span class="material-symbols-outlined">person</span>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="text-sm font-semibold leading-tight">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-slate-500">Keluar</p>
                        </div>
                        <span class="material-symbols-outlined ml-auto opacity-50">logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-full overflow-hidden relative">
            @yield('content')
        </main>
    </div>
</body>

</html>