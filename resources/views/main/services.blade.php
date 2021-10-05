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
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('main/separate-include/blog/style-blog.css') }}">
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
        <div class="subtitle-wrapper-img lazyload" data-bg="{{ asset('main/images/subtitle-wrapper01-img.jpg') }}">
            <div class="container container-fluid-xl">
                <div class="tt-breadcrumbs">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Services</li>
                    </ul>
                </div>
                <h1 class="subtitle__title">Services</h1>
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
        <div class="lazyload subpage-bg-left subpage-bg__position02"
            data-bg="{{ asset('main/images/wrapper-subpage-left03.png') }}">
            <div class="lazyload subpage-bg-right subpage-bg__position02"
                data-bg="{{ asset('main/images/wrapper-subpage-right03.png') }}">
                <div class="section-indent">
                    <div class="container container-fluid-lg">
                        <div class="title-block text-center">
                            <div class="title-block__label">
                                [ Our Services ]
                            </div>
                            <h4 class="title-block__title">
                                Dry Cleaning & Laundry, <br>Free Delivery
                            </h4>
                        </div>
                        <div class="row img-box__wrapper">
                            <div class="col-custom-450 col-6 col-md-4">
                                <div class="img-box">
                                    <div class="img-box__img">
                                        <a href="services-item.html"><img
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                class="lazyload" data-src="{{ asset('main/images/img07.jpg') }}"
                                                alt=""></a>
                                        <div class="img-box__label icons-technology"></div>
                                    </div>
                                    <a href="services-item.html" class="img-box__title">Laundry Services</a>
                                    <p>Get your sorted, stain treated, washed , dried and neatly folded laundry
                                        delivered at your doorstep within 24 hours.</p>

                                </div>
                            </div>
                            <div class="col-custom-450 col-6 col-md-4">
                                <div class="img-box">
                                    <div class="img-box__img">
                                        <a href="services-item.html"><img
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                class="lazyload" data-src="{{ asset('main/images/img08.jpg') }}"
                                                alt=""></a>
                                        <div class="img-box__label icons-hanger-with-clothes"></div>
                                    </div>
                                    <a href="services-item.html" class="img-box__title">Dry Cleaning Services</a>
                                    <p>
                                        Your individual cleaning items are washed or dry cleaned as per the requirement,
                                        ironed and delivered on hangers.
                                    </p>

                                </div>
                            </div>
                            <div class="col-custom-450 col-6 col-md-4">
                                <div class="img-box">
                                    <div class="img-box__img">
                                        <a href="services-item.html"><img
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                class="lazyload" data-src="{{ asset('main/images/img09.jpg') }}"
                                                alt=""></a>
                                        <div class="img-box__label icons-pilesos"></div>
                                    </div>
                                    <a href="services-item.html" class="img-box__title">Carpet Cleaning</a>
                                    <p>
                                        We deep clean your carpets and make them lint free and fragrant for a clean and
                                        happy aura of your home.
                                    </p>

                                </div>
                            </div>

                        </div>
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                    </div>
                </div>

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
