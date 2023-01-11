@extends('frontend.master.index')

@section('content')
<div class="slider-container overlay">
            <!-- Slider Image -->
            <div id="mainSlider" class="nivoSlider slider-image">
                <img src="frontend/img/slider/1.jpg" alt="" title="#htmlcaption1" />
                <img src="frontend/img/slider/2.jpg" alt="" title="#htmlcaption2" />
                <img src="frontend/img/slider/3.jpg" alt="" title="#htmlcaption3" />
            </div>
            <!-- Slider Caption 1 -->
            <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
                <div class="display-table">
                    <div class="display-tablecell">
                        <div class="container ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slide1-text">
                                        <div class="middle-text">
                                            <div class="title-1 wow fadeUp" data-wow-duration="1.2s"
                                                data-wow-delay="0.1s">
                                                <h3>WANT TO BUY OR INVEST IN PROPERTIES ?</h3>
                                            </div>
                                            <div class="title-2 wow fadeUp" data-wow-duration="1.3s"
                                                data-wow-delay="0.2s">
                                                <h1>PRE-SELLING <span>FARM LOTS</span> AT IT'S LOWEST POSSIBLE PRICE</h1>
                                            </div>
                                            <div class="desc wow fadeUp" data-wow-duration="1.4s" data-wow-delay="0.4s">
                                                <p>Lorem consectetur adipiscing elit, sed do eiusmod tempor dolor sit
                                                    amet<br> contetur adipiscing elit, sed do eiusmod tempor incididunt
                                                </p>
                                            </div>
                                            <div class="contact-us wow fadeUp" data-wow-duration="1.5s"
                                                data-wow-delay=".5s">
                                                <a href="contact.html">CONTACT US</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="htmlcaption2" class="nivo-html-caption slider-caption-1">
                <div class="display-table">
                    <div class="display-tablecell">
                        <div class="container ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slide1-text">
                                        <div class="middle-text">
                                            <div class="title-1 wow fadeUp" data-wow-duration="1.2s"
                                                data-wow-delay="0.1s">
                                                <h3>WANT TO BUY OR RENT HOME ?</h3>
                                            </div>
                                            <div class="title-2 wow fadeUp" data-wow-duration="1.3s"
                                                data-wow-delay="0.2s">
                                                <h1>IT'S SUPER EASY TO ACQUIRE A <span>PROPERTY</span></h1>
                                            </div>
                                            <div class="desc wow fadeUp" data-wow-duration="1.4s" data-wow-delay="0.4s">
                                                <p>Lorem consectetur adipiscing elit, sed do eiusmod tempor dolor sit
                                                    amet<br> contetur adipiscing elit, sed do eiusmod tempor incididunt
                                                </p>
                                            </div>
                                            <div class="contact-us wow fadeUp" data-wow-duration="1.5s"
                                                data-wow-delay=".5s">
                                                <a href="contact.html">CONTACT US</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="htmlcaption3" class="nivo-html-caption slider-caption-1">
                <div class="display-table">
                    <div class="display-tablecell">
                        <div class="container ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slide1-text">
                                        <div class="middle-text">
                                            <div class="title-1 wow fadeUp" data-wow-duration="1.2s"
                                                data-wow-delay="0.1s">
                                                <h3>WANT TO BUY OR RENT HOME ?</h3>
                                            </div>
                                            <div class="title-2 wow fadeUp" data-wow-duration="1.3s"
                                                data-wow-delay="0.2s">
                                                <h1>LET OUR <span>LAND</span> BE YOUR LEGACY</h1>
                                            </div>
                                            <div class="desc wow fadeUp" data-wow-duration="1.4s" data-wow-delay="0.4s">
                                                <p>Lorem consectetur adipiscing elit, sed do eiusmod tempor dolor sit
                                                    amet<br> contetur adipiscing elit, sed do eiusmod tempor incididunt
                                                </p>
                                            </div>
                                            <div class="contact-us wow fadeUp" data-wow-duration="1.5s"
                                                data-wow-delay=".5s">
                                                <a href="contact.html">CONTACT US</a>
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
        <!--slider section end-->

        <!--Find home area start-->
        <div class="find-home">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="find-home-title">
                            <h3>INQUIRE STATUS OF YOUR PLAN</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="#" class="form-row gutter-30">
                            <div class="col-lg-9 col-md-8 col-12">
                                <div class="find-home-item mb-40">
                                    <input type="text" id="subscriber_no" name="subscriber_no" placeholder="Subscriber No." >
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-12">
                                <div class="find-home-item">
                                    <button type="button" onclick="checkstatus()">Check Status </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Find home area end-->


        <!--Feature property section start-->
        <div class="property-area fadeInUp wow ptb-130" data-wow-delay="0.2s">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="feature-property-title">
                            <h3>NEWLY ADDED PROPERTY</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="property-tab-menu">
                            <ul class="nav justify-content-md-end" id="property-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="property-sale-tab" data-toggle="tab" href="#sale"
                                        role="tab" aria-controls="sale" aria-selected="true">PROPERTY FOR SALE</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="property-rent-tab" data-toggle="tab" href="#rent" role="tab"
                                        aria-controls="rent" aria-selected="false">PROPERTY TO RENT</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="property-tab-content">
                            <div role="tabpanel" class="tab-pane active" id="sale" aria-labelledby="property-sale-tab">
                                <div class="property-list owl-carousel">
                                    <div class="item">
                                        <div class="single-property">
                                            <div class="property-img">
                                                <a href="single-properties.html">
                                                    <img src="frontend/img/property/7.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="property-desc">
                                                <div class="property-desc-top">
                                                    <h6><a href="single-properties.html">Grand Villas Farm Phase 1</a></h6>
                                                    <h4 class="price">OPEN</h4>
                                                    <div class="property-location">
                                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 568 E 1st Ave,
                                                            Miami</p>
                                                    </div>
                                                </div>
                                                <div class="property-desc-bottom">
                                                    <div class="property-bottom-list">
                                                        <ul>
                                                            <li>
                                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                                <span>550 sqft</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                                <span>4</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                                <span>3</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="single-property">
                                            <div class="property-img">
                                                <a href="single-properties.html">
                                                    <img src="frontend/img/property/8.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="property-desc">
                                                <div class="property-desc-top">
                                                    <h6><a href="single-properties.html">Grand Villas Farm Phase 2</a></h6>
                                                    <h4 class="price">OPEN</h4>
                                                    <div class="property-location">
                                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 568 E 1st Ave,
                                                            Miami</p>
                                                    </div>
                                                </div>
                                                <div class="property-desc-bottom">
                                                    <div class="property-bottom-list">
                                                        <ul>
                                                            <li>
                                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                                <span>550 sqft</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                                <span>4</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                                <span>3</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="single-property">
                                            <div class="property-img">
                                                <a href="single-properties.html">
                                                    <img src="frontend/img/property/9.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="property-desc">
                                                <div class="property-desc-top">
                                                    <h6><a href="single-properties.html">Grand Villas Farm Phase 3</a></h6>
                                                    <h4 class="price">OPEN</h4>
                                                    <div class="property-location">
                                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 12 1st Ave, New
                                                            Yourk</p>
                                                    </div>
                                                </div>
                                                <div class="property-desc-bottom">
                                                    <div class="property-bottom-list">
                                                        <ul>
                                                            <li>
                                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                                <span>550 sqft</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                                <span>4</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                                <span>3</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="single-property">
                                            <div class="property-img">
                                                <a href="single-properties.html">
                                                    <img src="frontend/img/property/7.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="property-desc">
                                                <div class="property-desc-top">
                                                    <h6><a href="single-properties.html">Grand Villas Farm Phase 4</a></h6>
                                                    <h4 class="price">OPEN</h4>
                                                    <div class="property-location">
                                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 568 E 1st Ave,
                                                            Miami</p>
                                                    </div>
                                                </div>
                                                <div class="property-desc-bottom">
                                                    <div class="property-bottom-list">
                                                        <ul>
                                                            <li>
                                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                                <span>550 sqft</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                                <span>4</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                                <span>3</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="single-property">
                                            <div class="property-img">
                                                <a href="single-properties.html">
                                                    <img src="frontend/img/property/8.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="property-desc">
                                                <div class="property-desc-top">
                                                    <h6><a href="single-properties.html">Grand Villas Farm East</a></h6>
                                                    <h4 class="price">OPEN</h4>
                                                    <div class="property-location">
                                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 668 L 2nd Ave,
                                                            Boston</p>
                                                    </div>
                                                </div>
                                                <div class="property-desc-bottom">
                                                    <div class="property-bottom-list">
                                                        <ul>
                                                            <li>
                                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                                <span>550 sqft</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                                <span>4</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                                <span>3</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="single-property">
                                            <div class="property-img">
                                                <a href="single-properties.html">
                                                    <img src="frontend/img/property/9.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="property-desc">
                                                <div class="property-desc-top">
                                                    <h6><a href="single-properties.html">Grand Villas Farm East 2</a></h6>
                                                    <h4 class="price">OPEN</h4>
                                                    <div class="property-location">
                                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 568 E 1st Ave,
                                                            Miami</p>
                                                    </div>
                                                </div>
                                                <div class="property-desc-bottom">
                                                    <div class="property-bottom-list">
                                                        <ul>
                                                            <li>
                                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                                <span>550 sqft</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                                <span>4</span>
                                                            </li>
                                                            <li>
                                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                                <span>3</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Feature property section end-->

        <!--Welcome Haven section-->
        <div class="welcome-haven bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 fadeInLeft wow welcome-pd" data-wow-delay="0.2s">
                        <div class="welcome-title">
                            <h3 class="title-1">WELCOME TO <span>BRILLIANT FIVE J</span></h3>
                            <h4 class="title-2">WE ALWAYS PROVIDE PRIORITY TO OUR CLIENTS</h4>
                        </div>
                        <div class="welcome-content">
                            <p> <span>Brilliant Five J</span> is a construction and development corporation that are selling farm-lots at Rizal. We provide quality and efficient service to our clients
                        to help them with investing and acquiring farm land properties at the lowest possible price.</p>
                        </div>
                        <div class="welcome-services">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="w-single-services">
                                        <div class="services-img">
                                            <img src="frontend/img/welcome/icon-1.png" alt="">
                                        </div>
                                        <div class="services-desc">
                                            <h6>Low Cost</h6>
                                            <p>Low cost provides yur best for <br> elit, sed do eiusmod tempe</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="w-single-services">
                                        <div class="services-img">
                                            <img src="frontend/img/welcome/icon-2.png" alt="">
                                        </div>
                                        <div class="services-desc">
                                            <h6>Good Marketing </h6>
                                            <p>Low cost provides yur best for <br> elit, sed do eiusmod tempe</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="w-single-services">
                                        <div class="services-img">
                                            <img src="frontend/img/welcome/icon-3.png" alt="">
                                        </div>
                                        <div class="services-desc">
                                            <h6>Easy to Find</h6>
                                            <p>Low cost provides yur best for <br> elit, sed do eiusmod tempe</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="w-single-services">
                                        <div class="services-img">
                                            <img src="frontend/img/welcome/icon-4.png" alt="">
                                        </div>
                                        <div class="services-desc">
                                            <h6>Reliable</h6>
                                            <p>Low cost provides yur best for <br> elit, sed do eiusmod tempe</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="welcome-haven-img fadeInRight wow" data-wow-delay="0.2s">
                            <img src="frontend/img/welcome/1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Welcome Haven section end-->

        <!--Download apps section start-->
        <div class="download-apps overlay-blue">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="download-apps-desc wow fadeInDown" data-wow-delay="0.1s">
                            <div class="download-apps-title">
                                <h3 class="title-1">DOWNLOAD OUR APPS</h3>
                                <h3 class="title-2">AND GET NOTIFICATION FOR NEW PROPERTIES</h3>
                            </div>
                            <div class="download-apps-bottom">
                                <p>Haven the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur
                                    apiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd
                                    minimam</p>
                                <a href="#">DOWNLOAD</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="download-apps-caption-img f-right wow fadeUp" data-wow-duration="1.2s"
                            data-wow-delay="0.2s">
                            <img src="frontend/img/common/download-caption.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Download apps section end-->

        <!--Services section start-->
        <div class="services-section ptb-130 bg-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center">
                            <h3>OUR SERVICES</h3>
                            <p>Haven the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minimam,
                                quis nostrud exercitation.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="single-services wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                            <div class="single-services-img">
                                <img src="frontend/img/service/1.png" alt="">
                            </div>
                            <div class="single-services-desc">
                                <h5>Buy Property</h5>
                                <p>Haven the best theme for elit, sed do eiumod tempor dolor sit amet, conse ctetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="single-services wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">
                            <div class="single-services-img">
                                <img src="frontend/img/service/2.png" alt="">
                            </div>
                            <div class="single-services-desc">
                                <h5>Sale Property</h5>
                                <p>Haven the best theme for elit, sed do eiumod tempor dolor sit amet, conse ctetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="single-services wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                            <div class="single-services-img">
                                <img src="frontend/img/service/3.png" alt="">
                            </div>
                            <div class="single-services-desc">
                                <h5>rent Property</h5>
                                <p>Haven the best theme for elit, sed do eiumod tempor dolor sit amet, conse ctetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Services section end-->

        <!--Feature property section-->
        <div class="feature-property ptb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center">
                            <h3>FEATURED PROPERTY</h3>
                            <p>Haven the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minimam,
                                quis nostrud exercitation.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-property wow fadeInUp mb-40" data-wow-delay="0.2s" data-wow-duration="1s">
                            <span>FOR SALE</span>
                            <div class="property-img">
                                <a href="single-properties.html">
                                    <img src="frontend/img/property/1.jpg" alt="">
                                </a>
                            </div>
                            <div class="property-desc">
                                <div class="property-desc-top">
                                    <h6><a href="single-properties.html">Marvel de Villa</a></h6>
                                    <h4 class="price">$48,354</h4>
                                    <div class="property-location">
                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 450 E 1st Ave, New Jersey</p>
                                    </div>
                                </div>
                                <div class="property-desc-bottom">
                                    <div class="property-bottom-list">
                                        <ul>
                                            <li>
                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                <span>550 sqft</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                <span>4</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                <span>3</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-property mb-40 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.1s">
                            <div class="property-img">
                                <a href="single-properties.html">
                                    <img src="frontend/img/property/2.jpg" alt="">
                                </a>
                            </div>
                            <div class="property-desc">
                                <div class="property-desc-top">
                                    <h6><a href="single-properties.html">Friuli-Venezia Giulia</a></h6>
                                    <h4 class="price">$52,354</h4>
                                    <div class="property-location">
                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 568 E 1st Ave, Miami</p>
                                    </div>
                                </div>
                                <div class="property-desc-bottom">
                                    <div class="property-bottom-list">
                                        <ul>
                                            <li>
                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                <span>550 sqft</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                <span>4</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                <span>3</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-property mb-40 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.2s">
                            <span class="bg-blue">FOR Rent</span>
                            <div class="property-img">
                                <a href="single-properties.html">
                                    <img src="frontend/img/property/3.jpg" alt="">
                                </a>
                            </div>
                            <div class="property-desc">
                                <div class="property-desc-top">
                                    <h6><a href="single-properties.html">Friuli-Venezia Giulia</a></h6>
                                    <h4 class="price">$52,354</h4>
                                    <div class="property-location">
                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 568 E 1st Ave, Miami</p>
                                    </div>
                                </div>
                                <div class="property-desc-bottom">
                                    <div class="property-bottom-list">
                                        <ul>
                                            <li>
                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                <span>550 sqft</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                <span>4</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                <span>3</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-property wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.3s">
                            <div class="property-img">
                                <a href="single-properties.html">
                                    <img src="frontend/img/property/4.jpg" alt="">
                                </a>
                            </div>
                            <div class="property-desc">
                                <div class="property-desc-top">
                                    <h6><a href="single-properties.html">Ruposi Bangla Cottage</a></h6>
                                    <h4 class="price">$52,354</h4>
                                    <div class="property-location">
                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 215 L AH Rod, California</p>
                                    </div>
                                </div>
                                <div class="property-desc-bottom">
                                    <div class="property-bottom-list">
                                        <ul>
                                            <li>
                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                <span>550 sqft</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                <span>4</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                <span>3</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-property wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1.4s">
                            <span>FOR SALE</span>
                            <div class="property-img">
                                <a href="single-properties.html">
                                    <img src="frontend/img/property/5.jpg" alt="">
                                </a>
                            </div>
                            <div class="property-desc">
                                <div class="property-desc-top">
                                    <h6><a href="single-properties.html">MayaKanon de Villa</a></h6>
                                    <h4 class="price">$32,344</h4>
                                    <div class="property-location">
                                        <p><img src="frontend/img/property/icon-5.png" alt=""> 12 EA 1st Ave, Washington</p>
                                    </div>
                                </div>
                                <div class="property-desc-bottom">
                                    <div class="property-bottom-list">
                                        <ul>
                                            <li>
                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                <span>550 sqft</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                <span>4</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                <span>3</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-property wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1.5s">
                            <div class="property-img">
                                <a href="single-properties.html">
                                    <img src="frontend/img/property/6.jpg" alt="">
                                </a>
                            </div>
                            <div class="property-desc">
                                <div class="property-desc-top">
                                    <h6><a href="single-properties.html">Azorex de South Villa</a></h6>
                                    <h4 class="price">$65,354</h4>
                                    <div class="property-location">
                                        <p><img src="frontend/img/property/icon-5.png" alt="">668 L 2nd Ave, Boston</p>
                                    </div>
                                </div>
                                <div class="property-desc-bottom">
                                    <div class="property-bottom-list">
                                        <ul>
                                            <li>
                                                <img src="frontend/img/property/icon-1.png" alt="">
                                                <span>550 sqft</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-3.png" alt="">
                                                <span>4</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-4.png" alt="">
                                                <span>3</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Feature property section end-->

        <!--Awesome Feature section-->
        <div class="awesome-feature bg-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center">
                            <h3>AWESOME FEATURES</h3>
                            <p>Haven the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minimam,
                                quis nostrud exercitation.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="awesome-feature-desc">
                            <div class="awesome-feature-img">
                                <div class="awesome-feature-img-border">
                                    <div class="awesome-feature-img-inner">
                                        <img src="frontend/img/awesome/feature.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="awesome-feature-list">
                                <div class="col-4 left">
                                    <div class="single-awesome-feature one mb-87 wow fadeInLeft" data-wow-delay="0.2s"
                                        data-wow-duration="1.2s">
                                        <div class="s-awesome-feature-head">
                                            <div class="s-awesome-feature-title">
                                                <h6>Fully Furnished</h6>
                                            </div>
                                            <div class="s-awesome-feature-text">
                                                <p>Paint cost provides ar best for <br> elit, sed do eiusmod tempe</p>
                                            </div>
                                        </div>
                                        <div class="s-awesome-feature-icon">
                                            <i class="icofont icofont-tools-alt-2"></i>
                                        </div>
                                    </div>
                                    <div class="single-awesome-feature two mb-87 wow fadeInLeft" data-wow-delay="0.3s"
                                        data-wow-duration="1.3s">
                                        <div class="s-awesome-feature-head">
                                            <div class="s-awesome-feature-title">
                                                <h6>Royal Touch Paint</h6>
                                            </div>
                                            <div class="s-awesome-feature-text">
                                                <p>Paint cost provides ar best for <br> elit, sed do eiusmod tempe</p>
                                            </div>
                                        </div>
                                        <div class="s-awesome-feature-icon">
                                            <i class="icofont icofont-paint-brush"></i>
                                        </div>
                                    </div>
                                    <div class="single-awesome-feature three wow fadeInLeft" data-wow-delay="0.3s"
                                        data-wow-duration="1.4s">
                                        <div class="s-awesome-feature-head">
                                            <div class="s-awesome-feature-title">
                                                <h6>Non Stop Security</h6>
                                            </div>
                                            <div class="s-awesome-feature-text">
                                                <p>Paint cost provides ar best for <br> elit, sed do eiusmod tempe</p>
                                            </div>
                                        </div>
                                        <div class="s-awesome-feature-icon">
                                            <i class="zmdi zmdi-bug"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 right">
                                    <div class="single-awesome-feature four mb-87 wow fadeInRight" data-wow-delay="0.2s"
                                        data-wow-duration="1.2s">
                                        <div class="s-awesome-feature-icon">
                                            <i class="icofont icofont-calculations"></i>
                                        </div>
                                        <div class="s-awesome-feature-head">
                                            <div class="s-awesome-feature-title">
                                                <h6>Latest Interior Design</h6>
                                            </div>
                                            <div class="s-awesome-feature-text">
                                                <p>Paint cost provides ar best for <br> elit, sed do eiusmod tempe</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-awesome-feature five mb-87 wow fadeInRight" data-wow-delay="0.3s"
                                        data-wow-duration="1.3s">
                                        <div class="s-awesome-feature-icon">
                                            <i class="fa fa-leaf"></i>
                                        </div>
                                        <div class="s-awesome-feature-head">
                                            <div class="s-awesome-feature-title">
                                                <h6>Living Inside a Nature</h6>
                                            </div>
                                            <div class="s-awesome-feature-text">
                                                <p>Paint cost provides ar best for <br> elit, sed do eiusmod tempe</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-awesome-feature six wow fadeInRight" data-wow-delay="0.2s"
                                        data-wow-duration="1.4s">
                                        <div class="s-awesome-feature-icon">
                                            <i class="icofont icofont-fix-tools"></i>
                                        </div>
                                        <div class="s-awesome-feature-head">
                                            <div class="s-awesome-feature-title">
                                                <h6>Luxurious Fittings</h6>
                                            </div>
                                            <div class="s-awesome-feature-text">
                                                <p>Paint cost provides ar best for <br> elit, sed do eiusmod tempe</p>
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
        <!--Awesome Feature section end-->

        <!--Fun fact area start-->
        <div class="fun-fact overlay-blue">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="singe-fun-fact  f-left">
                            <div class="fun-head">
                                <div class="fun-icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="fun-count">
                                    <h3 class="counter">
                                        999
                                    </h3>
                                </div>
                            </div>
                            <div class="fun-text">
                                <p>Complete Project</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="singe-fun-fact middle">
                            <div class="fun-head">
                                <div class="fun-icon">
                                    <i class="fa fa-key"></i>
                                </div>
                                <div class="fun-count">
                                    <h3 class="counter">
                                        999
                                    </h3>
                                </div>
                            </div>
                            <div class="fun-text">
                                <p>Property Sold</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="singe-fun-fact text-center middle-2">
                            <div class="fun-head">
                                <div class="fun-icon">
                                    <i class="zmdi zmdi-mood"></i>
                                </div>
                                <div class="fun-count">
                                    <h3 class="counter">
                                        450
                                    </h3>
                                </div>
                            </div>
                            <div class="fun-text">
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="singe-fun-fact f-right">
                            <div class="fun-head">
                                <div class="fun-icon">
                                    <i class="fa fa-trophy"></i>
                                </div>
                                <div class="fun-count">
                                    <h3 class="counter">
                                        120
                                    </h3>
                                </div>
                            </div>
                            <div class="fun-text">
                                <p>Awards Win</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Fun fact area end-->

        <!--Team area start-->
        <div class="team-area bg-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center">
                            <h3>OUR AGENTS</h3>
                            <p>Haven the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minimam,
                                quis nostrud exercitation.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-team wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <div class="team-img">
                                <a href="agent-details.html">
                                    <img src="frontend/img/team/1.jpg" alt="">
                                </a>
                            </div>
                            <div class="team-desc">
                                <div class="team-member-title">
                                    <h6><a href="agent-details.html">John Reyes</a></h6>
                                    <p>Real Estate Agent</p>
                                </div>
                                <div class="team-member-social">
                                    <a href="#"><i class="zmdi zmdi-phone-in-talk"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-team wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            <div class="team-img">
                                <a href="agent-details.html">
                                    <img src="frontend/img/team/2.jpg" alt="">
                                </a>
                            </div>
                            <div class="team-desc">
                                <div class="team-member-title">
                                    <h6>
                                        <a href="agent-details.html">Mark Cabuyao</a>
                                    </h6>
                                    <p>Real Estate Agent</p>
                                </div>
                                <div class="team-member-social">
                                    <a href="#"><i class="zmdi zmdi-phone-in-talk"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-team wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.4s">
                            <div class="team-img">
                                <a href="agent-details.html">
                                    <img src="frontend/img/team/3.jpg" alt="">
                                </a>
                            </div>
                            <div class="team-desc">
                                <div class="team-member-title">
                                    <h6>
                                        <a href="agent-details.html">Ronnie Cruz</a>
                                    </h6>
                                    <p>Real Estate Agent</p>
                                </div>
                                <div class="team-member-social">
                                    <a href="#"><i class="zmdi zmdi-phone-in-talk"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-team wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1.5s">
                            <div class="team-img">
                                <a href="agent-details.html">
                                    <img src="frontend/img/team/4.jpg" alt="">
                                </a>
                            </div>
                            <div class="team-desc">
                                <div class="team-member-title">
                                    <h6>
                                        <a href="agent-details.html">Steven Portez</a>
                                    </h6>
                                    <p>Real Estate Agent</p>
                                </div>
                                <div class="team-member-social">
                                    <a href="#"><i class="zmdi zmdi-phone-in-talk"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Team area end-->

        <!--Latest blog start-->
        <div class="latest-blog ptb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center">
                            <h3>LATEST FROM THE BLOG</h3>
                            <p>Haven the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minimam,
                                quis nostrud exercitation.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-blog wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1s">
                            <div class="blog-thubmnail">
                                <a href="article.html">
                                    <img src="frontend/img/blog/1.jpg" alt="">
                                </a>
                                <div class="blog-post">
                                    <span class="post-day">
                                        20
                                    </span>
                                    <span class="post-month">
                                        March
                                    </span>
                                </div>
                            </div>
                            <div class="blog-desc">
                                <h6><a href="article.html">New Duplex Villa design with Latest Altra Concept</a></h6>
                                <p class="post-content">Haven the best theme for elit, sed do eiusmod tempor dolor sit
                                    amet, conse ctetur adipiscing elit, sed do eismod tempor incididunt </p>
                                <div class="bolg-continue">
                                    <a href="article.html">Continure Reading ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-blog wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.2s">
                            <div class="blog-thubmnail">
                                <a href="article.html">
                                    <img src="frontend/img/blog/2.jpg" alt="">
                                </a>
                                <div class="blog-post">
                                    <span class="post-day">
                                        20
                                    </span>
                                    <span class="post-month">
                                        March
                                    </span>
                                </div>
                            </div>
                            <div class="blog-desc">
                                <h6><a href="article.html">New Duplex Villa design with Latest Altra Concept</a></h6>
                                <p class="post-content">Haven the best theme for elit, sed do eiusmod tempor dolor sit
                                    amet, conse ctetur adipiscing elit, sed do eismod tempor incididunt </p>
                                <div class="bolg-continue">
                                    <a href="article.html">Continure Reading ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-blog wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.3s">
                            <div class="blog-thubmnail">
                                <a href="article.html">
                                    <img src="frontend/img/blog/3.jpg" alt="">
                                </a>
                                <div class="blog-post">
                                    <span class="post-day">
                                        20
                                    </span>
                                    <span class="post-month">
                                        March
                                    </span>
                                </div>
                            </div>
                            <div class="blog-desc">
                                <h6><a href="article.html">New Duplex Villa design with Latest Altra Concept</a></h6>
                                <p class="post-content">Haven the best theme for elit, sed do eiusmod tempor dolor sit
                                    amet, conse ctetur adipiscing elit, sed do eismod tempor incididunt </p>
                                <div class="bolg-continue">
                                    <a href="article.html">Continure Reading ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Latest blog end-->

        <!--Happy client section start-->
        <div class="happy-client wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center">
                            <h3>HERE IS THE REVIEW OF OUR HAPPY CLIENTS</h3>
                            <p>Haven the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minimam,
                                quis nostrud exercitation.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="happy-client-list owl-carousel">
                            <div class="item">
                                <div class="client-reveiw">
                                    <div class="review-quote">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="review-desc">
                                        <p> <span>HAVEN</span> is the best theme for elit sed do od tempor dolor sit
                                            amet conse tetur adipiscingit</p>
                                    </div>
                                    <div class="happy-client-name">
                                        <h6>James Bond, <span>CEO</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-reveiw">
                                    <div class="review-quote">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="review-desc">
                                        <p> <span>HAVEN</span> is the best theme for elit sed do od tempor dolor sit
                                            amet conse tetur adipiscingit</p>
                                    </div>
                                    <div class="happy-client-name">
                                        <h6>Nirob Khan, <span>COO</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-reveiw">
                                    <div class="review-quote">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="review-desc">
                                        <p> <span>HAVEN</span> is the best theme for elit sed do od tempor dolor sit
                                            amet conse tetur adipiscingit</p>
                                    </div>
                                    <div class="happy-client-name">
                                        <h6>Lara Craft, <span>CEO</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-reveiw">
                                    <div class="review-quote">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="review-desc">
                                        <p> <span>HAVEN</span> is the best theme for elit sed do od tempor dolor sit
                                            amet conse tetur adipiscingit</p>
                                    </div>
                                    <div class="happy-client-name">
                                        <h6>Zenefer Lopez, <span>CEO</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-reveiw">
                                    <div class="review-quote">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="review-desc">
                                        <p> <span>HAVEN</span> is the best theme for elit sed do od tempor dolor sit
                                            amet conse tetur adipiscingit</p>
                                    </div>
                                    <div class="happy-client-name">
                                        <h6>James Bond, <span>CEO</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-reveiw">
                                    <div class="review-quote">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="review-desc">
                                        <p> <span>HAVEN</span> is the best theme for elit sed do od tempor dolor sit
                                            amet conse tetur adipiscingit</p>
                                    </div>
                                    <div class="happy-client-name">
                                        <h6>Nirob Khan, <span>COO</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-reveiw">
                                    <div class="review-quote">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="review-desc">
                                        <p> <span>HAVEN</span> is the best theme for elit sed do od tempor dolor sit
                                            amet conse tetur adipiscingit</p>
                                    </div>
                                    <div class="happy-client-name">
                                        <h6>Lara Craft, <span>CEO</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-reveiw">
                                    <div class="review-quote">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="review-desc">
                                        <p> <span>HAVEN</span> is the best theme for elit sed do od tempor dolor sit
                                            amet conse tetur adipiscingit</p>
                                    </div>
                                    <div class="happy-client-name">
                                        <h6>Zenefer Lopez, <span>CEO</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Happy client section end-->

        <!--Brand section start-->
        <div class="brand-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand-list owl-carousel">
                            <div class="single-brand">
                                <a href="#"><img src="frontend/img/brand/1.png" alt=""></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="frontend/img/brand/2.png" alt=""></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="frontend/img/brand/3.png" alt=""></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="frontend/img/brand/4.png" alt=""></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="frontend/img/brand/5.png" alt=""></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="frontend/img/brand/1.png" alt=""></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="frontend/img/brand/2.png" alt=""></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="frontend/img/brand/3.png" alt=""></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="frontend/img/brand/4.png" alt=""></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="frontend/img/brand/5.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
