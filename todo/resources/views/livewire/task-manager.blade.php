<div>
    <h2>To-Do List</h2>

    <input type="text" wire:model="title" placeholder="Task Title">
    <textarea wire:model="description" placeholder="Task Description"></textarea>
    <input type="number" wire:model="priority" min="1" max="5">
    <button wire:click="addTask" class="primary">Add Task</button>

    <div class="task-list">
        <!-- Open Tasks -->
        <div class="task-section">
            <h3>Open Tasks</h3>
            <div class="task-container">
                @foreach ($tasks->where('completed', false) as $task)
                    <livewire:task-card :task="$task" :wire:key="'open-'.$task->id" />
                @endforeach
            </div>
        </div>

        <!-- Completed Tasks -->
        <div class="task-section">
            <h3>Completed Tasks</h3>
            <div class="task-container">
                @foreach ($tasks->where('completed', true) as $task)
                    <livewire:task-card :task="$task" :wire:key="'completed-'.$task->id" />
                @endforeach
            </div>
        </div>
    </div>
</div>
