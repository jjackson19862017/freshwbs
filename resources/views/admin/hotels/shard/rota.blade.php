<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Rota - Shard - Date</h1>
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
            <!-- Staff Table Area -->
            <div class="col-sm-12">
                <table class="table table-sm text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Staff</th>
                            @foreach ($days as $day)
                            <th colspan="2">{{$day}}</th>
                            @endforeach
                            <th>Hours</th>
                            <th>JS</th>
                            <th>Sick</th>
                            <th>Holidays</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3" class="align-middle">Forename<br>Surname</td>
                            <td>M S 1</td>
                            <td>M F 1</td>
                            <td>T S 1</td>
                            <td>T F 1</td>
                            <td>W S 1</td>
                            <td>W F 1</td>
                            <td>T S 1</td>
                            <td>T F 1</td>
                            <td>F S 1</td>
                            <td>F F 1</td>
                            <td>S S 1</td>
                            <td>S F 1</td>
                            <td>S S 1</td>
                            <td>S F 1</td>
                            <td rowspan="3" class="align-middle">Total</td>
                            <td rowspan="3" class="align-middle">Zero</td>
                            <td rowspan="3" class="align-middle">Zero</td>
                            <td rowspan="3" class="align-middle">Zero</td>
                        </tr>
                        <tr>
                            <td>M S 2</td>
                            <td>M F 2</td>
                            <td>T S 2</td>
                            <td>T F 2</td>
                            <td>W S 2</td>
                            <td>W F 2</td>
                            <td>T S 2</td>
                            <td>T F 2</td>
                            <td>F S 2</td>
                            <td>F F 2</td>
                            <td>S S 2</td>
                            <td>S F 2</td>
                            <td>S S 2</td>
                            <td>S F 2</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>Time</td>
                            <td>Role</td>
                            <td>Time</td>
                            <td>Role</td>
                            <td>Time</td>
                            <td>Role</td>
                            <td>Time</td>
                            <td>Role</td>
                            <td>Time</td>
                            <td>Role</td>
                            <td>Time</td>
                            <td>Role</td>
                            <td>Time</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="table-primary">
                            <td>FOH</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                        </tr>
                        <tr class="table-success">
                            <td>HK</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                        </tr>
                        <tr class="table-danger">
                            <td>Kitchen</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                            <td colspan="2">Number</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    @endsection
</x-admin-master>
