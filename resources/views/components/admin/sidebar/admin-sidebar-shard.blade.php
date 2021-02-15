<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShardArea" aria-expanded="true" aria-controls="collapseUserArea">
        <i class="fas fa-building"></i>
        <span>Shard</span>
    </a>
    <div id="collapseShardArea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Stats:</h6>
            <a class="collapse-item" href="{{route('admin.hotels.shard.index')}}">Staff</a>
            <a class="collapse-item" href="{{route('admin.hotels.salessheet')}}">Daily Sales</a>
            <a class="collapse-item" href="{{route('admin.hotels.shard.holidays')}}">Holidays</a>
            <a class="collapse-item" href="{{route('hotels.shard.occupancy')}}">Occupancy Report</a>
            <a class="collapse-item" href="{{route('hotels.shard.rota')}}">Rota</a>
            <a class="collapse-item" data-toggle="modal" data-target="#viewShardRota">Rota</a>

        </div>
    </div>
</li>

<div class="modal fade" id="viewShardRota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Rota:</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('customer.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for=""></label>
                              <select class="form-control" name="" id="">

                                    <option value=""></option>

                              </select>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary float-right">Find</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
