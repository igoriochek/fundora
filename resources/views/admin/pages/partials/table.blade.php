<div
    class="relative overflow-hidden overflow-x-auto p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 border dark:border-gray-700">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-600 text-left">
                    <span
                        class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                        {{ __('forms.name') }}
                    </span>
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-600 text-left">
                    <span
                        class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                        {{ __('forms.title') }}
                    </span>
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-600 text-left">
                    <span
                        class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                        {{ __('forms.updatedAt') }}
                    </span>
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-600 text-left">
                    <span
                        class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                        {{ __('forms.actions') }}
                    </span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 divide-solid">
            @forelse($pages as $page)
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        {{ $page->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        {{ $page->title }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        {{ $page->updated_at }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100 flex flex-wrap gap-3">
                        <x-secondary-button type="button">
                            <a href="{{ route($page->alias) }}">
                                {{ __('forms.view') }}
                            </a>
                        </x-secondary-button>
                        <x-primary-button type="button">
                            <a href="{{ route('pages.edit', $page) }}">
                                {{ __('forms.edit') }}
                            </a>
                        </x-primary-button>
                    </td>
                </tr>
            @empty
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        {{ __('texts.pagesEmpty') }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
