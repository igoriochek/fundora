<form class="mx-auto flex flex-col gap-5" method="POST" action="{{ route('book-consultation.store') }}">
    @csrf
    @method('POST')
    <div>
        <label for="name" class="block mb-2 font-medium text-white">
            {{ __('forms.name') }}
        </label>
        <input type="text" id="name" name="name"
            class="bg-gray-700 border-0 focus:outline-gray-300 text-white block w-full px-4 py-3" />
        @error('name')
            <span class="text-red-500 pt-2">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="phone_number" class="block mb-2 font-medium text-white">
            {{ __('forms.phoneNumber') }}
        </label>
        <input type="text" id="phone_number" name="phone_number"
            class="bg-gray-700 border-0 focus:outline-gray-300 text-white block w-full px-4 py-3" />
        @error('phone_number')
            <span class="text-red-500 pt-2">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email" class="block mb-2 font-medium text-white">
            {{ __('forms.email') }}
        </label>
        <input type="text" id="email" name="email"
            class="bg-gray-700 border-0 focus:outline-gray-300 text-white block w-full px-4 py-3" />
        @error('email')
            <span class="text-red-500 py-2">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit"
        class="button bg-button-color hover:bg-secondary-color text-white font-medium text-md w-fit px-6 py-4 text-center mt-5 cursor-pointer">
        {{ __('forms.submit') }}
    </button>
</form>
