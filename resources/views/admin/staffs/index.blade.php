<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-9">
                    <h6 class="m-0 font-weight-bold @if (Session::has('text-class'))
                    {{Session::get('text-class')}}
                    @endif">
                        @if (Session::has('message'))
                            {{Session::get('message')}}
                        @endif
                    </h6>

                    <table class="table table-hover table-inverse table-sm">
                        <thead class="thead-dark text-center">
                        <tr>
                            <th>Name</th>
                            <th>Telephone</th>
                            <th>Personal License</th>
                            <th>Employment Type</th>
                            <th>Position</th>
                            <th>Hotel</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($staffs as $staff)
                            <tr
                            @if($staff->status == "Employed")
                                class="alert-success"
                            @elseif($staff->status == "Furloughed")
                            class="alert-warning"
                            @else
                            class="alert-danger"
                                @endif>
                                <td>@if(auth()->user()->userHasRole('Admin'))
                                        <a href="{{route('staffs.edit', $staff)}}">{{$staff->forename}} {{$staff->surname}}</a>
                                    @else
                                        {{$staff->forename}} {{$staff->surname}}
                                    @endif
                                </td>
                                <td>{{$staff->telephone}}</td>
                                    <td class="h4">{!! '<i class="fas fa-'!!}{{$staff->personallicense}}{!!'"></i>' !!}

                                    </td>
                                    <td>{{$staff->employmenttype}}</td>
                                    <td>@foreach ($staff->positions as $position)
                                            {!!$position->icon!!}
                                        @endforeach</td>
                                    <td>{{$staff->hotel}}</td>
                                    <td>
                                        <form action="{{route('staff.destroy', $staff->id)}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-user-times"></i> Delete
                                            </button>
                                        </form>

                                    </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="col-sm-3">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Legend
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-inverse table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Position</th>
                                    <th>Icon</th>
                                </tr>

                                </thead>
                                <tbody class="text-center">

                                @foreach($positions as $position)
                                    <tr>
                                        <td>{{$position->name}}</td>
                                        <td>{!!$position->icon!!}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <hr>
                            <table class="table table-hover table-inverse table-sm">
                                <thead class="thead-dark text-center">
                                <tr>
                                    <th>Status</th>
                                </tr>

                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td class="alert-success">Employed</td>
                                    </tr>
                                    <tr>
                                        <td class="alert-warning">Furloughed</td>
                                    </tr>
                                    <tr>
                                        <td class="alert-danger">Not Employed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
</x-admin-master>
