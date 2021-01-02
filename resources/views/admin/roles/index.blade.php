<x-admin-master>
    @section('content')
        <!-- Top Row -->
            <div class="row">
                <div class="col-sm-7">
                    <h1>Roles</h1>
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
            <!-- Add Role Area -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Add New Role
                    </div>
                    <div class="card-body">
                        <form action="{{route('role.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Name of Role">
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
            <!-- / Add Role Area -->
            <!-- View Role Area -->
            <div class="col-sm-7 offset-1">
                <table class="table table-hover table-inverse">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
                            <td>{{$role->slug}}</td>
                        <td>
                            <form action="{{route('role.destroy', $role->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- / View Role Area -->
        </div>
            <!-- / Content Row -->
        @endsection


</x-admin-master>
