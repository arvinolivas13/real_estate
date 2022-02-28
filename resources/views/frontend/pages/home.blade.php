
@extends('frontend.master.index')

@section('content')
<section class="hero-wrap js-fullheight" style="background-image: url('/frontend/images/bg_1.jpg');" data-section="home">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
            <p class="d-flex align-items-center" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                            <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center mr-3">
                            <span class="ion-ios-play play mr-2"></span>
                            <span class="watch">Watch Video</span>
                        </a>
                        </p>
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Pre-selling farm lots at it's lowest possible price.</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Real Estate Investment Firm</p>
        </div>
        </div>
    </div>
    </section>
        
    <section class="ftco-section ftco-services ftco-no-pt">
    <div class="container">
        <div class="row services-section">
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
            <div class="icon"><span class="flaticon-layers"></span></div>
            <div class="media-body">
                <h3 class="heading mb-3">Perfectly Design</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
            </div>
            </div>      
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
            <div class="icon"><span class="flaticon-compass-symbol"></span></div>
            <div class="media-body">
                <h3 class="heading mb-3">Carefully Planned</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
            </div>
            </div>    
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
            <div class="icon"><span class="flaticon-layers"></span></div>
            <div class="media-body">
                <h3 class="heading mb-3">Smartly Execute</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
            </div>
            </div>      
        </div>
        </div>
    </div>
    </section>

    <section class="ftco-section">
        <div class="container-fluid p-0">
            <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Inquire Status</span>
                    <h2 class="mb-4">Quickly Check Your Plan</h2>
                    <p>Search the details and your payment plan with your code!</p>
                </div>
                <div class="col-md 12">
                    <form action="#" class="p-5 inquire-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Transaction Code">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Check Status" class="btn btn-secondary py-3 px-5" data-toggle="modal" data-target=".bd-example-modal-lg">
                        </div>
                    </form>
                </div>
            </div>
       
        </div>
    </section>

    <section class="ftco-section ftco-project bg-light">
        <div class="container-fluid p-0">
            <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Book a Tripping</span>
                    <h2 class="mb-4">Farm Lots Tripping Schedule Calendar</h2>
                    <p>Schedule your tripping with us, we're happy to assist you!</p>
                </div>
            </div>
            <div class="container">
                <div id='calendar'></div>
            </div>
        </div>
    </section>

    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="img d-flex align-self-stretch align-items-center" style="background-image:url(/frontend/images/about.jpg);">
                        <div class="request-quote py-5">
                            <div class="py-2">
                                <span class="subheading">Be Part of our Business</span>
                                <h3>Request A Quote</h3>
                            </div>
                            <form action="#" class="request-form ftco-animate">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <div class="form-field">
                                <div class="select-wrap">
                        <div class="icon-arr"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                            <option value="">Select Your Services</option>
                            <option value="">Construction</option>
                            <option value="">Renovation</option>
                            <option value="">Interior Design</option>
                            <option value="">Exterior Design</option>
                            <option value="">Painting</option>
                        </select>
                        </div>
                        </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                                <div class="form-group">
                        <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                        <input type="submit" value="Request A Quote" class="btn btn-secondary py-3 px-4">
                        </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8 pl-lg-5 py-5">
                    <div class="row justify-content-start pb-3">
                <div class="col-md-12 heading-section ftco-animate">
                    <span class="subheading">Welcome</span>
                    <h2 class="mb-4">Since we started work in 1980</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis hendrerit dolor magna eget est lorem ipsum dolor. Facilisis gravida neque convallis a cras semper auctor.</p>
                    <p>Viverra orci sagittis eu volutpat odio facilisis mauris sit amet. Interdum velit euismod in pellentesque massa placerat duis. Aliquam etiam erat velit scelerisque in. </p>
                    <p>Nunc lobortis mattis aliquam faucibus purus in massa tempor nec. Condimentum lacinia quis vel eros. Convallis tellus id interdum velit. Felis imperdiet proin fermentum leo vel.</p>
                </div>
                </div>
                    <div class="row">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate d-flex">
                    <div class="block-18 text-center p-4 mb-4 align-self-stretch d-flex">
                    <div class="text">
                        <strong class="number" data-number="30">0</strong>
                        <span>Years of experience</span>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate d-flex">
                    <div class="block-18 text-center py-4 px-3 mb-4 align-self-stretch d-flex">
                    <div class="text">
                        <strong class="number" data-number="1000">0</strong>
                        <span>Our Farm Lots</span>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate d-flex">
                    <div class="block-18 text-center py-4 px-3 mb-4 align-self-stretch d-flex">
                    <div class="text">
                        <strong class="number" data-number="100">0</strong>
                        <span>Our Architect</span>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate d-flex">
                    <div class="block-18 text-center py-4 px-3 mb-4 align-self-stretch d-flex">
                    <div class="text">
                        <strong class="number" data-number="1100">0</strong>
                        <span>Happy Customers</span>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="ftco-section ftco-project bg-light" data-section="projects">
        <div class="container-fluid px-md-5">
            <div class="row justify-content-center pb-5">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Accomplishments</span>
            <h2 class="mb-4">Our Projects</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
        </div>
            <div class="row">
                <div class="col-md-12 testimonial">
            <div class="carousel-project owl-carousel">
                <div class="item">
                    <div class="project">
                                <div class="img">
                                    <img src="/frontend/images/project-1.jpg" class="img-fluid" alt="Colorlib Template">
                                    <a href="/frontend/images/project-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                        <span class="icon-expand"></span>
                                    </a>
                                </div>
                                <div class="text px-4">
                                    <h3><a href="#">Grand Villas Farm Phase 1</a></h3>
                                    <span>Farm Lot</span>
                                </div>
                            </div>
                </div>
                <div class="item">
                    <div class="project">
                                <div class="img">
                                    <img src="/frontend/images/project-2.jpg" class="img-fluid" alt="Colorlib Template">
                                    <a href="/frontend/images/project-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                        <span class="icon-expand"></span>
                                    </a>
                                </div>
                                <div class="text px-4">
                                    <h3><a href="#">Grand Villas Farm Phase 2</a></h3>
                                    <span>Farm Lot</span>
                                </div>
                            </div>
                </div>
                <div class="item">
                    <div class="project">
                                <div class="img">
                                    <img src="/frontend/images/project-3.jpg" class="img-fluid" alt="Colorlib Template">
                                    <a href="/frontend/images/project-3.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                        <span class="icon-expand"></span>
                                    </a>
                                </div>
                                <div class="text px-4">
                                    <h3><a href="#">Grand Villas Farm Phase 2-B</a></h3>
                                    <span>Farm Lot</span>
                                </div>
                            </div>
                </div>
                <div class="item">
                    <div class="project">
                                <div class="img">
                                    <img src="/frontend/images/project-4.jpg" class="img-fluid" alt="Colorlib Template">
                                    <a href="/frontend/images/project-4.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                        <span class="icon-expand"></span>
                                    </a>
                                </div>
                                <div class="text px-4">
                                    <h3><a href="#">Grand Villas Farm Phase 3</a></h3>
                                    <span>Farm Lot</span>
                                </div>
                            </div>
                </div>
                <div class="item">
                    <div class="project">
                                <div class="img">
                                    <img src="/frontend/images/project-5.jpg" class="img-fluid" alt="Colorlib Template">
                                    <a href="/frontend/images/project-5.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                        <span class="icon-expand"></span>
                                    </a>
                                </div>
                                <div class="text px-4">
                                    <h3><a href="#">Grand Villas Farm East</a></h3>
                                    <span>Farm Lot</span>
                                </div>
                            </div>
                </div>
                <div class="item">
                    <div class="project">
                                <div class="img">
                                    <img src="/frontend/images/project-6.jpg" class="img-fluid" alt="Colorlib Template">
                                    <a href="/frontend/images/project-6.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                        <span class="icon-expand"></span>
                                    </a>
                                </div>
                                <div class="text px-4">
                                    <h3><a href="#">Grand Villas Farm East 2</a></h3>
                                    <span>Farm Lot</span>
                                </div>
                            </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </section>

    <section class="ftco-section" data-section="team">
        <div class="container-fluid p-0">
            <div class="row no-gutters justify-content-center pb-5">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Architect</span>
            <h2 class="mb-4">Behind those Beautiful Works</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
        </div>
        <div class="row no-gutters">
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(/frontend/images/team-1.jpg);"></div>
                            </div>
                            <div class="text d-flex align-items-center pt-3 text-center">
                                <div>
                                    <span class="position mb-2">Sales Agent</span>
                                    <h3 class="mb-4">Lloyd Wilson</h3>
                                    <div class="faded">
                                        <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                                        <ul class="ftco-social text-center">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(/frontend/images/team-2.jpg);"></div>
                            </div>
                            <div class="text d-flex align-items-center pt-3 text-center">
                                <div>
                                    <span class="position mb-2">Sales Agent</span>
                                    <h3 class="mb-4">Rachel Parker</h3>
                                    <div class="faded">
                                        <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                                        <ul class="ftco-social text-center">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(/frontend/images/team-3.jpg);"></div>
                            </div>
                            <div class="text d-flex align-items-center pt-3 text-center">
                                <div>
                                    <span class="position mb-2">Sales Agent</span>
                                    <h3 class="mb-4">Ian Smith</h3>
                                    <div class="faded">
                                        <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                                        <ul class="ftco-social text-center">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(/frontend/images/team-4.jpg);"></div>
                            </div>
                            <div class="text d-flex align-items-center pt-3 text-center">
                                <div>
                                    <span class="position mb-2">Sales Agent</span>
                                    <h3 class="mb-4">Alicia Henderson</h3>
                                    <div class="faded">
                                        <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                                        <ul class="ftco-social text-center">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(/frontend/images/staff-1.jpg);"></div>
                            </div>
                            <div class="text d-flex align-items-center pt-3 text-center">
                                <div>
                                    <span class="position mb-2">Sales Agent</span>
                                    <h3 class="mb-4">Lloyd Wilson</h3>
                                    <div class="faded">
                                        <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                                        <ul class="ftco-social text-center">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(/frontend/images/staff-2.jpg);"></div>
                            </div>
                            <div class="text d-flex align-items-center pt-3 text-center">
                                <div>
                                    <span class="position mb-2">Sales Agent</span>
                                    <h3 class="mb-4">Rachel Parker</h3>
                                    <div class="faded">
                                        <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                                        <ul class="ftco-social text-center">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(/frontend/images/staff-3.jpg);"></div>
                            </div>
                            <div class="text d-flex align-items-center pt-3 text-center">
                                <div>
                                    <span class="position mb-2">Sales Agent</span>
                                    <h3 class="mb-4">Ian Smith</h3>
                                    <div class="faded">
                                        <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                                        <ul class="ftco-social text-center">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(/frontend/images/staff-4.jpg);"></div>
                            </div>
                            <div class="text d-flex align-items-center pt-3 text-center">
                                <div>
                                    <span class="position mb-2">Sales Agent</span>
                                    <h3 class="mb-4">Alicia Henderson</h3>
                                    <div class="faded">
                                        <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                                        <ul class="ftco-social text-center">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>


    <section class="testimony-section" data-section="testimony">
    <div class="container">
        <div class="row ftco-animate justify-content-center">
            <div class="col-md-12 d-flex align-items-center">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap d-flex align-items-stretch">
                    <div class="user-img d-flex align-self-stretch" style="background-image: url(/frontend/images/testimony-1.jpg)">
                    </div>
                    <div class="text d-flex align-items-center">
                        <div>
                            <div class="icon-quote">
                                <span class="icon-quote-left"></span>
                            </div>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <p class="name">Juan Dela Cruz</p>
                            <span class="position">CEO, President</span>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap d-flex align-items-stretch">
                    <div class="user-img d-flex align-self-stretch" style="background-image: url(/frontend/images/testimony-2.jpg)">
                    </div>
                    <div class="text d-flex align-items-center">
                        <div>
                            <div class="icon-quote">
                                <span class="icon-quote-left"></span>
                            </div>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <p class="name">Peter Reyes</p>
                            <span class="position">CEO, Founder</span>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- <section class="ftco-section bg-light" data-section="blog">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Blog</span>
            <h2 class="mb-4">Read Our Stories</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
        </div>
        <div class="row d-flex">
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
            <a href="single.html" class="block-20" style="background-image: url('/frontend/images/image_1.jpg');">
            </a>
            <div class="text mt-3 float-right d-block">
                <div class="d-flex align-items-center pt-2 mb-4 topp">
                    <div class="one mr-3">
                        <span class="day">12</span>
                    </div>
                    <div class="two">
                        <span class="yr">2019</span>
                        <span class="mos">March</span>
                    </div>
                </div>
                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <div class="d-flex align-items-center mt-4 meta">
                    <p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                    <p class="ml-auto mb-0">
                        <a href="#" class="mr-2">Admin</a>
                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                    </p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
            <a href="single.html" class="block-20" style="background-image: url('/frontend/images/image_2.jpg');">
            </a>
            <div class="text mt-3 float-right d-block">
                <div class="d-flex align-items-center pt-2 mb-4 topp">
                    <div class="one mr-3">
                        <span class="day">10</span>
                    </div>
                    <div class="two">
                        <span class="yr">2019</span>
                        <span class="mos">March</span>
                    </div>
                </div>
                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <div class="d-flex align-items-center mt-4 meta">
                    <p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                    <p class="ml-auto mb-0">
                        <a href="#" class="mr-2">Admin</a>
                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                    </p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry">
            <a href="single.html" class="block-20" style="background-image: url('/frontend/images/image_3.jpg');">
            </a>
            <div class="text mt-3 float-right d-block">
                <div class="d-flex align-items-center pt-2 mb-4 topp">
                    <div class="one mr-3">
                        <span class="day">05</span>
                    </div>
                    <div class="two">
                        <span class="yr">2019</span>
                        <span class="mos">March</span>
                    </div>
                </div>
                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <div class="d-flex align-items-center mt-4 meta">
                    <p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                    <p class="ml-auto mb-0">
                        <a href="#" class="mr-2">Admin</a>
                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                    </p>
                </div>
            </div>
            </div>
        </div>

        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
            <a href="single.html" class="block-20" style="background-image: url('/frontend/images/image_4.jpg');">
            </a>
            <div class="text mt-3 float-right d-block">
                <div class="d-flex align-items-center pt-2 mb-4 topp">
                    <div class="one mr-3">
                        <span class="day">12</span>
                    </div>
                    <div class="two">
                        <span class="yr">2019</span>
                        <span class="mos">March</span>
                    </div>
                </div>
                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <div class="d-flex align-items-center mt-4 meta">
                    <p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                    <p class="ml-auto mb-0">
                        <a href="#" class="mr-2">Admin</a>
                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                    </p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
            <a href="single.html" class="block-20" style="background-image: url('/frontend/images/image_5.jpg');">
            </a>
            <div class="text mt-3 float-right d-block">
                <div class="d-flex align-items-center pt-2 mb-4 topp">
                    <div class="one mr-3">
                        <span class="day">10</span>
                    </div>
                    <div class="two">
                        <span class="yr">2019</span>
                        <span class="mos">March</span>
                    </div>
                </div>
                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <div class="d-flex align-items-center mt-4 meta">
                    <p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                    <p class="ml-auto mb-0">
                        <a href="#" class="mr-2">Admin</a>
                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                    </p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry">
            <a href="single.html" class="block-20" style="background-image: url('/frontend/images/image_6.jpg');">
            </a>
            <div class="text mt-3 float-right d-block">
                <div class="d-flex align-items-center pt-2 mb-4 topp">
                    <div class="one mr-3">
                        <span class="day">05</span>
                    </div>
                    <div class="two">
                        <span class="yr">2019</span>
                        <span class="mos">March</span>
                    </div>
                </div>
                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <div class="d-flex align-items-center mt-4 meta">
                    <p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                    <p class="ml-auto mb-0">
                        <a href="#" class="mr-2">Admin</a>
                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                    </p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section> -->

    <section class="ftco-section contact-section ftco-no-pb" data-section="contact">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Contact</span>
            <h2 class="mb-4">Contact Us</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
        </div>
        <div class="row no-gutters block-9">
        <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-light p-5 contact-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
                <input value="Send Message" class="btn btn-secondary py-3 px-5">
            </div>
            </form>
        
        </div>

        <div class="col-md-6 d-flex">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="500" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=2D%20RNL%20Bldg.%20Bagumbayan,%20Teresa%20Rizal&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
        </div>
    </div>
    </section>

    <section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex contact-info">
        <div class="col-md-6 col-lg-3 d-flex">
            <div class="align-self-stretch box p-4 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="icon-map-signs"></span>
                </div>
                <h3 class="mb-4">Address</h3>
                <p>2D RNL Bldg. Bagumbayan, Teresa Rizal</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex">
            <div class="align-self-stretch box p-4 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="icon-phone2"></span>
                </div>
                <h3 class="mb-4">Contact Number</h3>
                <p><a href="tel://1234567920">0917 502 3189</a></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex">
            <div class="align-self-stretch box p-4 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="icon-paper-plane"></span>
                </div>
                <h3 class="mb-4">Email Address</h3>
                <p><a href="mailto:info@yoursite.com">info@brilliantfivej.com</a></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex">
            <div class="align-self-stretch box p-4 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="icon-globe"></span>
                </div>
                <h3 class="mb-4">Website</h3>
                <p><a href="#">brilliantfivej.com</a></p>
            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- MODAL -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <h1 class="customer-name">Nadine Cruz Lopez</h1>
                        <div class="row">
                            <div class="col-4">
                                <h5>TCP: P2,000,000.00</h5>
                            </div>
                            <div class="col-4">
                                <h5>Balance: P1,530,005.00</h5>
                            </div>
                            <div class="col-4">
                                <h5>Total Payment: P 469,995</h5>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12 mt-3">
                        <table id="customer_reports_table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Transaction Number</th>
                                    <th>Payment Type</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Reference Number</th>
                                </tr>
                                <tr>
                                    <td>2020-MDZUUWEL</td>
                                    <td>Gcash</td>
                                    <td>2020/09/30</td>
                                    <td>P 31,333.33</td>
                                    <td>UDBWUUBO</td>
                                </tr>
                                <tr>
                                    <td>2020-LHOBNK2C</td>
                                    <td>BPI</td>
                                    <td>2021/08/30</td>
                                    <td>P 31,333.33</td>
                                    <td>ITDEOGLX</td>
                                </tr>
                                <tr>
                                    <td>2020-UZTWLXLU</td>
                                    <td>BDO</td>
                                    <td>2021/04/30</td>
                                    <td>P 31,333.33</td>
                                    <td>3JREXJ8P</td>
                                </tr>
                                <tr>
                                    <td>2020-YUNTNA01</td>
                                    <td>PNB</td>
                                    <td>2021/02/28</td>
                                    <td>P 31,333.33</td>
                                    <td>LMWCVNRX</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    </div>

