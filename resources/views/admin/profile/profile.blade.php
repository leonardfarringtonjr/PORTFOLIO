@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, Ujang!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">

                    {{-- NAME --}}
                    <div class="card">
                            <div class="card-header">
                                <h4>Profile Information</h4>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('profile.update') }}" method="POST">

                                    @csrf
                                    @method('patch')

                                    <div class="row">

                                        {{-- NAME --}}
                                        <div class="form-group col-md-6 col-12">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}" required="">
                                            @if ($errors->has('name'))
                                                <code>{{$errors->first('name')}}</code>
                                            @endif
                                        </div>

                                        {{-- EMAIL --}}
                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="{{old('email', $user->email)}}" required="">
                                            @if ($errors->has('email'))
                                                <code>{{$errors->first('email')}}</code>
                                            @endif
                                        </div>

                                        {{-- SUBMIT BTN --}}
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary">Save Changes</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="card">

                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>

                            <div class="card-body">

                                <form action="{{ route('password.update') }}" method="POST">

                                    @csrf
                                    @method('put')

                                    <div class="row">

                                        {{-- CURRENT PASS --}}
                                        <div class="form-group col-12">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control" name="current_password" autocomplete="current-password">
                                            @if ($errors->updatePassword->has('current_password'))
                                                <code>{{$errors->updatePassword->first('current_password')}}</code>
                                            @endif
                                        </div>

                                        {{-- NEW PASS --}}
                                        <div class="form-group col-12">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="password" autocomplete="new-password">
                                            @if ($errors->updatePassword->has('password'))
                                                <code>{{$errors->updatePassword->first('password')}}</code>
                                            @endif
                                        </div>

                                        {{-- CONFIRM PASS --}}
                                        <div class="form-group col-12">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" autocomplete="password_confirmation">
                                            @if ($errors->updatePassword->has('password_confirmation'))
                                                <code>{{$errors->updatePassword->first('password_confirmation')}}</code>
                                            @endif
                                        </div>

                                        {{-- SUBMIT BTN --}}
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary">Save Changes</button>
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
