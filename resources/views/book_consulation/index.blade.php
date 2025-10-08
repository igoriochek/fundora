@extends('layouts.app')

@section('pageTitle', __('pages.bookConsultation'))

@section('content')
    <main class="min-h-100">
        <section>
            <div class="max-w-screen-lg mx-auto px-5 py-30">
                <div class="flex lg:flex-row flex-col-reverse lg:items-start items-center justify-between gap-20">
                    <section class="w-100">
                        <div class="flex flex-col gap-6">
                            <h1 class="font-medium text-3xl text-white">
                                {{ __('pages.bookConsultation') }}
                            </h1>
                            <p class="text-white">
                                {{ __('texts.bookConsultationFirstParagraph') }}
                            </p>
                            <p class="text-white">
                                {{ __('texts.bookConsultationSecondParagraph') }}
                            </p>
                            <div class="flex items-center gap-4 text-white">
                                <x-grommet-mail-option class="size-8" />
                                <div>
                                    <h4 class="font-medium">{{ __('texts.bookConsultationEmail') }}</h4>
                                    <a href="mailto:info@fundoraglobal.com" class="opacity-75 hover:opacity-50">
                                        {{ __('info@fundoraglobal.com') }}
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 text-white">
                                <x-heroicon-o-phone class="size-8" />
                                <div>
                                    <h4 class="font-medium">{{ __('texts.bookConsultationPhone') }}</h4>
                                    <a href="tel:+37060222526" class="opacity-75 hover:opacity-50">
                                        {{ __('+370 602 22 526') }}
                                    </a>
                                </div>
                            </div>
                    </section>
                    <section class="w-100">
                        @include('book_consulation.store_form')
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection
