<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Rota - Shard - {{$thisweekdate}}</h1>
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
                <table class="table table-sm text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Staff</th>
                            @foreach ($days as $day)
                            <th colspan="2">{{$day}}</th>
                            @endforeach
                            <th>Hours</th>
                            <th>JS</th>
                            <th>Sick</th>
                            <th>Holidays</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thisWeeksRota as $rota)
                        <tr>
                            <td rowspan="3" class="align-middle">

                                {{$rota->getStaffDetailsAttribute()->first()->forename}} <br>
                                {{$rota->getStaffDetailsAttribute()->first()->surname}}


                                </td>



                            <td>{{$rota->MondayStartOne}}</td>
                            <td>{{$rota->MondayFinishOne}}</td>
                            <td>{{$rota->TuesdayStartOne}}</td>
                            <td>{{$rota->TuesdayFinishOne}}</td>
                            <td>{{$rota->WednesdayStartOne}}</td>
                            <td>{{$rota->WednesdayFinishOne}}</td>
                            <td>{{$rota->ThursdayStartOne}}</td>
                            <td>{{$rota->ThursdayFinishOne}}</td>
                            <td>{{$rota->FridayStartOne}}</td>
                            <td>{{$rota->FridayFinishOne}}</td>
                            <td>{{$rota->SaturdayStartOne}}</td>
                            <td>{{$rota->SaturdayFinishOne}}</td>
                            <td>{{$rota->SundayStartOne}}</td>
                            <td>{{$rota->SundayFinishOne}}</td>
                            <td rowspan="3" class="align-middle">{{$rota->TotalHours}}</td>
                            <td rowspan="3" class="align-middle">{{$rota->JSHours}}</td>
                            <td rowspan="3" class="align-middle">{{$rota->SickDays}}</td>
                            <td rowspan="3" class="align-middle">{{$rota->HolidayDays}}</td>
                        </tr>
                        <tr>
                            <td>{{$rota->MondayStartTwo}}</td>
                            <td>{{$rota->MondayFinishTwo}}</td>
                            <td>{{$rota->TuesdayStartTwo}}</td>
                            <td>{{$rota->TuesdayFinishTwo}}</td>
                            <td>{{$rota->WednesdayStartTwo}}</td>
                            <td>{{$rota->WednesdayFinishTwo}}</td>
                            <td>{{$rota->ThursdayStartTwo}}</td>
                            <td>{{$rota->ThursdayFinishTwo}}</td>
                            <td>{{$rota->FridayStartTwo}}</td>
                            <td>{{$rota->FridayFinishTwo}}</td>
                            <td>{{$rota->SaturdayStartTwo}}</td>
                            <td>{{$rota->SaturdayFinishTwo}}</td>
                            <td>{{$rota->SundayStartTwo}}</td>
                            <td>{{$rota->SundayFinishTwo}}</td>
                        </tr>
                        <tr>

                            <td>
                                @if($rota->MondayRoleOne == $rota->MondayRoleTwo)
                                {{$rota->MondayRoleOne}}
                                @elseif($rota->MondayRoleTwo == "Off")
                                {{$rota->MondayRoleOne}}
                                @else
                                {{$rota->MondayRoleOne}} / {{$rota->MondayRoleTwo}}
                                @endif
                            </td>
                            <td>{{$rota->MondayHours}}</td>
                            <td>
                                @if($rota->TuesdayRoleOne == $rota->TuesdayRoleTwo)
                                {{$rota->TuesdayRoleOne}}
                                @elseif($rota->TuesdayRoleTwo == "Off")
                                {{$rota->TuesdayRoleOne}}
                                @else
                                {{$rota->TuesdayRoleOne}} / {{$rota->TuesdayRoleTwo}}
                                @endif
                            </td>
                            <td>{{$rota->TuesdayHours}}</td>
                            <td>
                                @if($rota->WednesdayRoleOne == $rota->WednesdayRoleTwo)
                                {{$rota->WednesdayRoleOne}}
                                @elseif($rota->WednesdayRoleTwo == "Off")
                                {{$rota->WednesdayRoleOne}}
                                @else
                                {{$rota->WednesdayRoleOne}} / {{$rota->WednesdayRoleTwo}}
                                @endif
                            </td>
                            <td>{{$rota->WednesdayHours}}</td>
                            <td>
                                @if($rota->ThursdayRoleOne == $rota->ThursdayRoleTwo)
                                {{$rota->ThursdayRoleOne}}
                                @elseif($rota->ThursdayRoleTwo == "Off")
                                {{$rota->ThursdayRoleOne}}
                                @else
                                {{$rota->ThursdayRoleOne}} / {{$rota->ThursdayRoleTwo}}
                                @endif
                            </td>
                            <td>{{$rota->ThursdayHours}}</td>
                            <td>
                                @if($rota->FridayRoleOne == $rota->FridayRoleTwo)
                                {{$rota->FridayRoleOne}}
                                @elseif($rota->FridayRoleTwo == "Off")
                                {{$rota->FridayRoleOne}}
                                @else
                                {{$rota->FridayRoleOne}} / {{$rota->FridayRoleTwo}}
                                @endif
                            </td>
                            <td>{{$rota->FridayHours}}</td>
                            <td>
                                @if($rota->SaturdayRoleOne == $rota->SaturdayRoleTwo)
                                {{$rota->SaturdayRoleOne}}
                                @elseif($rota->SaturdayRoleTwo == "Off")
                                {{$rota->SaturdayRoleOne}}
                                @else
                                {{$rota->SaturdayRoleOne}} / {{$rota->SaturdayRoleTwo}}
                                @endif
                            </td>
                            <td>{{$rota->SaturdayHours}}</td>
                            <td>
                                @if($rota->SundayRoleOne == $rota->SundayRoleTwo)
                                {{$rota->SundayRoleOne}}
                                @elseif($rota->SundayRoleTwo == "Off")
                                {{$rota->SundayRoleOne}}
                                @else
                                {{$rota->SundayRoleOne}} / {{$rota->SundayRoleTwo}}
                                @endif
                            </td>
                            <td>{{$rota->SundayHours}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="table-primary">
                            <td>FOH</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                        </tr>
                        <tr class="table-success">
                            <td>HK</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                        </tr>
                        <tr class="table-danger">
                            <td>Kitchen</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    @endsection
</x-admin-master>
