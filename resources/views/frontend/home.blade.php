@extends('frontend.layouts.layout')

@section('content')

    <!-- About-Area-Start -->
    @include('frontend.sections.hero')

    <!-- About-Area-Start -->
    @include('frontend.sections.service')
    @include('frontend.sections.about')
    @include('frontend.sections.portfolio')
    @include('frontend.sections.testimonial')
    @include('frontend.sections.skills')
    @include('frontend.sections.experience')
    @include('frontend.sections.blog')

    <!-- Contact -->
    @include('frontend.sections.contact')
@endsection
