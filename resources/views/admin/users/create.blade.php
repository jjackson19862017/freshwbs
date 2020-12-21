<x-admin-master>

@section('content')
<h1>Add New User</h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('user.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group row">
                        <label for="username" class="col-form-label col-sm-2">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" aria-describedby="helpId" placeholder="Enter username">
                            @error('username')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-sm-2">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Enter Name">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-form-label col-sm-2"">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="helpId" placeholder="Enter Email">
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
                            class="btn btn-primary">Create
                        @endif
                    </button>
                </form>
            </div>
        </div>
@endsection
</x-admin-master>
