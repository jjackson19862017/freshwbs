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

                        <th>Id</th>
                        <th>Couple ID</th>
                        <th>Wedding Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($wedevents as $wedevent)
                            <td>{{$wedevent->id}}</td>
                            <td>{{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}} &amp {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}}</td>
                            <td>{{$wedevent->weddingdate}}</td>
                            <td>
                                <form action="{{route('wedevent.destroy', $wedevent->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i> Delete</button>
                                </form>

                            </td>
                                @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-admin-master>
