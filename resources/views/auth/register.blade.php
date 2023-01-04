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

                                    <a href="signup.html">Signup</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row row--center">
                        <div class="col-lg-6 col-md-8 u-s-m-b-30">
                            <div class="l-f-o">
                                <div class="l-f-o__pad-box">
                                    <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                                    <form class="l-f-o__form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="gl-s-api">
                                            <div class="u-s-m-b-15">

                                                <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i class="fab fa-facebook-f"></i>

                                                    <span>Signup with Facebook</span></button></div>
                                            <div class="u-s-m-b-30">
                                                <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>
                                                    <span>Signup with Google</span></button></div>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-fname" @error("first_name") style="color: orangered;" @enderror>FIRST NAME *</label>
                                            <input class="input-text input-text--primary-style" type="text" required name="first_name" value="{{ old('first_name') }}" id="reg-fname" placeholder="First Name"></div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="reg-lname" @error("last_name") style="color: orangered;" @enderror>LAST NAME *</label>

                                            <input class="input-text input-text--primary-style" type="text" required name="last_name" value="{{ old('last_name') }}" id="reg-lname" placeholder="Last Name"></div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">

                                                <!--====== Date of Birth Select-Box ======-->
                                                <span class="gl-label" @error("date_of_birth_month", "date_of_birth_day", "date_of_birth_year") style="color: orangered;" @enderror>BIRTHDAY</span>
                                                <div class="gl-dob">
                                                    <select class="select-box select-box--primary-style" name="date_of_birth_month" required>
                                                        <option value="">Month</option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                    <select class="select-box select-box--primary-style" name="date_of_birth_day" required>
                                                        <option value="">Day</option>
                                                        @for($i = 1; $i<32; $i++)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    <select class="select-box select-box--primary-style" name="date_of_birth_year" required>
                                                        @php $years = range((\Carbon\Carbon::now()->year)-15, 1950); @endphp
                                                        <option value="">Year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!--====== End - Date of Birth Select-Box ======-->
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="gender" @error("gender") style="color: orangered;" @enderror>GENDER</label>
                                                <select class="select-box select-box--primary-style u-w-100" id="gender" name="gender" required>
                                                    <option value="">Select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="reg-email" @error("email") style="color: orangered;" @enderror>E-MAIL *</label>

                                            <input class="input-text input-text--primary-style" type="email" required name="email" value="{{ old('email') }}" id="reg-email" placeholder="Enter E-mail"></div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-password" @error("password") style="color: orangered;" @enderror>PASSWORD *</label>
                                            <input class="input-text input-text--primary-style" type="password" required name="password" id="reg-password" placeholder="Enter Password">
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-password-confirm" @error("password_confirmation") style="color: orangered;" @enderror>PASSWORD *</label>
                                            <input class="input-text input-text--primary-style" type="password" required name="password_confirmation" id="reg-password-confirm" placeholder="Re-Enter Password">
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">CREATE</button></div>

                                        <a class="gl-link" href="#">Return to Store</a>
                                    </form>
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
