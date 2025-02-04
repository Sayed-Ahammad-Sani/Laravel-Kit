<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-boxdark duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
    @click.outside="sidebarToggle = false">
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5 mx-auto">
        <a href="index.html">
            <img src="{{asset('src/images/logo/ahammad-it-logo.png')}}" width="150px" alt="Logo" />
        </a>

        <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
            <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                    fill="" />
            </svg>
        </button>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav class="px-4 py-4blg:px-6" x-data="{selected: $persist('Dashboard')}">
            <!-- Menu Group -->
            <div>
                {{-- <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">MENU</h3> --}}

                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Home -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 {{ request()->routeIs('app.dashboard') ? 'bg-graydark dark:bg-meta-4' : '' }}"
                            href="#" @click.prevent="selected = (selected === 'Home' ? '':'Home')">

                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.10322 0.956299H2.53135C1.5751 0.956299 0.787598 1.7438 0.787598 2.70005V6.27192C0.787598 7.22817 1.5751 8.01567 2.53135 8.01567H6.10322C7.05947 8.01567 7.84697 7.22817 7.84697 6.27192V2.72817C7.8751 1.7438 7.0876 0.956299 6.10322 0.956299ZM6.60947 6.30005C6.60947 6.5813 6.38447 6.8063 6.10322 6.8063H2.53135C2.2501 6.8063 2.0251 6.5813 2.0251 6.30005V2.72817C2.0251 2.44692 2.2501 2.22192 2.53135 2.22192H6.10322C6.38447 2.22192 6.60947 2.44692 6.60947 2.72817V6.30005Z"
                                    fill="" />
                                <path
                                    d="M15.4689 0.956299H11.8971C10.9408 0.956299 10.1533 1.7438 10.1533 2.70005V6.27192C10.1533 7.22817 10.9408 8.01567 11.8971 8.01567H15.4689C16.4252 8.01567 17.2127 7.22817 17.2127 6.27192V2.72817C17.2127 1.7438 16.4252 0.956299 15.4689 0.956299ZM15.9752 6.30005C15.9752 6.5813 15.7502 6.8063 15.4689 6.8063H11.8971C11.6158 6.8063 11.3908 6.5813 11.3908 6.30005V2.72817C11.3908 2.44692 11.6158 2.22192 11.8971 2.22192H15.4689C15.7502 2.22192 15.9752 2.44692 15.9752 2.72817V6.30005Z"
                                    fill="" />
                                <path
                                    d="M6.10322 9.92822H2.53135C1.5751 9.92822 0.787598 10.7157 0.787598 11.672V15.2438C0.787598 16.2001 1.5751 16.9876 2.53135 16.9876H6.10322C7.05947 16.9876 7.84697 16.2001 7.84697 15.2438V11.7001C7.8751 10.7157 7.0876 9.92822 6.10322 9.92822ZM6.60947 15.272C6.60947 15.5532 6.38447 15.7782 6.10322 15.7782H2.53135C2.2501 15.7782 2.0251 15.5532 2.0251 15.272V11.7001C2.0251 11.4188 2.2501 11.1938 2.53135 11.1938H6.10322C6.38447 11.1938 6.60947 11.4188 6.60947 11.7001V15.272Z"
                                    fill="" />
                                <path
                                    d="M15.4689 9.92822H11.8971C10.9408 9.92822 10.1533 10.7157 10.1533 11.672V15.2438C10.1533 16.2001 10.9408 16.9876 11.8971 16.9876H15.4689C16.4252 16.9876 17.2127 16.2001 17.2127 15.2438V11.7001C17.2127 10.7157 16.4252 9.92822 15.4689 9.92822ZM15.9752 15.272C15.9752 15.5532 15.7502 15.7782 15.4689 15.7782H11.8971C11.6158 15.7782 11.3908 15.5532 11.3908 15.272V11.7001C11.3908 11.4188 11.6158 11.1938 11.8971 11.1938H15.4689C15.7502 11.1938 15.9752 11.4188 15.9752 11.7001V15.272Z"
                                    fill="" />
                            </svg>

                            Home

                            <svg class="absolute right-4 top-1/2 -translate-y-1/2 fill-current"
                                :class="{ 'rotate-180': (selected === 'Home') }" width="20" height="20"
                                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z"
                                    fill="" />
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div class="translate transform overflow-hidden"
                            :class="(selected === 'Home') ? 'block' : 'hidden'">
                            <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                                <li>
                                    <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white {{ request()->routeIs('app.dashboard') ? 'text-white' : '' }}"
                                        href="{{route('app.dashboard')}}">Dashboard
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>
                    <!-- Menu Item Home -->

                    <!-- Menu Item Roles -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 {{ request()->routeIs('app.roles.*') ? 'bg-graydark dark:bg-meta-4' : '' }}"
                            href="{{ route('app.roles.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="18" height="18"
                                viewBox="0 0 41.96 47.65">
                                <path fill=""
                                    d="M39.65 17.17a5.21 5.21 0 0 1-2.46-2.65c-.05-.13-.1-.26-.16-.39a5.38 5.38 0 0 1-.15-3.69 4.3 4.3 0 0 0-5.36-5.36 5.27 5.27 0 0 1-3.67-.15l-.4-.16a5.23 5.23 0 0 1-2.65-2.45 4.29 4.29 0 0 0-7.62 0 5.15 5.15 0 0 1-2.66 2.45l-.39.16a5.27 5.27 0 0 1-3.67.15 4.3 4.3 0 0 0-5.38 5.36 5.27 5.27 0 0 1-.15 3.67l-.16.39a5.13 5.13 0 0 1-2.46 2.65 4.31 4.31 0 0 0 0 7.63 5.13 5.13 0 0 1 2.46 2.66l.16.39a5.27 5.27 0 0 1 .15 3.67 4.3 4.3 0 0 0 5.38 5.38 5.27 5.27 0 0 1 3.67.15l.39.16a5.15 5.15 0 0 1 2.65 2.45 4.29 4.29 0 0 0 7.62 0 5.23 5.23 0 0 1 2.65-2.45l.4-.16a5.27 5.27 0 0 1 3.67-.15 4.3 4.3 0 0 0 5.37-5.38 5.38 5.38 0 0 1 .15-3.67c.06-.13.11-.26.16-.39a5.21 5.21 0 0 1 2.46-2.65 4.31 4.31 0 0 0 0-7.63Zm-10.08-.16L19.52 27.08a1.5 1.5 0 0 1-2.12 0l-5-5a1.5 1.5 0 1 1 2.12-2.09l3.91 3.91 9-9a1.49 1.49 0 0 1 2.12 0 1.51 1.51 0 0 1 .02 2.11Z">
                                </path>
                                <path fill=""
                                    d="M8.74 33.78 3.15 44.34a.62.62 0 0 0 .67.89l5.82-1.2a.63.63 0 0 1 .65.28l1.83 3a.62.62 0 0 0 1.08 0l5.67-10.68m13.76-2.85 5.56 10.56a.61.61 0 0 1-.66.89l-5.82-1.2a.62.62 0 0 0-.65.28l-1.83 3a.62.62 0 0 1-1.08 0l-5.23-10.68">
                                </path>
                            </svg>

                            Roles
                        </a>
                    </li>
                    <!-- Menu Item Roles -->

                    <!-- Menu Item Users -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 {{ request()->routeIs('app.users.*') ? 'bg-graydark dark:bg-meta-4' : '' }}"
                            href="{{route('app.users.index')}}">
                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.0002 7.79065C11.0814 7.79065 12.7689 6.1594 12.7689 4.1344C12.7689 2.1094 11.0814 0.478149 9.0002 0.478149C6.91895 0.478149 5.23145 2.1094 5.23145 4.1344C5.23145 6.1594 6.91895 7.79065 9.0002 7.79065ZM9.0002 1.7719C10.3783 1.7719 11.5033 2.84065 11.5033 4.16252C11.5033 5.4844 10.3783 6.55315 9.0002 6.55315C7.62207 6.55315 6.49707 5.4844 6.49707 4.16252C6.49707 2.84065 7.62207 1.7719 9.0002 1.7719Z"
                                    fill="" />
                                <path
                                    d="M10.8283 9.05627H7.17207C4.16269 9.05627 1.71582 11.5313 1.71582 14.5406V16.875C1.71582 17.2125 1.99707 17.5219 2.3627 17.5219C2.72832 17.5219 3.00957 17.2407 3.00957 16.875V14.5406C3.00957 12.2344 4.89394 10.3219 7.22832 10.3219H10.8564C13.1627 10.3219 15.0752 12.2063 15.0752 14.5406V16.875C15.0752 17.2125 15.3564 17.5219 15.7221 17.5219C16.0877 17.5219 16.3689 17.2407 16.3689 16.875V14.5406C16.2846 11.5313 13.8377 9.05627 10.8283 9.05627Z"
                                    fill="" />
                            </svg>

                            Users
                        </a>
                    </li>
                    <!-- Menu Item Users -->
                </ul>
            </div>

        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>






{{-- <div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ms-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{route('app.dashboard')}}" class="{{Route::is('app.dashboard') ? 'mm-active' : ''}}">
                        <i class="fa fa-gauge metismenu-icon"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('app.roles.index')}}" class="{{Request::is('app/roles*') ? 'mm-active' : ''}}">
                        <i class="fa-solid fa-fingerprint metismenu-icon"></i>
                        Roles
                    </a>
                </li>
                <li>
                    <a href="{{route('app.users.index')}}" class="{{Request::is('app/users*') ? 'mm-active' : ''}}">
                        <i class="fa-solid fa-users metismenu-icon"></i>
                        Users
                    </a>
                </li>
                <li class="app-sidebar__heading">UI Components</li>
                <li>
                    <a href="#">
                        <i class="fa-regular fa-gem metismenu-icon"></i>
                        Elements
                        <i class="fa-solid fa-angle-down metismenu-state-icon caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="elements-buttons-standard.html">
                                <i class="metismenu-icon"></i>
                                Buttons
                            </a>
                        </li>
                        <li>
                            <a href="elements-dropdowns.html">
                                <i class="metismenu-icon"> </i>Dropdowns
                            </a>
                        </li>
                        <li>
                            <a href="elements-icons.html">
                                <i class="metismenu-icon"> </i>Icons
                            </a>
                        </li>
                        <li>
                            <a href="elements-badges-labels.html">
                                <i class="metismenu-icon"> </i>Badges
                            </a>
                        </li>
                        <li>
                            <a href="elements-cards.html">
                                <i class="metismenu-icon"> </i>Cards
                            </a>
                        </li>
                        <li>
                            <a href="elements-list-group.html">
                                <i class="metismenu-icon"> </i>List Groups
                            </a>
                        </li>
                        <li>
                            <a href="elements-navigation.html">
                                <i class="metismenu-icon"> </i>Navigation Menus
                            </a>
                        </li>
                        <li>
                            <a href="elements-utilities.html">
                                <i class="metismenu-icon"> </i>Utilities
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div> --}}