<x-admin-master>
    @section('content')
<div class="row">
    <div class="col-sm-8">
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
                <th>Role</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td> @foreach ($user->roles as $user_role)
                        @if ($user_role->slug == $user_role->slug)
                            {{$user_role->name}}
                        @endif
                    @endforeach</td>
                <td>
                @if (auth()->user()->userHasRole('Admin'))
                    <a href="{{route('user.profile.show', $user)}}">{{$user->username}}</a>
                @else
                    {{$user->username}}
                @endif
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                @if (auth()->user()->id <> $user->id) <!--info Stops User from deleting own account-->
                    <form action="{{route('user.destroy', $user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i> Delete</button>
                    </form>
                @endif

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-3 offset-1">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Users
            </div>
            <div class="card-body">
                @if($count > 0)
                <h5 class="card-title">There are currently {{$count}} users.</h5>
                <p class="card-text">@if($admins == 0) No Admins @elseif($admins == 1){{$admins}} Admin @else {{$admins}}  Admins @endif <br>
                @if($owners == 0) No Owners @elseif($owners == 1){{$owners}} Owner @else {{$owners}} Owners @endif <br>
                @if($managers == 0) No Mangers @elseif($managers == 1){{$managers}} Manager @else {{$managers}}  Managers @endif <br>
                @if($staffs == 0) No Members of Staff @elseif($staffs == 1){{$staffs}} Staff Member @else {{$staffs}} Staff Members @endif</p>
                @else
                    <h5 class="card-title">There are currently no users.</h5>
                @endif
            </div>
        </div>
    </div>
</div>
    @endsection
</x-admin-master>
