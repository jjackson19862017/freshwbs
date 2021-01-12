<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Staff Holiday List - Shard</h1>
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
            <div class="col-sm-7">
                <table class="table table-hover table-inverse table-sm">
                    <thead class="thead-dark text-center">
                    <tr>
                        <th>Name</th>
                        <th>Date Start</th>
                        <th>Date Finish</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($holidays as $hol)
                    @if($hol->staff->hotel == "Shard")
                        <tr>
                            <td>@if(!auth()->user()->userHasRole('Staff'))
                                    <a href="{{route('staffs.profile', $hol->staff)}}">{{$hol->staff->forename}} {{$hol->staff->surname}}</a>
                                @else
                                    {{$hol->staff->forename}} {{$hol->staff->surname}}
                                @endif
                            </td>
                            <td>{{$hol->start}}</td>
                            <td>{{$hol->finish}}</td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- / Staff Table Area -->
            <!-- Legend Table Area -->
            <div class="col-sm-5">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <table class="table table-hover table-inverse table-sm">
                    <thead class="thead-dark text-center">
                    <tr>
                        <th>Name</th>
                        <th>Taken</th>
                        <th>Left</th>

                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($staffs as $staff)
                        <tr>
                            <td>@if(!auth()->user()->userHasRole('Staff'))
                                    <a href="{{route('staffs.profile', $staff)}}">{{$staff->forename}} {{$staff->surname}}</a>
                                @else
                                    {{$staff->forename}} {{$staff->surname}}
                                @endif
                            </td>
                            <td>{{$staff->holidaysTaken}}</td>
                            <td>{{$staff->holidaysleft}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Legend Table Area -->

        </div>
        <!-- Content Row -->

    @endsection
</x-admin-master>
