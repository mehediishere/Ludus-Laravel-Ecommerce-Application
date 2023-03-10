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

                                    <a href="dash-address-book.html">My Account</a></li>
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
                                        <div class="dash__address-header">
                                            <h1 class="dash__h1">Address Book</h1>
                                            <div>

                                                    <span class="dash__link dash__link--black u-s-m-r-8">

                                                        <a href="{{ route('address.book.default') }}">Make default shipping address</a></span>

                                                <span class="dash__link dash__link--black">

                                                        <a href="{{ url('address/default#billing-address') }}">Make default shipping address</a></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                    <div class="dash__table-2-wrap gl-scroll">
                                        <table class="dash__table-2">
                                            <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Full Name</th>
                                                <th>Address</th>
                                                <th>Region</th>
                                                <th>Phone Number</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($con_address as $address)
                                            <tr>
                                                <td>
                                                    <a class="address-book-edit btn--e-transparent-platinum-b-2" href="{{ route('address.book.update', ['id' => $address->id]) }}">Edit</a></td>
                                                <td>{{ $address->first_name." ".$address->last_name }}</td>
                                                <td>{{ $address->street_address }}</td>
                                                <td>{{ $address->province }}</td>
                                                <td>{{ $address->phone }}</td>
                                                <td>
                                                    @if($address->shipping == 1)
                                                        <div class="gl-text">Default Shipping Address</div>
                                                    @endif
                                                    @if($address->billing == 1)
                                                        <div class="gl-text">Default Billing Address</div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div>

                                    <a class="dash__custom-link btn--e-brand-b-2" href="{{ route('address.book.new') }}"><i class="fas fa-plus u-s-m-r-8"></i>

                                        <span>Add New Address</span></a></div>
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
