<nav class="bg-header-color fixed top-0 min-w-full shadow-md z-1">
    <div class="mx-auto max-w-screen-lg px-5">
        <div class="relative flex h-20 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                <button type="button"
                    class="relative inline-flex items-center justify-center p-2 text-white hover:bg-primary-color hover:border-1"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only"></span>
                    <svg class="block size-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden size-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center md:items-stretch md:justify-start">
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('home') }}">
                        <img class="w-auto size-12" src="{{ asset('images/fundora-logo.jpg') }}"
                            alt="{{ config('app.name') }}">
                        {{-- <span class="text-amber-200 uppercase tracking-widest">{{ __('Fundora') }}</span> --}}
                    </a>
                </div>
                <div class="hidden md:ml-9 md:block">
                    <div class="flex space-x-4">
                        <a href="{{ route('home') }}"
                            class="@if (request()->is('/')) underline @endif flex items-center px-4 py-3 text-md font-medium text-white hover:bg-primary-color"
                            aria-current="page">{{ __('pages.home') }}
                        </a>
                        <a href="{{ route('aboutUs') }}"
                            class="@if (request()->is('about-us')) underline @endif flex items-center px-4 py-3 text-md font-medium text-white hover:bg-primary-color">
                            {{ __('pages.aboutUs') }}
                        </a>
                        <a href="{{ route('services') }}"
                            class="@if (request()->is('services')) underline @endif flex items-center px-4 py-3 text-md font-medium text-white hover:bg-primary-color">
                            {{ __('pages.services') }}
                        </a>
                        <a href="{{ route('faq') }}"
                            class="@if (request()->is('faq')) underline @endif flex items-center px-4 py-3 text-md font-medium text-white hover:bg-primary-color">
                            {{ __('pages.faq') }}
                        </a>
                        <a href="{{ route('cases') }}"
                            class="@if (request()->is('cases')) underline @endif flex items-center px-4 py-3 text-md font-medium text-white hover:bg-primary-color">
                            {{ __('pages.cases') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center md:static md:inset-auto md:ml-6 gap-2">
                <select id="languages" class="bg-transparent text-white h-11 border-0 outline-0 pr-7">
                    <option selected>{{ strtoupper(app()->currentLocale()) }}</option>
                    @foreach (config('app.available_locales') as $locale)
                        @if ($locale !== app()->currentLocale())
                            <option value="{{ $locale }}">{{ strtoupper($locale) }}</option>
                        @endif
                    @endforeach
                </select>
                <button type="button"
                    class="button md:block hidden bg-button-color hover:bg-secondary-color text-white h-11 w-fit">
                    <a href="{{ route('book-consultation.index') }}" class="flex text-md px-6 py-2">
                        {{ __('pages.bookConsultation') }}
                    </a>
                </button>
            </div>
        </div>
    </div>

    <div class="md:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="{{ route('home') }}"
                class="block @if (request()->is('/')) underline @endif px-3 py-2 text-base font-medium text-white hover:bg-primary-color"
                aria-current="page">
                {{ __('pages.home') }}
            </a>
            <a href="{{ route('aboutUs') }}"
                class="block @if (request()->is('about-us')) underline @endif px-3 py-2 text-base font-medium text-white hover:bg-primary-color">
                {{ __('pages.aboutUs') }}
            </a>
            <a href="{{ route('services') }}"
                class="block @if (request()->is('services')) underline @endif px-3 py-2 text-base font-medium text-white hover:bg-primary-color">
                {{ __('pages.services') }}
            </a>
            <a href="{{ route('faq') }}"
                class="block @if (request()->is('faq')) underline @endif px-3 py-2 text-base font-medium text-white hover:bg-primary-color">
                {{ __('pages.faq') }}
            </a>
            <a href="{{ route('cases') }}"
                class="block @if (request()->is('cases')) underline @endif px-3 py-2 text-base font-medium text-white hover:bg-primary-color">
                {{ __('pages.cases') }}
            </a>
            <button type="button"
                class="button bg-button-color hover:bg-secondary-color text-white h-11 w-fit my-4 ms-3">
                <a href="{{ route('book-consultation.index') }}" class="flex text-md px-6 py-2">
                    {{ __('pages.bookConsultation') }}
                </a>
            </button>
        </div>
    </div>
</nav>

<script>
    const toggleMenu = () => {
        const menuButton = document.querySelector('[aria-controls="mobile-menu"]');

        menuButton.addEventListener('click', () => {
            const menu = document.getElementById('mobile-menu')
            menu.classList.toggle('hidden')

            changeMenuButtonIcon()
            changeMenuButtonAriaExpanded()
        })

        const changeMenuButtonIcon = () => {
            const menuOpenIcon = menuButton.querySelector('.block');
            const menuCloseIcon = menuButton.querySelector('.hidden');

            menuOpenIcon.classList.toggle('block');
            menuOpenIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('block');
            menuCloseIcon.classList.toggle('hidden');
        }

        const changeMenuButtonAriaExpanded = () => {
            const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', !isExpanded);
        }
    }

    const changeLanguage = () => {
        const languages = document.getElementById('languages')

        languages.addEventListener('change', () => {
            const locale = languages.value.toLowerCase();
            const route = '{{ route('changeLanguage') }}/'.concat(locale)
            window.location.replace(route)
        })
    }

    toggleMenu()
    changeLanguage()
</script>
