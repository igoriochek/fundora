@extends('layouts.app')

@section('content')
    <main class="min-h-100">
        <section class="hero"
            style="background-image: url('../images/home_background.jpg'); background-repeat: no-repeat;
                   background-size: cover; background-position: center; background-color: #444; background-blend-mode: overlay;">
            <div class="flex items-center max-w-screen-lg mx-auto px-5 py-30">
                <div class="hero-content text-white flex flex-col gap-6 max-w-lg">
                    <h1 class="font-medium text-5xl leading-14">{{ __('home.heroTitle') }}</h1>
                    <p class="text-lg">{{ __('home.heroDescription') }}</p>
                    <button type="button" class="button bg-button-color h-13 w-fit hover:bg-secondary-color">
                        <a href="{{ route('cases') }}" class="py-4 px-6">
                            {{ __('home.heroButton') }}
                        </a>
                    </button>
                </div>
            </div>
        </section>
        <section class="why-fundora bg-primary-color">
            <div class="text-white max-w-screen-lg mx-auto px-5 py-13">
                <h2 class="text-2xl font-medium pb-10">{{ __('home.whyFundoraTitle') }}</h2>
                <div class="flex sm:flex-row flex-col items-center justify-between text-center gap-10">
                    <div class="card flex flex-col items-center gap-2 max-w-60">
                        <x-heroicon-o-chart-bar class="w-15" />
                        <h3 class="font-medium text-lg">{{ __('home.whyFundoraFirstCardTitle') }}</h3>
                        <p class="text-sm">{{ __('home.whyFundoraFirstCardDesc') }}</p>
                    </div>
                    <div class="card flex flex-col items-center gap-2 max-w-60">
                        <x-heroicon-o-globe-alt class="w-15" />
                        <h3 class="font-medium text-lg">{{ __('home.whyFundoraSecondCardTitle') }}</h3>
                        <p class="text-sm">{{ __('home.whyFundoraSecondCardDesc') }}</p>
                    </div>
                    <div class="card flex flex-col items-center gap-2 max-w-60">
                        <x-grommet-grow class="w-13 pb-2" />
                        <h3 class="font-medium text-lg">{{ __('home.whyFundoraThirdCardTitle') }}</h3>
                        <p class="text-sm">{{ __('home.whyFundoraThirdCardDesc') }}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="cta bg-secondary-color">
            <div class="text-white max-w-screen-lg mx-auto px-5 py-15 flex flex-col gap-5">
                <h2 class="font-medium text-3xl">{{ __('home.readyToInvestGloballyTitle') }}</h2>
                <p class="max-w-100">
                    {{ __('home.readyToInvestGloballyDesc') }}
                </p>
                <button type="button" class="button bg-button-color h-12 w-fit hover:bg-secondary-color">
                    <a href="{{ route('book-consultation.index') }}" class="py-4 px-6">
                        {{ __('home.readyToInvestGloballyButton') }}
                    </a>
                </button>
            </div>
        </section>
    </main>
@endsection
