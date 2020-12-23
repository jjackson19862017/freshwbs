<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomerArea" aria-expanded="true" aria-controls="collapseUserArea">
        <i class="fas fa-fw fa-cog"></i>
        <span>Customers:</span>
    </a>
    <div id="collapseCustomerArea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Customers:</h6>
            <a class="collapse-item" href="{{route('customer.create')}}">New Customer</a>
            <a class="collapse-item" href="{{route('customers.index')}}">View All Customers</a>
        </div>
    </div>
</li>
