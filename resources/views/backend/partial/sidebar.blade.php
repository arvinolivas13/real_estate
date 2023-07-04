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
            {{-- @role('Super Admin| Agent |Jayson Obeña') --}}
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
            {{-- @endrole --}}
            <li class="sidebar-header">
                Transaction
            </li>

            <li class="sidebar-item">
                {{-- @role('Super Admin|Agent|Jayson Obeña') --}}
                <a href="{{ url('area') }}" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-receipt"></i> <span class="align-middle">Area</span>
                    </span>
                </a>
                <a href="#payment" data-toggle="collapse" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-money-bill"></i> <span class="align-middle">Payment</span>
                    </span>
                </a>
                <ul id="payment" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="list-title">Payment</li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('payment') }}">Payment</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('payment/all') }}">All Payment</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('transfer_fee') }}">Transfer Fee</a></li>
                </ul>
                <a href="{{ url('penalty') }}" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-minus-circle"></i> <span class="align-middle">Penalty</span>
                    </span>
                </a>
                {{-- @endrole --}}
            </li>
            
            <li class="sidebar-header">
                Account Management
            </li>
            <li class="sidebar-item">
                <a href="#account_management" data-toggle="collapse" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-users"></i> <span class="align-middle">User Setup</span>
                    </span>
                </a>
                <ul id="account_management" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="list-title">User Setup</li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/user') }}">Users</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/user/roles') }}">Roles</a></li>
                </ul>
            </li>

            {{-- @role('Super Admin|Jayson Obeña') --}}
            <li class="sidebar-header">
                Documents
            </li>
            <li class="sidebar-item">
                <a href="{{ url('document/contract') }}" class="sidebar-link collapsed">
                    <span class="item">
                        <i class="align-middle mr-2 fas fa-fw fa-file-word"></i> <span class="align-middle">Contract</span>
                    </span>
                </a>
            </li>
            {{-- @endrole --}}

            {{-- @role('Super Admin|Jayson Obeña') --}}
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

            
            {{-- @endrole --}}

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
