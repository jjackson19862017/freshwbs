<x-admin-master>

@section('scripts')
    <!-- Graphs -->
        <script src="{{asset('js/chart.js')}}"></script>
@endsection

@section('content')

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Statistics Overview</h1>

        <div class="row mb-3">
            <div class="col-sm-12 col-md-4">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        New Weekly
                    </div>
                    <div class="card-body p-1">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="weeklyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        New Monthly
                    </div>
                    <div class="card-body p-1">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="monthlyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        New Yearly
                    </div>
                    <div class="card-body p-1">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="yearlyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-sm-12 col-md-4">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Yearly Events Comparison
                    </div>
                    <div class="card-body p-1">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="yearlyEventsComparisonChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Yearly Sales Comparison
                    </div>
                    <div class="card-body p-1">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="YearlySalesComparisonChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Yearly Average Sales Comparison
                    </div>
                    <div class="card-body p-1">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="YearlyAvgSalesComparisonChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>




            <script>
                <!-- Count Graphs -->
                var ctx = document.getElementById('weeklyChart');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Customers', 'Events'],
                        datasets: [{
                            label: 'Values',
                            data: [{{count($newWeeklyCustomers)}}, {{count($newWeeklyEvents)}}],
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
                            display: false,
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                var ctx = document.getElementById('monthlyChart');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Customers', 'Events', 'Completed'],
                        datasets: [{
                            label: 'Values',
                            data: [{{count($newMonthlyCustomers)}}, {{count($newMonthlyEvents)}}, {{count($newMonthlyCompletedEvents)}}],
                            backgroundColor: [
                                'rgba(0, 204, 102, 0.2)',
                                'rgba(225, 225, 0, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(0, 204, 102, 1)',
                                'rgba(225, 225, 0, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                var ctx = document.getElementById('yearlyChart');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Customers', 'Events', 'Completed'],
                        datasets: [{
                            label: 'Values',
                            data: [{{count($newYearlyCustomers)}}, {{count($newYearlyEvents)}}, {{count($newYearlyCompletedEvents)}}],
                            backgroundColor: [
                                'rgba(0, 204, 102, 0.2)',
                                'rgba(225, 225, 0, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(0, 204, 102, 1)',
                                'rgba(225, 225, 0, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                <!-- Yearly / Past Comparisons-->
                var ctx = document.getElementById('yearlyEventsComparisonChart');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [{{$backTwoYear}}, {{$backOneYear}}, {{$currentYear}}],
                        datasets: [{
                            label: 'Values',
                            data: [{{count($backTwoYearsEvents)}}, {{count($backOneYearsEvents)}}, {{count($thisYearsEvents)}}],
                            backgroundColor: [
                                'rgba(0, 204, 102, 0.2)',
                                'rgba(225, 225, 0, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(0, 204, 102, 1)',
                                'rgba(225, 225, 0, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                var ctx = document.getElementById('YearlySalesComparisonChart');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [{{$backTwoYear}}, {{$backOneYear}}, {{$currentYear}}],
                        datasets: [{
                            label: 'Values',
                            data: [{{$thisYearsSales}}, {{$backOneYearsSales}}, {{$backTwoYearsSales}}],
                            backgroundColor: [
                                'rgba(0, 204, 102, 0.2)',
                                'rgba(225, 225, 0, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(0, 204, 102, 1)',
                                'rgba(225, 225, 0, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                var ctx = document.getElementById('YearlyAvgSalesComparisonChart');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [{{$backTwoYear}}, {{$backOneYear}}, {{$currentYear}}],
                        datasets: [{
                            label: 'Values',
                            data: [{{$thisYearsAvgSales}}, {{$backOneYearsAvgSales}}, {{$backTwoYearsAvgSales}}],

                            backgroundColor: [
                                'rgba(0, 204, 102, 0.2)',
                                'rgba(225, 225, 0, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(0, 204, 102, 1)',
                                'rgba(225, 225, 0, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });


            </script>


    @endsection
@section('js')
    =
    @endsection
</x-admin-master>
