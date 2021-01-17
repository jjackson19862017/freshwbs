<x-admin-master>

    @section('content')
        <h1>Edit Customer</h1>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Edit Customer Details
                    </div>
                    <div class="card-body">
                        <form action="{{route('customers.update', $customer->id)}}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="brideforename" class="col-form-label col-sm-3">Brides Forename</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('brideforename') is-invalid @enderror" name="brideforename" id="brideforename" aria-describedby="helpId" placeholder="Enter Forename" value="{{$customer->brideforename}}">
                                            @error('brideforename')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bridesurname" class="col-form-label col-sm-3">Brides Surname</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('bridesurname') is-invalid @enderror" name="bridesurname" id="bridesurname" aria-describedby="helpId" placeholder="Enter Surname" value="{{$customer->bridesurname}}">
                                            @error('bridesurname')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="groomforename" class="col-form-label col-sm-3">Grooms Forename</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('groomforename') is-invalid @enderror" name="groomforename" id="groomforename" aria-describedby="helpId" placeholder="Enter Forename" value="{{$customer->groomforename}}">
                                            @error('groomforename')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="groomsurname" class="col-form-label col-sm-3">Grooms Surname</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('groomsurname') is-invalid @enderror" name="groomsurname" id="groomsurname" aria-describedby="helpId" placeholder="Enter Surname" value="{{$customer->groomsurname}}">
                                            @error('groomsurname')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telephone" class="col-form-label col-sm-3">Telephone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" id="telephone" aria-describedby="helpId" placeholder="Enter Telephone" value="{{$customer->telephone}}">
                                            @error('telephone')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-form-label col-sm-3">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="helpId" placeholder="Enter Email" value="{{$customer->email}}">
                                            @error('email')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="address1" class="col-form-label col-sm-3">Address 1</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" id="address1" aria-describedby="helpId" placeholder="Enter Address 1" value="{{$customer->address1}}">
                                            @error('address1')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address2" class="col-form-label col-sm-3">Address 2</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" id="address2" aria-describedby="helpId" placeholder="Enter Address 2" value="{{$customer->address2}}">
                                            @error('address2')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="townCity" class="col-form-label col-sm-3">Town / City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('townCity') is-invalid @enderror" name="townCity" id="townCity" aria-describedby="helpId" placeholder="Enter Town/City" value="{{$customer->townCity}}">
                                            @error('townCity')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="county" class="col-form-label col-sm-3">County</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('county') is-invalid @enderror" name="county" id="county" aria-describedby="helpId" placeholder="Enter County" value="{{$customer->county}}">
                                            @error('county')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="postCode" class="col-form-label col-sm-3">Post Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('postCode') is-invalid @enderror" name="postCode" id="postCode" aria-describedby="helpId" placeholder="Enter Post-Code" value="{{$customer->postCode}}">
                                            @error('postCode')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary float-right">Update Customer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    @endsection
</x-admin-master>

