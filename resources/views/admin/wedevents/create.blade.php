<x-admin-master>

    @section('content')
        <h1>Add New Event</h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('wedevent.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group row">
                        <label for="customer_id" class="col-form-label col-sm-2">Customer ID</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="customer_id" id="customer_id">
                            @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->brideforename}} {{$customer->bridesurname}} &amp {{$customer->groomforename}} {{$customer->groomsurname}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="firstappointmentdate" class="col-form-label col-sm-2">First Appointment Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('firstappointmentdate') is-invalid @enderror"
                                   name="firstappointmentdate" id="firstappointmentdate" aria-describedby="helpId"
                                   placeholder="Enter Appointment Date" value="{{ old('firstappointmentdate') }}">
                            @error('firstappointmentdate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="holdtilldate" class="col-form-label col-sm-2">Hold Till Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('holdtilldate') is-invalid @enderror"
                                   name="holdtilldate" id="holdtilldate" aria-describedby="helpId"
                                   placeholder="Enter Hold Till Date" value="{{ old('holdtilldate') }}">
                            @error('holdtilldate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contractissueddate" class="col-form-label col-sm-2">Contract Issued Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('contractissueddate') is-invalid @enderror"
                                   name="contractissueddate" id="contractissueddate" aria-describedby="helpId"
                                   placeholder="Enter Contract Issued Date" value="{{ old('contractissueddate') }}">
                            @error('contractissueddate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="weddingdate" class="col-form-label col-sm-2">Wedding Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('weddingdate') is-invalid @enderror"
                                   name="weddingdate" id="weddingdate" aria-describedby="helpId"
                                   placeholder="Enter Wedding Date" value="{{ old('weddingdate') }}">
                            @error('weddingdate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deposittakendate" class="col-form-label col-sm-2">Deposit Taken Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('deposittakendate') is-invalid @enderror"
                                   name="deposittakendate" id="deposittakendate" aria-describedby="helpId"
                                   placeholder="Enter Deposit Taken Date" value="{{ old('deposittakendate') }}">
                            @error('deposittakendate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quarterpaymentdate" class="col-form-label col-sm-2">25% Payment Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('quarterpaymentdate') is-invalid @enderror"
                                   name="quarterpaymentdate" id="quarterpaymentdate" aria-describedby="helpId"
                                   placeholder="Enter 25% Payment Date" value="{{ old('quarterpaymentdate') }}">
                            @error('quarterpaymentdate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="finalweddingtalkdate" class="col-form-label col-sm-2">Final Talk Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('finalweddingtalkdate') is-invalid @enderror"
                                   name="finalweddingtalkdate" id="finalweddingtalkdate" aria-describedby="helpId"
                                   placeholder="Enter Final Talk Date" value="{{ old('finalweddingtalkdate') }}">
                            @error('finalweddingtalkdate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="finalpaymentdate" class="col-form-label col-sm-2">Final Payment Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('finalpaymentdate') is-invalid @enderror"
                                   name="finalpaymentdate" id="finalpaymentdate" aria-describedby="helpId"
                                   placeholder="Enter Final Payment Date" value="{{ old('finalpaymentdate') }}">
                            @error('finalpaymentdate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="onhold" class="col-form-label col-sm-2">On Hold</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="onhold" id="onhold1" value="Yes">
                                <label class="form-check-label" for="onhold1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="onhold" id="onhold2" value="No"
                                       checked="checked">
                                <label class="form-check-label" for="onhold2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contractreturned" class="col-form-label col-sm-2">Contract Returned</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contractreturned" id="contractreturned1" value="Yes">
                                <label class="form-check-label" for="contractreturned1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contractreturned" id="contractreturned2" value="No"
                                       checked="checked">
                                <label class="form-check-label" for="contractreturned2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="agreementsigned" class="col-form-label col-sm-2">Agreement Signed</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="agreementsigned" id="agreementsigned1" value="Yes">
                                <label class="form-check-label" for="agreementsigned1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="agreementsigned" id="agreementsigned2" value="No"
                                       checked="checked">
                                <label class="form-check-label" for="agreementsigned2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deposittaken" class="col-form-label col-sm-2">Deposit Taken</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="deposittaken" id="deposittaken1" value="Yes">
                                <label class="form-check-label" for="deposittaken1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="deposittaken" id="deposittaken2" value="No"
                                       checked="checked">
                                <label class="form-check-label" for="deposittaken2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="25paymenttaken" class="col-form-label col-sm-2">25% Payment Taken</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="25paymenttaken" id="25paymenttaken1" value="Yes">
                                <label class="form-check-label" for="25paymenttaken1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="25paymenttaken" id="25paymenttaken2" value="No"
                                       checked="checked">
                                <label class="form-check-label" for="25paymenttaken2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hadfinaltalk" class="col-form-label col-sm-2">Had Final Talk</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hadfinaltalk" id="hadfinaltalk1" value="Yes">
                                <label class="form-check-label" for="hadfinaltalk1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hadfinaltalk" id="hadfinaltalk2" value="No"
                                       checked="checked">
                                <label class="form-check-label" for="hadfinaltalk2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cost" class="col-form-label col-sm-2">Cost</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('cost') is-invalid @enderror" name="cost"
                                   id="cost" aria-describedby="helpId" placeholder="Enter Cost" value="{{ old('cost') }}">
                            @error('cost')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subtotal" class="col-form-label col-sm-2">Subtotal</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('subtotal') is-invalid @enderror"
                                   name="subtotal" id="subtotal" aria-describedby="helpId" placeholder="Enter Subtotal" value="{{ old('subtotal') }}">
                            @error('subtotal')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Event</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
