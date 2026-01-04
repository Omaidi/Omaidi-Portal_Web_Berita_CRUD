<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Dasbor Admin - Manajemen Kategori</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#137fec",
                        "primary-dark": "#0f65bd",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                        "surface-light": "#ffffff",
                        "surface-dark": "#1a2632",
                    },
                    fontFamily: {
                        "display": ["Newsreader", "serif"],
                        "body": ["Noto Sans", "sans-serif"],
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
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
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display antialiased overflow-hidden">
<div class="flex h-screen w-full overflow-hidden">
<!-- Sidebar -->
<aside class="w-64 flex-shrink-0 border-r border-slate-200 dark:border-slate-800 bg-surface-light dark:bg-surface-dark flex flex-col transition-all duration-300 hidden md:flex">
<div class="h-16 flex items-center px-6 border-b border-slate-100 dark:border-slate-800/50">
<div class="flex items-center gap-3">
<div class="size-8 rounded-lg bg-primary flex items-center justify-center text-white">
<span class="material-symbols-outlined text-xl">newspaper</span>
</div>
<div class="flex flex-col">
<h1 class="text-base font-bold leading-none tracking-tight">Admin Panel</h1>
<p class="text-slate-500 dark:text-slate-400 text-xs mt-1">Berita App</p>
</div>
</div>
</div>
<div class="flex-1 overflow-y-auto py-6 px-3 space-y-1">
<div class="px-3 py-2 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</div>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors group" href="#">
<span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-primary transition-colors">pie_chart</span>
<span class="text-sm font-medium">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors group" href="#">
<span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-primary transition-colors">article</span>
<span class="text-sm font-medium">Berita</span>
</a>
<!-- Active State -->
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary dark:text-primary-400 border border-primary/10 transition-colors" href="#">
<span class="material-symbols-outlined icon-filled">category</span>
<span class="text-sm font-bold">Kategori</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors group" href="#">
<span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-primary transition-colors">forum</span>
<span class="text-sm font-medium">Komentar</span>
</a>
<div class="px-3 py-2 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 mt-6">Sistem</div>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors group" href="#">
<span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-primary transition-colors">settings</span>
<span class="text-sm font-medium">Pengaturan</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors group" href="#">
<span class="material-symbols-outlined text-slate-500 dark:text-slate-400 group-hover:text-primary transition-colors">group</span>
<span class="text-sm font-medium">Pengguna</span>
</a>
</div>
<div class="p-4 border-t border-slate-200 dark:border-slate-800">
<div class="flex items-center gap-3">
<div class="size-10 rounded-full bg-slate-200 dark:bg-slate-700 bg-cover bg-center" data-alt="Portrait of admin user" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAYLi72U5u7ATJ-HThHo6lsUiVAmIAfX9yNX1eKtIBUt3RvkzKW8ncXv5utcwGJXcPwzwIHPyHek6DZoTpepSEsGBDvN_teoleqtui74W53_WvmKd0ya_ayJLBonXYAVjYkQi-HNQEnWAyOziYYr-tZaXgkqdk8q0kxJtjJwax2UnBHGTDwRV1CpgyJu4LoQyS7rzpzLfpohCF07Z4x73tdgY6wHhCbJIXgZ_0k8LM3AAdkhuZ_P1ADF4_CHIaNVZTNZvQM1gM_cC4');"></div>
<div class="flex flex-col overflow-hidden">
<p class="text-sm font-bold truncate">Budi Santoso</p>
<p class="text-xs text-slate-500 dark:text-slate-400 truncate">Administrator</p>
</div>
<button class="ml-auto text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
<span class="material-symbols-outlined text-[20px]">logout</span>
</button>
</div>
</div>
</aside>
<!-- Main Content -->
<main class="flex-1 flex flex-col h-full overflow-hidden relative">
<!-- Header / Breadcrumbs -->
<header class="h-16 flex items-center justify-between px-6 md:px-10 border-b border-slate-200 dark:border-slate-800 bg-surface-light/80 dark:bg-surface-dark/80 backdrop-blur-md sticky top-0 z-10">
<div class="flex items-center gap-2 text-sm">
<a class="text-slate-500 hover:text-primary transition-colors" href="#">Dashboard</a>
<span class="text-slate-400">/</span>
<span class="font-medium text-slate-900 dark:text-white">Kategori</span>
</div>
<div class="md:hidden">
<button class="p-2 text-slate-600 dark:text-slate-300">
<span class="material-symbols-outlined">menu</span>
</button>
</div>
</header>
<!-- Scrollable Content -->
<div class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-6 md:p-10">
<div class="max-w-6xl mx-auto space-y-8">
<!-- Page Heading & Actions -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div class="flex flex-col gap-2 max-w-2xl">
<h1 class="text-3xl md:text-4xl font-bold tracking-tight text-slate-900 dark:text-white">Manajemen Kategori</h1>
<p class="text-slate-500 dark:text-slate-400 text-base md:text-lg leading-relaxed font-body">
                            Kelola struktur kategori untuk berita yang ditampilkan di halaman pengguna. Anda dapat menambah, mengubah, atau menghapus kategori berita.
                        </p>
</div>
<button class="flex items-center justify-center gap-2 bg-primary hover:bg-primary-dark text-white px-5 py-2.5 rounded-lg shadow-sm shadow-blue-500/20 transition-all active:scale-95 font-medium whitespace-nowrap">
<span class="material-symbols-outlined text-[20px]">add_circle</span>
<span>Tambah Kategori</span>
</button>
</div>
<!-- Filters & Toolbar -->
<div class="bg-surface-light dark:bg-surface-dark p-4 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col md:flex-row gap-4 items-center justify-between">
<!-- Search -->
<div class="w-full md:w-96 relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-slate-400">search</span>
</div>
<input class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-slate-700 rounded-lg leading-5 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary font-body sm:text-sm transition-shadow" placeholder="Cari nama kategori atau slug..." type="text"/>
</div>
<!-- Filter Actions -->
<div class="flex items-center gap-3 w-full md:w-auto">
<div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 whitespace-nowrap">
<span class="font-medium text-slate-700 dark:text-slate-200">Urutkan:</span>
<select class="bg-transparent border-none p-0 pr-6 text-sm font-bold text-slate-900 dark:text-white focus:ring-0 cursor-pointer font-body">
<option>Terbaru</option>
<option>Nama (A-Z)</option>
<option>Jumlah Berita</option>
</select>
</div>
</div>
</div>
<!-- Data Table -->
<div class="bg-surface-light dark:bg-surface-dark rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden flex flex-col">
<div class="overflow-x-auto">
<table class="min-w-full divide-y divide-slate-200 dark:divide-slate-800">
<thead class="bg-slate-50 dark:bg-slate-800/50">
<tr>
<th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-20" scope="col">ID</th>
<th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider" scope="col">Nama Kategori</th>
<th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider" scope="col">Slug</th>
<th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider" scope="col">Jumlah Berita</th>
<th class="px-6 py-4 text-right text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-32" scope="col">Aksi</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-200 dark:divide-slate-800">
<!-- Row 1 -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-400 dark:text-slate-500 font-body">001</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="size-8 rounded bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 flex items-center justify-center mr-3">
<span class="material-symbols-outlined text-[18px]">devices</span>
</div>
<div class="text-sm font-bold text-slate-900 dark:text-white">Teknologi</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-body font-mono">
                                            teknologi
                                        </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400 font-body">
<span class="font-bold text-slate-700 dark:text-slate-200">150</span> Berita
                                    </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<div class="flex items-center justify-end gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
<button class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Hapus">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-400 dark:text-slate-500 font-body">002</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="size-8 rounded bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 flex items-center justify-center mr-3">
<span class="material-symbols-outlined text-[18px]">gavel</span>
</div>
<div class="text-sm font-bold text-slate-900 dark:text-white">Politik</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-body font-mono">
                                            politik
                                        </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400 font-body">
<span class="font-bold text-slate-700 dark:text-slate-200">89</span> Berita
                                    </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<div class="flex items-center justify-end gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
<button class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Hapus">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-400 dark:text-slate-500 font-body">003</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="size-8 rounded bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mr-3">
<span class="material-symbols-outlined text-[18px]">sports_soccer</span>
</div>
<div class="text-sm font-bold text-slate-900 dark:text-white">Olahraga</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-body font-mono">
                                            olahraga
                                        </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400 font-body">
<span class="font-bold text-slate-700 dark:text-slate-200">210</span> Berita
                                    </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<div class="flex items-center justify-end gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
<button class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Hapus">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-400 dark:text-slate-500 font-body">004</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="size-8 rounded bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 flex items-center justify-center mr-3">
<span class="material-symbols-outlined text-[18px]">trending_up</span>
</div>
<div class="text-sm font-bold text-slate-900 dark:text-white">Ekonomi</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-body font-mono">
                                            ekonomi
                                        </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400 font-body">
<span class="font-bold text-slate-700 dark:text-slate-200">120</span> Berita
                                    </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<div class="flex items-center justify-end gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
<button class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Hapus">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-400 dark:text-slate-500 font-body">005</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="size-8 rounded bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 flex items-center justify-center mr-3">
<span class="material-symbols-outlined text-[18px]">movie</span>
</div>
<div class="text-sm font-bold text-slate-900 dark:text-white">Hiburan</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-body font-mono">
                                            hiburan
                                        </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400 font-body">
<span class="font-bold text-slate-700 dark:text-slate-200">95</span> Berita
                                    </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<div class="flex items-center justify-end gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
<button class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Hapus">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between">
<div class="text-sm text-slate-500 dark:text-slate-400 font-body hidden sm:block">
                            Menampilkan <span class="font-semibold text-slate-900 dark:text-white">1</span> sampai <span class="font-semibold text-slate-900 dark:text-white">5</span> dari <span class="font-semibold text-slate-900 dark:text-white">12</span> hasil
                        </div>
<div class="flex items-center gap-2 w-full sm:w-auto justify-between sm:justify-end">
<button class="px-4 py-2 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" disabled="">
                                Sebelumnya
                            </button>
<button class="px-4 py-2 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                                Selanjutnya
                            </button>
</div>
</div>
</div>
<!-- Footer info (Optional visual filler) -->
<div class="text-center text-xs text-slate-400 dark:text-slate-600 py-4 font-body">
                    © 2024 Berita App Admin Panel. v1.0.2
                </div>
</div>
</div>
</main>
</div>
</body></html>