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
                        {{ __('forms.country') }}
                    </span>
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-600 text-left">
                    <span
                        class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                        {{ __('forms.address') }}
                    </span>
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-600 text-left">
                    <span
                        class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                        {{ __('forms.price') }}
                    </span>
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-600 text-left">
                    <span
                        class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                        {{ __('forms.visibility') }}
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
            @forelse($cases as $case)
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        {{ $case->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        {{ $case->country->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        {{ $case->address }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        {{ $case->price }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        @if ($case->is_visible)
                            <x-zondicon-checkmark class="size-5 text-green-600" />
                        @else
                            <x-iconpark-error class="size-5 text-red-600" />
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        {{ $case->updated_at }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        <x-primary-button type="button" class="mb-3">
                            <a href="{{ route('cases.edit', $case) }}">
                                {{ __('forms.edit') }}
                            </a>
                        </x-primary-button>
                        <x-danger-button class="cursor-pointer" type="button" data-modal-target="popup-modal-{{ $case->id }}" data-modal-toggle="popup-modal-{{ $case->id }}">
                            {{ __('forms.delete') }}
                        </x-danger-button>
                        @include('admin.cases.partials.destroy_form', [
                          'case' => $case,
                          'modalId' => 'popup-modal-' . $case->id
                        ])
                    </td>
                </tr>
            @empty
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                        {{ __('texts.casesEmpty') }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-6">
        {{ $cases->links() }}
    </div>
</div>
