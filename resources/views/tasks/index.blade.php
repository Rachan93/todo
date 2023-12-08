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
            <x-input-error :messages="$errors->get('description')" />
        </div>

        <div>


            <x-primary-button type="submit">
                {{ __('Créer') }}
            </x-primary-button>
        </div>
    </form>

    <br>

    <h2>Tasks for {{ Auth::user()->name }}</h2>
    <ul>
        @foreach ($tasks as $task)
        <li>
            <div>
                <strong>Name:</strong> {{ $task->name }}
            </div>
            <div>
                <strong>Description:</strong> {{ $task->description }}
            </div>
            <div>
                <strong>Status:</strong> {{ $task->is_done ? 'Completed' : 'Incomplete' }}
            </div>
            <form method="POST" action="{{ route('tasks.status', $task) }}">
                @csrf
                @method('PATCH')
                <button type="submit">
                    {{ $task->is_done ? 'Fait' : ' Pas fait' }}
                </button>
            </form>

            <form method="POST" action="{{ route('tasks.delete', $task) }}">
                @csrf
                @method('DELETE')
                <button type="submit">
                    Supprimer
                </button>
            </form>
            <x-modal>
                
            </x-modal>
        </li>
        <br>
        @endforeach
    </ul>








</x-app-layout>