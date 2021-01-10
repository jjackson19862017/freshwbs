<x-admin-master>

@section('scripts')
    <!-- Graphs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
@endsection

@section('content')

    <!-- Page Heading -->
        @if(auth()->user()->userHasRole('Admin') || auth()->user()->userHasRole('Manager') || auth()->user()->userHasRole('Owner'))
            <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        <div class="row">
            <!-- Customer Cards -->
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-primary">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-user-friends fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{count($customers)}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('customers.index')}}">
                        <div class="card-footer bg-gradient-primary text-white text-center">
                            <span class="pull-left">View Customers</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- / Customer Cards -->
            <!-- Unbooked Cards -->
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-danger">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar-times fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{$unbooked}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('customers.unbooked')}}">
                        <div class="card-footer bg-gradient-danger text-white text-center">
                            <span class="pull-left">View Unbooked Events</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- / Unbooked Cards -->
            <!-- Booked Cards -->

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-warning">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar-day fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{count($booked)}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('wedevents.index')}}">
                        <div class="card-footer bg-gradient-warning text-white text-center">
                            <span class="pull-left">View Booked Events</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- / Booked Cards -->
            <!-- Completed Cards -->
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-success">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-flag-checkered fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{$event_complete}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('wedevents.completed')}}">
                        <div class="card-footer bg-gradient-success text-white text-center">
                            <span class="pull-left">View Completed Events</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Completed Cards -->

        </div>

        <div class="row mb-3">
            <div class="col-sm-12 col-md-3">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Customers
                    </div>
                    <div class="card-body p-1">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="bookedChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Events
                    </div>
                    <div class="card-body p-1">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="eventsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        @if(!$event_active == 0)
            <div class="col-sm-12 col-md-3">
                <div class="card vh-33">
                    <div class="card-header text-center">
                       Payments
                    </div>
                    <div class="card-body p-1">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas class="" id="paymentChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-3">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Overdue Dates
                    </div>
                    <div class="card-body p-1">
                        @if(!$issues == 0)
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="overduesChart"></canvas>
                        </div>
                        @else
                            <h4 class="text-center p-1" style="height: 115px">Nothing is<br>Overdue<br>or<br>Outstanding</h4>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="events-list" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#notBooked" role="tab" aria-controls="description" aria-selected="true">Customers Not Booked @if(!$unbooked == 0)<span class="badge badge-pill badge-primary align-top">{{$unbooked}}</span>@endif</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="#booked" role="tab" aria-controls="history" aria-selected="false">Active Events @if(!count($booked) == 0)<span class="badge badge-pill badge-primary align-top">{{count($booked)}}</span>@endif</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#issues" role="tab" aria-controls="deals" aria-selected="false">Issues @if(!$issues == 0)<span class="badge badge-pill badge-primary align-top">{{$issues}}</span>@endif</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-3">
                                <div class="tab-pane active" id="notBooked" role="tabpanel">
                                    <table class="table table-hover table-inverse table-sm text-center">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Couple</th>
                                            <th>Telephone</th>
                                            <th>Added</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($customers as $customer)
                                            @if(!$customer->booked)

                                                <tr>
                                                    <!-- Couple Column, If your an admin you can update the details of the couples else you cannot -->
                                                    <td>
                                                        {{$customer->couple}}
                                                    </td>
                                                    <td>{{$customer->telephone}}</td>

                                                    <td @if($customer->created_at->diffInDays(now()) > 14)class="text-danger"@endif>{{$customer->created_at->diffForHumans()}}</td>

                                                    <!-- Allows someone to Create / View an Event or Delete the Customer -->
                                                    <td><div class="table_buttons">
                                                        <a name="" id="" class="btn btn-warning btn-sm btn_width" href="{{route('wedevent.create', $customer->id)}}" role="button">Create Event</a>
                                                        </div>
                                                        <!-- Delete Button Form -->
                                                        <div class="table_buttons">
                                                        <form action="{{route('customer.destroy', $customer->id)}}" method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane" id="booked" role="tabpanel" aria-labelledby="history-tab">
                                    <table class="table table-hover table-inverse table-sm text-center">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Couple</th>
                                            <th>Wedding Date</th>
                                            <th>Till Wedding</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($booked as $booker)
                                            <tr>
                                                <!-- Couple Column, If your an admin you can update the details of the couples else you cannot -->
                                                <td>
                                                        {{$booker->customer->couple}}
                                                </td>
                                                <td>{{$booker->weddingdate->format('D d M Y')}}</td>

                                                <!-- Allows someone to email them directly from the site -->
                                                <td>{{$booker->weddingdate->diffForHumans()}}</a></td>

                                                <!-- Allows someone to Create / View an Event or Delete the Customer -->
                                                <td>
                                                    <a name="" id="" class="btn btn-warning btn-sm btn_width"
                                                       href="{{route('wedevent.profile.show', $booker->customer->id)}}" role="button">Goto
                                                        Event</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane" id="issues" role="tabpanel" aria-labelledby="deals-tab">
                                    @if($issues == 0)<p class="card-text">Any overdue issues appear here.</p>@else

                                        <table class="table table-hover table-inverse table-sm text-center">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>Couple</th>
                                                <th>Wedding Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($pastOnHolds as $past)
                                                <tr class="text-success">
                                                    <td>
                                                        {{$past->customer->couple}}
                                                    </td>
                                                    <td>{{$booker->weddingdate->format('D d M Y')}}</td>

                                                    <td>Check OnHold: {{$past->holdtilldate->format('D d M Y')}} - Overdue by {{$past->holdtilldate->diffInDays()}} days.</td>


                                                    <!-- Allows someone to Create / View an Event or Delete the Customer -->
                                                    <td>
                                                        <a name="" id="" class="btn btn-warning btn-sm btn_width"
                                                           href="{{route('wedevent.profile.show', $past->customer->id)}}" role="button">Goto
                                                            Event</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach($checkDeposits as $past)
                                                <tr class="text-primary">
                                                    <td>
                                                        {{$past->customer->couple}}
                                                    </td>
                                                    <td>{{$past->weddingdate->format('D d M Y')}}</td>

                                                    <td>Check Deposit</td>

                                                    <!-- Allows someone to Create / View an Event or Delete the Customer -->
                                                    <td>
                                                        <a name="" id="" class="btn btn-warning btn-sm btn_width"
                                                           href="{{route('wedevent.profile.show', $past->customer->id)}}" role="button">Goto
                                                            Event</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach($pastQuarterlyPayments as $past)
                                                <tr class="text-danger">
                                                    <td>
                                                        {{$past->customer->couple}}
                                                    </td>
                                                    <td>{{$past->weddingdate->format('D d M Y')}}</td>

                                                    <td>Check 25% Payment: {{$past->quarterpaymentdate->format('D d M Y')}} - Overdue by {{$past->quarterpaymentdate->diffInDays()}} days.</td>

                                                    <!-- Allows someone to Create / View an Event or Delete the Customer -->
                                                    <td>
                                                        <a name="" id="" class="btn btn-warning btn-sm btn_width"
                                                           href="{{route('wedevent.profile.show', $past->customer->id)}}" role="button">Goto
                                                            Event</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach($pastFinalTalks as $past)
                                                <tr class="text-warning">
                                                    <td>
                                                        {{$past->customer->couple}}
                                                    </td>
                                                    <td>{{$past->weddingdate->format('D d M Y')}}</td>

                                                    <td>Check Final Talk: {{$past->finalweddingtalkdate->format('D d M Y')}} - Overdue by {{$past->finalweddingtalkdate->diffInDays()}} days.</td>


                                                    <!-- Allows someone to Create / View an Event or Delete the Customer -->
                                                    <td>
                                                        <a name="" id="" class="btn btn-warning btn-sm btn_width"
                                                           href="{{route('wedevent.profile.show', $past->customer->id)}}" role="button">Goto
                                                            Event</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <h1>Welcome</h1>
            @endif
            <script>
                var ctx = document.getElementById('bookedChart');
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Booked', 'Not Booked'],
                        datasets: [{
                            label: 'Values',
                            data: [{{count($wedevents)}}, {{$unbooked}}],
                            backgroundColor: [
                                'rgba(0, 204, 102, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(0, 204, 102, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: true,
                            position: 'right',
                        }
                    }
                });
                var ctx = document.getElementById('eventsChart');
                var myPieChart2 = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Completed', 'Active'],
                        datasets: [{
                            label: 'Values',
                            data: [{{$event_complete}}, {{$event_active}}],
                            backgroundColor: [
                                'rgba(0, 204, 102, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(0, 204, 102, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: true,
                            position: 'right',
                        }
                    }
                });
                var ctx = document.getElementById('paymentChart');
                var myPieChart2 = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Paid', 'Outstanding'],
                        datasets: [{
                            label: 'Values',
                            data: [{{$paid}}, {{$outstanding}}],
                            backgroundColor: [
                                'rgba(0, 204, 102, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(0, 204, 102, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: true,
                            position: 'right',
                        }
                    }
                });
                var ctx = document.getElementById('overduesChart');
                var myPieChart2 = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['On Holds', '25% Payments', 'Final Wedding Talk', 'Deposits Not Taken'],
                        datasets: [{
                            label: 'Values',
                            data: [{{count($pastOnHolds)}}, {{count($pastQuarterlyPayments)}}, {{count($pastFinalTalks)}}, {{count($checkDeposits)}}],
                            backgroundColor: [
                                'rgba(0, 204, 102, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(225, 225, 0, 0.2)',
                                'rgba(0, 0, 200, 0.2)'

                            ],
                            borderColor: [
                                'rgba(0, 204, 102, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(225, 225, 0, 1)',
                                'rgba(0, 0, 200, 1)'

                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: true,
                            position: 'right',
                        }
                    }
                });

            </script>


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
