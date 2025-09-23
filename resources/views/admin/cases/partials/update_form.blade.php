<form class="space-y-4" method="post" action="{{ route('cases.update', $case) }}" enctype="multipart/form-data"
    files="true">
    @csrf
    @method('patch')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach (config('app.available_locales') as $locale)
            <div>
                <label for="{{ "name_$locale" }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('forms.name') . ' (' . strtoupper($locale) . ')' }}
                </label>
                <input type="text" name="{{ "name_$locale" }}" id="{{ "name_$locale" }}"
                    value="{{ $case->translation($locale)->name }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                @error("name_$locale")
                    <span class="text-red-500 pt-2">{{ $message }}</span>
                @enderror
            </div>
        @endforeach
        <div>
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('forms.address') }}
            </label>
            <input type="text" name="address" id="address" value="{{ $case->address }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
            @error('address')
                <span class="text-red-500 pt-2">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="product_country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('forms.country') }}
            </label>
            <input type="text" id="country_search" placeholder="{{ __('texts.casesChooseCountry') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                value="{{ $selectedCountryName }}">
            <ul id="country_list" class="w-[30%] absolute text-sm bg-gray-50 border border-gray-300 text-gray-900 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white rounded-lg max-h-60 overflow-auto hidden">
                @foreach ($countries as $country)
                    <li data-id="{{ $country->id }}" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer">{{ $country->name }}</li>
                @endforeach
            </ul>
            <input type="hidden" name="product_country_id" id="product_country_id" value="{{ $selectedCountry }}">
            @error('product_country_id')
                <span class="text-red-500 pt-2">{{ $message }}</span>
            @enderror
        </div>
        @foreach (config('app.available_locales') as $locale)
            <div>
                <label for="{{ "price_$locale" }}"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('forms.price') . ' (' . strtoupper($locale) . ')' }}
                </label>
                <input type="text" name="{{ "price_$locale" }}" id="{{ "price_$locale" }}"
                    value="{{ $case->translation($locale)->price }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                @error("price_$locale")
                    <span class="text-red-500 pt-2">{{ $message }}</span>
                @enderror
            </div>
        @endforeach
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="images">
            {{ __('forms.uploadImage') . ' (' . __('forms.uploadDescription') . ')' }}
        </label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="images" type="file" name="images[]" multiple>
        <input type="hidden" name="image_order" id="image_order">
        <input type="hidden" name="removed_images" id="removed_images">
            @error('images')
                <span class="text-red-500 pt-2">{{ $message }}</span>
            @enderror
            @error('images.*')
                <span class="text-red-500 pt-2">{{ $message }}</span>
            @enderror
            <div id="images_preview_block" class="mt-2">
            <div id="images_preview" class="flex gap-2 flex-wrap">
                @foreach ($case->images->sortBy('sort_order') as $image)
                    <div class="relative w-24 h-24 border rounded overflow-hidden image-wrapper" data-id="{{ $image->id }}" data-sort-order>
                        <img src="{{ asset('images/cases/' . $image->image) }}" class="object-cover w-full h-full" alt="Existing Image">
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        <div class="flex flex-col justify-center mt-2">
            <div class="flex items-center">
                <div class="flex items-center h-5">
                    <input id="is_visible" aria-describedby="is_visible" type="checkbox" name="is_visible"
                        @if ($case->is_visible) checked @endif value="{{ $case->is_visible }}"
                        class="w-5 h-5 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                </div>
                <div class="ml-2 text-sm font-medium">
                    <label for="is_visible" class="text-gray-500 dark:text-white">
                        {{ __('forms.visibility') }}
                    </label>
                </div>
            </div>
            @error('is_visible')
                <span class="text-red-500 pt-2">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <hr style="height: 1px; border: 0;" class="bg-gray-700 mt-7 mb-5" />
    @foreach (config('app.available_locales') as $locale)
        <div>
            <label for="{{ "description_$locale" }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('forms.description') . ' (' . strtoupper($locale) . ')' }}
            </label>
            <textarea id="description_editor" name="{{ "description_$locale" }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black">
                {!! $case->translation($locale)->description !!}
            </textarea>
        </div>
    @endforeach
    <hr style="height: 1px; border: 0;" class="bg-gray-700 mt-7 mb-5" />
    @foreach (config('app.available_locales') as $locale)
        <div>
            <label for="{{ "main_advantages_$locale" }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('forms.mainAdvantages') . ' (' . strtoupper($locale) . ')' }}
            </label>
            <textarea id="main_advantages_editor" name="{{ "main_advantages_$locale" }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black">
                {!! $case->translation($locale)->main_advantages !!}
            </textarea>
        </div>
    @endforeach
    <div class="flex gap-3">
        <x-primary-button type="submit" class="mt-5">
            {{ __('forms.save') }}
        </x-primary-button>
        <x-secondary-button type="button" class="mt-5">
            <a href="{{ route('cases.index') }}">{{ __('forms.cancel') }}</a>
        </x-secondary-button>
    </div>
