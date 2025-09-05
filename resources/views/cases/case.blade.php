<div class="case flex md:flex-row flex-col gap-10 p-10 bg-primary-color w-110 md:w-full">
    <img src="{{ asset("images/cases/$case->image") }}" alt="{{ $case->name }}"
        class="w-100 h-100 md:h-auto object-cover">
    <div class="flex flex-col justify-between gap-10">
        <div class="flex flex-col gap-6">
            <div class="flex flex-col">
                <h3 class="text-white font-bold text-2xl">{{ $case->name }}</h3>
                <div class="mt-2 flex items-center gap-2">
                    <div>
                        <x-zondicon-location class="size-6" />
                    </div>
                    <div class="flex flex-col">
                        <p id="country"
                            class="w-fit font-medium text-md text-gray-100 hover:text-gray-400 cursor-pointer">
                            {{ $case->country->name ?? '-' }}
                        </p>
                        <p class="text-gray-300 text-sm">{{ $case->address }}</p>
                    </div>
                </div>
            </div>
            <hr style="height: 1px; border: 0;" class="bg-gray-700" />
            <p class="text-sm text-gray-300">
                {!! $case->description ?? '-' !!}
            </p>
            <p class="text-lg font-medium">
                {{ $case->price }}
            </p>
            <p class="text-sm text-gray-300">
                {!! $case->main_advantages ?? '-' !!}
            </p>
        </div>
        <div class="flex items-center md:items-start justify-center md:justify-start">
            <button type="button" class="button bg-button-color h-13 w-fit hover:bg-secondary-color">
                <a href="{{ route('book-consultation.index') }}" class="py-4 px-6">
                    {{ __('home.readyToInvestGloballyButton') }}
                </a>
            </button>
        </div>
    </div>
</div>
