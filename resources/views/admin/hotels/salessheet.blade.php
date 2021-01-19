<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Shard Daily Sales Report</h1>
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
            <form action="{{route('admin.hotels.sales.salessheetfind', $targetDate)}}" method="post">
                @csrf
                @method("PUT")
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Week commencing: </span>
                            </div>
                            <select name="mondayselector" id="mondayselector" style="width:150px;" >
                                @foreach ($mondaySelection as $item)
                                <option value="$item">{{date('d M y', strtotime($item))}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" id="ajax-submit">Find</button>
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
                        @foreach ($days as $day)
                        <th>{{$day}}</th>
                        @endforeach
                        <th>Totals</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">

                        <tr>
                            <td>Date</td>
                            @foreach ($weeklysales as $day)
                            <td>{{date('d/m/y', strtotime($day->date))}}</td>
                            @endforeach
                            <td></td>
                        </tr>

                        <tr>
                            <td>Ious</td>
                            @foreach ($weeklysales as $day)
                            <td>{{$day->iou}}</td>
                            @endforeach
                            <td></td>
                        </tr>
                        <tr>
                            <td>Bacs</td>
                            @foreach ($weeklysales as $day)
                            <td>{{$day->bacs}}</td>
                            @endforeach
                            <td>£{{number_format($day->sum('bacs'),2)}}</td>

                        </tr>
                        <tr>
                            <td>Cheque</td>
                            @foreach ($weeklysales as $day)
                            <td>{{$day->cheque}}</td>
                            @endforeach
                            <td></td>
                        </tr>

                        <tr>
                            <td class="border-top border-primary">Reception</td>
                            @foreach ($weeklysales as $day)
                            <td class="border-top border-primary">{{$day->pdqreception}}</td>
                            @endforeach
                            <td class="border-top border-primary align-bottom" rowspan="3">£{{number_format($day->sum('pdqreception') + $day->sum('pdqbar') + $day->sum('pdqrestaurant'),2)}}</td>
                        </tr>
                        <tr>
                            <td>Bar</td>
                            @foreach ($weeklysales as $day)
                            <td>{{$day->pdqbar}}</td>
                            @endforeach

                        </tr>
                        <tr>
                            <td>Restaurant</td>
                            @foreach ($weeklysales as $day)
                            <td>{{$day->pdqrestaurant}}</td>
                            @endforeach

                        </tr>

                        <tr>
                            <td class="border-top border-primary">Till Cash</td>
                            @foreach ($weeklysales as $day)
                            <td class="border-top border-primary">{{$day->cashtotal}}</td>
                            @endforeach
                            <td class="border-top border-primary">£{{number_format($day->sum('cashtotal'),2)}}</td>

                        </tr>
                        <tr>
                            <td class="border-top border-primary">Gpos</td>
                            @foreach ($weeklysales as $day)
                            <td class="border-top border-primary">{{$day->gpostotal}}</td>
                            @endforeach
                            <td class="border-top border-primary">£{{number_format($day->sum('gpostotal'),2)}}</td>

                        </tr>
                        <tr>
                            <td>Cash for Safe</td>
                            @foreach ($weeklysales as $day)
                            <td>{{$day->cashsafe ?? '0'}}</td>
                            @endforeach
                            <td>£{{number_format($day->sum('cashsafe'),2)}}</td>

                        </tr>


                    </tbody>
                </table>

            </div>

        </div>
        <!-- Content Row -->


    @endsection

</x-admin-master>
