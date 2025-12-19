<header class="sticky top-0 w-full text-sm py-3 px-5 bg-white z-30 shadow-sm border-b border-gray-200">
    <nav class=" w-full  flex items-center justify-between " aria-label="Global">
        <ul class="icon-nav flex items-center gap-4">
            <li class="relative xl:hidden">
                <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                    data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand"
                    aria-label="Toggle navigation" href="javascript:void(0)">
                    <i class="ti ti-menu-2 relative z-1"></i>
                </a>
            </li>

            <li class="relative">

                <div class="hs-dropdown relative inline-flex [--placement:bottom-left] sm:[--trigger:hover]">
                    <a class="relative hs-dropdown-toggle inline-flex  icon-hover text-dark" href="#">
                        <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
                        <div
                            class="absolute inline-flex items-center justify-center  text-white text-[11px] font-medium  bg-primary w-2 h-2 rounded-full -top-[1px] -right-[6px]">
                        </div>
                    </a>
                    <div class=" hs-dropdown-menu transition-[opacity,margin]  rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[300px] hidden "
                        aria-labelledby="hs-dropdown-custom-icon-trigger">
                        <div>
                            <h3 class="text-dark font-semibold text-base px-6 py-3">Notification
                            </h3>
                            <ul class="list-none  flex flex-col">
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-primary/15">
                                        <p class="text-sm text-dark font-semibold">Roman Joined the
                                            Team!</p>
                                        <p class="text-xs text-gray-500 font-medium">Congratulate
                                            him</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-primary/15">
                                        <p class="text-sm text-dark font-semibold">New message
                                            received</p>
                                        <p class="text-xs text-gray-500 font-medium">Salma sent you
                                            new message</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-primary/15">
                                        <p class="text-sm text-dark font-semibold">New Payment
                                            received</p>
                                        <p class="text-xs text-gray-500 font-medium">Check your
                                            earnings</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-primary/15">
                                        <p class="text-sm text-dark font-semibold">Jolly completed
                                            tasks</p>
                                        <p class="text-xs text-gray-500 font-medium">Assign her new
                                            tasks</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-primary/15">
                                        <p class="text-sm text-dark font-semibold">Roman Joined the
                                            Team!</p>
                                        <p class="text-xs text-gray-500 font-medium">Congratulate
                                            him</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </li>
        </ul>
        <div class="flex items-center gap-4">
            <div class="text-end">
                <span class="fw-bold fs-3 text-capitalize">{{ Auth::user()->name }}</span><br>
                <span class="mt-1 badge fs-2 bg-light-primary p-1 text-primary">{{ Auth::user()->roles->first()->name }}</span>
            </div>

            <div class="m-1 hs-dropdown [--trigger:hover] relative inline-flex">

                <img class="object-cover w-9 h-9 rounded-full " src="../assets/images/profile/user-1.jpg" alt
                    aria-hidden="true">

                <div class="hs-dropdown-menu py-3 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden  bg-white shadow-md rounded-lg mt-2  after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-20 w-[200px]"
                    role="menu">
                    <div class="space-y-1">
                        <a href="javscript:void(0)" class="flex gap-2 items-center px-4 py-2.5 hover:bg-primary/10">
                            <i class="ti ti-user text-gray-500 text-xl "></i>
                            <p class="text-sm text-dark">My Profile</p>
                        </a>
                        <a href="javscript:void(0)" class="flex gap-2 items-center px-4 py-2.5 hover:bg-primary/10">
                            <i class="ti ti-mail text-gray-500 text-xl"></i>
                            <p class="text-sm text-dark">My Account</p>
                        </a>
                        <a href="javscript:void(0)" class="flex gap-2 items-center px-4 py-2.5 hover:bg-primary/10">
                            <i class="ti ti-list-check text-gray-500 text-xl "></i>
                            <p class="text-sm text-dark">My Task</p>
                        </a>
                        <div class="px-4 mt-[7px] grid">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="btn-outline-primary w-full hover:bg-blue-700/80 hover:text-white">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</header>
