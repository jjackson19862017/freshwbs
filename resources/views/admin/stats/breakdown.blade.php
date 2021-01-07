<x-admin-master>

@section('scripts')
    <!-- Graphs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
@endsection

@section('content')

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Statistics Breakdown</h1>



        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="card vh-33">
                    <div class="card-header text-center">
                        Three Year Monthly Breakdown
                    </div>
                    <div class="card-body p-1">
                        <div class="chart-container" style="position: relative; height:100%; width:100%;">
                            <canvas id="monthlyBreakdownChart"></canvas>
                        </div>
                    </div>
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
                            label: 'This Year',
                            data: [

                                @if(!$janBackTwoYearSales == 0)
                                {{$janBackTwoYearSales}}
                                @else
                                0
                                @endif,
                                @if(!$febBackTwoYearSales == 0)
                                    {{$febBackTwoYearSales}}
                                    @else
                                    0
                                @endif,
                                @if(!$marBackTwoYearSales == 0)
                                    {{$marBackTwoYearSales}}
                                    @else
                                    0
                                @endif,
                                @if(!$aprBackTwoYearSales == 0)
                                    {{$aprBackTwoYearSales}}
                                    @else
                                    0
                                @endif,
                                @if(!$mayBackTwoYearSales == 0)
                                    {{$mayBackTwoYearSales}}
                                    @else
                                    0
                                @endif,
                                @if(!$junBackTwoYearSales == 0)
                                    {{$junBackTwoYearSales}}
                                    @else
                                    0
                                @endif,
                                @if(!$julBackTwoYearSales == 0)
                                    {{$julBackTwoYearSales}}
                                    @else
                                    0
                                @endif,
                                @if(!$augBackTwoYearSales == 0)
                                    {{$augBackTwoYearSales}}
                                    @else
                                    0
                                @endif,
                                @if(!$sepBackTwoYearSales == 0)
                                    {{$sepBackTwoYearSales}}
                                    @else
                                    0
                                @endif,
                                @if(!$octBackTwoYearSales == 0)
                                    {{$octBackTwoYearSales}}
                                    @else
                                    0
                                @endif,
                                @if(!$novBackTwoYearSales == 0)
                                    {{$novBackTwoYearSales}}
                                    @else
                                    0
                                @endif,
                                @if(!$decBackTwoYearSales == 0)
                                    {{$decBackTwoYearSales}}
                                    @else
                                    0
                                @endif],

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
                                label: 'This Year',
                                data: [

                                    @if(!$janBackOneYearSales == 0)
                                        {{$janBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$febBackOneYearSales == 0)
                                        {{$febBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$marBackOneYearSales == 0)
                                        {{$marBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$aprBackOneYearSales == 0)
                                        {{$aprBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$mayBackOneYearSales == 0)
                                        {{$mayBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$junBackOneYearSales == 0)
                                        {{$junBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$julBackOneYearSales == 0)
                                        {{$julBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$augBackOneYearSales == 0)
                                        {{$augBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$sepBackOneYearSales == 0)
                                        {{$sepBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$octBackOneYearSales == 0)
                                        {{$octBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$novBackOneYearSales == 0)
                                        {{$novBackOneYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$decBackOneYearSales == 0)
                                        {{$decBackOneYearSales}}
                                        @else
                                        0
                                    @endif],

                                backgroundColor: [
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 255, 0, 0.2)'

                                ],
                                borderColor: [
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 255, 0, 1)'

                                ],
                                borderWidth: 1
                            } , {
                                label: 'This Year',
                                data: [

                                    @if(!$janThisYearSales == 0)
                                        {{$janThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$febThisYearSales == 0)
                                        {{$febThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$marThisYearSales == 0)
                                        {{$marThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$aprThisYearSales == 0)
                                        {{$aprThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$mayThisYearSales == 0)
                                        {{$mayThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$junThisYearSales == 0)
                                        {{$junThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$julThisYearSales == 0)
                                        {{$julThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$augThisYearSales == 0)
                                        {{$augThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$sepThisYearSales == 0)
                                        {{$sepThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$octThisYearSales == 0)
                                        {{$octThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$novThisYearSales == 0)
                                        {{$novThisYearSales}}
                                        @else
                                        0
                                    @endif,
                                    @if(!$decThisYearSales == 0)
                                        {{$decThisYearSales}}
                                        @else
                                        0
                                    @endif],

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
