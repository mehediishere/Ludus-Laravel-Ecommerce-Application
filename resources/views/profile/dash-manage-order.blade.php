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

                                    <a href="dash-manage-order.html">My Account</a></li>
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
                                <h1 class="dash__h1 u-s-m-b-30">Order Details</h1>
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <div class="dash-l-r">
                                            <div>
                                                <div class="manage-o__text-2 u-c-secondary">Order #{{ $orderDetails->order_id }}</div>
                                                <div class="manage-o__text u-c-silver">Placed on {{ $orderDetails->created_at }}</div>
                                            </div>
                                            <div>
                                                <div class="manage-o__text-2 u-c-silver">Total:

                                                    <span class="manage-o__text-2 u-c-secondary">${{ $orderDetails->grand_price }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <div class="manage-o">
                                            <div class="manage-o__header u-s-m-b-30">
                                                <div class="manage-o__icon"><i class="fas fa-box u-s-m-r-5"></i>

                                                    <span class="manage-o__text">Package 1</span></div>
                                            </div>
                                            <div class="dash-l-r">
                                                <div class="manage-o__text u-c-secondary">Last Update at {{ $orderDetails->updated_at }}</div>
                                                <div class="manage-o__icon"><i class="fas fa-truck u-s-m-r-5"></i>

                                                    <span class="manage-o__text">Standard</span></div>
                                            </div>
                                            <div class="manage-o__timeline">
                                                <div class="timeline-row">
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div class="timeline-step">
                                                            <div class="timeline-l-i @if(in_array($orderDetails->order_status, array("processing", "shipped", "delivered"))) timeline-l-i--finish @endif">

                                                                <span class="timeline-circle"></span></div>

                                                            <span class="timeline-text">Processing</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div class="timeline-step">
                                                            <div class="timeline-l-i @if(in_array($orderDetails->order_status, array("shipped", "delivered"))) timeline-l-i--finish @endif">

                                                                <span class="timeline-circle"></span></div>

                                                            <span class="timeline-text">Shipped</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div class="timeline-step">
                                                            <div class="timeline-l-i @if($orderDetails->order_status == "delivered") timeline-l-i--finish @endif">

                                                                <span class="timeline-circle"></span></div>

                                                            <span class="timeline-text">Delivered</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul style="list-style: none; padding-left: 0;">
                                                @foreach($orderProducts as $product)
                                                    <li style="padding-bottom: 0.5em;">
                                                        <div class="manage-o__description">
                                                            <div class="description__container">
                                                                <div class="description__img-wrap"> <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt=""></div>
                                                                <div class="description-title">{{ $product->product }}</div>
                                                            </div>
                                                            <div class="description__info-wrap">
                                                                <div>
                                                        <span class="manage-o__text-2 u-c-silver">Quantity:
                                                            <span class="manage-o__text-2 u-c-secondary">{{ $product->qty }}</span>
                                                        </span>
                                                                </div>
                                                                <div>
                                                        <span class="manage-o__text-2 u-c-silver">Total:
                                                                <span class="manage-o__text-2 u-c-secondary">${{ number_format((int)$product->qty * (int)$product->price) }}</span>
                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                            <div class="dash__pad-3">
                                                <h2 class="dash__h2 u-s-m-b-8">Shipping Address</h2>
                                                <h2 class="dash__h2 u-s-m-b-8">{{ $orderDetails->full_name }}</h2>

                                                <span class="dash__text-2">{{ $orderDetails->street_address .", ". $orderDetails->landmark.", ". $orderDetails->city.", ". $orderDetails->province.", ". $orderDetails->zip_code  }}</span>

                                                <span class="dash__text-2">{{ $orderDetails->phone }}</span>
                                            </div>
                                        </div>
                                        <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                            <div class="dash__pad-3">
                                                <h2 class="dash__h2 u-s-m-b-8">Billing Address</h2>
                                                <h2 class="dash__h2 u-s-m-b-8">{{ $orderDetails->full_name }}</h2>

                                                <span class="dash__text-2">{{ $orderDetails->street_address .", ". $orderDetails->landmark.", ". $orderDetails->city.", ". $orderDetails->province.", ". $orderDetails->zip_code  }}</span>

                                                <span class="dash__text-2">{{ $orderDetails->phone }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                            <div class="dash__pad-3">
                                                <h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
                                                <div class="dash-l-r u-s-m-b-8">
                                                    <div class="manage-o__text-2 u-c-secondary">Subtotal</div>
                                                    <div class="manage-o__text-2 u-c-secondary">${{ $orderDetails->subtotal_price }}</div>
                                                </div>
                                                <div class="dash-l-r u-s-m-b-8">
                                                    <div class="manage-o__text-2 u-c-secondary">Shipping Fee</div>
                                                    <div class="manage-o__text-2 u-c-secondary">${{ $orderDetails->delivery_fee }}</div>
                                                </div>
                                                <div class="dash-l-r u-s-m-b-8">
                                                    <div class="manage-o__text-2 u-c-secondary">Total</div>
                                                    <div class="manage-o__text-2 u-c-secondary">${{ $orderDetails->grand_price }}</div>
                                                </div>

                                                <span class="dash__text-2">Payment Status: <span class="manage-o__badge badge--processing" style="text-transform: uppercase;"> {{ $orderDetails->payment_status }} </span></span>
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
