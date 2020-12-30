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

                        <th>Couple</th>
                        <th>Wedding Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($wedevents as $wedevent)
                                <td>
                                    @if(auth()->user()->userHasRole('Admin'))
                                        <a href="{{route('wedevents.edit', $wedevent)}}">
                                            {{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}} &amp {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}}
                                        </a>
                                @else
                                    {{$wedevent->customer->brideforename}} {{$wedevent->customer->bridesurname}} &amp {{$wedevent->customer->groomforename}} {{$wedevent->customer->groomsurname}}

                                @endif
                                </td>
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
