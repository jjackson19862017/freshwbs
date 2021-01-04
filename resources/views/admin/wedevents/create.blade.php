<x-admin-master>

    @section('content')
        <!-- Top Row -->
            <div class="row">
                <div class="col-sm-7">
                    <h1>Add New Event</h1>
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
            <!-- Add Event Row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Create an Event for {{$customer->couple}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('wedevent.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <!-- Left Half Area -->
                                <div class="col-sm-6">

                                                <div class="form-group">
                                                    <input type="hidden"
                                                           class="form-control" name="customer_id" id="customer_id"
                                                           aria-describedby="helpId" value="{{$customer->id}}">
                                                </div>

                                    <div class="form-group">
                                        <input type="hidden"
                                               class="form-control" name="completed" id="completed"
                                               aria-describedby="helpId" value="No">
                                    </div>




                                    <div class="form-group row">
                                        <label for="firstappointmentdate" class="col-form-label col-sm-4">First
                                            Appointment Date</label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                   class="form-control @error('firstappointmentdate') is-invalid @enderror"
                                                   name="firstappointmentdate" id="firstappointmentdate"
                                                   aria-describedby="helpId"
                                                   placeholder="Enter Appointment Date"
                                                   value="{{ old('firstappointmentdate') }}">
                                            @error('firstappointmentdate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="holdtilldate" class="col-form-label col-sm-4">Hold Till Date</label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                   class="form-control @error('holdtilldate') is-invalid @enderror"
                                                   name="holdtilldate" id="holdtilldate" aria-describedby="helpId"
                                                   placeholder="Enter Hold Till Date" value="{{ old('holdtilldate') }}">
                                            @error('holdtilldate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contractissueddate" class="col-form-label col-sm-4">Contract Issued
                                            Date</label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                   class="form-control @error('contractissueddate') is-invalid @enderror"
                                                   name="contractissueddate" id="contractissueddate"
                                                   aria-describedby="helpId"
                                                   placeholder="Enter Contract Issued Date"
                                                   value="{{ old('contractissueddate') }}">
                                            @error('contractissueddate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="weddingdate" class="col-form-label col-sm-4">Wedding Date</label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                   class="form-control @error('weddingdate') is-invalid @enderror"
                                                   name="weddingdate" id="weddingdate" aria-describedby="helpId"
                                                   placeholder="Enter Wedding Date" value="{{ old('weddingdate') }}">
                                            @error('weddingdate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deposittakendate" class="col-form-label col-sm-4">Deposit Taken
                                            Date</label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                   class="form-control @error('deposittakendate') is-invalid @enderror"
                                                   name="deposittakendate" id="deposittakendate"
                                                   aria-describedby="helpId"
                                                   placeholder="Enter Deposit Taken Date"
                                                   value="{{ old('deposittakendate') }}">
                                            @error('deposittakendate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quarterpaymentdate" class="col-form-label col-sm-4">25% Payment
                                            Date</label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                   class="form-control @error('quarterpaymentdate') is-invalid @enderror"
                                                   name="quarterpaymentdate" id="quarterpaymentdate"
                                                   aria-describedby="helpId"
                                                   placeholder="Enter 25% Payment Date"
                                                   value="{{ old('quarterpaymentdate') }}">
                                            @error('quarterpaymentdate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="finalweddingtalkdate" class="col-form-label col-sm-4">Final Talk
                                            Date</label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                   class="form-control @error('finalweddingtalkdate') is-invalid @enderror"
                                                   name="finalweddingtalkdate" id="finalweddingtalkdate"
                                                   aria-describedby="helpId"
                                                   placeholder="Enter Final Talk Date"
                                                   value="{{ old('finalweddingtalkdate') }}">
                                            @error('finalweddingtalkdate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="finalpaymentdate" class="col-form-label col-sm-4">Final Payment
                                            Date</label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                   class="form-control @error('finalpaymentdate') is-invalid @enderror"
                                                   name="finalpaymentdate" id="finalpaymentdate"
                                                   aria-describedby="helpId"
                                                   placeholder="Enter Final Payment Date"
                                                   value="{{ old('finalpaymentdate') }}">
                                            @error('finalpaymentdate')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- / Left Half Area -->
                                <!-- Right Half Area -->
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="onhold" class="col-form-label col-sm-4 offset-1">On Hold</label>
                                        <div class="col-sm-7">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="onhold" id="onhold1"
                                                       value="Yes">
                                                <label class="form-check-label" for="onhold1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="onhold" id="onhold2"
                                                       value="No"
                                                       checked="checked">
                                                <label class="form-check-label" for="onhold2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contractreturned" class="col-form-label col-sm-4 offset-1">Contract
                                            Returned</label>
                                        <div class="col-sm-7">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="contractreturned"
                                                       id="contractreturned1" value="Yes">
                                                <label class="form-check-label" for="contractreturned1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="contractreturned"
                                                       id="contractreturned2" value="No"
                                                       checked="checked">
                                                <label class="form-check-label" for="contractreturned2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="agreementsigned" class="col-form-label col-sm-4 offset-1">Agreement
                                            Signed</label>
                                        <div class="col-sm-7">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agreementsigned"
                                                       id="agreementsigned1" value="Yes">
                                                <label class="form-check-label" for="agreementsigned1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agreementsigned"
                                                       id="agreementsigned2" value="No"
                                                       checked="checked">
                                                <label class="form-check-label" for="agreementsigned2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deposittaken" class="col-form-label col-sm-4  offset-1">Deposit Taken</label>
                                        <div class="col-sm-7">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="deposittaken"
                                                       id="deposittaken1" value="Yes">
                                                <label class="form-check-label" for="deposittaken1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="deposittaken"
                                                       id="deposittaken2" value="No"
                                                       checked="checked">
                                                <label class="form-check-label" for="deposittaken2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quarterpaymenttaken" class="col-form-label col-sm-4 offset-1">25% Payment
                                            Taken</label>
                                        <div class="col-sm-7">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="quarterpaymenttaken"
                                                       id="quarterpaymenttaken1" value="Yes">
                                                <label class="form-check-label" for="quarterpaymenttaken1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="quarterpaymenttaken"
                                                       id="quarterpaymenttaken2" value="No"
                                                       checked="checked">
                                                <label class="form-check-label" for="quarterpaymenttaken2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hadfinaltalk" class="col-form-label col-sm-4 offset-1">Had Final Talk</label>
                                        <div class="col-sm-7">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadfinaltalk"
                                                       id="hadfinaltalk1" value="Yes">
                                                <label class="form-check-label" for="hadfinaltalk1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadfinaltalk"
                                                       id="hadfinaltalk2" value="No"
                                                       checked="checked">
                                                <label class="form-check-label" for="hadfinaltalk2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="cost" class="col-form-label col-sm-4 offset-1">Cost</label>
                                        <div class="col-sm-7">
                                            <input type="number"
                                                   class="form-control @error('cost') is-invalid @enderror"
                                                   name="cost" step="0.01" min="0"
                                                   id="cost" aria-describedby="helpId" placeholder="Enter Cost"
                                                   value="{{ old('cost') }}">
                                            @error('cost')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary float-right">Create Event</button>
                                    <!-- / Right Half Area -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    @endsection
</x-admin-master>
