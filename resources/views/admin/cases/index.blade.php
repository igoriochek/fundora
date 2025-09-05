<x-admin-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            {{ __('pages.cases') }}
            <div class="flex items-center gap-3">
                <x-secondary-button type="button">
                    <a href="{{ route('cases') }}">
                        {{ __('forms.view') }}
                    </a>
                </x-secondary-button>
                <x-primary-button type="button">
                    <a href="{{ route('cases.create') }}">
                        {{ __('forms.create') }}
                    </a>
                </x-primary-button>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pb-10">
                @include('layouts.partials.session_messages')
            </div>
            <div class="bg-white overflow-hidden shadow-xs">
                @include('admin.cases.partials.table')
            </div>
        </div>
    </div>
</x-admin-layout>
