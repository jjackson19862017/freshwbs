<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-linode"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hotel Manager</div>
    </a>

    <x-admin.sidebar.admin-sidebar-user-information></x-admin.sidebar.admin-sidebar-user-information>






    <!-- Nav Item - Pages Collapse Menu -->
    @if(auth()->user()->userHasRole('Admin') || auth()->user()->userHasRole('Manager') || auth()->user()->userHasRole('Owner'))
    <!-- Divider -->
    <hr class="sidebar-divider">
        <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>
        <x-admin.sidebar.admin-sidebar-user></x-admin.sidebar.admin-sidebar-user>
        @if(auth()->user()->userHasRole('Admin'))
        <x-admin.sidebar.admin-sidebar-authorization></x-admin.sidebar.admin-sidebar-authorization>
        @endif
    @endif

    @if(!auth()->user()->userHasRole('Staff'))
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Hotels
        </div>
         <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.hotels.createDailySales')}}">
          <i class="fas fa-highlighter"></i>
          <span>End of Days</span></a>
      </li>
      @if(auth()->user()->userHasRole('Owner') || auth()->user()->userHasRole('Admin'))

      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.hotels.sales.allmoneysales')}}">
          <i class="fas fa-highlighter"></i>
          <span>All Money Sales</span></a>
      </li>

        <x-admin.sidebar.admin-sidebar-shard></x-admin.sidebar.admin-sidebar-shard>
        <x-admin.sidebar.admin-sidebar-themill></x-admin.sidebar.admin-sidebar-themill>
        <x-admin.sidebar.admin-sidebar-staff></x-admin.sidebar.admin-sidebar-staff>
        @endif
 <!-- Divider -->
    <hr class="sidebar-divider">
@endif



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
