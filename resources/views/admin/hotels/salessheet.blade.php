<x-admin-master>
@section('content')
    <!-- Top Row -->
        <div class="row">
            <div class="col-sm-7">
                <h1>Daily Sales Report</h1>
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
            <div class="col-sm-6">
            <form action="" method="post">
                @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Week commencing: </span>
                            </div>
                            <input type="date" name="weekcommencing" class="form-control" id="">
                            <div class="input-group-append">
                            <button type="submit" class=" inbtn btn-primary">Find</button>
                            </div>
                        </div>
            </form>
        </div>
        </div>
        <div class="row">
            <!-- Staff Table Area -->
            <div class="col-sm-12">
                <table class="table table-inverse table-sm">
                    <thead class="thead-dark text-center">
                    <tr>
                        <th></th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thurdsay</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                        <th>Totals</th>
                    </tr>
                    <tr>
                        <th></th>
                        @foreach ($currentweek as $day)
                        <th>{{$day}}</th>
                        @endforeach
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($monday as $m)
                            @foreach ($tuesday as $t)
                            @foreach ($wednesday as $w)
                            @foreach ($thursday as $th)
                            @foreach ($friday as $f)
                            @foreach ($saturday as $s)
                            @foreach ($sunday as $su)
                        <tr>
                            <td>Clerk</td>
                            <td>{{$m->user_id}}</td>
                            <td>{{$t->user_id}}</td>
                            <td>{{$w->user_id}}</td>
                            <td>{{$th->user_id}}</td>
                            <td>{{$f->user_id}}</td>
                            <td>{{$s->user_id}}</td>
                            <td>{{$su->user_id}}</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Ious</td>
                            <td>{{$m->iou}}</td>
                            <td>{{$t->iou}}</td>
                            <td>{{$w->iou}}</td>
                            <td>{{$th->iou}}</td>
                            <td>{{$f->iou}}</td>
                            <td>{{$s->iou}}</td>
                            <td>{{$su->iou}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Bacs</td>
                            <td>{{$m->bacs}}</td>
                            <td>{{$t->bacs}}</td>
                            <td>{{$w->bacs}}</td>
                            <td>{{$th->bacs}}</td>
                            <td>{{$f->bacs}}</td>
                            <td>{{$s->bacs}}</td>
                            <td>{{$su->bacs}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cheque</td>
                            <td>{{$m->cheque}}</td>
                            <td>{{$t->cheque}}</td>
                            <td>{{$w->cheque}}</td>
                            <td>{{$th->cheque}}</td>
                            <td>{{$f->cheque}}</td>
                            <td>{{$s->cheque}}</td>
                            <td>{{$su->cheque}}</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="border-top border-primary">Reception</td>
                            <td class="border-top border-primary">{{$m->pdqreception}}</td>
                            <td class="border-top border-primary">{{$t->pdqreception}}</td>
                            <td class="border-top border-primary">{{$w->pdqreception}}</td>
                            <td class="border-top border-primary">{{$th->pdqreception}}</td>
                            <td class="border-top border-primary">{{$f->pdqreception}}</td>
                            <td class="border-top border-primary">{{$s->pdqreception}}</td>
                            <td class="border-top border-primary">{{$su->pdqreception}}</td>
                            <td class="border-top border-primary"></td>
                        </tr>
                        <tr>
                            <td>Bar</td>
                            <td>{{$m->pdqbar}}</td>
                            <td>{{$t->pdqbar}}</td>
                            <td>{{$w->pdqbar}}</td>
                            <td>{{$th->pdqbar}}</td>
                            <td>{{$f->pdqbar}}</td>
                            <td>{{$s->pdqbar}}</td>
                            <td>{{$su->pdqbar}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Restaurant</td>
                            <td>{{$m->pdqrestaurant}}</td>
                            <td>{{$t->pdqrestaurant}}</td>
                            <td>{{$w->pdqrestaurant}}</td>
                            <td>{{$th->pdqrestaurant}}</td>
                            <td>{{$f->pdqrestaurant}}</td>
                            <td>{{$s->pdqrestaurant}}</td>
                            <td>{{$su->pdqrestaurant}}</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="border-top border-primary">Till Cash</td>
                            <td class="border-top border-primary">{{$m->cashtotal}}</td>
                            <td class="border-top border-primary">{{$t->cashtotal}}</td>
                            <td class="border-top border-primary">{{$w->cashtotal}}</td>
                            <td class="border-top border-primary">{{$th->cashtotal}}</td>
                            <td class="border-top border-primary">{{$f->cashtotal}}</td>
                            <td class="border-top border-primary">{{$s->cashtotal}}</td>
                            <td class="border-top border-primary">{{$su->cashtotal}}</td>
                            <td class="border-top border-primary">{{$m->cashtotal + $t->cashtotal + $w->cashtotal + $th->cashtotal + $f->cashtotal + $s->cashtotal + $su->cashtotal}}</td>
                        </tr>
                        <tr>
                            <td class="border-top border-primary">Gpos</td>
                            <td class="border-top border-primary">{{$m->gpostotal}}</td>
                            <td class="border-top border-primary">{{$t->gpostotal}}</td>
                            <td class="border-top border-primary">{{$w->gpostotal}}</td>
                            <td class="border-top border-primary">{{$th->gpostotal}}</td>
                            <td class="border-top border-primary">{{$f->gpostotal}}</td>
                            <td class="border-top border-primary">{{$s->gpostotal}}</td>
                            <td class="border-top border-primary">{{$su->gpostotal}}</td>
                            <td class="border-top border-primary">{{$m->gpostotal + $t->gpostotal + $w->gpostotal + $th->gpostotal + $f->gpostotal + $s->gpostotal + $su->gpostotal}}</td>
                        </tr>
                        <tr>
                            <td>Cash for Safe</td>
                            <td>{{$m->cashsafe}}</td>
                            <td>{{$t->cashsafe}}</td>
                            <td>{{$w->cashsafe}}</td>
                            <td>{{$th->cashsafe}}</td>
                            <td>{{$f->cashsafe}}</td>
                            <td>{{$s->cashsafe}}</td>
                            <td>{{$su->cashsafe}}</td>
                            <td>{{$m->cashsafe + $t->cashsafe + $w->cashsafe + $th->cashsafe + $f->cashsafe + $s->cashsafe + $su->cashsafe}}</td>
                        </tr>

                        @endforeach
                        @endforeach
                        @endforeach
                        @endforeach
                        @endforeach
                        @endforeach
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <!-- Content Row -->



    @endsection
</x-admin-master>
