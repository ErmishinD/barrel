<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создать акцию') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" id="form" action="{{ route('promotions.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Заголовок')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title') }}" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="photo" :value="__('Фото')" />
                            <input id="photo" name="photo" type="file" class="mt-1 block w-full"/>
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Описание')" />
                            <textarea name="description" id="description" class="hidden" cols="30" rows="10"></textarea>
                            <div id="editor" name="editor" class="mt-1 block w-full">{!! old('description') !!}</div>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const file = FilePond.create(
            document.querySelector('input[name="photo"]'),
            {storeAsFile: true, acceptedFileTypes: ['image/*']}
        );
    </script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        function logSubmit(event) {
            let text = quill.root.innerHTML
            document.getElementById('description').value = text;
            return true;
        }

        const form = document.getElementById("form");
        form.addEventListener("submit", logSubmit);
    </script>
</x-app-layout>
