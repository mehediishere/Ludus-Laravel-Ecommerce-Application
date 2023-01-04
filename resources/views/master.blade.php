<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('page-meta')
    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon">
    <title>Ludus - Electronics, Apparel, Computers, Books, DVDs & more</title>

    <!--====== Google Font ======-->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800') }}" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="{{ asset('css/utility.css') }}">

    <!--====== App ======-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!--====== Page CSS ======-->
    @yield('page-css')
</head>
<body class="config">
    @include('layouts.preloader')

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        @include('layouts.header')
        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        @yield('app-content')
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        @include('layouts.footer')

        <!--====== Modal Section ======-->

        @yield('outside-of-app-content')

        <!--====== Add to Cart Modal ======-->
        @include('layouts.cart')
        <!--====== End - Add to Cart Modal ======-->

        <!--====== Quick Look Modal ======-->
        @include('layouts.quick-look')
        <!--====== End - Quick Look Modal ======-->

        <!--====== End - Modal Section ======-->
    </div>
    <!--====== End - Main App ======-->

    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="{{ url('https://www.google-analytics.com/analytics.js') }}" async defer></script>

    <!--====== Vendor Js ======-->
    <script src="{{ asset('js/vendor.js') }}"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="{{ asset('js/jquery.shopnav.js') }}"></script>

    <!--====== App ======-->
    <script src="{{ asset('js/app.js') }}"></script>

    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>
    <script>
        $(function (){
            $(document).on('click', '.quick_look_btn', function (e){
                e.preventDefault();
                let product_data = $(this).data('quick_look_product');
                $('.pd-detail__name').text(product_data['title']);
                $('.quick-view-rating').text(product_data['rating']+" ratings");
                $('.pd-detail__stock').text(product_data['stock']+" in stock");
                $('.pd-detail__preview-desc').text(product_data['description']);
                $('.quick-look-product-category').text(product_data['category']);
                $('.quick-look-modal-img-thumbnail img').attr('src', product_data['thumbnail']);

                $.ajax({
                    url: "{{ url("/quick-view") }}",
                    method: "POST",
                    data: {
                        price: product_data['price'],
                        discount: product_data['discountPercentage'],
                        _token: '{!! csrf_token() !!}'
                    },
                    success: function (response){
                        $('.pd-detail__price').text("$"+response[0]);
                        $('.pd-detail__del').text("$"+response[1]);
                        $('.pd-detail__discount').text("("+response[2]+"% OFF)");
                    }
                });
            });

            $(document).on('click', '.add_cart_btn', function (e){
                e.preventDefault();
                let product_data = $(this).data('add_to_cart');

                $.ajax({
                    url: "{{ url("/add-to-cart") }}",
                    method: "POST",
                    data: {
                        product: product_data,
                        quantity: 1,
                        _token: '{!! csrf_token() !!}'
                    },
                    success: function (response){
                        $('.cart-add-modal-item-count').text(response['cartItems']+' item (s) in your cart');
                        $('.total-item-round').text(response['cartItems']);
                        $('.subtotal-value').text("$"+response['subTotal']);
                        $('.cart-add-modal-item-title').text(response['title']);
                        $('.cart-add-modal-item-price').text("$"+response['price']);
                        $('.cart-add-modal-item-img').attr('src', response['thumbnail']);
                        $('#cart_items_in_card').load(window.location.href + ' #cart_items_in_card');
                    }
                });
            });

            $(document).on('click', '.remove_hover_cart_item', function (e){
                e.preventDefault();
                let product_id = $(this).data('product');

                $.ajax({
                    url: "{{ url("/add-to-cart") }}",
                    method: "delete",
                    data: {
                        product: product_id,
                        _token: '{!! csrf_token() !!}'
                    },
                    success: function (response){
                        $('.total-item-round').text(response['cartItems']);
                        $('.subtotal-value').text("$"+response['subTotal']);
                        $('#product'+product_id).hide('slow', function(){ $('#product'+product_id).remove(); });
                    }
                });
            });
        });
    </script>

    <!--====== Page script ======-->
    @yield('page-script')
</body>
</html>
