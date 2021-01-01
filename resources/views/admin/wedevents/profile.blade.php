<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1>Event Page for {{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}} &amp
                    {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}} </h1>
                <h4>Status: @if($wedevent->onhold== "No")
                        Check Hold
                    @else
                        @if($wedevent->contractreturned == "No")
                            Have they signed the contract?
                        @else
                            @if($wedevent->agreementsigned == "No")
                                Have they signed the agreement?
                            @else
                                @if($wedevent->deposittaken =="No")
                                    Have they paid their deposit?
                                @else
                                    @if($wedevent->quarterpaymenttaken == "No")
                                        Have they paid there 25% costs?
                                    @else
                                        @if($wedevent->hadfinaltalk == "No")
                                            Have they had there final talk?
                                        @else
                                            No Tasks
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
                                Couple Info
                            </div>
                            <div class="card-body">
                            <p class="card-text">{{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}} &amp {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}}</p>
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
                                Dates
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
                                                Hold Till:  <br>
                                                Contract Issued:  <br>
                                                Wedding Date:  <br>
                                                Deposit Taken:  <br>
                                                25% Payment:  <br>
                                                Final Wedding Talk:  <br>
                                                Final Payment:  <br>
                                            </td>
                                            <td>
                                                {{$wedevent->firstappointmentdate->format('d-m-Y')}}<br>
                                                {{$wedevent->holdtilldate->format('d-m-Y')}} <br>
                                                {{$wedevent->contractissueddate->format('d-m-Y')}} <br>
                                                {{$wedevent->weddingdate->format('d-m-Y')}} <br>
                                                {{$wedevent->deposittakendate->format('d-m-Y')}} <br>
                                                {{$wedevent->quarterpaymentdate->format('d-m-Y')}} <br>
                                                {{$wedevent->finalweddingtalkdate->format('d-m-Y')}} <br>
                                                {{$wedevent->finalpaymentdate->format('d-m-Y')}} <br>
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
                                <a name="editdates" id="editdates" class="btn btn-primary" href="{{route('wedevents.edit', $wedevent)}}" role="button">Edit Dates</a>
                                <form class="float-right"action="{{route('wedevent.destroy', $wedevent->id)}}" method="post"
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
                                <table class="table table-hover table-inverse">
                                    <thead class="thead-dark">
                                    <tr>

                                        <th>Details</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <td>
                                            On Hold: <br>
                                            Contract Returned: <br>
                                            Agreement Signed: <br>
                                            Deposit Taken: <br>
                                            25% Payment Taken: <br>
                                            Had Final Talk: <br>

                                        </td>
                                        <td>
                                            {{$wedevent->onhold}}<br>
                                            {{$wedevent->contractreturned}}<br>
                                            {{$wedevent->agreementsigned}}<br>
                                            {{$wedevent->deposittaken}}<br>
                                            {{$wedevent->quarterpaymenttaken}}<br>
                                            {{$wedevent->hadfinaltalk}}<br>

                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endsection
</x-admin-master>
