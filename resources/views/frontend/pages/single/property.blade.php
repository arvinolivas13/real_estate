@extends('frontend.master.index')

@section('content')
<!--Breadcrumbs start-->
<div class="breadcrumbs overlay-black">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumbs-title text-center">
                        <h1>PROPERTIES</h1>
                    </div>
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="index.html">Home /</a></li>
                            <li>properties Sidebar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumbs end-->

<!--Feature property section-->
<div class="feature-property properties-list pt-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 ">
                <div class="single-property-details">
                    <div class="single-property-area">
                        <div class="single-property-tab-content tab-content">
                            <div class="tab-pane fade show active" id="image-1" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="frontend/img/property/property-tab-large-1.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-2" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="frontend/img/property/property-tab-large-2.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-3" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="frontend/img/property/property-tab-large-3.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-4" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="frontend/img/property/property-tab-large-4.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-5" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="frontend/img/property/property-tab-large-5.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-6" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="frontend/img/property/property-tab-large-2.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-7" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="frontend/img/property/property-tab-large-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="nav single-property-tab-slider owl-carousel indicator-style2 mt-20">
                            <div class="nav-item"><a class="nav-link" href="#image-1" id="image-1-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-1"
                                    aria-selected="true"><img src="frontend/img/property/property-tab-small-1.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-2" id="image-2-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-2"
                                    aria-selected="true"><img src="frontend/img/property/property-tab-small-2.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-3" id="image-3-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-3"
                                    aria-selected="true"><img src="frontend/img/property/property-tab-small-3.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-4" id="image-4-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-4"
                                    aria-selected="true"><img src="frontend/img/property/property-tab-small-4.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-5" id="image-5-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-5"
                                    aria-selected="true"><img src="frontend/img/property/property-tab-small-5.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-6" id="image-6-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-6"
                                    aria-selected="true"><img src="frontend/img/property/property-tab-small-2.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-7" id="image-7-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-7"
                                    aria-selected="true"><img src="frontend/img/property/property-tab-small-3.jpg"
                                        alt="" /></a></div>
                        </div>
                    </div>
                    <div class="single-property-description">
                        <div class="desc-title">
                            <h5>Description</h5>
                        </div>
                        <div class="description-inner">
                            <p class="text-1"> <span>Haven</span> ipsum dolor sit amet, consectetur adipiscing
                                elit, sed do eiusmod tempor incididunt ut labore et lore magna iqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                dolo</p>
                            <p class="text-2">haven is the Best should be the consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore lore gna iqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor nt
                                ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu</p>
                            <p class="text-3">
                                Haven is the Best should be the consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore lore gna iqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex eacm
                            </p>
                        </div>
                    </div>
                    <div class="condition-amenities">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="property-condition">
                                    <div class="condtion-title">
                                        <h5>Condition</h5>
                                    </div>
                                    <div class="property-condition-list">
                                        <ul>
                                            <li>
                                                <img src="frontend/img/property/icon-6.png" alt="">
                                                <span>Area 450 sqft</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-7.png" alt="">
                                                <span>Bedroom 5</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-8.png" alt="">
                                                <span>Bedroom 5</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-9.png" alt="">
                                                <span>Garage 2</span>
                                            </li>
                                            <li>
                                                <img src="frontend/img/property/icon-10.png" alt="">
                                                <span>Kitchaen 2</span>
                                            </li>
                                            <li>
                                                <span class="price">
                                                    $52,350
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="property-location">
                                            <p><img src="frontend/img/property/icon-5.png" alt=""> 568 E 1st Ave, Miami
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="amenities">
                                    <div class="amenities-title">
                                        <h5>Amenities</h5>
                                    </div>
                                    <div class="amenities-list">
                                        <ul>
                                            <li><i class="fa fa-check-square-o"></i> <span>Air
                                                    Conditioning</span></li>
                                            <li><i class="fa fa-check-square-o"></i> <span>Bedding</span></li>
                                            <li><i class="fa fa-check-square-o"></i> <span>Balcony</span></li>
                                            <li><i class="fa fa-check-square-o"></i> <span>Cable TV</span></li>
                                            <li><i class="fa fa-check-square-o"></i> <span>Internet</span></li>
                                            <li><i class="fa fa-check-square-o"></i> <span>Parking</span></li>
                                            <li><i class="fa fa-check-square-o"></i> <span>lift</span></li>
                                            <li><i class="fa fa-check-square-o"></i> <span>Pool</span></li>
                                            <li><i class="fa fa-check-square-o"></i> <span>Dishwasher</span>
                                            </li>
                                            <li><i class="fa fa-check-square-o"></i> <span>Toaster</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="planning">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-12">
                                <div class="plan-title">
                                    <h5>Floor Plan</h5>
                                </div>
                                <div class="plan-map">
                                    <img src="frontend/img/property/plan-map.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-12">
                                <div class="plan-title">
                                    <h5>Video Presentation</h5>
                                </div>
                                <div class="vimeo-video">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item"
                                            src="https://player.vimeo.com/video/12690053"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="feedback">
                        <div class="feedback-title">
                            <h5>3 Feedback</h5>
                        </div>
                        <div class="single-feedback mb-35 fix">
                            <div class="feedback-img">
                                <img src="frontend/img/feedback/1.png" alt="">
                            </div>
                            <div class="feedback-desc">
                                <div class="feedback-title">
                                    <h6>Albert Smith</h6>
                                </div>
                                <p class="feedback-post">
                                    6 hour ago
                                </p>
                                <p class="review-desc">There are some business lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit, sed domod empor inc ididunt ut labore et dolore
                                    magna aliqua. Ut enim ad minim veniam, quis nostrudt </p>
                            </div>
                        </div>
                        <div class="single-feedback mb-35 fix">
                            <div class="feedback-img">
                                <img src="frontend/img/feedback/2.png" alt="">
                            </div>
                            <div class="feedback-desc">
                                <div class="feedback-title">
                                    <h6>Albert Smith</h6>
                                    <p class="feedback-post">
                                        6 hour ago
                                    </p>
                                    <p class="review-desc">There are some business lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed domod empor inc ididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrudt </p>
                                </div>
                            </div>
                        </div>
                        <div class="single-feedback fix">
                            <div class="feedback-img">
                                <img src="frontend/img/feedback/3.png" alt="">
                            </div>
                            <div class="feedback-desc">
                                <div class="feedback-title">
                                    <h6>Albert Smith</h6>
                                    <p class="feedback-post">
                                        6 hour ago
                                    </p>
                                    <p class="review-desc">There are some business lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed domod empor inc ididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrudt </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="leave-review">
                        <div class="review-title">
                            <h5>Leave a Review</h5>
                        </div>
                        <div class="review-inner">
                            <form action="#">
                                <div class="form-top">
                                    <div class="input-filed">
                                        <input type="text" placeholder="Your name">
                                    </div>
                                    <div class="input-filed">
                                        <input type="text" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <div class="input-field">
                                        <input type="text" placeholder="Subject">
                                    </div>
                                    <textarea placeholder="Write here"></textarea>
                                </div>
                                <div class="submit-form">
                                    <button type="submit">SUBMIT REVIEW</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-12">
                <div class="sidebar right-side">
                    <aside class="single-side-box search-property">
                        <div class="aside-title">
                            <h5>Search for Property</h5>
                        </div>
                        <div class="find_home-box">
                            <div class="find_home-box-inner">
                                <form action="#">
                                    <div class="find-home-cagtegory">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="find-home-item custom-select ">
                                                    <select class="selectpicker" title="Location"
                                                        data-hide-disabled="true" data-live-search="true">
                                                        <optgroup disabled="disabled" label="disabled">
                                                            <option>Hidden</option>
                                                        </optgroup>
                                                        <optgroup label="Australia">
                                                            <option>Sydney</option>
                                                            <option>Melbourne</option>
                                                            <option>Cairns</option>
                                                        </optgroup>
                                                        <optgroup label="USA">
                                                            <option>South Carolina</option>
                                                            <option>Florida</option>
                                                            <option>Rhode Island</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="find-home-item custom-select">
                                                    <select class="selectpicker" title="Sub - Location"
                                                        data-hide-disabled="true" data-live-search="true">
                                                        <optgroup disabled="disabled" label="disabled">
                                                            <option>Hidden</option>
                                                        </optgroup>
                                                        <optgroup label="Australia">
                                                            <option>southeastern coast</option>
                                                            <option>southeastern tip</option>
                                                            <option>northwest corner</option>
                                                        </optgroup>
                                                        <optgroup label="USA">
                                                            <option>Charleston</option>
                                                            <option>St. Petersburg</option>
                                                            <option>Newport</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="find-home-item">
                                                    <input type="text" name="min-area"
                                                        placeholder="Min area (sqft)">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="find-home-item ">
                                                    <input type="text" name="max-area"
                                                        placeholder="Max area (sqft)">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="find-home-item no-caret  custom-select">
                                                    <select class="selectpicker" title="No. of Beadrooms"
                                                        data-hide-disabled="true">
                                                        <optgroup label="1">
                                                            <option label="1">1 Beadrooms</option>
                                                            <option>2 Beadrooms</option>
                                                            <option>3 Beadrooms</option>
                                                            <option>4 Beadrooms</option>
                                                            <option>5 Beadrooms</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="find-home-item no-caret  custom-select">
                                                    <select class="selectpicker" title="No. of Bathrooms"
                                                        data-hide-disabled="true">
                                                        <optgroup label="2">
                                                            <option>1 Bathrooms</option>
                                                            <option>2 Bathrooms</option>
                                                            <option>3 Bathrooms</option>
                                                            <option>4 Bathrooms</option>
                                                            <option>5 Bathrooms</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row find-home_bottom">
                                            <div class="col-12">
                                                <div class="find-home-item">
                                                    <!-- shop-filter -->
                                                    <div class="shop-filter">
                                                        <div class="price_filter">
                                                            <div class="price_slider_amount">
                                                                <input type="submit" value="price range" />
                                                                <input type="text" id="amount" name="price"
                                                                    placeholder="Add Your Price" />
                                                            </div>
                                                            <div id="slider-range"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="find-home-item">
                                                    <button type="submit">SEARCH PROPERTY </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </aside>
                    <aside class="single-side-box feature">
                        <div class="aside-title">
                            <h5>Featured Property</h5>
                        </div>
                        <div class="feature-property">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-property">
                                        <div class="property-img">
                                            <a href="single-properties.html">
                                                <img src="frontend/img/property/7.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="property-desc text-center">
                                            <div class="property-desc-top">
                                                <h6><a href="single-properties.html">Friuli-Venezia Giulia</a>
                                                </h6>
                                                <h4 class="price">$52,354</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-property">
                                        <div class="property-img">
                                            <a href="single-properties.html">
                                                <img src="frontend/img/property/3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="property-desc text-center">
                                            <div class="property-desc-top">
                                                <h6><a href="single-properties.html">Friuli-Venezia Giulia</a>
                                                </h6>
                                                <h4 class="price">$52,354</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-property">
                                        <div class="property-img">
                                            <a href="single-properties.html">
                                                <img src="frontend/img/property/5.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="property-desc text-center">
                                            <div class="property-desc-top">
                                                <h6><a href="single-properties.html">Friuli-Venezia Giulia</a>
                                                </h6>
                                                <h4 class="price">$52,354</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-property">
                                        <div class="property-img">
                                            <a href="single-properties.html">
                                                <img src="frontend/img/property/11.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="property-desc text-center">
                                            <div class="property-desc-top">
                                                <h6><a href="single-properties.html">Friuli-Venezia Giulia</a>
                                                </h6>
                                                <h4 class="price">$52,354</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside class="single-side-box agent">
                        <div class="aside-title">
                            <h5>Our Agent</h5>
                        </div>
                        <div class="our-agent-sidbar">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-agent">
                                        <div class="agent-img">
                                            <a href="agent-details.html">
                                                <img src="frontend/img/team/1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="agent-title">
                                            <h6><a href="agent-details.html">Evan Smith</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-agent">
                                        <div class="agent-img">
                                            <a href="agent-details.html">
                                                <img src="frontend/img/team/2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="agent-title">
                                            <h6><a href="agent-details.html">Evan Smith</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-agent">
                                        <div class="agent-img">
                                            <a href="agent-details.html">
                                                <img src="frontend/img/team/3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="agent-title">
                                            <h6><a href="agent-details.html">Evan Smith</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-agent">
                                        <div class="agent-img">
                                            <a href="agent-details.html">
                                                <img src="frontend/img/team/4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="agent-title">
                                            <h6><a href="agent-details.html">Evan Smith</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-agent">
                                        <div class="agent-img">
                                            <a href="agent-details.html">
                                                <img src="frontend/img/team/5.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="agent-title">
                                            <h6><a href="agent-details.html">Evan Smith</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-agent">
                                        <div class="agent-img">
                                            <a href="agent-details.html">
                                                <img src="frontend/img/team/6.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="agent-title">
                                            <h6><a href="agent-details.html">Evan Smith</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside class="single-side-box tags">
                        <div class="aside-title">
                            <h5>Tags</h5>
                        </div>
                        <div class="our-tag-list">
                            <ul>
                                <li><a href="#">Real Estate</a></li>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Appartment</a></li>
                                <li><a href="#">Duplex villa</a></li>
                                <li><a href="#">But property</a></li>
                            </ul>
                        </div>
                    </aside>
                    <aside class="single-side-box video">
                        <div class="aside-title">
                            <h5>Take a tour</h5>
                        </div>
                        <div class="video-sidebar">
                            <div class="video-img">
                                <img src="frontend/img/common/video.jpg" alt="">
                            </div>
                            <div class="play-button">
                                <a href="https://youtu.be/vb5KLYAtPIs"><i class="fa fa-play"></i></a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Feature property section end-->

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
<!--Brand section end-->
@endsection