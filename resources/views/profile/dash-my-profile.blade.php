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

                                    <a href="dash-my-profile.html">My Account</a></li>
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
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">My Profile</h1>

                                        <span class="dash__text u-s-m-b-30">Look all your info, you could customize your profile.</span>
                                        <div class="row">
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">Full Name</h2>

                                                <span class="dash__text">{{ $user->first_name." ".$user->last_name }}</span>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                                <span class="dash__text">{{ $user->email }}</span>
                                                <div class="dash__link dash__link--secondary">

                                                    <a href="#">Change</a></div>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">Phone</h2>

                                                <span class="dash__text">{{ $user->phone?: "Please enter your mobile" }}</span>
                                                <div class="dash__link dash__link--secondary">

                                                    <a href="#">Add</a></div>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">Birthday</h2>

                                                <span class="dash__text">{{ $user->date_of_birth }}</span>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">Gender</h2>

                                                <span class="dash__text" style="text-transform: capitalize;">{{ $user->gender }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="dash__link dash__link--secondary u-s-m-b-30">

                                                    <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a></div>
                                                <div class="u-s-m-b-16">

                                                    <a class="dash__custom-link btn--e-transparent-brand-b-2" href="{{ route('profile.edit') }}">Edit Profile</a></div>
                                                <div>

                                                    <a class="dash__custom-link btn--e-brand-b-2" href="{{ route('password.edit') }}">Change Password</a></div>
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
