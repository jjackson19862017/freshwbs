<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1>User Profile for {{$user->name}}</h1>
                <div class="col-sm-8 offset-2">

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Edit User Profile
                    </div>
                    <div class="card-body">
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
                            @if(!auth()->user()->userHasRole('Staff'))
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
                                    @if (Session::has('message'))
                                    class="btn btn-success float-right">{{Session::get('message')}}
                                @else
                                    class="btn btn-primary float-right">Update {{$user->username}}
                                @endif
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endsection
</x-admin-master>
