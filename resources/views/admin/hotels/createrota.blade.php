<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Rota - Shard - Date</h1>
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Rota Creation
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="form-horizontal">
                            @csrf
                            <div class="row mb-1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Staff
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="staffmember" class="col-form-label col-sm-3">Staff Member</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="staffmember" id="staffmember">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}} {{$staff->surname}} - {{$staff->hotel}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('staffmember')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="hotel" class="col-form-label col-sm-3">Hotel</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="hotel" id="hotel">
                                                                @if ($staff->hotel == "Shard")
                                                                <option value="Shard">Shard</option>
                                                                <option value="The Mill">The Mill</option>
                                                                @else
                                                                <option value="The Mill">The Mill</option>
                                                                <option value="Shard">Shard</option>
                                                                @endif
                                                            </select>
                                                            @error('hotel')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="sickDays" class="col-form-label col-sm-3">Sick Days</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control @error('sickDays') is-invalid @enderror"
                                                                name="sickDays" id="sickDays" aria-describedby="helpId"
                                                                placeholder="Enter Sick Days" value="{{old('sickDays')}}">
                                                            @error('sickDays')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="holidays" class="col-form-label col-sm-3">Holidays</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control @error('sickDays') is-invalid @enderror"
                                                                name="holidays" id="holidays" aria-describedby="helpId"
                                                                placeholder="Enter Holidays Taken" value="{{old('holidays')}}">
                                                            @error('holidays')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Monday - <span><input type="number" id="mondayHoursOne" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="mondayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('mondayStartOne') is-invalid @enderror"
                                                                   name="mondayStartOne" id="mondayStartOne" aria-describedby="helpId"
                                                                   value="{{old('mondayStartOne')}}">
                                                            @error('mondayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="mondayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('mondayFinishOne') is-invalid @enderror"
                                                                   name="mondayFinishOne" id="mondayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('mondayFinishOne')}}">
                                                            @error('mondayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="mondayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="mondayRoleOne" id="mondayRoleOne">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('mondayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="mondayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('mondayStartTwo') is-invalid @enderror"
                                                                   name="mondayStartTwo" id="mondayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('mondayStartTwo')}}">
                                                            @error('mondayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="mondayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('mondayFinishTwo') is-invalid @enderror"
                                                                   name="mondayFinishTwo" id="mondayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('mondayFinishTwo')}}">
                                                            @error('mondayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="mondayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="mondayRoleTwo" id="mondayRoleTwo">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('mondayRoleTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Tuesday - <span><input type="number" id="tuesdayHoursOne" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="tuesdayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('tuesdayStartOne') is-invalid @enderror"
                                                                   name="tuesdayStartOne" id="tuesdayStartOne" aria-describedby="helpId"
                                                                   value="{{old('tuesdayStartOne')}}">
                                                            @error('tuesdayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tuesdayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('tuesdayFinishOne') is-invalid @enderror"
                                                                   name="tuesdayFinishOne" id="tuesdayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('tuesdayFinishOne')}}">
                                                            @error('tuesdayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tuesdayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="tuesdayRoleOne" id="tuesdayRoleOne">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('tuesdayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="tuesdayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('tuesdayStartTwo') is-invalid @enderror"
                                                                   name="tuesdayStartTwo" id="tuesdayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('tuesdayStartTwo')}}">
                                                            @error('tuesdayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tuesdayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('tuesdayFinishTwo') is-invalid @enderror"
                                                                   name="tuesdayFinishTwo" id="tuesdayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('tuesdayFinishTwo')}}">
                                                            @error('tuesdayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="tuesdayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="tuesdayRoleTwo" id="tuesdayRoleTwo">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('tuesdayRoleTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Wednesday - <span><input type="number" id="wednesdayHoursOne" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="wednesdayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('wednesdayStartOne') is-invalid @enderror"
                                                                   name="wednesdayStartOne" id="wednesdayStartOne" aria-describedby="helpId"
                                                                   value="{{old('wednesdayStartOne')}}">
                                                            @error('wednesdayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="wednesdayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('wednesdayFinishOne') is-invalid @enderror"
                                                                   name="wednesdayFinishOne" id="wednesdayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('wednesdayFinishOne')}}">
                                                            @error('wednesdayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="wednesdayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="wednesdayRoleOne" id="wednesdayRoleOne">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('wednesdayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="wednesdayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('wednesdayStartTwo') is-invalid @enderror"
                                                                   name="wednesdayStartTwo" id="wednesdayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('wednesdayStartTwo')}}">
                                                            @error('wednesdayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="wednesdayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('wednesdayFinishTwo') is-invalid @enderror"
                                                                   name="wednesdayFinishTwo" id="wednesdayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('wednesdayFinishTwo')}}">
                                                            @error('wednesdayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="wednesdayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="wednesdayRoleTwo" id="wednesdayRoleTwo">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('wednesdayRoleTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Thursday - <span><input type="number" id="thursdayHoursOne" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="thursdayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('thursdayStartOne') is-invalid @enderror"
                                                                   name="thursdayStartOne" id="thursdayStartOne" aria-describedby="helpId"
                                                                   value="{{old('thursdayStartOne')}}">
                                                            @error('thursdayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="thursdayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('thursdayFinishOne') is-invalid @enderror"
                                                                   name="thursdayFinishOne" id="thursdayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('thursdayFinishOne')}}">
                                                            @error('thursdayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="thursdayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="thursdayRoleOne" id="thursdayRoleOne">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('thursdayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="thursdayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('thursdayStartTwo') is-invalid @enderror"
                                                                   name="thursdayStartTwo" id="thursdayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('thursdayStartTwo')}}">
                                                            @error('thursdayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="thursdayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('thursdayFinishTwo') is-invalid @enderror"
                                                                   name="thursdayFinishTwo" id="thursdayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('thursdayFinishTwo')}}">
                                                            @error('thursdayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="thursdayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="thursdayRoleTwo" id="thursdayRoleTwo">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('thursdayRoleTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Friday - <span><input type="number" id="fridayHoursOne" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="fridayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('fridayStartOne') is-invalid @enderror"
                                                                   name="fridayStartOne" id="fridayStartOne" aria-describedby="helpId"
                                                                   value="{{old('fridayStartOne')}}">
                                                            @error('fridayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="fridayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('fridayFinishOne') is-invalid @enderror"
                                                                   name="fridayFinishOne" id="fridayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('fridayFinishOne')}}">
                                                            @error('fridayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="fridayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="fridayRoleOne" id="fridayRoleOne">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('fridayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="fridayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('fridayStartTwo') is-invalid @enderror"
                                                                   name="fridayStartTwo" id="fridayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('fridayStartTwo')}}">
                                                            @error('fridayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="fridayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('fridayFinishTwo') is-invalid @enderror"
                                                                   name="fridayFinishTwo" id="fridayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('fridayFinishTwo')}}">
                                                            @error('fridayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fridayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="fridayRoleTwo" id="fridayRoleTwo">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('fridayRoleTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Saturday - <span><input type="number" id="saturdayHoursOne" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="saturdayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('saturdayStartOne') is-invalid @enderror"
                                                                   name="saturdayStartOne" id="saturdayStartOne" aria-describedby="helpId"
                                                                   value="{{old('saturdayStartOne')}}">
                                                            @error('saturdayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="saturdayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('saturdayFinishOne') is-invalid @enderror"
                                                                   name="saturdayFinishOne" id="saturdayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('saturdayFinishOne')}}">
                                                            @error('saturdayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="saturdayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="saturdayRoleOne" id="saturdayRoleOne">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('saturdayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="saturdayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('saturdayStartTwo') is-invalid @enderror"
                                                                   name="saturdayStartTwo" id="saturdayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('saturdayStartTwo')}}">
                                                            @error('saturdayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="saturdayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('saturdayFinishTwo') is-invalid @enderror"
                                                                   name="saturdayFinishTwo" id="saturdayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('saturdayFinishTwo')}}">
                                                            @error('saturdayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="saturdayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="saturdayRoleTwo" id="saturdayRoleTwo">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('saturdayRoleTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Sunday - <span><input type="number" id="sundayHoursOne" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="sundayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('sundayStartOne') is-invalid @enderror"
                                                                   name="sundayStartOne" id="sundayStartOne" aria-describedby="helpId"
                                                                   value="{{old('sundayStartOne')}}">
                                                            @error('sundayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="sundayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('sundayFinishOne') is-invalid @enderror"
                                                                   name="sundayFinishOne" id="sundayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('sundayFinishOne')}}">
                                                            @error('sundayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="sundayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="sundayRoleOne" id="sundayRoleOne">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('sundayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="sundayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('sundayStartTwo') is-invalid @enderror"
                                                                   name="sundayStartTwo" id="sundayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('sundayStartTwo')}}">
                                                            @error('sundayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="sundayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('sundayFinishTwo') is-invalid @enderror"
                                                                   name="sundayFinishTwo" id="sundayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('sundayFinishTwo')}}">
                                                            @error('sundayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="sundayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="sundayRoleTwo" id="sundayRoleTwo">
                                                                @foreach ($staffMember as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->forename}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('sundayRoleTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary float-right">Insert</button>
                        </form>

                        </div>









            </div>
        </div>

        </div>

    @endsection
</x-admin-master>
