<nav class="navbar-custom">
    <!-- left section -->
    <div class="navbar-left">
        <button class="toggle-btn" onclick="toggleSidebar()" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <div class="breadcrumb-area">
            <h5>@yield('page_title', 'Dashboard')</h5>
            <small>@yield('breadcrumbs', 'Welcome back! 👋')</small>
        </div>
    </div>

    <!-- right section -->
    <div class="navbar-right">
        <!-- Search -->
        <button class="notification-btn" type="button" id="searchToggleBtn">
            <i class="fas fa-search"></i>
        </button>

        <!-- notifications -->
        <button class="notification-btn" type="button">
            <i class="fas fa-bell"></i>
            <span class="badge-dot"></span>
        </button>

        <!-- User -->
        @auth
            <div class="dropdown">
                <button class="user-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=1a1a2e&color=fff&size=36"
                        alt="{{ Auth::user()->name }}">
                    <div class="user-info">
                        <div class="name">{{ Auth::user()->name }}</div>
                        <div class="role">{{ Auth::user()->role ?? 'User' }}</div>
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="fas fa-user me-2"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cog me-2"></i> Settings
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger dropdown-item"
                                style="border: none; background: none; width: 100%; text-align: left; cursor: pointer; ">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</nav>

<!--search bar-->
<div id="searchCollapse" style="background: #fff; padding: 10px 30px; border-bottom: 1px solid #e8ecf1; display: none;">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form id="searchForm" action="{{ URL::current() }}" method="GET" class="d-flex gap-2">
                <div class="input-group flex-grow-1">
                    <input type="text" name="search" id="searchInput" class="form-control"
                        placeholder="{{ $searchPlaceholder ?? '🔍 Search in...' }}"
                        value="{{ request()->query('search') }}">
                    <button class="btn btn-primary bg-indigo-500" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    @if (request()->has('search'))
                        <a href="{{ URL::current() }}" class="btn btn-danger" id="clearSearchBtn">
                            <i class="fas fa-times"></i>
                        </a>
                    @endif
                </div>
            </form>
            <small class="text-muted d-block text-center mt-1" id="searchInfo">
                <i class="fas fa-info-circle me-1"></i>
                <span id="searchHint">{{ $searchHint ?? 'Search by name, email, or phone' }}</span>
            </small>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('searchToggleBtn');
        const searchDiv = document.getElementById('searchCollapse');

        if (toggleBtn && searchDiv) {
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Toggle the display of the search bar
                if (searchDiv.style.display === 'none' || searchDiv.style.display === '') {
                    searchDiv.style.display = 'block';
                } else {
                    searchDiv.style.display = 'none';
                }
            });
        } else {
            console.log('Elements not found!');
        }
    });
</script>
