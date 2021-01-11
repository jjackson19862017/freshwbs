<x-admin-master>
    @section('scripts')
        <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    @endsection

    @section('content')
    <!-- Top Row Content -->
        <div class="row">
            <div class="col-sm-12">
                <h1>{{$wedevent->customer->couple}} on {{$wedevent->weddingdate->format('D d M Y')}}</h1>
                @if($wedevent->completed == "No")
                <h4>Status:
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
                    @endif</h4>
                    @endif
            </div>
        </div>
        <!-- / Top Row Content -->
        <!-- Card Grid -->
        <div class="row mb-3">
            <!-- Couple Information Card -->
            <div class="col mb-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        Couple Info
                    </div>
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-sm-7 no-gutters">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">
                                                {{$wedevent->customer->couple}}
                                                <br>
                                                Telephone: {{$wedevent->customer->telephone}}
                                                <br>
                                                Email:
                                                <br>
                                                <a href="mailto:{{$wedevent->customer->email}}">{{$wedevent->customer->email}}</a>
                                                <br>
                                                Address:
                                                <br>
                                                {{$wedevent->customer->address1}} <br>
                                                {{$wedevent->customer->address2}} <br>
                                                {{$wedevent->customer->townCity}} <br>
                                                {{$wedevent->customer->county}} <br>
                                                {{$wedevent->customer->postCode}}
                                                <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 no-gutters">
                                <!-- If the Customer has a Card Details -->

                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- On Hold Button Yes / No -->
                                            <a type="button" href="{{route('wedevent.OnHold',$wedevent)}}"
                                               @if($wedevent->onhold == "No")
                                               class="btn btn-block btn-danger btn-sm mb-1"
                                               @else
                                               class="btn btn-block btn-success btn-sm mb-1"
                                                @endif
                                            >On Hold: {{$wedevent->onhold}}</a>

                                            <!-- Agreement Signed Button Yes / No -->
                                            <a type="button" href="{{route('wedevent.AgreementSigned',$wedevent)}}"
                                               @if($wedevent->agreementsigned == "No")
                                               class="btn btn-block btn-danger btn-sm mb-1"
                                               @else
                                               class="btn btn-block btn-success btn-sm mb-1"
                                                @endif
                                            >Contract Signed: {{$wedevent->agreementsigned}}</a>

                                            <!-- Deposit Taken Button Yes / No -->
                                            <a type="button" href="{{route('wedevent.DepositTaken',$wedevent)}}"
                                               @if($wedevent->deposittaken == "No")
                                               class="btn btn-block btn-danger btn-sm mb-1"
                                               @else
                                               class="btn btn-block btn-success btn-sm mb-1"
                                                @endif
                                            >Deposit Taken: {{$wedevent->deposittaken}}</a>

                                            <!-- 25% Payment Taken Button Yes / No -->
                                            <a type="button" href="{{route('wedevent.QuarterPaymentTaken',$wedevent)}}"
                                               @if($wedevent->quarterpaymenttaken == "No")
                                               class="btn btn-block btn-danger btn-sm mb-1"
                                               @else
                                               class="btn btn-block btn-success btn-sm mb-1"
                                                @endif
                                            >25% Payment: {{$wedevent->quarterpaymenttaken}}</a>

                                            <!-- Had Final Talk Button Yes / No -->
                                            <a type="button" href="{{route('wedevent.HadFinalTalk',$wedevent)}}"
                                               @if($wedevent->hadfinaltalk == "No")
                                               class="btn btn-block btn-danger btn-sm mb-1"
                                               @else
                                               class="btn btn-block btn-success btn-sm mb-1"
                                                @endif
                                            >Had Final Talk: {{$wedevent->hadfinaltalk}}</a>


                                            <!-- On Hold Button Yes / No -->
                                            <a type="button" href="{{route('wedevent.Complete',$wedevent)}}"
                                               @if($wedevent->completed == "No")
                                               class="btn btn-block btn-danger btn-sm mb-1"
                                               @else
                                               class="btn btn-block btn-success btn-sm mb-1"
                                                @endif
                                            >Had Wedding: {{$wedevent->completed}}</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Couple Information Card -->
            <!-- Dates Information Card -->
            <div class="col mb-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        Dates <span class="float-right"><a name="" id="" class="btn btn-primary btn-sm"
                                                           href="{{route('wedevents.edit', $wedevent)}}"
                                                           role="button">Edit Dates</a></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-inverse table-sm">
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
                                    Hold Till: <br>
                                    Contract Issued: <br>
                                    25% Payment: <br>
                                    Final Wedding Talk: <br>
                                    Final Payment: <br>
                                    Wedding Date: <br>
                                </td>
                                <td>
                                    {{$wedevent->holdtilldate->format('D d M Y')}} <br>
                                    {{$wedevent->contractissueddate->format('D d M Y')}} <br>
                                    {{$wedevent->quarterpaymentdate->format('D d M Y')}} <br>
                                    {{$wedevent->finalweddingtalkdate->format('D d M Y')}} <br>
                                    {{$wedevent->finalpaymentdate->format('D d M Y')}} <br>
                                    {{$wedevent->weddingdate->format('D d M Y')}} <br>

                                </td>
                                <td class="text-center">

                                    @if($wedevent->holdtilldate->isPast() == 1)
                                        <span class="
                                        @if($wedevent->onhold == "No")
                                        text-danger
                                        @else
                                        text-success
                                        @endif
                                        ">PAST</span> @else{{$wedevent->holdtilldate->diffInDays()}} Days @endif<br>
                                    <br>
                                    @if($wedevent->quarterpaymentdate->isPast() == 1)
                                        <span class="
                                        @if($wedevent->quarterpaymenttaken == "No")
                                        text-danger
                                        @else
                                        text-success
                                        @endif
                                        ">PAST</span> @else{{$wedevent->quarterpaymentdate->diffInDays()}}
                                    Days @endif<br>
                                    @if($wedevent->finalweddingtalkdate->isPast() == 1)
                                        <span class="
                                            @if($wedevent->hadfinaltalk == "No")
                                            text-danger
                                            @else
                                            text-success
                                            @endif
                                            ">PAST</span> @else{{$wedevent->finalweddingtalkdate->diffInDays()}}
                                    Days @endif<br>
                                    @if($wedevent->finalpaymentdate->isPast() == 1)<span class="
                                        @if($outstanding > 0)
                                        text-danger
                                        @else
                                        text-success
                                        @endif
                                        ">PAST</span> @else{{$wedevent->finalpaymentdate->diffInDays()}}
                                    Days @endif<br>
                                    @if($wedevent->weddingdate->isPast() == 1)<span class="
                                        @if($wedevent->completed == "No")
                                        text-danger
                                        @else
                                        text-success
                                        @endif
                                        ">PAST</span> @else{{$wedevent->weddingdate->diffInDays()}}
                                    Days @endif<br>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- / Dates Information Card -->
        </div>
        <!-- / Card Grid -->
        <!-- Card Grid -->
        <div class="row mb-3">
            <!-- Event Information Card -->
            <div class="col mb-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        Event Notes
                        <span class="float-right"><form class="float-right"
                                                        action="{{route('wedevent.destroy', $wedevent->id)}}"
                                                        method="post"
                                                        enctype="multipart/form-data">
                            @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i
                                    class="fas fa-user-times"></i> Delete Event
                            </button>
                        </form></span>
                    </div>

                    <div class="card-body">
                        <form class="float-right" action="{{route('wedevent.Notes', $wedevent->id)}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <textarea name="notes" id="notes" class="w-100" rows="20">{{$wedevent->notes}}</textarea>



                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success btn-sm float-right" type="submit">
                            <i class="fas fa-save"> Save Notes</i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- / Event Information Card -->
            <!-- Payment Information Card -->
            <div class="col mb-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        Payment Info
                        @if(!isset($card))
                            <span class="float-right">
                            <a name="addcard" id="addcard"
                               class="btn btn-warning btn-sm"
                                href="{{route('card.create',[$wedevent->customer, $wedevent])}}"
                               role="button">Add Card Details</a>
                                </span>
                        @else
                            <a class="btn btn-warning btn-sm" data-toggle="modal"
                               data-target="#cardDetailsModal">
                                View Card
                            </a>
                            <span class="float-right">
                            <a name="add" id="add"
                               class="btn btn-success btn-sm"
                               data-toggle="modal" data-target="#addTransactionModal"
                               role="button">Add Transaction</a>
                                </span>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-inverse table-sm text-center">
                                    <thead class="thead-dark">
                                    <tr>

                                        <th>Date</th>
                                        <th>Detail</th>
                                        <th>Amount</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($trans as $tran)
                                        <tr>
                                            <td>
                                                {{$tran->created_at->format('d/m/y')}}
                                            </td>
                                            <td>
                                                {{$tran->name}}
                                            </td>
                                            <td>
                                                £{{round($tran->amount,2)}}</td>
                                            <td style="width: 10px;">
                                                <form action="{{route('transaction.destroy', $tran->id)}}"
                                                      method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot class="alert alert-success">
                                    <tr>
                                        <td></td>
                                        <td>Subtotal</td>
                                        <td>£{{round($subtotal,2)}}</td>
                                    </tr>
                                    @if($outstanding > 0)
                                    <tr class="alert alert-danger">
                                        <td></td>
                                        <td>Outstanding</td>
                                        <td>£{{round($outstanding,2)}}</td>
                                    </tr>
                                    @endif
                                    </tfoot>
                                </table>


                            </div>

                        </div>
                        <hr>

                    </div>
                </div>
            </div>
            <!-- / Payment Information Card -->
        </div>
        <!-- / Card Grid -->
        </div>
        </div>

        <!-- Card Details Modal-->
        @if(isset($card))
            <div class="modal fade" id="cardDetailsModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Card Details</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i
                                    class="fas fa-times"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">

                            Name on the Card: {{$card->name}} <br>
                            Type of Card: {{$card->type}}<br>
                            Card Number: {{$card->number}}<br>
                            Expiry Date: {{$card->exp}}<br>
                            CVC Number: {{$card->cvc}}<br>
                        </div>
                        <div class="modal-footer">
                            <form action="{{route('card.destroy', $card->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i
                                        class="fas fa-credit-card"></i> Delete Card
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="modal fade" id="cardDetailsModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Card Details</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h1>No Card Details</h1>
                        </div>
                    </div>
                </div>
            </div>
        @endif

