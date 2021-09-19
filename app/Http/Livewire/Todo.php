<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Session;

class Todo extends Component
{
    public $user;
    public $tasks;
    public $input;
    public $editId = 0;
    public function addTask()
    {
        //dd($this->user->id);
        if($this->input == ''){
            Session::flash('danger','Username is Required');
        }else{

            $t = new Task();  
            $t->title = $this->input;
            $t->user_id = $this->user->id;
            $t->save();
            $this->tasks = Task::where('user_id',$this->user->id)->get();
        }

    }

    public function taskEdit($task_id)
    {
        $task = Task::find($task_id);
        $this->input = $task->title;
        $this->editId = $task_id;
    }

    public function taskUpdate()
    {
        if($this->editId){
            $task = Task::find($this->editId);
            $task->title = $this->input;
            $task->save();
            $this->tasks = Task::where('user_id',$this->user->id)->get();
            $this->editId = 0;
            $this->input = '';

        }
    }
    public function cancelEdit()
    {
        $this->editId = 0;
    }

    public function taskDelete($task_id)
    {
        Task::where('id',$task_id)->delete();
        $this->tasks = $this->tasks->where('id','!=',$task_id);
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
