<!-- Sidebar Menu -->
<ul class="sidebar-menu">

    <li class="active">
        <a href="/admin"><span>Dashboard</span><i class="fa fa-tachometer"></i>
        </a>
    </li>
    <li><a href="#"><span>test</span></a></li>
    <li class="treeview">
        <a href="#"><span>Multilevel</span><i class="fa fa-users"></i></a>
        <ul class="treeview-menu">
            @include('partials.menu.items', ['items'=> $menu_ecommerce->roots()])
        </ul>
    </li>
    <li class="">
        <a href="/admin"><span>eCommerce</span><i class="fa fa-shopping-cart"></i> </a>
        <ul class="treeview-menu">
            @include('partials.menu.items', ['items'=> $menu_ecommerce->roots()])
        </ul>
    </li>
</ul><!-- /.sidebar-menu -->
