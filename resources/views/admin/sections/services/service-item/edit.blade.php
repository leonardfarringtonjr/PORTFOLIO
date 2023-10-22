@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('admin.service-item.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>

            {{-- FIRST TITLE --}}
            <h1>Service Item</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.service-item.index') }}">Services</a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Service Item</h4>
                        </div>

                        <div class="card-body">

                            <form action="{{route('admin.service-item.update', $serviceItem->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- TITLE --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="title" value="{{$serviceItem->title}}">
                                    </div>
                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote" style="height: 100px;" name="description">{{$serviceItem->description}}</textarea>
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
        @if (isset($portfolioItem) && isset($portfolioItem->image)) // YOU SHOULD ALWAYS CHECK IF A VAR EXISTS AND HAS THE EXPECTED PROPERTIES BEFORE USING IT
            $('#image-preview').css({ // TARGETS THE HTML ELEMENT WITH THE ID "image-preview"
                'background-image': 'url("{{asset($portfolioItem->image)}}")', // WHEN ECHOING VARS IN BLADE TEMPLATES, YOU USE CURLY BRACES TO AUTOMATICALLY ESCAPE OUTPUT // THIS PROTECTS YOU FROM XSS ATTACKS
                'background-size': 'cover',
                'background-position': 'center center'
            })
        @endif
    });
</script>
@endpush --}}
