<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="#" class="navbar-brand">Caffeinated Menu</a>
        </div>

        <div class="collapse navbar-collapse" id="menu-collapse">
            <ul class="nav navbar-nav">
                @include('partials.menu.items', ['items'=> $menu_example->roots()])
            </ul>
        </div>
    </div>
</nav>
