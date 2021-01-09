<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Users for Backend Software</h1>
            </div>
            <div class="col-sm-5">
                <h3 class="font-weight-bold @if (Session::has('text-class'))
                {{Session::get('text-class')}}
                @endif">
                    @if (Session::has('message'))
                        {{Session::get('message')}}
                    @endif
                </h3>
            </div>
        </div>
        <!-- / Top Row -->
        <!-- Content Row -->
        <div class="row">
            <!-- View Users Area -->
            <div class="col-sm-9">

                <table class="table table-hover table-inverse table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                @if (auth()->user()->userHasRole('Admin'))
                                    <a class="text-primary"data-toggle="modal" data-target="#editModal">{{$user->username}} <small>@foreach ($user->roles as $user_role)
                                            @if ($user_role->slug == $user_role->slug)
                                                {{$user_role->name}}
                                            @endif
                                        @endforeach</small></a>
                                @else
                                    {{$user->username}}
                                @endif
                            </td>
                            <td>{{$user->name}} @if(auth()->user()->id == 1)
                                 <small>{{$user->last_login_at}}</small>
                                @endif</td>
                            <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                            <td>
                            @if (auth()->user()->id <> $user->id)<!--info Stops User from deleting own account-->
                                <form action="{{route('user.destroy', $user->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-user-times"></i> Delete
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- / View Users Area -->
            <!-- Users Summary Area -->
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Total Users = {{count($users)}}
                    </div>
                    <div class="card-body">
                        <!-- If there are some Users to display -->
                        @if(count($users) > 0)
                            <p class="card-text">
                                @foreach($titles as $title)
                                    @if($c[$title] == 0)
                                        No {{$title}}s
                                    @elseif($c[$title] == 1)
                                        {{$c[$title]}} {{$title}}
                                    @else
                                        {{$c[$title]}} {{$title}}s
                                    @endif
                                    <br>
                                @endforeach
                            </p>
                        @else
                        <!-- There are No Users to display -->
                            <h5 class="card-title">There are currently no users.</h5>
                        @endif
                    </div>
                </div>
            </div>
            <!-- / Users Summary Area -->
        </div>
        <!-- / Content Row -->


        <!-- Edit Staff Modal-->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Staff Member?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="username" class="col-form-label col-sm-3">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" aria-describedby="helpId" placeholder="Enter your username" value="{{$user->username}}">
                                    @error('username')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label col-sm-3">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Enter your Name" value="{{$user->name}}">
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-form-label col-sm-3"">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="helpId" placeholder="Enter your Email" value="{{$user->email}}">
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            @if(auth()->user()->userHasRole('Admin'))
                                <div class="form-group row">
                                    <label for="role" class="col-form-label col-sm-3">Role</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="role" id="role">
                                            @foreach ($user->roles as $user_role)
                                                @if ($user_role->slug == $user_role->slug)
                                                    <option value="{{$user_role->id}}">{{$user_role->name}}</option>
                                                @endif
                                            @endforeach
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <div class="form-group row">
                                <label for="password" class="col-form-label col-sm-3">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="" autocomplete="off">
                                    @error('password')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-form-label col-sm-3">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <button type="submit"

                                    class="btn btn-primary float-right">Update {{$user->username}}
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    @endsection
</x-admin-master>
