<div class="app-sidebar sidebar-shadow">
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
</div>