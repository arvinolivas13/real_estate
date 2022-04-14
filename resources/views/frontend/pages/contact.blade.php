@extends('frontend.master.index')

@section('content')
<!--Breadcrumbs start-->
<div class="breadcrumbs overlay-black  contact-cover">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-inner">
                            <div class="breadcrumbs-title text-center">
                                <h1>Contact</h1>
                            </div>
                            <div class="breadcrumbs-menu">
                                <ul>
                                    <li><a href="index.html">Home /</a></li>
                                    <li>Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumbs end-->

        <!--Contact page start-->
        <div class="contact-page pt-130">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="map-area">
                            <div class="place-map-inner">
                                <div id="googleMap-2"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-12">
                                <div class="contact-list-inner">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="single-contact_list">
                                                <div class="single-contact-icon">
                                                    <img src="frontend/img/icon/c-4.png" alt="">
                                                </div>
                                                <div class="single-contact-desc">
                                                    <p>256, 1st AVE, Manchester</p>
                                                    <p>125 , Noth England</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12 ">
                                            <div class="single-contact_list">
                                                <div class="single-contact-icon">
                                                    <img src="frontend/img/icon/c-5.png" alt="">
                                                </div>
                                                <div class="single-contact-desc">
                                                    <p>Telephone : +012 345 678 102</p>
                                                    <p>Telephone : +012 345 678 102</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="single-contact_list">
                                                <div class="single-contact-icon">
                                                    <img src="frontend/img/icon/c-6.png" alt="">
                                                </div>
                                                <div class="single-contact-desc">
                                                    <p>Email : info@example.com</p>
                                                    <p>Web : www.example.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="leave-message">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-12">
                                    <div class="contact-form-inner">
                                        <div class="contact-form-title">
                                            <h5>Leave a Message</h5>
                                        </div>
                                        <form id="contact-form" action="mail.php" method="post">
                                            <input name="con_name" type="text" placeholder="Your Name">
                                            <input  name="con_email" type="text" placeholder="Email here">
                                            <textarea name="con_message" placeholder="Write here"></textarea>
                                            <div class="form-submit">
                                                <button type="submit">Submit</button>
                                            </div>
                                            <p class="form-messege"></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Contact page end-->

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