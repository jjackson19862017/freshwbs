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
            <a class="collapse-item" href="{{route('hotels.createrota')}}">New Rota</a>
        </div>
    </div>
</li>
