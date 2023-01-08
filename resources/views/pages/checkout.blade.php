@extends('master')

@section('page-meta')
@endsection

@section('page-css')
    <style>
        .text-danger{
            color: orangered;
        }
    </style>
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

                                    <a href="checkout.html">Checkout</a></li>
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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
{{--                            <form action="{{ route('place.order') }}" method="POST">--}}
                            <form action="{{ url('/pay') }}" method="POST">
                                @csrf
                            <div id="checkout-msg-group">
                                <div class="msg">

                                        <span class="msg__text">Have a coupon?

                                            <a class="gl-link" href="#have-coupon" data-toggle="collapse">Click Here to enter your code</a></span>
                                    <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group">
                                        <div class="c-f u-s-m-b-16">

                                            <span class="gl-text u-s-m-b-16">Enter your coupon code if you have one.</span>
                                            <div class="c-f__form">
                                                <div class="u-s-m-b-16">
                                                    <div class="u-s-m-b-15">

                                                        <label for="coupon"></label>

                                                        <input class="input-text input-text--primary-style" type="text" id="coupon" name="coupon" placeholder="Coupon Code"></div>
                                                    <div class="u-s-m-b-15">

                                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">APPLY</button></div>
                                                </div>
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


        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="checkout-f">
{{--                        <form action="{{ route('place.order') }}" method="POST">--}}
{{--                            @csrf--}}
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>
                                <div class="checkout-f__delivery">
                                    <div class="u-s-m-b-30">
                                        <div class="u-s-m-b-15">

                                            <!--====== Check Box ======-->
                                            <div class="check-box">

                                                <input type="checkbox" id="get-address" name="use_default_address">
                                                <div class="check-box__state check-box__state--primary">
                                                    <label class="check-box__label" for="get-address">Use default shipping address from account</label>
                                                </div>
                                            </div>
                                            <!--====== End - Check Box ======-->
                                        </div>

                                        <!--====== First Name, Last Name ======-->
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label @error('address-fname') text-danger @enderror" for="billing-fname">FIRST NAME *</label>

                                                <input class="input-text input-text--primary-style ax-fname" type="text" name="address-fname" ></div>
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label" for="billing-lname">LAST NAME</label>

                                                <input class="input-text input-text--primary-style ax-lname" type="text" name="address-lname" ></div>
                                        </div>
                                        <!--====== End - First Name, Last Name ======-->


                                        <!--====== E-MAIL ======-->
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label @error('address-email') text-danger @enderror" for="billing-email">E-MAIL</label>

                                            <input class="input-text input-text--primary-style ax-email" type="text" name="address-email" ></div>
                                        <!--====== End - E-MAIL ======-->


                                        <!--====== PHONE ======-->
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label @error('address-phone') text-danger @enderror" for="billing-phone">PHONE *</label>

                                            <input class="input-text input-text--primary-style ax-phone" type="text" name="address-phone" ></div>
                                        <!--====== End - PHONE ======-->


                                        <!--====== Street Address ======-->
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label @error('address-street') text-danger @enderror" for="billing-street">STREET ADDRESS *</label>

                                            <input class="input-text input-text--primary-style ax-street" type="text" name="address-street" placeholder="House name and street name" ></div>
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label @error('address-landmark') text-danger @enderror" for="billing-street-optional">LANDMARK *</label>

                                            <input class="input-text input-text--primary-style ax-landmark" type="text" name="address-landmark" placeholder="Apartment, suite unit etc. (optional)" ></div>
                                        <!--====== End - Street Address ======-->

                                        <!--====== Town / City ======-->
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label @error('address-city') text-danger @enderror" for="billing-town-city">TOWN/CITY *</label>

                                            <input class="input-text input-text--primary-style ax-city" type="text" name="address-city" ></div>
                                        <!--====== End - Town / City ======-->


                                        <!--====== STATE/PROVINCE ======-->
                                        <div class="u-s-m-b-15">

                                            <!--====== Select Box ======-->
                                            <label class="gl-label @error('address-state') text-danger @enderror" for="billing-state">STATE/PROVINCE *</label>
                                            <select class="select-box select-box--primary-style ax-province" name="address-state" >
                                                <option class="ax-province2" value="">Choose State/Province</option>
                                                <option value="barishal">Barishal</option>
                                                <option value="chattogram">Chattogram</option>
                                                <option value="dhaka">Dhaka</option>
                                                <option value="khulna">Khulna</option>
                                                <option value="rajshahi">Rajshahi</option>
                                                <option value="rangpur">Rangpur</option>
                                                <option value="mymensingh ">Mymensingh</option>
                                                <option value="sylhet ">Sylhet</option>
                                            </select>
                                            <!--====== End - Select Box ======-->
                                        </div>
                                        <!--====== End - STATE/PROVINCE ======-->


                                        <!--====== ZIP/POSTAL ======-->
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label @error('address-postal') text-danger @enderror" for="billing-zip">ZIP/POSTAL CODE *</label>

                                            <input class="input-text input-text--primary-style ax-postal" type="text" name="address-postal" placeholder="Zip/Postal Code" ></div>
                                        <!--====== End - ZIP/POSTAL ======-->

                                        <div class="u-s-m-b-10">

                                            <label class="gl-label" for="order-note">ORDER NOTE</label>
                                            <textarea class="text-area text-area--primary-style ax-note" id="order-note" name="note"></textarea></div>
                                        <div>
                                            <!-- <button class="btn btn--e-transparent-brand-b-2" type="submit">SAVE FOR FUTURE</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                                <!--====== Order Summary ======-->
                                <div class="o-summary">
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__item-wrap gl-scroll">
                                            @php $items = cartItems(); @endphp
                                            @foreach($items as $item)
                                            <div class="o-card">
                                                <div class="o-card__flex">
                                                    <div class="o-card__img-wrap">
                                                        <img class="u-img-fluid" src="{{ $item->attributes->image }}" alt=""></div>
                                                    <div class="o-card__info-wrap">
                                                            <span class="o-card__name">
                                                                <a href="product-detail.html">{{ $item->name }}</a>
                                                            </span>
                                                        <span class="o-card__quantity">Quantity x {{ $item->quantity }}</span>
                                                        <span class="o-card__price">${{ $item->price }}</span></div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <h1 class="checkout-f__h1">DEFAULT SHIPPING & BILLING</h1>
                                            <div class="ship-b">

                                                <span class="ship-b__text">Ship to:</span>
                                                <div class="ship-b__box u-s-m-b-10">
                                                    <p class="ship-b__p">{{ $shipping_address->street_address }} <br> Phone: {{ $shipping_address->phone }}</p>
                                                    <a class="ship-b__edit btn--e-transparent-platinum-b-2" href="{{ route('address.book.default') }}">Change</a>
                                                </div>

                                                <span class="ship-b__text">Bill to default billing address:</span>
                                                <div class="ship-b__box u-s-m-b-10">
                                                    <p class="ship-b__p">{{ $billing_address->street_address }} <br> Phone: {{ $billing_address->phone }}</p>
                                                    <a class="ship-b__edit btn--e-transparent-platinum-b-2" href="{{ url('address/default#billing-address') }}">Change</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <table class="o-summary__table">
                                                <tbody>
                                                <tr>
                                                    <td>SHIPPING</td>
                                                    <td>$4.00</td>
                                                </tr>
                                                <tr>
                                                    <td>TAX</td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>SUBTOTAL</td>
                                                    <td>${{ \Cart::getSubTotal() }}</td>
                                                </tr>
                                                <tr>
                                                    <td>GRAND TOTAL</td>
                                                    <td>${{ \Cart::getSubTotal()+4 }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                            <div class="checkout-f__payment">
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="cash-on-delivery" name="payment" value="cash on delivery" checked>
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="cash-on-delivery">Cash on Delivery</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery. (This service is only available for some countries)</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="direct-bank-transfer" name="payment" disabled>
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="direct-bank-transfer">Direct Bank Transfer</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="pay-with-sslcommerz" value="payment with sslcommerz" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="pay-with-check">Pay With SSLCOMMERZ</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="pay-with-card" name="payment" disabled>
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="pay-with-card">Pay With Credit / Debit Card</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">International Credit Cards must be eligible for use within the United States.</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="pay-pal" name="payment" disabled>
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="pay-pal">Pay Pal</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Paypal's site to set up your billing information.</span>
                                                </div>
                                                <div class="u-s-m-b-15">

                                                    <!--====== Check Box ======-->
                                                    <div class="check-box">

                                                        <input type="checkbox" id="term-and-condition" name="consent" required>
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="term-and-condition">I consent to the</label></div>
                                                    </div>
                                                    <!--====== End - Check Box ======-->

                                                    <a class="gl-link">Terms of Service.</a>
                                                </div>
                                                <div>
                                                    <button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Order Summary ======-->
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->
    </div>
@endsection

@section('outside-of-app-content')

@endsection

@section('page-script')
    <script>
        $(function (){
           $('#get-address').on('click', function (){
               $.ajax({
                   url: "{{ url("/ajx/shipping-address") }}",
                   method: "get",
                   data: {
                       _token: '{!! csrf_token() !!}'
                   },
                   success: function (response){
                       $('.ax-fname').val(response['fname']);
                       $('.ax-lname').val(response['lname']);
                       $('.ax-email').val(response['email']);
                       $('.ax-phone').val(response['phone']);
                       $('.ax-street').val(response['street']);
                       $('.ax-landmark').val(response['landmark']);
                       $('.ax-city').val(response['city']);
                       $('.ax-postal').val(response['zip_code']);
                       $('.ax-province').append( "<option value="+response['province']+" selected>"+response['province']+"</option>" );
                   }
               });
           });
        });
    </script>
@endsection
