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
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-success">
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
                        <div class="card-footer bg-gradient-success text-white text-center">
                            <span class="pull-left">View Customers</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-primary">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar-day fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{count($wedevents)}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('wedevents.index')}}">
                        <div class="card-footer bg-gradient-primary text-white text-center">
                            <span class="pull-left">View Booked Events</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-warning">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{count($users)}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('users.index')}}">
                        <div class="card-footer bg-gradient-warning text-white text-center">
                            <span class="pull-left">View Users</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-info">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-people-carry fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{count($staff)}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('staffs.index')}}">
                        <div class="card-footer bg-gradient-info text-white text-center">
                            <span class="pull-left">View Staff</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="card vh-33">
                    <div class="card-header">
                        Customers Booked VS Unbooked
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="bookedChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card vh-33">
                    <div class="card-header">
                        Active VS Completed Events
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                        <canvas id="eventsChart"></canvas>
                        </div>
                    </div>
                </div>
                </div><div class="col-sm-12 col-md-4">
                <div class="card vh-33">
                    <div class="card-header">
                        Paid VS Outstanding Payments
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="paymentChart"></canvas>
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
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
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
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
            }
        });
        var ctx = document.getElementById('paymentChart');
        var myPieChart2 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Paid', 'Outstanding'],
                datasets: [{
                    label: 'Values',
                    data: [{{$cost_total}}, {{$cost_total}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
            }
        });
    </script>

</div>
        @endsection


</x-admin-master>
