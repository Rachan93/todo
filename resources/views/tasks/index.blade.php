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
            
            <form method="POST" action="{{ route('tasks.status', $task) }}">
    @csrf
    @method('PATCH')
    <input type="checkbox" name="is_done" {{ $task->is_done ? 'checked' : '' }} onchange="this.form.submit()">
    <label for="is_done">{{ $task->is_done ? 'Completed' : 'Incomplete' }}</label>
</form>

            <form method="POST" action="{{ route('tasks.delete', $task) }}">
                @csrf
                @method('DELETE')
                <button type="submit">
                    Supprimer
                </button>

                <x-modal name="confirm-task-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('tasks.delete', $task) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this task?') }}
            </h2>

           <button type="submit">
                    Supprimer
                </button>
            
               

              

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
            </form>
            
        </li>
        <br>
        @endforeach
    </ul>








</x-app-layout>