<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-8">
                <h6 class="m-0 font-weight-bold @if (Session::has('text-class'))
                {{Session::get('text-class')}}
                @endif">
                    @if (Session::has('message'))
                        {{Session::get('message')}}
                    @endif
                </h6>

                <table class="table table-hover table-inverse">
                    <thead class="thead-dark">
                    <tr>
                        <th>Bride</th>
                        <th>Groom</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->brideforename}} {{$customer->bridesurname}}</td>
                            <td>{{$customer->groomforename}} {{$customer->groomsurname}}</td>
                            <td>{{$customer->telephone}}</td>
                            <td>{{$customer->email}}</td>
                            <td>
                                <form action="{{route('customer.destroy', $customer->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i> Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-admin-master>
