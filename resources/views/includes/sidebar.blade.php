<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        {{--<div class="user-panel">--}}
            {{--<div class="pull-left image">--}}
                {{--<img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image"/>--}}
            {{--</div>--}}
            {{--<div class="pull-left info">--}}
                {{--<p>Alex Pie </p>--}}
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            {{--</div>--}}
        {{--</div>--}}
       {{----}}
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search..."/>--}}
                {{--<span class="input-group-btn">--}}
                {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
                {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}

        @include('partials.menu.navbar')

        {{--{!! $menu_ecommerce->asUl() !!}--}}

    </section>
    <!-- /.sidebar -->
</aside>