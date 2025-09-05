<form class="space-y-4" method="post" action="{{ route('pages.update', $page) }}">
    @csrf
    @method('patch')
    @foreach (config('app.available_locales') as $locale)
        <div>
            <label for="{{ "title_$locale" }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('forms.title') . ' (' . strtoupper($locale) . ')' }}
            </label>
            <input type="text" name="{{ "title_$locale" }}" id="{{ "title_$locale" }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-100 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                value="{{ $page->translation($locale)->title }}" required />
            @error("title_$locale")
                <span class="text-red-500 pt-2">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="{{ "description_$locale" }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('forms.description') . ' (' . strtoupper($locale) . ')' }}
            </label>
            <textarea id="description_editor" name="{{ "description_$locale" }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black">
                {!! $page->translation($locale)->description !!}
            </textarea>
        </div>
    @endforeach
    <div class="flex gap-3">
        <x-primary-button type="submit" class="mt-5">
            {{ __('forms.save') }}
        </x-primary-button>
        <x-secondary-button type="button" class="mt-5">
            <a href="{{ route('pages.index') }}">{{ __('forms.cancel') }}</a>
        </x-secondary-button>
    </div>
    <input type="hidden" id="page_id" name="page_id" value="{{ $page->id }}">
</form>
