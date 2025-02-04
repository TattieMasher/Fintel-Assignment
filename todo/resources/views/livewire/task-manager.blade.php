<div>
    <h2>To-Do List</h2>

    <input type="text" wire:model="title" placeholder="Task Title">
    <textarea wire:model="description" placeholder="Task Description"></textarea>
    <input type="number" wire:model="priority" min="1" max="5">
    <button wire:click="addTask" class="primary">Add Task</button>

    <div class="task-container">
        @foreach ($tasks as $task)
            <livewire:task-card :task="$task" :wire:key="$task->id" />
        @endforeach
    </div>
</div>
