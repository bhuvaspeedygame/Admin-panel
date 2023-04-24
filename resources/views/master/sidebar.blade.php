<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->


        <!-- Start Consolve Nav -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('consolve')}}">
                <i class="fa fa-dice"></i>
                <span>Consolve</span>
            </a>
        </li>
        <!-- End Consolve Nav -->


        <!-- Start App Ad -->
        <li class="nav-item">
                <a class="nav-link" href="{{route('app_add')}}">
                <i class="fab fa-app-store"></i>
                <span>App</span>
            </a>
        </li>
        <!-- End App Ad -->


        <!-- Start User Report -->
        <li class="nav-item">
                <a class="nav-link" href="{{route('user_log')}}">
                <i class="fa fa-file"></i>
                <span>User Report</span>
            </a>
        </li>
        <!-- End User Report -->


        <!-- Start Category -->

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" data-bs-target="#Category-nav" data-bs-toggle="collapse" href="#">--}}
{{--                <i class="fa fa-list-alt"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>--}}
{{--            </a>--}}
{{--            <ul id="Category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="bi bi-circle"></i><span>Add Category</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="bi bi-circle"></i><span>View Category</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        <!-- End Category   -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('user_profile')}}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('contact')}}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>
        <!-- End Contact Page Nav -->
    </ul>

</aside>
<!-- End Sidebar-->
