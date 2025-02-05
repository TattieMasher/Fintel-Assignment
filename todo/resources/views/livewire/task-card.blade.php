<div class="task-card {{ $task['completed'] ? 'completed' : '' }}">
    <div class="flex">
        <h4>{{ $task['priority'] }}</h4>
        <div class="flex-col justify-between">
            <h4>{{ $task['title'] }}</h4>
            <p>{{ $task['description'] }}</p>
        </div>

        <div class="flex justify-between">
            <button wire:click="toggleTask" class="primary">
                {{ $task['completed'] ? 'Mark Incomplete' : 'Mark Complete' }}
            </button>
            <button wire:click="deleteTask" class="error">Delete</button>
        </div>
    </div>
</div>
