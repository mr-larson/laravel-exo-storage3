<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $page === "home" ? "active" : "" }}" href={{ route('home') }}>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $page === "user" ? "active" : "" }}" href={{ route('user.index') }}>User</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ $page === "service" ? "active" : "" }}" href={{ route('service.index') }}>Service</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ $page === "caracteristique" ? "active" : "" }}" href={{ route('caracteristique.index') }}>Caracteristique</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ $page === "portfolio" ? "active" : "" }}" href={{ route('portfolio.index') }}>Portfolio</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ $page === "galerie" ? "active" : "" }}" href={{ route('galerie.index') }}>Galerie</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
