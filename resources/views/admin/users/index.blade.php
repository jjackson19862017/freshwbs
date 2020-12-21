<x-admin-master>
    @section('content')

<h1>All Users</h1>
        <h6 class="m-0 font-weight-bold @if (Session::has('text-class'))
        {{Session::get('text-class')}}
        @endif">
            @if (Session::has('message'))
                {{Session::get('message')}}
            @endif
        </h6>

        <table class="table table-hover table-inverse table-responsive">
            <thead class="thead-dark">
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form action="{{route('user.destroy', $user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-user-times"></i> Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    @endsection
</x-admin-master>
