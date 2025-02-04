<div class="task-card {{ $task['completed'] ? 'completed' : '' }}">
    <h3>{{ $task['title'] }}</h3>
    <p>{{ $task['description'] }}</p>
    <p><strong>Priority:</strong> {{ $task['priority'] }}</p>

    <button wire:click="toggleTask" class="primary">
        {{ $task['completed'] ? 'Mark Incomplete' : 'Mark Complete' }}
    </button>
    <button wire:click="deleteTask" class="error">Delete</button>
</div>
