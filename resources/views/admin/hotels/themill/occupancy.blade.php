<x-admin-master>

    @section('scripts')
        <!-- Graphs -->
            <script src="{{asset('js/chart.js')}}"></script>
    @endsection

    @section('content')
            <div class="row mb-3">
                <div class="col-sm-12">
                    @if(count($CurrentYearArray)!=0 || count($BackOneYearRoomsSold)!=0 || count($BackTwoYearRoomsSold)!=0)

                    <div class="card vh-33">
                        <div class="card-header text-center">
                            The Mill - Three Year Monthly Occupancy Report
                        </div>
                        <div class="card-body p-1">
                            <div class="chart-container" style="position: relative; height:100%; width:100%;">
                                <canvas id="monthlyBreakdownChart"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-sm">
                        <thead class="thead-dark text-center">
                        <tr>
                            <th>Year</th>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>May</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Aug</th>
                            <th>Sep</th>
                            <th>Oct</th>
                            <th>Nov</th>
                            <th>Dec</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                            @if(count($CurrentYearArray)!=0)
                        <tr>
                            <td rowspan="2" class="align-middle">{{$currentYear}}</td>
                            @foreach ($CurrentYearArraySold as $item)
                                <td>{{$item}}</td>
                            @endforeach
                            <td>{{$CurrentYearTotal}}</td>
                        </tr>
                        <tr>
                            @foreach ($CurrentYearOcc as $item)
                            <td>{{$item}}%</td>
                            @endforeach
                            <td>{{$CurrentYearAvg}}</td>

                        </tr>
                        @else
                        @endif

                        @if(count($BackOneYearArray)!=0)
                        <tr>
                            <td rowspan="2" class="align-middle">{{$backOneYear}}</td>
                            @foreach ($BackOneYearArraySold as $item)
                                <td>{{$item}}</td>
                            @endforeach
                            <td>{{$BackOneYearTotal}}</td>
                        </tr>
                        <tr>
                            @foreach ($BackOneYearOcc as $item)
                            <td>{{$item}}%</td>
                            @endforeach
                            <td>{{$BackOneYearAvg}}%</td>
                        </tr>
                        @else
                        @endif


                        @if(count($BackTwoYearArray)!=0)
                        <tr>
                            <td rowspan="2" class="align-middle">{{$backTwoYear}}</td>
                            @foreach ($BackTwoYearArraySold as $item)
                                <td>{{$item}}</td>
                            @endforeach
                            <td>{{$BackTwoYearTotal}}</td>
                        </tr>
                        <tr>
                            @foreach ($BackTwoYearOcc as $item)
                            <td>{{$item}}%</td>
                            @endforeach
                            <td>{{$BackTwoYearAvg}}%</td>
                        </tr>
                        @else
                        @endif
                        </tbody>
                    </table>
                    @else
                    <h1>No Data</h1>
                    @endif
                </div>
            </div>

            <script>

                <!-- Bottom Chart -->
                var ctx = document.getElementById('monthlyBreakdownChart');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: {{$backTwoYear}},
                            data: [
                                @foreach($BackTwoYearOcc as $item)
                                {{$item}},
                                @endforeach
                               ],

                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)'

                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)'

                            ],
                            borderWidth: 1
                        }
                            ,
                            {
                                label: {{$backOneYear}},
                                data: [
                                    @foreach($BackOneYearOcc as $item)
                                {{$item}},
                                @endforeach],

                                backgroundColor: [
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)',
                                    'rgba(41, 48, 232, 0.2)'


                                ],
                                borderColor: [
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)',
                                    'rgba(41, 48, 232, 1)'

                                ],
                                borderWidth: 1
                            }, {
                                label: {{$currentYear}},
                                data: [

                                    @foreach($CurrentYearOcc as $item)
                                {{$item}},
                                @endforeach],

                                backgroundColor: [
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)',
                                    'rgba(0, 204, 102, 0.2)'

                                ],
                                borderColor: [
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)',
                                    'rgba(0, 204, 102, 1)'

                                ],
                                borderWidth: 1
                            }


                        ]
                    },
                    options: {
                        legend: {
                            display: true,
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                            max: 100,
                                    beginAtZero: true,
                                }
                            }]
                        }
                    }
                });
            </script>



        @endsection
    </x-admin-master>
