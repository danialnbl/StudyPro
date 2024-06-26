<!-- ======= Header ======= -->
<header style="background-color:#6AC1F2;" id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/staffdashboard" class="logo d-flex align-items-center">
            <img src="{{ url('assets/StudyProDark.png') }}" alt="">
            <span class="d-none d-lg-block">StudyPro</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto ">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{Auth::user()->name}}</h6>
                        <span>Staff</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/staffProfile">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/staffdashboard">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-lines-fill"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/searchPlatST">
                        <i class="bi bi-circle"></i><span>Search Profile</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-file-earmark-person"></i><span>Registration</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/PlatRegister">
                        <i class="bi bi-circle"></i><span>Platinum registration</span>
                    </a>
                </li>
                <li>
                    <a href="/MentorRegister">
                        <i class="bi bi-circle"></i><span>Mentor registration</span>
                    </a>
                </li>
                <li>
                    <a href="/StaffRegister">
                        <i class="bi bi-circle"></i><span>Staff registration</span>
                    </a>
                </li>
                <li>
                    <a href="/PlatinumList">
                        <i class="bi bi-circle"></i><span>Registration List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>CRMP Approval</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/platinumgroup">
                        <i class="bi bi-circle"></i><span>Platinum Group</span>
                    </a>
                </li>
                <li>
                    <a href="/crmpassign">
                        <i class="bi bi-circle"></i><span>Assign New CRMP</span>
                    </a>
                </li>
                <li>
                    <a href="/searchplatinum">
                        <i class="bi bi-circle"></i><span>CRMP List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

    </ul>
</aside><!-- End Sidebar-->
