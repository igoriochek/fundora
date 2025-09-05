<x-admin-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex flex-wrap items-center gap-3">
            <a href="{{ route('cases.index') }}" class="hover:dark:text-gray-300 hover:text-gray-700">
                {{ __('pages.cases') }}
            </a>
            <x-heroicon-o-arrow-right class="size-4" />
            <span class="text-gray-600 dark:text-gray-400">{{ __('forms.edit') }}</span>
            <x-heroicon-o-arrow-right class="size-4" />
            <span class="text-gray-600 dark:text-gray-400">{{ $case->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('layouts.partials.session_messages')
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-0">
                @include('admin.cases.partials.update_form')
            </div>
        </div>
    </div>
</x-admin-layout>

<style>
    .ck-editor__editable_inline {
        min-height: 4.5vh;
    }

    .ck.ck-editor__main>.ck-editor__editable {
        color: #535353;
        padding-inline: 1.5rem;
    }
</style>


<script>
    const initClassicEdit = () => {
        const descriptions = document.querySelectorAll('#description_editor')
        const mainAdvantages = document.querySelectorAll('#main_advantages_editor')

        descriptions.forEach((description) => {
            ClassicEditor
                .create(description, {})
                .catch(error => console.error(error));
        })
        mainAdvantages.forEach((mainAdvantage) => {
            ClassicEditor
                .create(mainAdvantage, {})
                .catch(error => console.error(error));
        })
    }
    initClassicEdit()
</script>
