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
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15447.541219186267!2d121.2199242!3d14.5485509!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x19cb0fc7ab0b2d36!2sBrilliant%20Five%20J%20Construction%20and%20Development%20Corp.!5e0!3m2!1sen!2sph!4v1649947727950!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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