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

                                    <a href="dash-address-add.html">My Account</a></li>
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
                                        <h1 class="dash__h1 u-s-m-b-14">Add new Address</h1>

                                        <span class="dash__text u-s-m-b-30">We need an address where we could deliver products.</span>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li style="color: orangered;">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form class="dash-address-manipulation" method="POST" action="{{ route('address.book.save') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="address-fname">FIRST NAME *</label>

                                                    <input class="input-text input-text--primary-style" type="text" name="address-fname" value="{{ old('address-fname') }}" placeholder="First Name"></div>
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="address-lname">LAST NAME</label>

                                                    <input class="input-text input-text--primary-style" type="text" name="address-lname" value="{{ old('address-lname') }}" placeholder="Last Name"></div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="address-phone">PHONE *</label>

                                                    <input class="input-text input-text--primary-style" type="text" name="address-phone" value="{{ old('address-phone') }}"></div>
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="address-street">STREET ADDRESS *</label>

                                                    <input class="input-text input-text--primary-style" type="text" name="address-street" value="{{ old('address-street') }}" placeholder="House Name and Street"></div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="address-landmark">LANDMARK *</label>

                                                    <input class="input-text input-text--primary-style" type="text" name="address-landmark" value="{{ old('address-landmark') }}" placeholder="Near xyz hospital">
                                                </div>
                                                <div class="u-s-m-b-30">

                                                    <!--====== Select Box ======-->
                                                    <label class="gl-label" for="address-state">STATE/PROVINCE *</label><select class="select-box select-box--primary-style" name="address-state">
                                                        <option selected value="">Choose State/Province</option>
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
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="address-city">TOWN/CITY *</label>

                                                    <input class="input-text input-text--primary-style" type="text" name="address-city" value="{{ old('address-city') }}"></div>
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="address-street">ZIP/POSTAL CODE *</label>

                                                    <input class="input-text input-text--primary-style" type="text" name="address-postal" value="{{ old('address-postal') }}" placeholder="Zip/Postal Code"></div>
                                            </div>

                                            <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                        </form>
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
