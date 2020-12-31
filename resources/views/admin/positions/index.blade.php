<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Add New Position
                    </div>
                    <div class="card-body">
                        <form action="{{route('position.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Name of position">
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" id="icon" aria-describedby="helpId" placeholder="Icon String">
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <h6 class="m-0 font-weight-bold text-success">
                                @if (Session::has('message'))
                                    {{Session::get('message')}}
                                @endif
                            </h6>

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
                        <th>Icon</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td><a href="{{route('positions.edit', $position->id)}}">{{$position->name}}</a></td>
                            <td>{{$position->slug}}</td>
                            <td class="h3">{!!$position->icon!!}</td>
                        <td>
                            <form action="{{route('position.destroy', $position->id)}}" method="post" enctype="multipart/form-data">
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
    @endsection



</x-admin-master>
