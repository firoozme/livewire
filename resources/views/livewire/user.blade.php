<div>
    <div class="jumbotron text-center">
        <h1>Users</h1>
    </div>
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
                  <input type="text" class="form-control w-100" wire:model="addUserInput">
                </div>
                <div class="col">
                  <button class="btn btn-outline-primary btn-block" wire:click='addUser'>Add User</button>
                </div>
           
              </div>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-sm-12">
            <ul class="list-group">
                @foreach ($users as $user)
                    <li class="list-group-item @if($loop->index % 2 == 0) {{ "list-group-item-warning" }} @endif">
                        
                            <button class="btn btn-danger btn-sm mx-3" wire:click="userDelete({{ $user->id }})">Delete</button>
                            {{ $user->name }}
                            <a href="{{ route('user.task',['id'=>$user->id]) }}" class="w-100">
                                <span class="badge badge-primary badge-pill float-right">{{ count($user->tasks) }}</span>
                             </a>
                    </li>
                @endforeach
                
              </ul>
        </div>
    </div>
        
</div>
