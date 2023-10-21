<!-- Portfolio-Area-Start -->
<section class="portfolio-area section-padding-top" id="portfolio-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ $portfolioTitle->title ? e($portfolioTitle->title) : '' }}</h3>
                    {{-- USES A TERNARY OPERATOR TO VALIDATE THE DATA // IT CHECKS IF $portfolioTitle->title IS NULL OR EMPTY // IF NOT IT ESCAPES THE CONTENT USING e() WHICH PREVENTS XSS ATTACKS // IF IT IS, IT DISPLAYS AN EMPTY STRING --}}
                    <div class="desc">
                        <p>{{ $portfolioTitle->sub_title ? e($portfolioTitle->sub_title) : '' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- PORTFOLIO ROW --}}
        <div class="row">
            <div class="col-sm-12">
                <ul class="filter-menu">
                    <li class="active" data-filter="*">All Projects</li>
                    @foreach ($portfolioCategories as $category)
                        <li data-filter=".{{ $category->slug ? e($category->slug) : '' }}">{{ $category->name ? e($category->name) : '' }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- PORTFOLIO ITEMS --}}
        <div class="portfolio-wrapper">
            <div class="row portfolios">
                @foreach ($portfolioItems as $item)
                    <div data-wow-delay="0.3s" class="col-md-6 col-lg-4 filter-item {{ $item->category->slug ? e($item->category->slug) : '' }}">
                        <div class="single-portfolio" style="height:300px;">
                            <figure class="portfolio-image">
                                <img src="{{ asset($item->image) ? e(asset($item->image)) : '' }}" alt="">
                            </figure>
                            <div class="portfolio-content">
                                <a href="{{ asset($item->image) ? e(asset($item->image)) : '' }}" data-lity class="icon"><i class="fas fa-plus"></i></a>
                                <h4 class="title"><a href="{{ route('show.portfolio',$item->id) }}">{{ $item->title ? e($item->title) : '' }}</a></h4>
                                <div class="desc">
                                    <p>{{ $item->description ? e(Str::limit($item->description, 20)) : '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Portfolio-Area-End -->
