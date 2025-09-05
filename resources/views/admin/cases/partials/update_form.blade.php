<form class="space-y-4" method="post" action="{{ route('cases.update', $case) }}" enctype="multipart/form-data"
    files="true">
    @csrf
    @method('patch')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach (config('app.available_locales') as $locale)
            <div>
                <label for="{{ "name_$locale" }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('forms.name') . ' (' . strtoupper($locale) . ')' }}
                </label>
                <input type="text" name="{{ "name_$locale" }}" id="{{ "name_$locale" }}"
                    value="{{ $case->translation($locale)->name }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                @error("name_$locale")
                    <span class="text-red-500 pt-2">{{ $message }}</span>
                @enderror
            </div>
        @endforeach
        <div>
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('forms.address') }}
            </label>
            <input type="text" name="address" id="address" value="{{ $case->address }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
            @error('address')
                <span class="text-red-500 pt-2">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="product_country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('forms.country') }}
            </label>
            <select name="product_country_id" id="product_country_id" aria-colcount=""
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <option value="" selected>{{ __('texts.casesChooseCountry') }}</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" @if ($country->id === $case->product_country_id) selected @endif>
                        {{ $country->name }}</option>
                @endforeach
            </select>
            @error('product_country_id')
                <span class="text-red-500 pt-2">{{ $message }}</span>
            @enderror
        </div>
        @foreach (config('app.available_locales') as $locale)
            <div>
                <label for="{{ "price_$locale" }}"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('forms.price') . ' (' . strtoupper($locale) . ')' }}
                </label>
                <input type="text" name="{{ "price_$locale" }}" id="{{ "price_$locale" }}"
                    value="{{ $case->translation($locale)->price }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                @error("price_$locale")
                    <span class="text-red-500 pt-2">{{ $message }}</span>
                @enderror
            </div>
        @endforeach
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">
                {{ __('forms.uploadImage') . ' (' . __('forms.uploadDescription') . ')' }}
            </label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="image" type="file" name="image" value="{{ $case->image }}">
            @error('image')
                <span class="text-red-500 pt-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col justify-center mt-2">
            <div class="flex items-center">
                <div class="flex items-center h-5">
                    <input id="is_visible" aria-describedby="is_visible" type="checkbox" name="is_visible"
                        @if ($case->is_visible) checked @endif value="{{ $case->is_visible }}"
                        class="w-5 h-5 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                </div>
                <div class="ml-2 text-sm font-medium">
                    <label for="is_visible" class="text-gray-500 dark:text-white">
                        {{ __('forms.visibility') }}
                    </label>
                </div>
            </div>
            @error('is_visible')
                <span class="text-red-500 pt-2">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <hr style="height: 1px; border: 0;" class="bg-gray-700 mt-7 mb-5" />
    @foreach (config('app.available_locales') as $locale)
        <div>
            <label for="{{ "description_$locale" }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('forms.description') . ' (' . strtoupper($locale) . ')' }}
            </label>
            <textarea id="description_editor" name="{{ "description_$locale" }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black">
                {!! $case->translation($locale)->description !!}
            </textarea>
        </div>
    @endforeach
    <hr style="height: 1px; border: 0;" class="bg-gray-700 mt-7 mb-5" />
    @foreach (config('app.available_locales') as $locale)
        <div>
            <label for="{{ "main_advantages_$locale" }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('forms.mainAdvantages') . ' (' . strtoupper($locale) . ')' }}
            </label>
            <textarea id="main_advantages_editor" name="{{ "main_advantages_$locale" }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black">
                {!! $case->translation($locale)->main_advantages !!}
            </textarea>
        </div>
    @endforeach
    <div class="flex gap-3">
        <x-primary-button type="submit" class="mt-5">
            {{ __('forms.save') }}
        </x-primary-button>
        <x-secondary-button type="button" class="mt-5">
            <a href="{{ route('cases.index') }}">{{ __('forms.cancel') }}</a>
        </x-secondary-button>
    </div>
</form>

<script>
    const setVisibilityValue = () => {
        const visibility = document.getElementById('is_visible')

        visibility.addEventListener('click', () => visibility.checked ? visibility.value = 1 : visibility.value = 0)
    }

    setVisibilityValue()
</script>
