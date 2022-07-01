<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if( strpos(Route::currentRouteName(), 'material.') === 0 ) active @endif"
                                                                    href="{{ route('material.show') }}">Материалы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if( strpos(Route::currentRouteName(), 'tag.') === 0 ) active @endif"
                                                                              href="{{ route('tag.show') }}">Теги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if( strpos(Route::currentRouteName(), 'category.') === 0 ) active @endif"
                                                                    href="{{ route('category.show') }}">Категории</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