@endsection
@section('style')
<style>
h1.customer-name {
    margin-bottom: 0px !important;
    color: #03a84e;
}
form.p-5.inquire-form {
    width: 50%;
    margin: auto;
    text-align: center;
}
</style>
@endsection
@section('calendar-js')
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
  
      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialDate: '2020-09-12',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function(arg) {
          var title = prompt('Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          calendar.unselect()
        },
        eventClick: function(arg) {
          if (confirm('Are you sure you want to delete this event?')) {
            arg.event.remove()
          }
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [
          {
            title: 'Grand Villas Farm Phase 1',
            start: '2020-09-01'
          },
          {
            title: 'Grand Villas Farm Phase 2',
            start: '2020-09-07',
            end: '2020-09-10'
          },
          {
            groupId: 999,
            title: 'Van 1 - Arvin Olivas',
            start: '2020-09-09T16:00:00'
          },
          {
            groupId: 999,
            title: 'Van 1 - Sunshine Arias',
            start: '2020-09-16T16:00:00'
          },
          {
            title: 'Grand East Villa 1',
            start: '2020-09-11',
            end: '2020-09-13'
          },
          {
            title: 'Van 1 - Juan Dela Cruz',
            start: '2020-09-12T10:30:00',
            end: '2020-09-12T12:30:00'
          },
          {
            title: 'Van 2 - Maria Reyes',
            start: '2020-09-12T12:00:00'
          },
          {
            title: 'Van 3 - Noemi Perez',
            start: '2020-09-12T14:30:00'
          },
          {
            title: 'Van 4 - Kevin Alas',
            start: '2020-09-12T17:30:00'
          },
          {
            title: 'Van 5 - Tina Mones',
            start: '2020-09-12T20:00:00'
          },
          {
            title: 'Van 1 - Jetro Macalipay',
            start: '2020-09-13T07:00:00'
          },
          {
            title: 'Holiday (No Viewing)',
            start: '2020-09-28'
          }
        ]
      });
  
      calendar.render();
    });
  
  </script>
@endsection
