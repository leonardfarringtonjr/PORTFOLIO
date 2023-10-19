@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Portfolio Section Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.hero.index')}}">Hero</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Section</h4>
                        </div>

                        <div class="card-body">

                            <form action="{{route('admin.portfolio-section-setting.update', 1)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                            {{-- TITLE --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="title" value="{{$portfolioSettings->title}}">
                                </div>
                            </div>

                            {{-- SUB-TITLE --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub-Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea id="" class="form-control" style="height: 100px;" name="sub_title">{{$portfolioSettings->sub_title}}</textarea>
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
