<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Create Holiday Event</h1>
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
            <!-- Staff Table Area -->
            <div class="col-sm-12">
            <form action="{{route('staffs.storeHoliday', $staff)}}" method="post" class="form-horizontal">
                @csrf

                    <input type="hidden"
                        class="form-control" name="staff_id" id="staff_id" aria-describedby="helpId" value="{{$staff->id}}">

                <div class="form-group row">
                    <label for="start" class="col-form-label col-sm-5">Start
                        Date</label>
                    <div class="col-sm-7">
                        <input type="date"
                                class="form-control @error('start') is-invalid @enderror"
                                name="start" id="start"
                                aria-describedby="helpId"
                                placeholder="yyyy-mm-dd"
                                value="{{ old('start') }}">
                        @error('start')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="finish" class="col-form-label col-sm-5">Finish
                        Date</label>
                    <div class="col-sm-7">
                        <input type="date"
                                class="form-control @error('finish') is-invalid @enderror"
                                name="finish" id="finish"
                                aria-describedby="helpId"
                                placeholder="yyyy-mm-dd"
                                value="{{ old('finish') }}">
                        @error('finish')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Create Holiday</button>



            </form>

            </div>
            <!-- / Staff Table Area -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </div>
        <!-- Content Row -->


    @endsection
</x-admin-master>
