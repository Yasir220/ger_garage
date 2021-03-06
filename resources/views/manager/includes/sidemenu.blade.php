 
 
 <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                           <!--  <a href="{{route('login')}}"><img src="{{ asset('assets/admin/assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a> -->
                           <h2>Ger Garage</h2>
                           <h5>Manager dashboard</h5>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="{{route('manager.login')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-image-fill"></i>
                                <span>Requested Vehicle Booking</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('requested_vehicle')}}">View Requests</a>
                                </li>
                                 <li class="submenu-item ">
                                    <a href="{{route('accepted_vehicle')}}">Accepted Requests</a>
                                </li>
                                  <li class="submenu-item ">
                                    <a href="{{route('rejected_vehicle')}}">Rejected Requests</a>
                                </li>
                            </ul>
                        </li>

                         <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-bar-chart-steps"></i>
                                <span>Assign Requests To Worker</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('requested_task')}}">Waiting for Assign</a>
                                </li>

                                 <li class="submenu-item ">
                                    <a href="{{route('assigned_task')}}">Assigned Task</a>
                                </li> 

                                </li>
                                  <li class="submenu-item ">
                                    <a href="{{route('rejected_task')}}">Rejected Task</a>
                                </li>

                            </ul>
                        </li>

						 <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Categories</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('categories') }}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('new_categories') }}">Add New</a>
                                </li>
                            </ul>
                        </li>
						
						 <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-files"></i>
                                <span>Products</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('productss') }}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('new_products') }}">Add</a>
                                </li>
                            </ul>
                        </li>
						

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Check Status</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('mallvehilce_bill') }}">View bill</a>
                                </li>   
                            </ul>
                        </li>
    
                        

                        <li class="sidebar-item ">
                            <a href="{{ route('logout') }}" class='sidebar-link'  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-person-x-fill"></i>
                                <span>{{ __('Logout') }}</span>
                            </a> 
                            <form id="logout-form" action="{{ route('manager.logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                        </li>
 
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

 