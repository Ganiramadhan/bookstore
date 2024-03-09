<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard">Gani Pedia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('/') ? ' active' : '' }}" href="/">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('category') ? ' active' : '' }}" href="/category">Category</a>
                </li>
               
            </ul>
        </div>
    </div>
</nav>
