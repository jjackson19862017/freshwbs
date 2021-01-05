<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserArea" aria-expanded="true"
       aria-controls="collapseUserArea">
        <i class="fas fa-users"></i>
        <span>User Area</span>
    </a>
    <div id="collapseUserArea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Menu:</h6>
            <a class="collapse-item" data-toggle="modal" data-target="#addUserModal">Add User</a>
            <a class="collapse-item" href="{{route('users.index')}}">View All</a>
        </div>
    </div>
</li>

<!-- Add User Modal-->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group row">
                        <label for="username" class="col-form-label col-sm-3">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                   name="username" id="username" aria-describedby="helpId"
                                   placeholder="Enter username" value="{{old('username')}}">
                            @error('username')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-sm-3">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" id="name" aria-describedby="helpId" placeholder="Enter Name"
                                   value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-form-label col-sm-3"">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                   id="email" aria-describedby="helpId" placeholder="Enter Email"
                                   value="{{old('email')}}">
                            @error('email')
                            <div class=" invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-form-label col-sm-3">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" id="password" placeholder="" autocomplete="off">
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_confirmation" class="col-form-label col-sm-3">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   name="password_confirmation" id="password_confirmation" placeholder="">
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <button type="submit"
                            @if (Session::has('message'))
                            class="btn btn-success float-right">{{Session::get('message')}}
                        @else
                            class="btn btn-primary float-right">Create User
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
