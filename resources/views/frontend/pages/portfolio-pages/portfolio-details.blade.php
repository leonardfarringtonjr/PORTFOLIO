@extends('frontend.layouts.layout')

@section('content')
<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-8">
                <h2 class="title">Portfolio Details</h2>
            </div>
            <div class="col-sm-4">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Portfolio</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio-Area-Start -->
<section class="portfolio-details section-padding" id="portfolio-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="head-title">{{ $portfolioItem->title ? e($portfolioItem->title) : '' }}</h2>
                <figure class="image-block">
                    <img src="{{asset($portfolioItem->image) ? e($portfolioItem->image) : '' }}" alt="" class="img-fix">
                </figure>
                <div class="portflio-info">
                    <div class="single-info">
                        <h4 class="title">Client</h4>
                        <p>{{$portfolioItem->client ? e($portfolioItem->client) : ''}}</p>
                    </div>
                    <div class="single-info">
                        <h4 class="title">Date</h4>
                        <p>{{date('M d, Y', strtotime( $portfolioItem->created_at ? e($portfolioItem->created_at) : '' ))}}</p>
                    </div>
                    <div class="single-info">
                        <h4 class="title">Website</h4>
                        <p><a href="{{ $portfolioItem->website ? e($portfolioItem->website) : '' }}">{{ $portfolioItem->website ? e($portfolioItem->website) : '' }}</p></a>
                    </div>
                    <div class="single-info">
                        <h4 class="title">Category</h4>
                        <p>{{ $portfolioItem->category->name }}</p>
                    </div>
                </div>
                <div class="description">
                    {{$portfolioItem->description ? e($portfolioItem->description) : ''}}  {{-- THIS SECURITY OPTION HAS HTML ESCAPING TO STOP XSS AND A TERNATORY OPERATOR TO HANDLE NULL/EMPTY VALUES --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio-Area-End -->
@endsection
