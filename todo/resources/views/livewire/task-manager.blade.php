<div>
    <div class="inputs flex flex-col items-center">
        <div class="input-wrapper">
            <label>Task Title</label>
            <input type="text" wire:model="title" placeholder="Name for your task">
        </div>
        <div class="input-wrapper">
            <label>Task Description</label>
            <textarea wire:model="description" placeholder="An optional long description of your task"></textarea>
        </div>
        <div class="input-wrapper">
            <label>Task Priority</label>
            <input type="number" wire:model="priority" min="1" max="5">
        </div>
        <button wire:click="addTask" class="submit-task primary">Add Task</button>
    </div>

    <div class="task-list">
        <div class="task-section">
            <h3>Open Tasks</h3>
            <div class="task-container">
                @if (count($tasks)==0)
                    <h2>All done!</h2>
                    <h5>No open tasks</h5>
                @endif
                @foreach ($tasks->where('completed', false) as $task)
                    <livewire:task-card :task="$task" :wire:key="'open-'.$task->id" />
                @endforeach
            </div>
        </div>

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
