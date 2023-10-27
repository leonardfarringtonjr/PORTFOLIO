<!-- Testimonial-Area-Start -->
<section class="testimonial-area section-padding-top">
    <div class="container">

        {{-- FEEDBACK SECTION SETTINGS --}}
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{$feedbackSettings->title}}</h3>
                    <div class="desc">
                        <p>{{$feedbackSettings->sub_title}}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- FEEDBACK ITEMS --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="testimonial-slider">

                    {{-- FEEDBACK ITEM --}}
                    @foreach ($feedbackItems as $feedback)
                    <div class="single-testimonial">
                        <div class="testimonial-header">
                            <div class="quote">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <h5 class="title">{{$feedback->title}}</h5>
                            <h6 class="position">{{$feedback->position}}</h6>
                        </div>
                        <div class="content">
                            <p>{{$feedback->description}}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial-Area-End -->
