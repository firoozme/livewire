<div>
    <h1 class="text-center jumbotron">Tasks</h1>
    <div class="row my-5">
        <div class="col-sm-12">
            @if(session()->has('danger'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('danger') }}
              </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>    
    <div class="row">
            <div class="col-sm-12">
                <div class="form-row">
                    <div class="col-10">
                      <input type="text" class="form-control w-100" wire:model="input">
                    </div>
                    {!! $editId ? '<div class="col"><button class="btn btn-danger" wire:click="cancelEdit()">Cancel</button></div>':'' !!} 
                    <div class="col">
                      <button class="btn btn-outline-{{ $editId ? 'warning': 'primary'}} btn-block" wire:click='{{ $editId ? 'taskUpdate': 'addTask'}}'>{{ $editId ? 'Edit': 'Add'}} Task</button>
                    </div>
                    
                    
                    
                  </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <ul class="list-group">
                    @foreach ($tasks as $task)
                        <li class="list-group-item list-group-item-success">{{ $task->title }} <button class="btn btn-warning float-right mx-1"  wire:click="taskEdit({{ $task->id }})">Edit</button><button class="btn btn-danger float-right mx-1" wire:click="taskDelete({{ $task->id }})">Delete</button></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <a href="{{route('users')}}" class="btn btn-info mt-3">Back</a>

</div>
