<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Porto - Multipurpose Website Template</title>

    <meta name="keywords" content="WebSite Template" />
    <meta name="description" content="Porto - Multipurpose Website Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(config('common.path_template_website') . 'img/favicon.ico') }}"
        type="image/x-icon" />
    <link rel="apple-touch-icon"
        href="{{ asset(config('common.path_template_website') . 'img/apple-touch-icon.png') }}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_website') . 'vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_website') . 'vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_website') . 'vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_website') . 'vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_website') . 'vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_website') . 'vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset(config('common.path_template_website') . 'vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset(config('common.path_template_website') . 'css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset(config('common.path_template_website') . 'css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset(config('common.path_template_website') . 'css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset(config('common.path_template_website') . 'css/theme-shop.css') }}">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet"
        href="{{ asset(config('common.path_template_website') . 'css/skins/skin-corporate-8.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset(config('common.path_template_website') . 'css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset(config('common.path_template_website') . 'vendor/modernizr/modernizr.min.js') }}"></script>

</head>

<body data-plugin-page-transition>
    <div class="body">
        <header id="header"
            data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 164, 'stickySetTop': '-164px', 'stickyChangeLogo': false}">
            <div class="border-0 header-body">
                <div class="header-top header-top-default border-bottom-0 bg-color-primary">
                    <div class="container">
                        <div class="py-2 header-row">
                            <div class="header-column justify-content-start">
                                <div class="header-row">
                                    <nav class="header-nav-top">
                                        <ul class="nav nav-pills text-uppercase text-2">
                                            <li class="nav-item nav-item-anim-icon">
                                                <a class="nav-link ps-0 text-light opacity-7" href="about-us.html"><i
                                                        class="fas fa-angle-right"></i> About Us</a>
                                            </li>
                                            <li class="nav-item nav-item-anim-icon">
                                                <a class="nav-link text-light opacity-7 pe-0" href="contact-us.html"><i
                                                        class="fas fa-angle-right"></i> Contact Us</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="header-column justify-content-end">
                                <div class="header-row">
                                    <ul
                                        class="header-social-icons social-icons d-none d-sm-block social-icons-clean social-icons-icon-light">
                                        <li class="social-icons-facebook"><a href="http://www.facebook.com/"
                                                target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="social-icons-twitter"><a href="http://www.twitter.com/"
                                                target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li class="social-icons-linkedin"><a href="http://www.linkedin.com/"
                                                target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container header-container">
                    <div class="py-3 header-row">
                        <div class="header-column justify-content-start w-50 order-md-1 d-none d-md-flex">
                            <div class="header-row">
                                <ul class="header-extra-info">
                                    <li class="m-0">
                                        <div class="feature-box feature-box-style-2 align-items-center">
                                            <div class="feature-box-icon">
                                                <i class="far fa-clock text-7 p-relative"></i>
                                            </div>
                                            <div class="feature-box-info">
                                                <p class="pb-0 font-weight-semibold line-height-5 text-2">MON - FRI:
                                                    10:00 - 18:00<br>SAT - SUN: 10:00 - 14:00</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="order-1 header-column justify-content-start justify-content-md-center order-md-2">
                            <div class="header-row">
                                <div class="header-logo">
                                    <a href="index.html">
                                        <img alt="Porto" width="100" height="48"
                                            src="{{ asset(config('common.path_template_website') . 'img/logo-default-slim.png') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="order-2 header-column justify-content-end w-50 order-md-3">
                            <div class="header-row">
                                <ul class="header-extra-info">
                                    <li class="m-0">
                                        <div class="feature-box reverse-allres feature-box-style-2 align-items-center">
                                            <div class="feature-box-icon">
                                                <i class="fab fa-whatsapp text-7 p-relative" style="top: -2px;"></i>
                                            </div>
                                            <div class="feature-box-info">
                                                <p class="pb-0 font-weight-semibold line-height-5 text-2"><a
                                                        href="tel:0123456789"
                                                        class="text-color-default text-color-hover-primary text-decoration-none">(123)
                                                        456-7890</a><br><a href="tel:0123456789"
                                                        class="text-color-default text-color-hover-primary text-decoration-none">(123)
                                                        456-7891</a></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-nav-bar header-nav-bar-top-border bg-light">
                    <div class="container header-container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-row justify-content-end">
                                    <div class="p-0 header-nav">
                                        <div
                                            class="header-nav header-nav-line header-nav-divisor header-nav-spaced justify-content-lg-center">
                                            <div
                                                class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                                <nav class="collapse">
                                                    <ul class="nav nav-pills flex-column flex-lg-row" id="mainNav">
                                                        <li class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle active"
                                                                href="index.html">
                                                                Home
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="index.html">
                                                                        Landing Page
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="index.html#demos">
                                                                        Demos <span class="tip tip-dark">hot</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Classic</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="index-classic.html">Classic -
                                                                                Original</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-classic-color.html">Classic
                                                                                - Color</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-classic-light.html">Classic
                                                                                - Light</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-classic-video.html">Classic
                                                                                - Video</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-classic-video-light.html">Classic
                                                                                - Video - Light</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Corporate</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="index-corporate.html">Corporate -
                                                                                Version 1</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-corporate-2.html">Corporate
                                                                                - Version 2</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-corporate-3.html">Corporate
                                                                                - Version 3</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-corporate-4.html">Corporate
                                                                                - Version 4</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-corporate-5.html">Corporate
                                                                                - Version 5</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-corporate-6.html">Corporate
                                                                                - Version 6</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-corporate-7.html">Corporate
                                                                                - Version 7</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-corporate-8.html">Corporate
                                                                                - Version 8</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-corporate-9.html">Corporate
                                                                                - Version 9</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-corporate-10.html"->Corporate
                                                                                - Version 10</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index.html#demos"->More...</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Portfolio</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="index-portfolio.html">Portfolio -
                                                                                Version 1</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-portfolio-2.html">Portfolio
                                                                                - Version 2</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-portfolio-3.html">Portfolio
                                                                                - Version 3</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-portfolio-4.html">Portfolio
                                                                                - Version 4</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-portfolio-5.html">Portfolio
                                                                                - Version 5</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Blog</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="index-blog.html">Blog - Version
                                                                                1</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-blog-2.html">Blog - Version
                                                                                2</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-blog-3.html">Blog - Version
                                                                                3</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-blog-4.html">Blog - Version
                                                                                4</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-blog-5.html">Blog - Version
                                                                                5</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">One
                                                                        Page</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="index-one-page.html">One Page
                                                                                Original</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown dropdown-mega">
                                                            <a class="dropdown-item dropdown-toggle"
                                                                href="elements.html">
                                                                Elements
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <div class="dropdown-mega-content">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <span
                                                                                    class="dropdown-mega-sub-title">Elements
                                                                                    1</span>
                                                                                <ul class="dropdown-mega-sub-nav">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-accordions.html">Accordions</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-alerts.html">Alerts</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-animations.html">Animations
                                                                                            <span
                                                                                                class="tip tip-dark p-relative bottom-2">hot</span></a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-arrows.html">Arrows</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-badges.html">Badges</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-before-after.html">Before
                                                                                            / After</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-blockquotes.html">Blockquotes</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-buttons.html">Buttons</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-call-to-action.html">Call
                                                                                            to Action</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-cards.html">Cards</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-carousels.html">Carousels</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-cascading-images.html">Cascading
                                                                                            Images</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <span
                                                                                    class="dropdown-mega-sub-title">Elements
                                                                                    2</span>
                                                                                <ul class="dropdown-mega-sub-nav">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-content-rotate.html">Content
                                                                                            Rotate</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-countdowns.html">Countdowns</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-counters.html">Counters</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-dividers.html">Dividers</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-forms.html">Forms</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-headings.html">Headings</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-icons.html">Icons</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-icon-boxes.html">Icon
                                                                                            Boxes</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-image-frames.html">Image
                                                                                            Frames <span
                                                                                                class="tip tip-dark p-relative bottom-2">hot</span></a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-image-gallery.html">Image
                                                                                            Gallery</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-image-hotspots.html">Image
                                                                                            Hotspots</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-lightboxes.html">Lightboxes</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <span
                                                                                    class="dropdown-mega-sub-title">Elements
                                                                                    3</span>
                                                                                <ul class="dropdown-mega-sub-nav">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-lists.html">Lists</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-maps.html">Maps</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-medias.html">Medias</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-modals.html">Modals</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-parallax.html">Parallax</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-particles.html">Particles</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-posts.html">Posts</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-pricing-tables.html">Pricing
                                                                                            Tables</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-process.html">Process</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-progressbars.html">Progress
                                                                                            Bars</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-random-images.html">Random
                                                                                            Images</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-read-more.html">Read
                                                                                            More</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <span
                                                                                    class="dropdown-mega-sub-title">Elements
                                                                                    4</span>
                                                                                <ul class="dropdown-mega-sub-nav">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-sections.html">Sections</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-shape-dividers.html">Shape
                                                                                            Dividers</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-star-ratings.html">Star
                                                                                            Ratings</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-sticky-elements.html">Sticky
                                                                                            Elements</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-tables.html">Tables</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-tabs.html">Tabs</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-testimonials.html">Testimonials</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-toggles.html">Toggles</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-tooltips-popovers.html">Tooltips
                                                                                            & Popovers</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-typography.html">Typography</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-word-rotator.html">Word
                                                                                            Rotator</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="elements-360-image-viewer.html">360º
                                                                                            Image Viewer</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                                Features
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Headers</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-headers-overview.html">Overview</a>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Classic</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-classic.html">Classic</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-classic-language-dropdown.html">Classic
                                                                                        + Language Dropdown</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-classic-big-logo.html">Classic
                                                                                        + Big Logo</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Flat</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-flat.html">Flat</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-flat-top-bar.html">Flat
                                                                                        + Top Bar</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-flat-top-bar-top-borders.html">Flat
                                                                                        + Top Bar + Top Border</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-flat-colored-top-bar.html">Flat
                                                                                        + Colored Top Bar</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-flat-borders.html">Flat
                                                                                        + Borders</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Center</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-center.html">Center</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-center-double-navs.html">Center
                                                                                        + Double Navs</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-center-nav-buttons.html">Center
                                                                                        + Nav + Buttons</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-center-below-slider.html">Center
                                                                                        Below Slider</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Floating</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-floating-bar.html">Floating
                                                                                        Bar</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-floating-icons.html">Floating
                                                                                        Icons</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-headers-below-slider.html">Below
                                                                                Slider</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-headers-full-video.html">Full
                                                                                Video</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-headers-narrow.html">Narrow</a>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Sticky</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-sticky-shrink.html">Sticky
                                                                                        Shrink</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-sticky-scroll-up.html">Sticky
                                                                                        Scroll Up</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-sticky-static.html">Sticky
                                                                                        Static</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-sticky-change-logo.html">Sticky
                                                                                        Change Logo</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-sticky-reveal.html">Sticky
                                                                                        Reveal</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Transparent</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-transparent-light.html">Transparent
                                                                                        Light</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-transparent-dark.html">Transparent
                                                                                        Dark</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-transparent-light-bottom-border.html">Transparent
                                                                                        Light + Bottom Border</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-transparent-dark-bottom-border.html">Transparent
                                                                                        Dark + Bottom Border</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-transparent-bottom-slider.html">Transparent
                                                                                        Bottom Slider</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-transparent-top-bar-extra-buttons.html">Transparent
                                                                                        Top Bar Extra Buttons</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-semi-transparent-light.html">Semi
                                                                                        Transparent Light</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-semi-transparent-dark.html">Semi
                                                                                        Transparent Dark</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-semi-transparent-bottom-slider.html">Semi
                                                                                        Transparent Bottom Slider</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-semi-transparent-top-bar-borders.html">Semi
                                                                                        Transparent + Top Bar +
                                                                                        Borders</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Full Width</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-full-width.html">Full
                                                                                        Width</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-full-width-borders.html">Full
                                                                                        Width + Borders</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-full-width-transparent-light.html">Full
                                                                                        Width Transparent Light</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-full-width-transparent-dark.html">Full
                                                                                        Width Transparent Dark</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-full-width-semi-transparent-light.html">Full
                                                                                        Width Semi Transparent Light</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-full-width-semi-transparent-dark.html">Full
                                                                                        Width Semi Transparent Dark</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-full-width-2-rows-extra-buttons.html">Full
                                                                                        Width 2 Rows + Extra Buttons</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Navbar</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-navbar.html">Navbar</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-navbar-full.html">Navbar
                                                                                        Full</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-navbar-pills.html">Navbar
                                                                                        Pills</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-navbar-divisors.html">Navbar
                                                                                        Divisors</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-navbar-icons-search.html">Nav
                                                                                        Bar + Icons + Search</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Side Header</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Side Header
                                                                                        Left</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-left-dropdown.html">Dropdown</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-left-expand.html">Expand</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-left-columns.html">Columns</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-left-slide.html">Slide</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-left-semi-transparent.html">Semi
                                                                                                Transparent</a></li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-left-dark.html">Dark</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Side Header
                                                                                        Right</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-right-dropdown.html">Dropdown</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-right-expand.html">Expand</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-right-columns.html">Columns</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-right-slide.html">Slide</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-right-semi-transparent.html">Semi
                                                                                                Transparent</a></li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-right-dark.html">Dark</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Side Header
                                                                                        Offcanvas</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-offcanvas-push.html">Push</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-headers-side-header-offcanvas-slide.html">Slide</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-side-header-narrow-bar.html">Side
                                                                                        Header Narrow Bar</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-headers-sign-in-sign-up.html">Sign
                                                                                In / Sign Up</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-headers-logged.html">Logged</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-headers-mini-cart.html">Mini
                                                                                Cart</a></li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Search Styles</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-search-simple-input.html">Simple
                                                                                        Input</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-search-simple-input-reveal.html">Simple
                                                                                        Input Reveal</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-search-dropdown.html">Dropdown</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-search-big-input-hidden.html">Big
                                                                                        Input Hidden</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-search-full-screen.html">Full
                                                                                        Screen</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Extra</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-extra-big-icon.html">Big
                                                                                        Icon</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-extra-big-icons-top.html">Big
                                                                                        Icons Top</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-extra-button.html">Button</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-headers-extra-background-color.html">Background
                                                                                        Color</a></li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Navigations</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Pills</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-pills.html">Pills</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-pills-arrows.html">Pills
                                                                                        + Arrows</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-pills-dark-text.html">Pills
                                                                                        Dark Text</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-pills-color-dropdown.html">Pills
                                                                                        Color Dropdown</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-pills-square.html">Pills
                                                                                        Square</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-pills-rounded.html">Pills
                                                                                        Rounded</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Stripes</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-stripe.html">Stripe</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-stripe-dark-text.html">Stripe
                                                                                        Dark Text</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-stripe-color-dropdown.html">Stripe
                                                                                        Color Dropdown</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Hover Effects</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-hover-top-line.html">Top
                                                                                        Line</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-hover-top-line-animated.html">Top
                                                                                        Line Animated</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-hover-top-line-color-dropdown.html">Top
                                                                                        Line Color Dropdown</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-hover-bottom-line.html">Bottom
                                                                                        Line</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-hover-bottom-line-animated.html">Bottom
                                                                                        Line Animated</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-hover-slide.html">Slide</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-hover-sub-title.html">Sub
                                                                                        Title</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-hover-line-under-text.html">Line
                                                                                        Under Text</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Vertical</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-vertical-dropdown.html">Dropdown</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-vertical-expand.html">Expand</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-vertical-columns.html">Columns</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-vertical-slide.html">Slide</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Hamburguer</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-hamburguer-sidebar.html">Sidebar</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-hamburguer-overlay.html">Overlay</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Dropdown Styles</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-dark.html">Dark</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-light.html">Light</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-colors.html">Colors</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-top-line.html">Top
                                                                                        Line</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-square.html">Square</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-arrow.html">Arrow
                                                                                        Dropdown</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-arrow-center.html">Arrow
                                                                                        Center Dropdown</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-modern-light.html">Modern
                                                                                        Light</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-modern-dark.html">Modern
                                                                                        Dark</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Dropdown Effects</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-effect-no-effect.html">No
                                                                                        Effect</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-effect-opacity.html">Opacity</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-effect-move-to-top.html">Move
                                                                                        To Top</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-effect-move-to-bottom.html">Move
                                                                                        To Bottom</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-effect-move-to-right.html">Move
                                                                                        To Right</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-dropdowns-effect-move-to-left.html">Move
                                                                                        To Left</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Font Styles</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-font-small.html">Small</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-font-medium.html">Medium</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-font-large.html">Large</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-font-alternative.html">Alternative</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Icons</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-icons.html">Icons</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-navigations-icons-float-icons.html">Float
                                                                                        Icons</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-navigations-sub-title.html">Sub
                                                                                Title</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-navigations-divisors.html">Divisors</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-navigations-logo-between.html">Logo
                                                                                Between</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-navigations-one-page.html">One
                                                                                Page Nav</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-navigations-click-to-open.html">Click
                                                                                To Open</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Page
                                                                        Headers</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-page-headers-overview.html">Overview</a>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Classic</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-classic-small.html">Small</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-classic-medium.html">Medium</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-classic-large.html">Large</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Modern</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-modern-small.html">Small</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-modern-medium.html">Medium</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-modern-large.html">Large</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Colors</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-colors-primary.html">Primary</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-colors-secondary.html">Secondary</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-colors-tertiary.html">Tertiary</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-colors-quaternary.html">Quaternary</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-colors-light.html">Light</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-colors-dark.html">Dark</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Title Position</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Left</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-title-position-left-small.html">Small</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-title-position-left-medium.html">Medium</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-title-position-left-large.html">Large</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Right</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-title-position-right-small.html">Small</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-title-position-right-medium.html">Medium</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-title-position-right-large.html">Large</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Center</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-title-position-center-small.html">Small</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-title-position-center-medium.html">Medium</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-title-position-center-large.html">Large</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Background</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-background-fixed.html">Fixed</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-background-parallax.html">Parallax</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-background-video.html">Video</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-background-transparent-header.html">Transparent
                                                                                        Header</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-background-pattern.html">Pattern</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-background-overlay.html">Overlay</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-background-clean.html">Clean
                                                                                        (No Background)</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Extra</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Breadcrumb</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-extra-breadcrumb-outside.html">Outside</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-page-headers-extra-breadcrumb-dark.html">Dark</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-extra-scroll-to-content.html">Scroll
                                                                                        to Content</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-extra-full-width.html">Full
                                                                                        Width</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-extra-product.html">Product</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-page-headers-extra-mouse-hover-split.html">Mouse
                                                                                        Hover Split</a></li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Footers</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-footers-overview.html">Overview</a>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Classic</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-classic.html#footer">Classic</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-classic-advanced.html#footer">Advanced</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-classic-compact.html#footer">Compact</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-classic-simple.html#footer">Simple</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-classic-locations.html#footer">Locations</a>
                                                                                </li>
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Copyright</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-classic-copyright-light.html#footer">Light</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-classic-copyright-dark.html#footer">Dark</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-classic-copyright-social-icons.html#footer">Social
                                                                                                Icons</a></li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Colors</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-classic-colors-primary.html#footer">Primary</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-classic-colors-secondary.html#footer">Secondary</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-classic-colors-tertiary.html#footer">Tertiary</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-classic-colors-quaternary.html#footer			">Quaternary</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-classic-colors-light.html#footer">Light</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-classic-colors-light-simple.html#footer">Light
                                                                                                Simple</a></li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Modern</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-modern.html#footer">Modern</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-modern-font-style-alternative.html#footer">Font
                                                                                        Style Alternative</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-modern-clean.html#footer">Clean</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-modern-useful-links.html#footer">Useful
                                                                                        Links</a></li>
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Background</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-modern-background-image-simple.html#footer">Image
                                                                                                Simple</a></li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-modern-background-image-advanced.html#footer">Image
                                                                                                Advanced</a></li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-modern-background-video-simple.html#footer">Video
                                                                                                Simple</a></li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Call to
                                                                                        Action</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-modern-call-to-action-button.html#footer">Button</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-modern-call-to-action-simple.html#footer">Simple</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Blog</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-blog-classic.html#footer">Blog
                                                                                        Classic</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">eCommerce</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-ecommerce-classic.html#footer">eCommerce
                                                                                        Classic</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Contact Form</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-contact-form-classic.html#footer">Classic</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-contact-form-above-the-map.html#footer">Above
                                                                                        the Map</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-contact-form-center.html#footer">Center</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-contact-form-columns.html#footer">Columns</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Map</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-map-hidden.html#footer">Hidden
                                                                                        Map</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-map-full-width.html#footer">Full
                                                                                        Width</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown-submenu">
                                                                            <a class="dropdown-item"
                                                                                href="#">Extra</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Simple</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-extra-top-social-icons.html#footer">Top
                                                                                                Social Icons</a></li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-extra-big-icons.html#footer">Big
                                                                                                Icons</a></li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-extra-recent-work.html#footer">Recent
                                                                                        Work</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-extra-reveal.html#footeranchor">Reveal</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="feature-footers-extra-instagram.html#footer">Instagram</a>
                                                                                </li>
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Full Width</a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-extra-full-width-light.html#footer">Simple
                                                                                                Light</a></li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="feature-footers-extra-full-width-dark.html#footer">Simple
                                                                                                Dark</a></li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Admin
                                                                        Extension <span
                                                                            class="tip tip-dark">hot</span><em
                                                                            class="not-included">(Not
                                                                            Included)</em></a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-admin-forms-basic.html">Forms
                                                                                Basic</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-admin-forms-advanced.html">Forms
                                                                                Advanced</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-admin-tables-advanced.html">Tables
                                                                                Advanced</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-admin-tables-responsive.html">Tables
                                                                                Responsive</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-admin-tables-editable.html">Tables
                                                                                Editable</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-admin-tables-ajax.html">Tables
                                                                                Ajax</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-admin-charts.html">Charts</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Sliders</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="index-slider-revolution.html">Revolution
                                                                                Slider</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="index-slider-owl.html">Owl
                                                                                Slider</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Layout
                                                                        Options</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-layout-boxed.html">Boxed</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-layout-dark.html">Dark</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-layout-rtl.html">RTL</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Extra</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-cursor-effect.html">Cursor
                                                                                Effect</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-grid-system.html">Grid
                                                                                System</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-reading-progress.html">Reading
                                                                                Progress</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-lazy-load.html">Lazy
                                                                                Load</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-page-loading.html">Page
                                                                                Loading</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-page-transition.html">Page
                                                                                Transition</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-side-panel.html">Side
                                                                                Panel</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-horizontal-scroll.html">Horizontal
                                                                                Scroll</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="feature-locomotive-scroll.html">Locomotive
                                                                                Scroll</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="feature-gdpr.html">GDPR</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                                Pages
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Contact
                                                                        Us</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="contact-us-advanced.php">Contact
                                                                                Us - Advanced</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="contact-us.html">Contact Us -
                                                                                Basic</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="contact-us-recaptcha.html">Contact
                                                                                Us - Recaptcha</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">About
                                                                        Us</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="about-us-advanced.html">About Us
                                                                                - Advanced</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="about-us.html">About Us -
                                                                                Basic</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="about-me.html">About Me</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Layouts</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="page-full-width.html">Full
                                                                                Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-left-sidebar.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-right-sidebar.html">Right
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-left-and-right-sidebars.html">Left
                                                                                and Right Sidebars</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-sticky-sidebar.html">Sticky
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-secondary-navbar.html">Secondary
                                                                                Navbar</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Extra</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="page-404.html">404 Error</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-500.html">500 Error</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-coming-soon.html">Coming
                                                                                Soon</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-maintenance-mode.html">Maintenance
                                                                                Mode</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-search-results.html">Search
                                                                                Results</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="sitemap.html">Sitemap</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Team</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="page-team-advanced.html">Team -
                                                                                Advanced</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-team.html">Team - Basic</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Services</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="page-services.html">Services -
                                                                                Version 1</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-services-2.html">Services -
                                                                                Version 2</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="page-services-3.html">Services -
                                                                                Version 3</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="page-careers.html">Careers</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="page-faq.html">FAQ</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="page-login.html">Login / Register</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="page-user-profile.html">User Profile</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                                Portfolio
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Single
                                                                        Project</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-wide-slider.html">Wide
                                                                                Slider</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-small-slider.html">Small
                                                                                Slider</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-full-width-slider.html">Full
                                                                                Width Slider</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-gallery.html">Gallery</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-carousel.html">Carousel</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-medias.html">Medias</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-full-width-video.html">Full
                                                                                Width Video</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-masonry-images.html">Masonry
                                                                                Images</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-left-sidebar.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-right-sidebar.html">Right
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-left-and-right-sidebars.html">Left
                                                                                and Right Sidebars</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-sticky-sidebar.html">Sticky
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-single-extended.html">Extended</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Grid
                                                                        Layouts</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-grid-1-column.html">1
                                                                                Column</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-grid-2-columns.html">2
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-grid-3-columns.html">3
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-grid-4-columns.html">4
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-grid-5-columns.html">5
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-grid-6-columns.html">6
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-grid-no-margins.html">No
                                                                                Margins</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-grid-full-width.html">Full
                                                                                Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-grid-full-width-no-margins.html">Full
                                                                                Width No Margins</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-grid-1-column-title-and-description.html">Title
                                                                                and Description</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Masonry
                                                                        Layouts</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-masonry-2-columns.html">2
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-masonry-3-columns.html">3
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-masonry-4-columns.html">4
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-masonry-5-columns.html">5
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-masonry-6-columns.html">6
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-masonry-no-margins.html">No
                                                                                Margins</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-masonry-full-width.html">Full
                                                                                Width</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Sidebar
                                                                        Layouts</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-sidebar-right.html">Right
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-sidebar-left-and-right.html">Left
                                                                                and Right Sidebars</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-sidebar-sticky.html">Sticky
                                                                                Sidebar</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Ajax</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-ajax-page.html">Ajax
                                                                                on Page</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-ajax-modal.html">Ajax
                                                                                on Modal</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Extra</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-extra-timeline.html">Timeline</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-extra-lightbox.html">Lightbox</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-extra-load-more.html">Load
                                                                                More</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-extra-infinite-scroll.html">Infinite
                                                                                Scroll</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-extra-lazy-load-masonry.html">Lazy
                                                                                Load Masonry</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-extra-pagination.html">Pagination</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="portfolio-extra-combination-filters.html">Combination
                                                                                Filters</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                                Blog
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Large
                                                                        Image</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-large-image-full-width.html">Full
                                                                                Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-large-image-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-large-image-sidebar-right.html">Right
                                                                                Sidebar </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-large-image-sidebar-left-and-right.html">Left
                                                                                and Right Sidebar</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Medium
                                                                        Image</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-medium-image-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-medium-image-sidebar-right.html">Right
                                                                                Sidebar </a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Grid</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-grid-4-columns.html">4
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-grid-3-columns.html">3
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-grid-full-width.html">Full
                                                                                Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-grid-no-margins.html">No
                                                                                Margins</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-grid-no-margins-full-width.html">No
                                                                                Margins Full Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-grid-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-grid-sidebar-right.html">Right
                                                                                Sidebar </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-grid-sidebar-left-and-right.html">Left
                                                                                and Right Sidebar</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Masonry</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-masonry-4-columns.html">4
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-masonry-3-columns.html">3
                                                                                Columns</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-masonry-full-width.html">Full
                                                                                Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-masonry-no-margins.html">No
                                                                                Margins</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-masonry-no-margins-full-width.html">No
                                                                                Margins Full Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-masonry-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-masonry-sidebar-right.html">Right
                                                                                Sidebar </a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item"
                                                                        href="#">Timeline</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-timeline.html">Full
                                                                                Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-timeline-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-timeline-sidebar-right.html">Right
                                                                                Sidebar </a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Single
                                                                        Post</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post.html">Full Width</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-slider-gallery.html">Slider
                                                                                Gallery</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-image-gallery.html">Image
                                                                                Gallery</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-embedded-video.html">Embedded
                                                                                Video</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-html5-video.html">HTML5
                                                                                Video</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-blockquote.html">Blockquote</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-link.html">Link</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-embedded-audio.html">Embedded
                                                                                Audio</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-small-image.html">Small
                                                                                Image</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-sidebar-right.html">Right
                                                                                Sidebar </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-sidebar-left-and-right.html">Left
                                                                                and Right Sidebar</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Post
                                                                        Comments</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post.html#comments">Default</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-comments-facebook.html#comments">Facebook
                                                                                Comments</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="blog-post-comments-disqus.html#comments">Disqus
                                                                                Comments</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                                Shop
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">Single
                                                                        Product</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-product-full-width.html">Full
                                                                                Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-product-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-product-sidebar-right.html">Right
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-product-sidebar-left-and-right.html">Left
                                                                                and Right Sidebar</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="shop-4-columns.html">4 Columns</a></li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">3
                                                                        Columns</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-3-columns-full-width.html">Full
                                                                                Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-3-columns-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-3-columns-sidebar-right.html">Right
                                                                                Sidebar </a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">2
                                                                        Columns</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-2-columns-full-width.html">Full
                                                                                Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-2-columns-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-2-columns-sidebar-right.html">Right
                                                                                Sidebar </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-2-columns-sidebar-left-and-right.html">Left
                                                                                and Right Sidebar</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="#">1
                                                                        Column</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-1-column-full-width.html">Full
                                                                                Width</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-1-column-sidebar-left.html">Left
                                                                                Sidebar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-1-column-sidebar-right.html">Right
                                                                                Sidebar </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="shop-1-column-sidebar-left-and-right.html">Left
                                                                                and Right Sidebar</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="shop-cart.html">Cart</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="shop-login.html">Login</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="shop-checkout.html">Checkout</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="shop-order-complete.html">Order
                                                                        Complete</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                                {{ __('Authentication') }}
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('mobile.login') }}">
                                                                        {{ __('Login User') }}
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('member.login') }}">
                                                                        {{ __('Login Admin') }}
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse"
                                                data-bs-target=".header-nav-main nav">
                                                <i class="fas fa-bars"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div role="main" class="main">
            <section class="m-0 border-0 section bg-color-light-scale-2 position-relative">
                <div class="top-0 left-0 position-absolute w-50pct w-lg-auto d-none d-xl-block">
                    <img src="{{ asset(config('common.path_template_website') . 'img/slides/slide-corporate-8-1-1.jpg') }}"
                        class="w-100 appear-animation" data-appear-animation="fadeInRightShorter"
                        data-appear-animation-delay="1000" data-appear-animation-duration="1s" alt="">
                </div>
                <div class="top-0 right-0 position-absolute w-50pct w-lg-auto d-none d-xl-block">
                    <img src="{{ asset(config('common.path_template_website') . 'img/slides/slide-corporate-8-1-2.jpg') }}"
                        class="w-100 appear-animation" data-appear-animation="fadeInLeftShorter"
                        data-appear-animation-delay="1000" data-appear-animation-duration="1s" alt="">
                </div>
                <div class="container py-5 my-5">
                    <div class="py-3 row justify-content-center">
                        <div class="text-center col-lg-7">
                            <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                <h3 class="px-4 mb-2 position-relative text-color-dark text-5 line-height-5 font-weight-semibold ls-0 appear-animation"
                                    data-appear-animation="fadeInDownShorterPlus"
                                    data-plugin-options="{'minWindowWidth': 0}">
                                    <span class="position-absolute right-100pct top-50pct transform3dy-n50 opacity-7">
                                        <img src="{{ asset(config('common.path_template_website') . 'img/slides/slide-title-border-light.png') }}"
                                            class="w-auto appear-animation"
                                            data-appear-animation="fadeInRightShorter"
                                            data-appear-animation-delay="250"
                                            data-plugin-options="{'minWindowWidth': 0}" alt="" />
                                    </span>
                                    PORTO TEMPLATE
                                    <span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-7">
                                        <img src="{{ asset(config('common.path_template_website') . 'img/slides/slide-title-border-light.png') }}"
                                            class="w-auto appear-animation"
                                            data-appear-animation="fadeInLeftShorter"
                                            data-appear-animation-delay="250"
                                            data-plugin-options="{'minWindowWidth': 0}" alt="" />
                                    </span>
                                </h3>
                                <h1 class="mb-2 text-color-dark font-weight-extra-bold text-10 text-md-12-13 line-height-1 appear-animation"
                                    data-appear-animation="blurIn" data-appear-animation-delay="500"
                                    data-plugin-options="{'minWindowWidth': 0}">INCREDIBLE DESIGNS</h1>
                                <p class="mb-4 text-center text-4-5 text-color-dark font-weight-light opacity-7"
                                    data-plugin-animated-letters
                                    data-plugin-options="{'startDelay': 1000, 'minWindowWidth': 0, 'animationSpeed': 30}">
                                    Porto is a huge success in the one of world's largest MarketPlace.</p>
                                <a href="{{ route('member.register') }}"
                                    class="py-3 mt-2 btn btn-primary btn-modern font-weight-bold text-2 btn-px-5 appear-animation"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800"
                                    data-plugin-options="{'minWindowWidth': 0}">REGISTER NOW <i
                                        class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="home-intro home-intro-quaternary" id="home-intro">
                <div class="container">

                    <div class="text-center row">
                        <div class="col">
                            <p class="mb-0">
                                The fastest way to grow your business with the leader in <span
                                    class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-light text-color-light font-weight-semibold text-5">Technology</span>
                                <span>Check out our options and features included.</span>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="mb-5 row align-items-center">
                    <div class="col-lg-7 pe-5 appear-animation" data-appear-animation="fadeInRightShorter">
                        <h2 class="mb-4 font-weight-normal text-6"><strong class="font-weight-extra-bold">Who
                            </strong>We Are</h2>
                        <p class="mb-4 lead pe-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
                            blandit massa enikklam id valorem ipsum dolor sit amet, consectetur adipiscinLorem ipsum
                            dolor sit amet, consectetur adipiscing elit.</p>
                        <p class="mb-4">Phasellus blandit massa enim. Nullam id varius elit. blandit massa enim d
                            varius blandit massa enimariusi d varius elit. blandit massa enimariud varius elit. blandit
                            massa enimariusisi ariusius.</p>
                        <a class="px-4 py-2 mb-1 btn btn-light text-uppercase text-primary text-1"
                            href="#"><strong>VIEW MORE</strong><i
                                class="fas fa-chevron-right text-2 ps-2"></i></a>
                    </div>
                    <div class="col-lg-5">
                        <div class="mt-5 row mt-lg-0">
                            <div class="mx-auto text-center col-md-8 col-lg-6 text-lg-start">
                                <img class="m-3 my-0 img-fluid mt-lg-5 pt-lg-5 appear-animation"
                                    src="{{ asset(config('common.path_template_website') . 'img/office/our-office-4.jpg') }}"
                                    alt="Office" data-appear-animation="expandIn"
                                    data-appear-animation-delay="200">
                            </div>
                            <div class="mx-auto text-center col-md-8 col-lg-6 ps-lg-0 text-lg-start">
                                <img class="m-3 img-fluid appear-animation"
                                    src="{{ asset(config('common.path_template_website') . 'img/office/our-office-5.jpg') }}"
                                    alt="Office" data-appear-animation="expandIn"
                                    data-appear-animation-delay="400">
                                <img class="m-3 img-fluid appear-animation"
                                    src="{{ asset(config('common.path_template_website') . 'img/office/our-office-7.jpg') }}"
                                    alt="Office" data-appear-animation="expandIn"
                                    data-appear-animation-delay="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section bg-color-grey-scale-1 section-height-3 section-no-border appear-animation"
                data-appear-animation="fadeIn">
                <div class="container">
                    <div class="row">
                        <div class="text-center col appear-animation" data-appear-animation="fadeInUpShorter"
                            data-appear-animation-delay="200">
                            <h2 class="mb-5 font-weight-normal text-6">Our <strong
                                    class="font-weight-extra-bold">Services</strong></h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-4 col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter"
                            data-appear-animation-delay="400">
                            <div class="feature-box feature-box-secondary feature-box-style-4">
                                <div class="feature-box-icon">
                                    <i class="icon-user-following icons text-color-primary"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="mb-2 font-weight-bold">Customer Support</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum
                                        pellentesque imperdiet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-lg-4 appear-animation" data-appear-animation="fadeIn"
                            data-appear-animation-delay="200">
                            <div class="feature-box feature-box-secondary feature-box-style-4">
                                <div class="feature-box-icon">
                                    <i class="icon-layers icons text-color-primary"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="mb-2 font-weight-bold">Sliders</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum
                                        pellentesque imperdiet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter"
                            data-appear-animation-delay="400">
                            <div class="feature-box feature-box-secondary feature-box-style-4">
                                <div class="feature-box-icon">
                                    <i class="icon-calculator icons text-color-primary"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="mb-2 font-weight-bold">HTML5</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum
                                        pellentesque imperdiet.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-lg-3">
                        <div class="mb-4 col-lg-4 mb-lg-0 appear-animation"
                            data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
                            <div class="feature-box feature-box-secondary feature-box-style-4">
                                <div class="feature-box-icon">
                                    <i class="icon-star icons text-color-primary"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="mb-2 font-weight-bold">Icons</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum
                                        pellentesque imperdiet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-lg-4 mb-lg-0 appear-animation" data-appear-animation="fadeIn"
                            data-appear-animation-delay="200">
                            <div class="feature-box feature-box-secondary feature-box-style-4">
                                <div class="feature-box-icon">
                                    <i class="icon-drop icons text-color-primary"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="mb-2 font-weight-bold">Colors</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum
                                        pellentesque imperdiet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter"
                            data-appear-animation-delay="400">
                            <div class="feature-box feature-box-secondary feature-box-style-4">
                                <div class="feature-box-icon">
                                    <i class="icon-mouse icons text-color-primary"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="mb-2 font-weight-bold">Buttons</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum
                                        pellentesque imperdiet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <div class="pt-4 mt-5 row">
                    <div class="text-center col-lg-12 appear-animation" data-appear-animation="fadeIn"
                        data-appear-animation-delay="400">
                        <h2 class="mb-5 font-weight-normal text-6">Our <strong
                                class="font-weight-extra-bold">Prices</strong></h2>
                    </div>
                </div>

                <div class="pb-5 mt-3 mb-5 pricing-table">
                    <div class="col-md-6 col-lg-3">
                        <div class="plan">
                            <div class="plan-header">
                                <h3>Enterprise</h3>
                            </div>
                            <div class="plan-price">
                                <span class="price"><span class="price-unit">$</span>59</span>
                                <label class="price-label">PER MONTH</label>
                            </div>
                            <div class="plan-features">
                                <ul>
                                    <li>10GB Disk Space</li>
                                    <li>100GB Monthly Bandwith</li>
                                    <li>20 Email Accounts</li>
                                    <li>Unlimited Subdomains</li>
                                </ul>
                            </div>
                            <div class="plan-footer">
                                <a href="#"
                                    class="px-4 py-2 btn btn-dark btn-modern btn-outline rounded-0">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="plan">
                            <div class="plan-header">
                                <h3>Professional</h3>
                            </div>
                            <div class="plan-price">
                                <span class="price"><span class="price-unit">$</span>29</span>
                                <label class="price-label">PER MONTH</label>
                            </div>
                            <div class="plan-features">
                                <ul>
                                    <li>5GB Disk Space</li>
                                    <li>50GB Monthly Bandwith</li>
                                    <li>10 Email Accounts</li>
                                    <li>Unlimited Subdomains</li>
                                </ul>
                            </div>
                            <div class="plan-footer">
                                <a href="#"
                                    class="px-4 py-2 btn btn-dark btn-modern btn-outline rounded-0">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="plan plan-featured">
                            <div class="plan-header bg-primary">
                                <h3>Standard</h3>
                            </div>
                            <div class="plan-price">
                                <span class="price"><span class="price-unit">$</span>17</span>
                                <label class="price-label">PER MONTH</label>
                            </div>
                            <div class="plan-features">
                                <ul>
                                    <li>3GB Disk Space</li>
                                    <li>25GB Monthly Bandwith</li>
                                    <li>5 Email Accounts</li>
                                    <li>Unlimited Subdomains</li>
                                </ul>
                            </div>
                            <div class="plan-footer">
                                <a href="#" class="px-4 py-2 btn btn-primary btn-modern rounded-0">Choose
                                    Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="plan">
                            <div class="plan-header">
                                <h3>Basic</h3>
                            </div>
                            <div class="plan-price">
                                <span class="price"><span class="price-unit">$</span>9</span>
                                <label class="price-label">PER MONTH</label>
                            </div>
                            <div class="plan-features">
                                <ul>
                                    <li>1GB Disk Space</li>
                                    <li>10GB Monthly Bandwith</li>
                                    <li>2 Email Accounts</li>
                                    <li>Unlimited Subdomains</li>
                                </ul>
                            </div>
                            <div class="plan-footer">
                                <a href="#"
                                    class="px-4 py-2 btn btn-dark btn-modern btn-outline rounded-0">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <section
                class="my-5 section bg-color-grey-scale-1 section-height-3 section-no-border section-center appear-animation"
                data-appear-animation="fadeIn">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 appear-animation" data-appear-animation="fadeInUpShorter"
                            data-appear-animation-delay="200">
                            <div class="mb-0 owl-carousel owl-theme nav-bottom rounded-nav"
                                data-plugin-options="{'items': 1, 'loop': false, 'autoHeight': true}">
                                <div>
                                    <div class="col">
                                        <div
                                            class="mb-0 testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark">
                                            <div class="testimonial-author">
                                                <img src="{{ asset(config('common.path_template_website') . 'img/clients/client-1.jpg') }}"
                                                    class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <blockquote>
                                                <p class="mb-0 text-color-dark">Your time is limited, so don’t waste
                                                    it living someone else’s life. Don’t be trapped by dogma - which is
                                                    living with the results of other people’s thinking. Don’t let the
                                                    noise of others’ opinions drown out your own inner voice.</p>
                                            </blockquote>
                                            <div class="testimonial-author">
                                                <p><strong class="opacity-9 font-weight-extra-bold text-2">-John Doe.
                                                        Okler</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col">
                                        <div
                                            class="mb-0 testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark">
                                            <div class="testimonial-author">
                                                <img src="{{ asset(config('common.path_template_website') . 'img/clients/client-1.jpg') }}"
                                                    class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <blockquote>
                                                <p class="mb-0 text-color-dark">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis
                                                    at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit
                                                    amet, consectetur adipiscing elit. Sociis natoque penatibus et
                                                    magnis dis parturient montes, nascetur ridiculus mus. Fusce ante
                                                    tellus, convallis non consectetur sed, pharetra nec ex.</p>
                                            </blockquote>
                                            <div class="testimonial-author">
                                                <p><strong class="opacity-9 font-weight-extra-bold text-2">-John
                                                        Smith. Okler</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col">
                                        <div
                                            class="mb-0 testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark">
                                            <div class="testimonial-author">
                                                <img src="{{ asset(config('common.path_template_website') . 'img/clients/client-1.jpg') }}"
                                                    class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <blockquote>
                                                <p class="mb-0 text-color-dark">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis
                                                    at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit
                                                    amet, consectetur adipiscing elit.</p>
                                            </blockquote>
                                            <div class="testimonial-author">
                                                <p><strong class="opacity-9 font-weight-extra-bold text-2">-John
                                                        Smith. Okler</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <div class="mt-4 row">
                    <div class="text-center col-lg-12 appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="400">
                        <h2 class="mt-3 mb-5 font-weight-normal text-6">Latest <strong
                                class="font-weight-extra-bold">Posts</strong></h2>
                    </div>
                </div>
                <div class="pb-4 mb-5 row recent-posts appear-animation" data-appear-animation="fadeInRightShorter"
                    data-appear-animation-delay="200">
                    <div class="mb-4 col-md-6 col-lg-3 mb-lg-0">
                        <article>
                            <div class="row">
                                <div class="col-auto pe-0">
                                    <div class="date">
                                        <span class="day text-color-dark font-weight-extra-bold">15</span>
                                        <span
                                            class="month bg-color-primary font-weight-semibold text-color-light text-1">JAN</span>
                                    </div>
                                </div>
                                <div class="col ps-1">
                                    <h4 class="line-height-3 text-4"><a href="blog-post.html"
                                            class="text-dark">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                    <p class="mb-1 line-height-5 pe-3">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Sed eget risus porta.</p>
                                    <a class="px-3 py-2 mt-2 mb-1 btn btn-light text-uppercase text-primary text-1"
                                        href="#"><strong>VIEW MORE</strong><i
                                            class="fas fa-chevron-right text-2 ps-2"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="mb-4 col-md-6 col-lg-3 mb-lg-0">
                        <article>
                            <div class="row">
                                <div class="col-auto pe-0">
                                    <div class="date">
                                        <span class="day text-color-dark font-weight-extra-bold">14</span>
                                        <span
                                            class="month bg-color-primary font-weight-semibold text-color-light text-1">JAN</span>
                                    </div>
                                </div>
                                <div class="col ps-1">
                                    <h4 class="line-height-3 text-4"><a href="blog-post.html"
                                            class="text-dark">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                    <p class="mb-1 line-height-5 pe-3">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Sed eget risus porta.</p>
                                    <a class="px-3 py-2 mt-2 mb-1 btn btn-light text-uppercase text-primary text-1"
                                        href="#"><strong>VIEW MORE</strong><i
                                            class="fas fa-chevron-right text-2 ps-2"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="mb-4 col-md-6 col-lg-3 mb-md-0">
                        <article>
                            <div class="row">
                                <div class="col-auto pe-0">
                                    <div class="date">
                                        <span class="day text-color-dark font-weight-extra-bold">13</span>
                                        <span
                                            class="month bg-color-primary font-weight-semibold text-color-light text-1">JAN</span>
                                    </div>
                                </div>
                                <div class="col ps-1">
                                    <h4 class="line-height-3 text-4"><a href="blog-post.html"
                                            class="text-dark">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                    <p class="mb-1 line-height-5 pe-3">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Sed eget risus porta.</p>
                                    <a class="px-3 py-2 mt-2 mb-1 btn btn-light text-uppercase text-primary text-1"
                                        href="#"><strong>VIEW MORE</strong><i
                                            class="fas fa-chevron-right text-2 ps-2"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <article>
                            <div class="row">
                                <div class="col-auto pe-0">
                                    <div class="date">
                                        <span class="day text-color-dark font-weight-extra-bold">12</span>
                                        <span
                                            class="month bg-color-primary font-weight-semibold text-color-light text-1">JAN</span>
                                    </div>
                                </div>
                                <div class="col ps-1">
                                    <h4 class="line-height-3 text-4"><a href="blog-post.html"
                                            class="text-dark">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                    <p class="mb-1 line-height-5 pe-3">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Sed eget risus porta.</p>
                                    <a class="px-3 py-2 mt-2 mb-1 btn btn-light text-uppercase text-primary text-1"
                                        href="#"><strong>VIEW MORE</strong><i
                                            class="fas fa-chevron-right text-2 ps-2"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="my-5 row">
                    <div class="my-3 col">

                        <div class="my-3 text-center row">
                            <div class="owl-carousel owl-theme carousel-center-active-item"
                                data-plugin-options="{'responsive': {'0': {'items': 1}, '476': {'items': 1}, '768': {'items': 5}, '992': {'items': 7}, '1200': {'items': 7}}, 'autoplay': true, 'autoplayTimeout': 3000, 'dots': false}">
                                <div>
                                    <img class="img-fluid"
                                        src="{{ asset(config('common.path_template_website') . 'img/logos/logo-1.png') }}"
                                        alt="">
                                </div>
                                <div>
                                    <img class="img-fluid"
                                        src="{{ asset(config('common.path_template_website') . 'img/logos/logo-2.png') }}"
                                        alt="">
                                </div>
                                <div>
                                    <img class="img-fluid"
                                        src="{{ asset(config('common.path_template_website') . 'img/logos/logo-3.png') }}"
                                        alt="">
                                </div>
                                <div>
                                    <img class="img-fluid"
                                        src="{{ asset(config('common.path_template_website') . 'img/logos/logo-4.png') }}"
                                        alt="">
                                </div>
                                <div>
                                    <img class="img-fluid"
                                        src="{{ asset(config('common.path_template_website') . 'img/logos/logo-5.png') }}"
                                        alt="">
                                </div>
                                <div>
                                    <img class="img-fluid"
                                        src="{{ asset(config('common.path_template_website') . 'img/logos/logo-6.png') }}"
                                        alt="">
                                </div>
                                <div>
                                    <img class="img-fluid"
                                        src="{{ asset(config('common.path_template_website') . 'img/logos/logo-4.png') }}"
                                        alt="">
                                </div>
                                <div>
                                    <img class="img-fluid"
                                        src="{{ asset(config('common.path_template_website') . 'img/logos/logo-2.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <footer id="footer">
            <div class="container">
                <div class="footer-ribbon">
                    <span>Get in Touch</span>
                </div>
                <div class="py-5 my-4 row">
                    <div class="mb-5 col-md-6 col-lg-4 mb-lg-0">
                        <h5 class="mb-3 text-3">ABOUT US</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna semper
                            scelerisque.</p>
                        <p class="mb-0">Praesent venenatis turpis vitae purus semper, eget sagittis velit venenatis
                            ptent taciti sociosqu ad litora...</p>
                        <p class="mb-0"><a href="#"
                                class="btn-flat btn-xs text-color-light p-relative top-5"><strong
                                    class="text-2">VIEW MORE</strong><i
                                    class="fas fa-angle-right p-relative top-1 ps-2"></i></a></p>
                    </div>
                    <div class="mb-5 col-md-6 col-lg-3 mb-lg-0">
                        <h5 class="mb-3 text-3">RECENT POSTS</h5>
                        <ul class="mb-0 list-unstyled">
                            <li class="pb-1 mb-3 d-flex">
                                <a href="#">
                                    <img class="me-3 rounded-circle"
                                        src="{{ asset(config('common.path_template_website') . 'img/office/our-office-4-square.jpg') }}"
                                        alt="" style="max-width: 70px;">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <p class="mb-1 text-3 text-color-light opacity-8">Lorem ipsum dolor sit,
                                            consectetur adipiscing elit.</p>
                                        <p class="mb-0 text-2">12:53 AM Dec 19th</p>
                                    </a>
                                </div>
                            </li>
                            <li class="d-flex">
                                <a href="#">
                                    <img class="me-3 rounded-circle"
                                        src="{{ asset(config('common.path_template_website') . 'img/office/our-office-5-square.jpg') }}"
                                        alt="" style="max-width: 70px;">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <p class="mb-1 text-3 text-color-light opacity-8">Lorem ipsum dolor sit,
                                            consectetur adipiscing elit.</p>
                                        <p class="mb-0 text-2">12:53 AM Dec 19th</p>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-5 col-md-6 col-lg-3 mb-md-0">
                        <h5 class="mb-3 text-3">RECENT COMMENTS</h5>
                        <ul class="mb-0 list-unstyled">
                            <li class="pb-1 mb-3">
                                <a href="#">
                                    <p class="mb-1 text-3 text-color-light opacity-8"><i
                                            class="fas fa-angle-right text-color-primary"></i><strong
                                            class="ms-2">John Doe</strong> commented on <strong
                                            class="text-color-primary">lorem ipsum dolor sit amet.</strong></p>
                                    <p class="mb-0 text-2">12:55 AM Dec 19th</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p class="mb-1 text-3 text-color-light opacity-8"><i
                                            class="fas fa-angle-right text-color-primary"></i><strong
                                            class="ms-2">John Doe</strong> commented on <strong
                                            class="text-color-primary">lorem ipsum dolor sit amet.</strong></p>
                                    <p class="mb-0 text-2">12:55 AM Dec 19th</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <h5 class="mb-3 text-3">TAGS</h5>
                        <p>
                            <a href="#"><span
                                    class="py-2 mb-2 badge badge-dark bg-color-black badge-sm me-1">DESIGN</span></a>
                            <a href="#"><span
                                    class="py-2 mb-2 badge badge-dark bg-color-black badge-sm me-1">CODE</span></a>
                            <a href="#"><span
                                    class="py-2 mb-2 badge badge-dark bg-color-black badge-sm me-1">LIFESTYLE</span></a>
                            <a href="#"><span
                                    class="py-2 mb-2 badge badge-dark bg-color-black badge-sm me-1">BRANDS</span></a>
                            <a href="#"><span
                                    class="py-2 mb-2 badge badge-dark bg-color-black badge-sm me-1">PROMO</span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container py-2">
                    <div class="py-4 row">
                        <div
                            class="mb-2 col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-lg-0">
                            <a href="index.html" class="logo pe-0 pe-lg-3">
                                <img alt="Porto Website Template"
                                    src="{{ asset(config('common.path_template_website') . 'img/logo-footer.png') }}"
                                    class="opacity-5" height="32">
                            </a>
                        </div>
                        <div
                            class="mb-4 col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-lg-0">
                            <p>© Copyright 2023. All Rights Reserved.</p>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                            <nav id="sub-menu">
                                <ul>
                                    <li><i class="fas fa-angle-right"></i><a href="page-faq.html"
                                            class="ms-1 text-decoration-none"> FAQ's</a></li>
                                    <li><i class="fas fa-angle-right"></i><a href="sitemap.html"
                                            class="ms-1 text-decoration-none"> Sitemap</a></li>
                                    <li><i class="fas fa-angle-right"></i><a href="contact-us.html"
                                            class="ms-1 text-decoration-none"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Vendor -->
    <script src="{{ asset(config('common.path_template_website') . 'vendor/plugins/js/plugins.min.js') }}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset(config('common.path_template_website') . 'js/theme.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset(config('common.path_template_website') . 'js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset(config('common.path_template_website') . 'js/theme.init.js') }}"></script>

</body>

</html>
