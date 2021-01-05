<x-admin-master>

@section('scripts')
    <!-- Graphs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
@endsection

@section('content')

    <!-- Page Heading -->
        @if(auth()->user()->userHasRole('Admin'))
            <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        @endif
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
                            <span class="pull-left">View Booked Events</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Completed Cards -->

        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Customers Booked VS Unbooked
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="bookedChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Active VS Completed Events
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="eventsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-3">
            <div class="col-sm-12 col-md-6">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Paid VS Outstanding Payments
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="paymentChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Overdues !!!
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="overduesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
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
                        labels: ['On Holds', '25% Payments', 'Final Wedding Talk'],
                        datasets: [{
                            label: 'Values',
                            data: [{{$count_pastOnHolds}}, {{$count_pastQuarterlyPayments}}, {{$count_pastFinalTalks}}],
                            backgroundColor: [
                                'rgba(0, 204, 102, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(225, 225, 0, 0.2)'
                            ],
                            borderColor: [
                                'rgba(0, 204, 102, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(225, 225, 0, 1)'
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

        </div>
    @endsection


</x-admin-master>
