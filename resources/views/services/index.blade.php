@extends('layouts.app')

@section('pageTitle', __('pages.services'))

@section('content')
    <main class="min-h-100">
        <section class="bg-secondary-color">
            <div class="text-white max-w-screen-lg mx-auto px-5 py-30 flex flex-col gap-6">
                <h2 class="font-medium text-3xl">
                    {{ $page->title ? $page->title : __('texts.servicesTitle') }}
                </h2>
                <div class="flex flex-col gap-3">
                    {!! $page->description ?? '-' !!}
                </div>
                {{-- <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.servicesFirstTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.servicesFirstDescription') }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.servicesSecondTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.servicesSecondDescription') }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.servicesThirdTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.servicesThirdDescription') }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="font-medium text-lg">{{ __('texts.servicesFourthTitle') }}</h2>
                    <p class="pl-5">{{ __('texts.servicesFourthDescription') }}</p>
                </div> --}}
            </div>
        </section>
    </main>
@endsection
