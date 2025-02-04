<div>
    <h2>Task Manager Blade</h2>

    <input type="text" wire:model="title" placeholder="Task Title">
    <button wire:click="addTask">Add Task</button>

    <ul>
        @foreach ($tasks as $task)
            <li>
                {{ $task['title'] }}
                <button wire:click="deleteTask({{ $task['id'] }})">Delete</button>
            </li>
        @endforeach
    </ul>
</div>
