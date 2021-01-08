<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Users for Backend Software</h1>
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
            <!-- View Users Area -->
            <div class="col-sm-9">

                <table class="table table-hover table-inverse">
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
                            <td @if($user->last_login_at == null)class="text-danger"@endif>{{$user->name}}</td>
                            <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                            <td>
                            @if (auth()->user()->id <> $user->id) <!--info Stops User from deleting own account-->
                                <form action="{{route('user.destroy', $user->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-user-times"></i> Delete
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- / View Users Area -->
            <!-- Users Summary Area -->
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Total Users = {{count($users)}}
                    </div>
                    <div class="card-body">
                        <!-- If there are some Users to display -->
                        @if(count($users) > 0)
                            <p class="card-text">
                                @foreach($titles as $title)
                                    @if($c[$title] == 0)
                                        No {{$title}}s
                                    @elseif($c[$title] == 1)
                                        {{$c[$title]}} {{$title}}
                                    @else
                                        {{$c[$title]}} {{$title}}s
                                    @endif
                                    <br>
                                @endforeach
                            </p>
                        @else
                        <!-- There are No Users to display -->
                            <h5 class="card-title">There are currently no users.</h5>
                        @endif
                    </div>
                </div>
            </div>
            <!-- / Users Summary Area -->
        </div>
        <!-- / Content Row -->

    @endsection
</x-admin-master>
