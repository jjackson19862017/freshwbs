<x-admin-master>
    @section('content')
        <div class="row">
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
                <h6 class="m-0 font-weight-bold text-danger">
                    @if (Session::has('message'))
                        {{Session::get('message')}}
                    @endif
                </h6>
            </div>
    @endsection



</x-admin-master>
