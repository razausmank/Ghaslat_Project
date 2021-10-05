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

    <link rel="stylesheet" href="{{ asset('main/separate-include/blog/style-blog.css') }} ">
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
                        <li><a href="{{ route('main.home') }}">home</a></li>
                        <li>FAQ</li>
                    </ul>
                </div>
                <h1 class="subtitle__title">FAQ</h1>
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
        <div class="lazyload subpage-bg-left subpage-bg__position07"
            data-bg="{{ asset('main/images/wrapper-subpage-left07.png') }}">
            <div class="lazyload subpage-bg-right subpage-bg__position07"
                data-bg="{{ asset('main/images/wrapper-subpage-right07.png') }}">
                <div class="section-indent">
                    <div class="container container-fluid-lg">
                        <div class="title-block text-center">
                            <div class="title-block__label">
                                [ Frequently Asked Questions ]
                            </div>
                            <h4 class="title-block__title">
                                Reliable Answers to Our Most<br class="d-none d-sm-block"> Common Questions
                            </h4>
                            <div class="title-block__text tt-limit-width03">
                                We can save you money on soap, water, heating and electricity. So you can enjoy even
                                more of the things you love. Our prices are simple and affordable.
                            </div>
                        </div>
                        <div class="row-indent-top">
                            <h6 class="tt-subtitle">Your First Order!</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="js-accordeon accordeon-01">
                                        <div class="tt-item tt-item__open">
                                            <div class="tt-item__title">Do you wash my clothes separately or with others
                                                laundry?</div>
                                            <div class="tt-item__content">
                                                No, each order is wash, cleaned and processed separately. We value you
                                                health and hygiene.
                                            </div>
                                        </div>
                                        <div class="tt-item">
                                            <div class="tt-item__title"> How often will you pickup my laundry?</div>
                                            <div class="tt-item__content">
                                                As many times you place a pickup, we will be at your service. You can
                                                also book a scheduled pickup for every week or in a month also.
                                            </div>
                                        </div>
                                        <div class="tt-item">
                                            <div class="tt-item__title">How do you accept payments?</div>
                                            <div class="tt-item__content">
                                                We accept cards and cash on delivery also.
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="divider-xs d-block d-md-none"></div>
                                <div class="col-md-6">
                                    <div class="js-accordeon accordeon-01">
                                        <div class="tt-item tt-item__open">
                                            <div class="tt-item__title">Do you have any monthly subscriptions?</div>
                                            <div class="tt-item__content">
                                                Yes, we have monthly subscriptions and even weekly subscriptions also.
                                                The charges may vary.
                                            </div>
                                        </div>
                                        <div class="tt-item">
                                            <div class="tt-item__title">Who would be responsible for and damage or items
                                                lost?</div>
                                            <div class="tt-item__content">
                                                Firstly we work our best to avoid damages or lost properties.yet, in any
                                                such case our services will take responsibility and will take care of
                                                it.
                                            </div>
                                        </div>
                                        <div class="tt-item">
                                            <div class="tt-item__title">Do you do color and white laundry together?
                                            </div>
                                            <div class="tt-item__content">
                                                No, we wash specific laundry as per their needs. And we keep in
                                                preference if customers have any points regarding their things.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-inner">
            <div class="container container-fluid-lg">
                <div class="title-block text-center">
                    <h4 class="title-block__title">
                        Ask Your Question
                    </h4>
                    <div class="title-block__text tt-limit-width">
                        We look forward to helping you create and maintain a clean, healthy environment that’s as
                        enjoyable as it is functional.
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="col-md-9 col-lg-8">
                        <form action="{{ route('contactus.store') }}"
                            class="form-default form-default__top text-center" method="POST" id="contact_us_form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Your name">
                            </div>
                            <div class="row row-align-col">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="message" rows="4" class="form-control"
                                    placeholder="Your question"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="contact_us_checkbox" name="checkbox">
                                    <label for="contact_us_checkbox">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        I accept the privacy and terms.
                                    </label>
                                </div>
                            </div>
                            <div class="tt-btn tt-btn__wide">
                                <span class="mask">Send Question</span>
                                <button type="submit" class="button">Send Question</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
    @include('main.footer')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script async src="{{ asset('main/js/bundle.js') }}"></script>
    <script src="{{ asset('main/js/contactus.js') }}"></script>


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
