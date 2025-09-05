@extends('layouts.app')

@section('pageTitle', __('pages.faq'))

@section('content')
    <main class="min-h-100">
        <section class="bg-secondary-color">
            <div class="text-white max-w-screen-lg mx-auto px-5 py-30 flex flex-col gap-6">
                <h2 class="font-medium text-3xl">
                    {{ $page->title ? $page->title : __('texts.faqTitle') }}
                </h2>
                <div class="flex flex-col gap-3">
                    {!! $page->description ?? '-' !!}
                </div>
                {{-- <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.faqFirstTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.faqFirstDescription') }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.faqSecondTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.faqSecondDescription') }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.faqThirdTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.faqThirdDescription') }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.faqFourthTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.faqFourthDescription') }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.faqFifthTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.faqFifthDescription') }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.faqSixthTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.faqSixthDescription') }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.faqSeventhTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.faqSeventhDescription') }}</p>
                </div> --}}
            </div>
        </section>
    </main>
@endsection
