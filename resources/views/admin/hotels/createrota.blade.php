<x-admin-master>
    @section('scripts')
    <!-- Time -->
    <script src="{{asset('js/moment.js')}}"></script>
@endsection

@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Rota - {{now()->format('D d M Y')}}</h1>
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
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <form action="{{route('hotels.rota.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row mb-1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            {{$staff->forename}} {{$staff->surname}}
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="hidden" class="form-control" name="staffid" id="staffid" value="{{$staff->id}}">
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
                                                    <div class="form-group row">
                                                        <label for="WeekCommencing" class="col-form-label col-sm-3">Week Start</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="WeekCommencing" id="WeekCommencing">
                                                                @foreach ($availableDates as $item)
                                                                <option value={{$item}}>{{$item}}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('WeekCommencing')
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
                                                                placeholder="Enter Sick Days" value="0">
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
                                                                placeholder="Enter Holidays Taken" value="0">
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
                                            Monday - <span><input type="number" id="MondayHours" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row" >
                                                        <label for="MondayStartOne" class="col-form-label col-sm-3" id="MS1">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('MondayStartOne') is-invalid @enderror monday MondayStartOne"
                                                                   name="MondayStartOne" id="MondayStartOne" aria-describedby="helpId"
                                                                   value="{{old('MondayStartOne')}}">
                                                            @error('MondayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" >
                                                        <label for="MondayFinishOne" class="col-form-label col-sm-3" id="MS2">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('MondayFinishOne') is-invalid @enderror monday MondayFinishOne"
                                                                   name="MondayFinishOne" id="MondayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('MondayFinishOne')}}">
                                                            @error('MondayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="MondayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="MondayRoleOne" id="MondayRoleOne" onchange="MOV('MondayRoleOne','MS1','MondayStartOne','MS2','MondayFinishOne')">
                                                                @foreach ($MondayRoleOne as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('MondayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row" id="MS3">
                                                        <label for="MondayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('MondayStartTwo') is-invalid @enderror monday MondayStartTwo"
                                                                   name="MondayStartTwo" id="MondayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('MondayStartTwo')}}">
                                                            @error('MondayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="MS4">
                                                        <label for="MondayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('MondayFinishTwo') is-invalid @enderror monday MondayFinishTwo"
                                                                   name="MondayFinishTwo" id="MondayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('MondayFinishTwo')}}">
                                                            @error('MondayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="MondayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="MondayRoleTwo" id="MondayRoleTwo">
                                                                @foreach ($MondayRoleTwo as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('MondayRoleTwo')
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
                                            Tuesday - <span><input type="number" id="TuesdayHours" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="TuesdayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('TuesdayStartOne') is-invalid @enderror tuesday TuesdayStartOne"
                                                                   name="TuesdayStartOne" id="TuesdayStartOne" aria-describedby="helpId"
                                                                   value="{{old('TuesdayStartOne')}}">
                                                            @error('TuesdayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="TuesdayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('TuesdayFinishOne') is-invalid @enderror tuesday TuesdayFinishOne"
                                                                   name="TuesdayFinishOne" id="TuesdayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('TuesdayFinishOne')}}">
                                                            @error('TuesdayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="TuesdayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="TuesdayRoleOne" id="TuesdayRoleOne">
                                                                @foreach ($TuesdayRoleOne as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('TuesdayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="TuesdayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('TuesdayStartTwo') is-invalid @enderror tuesday TuesdayStartTwo"
                                                                   name="TuesdayStartTwo" id="TuesdayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('TuesdayStartTwo')}}">
                                                            @error('TuesdayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="TuesdayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('TuesdayFinishTwo') is-invalid @enderror tuesday TuesdayFinishTwo"
                                                                   name="TuesdayFinishTwo" id="TuesdayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('TuesdayFinishTwo')}}">
                                                            @error('TuesdayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="TuesdayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="TuesdayRoleTwo" id="TuesdayRoleTwo">
                                                                @foreach ($TuesdayRoleTwo as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('TuesdayRoleTwo')
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
                                            Wednesday - <span><input type="number" id="WednesdayHours" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="WednesdayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('WednesdayStartOne') is-invalid @enderror wednesday WednesdayStartOne"
                                                                   name="WednesdayStartOne" id="WednesdayStartOne" aria-describedby="helpId"
                                                                   value="{{old('WednesdayStartOne')}}">
                                                            @error('WednesdayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="WednesdayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('WednesdayFinishOne') is-invalid @enderror wednesday WednesdayFinishOne"
                                                                   name="WednesdayFinishOne" id="WednesdayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('WednesdayFinishOne')}}">
                                                            @error('WednesdayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="WednesdayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="WednesdayRoleOne" id="WednesdayRoleOne">
                                                                @foreach ($WednesdayRoleOne as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('WednesdayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="WednesdayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('WednesdayStartTwo') is-invalid @enderror wednesday WednesdayStartTwo"
                                                                   name="WednesdayStartTwo" id="WednesdayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('WednesdayStartTwo')}}">
                                                            @error('WednesdayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="WednesdayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('WednesdayFinishTwo') is-invalid @enderror wednesday WednesdayFinishTwo"
                                                                   name="WednesdayFinishTwo" id="WednesdayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('WednesdayFinishTwo')}}">
                                                            @error('WednesdayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="WednesdayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="WednesdayRoleTwo" id="WednesdayRoleTwo">
                                                                @foreach ($WednesdayRoleTwo as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('WednesdayRoleTwo')
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
                                            Thursday - <span><input type="number" id="ThursdayHours" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="ThursdayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('ThursdayStartOne') is-invalid @enderror thursday ThursdayStartOne"
                                                                   name="ThursdayStartOne" id="ThursdayStartOne" aria-describedby="helpId"
                                                                   value="{{old('ThursdayStartOne')}}">
                                                            @error('ThursdayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="ThursdayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('ThursdayFinishOne') is-invalid @enderror thursday ThursdayFinishOne"
                                                                   name="ThursdayFinishOne" id="ThursdayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('ThursdayFinishOne')}}">
                                                            @error('ThursdayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="ThursdayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="ThursdayRoleOne" id="ThursdayRoleOne">
                                                                @foreach ($ThursdayRoleOne as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('ThursdayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="ThursdayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('ThursdayStartTwo') is-invalid @enderror thursday ThursdayStartTwo"
                                                                   name="ThursdayStartTwo" id="ThursdayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('ThursdayStartTwo')}}">
                                                            @error('ThursdayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="ThursdayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('ThursdayFinishTwo') is-invalid @enderror thursday ThursdayFinishTwo"
                                                                   name="ThursdayFinishTwo" id="ThursdayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('ThursdayFinishTwo')}}">
                                                            @error('ThursdayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="ThursdayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="ThursdayRoleTwo" id="ThursdayRoleTwo">
                                                                @foreach ($ThursdayRoleTwo as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('ThursdayRoleTwo')
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
                                            Friday - <span><input type="number" id="FridayHours" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="FridayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('FridayStartOne') is-invalid @enderror friday FridayStartOne"
                                                                   name="FridayStartOne" id="FridayStartOne" aria-describedby="helpId"
                                                                   value="{{old('FridayStartOne')}}">
                                                            @error('FridayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="FridayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('FridayFinishOne') is-invalid @enderror friday FridayFinishOne"
                                                                   name="FridayFinishOne" id="FridayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('FridayFinishOne')}}">
                                                            @error('FridayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="FridayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="FridayRoleOne" id="FridayRoleOne">
                                                                @foreach ($FridayRoleOne as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('FridayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="FridayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('FridayStartTwo') is-invalid @enderror friday FridayStartTwo"
                                                                   name="FridayStartTwo" id="FridayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('FridayStartTwo')}}">
                                                            @error('FridayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="FridayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('FridayFinishTwo') is-invalid @enderror friday FridayFinishTwo"
                                                                   name="FridayFinishTwo" id="FridayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('FridayFinishTwo')}}">
                                                            @error('FridayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="FridayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="FridayRoleTwo" id="FridayRoleTwo">
                                                                @foreach ($FridayRoleTwo as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('FridayRoleTwo')
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
                                            Saturday - <span><input type="number" id="SaturdayHours" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="SaturdayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('SaturdayStartOne') is-invalid @enderror saturday SaturdayStartOne"
                                                                   name="SaturdayStartOne" id="SaturdayStartOne" aria-describedby="helpId"
                                                                   value="{{old('SaturdayStartOne')}}">
                                                            @error('SaturdayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="SaturdayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('SaturdayFinishOne') is-invalid @enderror saturday SaturdayFinishOne"
                                                                   name="SaturdayFinishOne" id="SaturdayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('SaturdayFinishOne')}}">
                                                            @error('SaturdayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="SaturdayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="SaturdayRoleOne" id="SaturdayRoleOne">
                                                                @foreach ($SaturdayRoleOne as $item)
                                                                <option value="{{$item}}">{{$item}}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('SaturdayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="SaturdayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('SaturdayStartTwo') is-invalid @enderror saturday SaturdayStartTwo"
                                                                   name="SaturdayStartTwo" id="SaturdayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('SaturdayStartTwo')}}">
                                                            @error('SaturdayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="SaturdayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('SaturdayFinishTwo') is-invalid @enderror saturday SaturdayFinishTwo"
                                                                   name="SaturdayFinishTwo" id="SaturdayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('SaturdayFinishTwo')}}">
                                                            @error('SaturdayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="SaturdayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="SaturdayRoleTwo" id="SaturdayRoleTwo">
                                                                @foreach ($SaturdayRoleTwo as $item)
                                                                <option value="{{$item}}">{{$item}}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('SaturdayRoleTwo')
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
                                            Sunday - <span><input type="number" id="SundayHours" disabled="disabled" class="text-right"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="SundayStartOne" class="col-form-label col-sm-3">1st Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('SundayStartOne') is-invalid @enderror sunday SundayStartOne"
                                                                   name="SundayStartOne" id="SundayStartOne" aria-describedby="helpId"
                                                                   value="{{old('SundayStartOne')}}">
                                                            @error('SundayStartOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="SundayFinishOne" class="col-form-label col-sm-3">1st Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('SundayFinishOne') is-invalid @enderror sunday SundayFinishOne"
                                                                   name="SundayFinishOne" id="SundayFinishOne" aria-describedby="helpId"
                                                                   value="{{old('SundayFinishOne')}}">
                                                            @error('SundayFinishOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="SundayRoleOne" class="col-form-label col-sm-3">1st Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="SundayRoleOne" id="SundayRoleOne">
                                                                @foreach ($SundayRoleOne as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('SundayRoleOne')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="SundayStartTwo" class="col-form-label col-sm-3">2nd Start</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('SundayStartTwo') is-invalid @enderror sunday SundayStartTwo"
                                                                   name="SundayStartTwo" id="SundayStartTwo" aria-describedby="helpId"
                                                                   value="{{old('SundayStartTwo')}}">
                                                            @error('SundayStartTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="SundayFinishTwo" class="col-form-label col-sm-3">2nd Finish</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" class="form-control @error('SundayFinishTwo') is-invalid @enderror sunday SundayFinishTwo"
                                                                   name="SundayFinishTwo" id="SundayFinishTwo" aria-describedby="helpId"
                                                                   value="{{old('SundayFinishTwo')}}">
                                                            @error('SundayFinishTwo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="SundayRoleTwo" class="col-form-label col-sm-3">2nd Role</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="SundayRoleTwo" id="SundayRoleTwo">
                                                                @foreach ($SundayRoleTwo as $item)
                                                                    <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('SundayRoleTwo')
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
    @section('js')
<script>
function MOV(i,n,o,p,q) {
    var i = document.getElementById(i).value;
    //console.log(i, n);
    switch (i) {
        case 'Off':
        case 'Sick':
        case 'Holiday':
            document.getElementById(n).style.display = "none";
            document.getElementById(o).style.display = "none";
            document.getElementById(p).style.display = "none";
            document.getElementById(q).style.display = "none";
        break;
        default:
            document.getElementById(n).style.display = "inline-block";
            document.getElementById(o).style.display = "block";
            document.getElementById(p).style.display = "inline-block";
            document.getElementById(q).style.display = "block";
    }
}

 $(document).ready(function(){

    document.getElementById("MS1").style.display = "none";
    document.getElementById("MondayStartOne").style.display = "none";
    document.getElementById("MS2").style.display = "none";
    document.getElementById("MondayFinishOne").style.display = "none";











     function CalcHours(start1,finish1,start2,finish2){
        var S1 = moment.utc(start1.val(), 'hh:mm'); // Takes Start Time 1
        var F1 = moment.utc(finish1.val(), 'hh:mm'); // Takes Finish Time 1
        var S2 = moment.utc(start2.val(), 'hh:mm'); // Takes Start Time 2
        var F2 = moment.utc(finish2.val(), 'hh:mm'); // Takes Finsh Time 2
        var H1 = parseFloat(((F1 - S1) / 60 / 60 / 1000).toFixed(1)); // Converts Result to Hours
        var H2 = parseFloat(((F2 - S2) / 60 / 60 / 1000).toFixed(1)); // Converts Result to Hours
        // Runs a check to see if the second time is a Number or Not
        if(isNaN(H2)){
            var TH = H1;
        } else { var TH = H1 + H2;}
        return TH; // Returns Total Hours
     }

    $(".monday").keyup(function(){
        //console.log(CalcHours($(".MondayStartOne"),$(".MondayFinishOne"),$(".MondayStartTwo"),$(".MondayFinishTwo")));
        $("#MondayHours").val(CalcHours($(".MondayStartOne"),$(".MondayFinishOne"),$(".MondayStartTwo"),$(".MondayFinishTwo")));
    });

    $(".tuesday").keyup(function(){
        //console.log(CalcHours($(".TuesdayStartOne"),$(".TuesdayFinishOne"),$(".TuesdayStartTwo"),$(".TuesdayFinishTwo")));
        $("#TuesdayHours").val(CalcHours($(".TuesdayStartOne"),$(".TuesdayFinishOne"),$(".TuesdayStartTwo"),$(".TuesdayFinishTwo")));
    });

    $(".wednesday").keyup(function(){
        //console.log(CalcHours($(".WednesdayStartOne"),$(".WednesdayFinishOne"),$(".WednesdayStartTwo"),$(".WednesdayFinishTwo")));
        $("#WednesdayHours").val(CalcHours($(".WednesdayStartOne"),$(".WednesdayFinishOne"),$(".WednesdayStartTwo"),$(".WednesdayFinishTwo")));
    });

    $(".thursday").keyup(function(){
        //console.log(CalcHours($(".ThursdayStartOne"),$(".ThursdayFinishOne"),$(".ThursdayStartTwo"),$(".ThursdayFinishTwo")));
        $("#ThursdayHours").val(CalcHours($(".ThursdayStartOne"),$(".ThursdayFinishOne"),$(".ThursdayStartTwo"),$(".ThursdayFinishTwo")));
    });

    $(".friday").keyup(function(){
        //console.log(CalcHours($(".FridayStartOne"),$(".FridayFinishOne"),$(".FridayStartTwo"),$(".FridayFinishTwo")));
        $("#FridayHours").val(CalcHours($(".FridayStartOne"),$(".FridayFinishOne"),$(".FridayStartTwo"),$(".FridayFinishTwo")));
    });

    $(".saturday").keyup(function(){
        //console.log(CalcHours($(".SaturdayStartOne"),$(".SaturdayFinishOne"),$(".SaturdayStartTwo"),$(".SaturdayFinishTwo")));
        $("#SaturdayHours").val(CalcHours($(".SaturdayStartOne"),$(".SaturdayFinishOne"),$(".SaturdayStartTwo"),$(".SaturdayFinishTwo")));
    });

    $(".sunday").keyup(function(){
        //console.log(CalcHours($(".SundayStartOne"),$(".SundayFinishOne"),$(".SundayStartTwo"),$(".SundayFinishTwo")));
        $("#SundayHours").val(CalcHours($(".SundayStartOne"),$(".SundayFinishOne"),$(".SundayStartTwo"),$(".SundayFinishTwo")));
    });


});
</script>
    @endsection
</x-admin-master>
