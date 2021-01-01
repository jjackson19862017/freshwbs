<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
                <h6 class="m-0 font-weight-bold @if (Session::has('text-class'))
                {{Session::get('text-class')}}
                @endif">
                    @if (Session::has('message'))
                        {{Session::get('message')}}
                    @endif
                </h6>

                <table class="table table-hover table-inverse">
                    <thead class="thead-dark">
                    <tr>

                        <th>Couple</th>
                        <th>Status</th>
                        <th>Dates</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($wedevents as $wedevent)
                            <td>
                                @if(auth()->user()->userHasRole('Admin'))
                                    <a href="{{route('wedevent.profile.show', $wedevent)}}">
                                        {{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}}
                                        &amp
                                        <br> {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}}
                                    </a>
                                @else
                                    {{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}} &amp
                                    <br> {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}}
                                @endif
                            </td>
                            <td>
                                @if($wedevent->onhold== "No")
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
                                @endif
                            </td>
                            <td>
                                1st Appointment: {{$wedevent->firstappointmentdate}} <br>
                                Hold Till: {{$wedevent->holdtilldate}} <br>
                                Contract Issued: {{$wedevent->contractissueddate}} <br>
                                Wedding Date: {{$wedevent->weddingdate}} <br>
                                Deposit Taken: {{$wedevent->deposittakendate}} <br>
                                25% Payment: {{$wedevent->quarterpaymentdate}} <br>
                                Final Wedding Talk: {{$wedevent->finalweddingtalkdate}} <br>
                                Final Payment: {{$wedevent->finalpaymentdate}} <br>
                            </td>
                            <td>
                                On Hold: {{$wedevent->onhold}}<br>
                                Contract Returned: {{$wedevent->contractreturned}}<br>
                                Agreement Signed: {{$wedevent->agreementsigned}}<br>
                                Deposit Taken: {{$wedevent->deposittaken}}<br>
                                25% Payment Taken: {{$wedevent->quarterpaymenttaken}}<br>
                                Had Final Talk: {{$wedevent->hadfinaltalk}}<br>
                                Cost: £{{$wedevent->cost}}<br>
                                Subtotal: £{{$wedevent->subtotal}}<br>

                            </td>
                            <td>
                                <form action="{{route('wedevent.destroy', $wedevent->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-user-times"></i> Delete
                                    </button>
                                </form>

                            </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-admin-master>
