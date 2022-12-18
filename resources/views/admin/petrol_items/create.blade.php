<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создать вид топлива') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('petrol_items.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Название')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="photo" :value="__('Фото')" />
                            <input id="photo" name="photo" type="file" class="mt-1 block w-full"/>
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="price_station" :value="__('Цена на заправке')" />
                            <x-text-input id="price_station" name="price_station" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('price_station') }}" />
                            <x-input-error :messages="$errors->get('price_station')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="price_ticket" :value="__('Цена по талонам')" />
                            <x-text-input id="price_ticket" name="price_ticket" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('price_ticket') }}" />
                            <x-input-error :messages="$errors->get('price_ticket')" class="mt-2" />
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
</x-app-layout>
