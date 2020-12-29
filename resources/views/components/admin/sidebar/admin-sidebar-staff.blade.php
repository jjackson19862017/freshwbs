<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStaffArea" aria-expanded="true" aria-controls="collapseUserArea">
        <i class="fas fa-key"></i>
        <span>Staff Members:</span>
    </a>
    <div id="collapseStaffArea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Staff:</h6>
            <a class="collapse-item" href="{{route('staff.create')}}">Add Staff Member</a>
            <a class="collapse-item" href="{{route('staffs.index')}}">View All Staff Members</a>
        </div>
    </div>
</li>
