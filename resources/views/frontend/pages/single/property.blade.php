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
                                <img src="../frontend/img/property/property-tab-large-1.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-2" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="../frontend/img/property/property-tab-large-2.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-3" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="../frontend/img/property/property-tab-large-3.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-4" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="../frontend/img/property/property-tab-large-4.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-5" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="../frontend/img/property/property-tab-large-5.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-6" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="../frontend/img/property/property-tab-large-2.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="image-7" role="tabpanel"
                                aria-labelledby="image-1-tab">
                                <img src="../frontend/img/property/property-tab-large-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="nav single-property-tab-slider owl-carousel indicator-style2 mt-20">
                            <div class="nav-item"><a class="nav-link" href="#image-1" id="image-1-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-1"
                                    aria-selected="true"><img src="../frontend/img/property/property-tab-small-1.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-2" id="image-2-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-2"
                                    aria-selected="true"><img src="../frontend/img/property/property-tab-small-2.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-3" id="image-3-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-3"
                                    aria-selected="true"><img src="../frontend/img/property/property-tab-small-3.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-4" id="image-4-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-4"
                                    aria-selected="true"><img src="../frontend/img/property/property-tab-small-4.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-5" id="image-5-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-5"
                                    aria-selected="true"><img src="../frontend/img/property/property-tab-small-5.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-6" id="image-6-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-6"
                                    aria-selected="true"><img src="../frontend/img/property/property-tab-small-2.jpg"
                                        alt="" /></a></div>
                            <div class="nav-item"><a class="nav-link" href="#image-7" id="image-7-tab"
                                    data-toggle="tab" role="tab" aria-controls="image-7"
                                    aria-selected="true"><img src="../frontend/img/property/property-tab-small-3.jpg"
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
                    <div class="planning">
                        <div class="row">
                            <div class="col-12">
                                <div class="plan-title">
                                    <h5>Floor Plan</h5>
                                </div>
                                <div class="plan-map">
                                    <img src="../frontend/img/property/plan-map.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="condition-amenities">
                        <div class="row">
                            <div class=" col-12">
                                <div class="amenities">
                                    <div class="amenities-title">
                                        <h5>Area Slots</h5>
                                    </div>
                                    <div class="amenities-list">
                                        <ul>
                                            <li><i class="fa fa-check-circle-o"></i> <span>Lot 1</span></li>
                                            <li><i class="fa fa-check-circle-o"></i> <span>Lot 2</span></li>
                                            <li><i class="fa fa-check-circle-o"></i> <span>Lot 3</span></li>
                                            <li><i class="fa fa-check-circle-o"></i> <span>Lot 4</span></li>
                                            <li><i class="fa fa-check-circle-o"></i> <span>Lot 5</span></li>
                                            <li><i class="fa fa-check-circle-o"></i> <span>Lot 6</span></li>
                                            <li><i class="fa fa-check-circle-o"></i> <span>Lot 7</span></li>
                                            <li><i class="fa fa-check-circle-o"></i> <span>Lot 8</span></li>
                                            <li><i class="fa fa-check-circle-o"></i> <span>Lot 9</span></li>
                                            <li><i class="fa fa-times-circle-o"></i> <span>Lot 10</span></li>
                                        </ul>
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
                                <img src="../frontend/img/feedback/1.png" alt="">
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
                                <img src="../frontend/img/feedback/2.png" alt="">
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
                                <img src="../frontend/img/feedback/3.png" alt="">
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
                    <aside class="single-side-box video">
                        <div class="aside-title">
                            <h5>Take a tour</h5>
                        </div>
                        <div class="video-sidebar">
                            <div class="video-img">
                                <img src="../frontend/img/common/video.jpg" alt="">
                            </div>
                            <div class="play-button">
                                <a href="https://www.youtube.com/watch?v=ew1whzA5tA8"><i class="fa fa-play"></i></a>
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
                        <a href="#"><img src="../frontend/img/brand/1.png" alt=""></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="../frontend/img/brand/2.png" alt=""></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="../frontend/img/brand/3.png" alt=""></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="../frontend/img/brand/4.png" alt=""></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="../frontend/img/brand/5.png" alt=""></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="../frontend/img/brand/1.png" alt=""></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="../frontend/img/brand/2.png" alt=""></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="../frontend/img/brand/3.png" alt=""></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="../frontend/img/brand/4.png" alt=""></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="../frontend/img/brand/5.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Brand section end-->
@endsection

@section('style')
<style>
.amenities-list ul li {
    width: 25%;
}
</style> 
@endsection