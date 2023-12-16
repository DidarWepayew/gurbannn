<nav class="navbar navbar-expand-lg navbar-dark bg-black" aria-label="Navbar">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">@lang('app.dashboard')</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="link-warning nav-link" href="{{ route('admin.products.index') }}">
                        <i class="bi-box"></i> @lang('app.products')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="link-warning nav-link" href="{{ route('admin.reviews.index') }}">
                        <i class="bi-star"></i> @lang('app.reviews')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.brands.index') }}">
                        @lang('app.brands')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.attributeGroups.index') }}">
                        @lang('app.attributes')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">
                        @lang('app.users')
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" target="_blank">
                        <i class="bi-arrow-up-right-square"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        <i class="bi-box-arrow-right"></i> @lang('app.logout')
                    </a>
                    <form id="logout" action="{{ route('logout') }}" method="post" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>