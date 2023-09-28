@extends('frontend.layouts.layout')

@section('content')
    <!-- Header-Area-Start -->
    <header class="header-area parallax-bg" id="home-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header-text">
                        <h3 class="typer-title wow fadeInUp" data-wow-delay="0.2s">I'm ui/ux designer</h3>
                        <h1 class="title wow fadeInUp" data-wow-delay="0.3s">Hi, I am Smith Jhon</h1>
                        <div class="desc wow fadeInUp" data-wow-delay="0.4s">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque at, aperiam corrupti
                                earum quasi, porro voluptatem commodi eos laboriosam nam quis nostrum, molestiae
                                nesciunt dolore.</p>
                        </div>
                        <a href="#" class="button-dark mouse-dir wow fadeInUp" data-wow-delay="0.5s">Hire Me <span
                                class="dir-part"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header-Area-End -->

    <!-- Service-Area-Start -->
    <section class="service-area section-padding-top" id="about-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-service">
                        <h3 class="title wow fadeInRight" data-wow-delay="0.3s">Branding Design</h3>
                        <div class="desc wow fadeInRight" data-wow-delay="0.4s">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quos animi numquam
                                excepturi eveniet explicabo repellendus rem esse. Quae quasi odio enim.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                        <h3 class="title wow fadeInRight" data-wow-delay="0.3s">User Interface</h3>
                        <div class="desc wow fadeInRight" data-wow-delay="0.4s">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quos animi numquam
                                excepturi eveniet explicabo repellendus rem esse. Quae quasi odio enim.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                        <h3 class="title wow fadeInRight" data-wow-delay="0.3s">User Experience</h3>
                        <div class="desc wow fadeInRight" data-wow-delay="0.4s">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quos animi numquam
                                excepturi eveniet explicabo repellendus rem esse. Quae quasi odio enim.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service-Area-End -->

    @section('frontend.sections.service')
    @include('frontend.sections.about')
    @include('frontend.sections.portfolio')
    @include('frontend.sections.testimonial')
    @include('frontend.sections.skills')
    @include('frontend.sections.experience')
    @include('frontend.sections.blog')
    @include('frontend.sections.contact')
@endsection
