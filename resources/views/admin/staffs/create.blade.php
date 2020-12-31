<x-admin-master>

    @section('content')
        <h1>Add New Staff</h1>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Enter New Staff Details...
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <form action="{{route('staff.store')}}" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="forename" class="col-form-label col-sm-3">Forename</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                   class="form-control @error('forename') is-invalid @enderror"
                                                   name="forename" id="forename" aria-describedby="helpId"
                                                   placeholder="Enter Forename">
                                            @error('forename')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="surname" class="col-form-label col-sm-3">Surname</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                   class="form-control @error('surname') is-invalid @enderror"
                                                   name="surname" id="surname" aria-describedby="helpId"
                                                   placeholder="Enter Surname">
                                            @error('surname')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telephone" class="col-form-label col-sm-3">Telephone</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                   class="form-control @error('telephone') is-invalid @enderror"
                                                   name="telephone" id="telephone" aria-describedby="helpId"
                                                   placeholder="Enter Telephone">
                                            @error('telephone')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-form-label col-sm-3">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                   name="email" id="email" aria-describedby="helpId"
                                                   placeholder="Enter Email">
                                            @error('email')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address1" class="col-form-label col-sm-3">Address 1</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                   class="form-control @error('address1') is-invalid @enderror"
                                                   name="address1" id="address1" aria-describedby="helpId"
                                                   placeholder="Enter Address 1">
                                            @error('address1')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address2" class="col-form-label col-sm-3">Address 2</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                   class="form-control @error('address2') is-invalid @enderror"
                                                   name="address2" id="address2" aria-describedby="helpId"
                                                   placeholder="Enter Address 2">
                                            @error('address2')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="townCity" class="col-form-label col-sm-3">Town / City</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                   class="form-control @error('townCity') is-invalid @enderror"
                                                   name="townCity" id="townCity" aria-describedby="helpId"
                                                   placeholder="Enter Town/City">
                                            @error('townCity')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="county" class="col-form-label col-sm-3">County</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                   class="form-control @error('county') is-invalid @enderror"
                                                   name="county" id="county" aria-describedby="helpId"
                                                   placeholder="Enter County">
                                            @error('county')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="postCode" class="col-form-label col-sm-3">Post Code</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                   class="form-control @error('postCode') is-invalid @enderror"
                                                   name="postCode" id="postCode" aria-describedby="helpId"
                                                   placeholder="Enter Post-Code">
                                            @error('postCode')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="personallicense" class="col-form-label col-sm-3">Personal
                                        License</label>
                                    <div class="col-sm-9">

                                        <select class="form-control" name="personallicense" id="personallicense">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="employmenttype" class="col-form-label col-sm-3">Employment Type</label>
                                    <div class="col-sm-9">

                                        <select class="form-control" name="employmenttype" id="employmenttype">
                                            <option value="Salary">Salary</option>
                                            <option value="Hourly">Hourly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hotel" class="col-form-label col-sm-3">Hotel</label>
                                    <div class="col-sm-9">

                                        <select class="form-control" name="hotel" id="hotel">
                                            <option value="Shard">Shard</option>
                                            <option value="The Mill">The Mill</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-form-label col-sm-3">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="status" id="status">
                                            <option value="Employed">Employed</option>
                                            <option value="Furloughed">Furloughed</option>
                                            <option value="Not Employed">Not Employed</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit"
                                        @if (Session::has('message'))
                                        class="btn btn-success float-right">{{Session::get('message')}}
                                    @else
                                        class="btn btn-primary float-right">Add Staff Member
                                    @endif
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
    @endsection
</x-admin-master>
