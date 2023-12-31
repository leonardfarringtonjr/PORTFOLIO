@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>

            {{-- FIRST TITLE --}}
            <h1>Typer Title</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.hero.index')}}">Hero</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.typer-title.index')}}">Typer Title</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.typer-title.create')}}">Create</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            {{-- SECOND TITLE --}}
                            <h4>Create Title</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-success">View More<i class="fas fa-plus"></i></a>
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="{{route('admin.typer-title.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                            {{-- TITLE --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="title" value="">
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
