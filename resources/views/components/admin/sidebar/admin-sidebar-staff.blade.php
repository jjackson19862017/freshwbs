<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStaffArea" aria-expanded="true"
       aria-controls="collapseUserArea">
        <i class="fas fa-key"></i>
        <span>Staff Members:</span>
    </a>
    <div id="collapseStaffArea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Staff:</h6>
            <a class="collapse-item" data-toggle="modal" data-target="#addStaffModal">Add Staff Member</a>
            <a class="collapse-item" href="{{route('staffs.index')}}">View All Staff Members</a>
            <a class="collapse-item" href="{{route('admin.hotels.holidays')}}">View All Holidays</a>
        </div>
    </div>
</li>

<!-- Add Staff Modal-->
<div class="modal fade" id="addStaffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Staff Member?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{route('staff.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label for="forename" class="col-form-label col-sm-4">Forename</label>
                                <div class="col-sm-8">
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
                                <label for="surname" class="col-form-label col-sm-4">Surname</label>
                                <div class="col-sm-8">
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
                                <label for="telephone" class="col-form-label col-sm-4">Telephone</label>
                                <div class="col-sm-8">
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
                                <label for="email" class="col-form-label col-sm-4">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           name="email" id="email" aria-describedby="helpId"
                                           placeholder="Enter Email">
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address1" class="col-form-label col-sm-4">Address 1</label>
                                <div class="col-sm-8">
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
                                <label for="address2" class="col-form-label col-sm-4">Address 2</label>
                                <div class="col-sm-8">
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
                                <label for="townCity" class="col-form-label col-sm-4">Town / City</label>
                                <div class="col-sm-8">
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
                                <label for="county" class="col-form-label col-sm-4">County</label>
                                <div class="col-sm-8">
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
                                <label for="postCode" class="col-form-label col-sm-4">Post Code</label>
                                <div class="col-sm-8">
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
                            <label for="personallicense" class="col-form-label col-sm-4">Personal
                                License</label>
                            <div class="col-sm-8">

                                <select class="form-control" name="personallicense" id="personallicense">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="employmenttype" class="col-form-label col-sm-4">Employment Type</label>
                            <div class="col-sm-8">

                                <select class="form-control" name="employmenttype" id="employmenttype">
                                    <option value="Salary">Salary</option>
                                    <option value="Hourly">Hourly</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hotel" class="col-form-label col-sm-4">Hotel</label>
                            <div class="col-sm-8">

                                <select class="form-control" name="hotel" id="hotel">
                                    <option value="Shard">Shard</option>
                                    <option value="The Mill">The Mill</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-form-label col-sm-4">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status" id="status">
                                    <option value="Employed">Employed</option>
                                    <option value="Furloughed">Furloughed</option>
                                    <option value="Not Employed">Not Employed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                        <label for="holidaysleft" class="col-form-label col-sm-4">Holidays Left: </label>
                                        <div class="col-sm-8">
                                            <input type="number"
                                                   class="form-control @error('holidaysleft') is-invalid @enderror"
                                                   name="holidaysleft" id="holidaysleft" aria-describedby="helpId"
                                                   placeholder="Holiday days left to take"
                                                   value="28">
                                            @error('holidaysleft')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
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
</div>

