<div>
    <h1 class="text-center jumbotron">Tasks</h1>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-row">
                    <div class="col-10">
                      <input type="text" class="form-control w-100" wire:model="input">
                    </div>
                    <div class="col">
                      <button class="btn btn-outline-primary btn-block" wire:click='addTask'>Add Task</button>
                    </div>
                    
                  </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <ul class="list-group">
                    @foreach ($tasks as $task)
                        <li class="list-group-item list-group-item-success">{{ $task->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

</div>
