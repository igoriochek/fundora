@extends('layouts.app')

@section('pageTitle', __('pages.cases'))

@section('content')
    <main class="min-h-100">
        <section class="bg-secondary-color">
            <form class="text-white max-w-screen-lg mx-auto px-5 py-30 flex flex-col gap-10">
                <div class="flex flex-col gap-4">
                    <h2 class="font-medium text-3xl">{{ __('texts.casesTitle') }}</h2>
                    @if (__('texts.casesDescription') != '')
                        <p>{{ __('texts.casesDescription') }}</p>
                    @endif
                    <div class="w-fit py-2 px-3 button bg-button-color hover:bg-secondary-color cursor-pointer">
                        <select id="countrySelect" class="border-0 outline-0 cursor-pointer bg-transparent" name="country">
                            <option value="" selected>{{ __('texts.casesChooseCountry') }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->name }}" @if ($selectedCountry == $country->name) selected @endif>
                                    {{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-10">
                    @forelse ($cases as $case)
                        @include('cases.case')
                    @empty
                        <p class="text-md text-gray-300">{{ __('texts.casesEmpty') }}</p>
                    @endforelse
                    <div class="pagination">
                        {{ $cases->links() }}
                    </div>
                </div>
            </form>
        </section>
    </main>
@endsection

@push('styles')
    <style>
        .case {
            transition: all 300ms ease;

            &:hover {
                transform: scale(1.03, 1.03);
                box-shadow: 1px 1px 2rem #00282b, -1px -1px 2rem #00282b;
            }
        }

        .pagination {
            width: 100%;

            p {
                font-size: 1rem;
                color: #dadada;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        const filterCasesByCountry = () => {
            const countrySelect = document.getElementById('countrySelect')
            const countries = document.querySelectorAll('#country')

            const redirectToFilteredUrl = countryName => {
                const currentUrl = window.location.href.split('?')[0]
                const filteredUrl = currentUrl.concat(`?country=${countryName}`)

                window.location.replace(filteredUrl)
            }

            countrySelect.addEventListener(
                'change', () => redirectToFilteredUrl(countrySelect.value)
            )
            countries.forEach(
                country => country.addEventListener(
                    'click', () => redirectToFilteredUrl(country.innerText)
                )
            )
        }

        filterCasesByCountry()
    </script>
@endpush
