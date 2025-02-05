<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskCard extends Component
{
    public $task;

    public function mount($task)
    {
        $this->task = $task;
    }

    public function deleteTask()
    {
        Task::where('id', $this->task['id'])->delete();
        $this->dispatch('taskUpdated'); // Callback to parent container
    }

    public function toggleTask()
    {
        $task = Task::find($this->task['id']);
        $task->completed = !$task->completed;
        $task->save();

        $this->dispatch('taskUpdated'); // Callback to parent container
    }

    public function render()
    {
        return view('livewire.task-card');
    }
}
