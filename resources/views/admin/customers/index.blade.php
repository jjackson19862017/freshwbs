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
                        <tr >
                            <!-- Couple Column, If your an admin you can update the details of the couples else you cannot -->
                            <td>@if(auth()->user()->userHasRole('Admin'))
                                    <a href="{{route('customers.edit', $customer)}}">{{$customer->couple}}</a>
                                @else
                                    {{$customer->couple}}
                                @endif
                                </td>
                            <td>{{$customer->telephone}}</td>

                            <!-- Allows someone to email them directly from the site -->
                            <td><a href="mailto:{{$customer->email}}">{{$customer->email}}</a> </td>

                            <!-- Allows someone to Create / View an Event or Delete the Customer -->
                            <td>
                                <div class="table_buttons">
                                @foreach($booked as $b)
                                    @if($b->customer->id == $customer->id)
                                        <a name="" id="" class="btn btn-success btn-sm btn_width" href="{{route('wedevent.profile.show', $b)}}" role="button">Goto Event</a>
                                    @else
                                        <a name="" id="" class="btn btn-primary btn-sm btn_width" href="{{route('wedevent.create')}}" role="button">Create Event</a>

                                    @endif
                                @endforeach
                                </div>
                                <div class="table_buttons">
                                    <!-- Delete Button Form -->
                                <form action="{{route('customer.destroy', $customer->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn_width"><i class="fas fa-user-times"></i> Delete</button>
                                </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- / Full Column -->

            </div>
            <!-- / Content Row -->

        @endsection
</x-admin-master>
