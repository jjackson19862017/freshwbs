<x-admin-master>

    @section('content')

        <!-- Page Heading -->
        @if(auth()->user()->userHasRole('Admin'))
            <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-success">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-user-friends fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{$count_customer}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('customers.index')}}">
                        <div class="card-footer bg-gradient-success text-white text-center">
                            <span class="pull-left">View Customers</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-primary">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar-day fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{$count_wedevent}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="">
                        <div class="card-footer bg-gradient-primary text-white text-center">
                            <span class="pull-left">View Booked Events</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-warning">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{$count_user}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('users.index')}}">
                        <div class="card-footer bg-gradient-warning text-white text-center">
                            <span class="pull-left">View Users</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card text-white">
                    <div class="card-header bg-info">
                        <div class="row pl-4">
                            <div class="col-xs-3">
                                <i class="fa fa-people-carry fa-4x"></i>
                            </div>
                            <div class="col-xs-6 offset-3 text-right">
                                <div class='display-4'>{{$count_staff}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('staffs.index')}}">
                        <div class="card-footer bg-gradient-info text-white text-center">
                            <span class="pull-left">View Staff</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    @endsection


</x-admin-master>
