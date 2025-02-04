<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskManager extends Component
{
    // Default vals
    public $tasks = [];
    public $title = "";
    public $description = "";
    public $priority = 1;

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $this->tasks = Task::orderBy('priority', 'desc')->get()->toArray();
    }

    public function addTask()
    {
        if (!empty($this->title)) {
            Task::create([
                'title' => $this->title,
                'description' => $this->description,
                'priority' => $this->priority,
                'completed' => false
            ]);

            $this->reset(['title', 'description', 'priority']);
            $this->loadTasks(); // Refresh the task list to populate ym changes
        }
    }

    public function deleteTask($taskId)
    {
        Task::where('id', $taskId)->delete();
        $this->loadTasks(); // Refresh the task list, to populate changes
    }

    public function render()
    {
        return view('livewire.task-manager');
    }
}
