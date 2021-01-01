<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLoginArea" aria-expanded="true" aria-controls="collapseUserArea">
        <i class="fas fa-user"></i>
        <span> @if(Auth::check())
                {{auth()->user()->name}}
            @endif</span>
    </a>
    <div id="collapseLoginArea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Menu:</h6>
            <a class="collapse-item" href="{{route('user.profile.show', auth()->user())}}">Profile</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                Logout
            </a>
        </div>
    </div>
</li>






<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="/logout" method="post">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
