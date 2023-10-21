<!-- Experience-Area-Start -->
<section class="experience-area section-padding">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 d-none d-lg-block">
                <figure class="single-image wow fadeInLeft">
                    <img src="{{asset($experience->image)}}" alt=""> {{-- THIS IS THE PROPER WAY TO MAKE SURE A URL IS PROPERLY ESCAPED FOR SECURITY --}}
                </figure>
            </div>
            <div class="col-lg-6">
                <div class="experience-text">
                    <h3 class="title wow fadeInUp" data-wow-delay="0.3s">{{$experience->title ? e($experience->title) : ''}}</h3>
                    <div class="desc wow fadeInUp" data-wow-delay="0.4s">{{$experience->description ? e($experience->description) : ''}}</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Experience-Area-End -->
