@@ -0,0 +1,21 @@
<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Edit Role: {{$role->name}}</h1>
        <div class="row">
            <div class="col-sm-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Edit Role ...
            </div>
            <div class="card-body">
                <form action="{{route('roles.update', $role->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="name" aria-describedby="helpId" value="{{$role->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
            </div>
            </form>
            </div>
        </div>


        </div>

        @if (!$permissions->isEmpty())
            <table class="table table-hover table-inverse table-responsive">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Delete</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{$permission->id}}</td>
                        <td class="@if ($role->permissions->contains($permission))
                                    alert alert-success
                                    @else
                                    alert alert-danger
                                    @endif">
                            {{$permission->name}}</td>
                        <td>{{$permission->slug}}</td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                        <td>@if (!$role->permissions->contains($permission))
                                <form action="{{route('role.permission.attach', $permission->id)}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="permission" id="permission" value="{{$role->id}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Attach</button>
                                </form>
                            @else
                                <form action="{{route('role.permission.detach', $permission->id)}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="permission" id="permission" value="{{$role->id}}">
                                    </div>
                                    <button type="submit" class="btn btn-danger">Detach</button>
                                </form>
                            @endif</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif

    @endsection
</x-admin-master>
