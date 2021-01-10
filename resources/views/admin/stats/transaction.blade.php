<x-admin-master>

@section('scripts')
    <!-- Graphs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
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
            <table class="table table-inverse table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>Event Date</th>
                        <th>Details</th>
                        <th>Cost</th>
                        <th>Paid</th>
                        <th>Outstanding</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($wedevents as $event)
                        <tr>
                            <td scope="row">{{$event->weddingdate->format('d/m/y')}}</td>
                            <td>{{$event->tCount}} Transactions <a href="{{route('wedevent.profile.show', $event->id)}}">Details...</a></td>
                            <td>£{{$event->cost}}</td>
                            <td>£{{$event->paid}}</td>
                            <td>£{{$event->out}}</td>
                        </tr>
                        <tr> <td colspan=5><div class="progress" style="height: 20px; width: 100%;">
                                    <div class="progress-bar bg-primary" style="width:{{$event->progress}}%">{{$event->progress}}%</div>
                                </div>
                            <div class="progress" style="height: 20px; width: 100%;">
                                    <div class="progress-bar bg-success" style="width:{{$event->percentage}}%">{{$event->percentage}}%</div>
                                </div></td></tr>
                        @endforeach
                    </tbody>
            </table>
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

@endsection
</x-admin-master>
