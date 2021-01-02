<x-admin-master>

@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Add Card Details</h1>
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
        <!-- Add Staff Row -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Enter New Card Details...
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{route('card.store')}}" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <input type="hidden"
                                                   class="form-control @error('customer_id') is-invalid @enderror"
                                                   name="customer_id" id="customer_id" aria-describedby="helpId"
                                                   value="{{$customer->id}}">
                                            @error('customer_id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <input type="hidden"
                                                   class="form-control @error('id') is-invalid @enderror"
                                                   name="id" id="id" aria-describedby="helpId"
                                                   value="{{$wedevent->id}}">
                                            @error('id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-form-label col-sm-4">Name on the card</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   name="name" id="name" aria-describedby="helpId"
                                                   placeholder="Enter Name on the Card" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <label for="type" class="col-form-label col-sm-4">Card Type</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="type" id="type">
                                            <option value="Visa-Debit">Visa Debit</option>
                                            <option value="Visa-Credit">Visa Credit</option>
                                            <option value="Master-Debit">Master Debit</option>
                                            <option value="Master-Credit">Master Credit</option>
                                            <option value="Amex">American Express</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label for="number" class="col-form-label col-sm-4">Number on the card</label>
                                        <div class="col-sm-8">
                                            <input type="number"
                                                   class="form-control @error('number') is-invalid @enderror"
                                                   name="number" id="number" aria-describedby="helpId"
                                                   placeholder="16-Digit Card Number" value="{{ old('number') }}">
                                            @error('number')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exp" class="col-form-label col-sm-4">Expiry</label>
                                        <div class="col-sm-8">
                                            <input type="month"
                                                   class="form-control @error('exp') is-invalid @enderror"
                                                   name="exp" id="exp" aria-describedby="helpId" value="{{ old('exp') }}"
                                                   >
                                            @error('exp')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cvc" class="col-form-label col-sm-4">CVC</label>
                                        <div class="col-sm-8">
                                            <input type="number"
                                                   class="form-control @error('cvc') is-invalid @enderror"
                                                   name="cvc" id="cvc" aria-describedby="helpId"
                                                   placeholder="Enter CVC" value="{{ old('cvc') }}">
                                            @error('cvc')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                <hr>
                                <button type="submit"
                                        @if (Session::has('message'))
                                        class="btn btn-success float-right">{{Session::get('message')}}
                                    @else
                                        class="btn btn-primary float-right">Add Card Details
                                    @endif
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
            <!-- / Add Staff Row -->

    @endsection
</x-admin-master>
