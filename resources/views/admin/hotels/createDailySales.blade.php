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

                                <h3>Clerk: {{auth()->user()->name}}</h3>

                                 <div class="form-group row">
                                    <label for="date" class="col-form-label col-sm-3">Date</label>
                                    <div class="col-sm-5 offset-n4">
                                        <input type="date"
                                               class="form-control text-right @error('date') is-invalid @enderror"
                                               name="date" id="date"
                                               aria-describedby="helpId" value="{{ now()->format('Y-m-d') }}">
                                        @error('date')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>



                            </div>
                            <div class="col-sm-6">
                                <h3 class="text-right">Date: {{now()->format('l jS \\of F Y')}}</h3>
                                <div class="form-group row">
                                    <label for="hotel" class="col-form-label col-sm-4">Hotel</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="hotel" id="hotel">
                                            <option value="Shard">Shard</option>
                                            <option value="The Mill">The Mill</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header bg-gradient-primary text-white">Other Payment Forms</div>
                                    <div class="card-body">

                                        <table class="table table-sm table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td><label for="iou" class="col-form-label">IOU's</label></td>
                                                    <td><input type="number"
                                                    class="form-control text-right @error('iou') is-invalid @enderror input ious"
                                                    name="iou" step="0.01" min="0"
                                                    id="iou" aria-describedby="helpId" value="0"
                                                    value="{{ old('iou') }}">
                                                @error('iou')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="bacs" class="col-form-label">BACS</label></td>
                                                    <td><input type="number"
                                                    class="form-control text-right @error('bacs') is-invalid @enderror input bacs"
                                                    name="bacs" step="0.01" min="0"
                                                    id="bacs" aria-describedby="helpId" value="0"
                                                    value="{{ old('bacs') }}">
                                                @error('bacs')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="cheque" class="col-form-label">Cheque</label></td>
                                                    <td><input type="number"
                                                        class="form-control text-right @error('cheque') is-invalid @enderror input cheque"
                                                        name="cheque" step="0.01" min="0"
                                                        id="cheque" aria-describedby="helpId" value="0"
                                                        value="{{ old('cheque') }}">
                                                    @error('cheque')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </tr>
                                            </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td><input type="number" id="miscresult" disabled="disabled" class="form-control text-right"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="card">
                                    <div class="card-header bg-gradient-primary text-white">Card Machines</div>
                                    <div class="card-body">
                                        <table class="table table-sm table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td><label for="pdqreception" class="col-form-label">Reception</label></td>
                                                    <td><input type="number"
                                                        class="form-control text-right @error('pdqreception') is-invalid @enderror input card1"
                                                        name="pdqreception" step="0.01" min="0"
                                                        id="pdqreception" aria-describedby="helpId" value="0"
                                                        value="{{ old('pdqreception') }}">
                                                    @error('pdqreception')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="pdqbar" class="col-form-label">Bar</label>
                                                    </td>
                                                    <td><input type="number"
                                                        class="form-control text-right @error('pdqbar') is-invalid @enderror input card2"
                                                        name="pdqbar" step="0.01" min="0"
                                                        id="pdqbar" aria-describedby="helpId" value="0"
                                                        value="{{ old('pdqbar') }}">
                                                    @error('pdqbar')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="pdqrestaurant" class="col-form-label">Restaurant</label></td>
                                                    <td><input type="number"
                                                        class="form-control text-right @error('pdqrestaurant') is-invalid @enderror input card3"
                                                        name="pdqrestaurant" step="0.01" min="0"
                                                        id="pdqrestaurant" aria-describedby="helpId" value="0"
                                                        value="{{ old('pdqrestaurant') }}">
                                                    @error('pdqrestaurant')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td><input type="number" id="result" disabled="disabled" class="form-control text-right"></td>
                                                </tr>
                                            </tfoot>
                                        </table>


                                    </div>
                                </div>
                                <hr>

            </div>

            <!-- / Left Column -->
            <!-- Right Column -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-gradient-primary text-white">Till Counting</div>
                    <div class="card-body">

                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td><label for="notefifty" class="col-form-label">£50</label></td>
                                    <td><input type="number"
                                        class="form-control text-right @error('notefifty') is-invalid @enderror input notesfifty"
                                        name="notefifty" min="0"
                                        id="notefifty" aria-describedby="helpId" value="0"
                                        value="{{ old('notefifty') }}">
                                        @error('notefifty')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </td>
                                    <td><input type="number" id="totalnotesfifty" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="notetwenty" class="col-form-label">£20</label></td>
                                    <td> <input type="number"
                                        class="form-control text-right @error('notetwenty') is-invalid @enderror input notestwenty"
                                        name="notetwenty" min="0"
                                        id="notetwenty" aria-describedby="helpId" value="0"
                                        value="{{ old('notetwenty') }}">
                                @error('notetwenty')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                    </td>
                                    <td><input type="number" id="totalnotestwenty" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="noteten" class="col-form-label">£10</label></td>
                                    <td> <input type="number"
                                        class="form-control text-right @error('noteten') is-invalid @enderror input notesten"
                                        name="noteten" min="0"
                                        id="noteten" aria-describedby="helpId" value="0"
                                        value="{{ old('noteten') }}">
                                @error('noteten')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                    </td>
                                    <td><input type="number" id="totalnotesten" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="notefive" class="col-form-label">£5</label></td>
                                    <td><input type="number"
                                        class="form-control text-right @error('notefive') is-invalid @enderror input notesfive"
                                        name="notefive" min="0"
                                        id="notefive" aria-describedby="helpId" value="0"
                                        value="{{ old('notefive') }}">
                                @error('notefive')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                    </td>
                                    <td><input type="number" id="totalnotesfive" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="coinonepound" class="col-form-label">£1</label></td>
                                    <td><input type="number"
                                        class="form-control text-right @error('coinonepound') is-invalid @enderror input coinsonepound"
                                        name="coinonepound"  min="0"
                                        id="coinonepound" aria-describedby="helpId" value="0"
                                        value="{{ old('coinonepound') }}">
                                @error('coinonepound')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                    </td>
                                    <td><input type="number" id="totalcoinsonepound" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="coinfifty" class="col-form-label">50p</label></td>
                                    <td><input type="number"
                                        class="form-control text-right @error('coinonepound') is-invalid @enderror input coinsfifty"
                                        name="coinfifty"  min="0"
                                        id="coinfifty" aria-describedby="helpId" value="0"
                                        value="{{ old('coinfifty') }}">
                                @error('coinfifty')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                    </td>
                                    <td><input type="number" id="totalcoinsfifty" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="cointwenty" class="col-form-label">20p</label></td>
                                    <td><input type="number"
                                        class="form-control text-right @error('coinonepound') is-invalid @enderror input coinstwenty"
                                        name="cointwenty" min="0"
                                        id="cointwenty" aria-describedby="helpId" value="0"
                                        value="{{ old('cointwenty') }}">
                                @error('cointwenty')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                    </td>
                                    <td><input type="number" id="totalcoinstwenty" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="cointen" class="col-form-label">10p</label></td>
                                    <td><input type="number"
                                        class="form-control text-right @error('coinonepound') is-invalid @enderror input coinsten"
                                        name="cointen" min="0"
                                        id="cointen" aria-describedby="helpId" value="0"
                                        value="{{ old('cointen') }}">
                                @error('cointen')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                    </td>
                                    <td><input type="number" id="totalcoinsten" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="coinfive" class="col-form-label">5p</label></td>
                                    <td><input type="number"
                                        class="form-control text-right @error('coinonepound') is-invalid @enderror input coinsfive"
                                        name="coinfive" min="0"
                                        id="coinfive" aria-describedby="helpId" value="0"
                                        value="{{ old('coinfive') }}">
                                @error('coinfive')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                    </td>
                                    <td><input type="number" id="totalcoinsfive" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="cointwo" class="col-form-label">2p</label></td>
                                    <td><input type="number"
                                        class="form-control text-right @error('coinonepound') is-invalid @enderror input coinstwo"
                                        name="cointwo" min="0"
                                        id="cointwo" aria-describedby="helpId" value="0"
                                        value="{{ old('cointwo') }}">
                                @error('cointwo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                    </td>
                                    <td><input type="number" id="totalcoinstwo" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="coinone" class="col-form-label">1p</label></td>
                                    <td><input type="number"
                                        class="form-control text-right @error('coinonepound') is-invalid @enderror input coinsone"
                                        name="coinone" min="0"
                                        id="coinone" aria-describedby="helpId" value="0"
                                        value="{{ old('coinone') }}">
                                @error('coinone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                    </td>
                                    <td><input type="number" id="totalcoinsone" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>Total Cash -</td>
                                    <td><input type="number" id="totalcash" disabled="disabled" class="form-control text-right"></td>


                                </tr>
                            </tfoot>
                        </table>
                        <hr>

                    </div>
                </div>

            </div>
            <!-- Right Column -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-gradient-primary text-white">Payment Totals</div>
                    <div class="card-body">
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td>Total Cash and Cards</td>
                                    <td><input type="number" id="candc" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td><label for="gpostotal" class="col-form-label">GPOS</label></td>
                                    <td><input type="number"
                                        class="form-control text-right @error('gpostotal') is-invalid @enderror input gpos"
                                        name="gpostotal" step="0.01" min="0"
                                        id="gpostotal" aria-describedby="helpId" value="0"
                                        value="{{ old('gpostotal') }}">
                                    @error('gpostotal')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror</td>
                                </tr>
                                <tr>
                                    <td>Float</td>
                                    <td><input type="number" id="tillfloat" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                                <tr>
                                    <td>Cash for Safe</td>
                                    <td><input type="number" id="cashforsafe" disabled="disabled" class="form-control text-right"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        <hr>
        <div class="card">
            <div class="card-header bg-gradient-primary text-white">Room Details</div>
            <div class="card-body">

                <table class="table table-sm table-borderless">
                    <tbody>
                        <tr>
                            <td><label for="roomssold" class="col-form-label">Sold</label></td>
                            <td><input type="number"
                            class="form-control text-right @error('roomssold') is-invalid @enderror"
                            name="roomssold" min="0"
                            id="roomssold" aria-describedby="helpId" value="0"
                            value="{{ old('roomssold') }}">
                        @error('roomssold')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror</td>
                        </tr>
                        <tr>
                            <td><label for="roomsoccupied" class="col-form-label">Occupied</label></td>
                            <td><input type="number"
                            class="form-control text-right @error('roomsoccupied') is-invalid @enderror"
                            name="roomsoccupied" min="0"
                            id="roomsoccupied" aria-describedby="helpId" value="0"
                            value="{{ old('roomsoccupied') }}">
                        @error('roomsoccupied')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror</td>
                        </tr>
                        <tr>
                            <td><label for="residents" class="col-form-label">Residents</label></td>
                            <td><input type="number"
                                class="form-control text-right @error('residents') is-invalid @enderror"
                                name="residents" min="0"
                                id="residents" aria-describedby="helpId" value="0"
                                value="{{ old('residents') }}">
                            @error('residents')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </tr>
                    </tbody>
            </table>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-success btn-block">Finish Submission</button>
</form>
            </div>

    </div>
        <!-- Content Row -->
    </div>
        </div>
    @endsection

    @section('js')
<script>
 $(document).ready(function(){
    $(".input").keyup(function(){
          var card1 = +$(".card1").val();
          var card2 = +$(".card2").val();
          var card3 = +$(".card3").val();
          var totalcards = card1 + card2 + card3;

          $("#result").val(totalcards.toFixed(2));

          var ious = +$(".ious").val();
          var bacs = +$(".bacs").val();
          var cheques = +$(".cheque").val();
          var totalmisc = ious+bacs+cheques
          $("#miscresult").val(totalmisc.toFixed(2));

          var notesfifty = +$(".notesfifty").val()*50;
          $("#totalnotesfifty").val(notesfifty);

          var notestwenty = +$(".notestwenty").val()*20;
          $("#totalnotestwenty").val(notestwenty);

          var notesten = +$(".notesten").val()*10;
          $("#totalnotesten").val(notesten);

          var notesfive = +$(".notesfive").val()*5;
          $("#totalnotesfive").val(notesfive);

          var coinsonepound = +$(".coinsonepound").val()*1;
          $("#totalcoinsonepound").val(coinsonepound);

          var coinsfifty = +$(".coinsfifty").val()*.5;
          $("#totalcoinsfifty").val(coinsfifty.toFixed(2));

          var coinstwenty = +$(".coinstwenty").val()*.2;
          $("#totalcoinstwenty").val(coinstwenty.toFixed(2));

          var coinsten = +$(".coinsten").val()*.1;
          $("#totalcoinsten").val(coinsten.toFixed(2));

          var coinsfive = +$(".coinsfive").val()*.05;
          $("#totalcoinsfive").val(coinsfive.toFixed(2));

          var coinstwo = +$(".coinstwo").val()*.02;
          $("#totalcoinstwo").val(coinstwo.toFixed(2));

          var coinsone = +$(".coinsone").val()*.01;
          $("#totalcoinsone").val(coinsone.toFixed(2));


          var totalcash = notesfifty + notestwenty + notesten + notesfive + coinsonepound + coinsfifty + coinstwenty + coinsten + coinsfive + coinstwo + coinsone;
          $("#totalcash").val(totalcash.toFixed(2));

          // Cash and Cards
          var candc =+ ious + bacs + cheques + totalcards + totalcash;
          $("#candc").val(candc.toFixed(2));


          var gpos = +$(".gpos").val();
          var tillfloat = + candc - gpos;
          $("#tillfloat").val(tillfloat.toFixed(2));

          var cashforsafe = gpos - (bacs + totalcards);
          $("#cashforsafe").val(cashforsafe.toFixed(2));

    });


});
</script>
    @endsection
</x-admin-master>
