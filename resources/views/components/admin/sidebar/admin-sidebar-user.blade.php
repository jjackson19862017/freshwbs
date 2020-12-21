<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserArea" aria-expanded="true" aria-controls="collapseUserArea">
        <i class="fas fa-fw fa-cog"></i>
        <span>User Area</span>
    </a>
    <div id="collapseUserArea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Menu:</h6>
            <a class="collapse-item" href="{{route('user.create')}}">Add User</a>
            <a class="collapse-item" href="{{route('users.index')}}">View All</a>
        </div>
    </div>
</li>
