<div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a id="dashboard-link" href="{{ route('dashboard') }}" class="nav-link" aria-current="page">Dashboard</a>
        </li>
        @auth
            @if(auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a id="data-user-link" href="{{ route('user') }}" class="nav-link">Data User</a>
                </li>
            @endif
        @endauth
    </ul>
</div>