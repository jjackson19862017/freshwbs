<x-admin-master>
    @section('content')


        <div class="row">
            <div class="col-sm-6">
                <h1>User Profile for {{$user->username}}</h1>
                <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="username" class="col-form-label col-sm-2">Username</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" aria-describedby="helpId" placeholder="Enter your username" value="{{$user->username}}">
                        @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-sm-2">Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Enter your Name" value="{{$user->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-form-label col-sm-2"">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="helpId" placeholder="Enter your Email" value="{{$user->email}}">
                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-form-label col-sm-2">Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="" autocomplete="off">
                        @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_confirmation" class="col-form-label col-sm-2">Confirm Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="">
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        </div>
                    </div>

                    <button type="submit"
                        @if (Session::has('message'))
                            class="btn btn-success">{{Session::get('message')}}
                        @else
                            class="btn btn-primary">Update
                        @endif
                    </button>
                </form>
            </div>

            <div class="col-sm-4 offset-1">
                @if(!auth()->user()->userHasRole('Staff'))
                <h1>Roles</h1>
                <table class="table table-hover table-inverse table-responsive">
                    <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td>
                                            @if (!$user->roles->contains($role))
                                                <form action="{{route('user.role.attach', $user->id)}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" name="role" id="role" value="{{$role->id}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-sm">Attach</button>
                                                </form>
                                            @else
                                                <form action="{{route('user.role.detach', $user->id)}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" name="role" id="role" value="{{$role->id}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-danger btn-sm">Detach</button>
                                                </form>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </div>



    @endsection
</x-admin-master>
