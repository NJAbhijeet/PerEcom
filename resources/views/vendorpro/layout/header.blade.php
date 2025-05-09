
<!--app open-->
<div id="app" class="page">
    <div class="main-wrapper">

        <!--nav open-->
        <nav class="navbar navbar-expand-lg main-navbar">
            <a class="header-brand" href="{{ route('dashboard') }}">
                <img src="{{asset('frontend/assets/images/logo/logo.png') }}" class="header-brand-img main-logo"
                    alt="Treal-Admin  logo" style="width:100px" >
            </a>

            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-2">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link toggle"><i class="fe fe-align-justify"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link d-md-none navsearch"><i class="fe fe-search"></i></a></li>
                </ul>

                {{-- <div class="search-element mr-3">
                    <input class="form-control" placeholder="Search" aria-label="Search">
                    <span class="Search-icon"><i class="fa fa-search"></i></span>
                </div> --}}

            </form>

            <ul class="navbar-nav navbar-right">

                {{-- <li class="dropdown dropdown-list-toggle header-msg">
                    <a href="#" data-toggle="dropdown" class="nav-link  nav-link-lg ">
                        <span class="badge badge-danger nav-link-badge blink_section">
                        New
                        </span>
                        <i class="fe fe-mail"></i>
                    </a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-list-content">
                            <a href="#" class="dropdown-item ">
                                <img alt="image" src="{{ asset('admin/assets/img/brand/user.png') }}" class="rounded-circle dropdown-item-img">
                                <div class="dropdown-item-desc">
                                    <div class="dropdownmsg d-flex">
                                        <div class="">
                                            <b>Ajit K (MLM123)</b>
                                            <p>Help Desk (Mobile No Update)</p>
                                        </div>
                                        <div class="time">6 hours ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item ">
                                <img alt="image" src="{{ asset('admin/assets/img/brand/user.png') }}" class="rounded-circle dropdown-item-img">
                                <div class="dropdown-item-desc">
                                    <div class="dropdownmsg d-flex">
                                        <div class="">
                                            <b>Ajit K (MLM124)</b>
                                            <p>Help Desk (Address Update)</p>
                                        </div>
                                        <div class="time">6 hours ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item ">
                                <img alt="image" src="{{ asset('admin/assets/img/brand/user.png') }}" class="rounded-circle dropdown-item-img">
                                <div class="dropdown-item-desc">
                                    <div class="dropdownmsg d-flex">
                                        <div class="">
                                            <b>Ajit K (MLM125)</b>
                                            <p>Help Desk (Email Update)</p>
                                        </div>
                                        <div class="time">6 hours ago</div>
                                    </div>
                                </div>
                            </a>


                        </div>
                        <div class=" text-center p-2">
                            <a href="#" class="text-dark">View All Messages</a>
                        </div>
                    </div>
                </li>

                <li class="dropdown dropdown-list-toggle header-notify">
                    <a href="#" data-toggle="dropdown" class="nav-link  nav-link-lg ">
                        <i class="fe fe-bell"></i><span class="pulse bg-warning"></span>
                    </a>

                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-list-content">
                            <a href="#" class="dropdown-item">
                                <i class="fe fe-users text-primary"></i>
                                <div class="dropdown-item-desc">
                                    <b> New Users Registered.. </b>
                                </div>
                            </a>

                            <a href="#" class="dropdown-item">
                                <i class="fe fe-alert-circle text-danger"></i>
                                <div class="dropdown-item-desc">
                                    <b> Error message occurred....</b>
                                </div>
                            </a>

                            <a href="#" class="dropdown-item">
                                <i class="fe fe-rotate-cw text-warning"></i>
                                <div class="dropdown-item-desc">
                                    <b> Application Upadated</b>
                                </div>
                            </a>

                            <a href="#" class="dropdown-item">
                                <i class="fe fe-shopping-cart text-success"></i>
                                <div class="dropdown-item-desc">
                                    <b>Your items Arrived</b>
                                </div>
                            </a>

                            <a href="#" class="dropdown-item">
                                <i class="fe fe-message-square text-orange"></i>
                                <div class="dropdown-item-desc">
                                    <b>New Message received</b>
                                </div>
                            </a>

                        </div>

                        <div class=" text-center p-2">
                            <a href="#" class="text-dark">View All Notifications</a>
                        </div>

                    </div>
                </li>

                <li>
                    <a href="#" class="navresponsive-toggler d-sm-none nav-link  nav-link-lg d-flex"  data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="navbar-toggler-icon fe fe-more-vertical text-white"></i>
                    </a>
                </li><!-- navbar mobile--> --}}
            
                <li class="dropdown header-user">
                  
                         <a class="dropdown-item" href="{{route('logout')}}">
                        <i class="mdi  mdi-logout-variant mr-2"></i>
                        <span> Logout </span>
                        </a>


                        <!-- <a class="dropdown-item" href="#">
                        <i class="mdi mdi-settings mr-2"></i>
                        <span> Change Password </span>
                        </a>  -->

                        <!--<a class="dropdown-item" href="#">
                        <i class="mdi mdi-compass-outline mr-2"></i>
                        <span> Support </span>
                        </a> -->



                    </div>
                </li>

            </ul>

        </nav>
        <!--nav closed-->

        <!--navbar mobile--->
        <div class="mb-1 responsive-navbar navbar-dark d-sm-none bg-white">
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

                <ul class="navbar-nav navbar-right">

                    <li class="dropdown  header-notify1">
                        <a href="#" data-toggle="dropdown" class="nav-link  nav-link-lg ">
                            <i class="fe fe-bell"></i><span class="pulse bg-warning"></span>
                        </a>

                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-list-content">
                                <a href="#" class="dropdown-item">
                                    <i class="fe fe-users text-primary"></i>
                                    <div class="dropdown-item-desc">
                                        <b>New Users Registered..</b>
                                    </div>
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fe fe-alert-circle text-danger"></i>
                                    <div class="dropdown-item-desc">
                                        <b> User Complaints </b>
                                    </div>
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fe fe-rotate-cw text-warning"></i>
                                    <div class="dropdown-item-desc">
                                        <b> Application Upadated</b>
                                    </div>
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fe fe-shopping-cart text-success"></i>
                                    <div class="dropdown-item-desc">
                                        <b>Your items Arrived</b>
                                    </div>
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fe fe-message-square text-orange"></i>
                                    <div class="dropdown-item-desc">
                                        <b>New Message received</b>
                                    </div>
                                </a>

                            </div>

                            <div class=" text-center p-2">
                                <a href="#" class="text-dark">View All Notifications</a>
                            </div>

                        </div>

                    </li>

                </ul>

            </div>
        </div>
        <!--End navbar mobile- -->
