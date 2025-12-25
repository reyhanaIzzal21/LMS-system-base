<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400/20  bg-white left-sidebar   transition-all duration-300">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="p-5">

        <a href="../" class="">
            {{-- <img src="../assets/images/logos/dark-logo.svg" alt="Logo-Dark" /> --}}
            <h2 class="font-bold text-xl">DASHBOARD</h2>
        </a>

    </div>
    <div class="scroll-sidebar bottom-[0 !important]" data-simplebar>
        <div class="px-6 mt-8">
            <nav class=" w-full flex flex-col sidebar-nav">
                <ul id="sidebarnav" class="text-dark text-sm">
                    {{-- HOME --}}
                    <li class="text-xs font-bold pb-3">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>HOME</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="{{ route('admin.dashboard') }}">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>


                    {{-- MAIN --}}
                    <li class="text-xs font-bold pb-3 pt-6">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>MAIN</span>
                    </li>

                    <li class="hs-accordion sidebar-item" id="blog-accordion">
                        <a href="#courses" class="hs-accordion-toggle sidebar-link dropdown-menu-link  ">
                            <i class="ti ti-app-window text-xl flex-shrink-0"></i> <span
                                class="hide-menu">Courses</span>
                            <span class="hide-menu ms-auto">
                                <i class="ti ti-chevron-down text-lg ms-auto  hs-accordion-active:hidden "></i>
                                <i
                                    class="ti ti-chevron-up text-lg ms-auto hs-accordion-active:block ml-auto hidden z-10 relative"></i>
                            </span>
                        </a>

                        <div id="blog-accordion" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link flex items-center justify-between"
                                        href="{{ route('categories.index') }}">
                                        <span class="flex gap-2 items-center ">
                                            <i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>
                                            <span class="hide-menu">Category</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link flex items-center justify-between"
                                        href="{{ route('courses.index') }}">
                                        <span class="flex gap-2 items-center ">
                                            <i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>
                                            <span class="hide-menu">Course List</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="hs-accordion sidebar-item" id="blog-accordion">
                        <a href="#event" class="hs-accordion-toggle sidebar-link dropdown-menu-link  ">
                            <i class="ti ti-app-window text-xl flex-shrink-0"></i> <span class="hide-menu">Event</span>
                            <span class="hide-menu ms-auto">
                                <i class="ti ti-chevron-down text-lg ms-auto  hs-accordion-active:hidden "></i>
                                <i
                                    class="ti ti-chevron-up text-lg ms-auto hs-accordion-active:block ml-auto hidden z-10 relative"></i>
                            </span>
                        </a>

                        <div id="blog-accordion" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link flex items-center justify-between" href="#">
                                        <span class="flex gap-2 items-center ">
                                            <i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>
                                            <span class="hide-menu">Category</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link flex items-center justify-between" href="#">
                                        <span class="flex gap-2 items-center ">
                                            <i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>
                                            <span class="hide-menu">Event</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="#">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Transaction history</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="#">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Course application (FE)</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="#">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Points exchange (FE)</span>
                        </a>
                    </li>


                    {{-- TUTORING --}}
                    <li class="text-xs font-bold pb-3 pt-6">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>TUTORING</span>
                    </li>

                    <li class="hs-accordion sidebar-item" id="programs-accordion">
                        <a href="#programs" class="hs-accordion-toggle sidebar-link dropdown-menu-link  ">
                            <i class="ti ti-book text-xl flex-shrink-0"></i> <span class="hide-menu">Programs</span>
                            <span class="hide-menu ms-auto">
                                <i class="ti ti-chevron-down text-lg ms-auto  hs-accordion-active:hidden "></i>
                                <i
                                    class="ti ti-chevron-up text-lg ms-auto hs-accordion-active:block ml-auto hidden z-10 relative"></i>
                            </span>
                        </a>

                        <div id="programs-accordion" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link flex items-center justify-between"
                                        href="{{ route('program-categories.index') }}">
                                        <span class="flex gap-2 items-center ">
                                            <i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>
                                            <span class="hide-menu">Category</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link flex items-center justify-between"
                                        href="{{ route('programs.index') }}">
                                        <span class="flex gap-2 items-center ">
                                            <i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>
                                            <span class="hide-menu">Program List</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="#">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Divisi(FE)</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="#">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Teacher</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="#">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Tutoring User</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="#">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Time Table</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="#">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Student ranking (FE)</span>
                        </a>
                    </li>

                    <li class="hs-accordion sidebar-item" id="blog-accordion">
                        <a href="#transaction" class="hs-accordion-toggle sidebar-link dropdown-menu-link  ">
                            <i class="ti ti-app-window text-xl flex-shrink-0"></i> <span
                                class="hide-menu">Transaction</span>
                            <span class="hide-menu ms-auto">
                                <i class="ti ti-chevron-down text-lg ms-auto  hs-accordion-active:hidden "></i>
                                <i
                                    class="ti ti-chevron-up text-lg ms-auto hs-accordion-active:block ml-auto hidden z-10 relative"></i>
                            </span>
                        </a>

                        <div id="blog-accordion" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link flex items-center justify-between" href="#">
                                        <span class="flex gap-2 items-center ">
                                            <i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>
                                            <span class="hide-menu">Bill recap</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link flex items-center justify-between" href="#">
                                        <span class="flex gap-2 items-center ">
                                            <i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>
                                            <span class="hide-menu">Event</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- CONTENT --}}
                    <li class="text-xs font-bold pb-3 pt-6">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>CONTENT</span>
                    </li>

                    <li class="hs-accordion sidebar-item" id="blog-accordion">
                        <a href="#blog" class="hs-accordion-toggle sidebar-link dropdown-menu-link  ">
                            <i class="ti ti-app-window text-xl flex-shrink-0"></i> <span class="hide-menu">Blog</span>
                            <span class="hide-menu ms-auto">
                                <i class="ti ti-chevron-down text-lg ms-auto  hs-accordion-active:hidden "></i>
                                <i
                                    class="ti ti-chevron-up text-lg ms-auto hs-accordion-active:block ml-auto hidden z-10 relative"></i>
                            </span>
                        </a>

                        <div id="blog-accordion" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link flex items-center justify-between" href="#">
                                        <span class="flex gap-2 items-center ">
                                            <i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>
                                            <span class="hide-menu">Category</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link flex items-center justify-between" href="#">
                                        <span class="flex gap-2 items-center ">
                                            <i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>
                                            <span class="hide-menu">Blog list</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- PROFILE --}}
                    <li class="text-xs font-bold pb-3 pt-6">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>PROFILE</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="#">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>User</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="#">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
        <!-- </aside> -->
    </div>
</aside>
