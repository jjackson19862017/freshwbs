<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>View Customers</h1>
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
        <!-- Content Row -->
        <div class="row">
            <!-- Full Column -->
            <div class="col-sm-12">
                <table class="table table-hover table-inverse table-sm text-center">
                    <thead class="thead-dark">
                    <tr>
                        <th>Couple</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <!-- Couple Column, If your an admin you can update the details of the couples else you cannot -->
                            <td>@if(!auth()->user()->userHasRole('Staff'))
                                    <a href="{{route('customers.edit', $customer)}}">{{$customer->couple}}</a>
                                @else
                                    {{$customer->couple}}
                                @endif
                            </td>
                            <td>{{$customer->telephone}}</td>

                            <!-- Allows someone to email them directly from the site -->
                            <td><a href="mailto:{{$customer->email}}">{{$customer->email}}</a></td>

                            <!-- Allows someone to Create / View an Event or Delete the Customer -->
                            <td>
                                <div class="table_buttons">

                                        @if($customer->booked)
                                            <a name="" id="" class="btn btn-warning btn-sm btn_width"
                                               href="{{route('wedevent.profile.show', $customer->booked->id)}}" role="button">Goto
                                                Event</a>
                                        @else
                                            <a name="" id="" class="btn btn-primary btn-sm btn_width"
                                               href="{{route('wedevent.create', $customer->id)}}" role="button">Create Event</a>
                                        @endif




                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="d-flex">
                    <div class="mx-auto">
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
            <!-- / Full Column -->

        </div>
        <!-- / Content Row -->

    @endsection
</x-admin-master>
