<!DOCTYPE html>
<html dir="ltr" lang="en-US" @yield('schematag')>
<head>
@yield('seo')
@cache('live.partial.head')
</head>
<body class="stretched">

    <!-- Document Wrapper =============================================   -->
    <div id="wrapper" class="clearfix">
 @yield('top')
       <!-- Header ============================================= -->
        <header id="header" class="transparent-header semi-transparent dark full-header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo ============================================= -->
                    <div id="logo">
                        <a href="{!! url('/') !!}" class="standard-logo" data-dark-logo="{!! url('live/images/grace-logo-light.png') !!}"><img src="{!! url('live/images/grace-logo-light.png') !!}" alt="Grace Logo"></a>
                        <a href="{!! url('/') !!}" class="retina-logo" data-dark-logo="{!! url('live/images/grace-logo-light.png') !!}"><img src="{!! url('live/images/grace-logo-light.png') !!}" alt="Grace Logo"></a>
                    </div><!-- #logo end -->



                    <!-- Primary Navigation ============================================= -->
                    <nav id="primary-menu" role="navigation">


                        <!-- Top Cart ============================================= -->
                        <div id="top-cart">
                            <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>
                            <div class="top-cart-content">
                                <div class="top-cart-title">
                                    <h4>Shopping Cart</h4>
                                </div>
                                <div class="top-cart-items">
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="#">
                                            {!! HTML::image('live/images/shop/small/1.jpg', 'ALT TEXT') !!}
                                            </a>
                                        </div>
                                        <div class="top-cart-item-desc">
                                            <a href="#">Blue Round-Neck Tshirt</a>
                                            <span class="top-cart-item-price">$19.99</span>
                                            <span class="top-cart-item-quantity">x 2</span>
                                        </div>
                                    </div>
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="#">
                                           {!! HTML::image('live/images//shop/small/6.jpg', 'ALT TEXT') !!}
                                           </a>
                                        </div>
                                        <div class="top-cart-item-desc">
                                            <a href="#">Light Blue Denim Dress</a>
                                            <span class="top-cart-item-price">$24.99</span>
                                            <span class="top-cart-item-quantity">x 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-cart-action clearfix">
                                    <span class="fleft top-checkout-price">$114.95</span>
                                    <button class="button button-3d button-small nomargin fright">View Cart</button>
                                </div>
                                </div>
                        </div><!-- #top-cart end -->

                        <!-- Top Search ============================================= -->
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="{!! url('en/search') !!}" method="get" role="search">>
                                <input type="text" name="q" class="form-control" value="{!! $q or null !!}" placeholder="Type &amp; Hit Enter..">
                            </form>
                        </div><!-- #top-search end -->

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->
@yield('submenu')
@yield('slider')
@yield('intro')
@yield('pagetitle')
@yield('content')




		<!-- Footer ============================================= -->
        <footer id="footer" class="dark">
		@cache('live.partial.footer')
		@yield('footer')
		</footer>
	</div><!-- #wrapper end -->

    <!-- Go To Top ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts ============================================= -->
    <script type="text/javascript" src="{!! asset('live/js/functions.js') !!}"></script>

</body>
</html>