</form>

<script>
const input = document.getElementById('country_search');
const list = document.getElementById('country_list');
const hiddenInput = document.getElementById('product_country_id');

input.addEventListener('input', () => {
    const value = input.value.toLowerCase();
    let hasVisible = false;

    Array.from(list.children).forEach(li => {
        if (li.textContent.toLowerCase().includes(value)) {
            li.style.display = '';
            hasVisible = true;
        } else {
            li.style.display = 'none';
        }
    });

    list.style.display = hasVisible ? 'block' : 'none';

    const match = Array.from(list.children).find(li => li.textContent.toLowerCase() === value);
    hiddenInput.value = match ? match.dataset.id : '';
});

Array.from(list.children).forEach(li => {
    li.addEventListener('click', () => {
        input.value = li.textContent;
        hiddenInput.value = li.dataset.id;
        list.style.display = 'none';
    });
});

document.addEventListener('click', e => {
    if (!e.target.closest('.relative')) list.style.display = 'none';
});

document.querySelector('form').addEventListener('submit', e => {
    if (!hiddenInput.value) {
        e.preventDefault();
        alert('Pasirinkite galiojančią šalį iš sąrašo');
    }
});
</script>

<script>
    const setVisibilityValue = () => {
        const visibility = document.getElementById('is_visible')

        visibility.addEventListener('click', () => visibility.checked ? visibility.value = 1 : visibility.value = 0)
    }

    setVisibilityValue()
</script>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>
const imagesPreview = document.getElementById('images_preview');
const imagesInput = document.getElementById('images');
const removedInput = document.getElementById('removed_images');

let allImages = Array.from(imagesPreview.querySelectorAll('.image-wrapper[data-id]')).map(wrapper => ({
    id: wrapper.dataset.id,
    src: wrapper.querySelector('img').src,
    isNew: false
}));

let newFiles = [];

function updateImageOrderInput() {
    const imagesData = allImages.map((img, index) => ({
        id: img.id || null,
        isNew: img.isNew || false,
        sort_order: index,
        file_name: img.file?.name || null
    }));

    document.getElementById('image_order').value = JSON.stringify(imagesData);
}

function renderImages() {
    imagesPreview.innerHTML = '';

    allImages.forEach((img, index) => {
        const wrapper = document.createElement('div');
        wrapper.className = 'relative w-24 h-24 border rounded overflow-hidden image-wrapper';
        if(img.id) wrapper.dataset.id = img.id;

        const imageEl = document.createElement('img');
        imageEl.src = img.src;
        imageEl.className = 'object-cover w-full h-full';
        wrapper.appendChild(imageEl);

        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.className = 'absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center opacity-80 hover:opacity-100 transition';
            removeBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>`;
        removeBtn.addEventListener('click', () => removeImage(index));
        wrapper.appendChild(removeBtn);

        if(index === 0) {
            const starIcon = document.createElement('div');
            starIcon.className = 'absolute top-0 left-0 star-icon bg-black opacity-80 rounded-full w-5 h-5 flex items-center justify-center';
            starIcon.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-yellow-400" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                </svg>`;
            wrapper.appendChild(starIcon);
        }

        imagesPreview.appendChild(wrapper);
    });
}

function removeImage(index) {
    const img = allImages[index];

    if(img.isNew) {
        newFiles = newFiles.filter(f => f !== img.file);
        syncInputFiles();
    } else {
        let removedImages = removedInput.value ? JSON.parse(removedInput.value) : [];
        removedImages.push(img.src.split('/').pop());
        removedInput.value = JSON.stringify(removedImages);
    }

    allImages.splice(index, 1);
    renderImages();
    updateImageOrderInput();
}

function syncInputFiles() {
    const dt = new DataTransfer();
    newFiles.forEach(f => dt.items.add(f));
    imagesInput.files = dt.files;
}

imagesInput.addEventListener('change', () => {
    Array.from(imagesInput.files).forEach(file => {
        newFiles.push(file);

        const reader = new FileReader();
        reader.onload = e => {
            allImages.push({
                src: e.target.result,
                isNew: true,
                file: file
            });
            renderImages();
            updateImageOrderInput();
        };
        reader.readAsDataURL(file);
    });

    syncInputFiles();
});

renderImages();

const sortable = new Sortable(imagesPreview, {
    animation: 150,
    onEnd: function (evt) {
        const movedItem = allImages.splice(evt.oldIndex, 1)[0];
        allImages.splice(evt.newIndex, 0, movedItem);

        renderImages();
        updateImageOrderInput();
    }
});

</script>
