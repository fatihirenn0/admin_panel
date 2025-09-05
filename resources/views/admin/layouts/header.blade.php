<!-- Navbar -->

<nav
    class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="icon-base ti tabler-menu-2 icon-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-item dropdown me-2 me-xl-0">
                <a
                    class="nav-link dropdown-toggle hide-arrow"
                    id="nav-theme"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <i class="icon-base ti tabler-sun icon-md theme-icon-active"></i>
                    <span class="d-none ms-2" id="nav-theme-text">{{ __('Temayı Değiştir') }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="nav-theme-text">
                    <li>
                        <button
                            type="button"
                            class="dropdown-item align-items-center active"
                            data-bs-theme-value="light"
                            aria-pressed="false">
                            <span><i class="icon-base ti tabler-sun icon-md me-3" data-icon="sun"></i>{{__('Aydınlık')}}</span>
                        </button>
                    </li>
                    <li>
                        <button
                            type="button"
                            class="dropdown-item align-items-center"
                            data-bs-theme-value="dark"
                            aria-pressed="true">
                        <span
                        ><i class="icon-base ti tabler-moon-stars icon-md me-3" data-icon="moon-stars"></i>{{__('Karanlık')}}</span
                        >
                        </button>
                    </li>
                    <li>
                        <button
                            type="button"
                            class="dropdown-item align-items-center"
                            data-bs-theme-value="system"
                            aria-pressed="false">
                        <span
                        ><i
                                class="icon-base ti tabler-device-desktop-analytics icon-md me-3"
                                data-icon="device-desktop-analytics"></i
                            >{{ __('Cihaz Tercihi') }}</span
                        >
                        </button>
                    </li>
                </ul>
            </div>

        </div>
        <div class="mx-3">
            <a href="{{ route('admin.index') }}">Ana Sayfa</a>
            @if(\Illuminate\Support\Facades\View::hasSection('parent_menu'))
                > <a href="{{ \Illuminate\Support\Facades\View::yieldContent('parent_menu_link') }}">{{ \Illuminate\Support\Facades\View::yieldContent('parent_menu') }}</a>
            @endif >
            <a>@yield('title')</a>
        </div>
        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <i class="menu-icon icon-base ti tabler-user" style="width: 40px;height: 40px"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.users.edit',auth()->id()) }}">
                            <i class="icon-base ti tabler-user icon-md me-3"></i><span>Profilim</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-base ti tabler-power icon-md me-3"></i><span>Çıkış Yap</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

<!-- / Navbar -->

