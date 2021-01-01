<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1>Event Page for {{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}} &amp
                    {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}} </h1>
                <h4>Status: @if($wedevent->onhold== "No")
                        Check Hold - {{$wedevent->holdtilldate->diffInDays()}} days left.
                    @else
                        @if($wedevent->contractreturned == "No")
                            Have they signed the contract? - {{$wedevent->contractissueddate->diffInDays()}} days left.
                        @else
                            @if($wedevent->agreementsigned == "No")
                                Have they signed the agreement?
                            @else
                                @if($wedevent->deposittaken =="No")
                                    Have they paid their deposit? - {{$wedevent->deposittakendate->diffInDays()}} days left.
                                @else
                                    @if($wedevent->quarterpaymenttaken == "No")
                                        Have they paid there 25% costs? - {{$wedevent->quarterpaymentdate->diffInDays()}} days left.
                                    @else
                                        @if($wedevent->hadfinaltalk == "No")
                                            Have they had there final talk? - {{$wedevent->finalweddingtalkdate->diffInDays()}} days left.
                                        @else
                                            Have they had the wedding? - {{$wedevent->weddingdate->diffInDays()}} days till the big day.
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endif</h4>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col mb-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        Couple Info <span class="float-right"><a name="" id="" class="btn btn-primary btn-sm" href="#" role="button">Edit</a></span>
                    </div>
                    <div class="card-body text-center">
                        <p class="card-text">{{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}}
                            &amp {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}}</p>
                        <p>{{$wedevent->customer->telephone}}</p>
                        <p>{{$wedevent->customer->email}}</p>
                        <p">{{$wedevent->customer->address1}} <br>
                        {{$wedevent->customer->address2}} <br>
                        {{$wedevent->customer->townCity}} <br>
                        {{$wedevent->customer->county}} <br>
                        {{$wedevent->customer->postCode}} <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col mb-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        Payment Info
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-inverse">
                            <thead class="thead-dark">
                            <tr>

                                <th>Details</th>
                                <th>Costs</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td>
                                    Cost: <br>
                                    Subtotal: <br>
                                </td>
                                <td>
                                    £{{$wedevent->cost}}<br>
                                    £{{$wedevent->subtotal}}<br>

                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col mb-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        Dates <span class="float-right"><a name="" id="" class="btn btn-primary btn-sm" href="{{route('wedevents.edit', $wedevent)}}" role="button">Edit Dates</a></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-inverse">
                            <thead class="thead-dark">
                            <tr>

                                <th>Details</th>
                                <th>Dates</th>
                                <th>Countdown</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td>
                                    1st Appointment: <br>
                                    Hold Till: <br>
                                    Contract Issued: <br>
                                    Wedding Date: <br>
                                    Deposit Taken: <br>
                                    25% Payment: <br>
                                    Final Wedding Talk: <br>
                                    Final Payment: <br>
                                </td>
                                <td>
                                    {{$wedevent->firstappointmentdate->format('D d M Y')}}<br>
                                    {{$wedevent->holdtilldate->format('D d M Y')}} <br>
                                    {{$wedevent->contractissueddate->format('D d M Y')}} <br>
                                    {{$wedevent->weddingdate->format('D d M Y')}} <br>
                                    {{$wedevent->deposittakendate->format('D d M Y')}} <br>
                                    {{$wedevent->quarterpaymentdate->format('D d M Y')}} <br>
                                    {{$wedevent->finalweddingtalkdate->format('D d M Y')}} <br>
                                    {{$wedevent->finalpaymentdate->format('D d M Y')}} <br>
                                </td>
                                <td class="text-center">
                                    {{$wedevent->firstappointmentdate->diffInDays()}} Days<br>
                                    {{$wedevent->holdtilldate->diffInDays()}} Days<br>
                                    {{$wedevent->contractissueddate->diffInDays()}} Days<br>
                                    {{$wedevent->weddingdate->diffInDays()}} Days<br>
                                    {{$wedevent->deposittakendate->diffInDays()}} Days<br>
                                    {{$wedevent->quarterpaymentdate->diffInDays()}} Days<br>
                                    {{$wedevent->finalweddingtalkdate->diffInDays()}} Days<br>
                                    {{$wedevent->finalpaymentdate->diffInDays()}} Days<br>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <form class="float-right" action="{{route('wedevent.destroy', $wedevent->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i
                                    class="fas fa-user-times"></i> Delete Event
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col mb-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        Event Info
                    </div>

                    <div class="card-body">

                        <div class="col-md-12">
                            <!-- On Hold Button Yes / No -->
                            <a type="button" href="{{route('wedevent.OnHold',$wedevent)}}"
                               @if($wedevent->onhold == "No")
                               class="btn btn-block btn-danger ribbon mb-1"
                               @else
                               class="btn btn-block btn-success ribbon mb-1"
                                @endif
                            >On Hold: {{$wedevent->onhold}}</a>

                            <!-- Contract Returned Button Yes / No -->
                            <a type="button" href="{{route('wedevent.ContractReturned',$wedevent)}}"
                               @if($wedevent->contractreturned == "No")
                               class="btn btn-block btn-danger ribbon mb-1"
                               @else
                               class="btn btn-block btn-success ribbon mb-1"
                                @endif
                            >Contract Returned: {{$wedevent->contractreturned}}</a>

                            <!-- Agreement Signed Button Yes / No -->
                            <a type="button" href="{{route('wedevent.AgreementSigned',$wedevent)}}"
                               @if($wedevent->agreementsigned == "No")
                               class="btn btn-block btn-danger ribbon mb-1"
                               @else
                               class="btn btn-block btn-success ribbon mb-1"
                                @endif
                            >Agreement Signed: {{$wedevent->agreementsigned}}</a>

                            <!-- Deposit Taken Button Yes / No -->
                            <a type="button" href="{{route('wedevent.DepositTaken',$wedevent)}}"
                               @if($wedevent->deposittaken == "No")
                               class="btn btn-block btn-danger ribbon mb-1"
                               @else
                               class="btn btn-block btn-success ribbon mb-1"
                                @endif
                            >Deposit Taken: {{$wedevent->deposittaken}}</a>

                            <!-- 25% Payment Taken Button Yes / No -->
                            <a type="button" href="{{route('wedevent.QuarterPaymentTaken',$wedevent)}}"
                               @if($wedevent->quarterpaymenttaken == "No")
                               class="btn btn-block btn-danger ribbon mb-1"
                               @else
                               class="btn btn-block btn-success ribbon mb-1"
                                @endif
                            >25% Payment Taken: {{$wedevent->quarterpaymenttaken}}</a>

                            <!-- Had Final Talk Button Yes / No -->
                            <a type="button" href="{{route('wedevent.HadFinalTalk',$wedevent)}}"
                               @if($wedevent->hadfinaltalk == "No")
                               class="btn btn-block btn-danger ribbon mb-1"
                               @else
                               class="btn btn-block btn-success ribbon mb-1"
                                @endif
                            >Had Final Talk: {{$wedevent->hadfinaltalk}}</a>

                            <!-- On Hold Button Yes / No -->
                            <a type="button" href="{{route('wedevent.Complete',$wedevent)}}"
                               @if($wedevent->completed == "No")
                               class="btn btn-block btn-danger ribbon mb-1"
                               @else
                               class="btn btn-block btn-success ribbon mb-1"
                                @endif
                            >Wedding Completed: {{$wedevent->completed}}</a>
                        </div>



                    </div>
                </div>
            </div>

        </div>
        </div>
        </div>
    @endsection
</x-admin-master>
