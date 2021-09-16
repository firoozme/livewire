<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;

class Todo extends Component
{
    public $user;
    public $tasks;
    public $input;

    public function addTask()
    {
        //dd($this->user->id);
        $t = new Task();  
        $t->title = $this->input;
        $t->user_id = $this->user->id;
        $t->save();
        $this->tasks = Task::where('user_id',$this->user->id)->get();

    }
    public function mount($id)
    {
        $this->user = User::find($id);
        $this->tasks = Task::where('user_id',$this->user->id)->get();
    }
    public function render()
    {
        return view('livewire.todo');
    }
}
