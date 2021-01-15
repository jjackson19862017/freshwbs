<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Daily Sales Report</h1>
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
            <div class="col-sm-6">
            <form action="" method="post">
                @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Week commencing: </span>
                            </div>
                            <input type="date" name="weekcommencing" class="form-control" id="">
                            <div class="input-group-append">
                            <button type="submit" class=" inbtn btn-primary">Find</button>
                            </div>
                        </div>
            </form>
        </div>
        </div>



        <div class="row">
            <!-- Staff Table Area -->
            <div class="col-sm-12">
                <table class="table table-inverse table-sm">
                    <thead class="thead-dark text-center">
                    <tr>
                        <th></th>
                        @foreach ($daysofweek as $day => $days)
                        <th>{{$day}}</th>
                        @endforeach
                        <th>Totals</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">

                        <tr>
                            <td>Date</td>
                            @foreach ($daysofweek as $day)
                            <td>{{date('d/m/y', strtotime($day[0]->date))}}</td>
                            @endforeach
                            <td></td>
                        </tr>
                        <tr>
                            <td>Clerk</td>
                            @foreach ($daysofweek as $day)
                            <td>{{$day[0]->user_id}}</td>
                            @endforeach
                            <td></td>
                        </tr>

                        <tr>
                            <td>Ious</td>
                            @foreach ($daysofweek as $day)
                            <td>{{$day[0]->iou}}</td>
                            @endforeach
                            <td></td>
                        </tr>
                        <tr>
                            <td>Bacs</td>
                            @foreach ($daysofweek as $day)
                            <td>{{$day[0]->bacs}}</td>
                            @endforeach
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cheque</td>
                            @foreach ($daysofweek as $day)
                            <td>{{$day[0]->cheque}}</td>
                            @endforeach
                            <td></td>
                        </tr>

                        <tr>
                            <td class="border-top border-primary">Reception</td>
                            @foreach ($daysofweek as $day)
                            <td class="border-top border-primary">{{$day[0]->pdqreception}}</td>
                            @endforeach
                            <td class="border-top border-primary align-bottom" rowspan="3">{{number_format($day[0]->sum('pdqreception') + $day[0]->sum('pdqbar') + $day[0]->sum('pdqrestaurant'),2)}}</td>
                        </tr>
                        <tr>
                            <td>Bar</td>
                            @foreach ($daysofweek as $day)
                            <td>{{$day[0]->pdqbar}}</td>
                            @endforeach

                        </tr>
                        <tr>
                            <td>Restaurant</td>
                            @foreach ($daysofweek as $day)
                            <td>{{$day[0]->pdqrestaurant}}</td>
                            @endforeach

                        </tr>

                        <tr>
                            <td class="border-top border-primary">Till Cash</td>
                            @foreach ($daysofweek as $day)
                            <td class="border-top border-primary">{{$day[0]->cashtotal}}</td>
                            @endforeach
                            <td>{{number_format($day[0]->sum('cashtotal'),2)}}</td>

                        </tr>
                        <tr>
                            <td class="border-top border-primary">Gpos</td>
                            @foreach ($daysofweek as $day)
                            <td class="border-top border-primary">{{$day[0]->gpostotal}}</td>
                            @endforeach
                            <td>{{number_format($day[0]->sum('gpostotal'),2)}}</td>

                        </tr>
                        <tr>
                            <td>Cash for Safe</td>
                            @foreach ($daysofweek as $day)
                            <td>{{$day[0]->cashsafe}}</td>
                            @endforeach
                            <td>{{number_format($day[0]->sum('cashsafe'),2)}}</td>

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <!-- Content Row -->



    @endsection
</x-admin-master>
