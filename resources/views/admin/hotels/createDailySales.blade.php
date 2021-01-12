<x-admin-master>
@section('content')
        <!-- Content Row -->
        <div class="card">

            <div class="card-body">


        <div class="row">
            <!-- Left Column -->
            <div class="col-sm-6">
                <form action="{{route('hotels.store')}}" method="post" class="form-horizontal">
                    @csrf
                            <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{auth()->user()->id}}"
                                           aria-describedby="helpId">
                                <div class="form-group row">
                                    <div class="col-sm-7">
                                        <input type="hidden"
                                               class="form-control @error('date') is-invalid @enderror"
                                               name="date" id="date"
                                               aria-describedby="helpId" value="{{ now() }}">
                                        @error('date')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <h5>Clerk: {{auth()->user()->name}}</h5>
                                <h5>Date: {{now()->format('D d M y')}}</h5>
                                <hr>
                                <div class="form-group row">
                                    <label for="hotel" class="col-form-label col-sm-4">Hotel</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="hotel" id="hotel">
                                            <option value="Shard">Shard</option>
                                            <option value="The Mill">The Mill</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="card">
                                    <div class="card-header bg-gradient-primary text-white">Other Payment Forms</div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="iou" class="col-form-label col-sm-4 offset-1">IOU's</label>
                                            <div class="col-sm-7">
                                                <input type="number"
                                                    class="form-control @error('iou') is-invalid @enderror"
                                                    name="iou" step="0.01" min="0"
                                                    id="iou" aria-describedby="helpId" value="0"
                                                    value="{{ old('iou') }}">
                                                @error('iou')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bacs" class="col-form-label col-sm-4 offset-1">BACS</label>
                                            <div class="col-sm-7">
                                                <input type="number"
                                                    class="form-control @error('bacs') is-invalid @enderror"
                                                    name="bacs" step="0.01" min="0"
                                                    id="bacs" aria-describedby="helpId" value="0"
                                                    value="{{ old('bacs') }}">
                                                @error('bacs')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cheque" class="col-form-label col-sm-4 offset-1">Cheque</label>
                                            <div class="col-sm-7">
                                                <input type="number"
                                                    class="form-control @error('cheque') is-invalid @enderror"
                                                    name="cheque" step="0.01" min="0"
                                                    id="cheque" aria-describedby="helpId" value="0"
                                                    value="{{ old('cheque') }}">
                                                @error('cheque')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card">
                                    <div class="card-header bg-gradient-primary text-white">Card Machines</div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="pdqreception" class="col-form-label col-sm-4 offset-1">Reception</label>
                                            <div class="col-sm-7">
                                                <input type="number"
                                                    class="form-control @error('pdqreception') is-invalid @enderror"
                                                    name="pdqreception" step="0.01" min="0"
                                                    id="pdqreception" aria-describedby="helpId" value="0"
                                                    value="{{ old('pdqreception') }}">
                                                @error('pdqreception')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pdqbar" class="col-form-label col-sm-4 offset-1">Bar</label>
                                                <div class="col-sm-7">
                                                    <input type="number"
                                                        class="form-control @error('pdqbar') is-invalid @enderror"
                                                        name="pdqbar" step="0.01" min="0"
                                                        id="pdqbar" aria-describedby="helpId" value="0"
                                                        value="{{ old('pdqbar') }}">
                                                    @error('pdqbar')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pdqrestaurant" class="col-form-label col-sm-4 offset-1">Restaurant</label>
                                            <div class="col-sm-7">
                                                <input type="number"
                                                    class="form-control @error('pdqrestaurant') is-invalid @enderror"
                                                    name="pdqrestaurant" step="0.01" min="0"
                                                    id="pdqrestaurant" aria-describedby="helpId" value="0"
                                                    value="{{ old('pdqrestaurant') }}">
                                                @error('pdqrestaurant')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

            </div>

            <!-- / Left Column -->
            <!-- Right Column -->
            <div class="col-sm-6">
                <div class="card">
                                    <div class="card-header bg-gradient-primary text-white">Till Counting</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="notefifty" class="col-form-label col-sm-4 offset-1">£50</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('notefifty') is-invalid @enderror"
                                        name="notefifty" step="0.01" min="0"
                                        id="notefifty" aria-describedby="helpId" value="0"
                                        value="{{ old('notefifty') }}">
                                @error('notefifty')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="notetwenty" class="col-form-label col-sm-4 offset-1">£20</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('notetwenty') is-invalid @enderror"
                                        name="notetwenty" step="0.01" min="0"
                                        id="notetwenty" aria-describedby="helpId" value="0"
                                        value="{{ old('notetwenty') }}">
                                @error('notetwenty')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="noteten" class="col-form-label col-sm-4 offset-1">£10</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('noteten') is-invalid @enderror"
                                        name="noteten" step="0.01" min="0"
                                        id="noteten" aria-describedby="helpId" value="0"
                                        value="{{ old('noteten') }}">
                                @error('noteten')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="notefive" class="col-form-label col-sm-4 offset-1">£5</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('notefive') is-invalid @enderror"
                                        name="notefive" step="0.01" min="0"
                                        id="notefive" aria-describedby="helpId" value="0"
                                        value="{{ old('notefive') }}">
                                @error('notefive')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coinonepound" class="col-form-label col-sm-4 offset-1">£1</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('coinonepound') is-invalid @enderror"
                                        name="coinonepound" step="0.01" min="0"
                                        id="coinonepound" aria-describedby="helpId" value="0"
                                        value="{{ old('coinonepound') }}">
                                @error('coinonepound')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coinfifty" class="col-form-label col-sm-4 offset-1">50p</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('coinfifty') is-invalid @enderror"
                                        name="coinfifty" step="0.01" min="0"
                                        id="coinfifty" aria-describedby="helpId" value="0"
                                        value="{{ old('coinfifty') }}">
                                @error('coinfifty')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cointwenty" class="col-form-label col-sm-4 offset-1">20p</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('cointwenty') is-invalid @enderror"
                                        name="cointwenty" step="0.01" min="0"
                                        id="cointwenty" aria-describedby="helpId" value="0"
                                        value="{{ old('cointwenty') }}">
                                @error('cointwenty')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cointen" class="col-form-label col-sm-4 offset-1">10p</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('cointen') is-invalid @enderror"
                                        name="cointen" step="0.01" min="0"
                                        id="cointen" aria-describedby="helpId" value="0"
                                        value="{{ old('cointen') }}">
                                @error('cointen')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coinfive" class="col-form-label col-sm-4 offset-1">5p</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('coinfive') is-invalid @enderror"
                                        name="coinfive" step="0.01" min="0"
                                        id="coinfive" aria-describedby="helpId" value="0"
                                        value="{{ old('coinfive') }}">
                                @error('coinfive')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cointwo" class="col-form-label col-sm-4 offset-1">2p</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('cointwo') is-invalid @enderror"
                                        name="cointwo" step="0.01" min="0"
                                        id="cointwo" aria-describedby="helpId" value="0"
                                        value="{{ old('cointwo') }}">
                                @error('cointwo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coinone" class="col-form-label col-sm-4 offset-1">1p</label>
                            <div class="col-sm-7">
                                <input type="number"
                                        class="form-control @error('coinone') is-invalid @enderror"
                                        name="coinone" step="0.01" min="0"
                                        id="coinone" aria-describedby="helpId" value="0"
                                        value="{{ old('coinone') }}">
                                @error('coinone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="card">
                                    <div class="card-header bg-gradient-primary text-white">GPOS</div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="gpostotal" class="col-form-label col-sm-4 offset-1">Payment Total</label>
                                                <div class="col-sm-7">
                                                    <input type="number"
                                                        class="form-control @error('gpostotal') is-invalid @enderror"
                                                        name="gpostotal" step="0.01" min="0"
                                                        id="gpostotal" aria-describedby="helpId" value="0"
                                                        value="{{ old('gpostotal') }}">
                                                    @error('gpostotal')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                        </div>
                                    </div>
                                </div>
                        <hr>
                        <button type="submit" class="btn btn-primary float-right">Insert</button>
        </form>
                    </div>
                </div>

            </div>
            <!-- Right Column -->

    </div>
        <!-- Content Row -->
    </div>
        </div>
    @endsection

</x-admin-master>
