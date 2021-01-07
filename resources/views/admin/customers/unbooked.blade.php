<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>{{$count_customers}} Unbooked Customers</h1>
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
                        <th>Added</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($customers as $customer)
                        @if(!$customer->booked)
                            <tr>
                            <!-- Couple Column, If your an admin you can update the details of the couples else you cannot -->
                            <td>@if(auth()->user()->userHasRole('Admin'))
                                    <a href="{{route('customers.edit', $customer)}}">{{$customer->couple}}</a>
                                @else
                                    {{$customer->couple}}
                                @endif
                            </td>
                            <td>{{$customer->created_at->diffForHumans()}}</td>


                            <!-- Allows someone to Create / View an Event or Delete the Customer -->
                            <td>
                                <a name="" id="" class="btn btn-warning btn-sm btn_width" href="{{route('wedevent.create', $customer->id)}}" role="button">Create Event</a>
                            </td>
                        </tr>
                            @endif
                    @endforeach
                    </tbody>
                </table>

            </div>
            <!-- / Full Column -->

        </div>
        <!-- / Content Row -->

    @endsection
</x-admin-master>
