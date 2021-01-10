<x-admin-master>

@section('scripts')
    <!-- Graphs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-8">
            <h1 class="h3 mb-4 text-gray-800">Transactions Breakdown</h1>
        </div>
        <div class="col-sm-4">
            <h1 class="h3 mb-4 text-gray-800">Coming Later</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-8">
            <table class="table table-inverse table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>Event Date</th>
                        <th>Details</th>
                        <th>Cost</th>
                        <th>Paid</th>
                        <th>Outstanding</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($wedevents as $event)
                        <tr>
                            <td scope="row">{{$event->weddingdate->format('d/m/y')}}</td>
                            <td> {{$event->tCount}} Transactions <a href="{{route('wedevent.profile.show', $event->id)}}">Details...</a>
                                <table class="table table-sm table-borderless">
                                    <tbody>
                                        @foreach ($event->transactions as $t)
                                            <tr>
                                                <td scope="row">{{$t->created_at->format('d/m/y')}}</td>
                                                <td>{{$t->name}}</td>
                                                <td>{{$t->amount}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                            <td>£{{$event->cost}}</td>
                            <td>£{{$event->paid}}</td>
                            <td>£{{$event->out}}</td>
                        </tr>
                        <tr> <td colspan=5><div class="progress" style="height: 20px; width: 100%;">
                                    <div class="progress-bar bg-primary" style="width:{{$event->progress}}%">Event Progression: {{$event->progress}}%</div>
                                </div>
                            <div class="progress" style="height: 20px; width: 100%;">
                                    <div class="progress-bar bg-success" style="width:{{$event->percentage}}%">Payment Progression: {{$event->percentage}}%</div>
                                </div></td></tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <div class="col-sm-4">


        </div>
    </div>
@endsection
@section('js')

@endsection
</x-admin-master>
