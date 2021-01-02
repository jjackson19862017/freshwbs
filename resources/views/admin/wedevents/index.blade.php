<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Events</h1>
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
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($wedevents as $wedevent)
                            <td>
                                <!-- If your admin, then you can have access to the Events Page else you cannot access it -->
                                @if(auth()->user()->userHasRole('Admin'))
                                    <a href="{{route('wedevent.profile.show', $wedevent)}}">
                                        {{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}}
                                        &amp
                                        {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}}
                                        <hr>
                                        Event: {{$wedevent->weddingdate->diffInDays()}} days away
                                    </a>
                                @else
                                    {{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}} &amp
                                    {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}}
                                    <hr>
                                    Event: {{$wedevent->weddingdate->diffInDays()}} days away
                                @endif
                            </td>
                            <td>
                                <!-- If Statements that reflect the progess of the Event -->
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
                                <hr>
                                <!-- On Hold Button Yes / No -->
                                <a type="button" href="{{route('wedevent.OnHold',$wedevent)}}"
                                   @if($wedevent->onhold == "No")
                                   class="btn btn-sm btn-danger  mb-1"
                                   @else
                                   class="btn btn-sm btn-success  mb-1"
                                    @endif
                                >On Hold</a>

                                <!-- Contract Returned Button Yes / No -->
                                <a type="button" href="{{route('wedevent.ContractReturned',$wedevent)}}"
                                   @if($wedevent->contractreturned == "No")
                                   class="btn btn-sm btn-danger  mb-1"
                                   @else
                                   class="btn btn-sm btn-success  mb-1"
                                    @endif
                                >Contract</a>

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
                                >Completed</a>

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
