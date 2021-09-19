<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as AppUser;
use App\Models\Task as AppTodo;
use Session;
class User extends Component
{
    public $users;
    public $addUserInput;

    public function addUser()
    {
         $user = AppUser::whereName($this->addUserInput)->first();
        if($this->addUserInput == ''){
            Session::flash('danger','Username is Required');
        }
       elseif($user){
            Session::flash('danger','Username Already Exist!!');
        }else{
            $u = new AppUser;
            $u->name = $this->addUserInput;
            $u->save();
            $this->users = AppUser::orderby('id','desc')->get();
        } 
    }
    public function userDelete($id)
    {
        $user = AppUser::find($id);
        $user->delete();
        AppTodo::where('user_id', $id)->delete();
        $this->users = AppUser::orderby('id','desc')->get();
    }
    public function mount()
    {
        $this->users = AppUser::orderby('id','desc')->get();
        
    }
    public function render()
    {
        return view('livewire.user');
    }
}
