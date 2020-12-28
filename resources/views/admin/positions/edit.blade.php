@@ -0,0 +1,21 @@
<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Edit Position: {{$position->name}}</h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('positions.update', $position->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="name" aria-describedby="helpId" value="{{$position->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>



    @endsection
</x-admin-master>
