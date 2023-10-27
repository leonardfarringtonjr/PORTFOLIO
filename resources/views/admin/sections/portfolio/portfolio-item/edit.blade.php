@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('admin.portfolio-item.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>

            {{-- FIRST TITLE --}}
            <h1>Portfolio Item</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.hero.index') }}">Portfolio</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.portfolio-item.index') }}">Portfolio Item</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.portfolio-item.create') }}">Create</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Portfolio Item</h4>
                        </div>

                        <div class="card-body">

                            <form action="{{route('admin.portfolio-item.update', $portfolioItem->id)}}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="title" value="{{$portfolioItem->title ? e($portfolioItem->title) : ''}}">
                                    </div>
                                </div>

                                {{-- CATEGORY --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="category_id" id="form-control selectric">
                                            <option>Select</option>
                                            @foreach ($categories as $category)
                                                <option {{$category->id == $portfolioItem->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote" style="height: 100px;" name="description">{{$portfolioItem->description}}</textarea>
                                    </div>
                                </div>

                                {{-- CLIENT --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Client</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="client" value="{{$portfolioItem->client}}">
                                    </div>
                                </div>

                                {{-- WEBSITE --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Website</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="website" value="{{$portfolioItem->website}}">
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
        @if (isset($portfolioItem) && isset($portfolioItem->image)) // YOU SHOULD ALWAYS CHECK IF A VAR EXISTS AND HAS THE EXPECTED PROPERTIES BEFORE USING IT
            $('#image-preview').css({ // TARGETS THE HTML ELEMENT WITH THE ID "image-preview"
                'background-image': 'url("{{asset($portfolioItem->image)}}")', // WHEN ECHOING VARS IN BLADE TEMPLATES, YOU USE CURLY BRACES TO AUTOMATICALLY ESCAPE OUTPUT // THIS PROTECTS YOU FROM XSS ATTACKS
                'background-size': 'cover',
                'background-position': 'center center'
            })
        @endif
    });
</script>
@endpush
