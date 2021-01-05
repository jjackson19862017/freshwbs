<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Completed Events <span class="h6"> You have {{$count_wedevents}} completed events.</span></h1>
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
            <div class="col-sm-12">
                <table class="table table-hover table-inverse">
                    <thead class="thead-dark">
                    <tr>

                        <th>Couple</th>
                        <th>Event</th>
                        <th>Cost</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($wedevents as $wedevent)
                            <tr>
                            <td>
                                <!-- If your admin, then you can have access to the Events Page else you cannot access it -->
                                @if(auth()->user()->userHasRole('Admin'))
                                    <a href="{{route('wedevent.profile.show', $wedevent)}}">
                                        {{$wedevent->customer->couple}}
                                    </a>
                                @else
                                    {{$customer->couple}}
                                @endif
                            </td>
                            <td>
                                Event: {{$wedevent->weddingdate->format('D d M Y')}}
                            </td>
                                <td>
                                    £{{$wedevent->cost}}
                                </td>
                           </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-admin-master>
