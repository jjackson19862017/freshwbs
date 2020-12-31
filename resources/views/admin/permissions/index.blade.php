<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Permissions</h1>

        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Add New Permission
                    </div>
                    <div class="card-body">
                        <form action="{{route('permission.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Name of Permission">
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
                        <h6 class="m-0 font-weight-bold @if (Session::has('text-class'))
                        {{Session::get('text-class')}}@endif">
                            @if (Session::has('message'))
                                {{Session::get('message')}}
                            @endif
                        </h6>
                <table class="table table-hover table-inverse">
                    <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td><a href="{{route('permissions.edit', $permission->id)}}">{{$permission->name}}</a></td>
                                        <td>{{$permission->slug}}</td>
                                        <td><form action="{{route('permission.destroy', $permission->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection



</x-admin-master>
