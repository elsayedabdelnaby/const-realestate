<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('admin/images/vendor/admin-lte/dist') }}/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/images/vendor/admin-lte/dist') }}/user2-160x160.jpg"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->full_name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-tachometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li><!-- /dashboard-sidebar -->

                @if (auth()->user()->hasPermission('read_users'))
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li><!-- /user-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('read_countries'))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-map-marker"></i>
                            <p>Address Features</p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item ml-2">
                                <a href="{{ route('admin.countries.index') }}" class="nav-link">
                                    <i class="fa fa-globe nav-icon"></i>
                                    <p>Countries</p>
                                </a>
                            </li>
                            <li class="nav-item ml-2">
                                <a href="{{ route('admin.cities.index') }}" class="nav-link">
                                    <i class="fa fa-location-arrow nav-icon"></i>
                                    <p>Cities</p>
                                </a>
                            </li>
                        </ul>
                    </li><!-- /address-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('read_features'))
                    <li class="nav-item">
                        <a href="{{ route('admin.features.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-hashtag"></i>
                            <p>Property Features</p>
                        </a>
                    </li><!-- /user-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('read_property_types'))
                    <li class="nav-item">
                        <a href="{{ route('admin.property_types.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-building-o"></i>
                            <p>Property Types</p>
                        </a>
                    </li><!-- /user-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('read_property_statuses'))
                    <li class="nav-item">
                        <a href="{{ route('admin.property_statuses.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-info-circle"></i>
                            <p>Property Statuses</p>
                        </a>
                    </li><!-- /user-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('read_currencies'))
                    <li class="nav-item">
                        <a href="{{ route('admin.currencies.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-money"></i>
                            <p>Currencies</p>
                        </a>
                    </li><!-- /user-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('read_agencies'))
                    <li class="nav-item">
                        <a href="{{ route('admin.agencies.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-building"></i>
                            <p>Agencies</p>
                        </a>
                    </li><!-- /user-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('read_properties'))
                    <li class="nav-item">
                        <a href="{{ route('admin.properties.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-bullseye"></i>
                            <p>Properties</p>
                        </a>
                    </li><!-- /properties-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('read_blogs'))
                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>Blogs</p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item ml-2">
                                <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                                    <i class="fa fa-eye nav-icon"></i>
                                    <p>All Blogs</p>
                                </a>
                            </li>
                            <li class="nav-item ml-2">
                                <a href="{{ route('admin.blogs.create') }}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add Blog</p>
                                </a>
                            </li>
                            <li class="nav-item ml-2">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-hashtag nav-icon"></i>
                                    <p>Blog tags</p>
                                </a>
                            </li>
                        </ul>
                    </li><!-- /blogs-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('read_tags'))
                    <li class="nav-item">
                        <a href="{{ route('admin.tags.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>Tags</p>
                        </a>
                    </li><!-- /blogs-sidebar -->
                @endif

                <li class="nav-item">
                    <a href="{{ route('admin.contactusinfo.edit', 1) }}" class="nav-link">
                        <i class="nav-icon fa fa-bullseye"></i>
                        <p>Contact Us Info</p>
                    </a>
                </li><!-- /properties-sidebar -->


                <li class="nav-item">
                    <a href="{{ route('admin.sitesettings.edit', 1) }}" class="nav-link">
                        <i class="nav-icon fa fa-bullseye"></i>
                        <p>Site Settings</p>
                    </a>
                </li><!-- /properties-sidebar -->

                <li class="nav-item">
                    <a href="{{ route('admin.whychooseus.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-bullseye"></i>
                        <p>Why Choose Us</p>
                    </a>
                </li><!-- /whychooseus-sidebar -->

            </ul> <!-- /.nav-sidebar -->
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
