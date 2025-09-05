@extends('layouts.app')

@section('pagetitle', __('pages.login'))

@section('content')
    <main class="min-h-100">
        <section class="max-w-screen-lg mx-auto px-5 py-30">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="flex justify-center">
                <div class="max-w-100">
                    <h1 class="font-medium text-2xl text-white pb-10">
                        {{ __('pages.login') }}
                    </h1>
                    <form class="max-w-screen mx-auto flex flex-col gap-5" method="POST" action="{{ route('login') }}">
                        @csrf
                        @method('POST')
                        <div>
                            <label for="email" class="block mb-2 font-medium text-white">
                                {{ __('forms.email') }}
                            </label>
                            <input type="text" id="email" name="email" value="{{ old('email') }}" required
                                autofocus autocomplete="username"
                                class="bg-gray-700 border-0 focus:outline-gray-300 text-white block w-100 px-4 py-3" />
                            @error('email')
                                <span class="text-red-500 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 font-medium text-white">
                                {{ __('forms.password') }}
                            </label>
                            <input type="password" id="password" name="password" autocomplete="current-password"
                                class="bg-gray-700 border-0 focus:outline-gray-300 text-white block w-100 px-4 py-3" />
                            @error('password')
                                <span class="text-red-500 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="dark:bg-gray-700 border-0 dark:border-0 focus:ring-0 dark:focus:ring-0 size-5"
                                    name="remember">
                                <span class="ms-3 text-md font-medium text-white">
                                    {{ __('forms.rememberMe') }}
                                </span>
                            </label>
                        </div>
                        <button type="submit"
                            class="button bg-button-color hover:bg-secondary-color text-white font-medium text-md w-fit px-8 py-4 text-center mt-5 cursor-pointer">
                            {{ __('forms.login') }}
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
