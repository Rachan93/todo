<x-app-layout>

    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" type="text" name="name" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" type="text" name="description" :value="old('description')" autofocus />
            <x-input-error :messages="$errors->get('description')"/>
        </div>

        <div >

          
            <x-primary-button type="submit" >
                {{ __('Créer') }}
            </x-primary-button>
        </div>
    </form>

</x-app-layout>