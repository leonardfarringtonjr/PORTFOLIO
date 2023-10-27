@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('dashboard')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>

            {{-- FIRST TITLE --}}
            <h1>Feedback</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.feedback.index')}}">Feedback</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.feedback.index')}}">All Feedback</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.feedback.edit',$feedback->id)}}">Edit</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Feedback</h4>
                        </div>

                        <div class="card-body">

                            <form action="{{route('admin.feedback.update',$feedback->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- TITLE --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="title" value="{{$feedback->title ? e($feedback->title) : ""}}">
                                    </div>
                                </div>

                                {{-- POSITION --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Position</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="position" value="{{$feedback->position ? e($feedback->position) : ""}}">
                                    </div>
                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote" style="height: 100px;" name="description">{{$feedback->description ? e($feedback->description) : ""}}</textarea>
                                    </div>
                                </div>

                                {{-- SUBMIT --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- @push('scripts')
<script>
    $(document).ready(function(){
        @if (isset($portfolio) && isset($portfolio->image)) // YOU SHOULD ALWAYS CHECK IF A VAR EXISTS AND HAS THE EXPECTED PROPERTIES BEFORE USING IT
            $('#image-preview').css({ // TARGETS THE HTML ELEMENT WITH THE ID "image-preview"
                'background-image': 'url("{{asset($portfolio->image)}}")', // WHEN ECHOING VARS IN BLADE TEMPLATES, YOU USE CURLY BRACES TO AUTOMATICALLY ESCAPE OUTPUT // THIS PROTECTS YOU FROM XSS ATTACKS
                'background-size': 'cover',
                'background-position': 'center center'
            })
        @endif
    });
</script>
@endpush --}}
