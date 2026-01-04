@extends('layouts.app')

@section('title', 'Login - Portal Berita')

@section('content')
    <div class="flex items-center justify-center min-h-[60vh] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-2xl shadow-xl border border-slate-100">
            <div>
                <div class="flex justify-center mb-2">
                    <div class="bg-primary/10 p-3 rounded-xl">
                        <span class="material-symbols-outlined text-4xl text-primary">lock</span>
                    </div>
                </div>
                <h2 class="mt-4 text-center text-3xl font-extrabold text-slate-900 tracking-tight">
                    Masuk ke Akun
                </h2>
                <p class="mt-2 text-center text-sm text-slate-600">
                    Silahkan masuk untuk mengakses dashboard admin.
                </p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm flex gap-2 items-start"
                    role="alert">
                    <span class="material-symbols-outlined text-[18px] mt-0.5">error</span>
                    <div>
                        <strong class="font-bold">Oops!</strong>
                        <span class="block">{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="email-address" class="block text-sm font-medium text-slate-700 mb-1">Email
                            Address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="appearance-none relative block w-full px-4 py-3 border border-slate-300 placeholder-slate-400 text-slate-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary focus:z-10 sm:text-sm transition-all"
                            placeholder="admin@portal.com" value="{{ old('email') }}">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="appearance-none relative block w-full px-4 py-3 border border-slate-300 placeholder-slate-400 text-slate-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary focus:z-10 sm:text-sm transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox"
                            class="h-4 w-4 text-primary focus:ring-primary border-slate-300 rounded cursor-pointer">
                        <label for="remember-me" class="ml-2 block text-sm text-slate-600 cursor-pointer">
                            Ingat saya
                        </label>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary shadow-lg shadow-primary/30 transition-all hover:-translate-y-0.5">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <span
                                class="material-symbols-outlined text-primary-dark group-hover:text-white transition-colors">login</span>
                        </span>
                        Masuk Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection