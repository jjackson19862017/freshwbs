<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Permissions</h1>

        <div class="row">
            <div class="col-sm-3">
                <form action="{{route('permission.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Name of Permission">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm-9">
                        <h6 class="m-0 font-weight-bold @if (Session::has('text-class'))
                        {{Session::get('text-class')}}@endif">
                            @if (Session::has('message'))
                                {{Session::get('message')}}
                            @endif
                        </h6>
                <table class="table table-hover table-inverse table-responsive">
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
