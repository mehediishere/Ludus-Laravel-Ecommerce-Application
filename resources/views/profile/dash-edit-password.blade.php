@extends('master')

@section('page-meta')
@endsection

@section('page-css')
@endsection

@section('app-content')
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">

                                    <a href="index.html">Home</a></li>
                                <li class="is-marked">

                                    <a href="dash-edit-profile.html">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="dash">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">

                                <!--====== Dashboard Features ======-->
                                @include('profile.layouts.sidebar')
                                <!--====== End - Dashboard Features ======-->
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>
                                        @if ($errors->updatePassword->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->updatePassword->all() as $error)
                                                        <li style="color: orangered;">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="dash__link dash__link--secondary u-s-m-b-30">
                                            <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a></div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form class="dash-edit-p" method="POST" action="{{ route('password.update') }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-30">
                                                            <label class="gl-label">CURRENT PASSWORD</label>
                                                            <input class="input-text input-text--primary-style" type="password" name="current_password">
                                                        </div>
                                                        <div class="u-s-m-b-30">
                                                            <label class="gl-label">NEW PASSWORD</label>
                                                            <input class="input-text input-text--primary-style" type="password" name="password">
                                                        </div>
                                                        <div class="u-s-m-b-30">
                                                            <label class="gl-label">CONFIRM PASSWORD</label>
                                                            <input class="input-text input-text--primary-style" type="password" name="password_confirmation">
                                                        </div>
                                                    </div>

                                                    <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                                    @if (session('status') === 'password-updated')
                                                        <span class="text-sm text-gray-600 ml-3">Saved Successfully!</span>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
@endsection

@section('page-script')
@endsection
