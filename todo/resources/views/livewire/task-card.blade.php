<div class="task-card flex justify-between {{ $task['completed'] ? 'completed' : '' }}">
    <div class="flex justify-between w-full">
        <h4>{{ $task['priority'] }}</h4>
        <div class="flex-col justify-between">
            <h4>{{ $task['title'] }}</h4>
            <p>{{ $task['description'] }}</p>
        </div>

        <div class="task-buttons flex flex-col justify-between">
            <button wire:click="toggleTask" class="primary">
                {{ $task['completed'] ? 'Reopen' : 'Complete' }}
            </button>
            <button wire:click="deleteTask" class="error">Delete</button>
        </div>
    </div>
</div>
