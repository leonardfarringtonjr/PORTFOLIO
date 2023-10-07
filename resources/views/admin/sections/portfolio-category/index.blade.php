@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Portfolio Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Portfolio</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Category</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Categories</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-danger">View More<i class="fas fa-plus"></i></a>
                            </div>
                        </div>

                        <div class="card-body">{{$dataTable->table()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
