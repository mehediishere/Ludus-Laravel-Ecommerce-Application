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

                                    <a href="dash-address-make-default.html">My Account</a></li>
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
                                <form class="dash__address-make" method="POST" action="{{ route('default.shippingAddress.save') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                        <h2 class="dash__h2 u-s-p-xy-20">Make default Shipping Address</h2>
                                        <div class="dash__table-2-wrap gl-scroll">
                                            <table class="dash__table-2">
                                                <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Status</th>
                                                    <th>Full Name</th>
                                                    <th>Address</th>
                                                    <th>Region</th>
                                                    <th>Phone Number</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($con_address as $address)
                                                <tr>
                                                    <td>

                                                        <!--====== Radio Box ======-->
                                                        <div class="radio-box">
                                                            <input type="radio" id="address-1" name="default-address" @if($address->shipping == 1) checked="" @endif value="{{ $address->id }}">
                                                            <div class="radio-box__state radio-box__state--primary">
                                                                <label class="radio-box__label" for="address-1"></label>
                                                            </div>
                                                        </div>
                                                        <!--====== End - Radio Box ======-->
                                                    </td>
                                                    <td>
                                                        @if($address->shipping == 1)
                                                        <div class="gl-text">Default Shipping Address</div>
                                                        @endif
                                                    </td>
                                                    <td>{{ $address->first_name." ".$address->last_name }}</td>
                                                    <td>{{ $address->street_address }}</td>
                                                    <td>{{ $address->province }}</td>
                                                    <td>{{ $address->phone }}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div>

                                        <button class="btn btn--e-brand-b-2" type="submit">SAVE</button></div>
                                </form>

                                <div style="margin-top: 100px;" id="billing-address"></div>

                                <form class="dash__address-make" method="POST" action="{{ route('default.billingAddress.save') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                        <h2 class="dash__h2 u-s-p-xy-20">Make default Billing Address</h2>
                                        <div class="dash__table-2-wrap gl-scroll">
                                            <table class="dash__table-2">
                                                <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Status</th>
                                                    <th>Full Name</th>
                                                    <th>Address</th>
                                                    <th>Region</th>
                                                    <th>Phone Number</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($con_address as $address)
                                                    <tr>
                                                        <td>

                                                            <!--====== Radio Box ======-->
                                                            <div class="radio-box">
                                                                <input type="radio" id="address-1" name="default-address" @if($address->billing == 1) checked="" @endif value="{{ $address->id }}">
                                                                <div class="radio-box__state radio-box__state--primary">
                                                                    <label class="radio-box__label" for="address-1"></label>
                                                                </div>
                                                            </div>
                                                            <!--====== End - Radio Box ======-->
                                                        </td>
                                                        <td>
                                                            @if($address->billing == 1)
                                                                <div class="gl-text">Default Billing Address</div>
                                                            @endif
                                                        </td>
                                                        <td>{{ $address->first_name." ".$address->last_name }}</td>
                                                        <td>{{ $address->street_address }}</td>
                                                        <td>{{ $address->province }}</td>
                                                        <td>{{ $address->phone }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div>

                                        <button class="btn btn--e-brand-b-2" type="submit">SAVE</button></div>
                                </form>
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
