@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Experience Section</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.experience.index') }}">Experience</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Experience Section</h4>
                        </div>

                        <div class="card-body">

                            <form action="{{route('admin.experience.update',1)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- IMAGE --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" >Thumbnail</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>

                                {{-- TITLE --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="title" value="{{$experience->title ? e($experience->title) : ''}}">
                                    </div>
                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote" style="height: 100px;" name="description">{{$experience->description ? e($experience->description) : ''}}</textarea>
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

@push('scripts')
<script>
    $(document).ready(function(){
        @if (isset($experience) && isset($experience->image)) // YOU SHOULD ALWAYS CHECK IF A VAR EXISTS AND HAS THE EXPECTED PROPERTIES BEFORE USING IT
            $('#image-preview').css({ // TARGETS THE HTML ELEMENT WITH THE ID "image-preview"
                'background-image': 'url("{{asset($experience->image)}}")', // WHEN ECHOING VARS IN BLADE TEMPLATES, YOU USE CURLY BRACES TO AUTOMATICALLY ESCAPE OUTPUT // THIS PROTECTS YOU FROM XSS ATTACKS
                'background-size': 'cover',
                'background-position': 'center center'
            })
        @endif
    });
</script>
@endpush
