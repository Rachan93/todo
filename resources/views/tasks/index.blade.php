<x-app-layout>


<h2>Tasks for {{ Auth::user()->name }}</h2>
    <ul>
        @foreach (Auth::user()->tasks as $task)
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
            </li>
            <br>
        @endforeach
    </ul>

    <x-app-layout>
