<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1>{{$staff->forename}}'s Details <a class="btn btn-link" data-toggle="modal" data-target="#editModal">Edit...</a>
                    <span class="float-right">
                        <form action="{{route('staff.destroy', $staff->id)}}" method="post"
                              enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                    </button>
                                </form></span></h1>
                <div class="row">
                    <div class="col-sm-5">
                        <!-- Personal Details -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <table class="table table-sm table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td>{{$staff->forename}} {{$staff->surname}}</td>
                                            </tr>
                                            <tr>
                                                <td>Telephone:</td>
                                                <td>{{$staff->telephone}}</td>
                                            </tr>
                                            <tr>
                                                <td>E-mail:</td>
                                                <td><a href="mailto:{{$staff->email}}">{{$staff->email}}</a></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td>{{$staff->address1}}<br>
                                                    {{$staff->address2}}<br>
                                                    {{$staff->townCity}}<br>
                                                    {{$staff->county}}<br>
                                                    {{$staff->postCode}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Personal Details -->
                        <!-- Other Information -->
                        <div class="card">

                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <table class="table table-sm table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>Position:</td>
                                                <td> <a class="text-dark" data-toggle="modal" data-target="#addPositionModal">@if(count($staff->positions) != 0)
                                                        @foreach ($staff->positions as $position)
                                                            {!!$position->icon!!} {{$position->name}} <br>
                                                        @endforeach
                                                    @else
                                                        <a class="btn btn-outline-secondary text-danger btn-sm" data-toggle="modal" data-target="#addPositionModal">
                                                            Setup
                                                        </a>
                                                        @endif</a></td>
                                            </tr>
                                            <tr>
                                                <td>Personal License:</td>
                                                <td>{{$staff->getRawOriginal('personallicense')}}</td>
                                            </tr>
                                            <tr>
                                                <td>Salary / Hourly:</td>
                                                <td>{{$staff->employmenttype}}</td>
                                            </tr>
                                            <tr>
                                                <td>Hotel:</td>
                                                <td>{{$staff->hotel}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td>{{$staff->status}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Other Information -->
                    </div>
                    <div class="col-sm-7">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td>Holidays Taken:</td>
                                                    <td>{{$daysTaken}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Holidays Left:</td>
                                                    <td>{{$staff->holidaysleft}}</td>
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <td colspan=2><a class="btn btn-success" href="{{route('staffs.createHoliday', $staff)}}">Add Holiday</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-borderless table-small">
                                            <thead>
                                                <tr>
                                                    <th>Start</th>
                                                    <th>Finish</th>
                                                    <th>Days Taken</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($holidays as $hol)
                                                    <tr>
                                                    <td>{{$hol->start}}</td>
                                                    <td>{{$hol->finish}}</td>
                                                    <td>{{$hol->daystaken}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td scope="row"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Staff Positions Modal-->
        <div class="modal fade" id="addPositionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Staff Member?</h5>
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

        <!-- Edit Staff Modal-->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Staff Member?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{route('staffs.update', $staff->id)}}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="forename" class="col-form-label col-sm-4">Forename</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('forename') is-invalid @enderror"
                                                   name="forename" id="forename" aria-describedby="helpId"
                                                   placeholder="Enter Forename"
                                                   value="{{$staff->forename}}">
                                            @error('forename')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="surname" class="col-form-label col-sm-4">Surname</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('surname') is-invalid @enderror"
                                                   name="surname" id="surname" aria-describedby="helpId"
                                                   placeholder="Enter Surname"
                                                   value="{{$staff->surname}}">
                                            @error('surname')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telephone" class="col-form-label col-sm-4">Telephone</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('telephone') is-invalid @enderror"
                                                   name="telephone" id="telephone" aria-describedby="helpId"
                                                   placeholder="Enter Telephone" value="{{$staff->telephone}}">
                                            @error('telephone')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-form-label col-sm-4">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   id="email" aria-describedby="helpId" placeholder="Enter Email"
                                                   value="{{$staff->email}}">
                                            @error('email')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address1" class="col-form-label col-sm-4">Address 1</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('address1') is-invalid @enderror"
                                                   name="address1" id="address1" aria-describedby="helpId"
                                                   placeholder="Enter Address 1"
                                                   value="{{$staff->address1}}">
                                            @error('address1')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address2" class="col-form-label col-sm-4">Address 2</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('address2') is-invalid @enderror"
                                                   name="address2" id="address2" aria-describedby="helpId"
                                                   placeholder="Enter Address 2"
                                                   value="{{$staff->address2}}">
                                            @error('address2')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="townCity" class="col-form-label col-sm-4">Town / City</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('townCity') is-invalid @enderror"
                                                   name="townCity" id="townCity" aria-describedby="helpId"
                                                   placeholder="Enter Town/City"
                                                   value="{{$staff->townCity}}">
                                            @error('townCity')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="county" class="col-form-label col-sm-4">County</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('county') is-invalid @enderror"
                                                   name="county"
                                                   id="county" aria-describedby="helpId" placeholder="Enter County"
                                                   value="{{$staff->county}}">
                                            @error('county')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="postCode" class="col-form-label col-sm-4">Post Code</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('postCode') is-invalid @enderror"
                                                   name="postCode" id="postCode" aria-describedby="helpId"
                                                   placeholder="Enter Post-Code"
                                                   value="{{$staff->postCode}}">
                                            @error('postCode')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>



                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="personallicense" class="col-form-label col-sm-4">Personal
                                            License</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="personallicense" id="personallicense">
                                                @if($staff->personallicense=='yes')
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                @else
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="employmenttype" class="col-form-label col-sm-4">Employment
                                            Type</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="employmenttype" id="employmenttype">
                                                @if($staff->employmenttype == "Salary")
                                                    <option value="Salary">Salary</option>
                                                    <option value="Hourly">Hourly</option>
                                                @else
                                                    <option value="Hourly">Hourly</option>
                                                    <option value="Salary">Salary</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hotel" class="col-form-label col-sm-4">Hotel</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="hotel" id="hotel">
                                                @if($staff->hotel == "Shard")
                                                    <option value="Shard">Shard</option>
                                                    <option value="The Mill">The Mill</option>
                                                @else
                                                    <option value="The Mill">The Mill</option>
                                                    <option value="Shard">Shard</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-form-label col-sm-4">Status</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="status" id="status">
                                                @if($staff->status == "Employed")
                                                    <option value="Employed">Employed</option>
                                                    <option value="Furloughed">Furloughed</option>
                                                    <option value="Not Employed">Not Employed</option>
                                                @elseif($staff->status == "Furloughed")
                                                    <option value="Furloughed">Furloughed</option>
                                                    <option value="Employed">Employed</option>
                                                    <option value="Not Employed">Not Employed</option>
                                                @else
                                                    <option value="Not Employed">Not Employed</option>
                                                    <option value="Employed">Employed</option>
                                                    <option value="Furloughed">Furloughed</option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="holidaysleft" class="col-form-label col-sm-4">Holidays Left: </label>
                                        <div class="col-sm-8">
                                            <input type="number"
                                                   class="form-control @error('holidaysleft') is-invalid @enderror"
                                                   name="holidaysleft" id="holidaysleft" aria-describedby="helpId"
                                                   placeholder="Holiday days left to take"
                                                   value="{{$staff->holidaysleft}}">
                                            @error('holidaysleft')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit"
                                            @if (Session::has('message'))
                                            class="btn btn-success float-right">{{Session::get('message')}}
                                        @else
                                            class="btn btn-primary float-right">Update
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
</x-admin-master>
