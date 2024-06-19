<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li> --}}
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <div class="nav-link nav-icon-hover cursor-pointer" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset(auth()->user()->photo) }}" alt="" width="35" height="35"
                            class="rounded-circle">
                    </div>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <div class="d-flex align-items-center dropdown-item">
                                <p class="mb-0 fs-3">{{ auth()->user()->name }}</p>
                            </div>
                            <hr class="my-1" />
                            <a href="{{ route('profile.edit') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            {{-- <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-settings fs-6"></i>
                                <p class="mb-0 fs-3">Setting</p>
                            </a> --}}
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn btn-outline-danger mx-3 mt-2 d-block">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
