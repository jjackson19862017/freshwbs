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

                <table class="table table-hover table-inverse">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Personal License</th>
                        <th>Employment Type</th>
                        <th>Position</th>
                        <th>Hotel</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($staffs as $staff)
                        <tr>
                            <td>@if(auth()->user()->userHasRole('Admin'))
                                    <a href="{{route('staffs.edit', $staff)}}">{{$staff->forename}} {{$staff->surname}}</a>
                                @else
                                {{$staff->forename}} {{$staff->surname}}
                                    @endif
                            </td>
                            <td>{{$staff->telephone}}</td>
                            <td>{{$staff->email}}</td>
                            @if($staff->personallicense == 'no')
                                <td class="text-danger">{!! $personalno !!}
                                @else
                                <td class="text-success">{!! $personalyes !!}
                                @endif
                                </td>
                            <td>{{$staff->employmenttype}}</td>
                            <td>{{$staff->position}}</td>
                            <td>{{$staff->hotel}}</td>
                            <td>{{$staff->status}}</td>
                            <td>
                                <form action="{{route('staff.destroy', $staff->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i> Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-admin-master>
