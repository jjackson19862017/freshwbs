<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-sm-7">
            <h1>Shard Money Sales</h1>
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
            <!-- Content Row -->
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">
                            @if($sales->isNotEmpty())

                            <table class="table table-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Date</th>
                                        <th>Cards</th>
                                        <th>Cash</th>
                                        <th>Gpos</th>
                                        <th>Total</th>
                                        <th>Float</th>
                                        <th>Safe</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $s)
                                    <tr>
                            <td>{{date('D d/m/y', strtotime($s->date))}}</td>
                            <td>£{{number_format($s->cardtotal,2)}}</td>
                            <td>£{{number_format($s->cashtotal,2)}}</td>
                            <td>£{{number_format($s->gpostotal,2)}}</td>
                            <td>£{{number_format($s->total,2)}}</td>
                            <td class="@if($s->float < 200) text-danger @endif ">£{{number_format($s->float,2)}}</td>
                            <td>£{{number_format($s->cashsafe,2)}}</td>
                            <td><a name="" id="" class="btn btn-primary btn-sm"
                                href="{{route('admin.hotels.sales.edit', $s->id)}}"
                                role="button">Edit</a></span></td>
                                    </tr>
                                    @endforeach

                                </tbody>


                            </table>
                            <div class="d-flex">
                                <div class="mx-auto">
                                    {{ $sales->links() }}
                                </div>
                            </div>

@else
<h3>No Data</h3>
@endif

                        </div>
                    </div>







                </div>
            </div>
        @endsection
    </x-admin-master>
