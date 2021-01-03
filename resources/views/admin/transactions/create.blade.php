<x-admin-master>

    @section('content')
        <!-- Top Row -->
            <div class="row">
                <div class="col-sm-7">
                    <h1>Add New Tranaction</h1>
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
                        Create a Transaction
                    </div>
                    <div class="card-body">
                        <form action="{{route('transaction.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <!-- Left Half Area -->
                                <div class="col-sm-6">

                                                <div class="form-group">
                                                    <input type="hidden"
                                                           class="form-control" name="wedevent_id" id="wedevent_id"
                                                           aria-describedby="helpId" value="{{$wedevent}}">
                                                </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-form-label col-sm-4">Transaction</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   name="name"
                                                   id="name" aria-describedby="helpId" placeholder="What is it?"
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
                                                   name="amount" id="amount" aria-describedby="helpId"
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
                                <!-- / Left Half Area -->
                                <!-- Right Half Area -->
                                <div class="col-sm-6">

                                    <div class="col-sm-12">
                                        <div class="card">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Cost of Event: £{{$event->cost}}</li>
                                                <li class="list-group-item">Deposit: £????</li>
                                                <li class="list-group-item">25% Payment: £{{$quarter}}</li>
                                            </ul>
                                        </div>

                                    </div>



                                    <!-- / Right Half Area -->

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    @endsection
</x-admin-master>
