<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Staff List - The Mill</h1>
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
            <!-- Staff Table Area -->
            <div class="col-sm-9">
                <table class="table table-hover table-inverse table-sm">
                    <thead class="thead-dark text-center">
                    <tr>
                        <th>Name</th>
                        <th>Telephone</th>
                        <th>Personal License</th>
                        <th>Employment Type</th>
                        <th>Position</th>

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
                            <td>@if(!auth()->user()->userHasRole('Staff'))
                                    <a href="{{route('staffs.profile', $staff)}}">{{$staff->forename}} {{$staff->surname}}</a>
                                @else
                                    {{$staff->forename}} {{$staff->surname}}
                                @endif
                            </td>
                            <td>{{$staff->telephone}}</td>
                            <td class="h4"><a class="text-dark"
                                              href="{{route('staff.PL', $staff)}}">{!! '<i class="fas fa-'!!}{{$staff->personallicense}}{!!'"></i>' !!}
                                </a>
                            </td>
                            <td>{{$staff->employmenttype}}</td>
                            <td><a class="text-dark" data-toggle="modal" data-target="#addPositionModal">
                                    @if(count($staff->positions) != 0)
                                    @foreach ($staff->positions as $position)
                                        {!!$position->icon!!}
                                    @endforeach
                                    @else
                                        <a class="btn btn-outline-secondary text-danger btn-sm" data-toggle="modal" data-target="#addPositionModal">
                                            Setup
                                        </a>
                                        @endif
                                </a></td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- / Staff Table Area -->
            <!-- Legend Table Area -->
            <div class="col-sm-3">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Legend
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-inverse table-sm text-center">
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
            <!-- / Legend Table Area -->
        </div>
        <!-- Content Row -->

        <!-- Change Staff Positions Modal-->
        <div class="modal fade" id="addPositionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Staff Member?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row row-cols-2 row-cols-md-1">

                            @foreach ($positions as $position)
                                <div class="col-sm-6 mb-1">
                                    <div class="card mx-auto">
                                        <div class="card-body py-1 no-gutters">
                                            <h3 class="h6 text-center">{!!$position->icon!!} {{$position->name}}</h3>
                                            @if(!$staff->positions->contains($position))
                                                <form class="align-middle"
                                                      action="{{route('staff.position.attach', $staff->id)}}"
                                                      method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" name="position" id="position"
                                                               value="{{$position->id}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block">Assign

                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{route('staff.position.detach', $staff->id)}}"
                                                      method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" name="position" id="position"
                                                               value="{{$position->id}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-danger btn-block">Unassign

                                                    </button>
                                                </form>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
</x-admin-master>
