<aside class="sidebar" id="sidebar">
    <!-- Logo -->
    <div class="brand">
        <div class="brand-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <h3>School<span>Hub</span></h3>
    </div>

    <!-- Navigation -->
    <nav>
        @php
            $sidebar_menu = config('sidebar');
        @endphp

        <!-- ===== MAIN MENU ===== -->
        <div class="nav-section-menu ">Main Menu</div>
        @foreach ($sidebar_menu['main_menu'] as $item)
            @php
                $isActive = request()->routeIs($item['route'] . '.*') || request()->routeIs($item['route']);
            @endphp
            <a href="{{ route($item['route']) }}" class="nav-link {{ $isActive ? 'active' : '' }}">
                <i class="{{ $item['icon'] }}"></i>
                <span class="nav-text">{{ $item['title'] }}</span>
                @if (isset($item['badge']) && $item['badge'] && isset($item['model']))
                    <span class="badge">{{ $item['model']::count() }}</span>
                @endif
            </a>
        @endforeach

        <!-- ===== ACADEMIC ===== -->
        <div class="nav-section">Academic</div>
        @foreach ($sidebar_menu['academic'] as $item)
            @php
                $isActive = request()->routeIs($item['route'] . '.*') || request()->routeIs($item['route']);
            @endphp
            <a href="{{ $item['route'] == '#' ? '#' : route($item['route']) }}"
                class="nav-link {{ $isActive ? 'active' : '' }}"
                {{ $item['route'] == '#' ? 'onclick="return false;"' : '' }}>
                <i class="{{ $item['icon'] }}"></i>
                <span class="nav-text">{{ $item['title'] }}</span>
            </a>
        @endforeach

        <!-- ===== SYSTEM ===== -->
        <div class="nav-section">System</div>
        @foreach ($sidebar_menu['system'] as $item)
            @php
                $isActive = request()->routeIs($item['route'] . '.*') || request()->routeIs($item['route']);
            @endphp
            <a href="{{ $item['route'] == '#' ? '#' : route($item['route']) }}"
                class="nav-link {{ $isActive ? 'active' : '' }}"
                {{ $item['route'] == '#' ? 'onclick="return false;"' : '' }}>
                <i class="{{ $item['icon'] }}"></i>
                <span class="nav-text">{{ $item['title'] }}</span>
            </a>
        @endforeach

        <!-- Logout -->
        <a href="#" class="nav-link logout-link"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-text">Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</aside>