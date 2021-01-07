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
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Create an Event for {{$customer->couple}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('wedevent.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" class="form-control" name="customer_id" id="customer_id"
                                           aria-describedby="helpId" value="{{$customer->id}}">
                                    <input type="hidden" class="form-control" name="completed" id="completed"
                                           aria-describedby="helpId" value="No">
                                    <input type="hidden" class="form-control" name="onhold" id="onhold"
                                           aria-describedby="helpId" value="No">
                                    <input type="hidden" class="form-control" name="agreementsigned"
                                           id="agreementsigned" aria-describedby="helpId" value="No">
                                    <input type="hidden" class="form-control" name="deposittaken" id="deposittaken"
                                           aria-describedby="helpId" value="No">
                                    <input type="hidden" class="form-control" name="quarterpaymenttaken"
                                           id="quarterpaymenttaken" aria-describedby="helpId" value="No">
                                    <input type="hidden" class="form-control" name="hadfinaltalk" id="hadfinaltalk"
                                           aria-describedby="helpId" value="No">
                                    <input type="hidden" class="form-control" name="holdtilldate" id="holdtilldate"
                                           aria-describedby="helpId">
                                    <input type="hidden"
                                           class="form-control"
                                           name="finalweddingtalkdate" id="finalweddingtalkdate"
                                           aria-describedby="helpId"
                                           placeholder="Enter Final Talk Date"
                                           value="{{ old('finalweddingtalkdate') }}">


                                    <input type="hidden"
                                           class="form-control"
                                           name="finalpaymentdate" id="finalpaymentdate"
                                           aria-describedby="helpId"
                                           placeholder="Enter Final Payment Date"
                                           value="{{ old('finalpaymentdate') }}">

                                <div class="form-group row">
                                    <label for="contractissueddate" class="col-form-label col-sm-5">Contract Issued
                                        Date</label>
                                    <div class="col-sm-7">
                                        <input type="date"
                                               class="form-control @error('contractissueddate') is-invalid @enderror"
                                               name="contractissueddate" id="contractissueddate"
                                               aria-describedby="helpId"
                                               placeholder="yyyy-mm-dd"
                                               value="{{ old('contractissueddate') }}">
                                        @error('contractissueddate')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="weddingdate" class="col-form-label col-sm-5">Wedding Date</label>
                                    <div class="col-sm-7">
                                        <input type="date"
                                               class="form-control @error('weddingdate') is-invalid @enderror"
                                               name="weddingdate" id="weddingdate" aria-describedby="helpId"
                                               placeholder="yyyy-mm-dd" value="{{ old('weddingdate') }}">
                                        @error('weddingdate')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <input type="hidden"
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
                            </div>
                        </form>
                    </div>
                    <!-- / Left Half Area -->
                </div>
            </div>
        </div>
        </div>

    @endsection
</x-admin-master>
