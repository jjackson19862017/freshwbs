<x-admin-master>

@section('scripts')
    <!-- Graphs -->
        <script src="{{asset('js/chart.js')}}"></script>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-8">
            <h1 class="h3 mb-4 text-gray-800">Transactions Breakdown</h1>
        </div>
        <div class="col-sm-4">
            <h1 class="h3 mb-4 text-gray-800">Breakdowns</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-8">
            <div class="row">
                <div class="col-12">
                    <div class="card vh-90">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="events-list" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#thisYear" role="tab" aria-controls="this year" aria-selected="true">This Year</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="#nextYear" role="tab" aria-controls="next year" aria-selected="false">Upcoming Years</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pastYears" role="tab" aria-controls="past years" aria-selected="false">Past Years</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-3">
                                <div class="tab-pane active" id="thisYear" role="tabpanel">
                                    <table class="table table-inverse table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>Event Date</th>
                        <th>Details</th>
                        <th>Cost</th>
                        <th>Paid</th>
                        <th>Outstanding</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($thisYear as $event)
                        <tr>
                            <td scope="row">{{$event->weddingdate->format('d/m/y')}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$event->tCount}} Transactions
                                    </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 30vw;">
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                    @foreach ($event->transactions as $t)
                                                        <tr>
                                                            <td scope="row">{{$t->created_at->format('d/m/y')}}</td>
                                                            <td>{{$t->name}}</td>
                                                            <td>£{{$t->amount}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="progress" style="height: 20px; width: 100%;">
                                                <div class="progress-bar bg-primary" style="width:{{$event->progress}}%">@if($event->progress == 0)@else{{$event->progress}}% Managed @endif</div>
                                            </div>
                                            <div class="progress" style="height: 20px; width: 100%;">
                                                <div class="progress-bar bg-success" style="width:{{$event->percentage}}%">@if($event->percentage == 0)@else{{number_format($event->percentage,0)}}% Paid @endif</div>
                                            </div>
                                            </div>
                                        </div>
                            </td>
                            <td>£{{$event->cost}}</td>
                            <td>£{{number_format($event->paid,2)}}</td>
                            <td>£{{number_format($event->out,2)}}</td>
                            <td><a href="{{route('wedevent.profile.show', $event->id)}}">Goto...</a></td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
                                </div>

                                <div class="tab-pane" id="nextYear" role="tabpanel" aria-labelledby="history-tab">
                                    <table class="table table-inverse table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>Event Date</th>
                        <th>Details</th>
                        <th>Cost</th>
                        <th>Paid</th>
                        <th>Outstanding</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($nextYear as $event)
                        <tr>
                            <td scope="row">{{$event->weddingdate->format('d/m/y')}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$event->tCount}} Transactions
                                    </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 30vw;">
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                    @foreach ($event->transactions as $t)
                                                        <tr>
                                                            <td scope="row">{{$t->created_at->format('d/m/y')}}</td>
                                                            <td>{{$t->name}}</td>
                                                            <td>£{{$t->amount}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="progress" style="height: 20px; width: 100%;">
                                                <div class="progress-bar bg-primary" style="width:{{$event->progress}}%">@if($event->progress == 0)@else{{$event->progress}}% Managed @endif</div>
                                            </div>
                                            <div class="progress" style="height: 20px; width: 100%;">
                                                <div class="progress-bar bg-success" style="width:{{$event->percentage}}%">@if($event->percentage == 0)@else{{number_format($event->percentage,0)}}% Paid @endif</div>
                                            </div>
                                            </div>
                                        </div>
                            </td>
                            <td>£{{$event->cost}}</td>
                            <td>£{{number_format($event->paid,2)}}</td>
                            <td>£{{number_format($event->out,2)}}</td>
                            <td><a href="{{route('wedevent.profile.show', $event->id)}}">Goto...</a></td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
                                </div>

                                <div class="tab-pane" id="pastYears" role="tabpanel" aria-labelledby="deals-tab">
                                       <table class="table table-inverse table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>Event Date</th>
                        <th>Details</th>
                        <th>Cost</th>
                        <th>Paid</th>
                        <th>Outstanding</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($pastYears as $event)
                        <tr>
                            <td scope="row">{{$event->weddingdate->format('d/m/y')}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$event->tCount}} Transactions
                                    </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 30vw;">
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                    @foreach ($event->transactions as $t)
                                                        <tr>
                                                            <td scope="row">{{$t->created_at->format('d/m/y')}}</td>
                                                            <td>{{$t->name}}</td>
                                                            <td>£{{$t->amount}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="progress" style="height: 20px; width: 100%;">
                                                <div class="progress-bar bg-primary" style="width:{{$event->progress}}%">@if($event->progress == 0)@else{{$event->progress}}% Managed @endif</div>
                                            </div>
                                            <div class="progress" style="height: 20px; width: 100%;">
                                                <div class="progress-bar bg-success" style="width:{{$event->percentage}}%">@if($event->percentage == 0)@else{{number_format($event->percentage,0)}}% Paid @endif</div>
                                            </div>
                                            </div>
                                        </div>
                            </td>
                            <td>£{{$event->cost}}</td>
                            <td>£{{number_format($event->paid,2)}}</td>
                            <td>£{{number_format($event->out,2)}}</td>
                            <td><a href="{{route('wedevent.profile.show', $event->id)}}">Goto...</a></td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">From the beginning...</h4>
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td>Events purchased</td>
                                <td>£{{number_format($purchased, 2)}}</td>
                            </tr>
                            <tr>
                                <td>Money taken</td>
                                <td>£{{number_format($paid, 2)}}</td>
                            </tr>
                            <tr>
                                <td>Money outstanding</td>
                                <td>£{{number_format($outstanding, 2)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <div class="progress" style="height: 20px; width: 100%;">
                                    <div class="progress-bar bg-primary" style="width:{{$percentage}}%"></div>
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">This Year...</h4>
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td>Events purchased</td>
                                <td>£{{number_format($purchasedThisYear, 2)}}</td>
                            </tr>
                            <tr>
                                <td>Money taken</td>
                                <td>£{{number_format($paidThisYear, 2)}}</td>
                            </tr>
                            <tr>
                                <td>Money outstanding</td>
                                <td>£{{number_format($outstandingThisYear, 2)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <div class="progress" style="height: 20px; width: 100%;">
                                    <div class="progress-bar bg-primary" style="width:{{$percentageThisYear}}%"></div>
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">Upcoming Years...</h4>
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td>Events purchased</td>
                                <td>£{{number_format($purchasedUpcomingYears, 2)}}</td>
                            </tr>
                            <tr>
                                <td>Money taken</td>
                                <td>£{{number_format($paidUpcomingYears, 2)}}</td>
                            </tr>
                            <tr>
                                <td>Money outstanding</td>
                                <td>£{{number_format($outstandingUpcomingYears, 2)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <div class="progress" style="height: 20px; width: 100%;">
                                    <div class="progress-bar bg-primary" style="width:{{$percentageUpcomingYears}}%"></div>
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#events-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
        })
    </script>
    @endsection
</x-admin-master>
