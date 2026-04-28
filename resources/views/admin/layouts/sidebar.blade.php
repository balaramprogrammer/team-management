    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">

        <ul class="nav flex-column">

            <li>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ route('admin.users') }}">
                    <i class="bi bi-people"></i> Users
                </a>
            </li>

            <li>
                <a class="nav-link" href="#">
                    <i class="bi bi-kanban"></i> Projects
                </a>
            </li>

            <li>
                <a class="nav-link" href="#">
                    <i class="bi bi-currency-dollar"></i> Payments
                </a>
            </li>

            <li>
                <a class="nav-link" href="#">
                    <i class="bi bi-bar-chart"></i> Reports
                </a>
            </li>

            <li>
                <a class="nav-link" href="#">
                    <i class="bi bi-gear"></i> Settings
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('logout')}}">
                    <i class="bi bi-gear"></i> Logout
                </a>
            </li>

        </ul>

    </div>

