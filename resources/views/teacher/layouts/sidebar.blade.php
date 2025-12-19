<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400/20  bg-white left-sidebar   transition-all duration-300">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="p-5">

        <a href="../" class="">
            {{-- <img src="../assets/images/logos/dark-logo.svg" alt="Logo-Dark" /> --}}
            <h2 class="font-bold text-xl">DASHBOARD TEACHER</h2>
        </a>

    </div>
    <div class="scroll-sidebar bottom-0" data-simplebar>
        <div class="px-6 mt-8">
            <nav class=" w-full flex flex-col sidebar-nav">
                <ul id="sidebarnav" class="text-dark text-sm">
                    <li class="text-xs font-bold pb-4">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>HOME</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="{{ route('teacher.dashboard') }}">
                            <i class="ti ti-layout-dashboard  text-xl"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="text-xs font-bold pb-4 mt-8">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>MAIN</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-3 px-3  rounded-md  w-full flex items-center hover:text-primary hover:bg-primary/15"
                            href="{{ route('teacher.courses.index') }}">
                            <i class="ti ti-book  text-xl"></i>
                            <span>Course</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- </aside> -->
    </div>
</aside>
