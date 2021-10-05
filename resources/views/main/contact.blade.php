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
        <div class="subtitle-wrapper-img lazyload" data-bg="{{ asset('main/images/subtitle-wrapper01-img.jpg') }}">
            <div class="container container-fluid-xl">
                <div class="tt-breadcrumbs">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
                <h1 class="subtitle__title">Contact Us</h1>
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
        <div class="section-inner">
            <div class="container container-fluid-lg">
                <div class="title-block text-center">
                    <div class="title-block__label">
                        [ Get in Touch With Us ]
                    </div>
                    <h4 class="title-block__title">
                        Contact Information
                    </h4>
                </div>
                <div class="row info03__wrapper">
                    <div class="col-custom-450 col-6 col-md-3">
                        <div class="info03">
                            <i class="info03__icon icons-484169"></i>
                            <h6 class="info03__title">Post Address</h6>
                            <address>
                                Muwailah<br>Sharjah
                            </address>
                        </div>
                    </div>
                    <div class="col-custom-450 col-6 col-md-3">
                        <div class="info03">
                            <i class="info03__icon icons-483947"></i>
                            <h6 class="info03__title">Contact Phone</h6>
                            <address>
                                <a href="tel:1(800)7654321">+971 56 000 0000</a>
                            </address>
                        </div>
                    </div>
                    <div class="col-custom-450 col-6 col-md-3">
                        <div class="info03">
                            <i class="info03__icon icons-1004017"></i>
                            <h6 class="info03__title">E-mail Address</h6>
                            <address>
                                <a href="mailto:info@yourlaundrysite.com">info@ghaslat.ae</a>
                            </address>
                        </div>
                    </div>
                    <div class="col-custom-450 col-6 col-md-3">
                        <div class="info03">
                            <i class="info03__icon icons-59252"></i>
                            <h6 class="info03__title">Opening Hours</h6>
                            <address>
                                Sat-Thu 08:00 AM - 09:00 PM
                            </address>
                            <address>
                                Fri 10:00 AM - 5:00 PM
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tt-posirion-relative">
            <div class="container container-fluid-lg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="map-layout">
                            <div class="title-block">
                                <h4 class="title-block__title">
                                    Get in Touch. <br>We're Here to Help.
                                </h4>
                            </div>
                            <p>
                                We look forward to helping you create and maintain a clean, healthy environment that’s
                                as enjoyable as it is functional.
                            </p>
                            <form action="{{ route('contactus.store') }}" method="POST" id="contact_us_form">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Your name"
                                        style="width: 100%">
                                </div>
                                <div class="row row-align-col  mb-3">
                                    <div class="col-md-6">
                                        <input type="text" name="email" class="form-control" placeholder="E-mail"
                                            style="width: 100%">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone"
                                            style="width: 100%">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <textarea name="message" rows="7" class="form-control"
                                            placeholder="Your message" style="width: 100%"></textarea>
                                    </div>
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
                                    <button type="submit" class="button">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="map" class="map-layout-wrapper lazyload" data-bg="{{ asset('main/images/map-contact.jpg') }}">
                <iframe src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                    class="lazyload" data-expand="-220"
                    data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28855.451941876305!2d55.44444166052593!3d25.30650566331422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5f2197b68011%3A0xf1f71dbd9ce6e77c!2sIndustrial%20AreaMuwailih%20Commercial%20-%20Sharjah!5e0!3m2!1sen!2sae!4v1624453653562!5m2!1sen!2sae"
                    allowfullscreen="" aria-hidden="false"></iframe>



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
