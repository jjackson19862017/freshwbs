<x-admin-master>

    @section('content')
        <h1>Edit Event</h1>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Edit {{$wedevent->customer->brideforename}} &amp {{$wedevent->customer->groomforename}}'s Event
                    </div>
                    <div class="card-body">
                        <form action="{{route('wedevents.update',$wedevent->id)}}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control @error('customer_id') is-invalid @enderror"
                                                   name="customer_id" id="customer_id" aria-describedby="helpId" placeholder="Enter Subtotal" value="{{ $wedevent->customer_id }}">
                                            @error('customer_id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="firstappointmentdate" class="col-form-label col-sm-3">First Appointment Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('firstappointmentdate') is-invalid @enderror"
                                                   name="firstappointmentdate" id="firstappointmentdate" aria-describedby="helpId"
                                                   placeholder="Enter Appointment Date" value="{{ $wedevent->firstappointmentdate}}">
                                            @error('firstappointmentdate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="holdtilldate" class="col-form-label col-sm-3">Hold Till Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('holdtilldate') is-invalid @enderror"
                                                   name="holdtilldate" id="holdtilldate" aria-describedby="helpId"
                                                   placeholder="Enter Hold Till Date" value="{{ $wedevent->holdtilldate }}">
                                            @error('holdtilldate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contractissueddate" class="col-form-label col-sm-3">Contract Issued Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('contractissueddate') is-invalid @enderror"
                                                   name="contractissueddate" id="contractissueddate" aria-describedby="helpId"
                                                   placeholder="Enter Contract Issued Date" value="{{ $wedevent->contractissueddate }}">
                                            @error('contractissueddate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="weddingdate" class="col-form-label col-sm-3">Wedding Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('weddingdate') is-invalid @enderror"
                                                   name="weddingdate" id="weddingdate" aria-describedby="helpId"
                                                   placeholder="Enter Wedding Date" value="{{ $wedevent->weddingdate }}">
                                            @error('weddingdate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deposittakendate" class="col-form-label col-sm-3">Deposit Taken Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('deposittakendate') is-invalid @enderror"
                                                   name="deposittakendate" id="deposittakendate" aria-describedby="helpId"
                                                   placeholder="Enter Deposit Taken Date" value="{{ $wedevent->deposittakendate }}">
                                            @error('deposittakendate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quarterpaymentdate" class="col-form-label col-sm-3">25% Payment Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('quarterpaymentdate') is-invalid @enderror"
                                                   name="quarterpaymentdate" id="quarterpaymentdate" aria-describedby="helpId"
                                                   placeholder="Enter 25% Payment Date" value="{{ $wedevent->quarterpaymentdate }}">
                                            @error('quarterpaymentdate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="finalweddingtalkdate" class="col-form-label col-sm-3">Final Talk Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('finalweddingtalkdate') is-invalid @enderror"
                                                   name="finalweddingtalkdate" id="finalweddingtalkdate" aria-describedby="helpId"
                                                   placeholder="Enter Final Talk Date" value="{{ $wedevent->finalweddingtalkdate }}">
                                            @error('finalweddingtalkdate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="finalpaymentdate" class="col-form-label col-sm-3">Final Payment Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('finalpaymentdate') is-invalid @enderror"
                                                   name="finalpaymentdate" id="finalpaymentdate" aria-describedby="helpId"
                                                   placeholder="Enter Final Payment Date" value="{{ $wedevent->finalpaymentdate }}">
                                            @error('finalpaymentdate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5 offset-1">
                                    <div class="form-group row">
                                        <label for="onhold" class="col-form-label col-sm-4">On Hold</label>
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="onhold" id="onhold1" value="Yes" @if($wedevent->onhold == "Yes")checked="checked"@endif>
                                                <label class="form-check-label" for="onhold1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="onhold" id="onhold2" value="No"
                                                       @if($wedevent->onhold == "No")checked="checked"@endif>
                                                <label class="form-check-label" for="onhold2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contractreturned" class="col-form-label col-sm-4">Contract Returned</label>
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="contractreturned" id="contractreturned1" value="Yes" @if($wedevent->contractreturned == "Yes")checked="checked"@endif>
                                                <label class="form-check-label" for="contractreturned1" >Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="contractreturned" id="contractreturned2" value="No"
                                                       @if($wedevent->contractreturned == "No")checked="checked"@endif>
                                                <label class="form-check-label" for="contractreturned2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="agreementsigned" class="col-form-label col-sm-4">Agreement Signed</label>
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agreementsigned" id="agreementsigned1" value="Yes" @if($wedevent->agreementsigned == "Yes")checked="checked"@endif>
                                                <label class="form-check-label" for="agreementsigned1" >Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agreementsigned" id="agreementsigned2" value="No"
                                                       @if($wedevent->agreementsigned == "No")checked="checked"@endif>
                                                <label class="form-check-label" for="agreementsigned2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deposittaken" class="col-form-label col-sm-4">Deposit Taken</label>
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="deposittaken" id="deposittaken1" value="Yes" @if($wedevent->deposittaken == "Yes")checked="checked"@endif>
                                                <label class="form-check-label" for="deposittaken1" >Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="deposittaken" id="deposittaken2" value="No"
                                                       @if($wedevent->deposittaken == "No")checked="checked"@endif>
                                                <label class="form-check-label" for="deposittaken2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quarterpaymenttaken" class="col-form-label col-sm-4">25% Payment Taken</label>
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="quarterpaymenttaken" id="quarterpaymenttaken1" value="Yes" @if($wedevent->quarterpaymenttaken == "Yes")checked="checked"@endif>
                                                <label class="form-check-label" for="quarterpaymenttaken1" >Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="quarterpaymenttaken" id="quarterpaymenttaken2" value="No"
                                                       @if($wedevent->quarterpaymenttaken == "No")checked="checked"@endif>
                                                <label class="form-check-label" for="quarterpaymenttaken2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hadfinaltalk" class="col-form-label col-sm-4">Had Final Talk</label>
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadfinaltalk" id="hadfinaltalk1" value="Yes" @if($wedevent->hadfinaltalk == "Yes")checked="checked"@endif>
                                                <label class="form-check-label" for="hadfinaltalk1" >Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadfinaltalk" id="hadfinaltalk2" value="No"
                                                       @if($wedevent->hadfinaltalk == "No")checked="checked"@endif>
                                                <label class="form-check-label" for="hadfinaltalk2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="cost" class="col-form-label col-sm-4">Cost</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control @error('cost') is-invalid @enderror" name="cost"
                                                   id="cost" aria-describedby="helpId" placeholder="Enter Cost" value="{{ $wedevent->cost }}">
                                            @error('cost')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="subtotal" class="col-form-label col-sm-4">Subtotal</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control @error('subtotal') is-invalid @enderror"
                                                   name="subtotal" id="subtotal" aria-describedby="helpId" placeholder="Enter Subtotal" value="{{ $wedevent->subtotal }}">
                                            @error('subtotal')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="completed" class="col-form-label col-sm-4">Completed</label>
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="completed" id="completed1" value="Yes" @if($wedevent->completed == "Yes")checked="checked"@endif>
                                                <label class="form-check-label" for="completed1" >Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="completed" id="completed2" value="No"
                                                       @if($wedevent->completed == "No")checked="checked"@endif>
                                                <label class="form-check-label" for="completed2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Update Event</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    @endsection
</x-admin-master>
