@extends('frontend.layouts.layout')

@section('content')

    <!-- About-Area-Start -->
    @include('frontend.sections.hero')

    <!-- About-Area-Start -->
    @include('frontend.sections.service')
    @include('frontend.sections.about')
    @include('frontend.sections.portfolio')
    @include('frontend.sections.testimonial')

    <!-- Skills -->
    @include('frontend.sections.skills')

    <!-- Experience -->
    @include('frontend.sections.experience')

    <!-- Blog -->
    @include('frontend.sections.blog')

    <!-- Contact -->
    @include('frontend.sections.contact')
@endsection