<!-- Add Transaction Modal-->
<div class="modal fade" id="addTransactionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Transaction?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('transaction.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <!-- Left Half Area -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cost of Event: £{{$event->cost}}</li>
                                            <li class="list-group-item">Deposit: £500</li>
                                            <li class="list-group-item">25% Payment: £{{$quarter}}</li>
                                        </ul>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <input type="hidden"
                                                    class="form-control"
                                                    name="wedevent_id"
                                                    id="wedevent_id"
                                                    aria-describedby="helpId"
                                                    value="{{$wedevent->id}}">
                                        </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-form-label col-sm-4">Transaction</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   name="name"
                                                   id="name"
                                                   aria-describedby="helpId"
                                                   placeholder="What is it?"
                                                   value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="amount" class="col-form-label col-sm-4">Subtotal</label>
                                        <div class="col-sm-8">
                                            <input type="number"
                                                   class="form-control @error('amount') is-invalid @enderror"
                                                   name="amount" id="amount" aria-describedby="helpId" step="0.01" min="0"
                                                   placeholder="Enter Amount" value="{{ old('amount') }}">
                                            @error('amount')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary float-right">Create Transaction</button>

                        </form>
            </div>
        </div>
    </div>
</div>


    @endsection

    @section('js')
        <script>
            CKEDITOR.replace('notes');
        </script>
    @endsection
</x-admin-master>
