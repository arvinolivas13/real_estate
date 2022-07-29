<nav id="sidebar" class="sidebar">
    <div class="sidebar-content">

        <a class="sidebar-toggle mr-2">
            <i class="fas fa-bars"></i>
        </a>

        <div class="company-logo">
            <img src="/images/logo.png" alt="company-logo" width="100%"/>
            <div class="company-name">
                Brilliant Five J Construction and Development Corp.
            </div>
        </div>


        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            @role('Super Admin|Agent')
            <li class="sidebar-item">   
                <a href="#dashboard" data-toggle="collapse" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-tachometer-alt"></i> <span class="align-middle">Dashboard</span>
                    </span>
                </a>
                <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="list-title">Dashboard</li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/dashboard">Main</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/maintenance/calendar">Calendar</a></li>
                </ul>
                <a href="{{url('customer')}}" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-users"></i> <span class="align-middle">Customer</span>
                    </span> 
                </a>
            </li>
            @endrole
            <li class="sidebar-header">
                Transaction
            </li>

            <li class="sidebar-item">
                @role('Super Admin|Agent')
                <a href="{{ url('area') }}" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-receipt"></i> <span class="align-middle">Area</span>
                    </span> 
                </a>
                <a href="{{ url('payment') }}" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-money-bill"></i> <span class="align-middle">Payment</span>
                    </span> 
                </a>
                <a href="{{ url('penalty') }}" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-minus-circle"></i> <span class="align-middle">Penalty</span>
                    </span> 
                </a>
                @endrole
            </li>
            @role('Super Admin')
            <li class="sidebar-header">
                Maintenace
            </li>
            <li class="sidebar-item">
                <a href="#information" data-toggle="collapse" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-info"></i> <span class="align-middle">Information</span>
                    </span> 
                </a>
                <ul id="information" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="list-title">Main</li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/maintenance/customer">Customers</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/maintenance/agent">Agents</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/maintenance/van">Vans</a></li>
                </ul>
            </li>
            @endrole
            @role('Super Admin')
            <li class="sidebar-header">
                Other
            </li>
            <li class="sidebar-item">
                <a href="/document-management" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-file"></i> <span class="align-middle">Document Management</span>
                    </span> 
                </a>
            </li>
            @endrole

            {{-- <li class="sidebar-header">
                Maintenance
            </li>
            <li class="sidebar-item">
                <a href="#employee_maintenance" data-toggle="collapse" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-list-alt"></i> <span class="align-middle">Employee</span>
                    </span>
                </a>
                <ul id="employee_maintenance" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="list-title">Employee</li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/payroll/classes">Classes</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/payroll/department">Departments</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/payroll/position">Positions</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/payroll/leave-type">Leave Type</a></li>
                </ul>
            </li>

            <li class="sidebar-header">
                Settings
            </li>
            <li class="sidebar-item">
                <a href="#account" data-toggle="collapse" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-user"></i> <span class="align-middle">Account</span>
                    </span>
                </a>
                <ul id="account" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="list-title">Account</li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{url('settings/users')}}">Users</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{url('settings/role')}}">Roles</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{url('settings/user')}}">Permission</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</nav>