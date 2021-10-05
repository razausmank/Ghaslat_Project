<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ghaslat</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Ghaslat Laundry">
    <link rel="shortcut icon" href="{{ asset('main/images/favicon.ico') }}">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }} ">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

</head>

<body>
    <nav class="panel-menu" id="mobile-menu">
        <ul>

        </ul>
        <div class="mm-navbtn-names">
            <div class="mm-closebtn">Close</div>
            <div class="mm-backbtn">Back</div>
        </div>
    </nav>
    @include("main.header")
    <div id="subtitle-wrapper" class="lazyload" data-bg="{{ asset('main/images/subtitle-wrapper01.jpg') }}">
        <div class="subtitle-wrapper-img lazyload" data-bg="{{ asset('main/images/subtitle-wrapper01-img.jpg') }} ">
            <div class="container container-fluid-xl">
                <div class="tt-breadcrumbs">
                    <ul>
                        <li><a href="{{ route('main.home') }}">home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
                <h1 class="subtitle__title">About Us</h1>
            </div>
            <div class="bubbleContainer">
                <div class="bubble-1"></div>
                <div class="bubble-2"></div>
                <div class="bubble-3"></div>
                <div class="bubble-4"></div>
                <div class="bubble-5"></div>
                <div class="bubble-6"></div>
                <div class="bubble-7"></div>
                <div class="bubble-8"></div>
                <div class="bubble-9"></div>
                <div class="bubble-10"></div>
            </div>
        </div>
    </div>
    <main id="tt-pageContent">
        <div class="lazyload subpage-bg-left subpage-bg__position01"
            data-bg="{{ asset('main/images/wrapper-subpage-left01.png') }}">
            <div class="lazyload subpage-bg-right subpage-bg__position01"
                data-bg="{{ asset('main/images/wrapper-subpage-right.png') }}">
                <div class="section-indent">
                    <div class="container container-fluid-lg">
                        <div class="layout01">
                            <div class="layout01__img">
                                <img class="tt-arrow" src="{{ asset('main/images/arrow-img-right.png') }}" alt="">
                                <div class="tt-img-main">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('main/images/layout01-img01.jpg') }}" class="lazyload"
                                        alt="">
                                </div>
                                <div class="tt-img-more left-bottom">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('main/images/layout01-img02.jpg') }}" class="lazyload"
                                        alt="">
                                </div>
                            </div>
                            <div class="layout01__content">
                                <div class="layout01__content-wrapper">
                                    <div class="title-block">
                                        <div class="title-block__label">
                                            [ 25 Years of Serving Excellence ]
                                        </div>
                                        <h4 class="title-block__title">
                                            Your Clean Laundry Is Our Passion
                                        </h4>
                                    </div>
                                    <p>
                                        Our professionals provide you the fastest processed laundry delivered at your
                                        doorstep, hassle free , with guaranteed lowest prices.
                                        <br />
                                        Our aim is too provide you with satisfaction using latest cleaning methods and
                                        upgraded technologies. Book a somed#y laundry and dry cleaning pickup and a next
                                        day delivery.
                                    </p>
                                    <ul class="tt-list01 tt-list01__top">
                                        <li>100% guaranteed happiness</li>
                                        <li>Fast and free pickup and delivery</li>
                                        <li>Easy on the pocket budget</li>
                                        <li>High quality performance</li>
                                        <li>Eco-Friendly product</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="box-value__wrapper row" id="counter-js">
                            <div class="col-sm-6 col-xl-3">
                                <div class="box-value">
                                    <div class="box-value__icon icons-3096677"></div>
                                    <div class="box-value__content">
                                        <div class="box-value__value">
                                            <span class="tt-counter" data-from="0" data-to="50000">0</span>+
                                        </div>
                                        <div class="box-value__label">Shirts Washed </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="box-value">
                                    <div class="box-value__icon icons-2840421"></div>
                                    <div class="box-value__content">
                                        <div class="box-value__value">
                                            <span class="tt-counter" data-from="0" data-to="50">0</span>
                                        </div>
                                        <div class="box-value__label">Washing Machines </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="box-value">
                                    <div class="box-value__icon icons-hanger-with-clothes"></div>
                                    <div class="box-value__content">
                                        <div class="box-value__value">
                                            <span class="tt-counter" data-from="0" data-to="10000">0</span>+
                                        </div>
                                        <div class="box-value__label">Dry Cleaned Items</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="box-value">
                                    <div class="box-value__icon icons-1545560"></div>
                                    <div class="box-value__content">
                                        <div class="box-value__value">
                                            <span class="tt-counter" data-from="0" data-to="100">0</span>%
                                        </div>
                                        <div class="box-value__label">Happy Customers</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
            </div>
        </div>
    </main>
    @include('main.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script async src="{{ asset('main/js/bundle.js') }}"></script>


    <a href="#" class="tt-btn tt-back-to-top" id="js-backtotop">
        <span class="mask">
            <svg version="1.1" x="0px" y="0px" width="24" height="24" viewBox="0 0 24 24"
                style="enable-background:new 0 0 24 24;" xml:space="preserve">
                <g>
                    <polygon fill="currentColor" points="20.9,17.1 12.5,8.6 4.1,17.1 2.9,15.9 12.5,6.4 22.1,15.9 	">
                    </polygon>
                </g>
            </svg>
        </span>
        <div class="button">
            <svg version="1.1" x="0px" y="0px" width="24" height="24" viewBox="0 0 24 24"
                style="enable-background:new 0 0 24 24;" xml:space="preserve">
                <g>
                    <polygon fill="currentColor" points="20.9,17.1 12.5,8.6 4.1,17.1 2.9,15.9 12.5,6.4 22.1,15.9 	">
                    </polygon>
                </g>
            </svg>
        </div>
    </a>
</body>

</html>
