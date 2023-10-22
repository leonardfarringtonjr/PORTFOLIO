<!-- Service-Area-Start -->
<section class="service-area section-padding-top" id="about-page">
    <div class="container">
        <div class="row">

            {{-- SERVICE ITEMS --}}
            @foreach ( $serviceItems as $item )
            <div class="col-lg-4">
                <div class="single-service">
                    <h3 class="title wow fadeInRight" data-wow-delay="0.3s">{{$item->title}}</h3>
                    <div class="desc wow fadeInRight" data-wow-delay="0.4s">{{$item->description}}</div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Service-Area-End -->
