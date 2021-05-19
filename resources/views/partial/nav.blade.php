<nav class="navbar section navbar-dark bg-dark p-3 fixed-top myHeight d-flex justify-content-between flex-column">
    <div class="placeHolder">
        <h4 class="text-white mt-5">BackOffice</h4>
    </div>
    <div>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
            <ul class="navbar-nav d-flex flex-column justify-content-between h-100  align-items-center">
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
    <div class="text-center p-4 bg-dark text-light">
        © 2021 Copyright <br> Saïd-Gauthier #dream-team
    </div>
   
    
</nav>

