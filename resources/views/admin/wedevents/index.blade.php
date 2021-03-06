<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Events <span class="h6"> You have {{$count_wedevents}} events active.</span></h1>
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
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($wedevents as $wedevent)
                            <tr>
                            <td>
                                <!-- If your admin, then you can have access to the Events Page else you cannot access it -->
                                @if(!auth()->user()->userHasRole('Staff'))
                                    <a href="{{route('wedevent.profile.show', $wedevent)}}">
                                        {{$wedevent->customer->couple}}

                                    </a>
                                @else
                                    {{$customer->couple}}
                                @endif
                            </td>
                            <td>
                                <!-- If Statements that reflect the progess of the Event -->
                                @if($wedevent->onhold== "No")
                                    Check Hold -
                                    @if($wedevent->holdtilldate->isPast() == 1)
                                        <span class="text-danger">Overdue</span>
                                    @else{{$wedevent->holdtilldate->diffInDays()}} days left.
                                    @endif
                                @else
                                    @if($wedevent->agreementsigned == "No")
                                        Have they signed the contract? -
                                        @if($wedevent->contractissueddate->isPast() == 1)
                                            <span class="text-danger">Overdue</span>
                                        @else
                                            Issued {{$wedevent->contractissueddate->format('D d M Y')}}
                                        @endif
                                    @else
                                        @if($wedevent->deposittaken =="No")
                                            Have they paid their deposit?
                                        @else
                                            @if($wedevent->quarterpaymenttaken == "No")
                                                Have they paid there 25% costs? -
                                                @if($wedevent->quarterpaymentdate->isPast() == 1)
                                                    <span class="text-danger">Overdue</span>
                                                @else{{$wedevent->quarterpaymentdate->diffInDays()}} days till due date.
                                                @endif
                                            @else
                                                @if($wedevent->hadfinaltalk == "No")
                                                    Have they had there final talk -
                                                    @if($wedevent->finalweddingtalkdate->isPast() == 1)
                                                        <span class="text-danger">Overdue</span>
                                                    @else{{$wedevent->finalweddingtalkdate->diffInDays()}} days till due date.
                                                    @endif
                                                @else
                                                    Have they had the wedding? -
                                                    @if($wedevent->weddingdate->isPast() == 1)
                                                        <span class="text-danger">Overdue</span>
                                                    @else{{$wedevent->weddingdate->diffInDays()}} days till the big day.
                                                    @endif

                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endif <span class="float-right">Outstanding: @if(!$wedevent->out == 0)

                                        £{{$wedevent->out}}@else£{{$wedevent->cost}}@endif</span>


                            </td>
                            </tr>
                            <tr>
                                <td class="border-top-0">Event: {{$wedevent->weddingdate->format('d/m/y')}} - {{$wedevent->weddingdate->diffInDays()}} days away</td>
<td class="border-top-0"><!-- On Hold Button Yes / No -->
                                <a type="button" href="{{route('wedevent.OnHold',$wedevent)}}"
                                   @if($wedevent->onhold == "No")
                                   class="btn btn-sm btn-danger  mb-1"
                                   @else
                                   class="btn btn-sm btn-success  mb-1"
                                    @endif
                                >On Hold</a>

                                <!-- Agreement Signed Button Yes / No -->
                                <a type="button" href="{{route('wedevent.AgreementSigned',$wedevent)}}"
                                   @if($wedevent->agreementsigned == "No")
                                   class="btn btn-sm btn-danger  mb-1"
                                   @else
                                   class="btn btn-sm btn-success  mb-1"
                                    @endif
                                >Agreement</a>

                                <!-- Deposit Taken Button Yes / No -->
                                <a type="button" href="{{route('wedevent.DepositTaken',$wedevent)}}"
                                   @if($wedevent->deposittaken == "No")
                                   class="btn btn-sm btn-danger  mb-1"
                                   @else
                                   class="btn btn-sm btn-success  mb-1"
                                    @endif
                                >Deposit</a>

                                <!-- 25% Payment Taken Button Yes / No -->
                                <a type="button" href="{{route('wedevent.QuarterPaymentTaken',$wedevent)}}"
                                   @if($wedevent->quarterpaymenttaken == "No")
                                   class="btn btn-sm btn-danger  mb-1"
                                   @else
                                   class="btn btn-sm btn-success  mb-1"
                                    @endif
                                >25% Payment</a>

                                <!-- Had Final Talk Button Yes / No -->
                                <a type="button" href="{{route('wedevent.HadFinalTalk',$wedevent)}}"
                                   @if($wedevent->hadfinaltalk == "No")
                                   class="btn btn-sm btn-danger  mb-1"
                                   @else
                                   class="btn btn-sm btn-success  mb-1"
                                    @endif
                                >Final Talk</a>

                                <!-- On Hold Button Yes / No -->
                                <a type="button" href="{{route('wedevent.Complete',$wedevent)}}"
                                   @if($wedevent->completed == "No")
                                   class="btn btn-sm btn-danger  mb-1"
                                   @else
                                   class="btn btn-sm btn-success  mb-1"
                                    @endif
                                >Completed</a></td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-admin-master>
