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
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li style="color: orangered;">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
{{--                                        <span class="dash__text u-s-m-b-30">Looks like you haven't update your profile</span>--}}
                                        <div class="dash__link dash__link--secondary u-s-m-b-30">

                                            <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a></div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form class="dash-edit-p" method="POST" action="{{ route('profile.update') }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="reg-fname">FIRST NAME</label>

                                                            <input class="input-text input-text--primary-style" type="text" name="first_name" id="reg-fname" value="{{ $user->first_name }}"></div>
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="reg-lname">LAST NAME</label>

                                                            <input class="input-text input-text--primary-style" type="text" name="last_name" id="reg-lname" value="{{ $user->last_name }}"></div>
                                                    </div>
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-30">

                                                            <!--====== Date of Birth Select-Box ======-->
                                                            <span class="gl-label" @error("date_of_birth_month", "date_of_birth_day", "date_of_birth_year") style="color: orangered;" @enderror>BIRTHDAY</span>
                                                            <div class="gl-dob">
                                                                @php $date = \Carbon\Carbon::createFromFormat('Y-m-d', $user->date_of_birth); @endphp
                                                                <select class="select-box select-box--primary-style" name="date_of_birth_month" required>
                                                                    <option value="{{ $date->month }}">{{ $date->format('F') }}</option>
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
                                                                    <option value="{{ $date->day }}">{{ $date->day }}</option>
                                                                    @for($i = 1; $i<32; $i++)
                                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                                    @endfor
                                                                </select>
                                                                <select class="select-box select-box--primary-style" name="date_of_birth_year" required>
                                                                    @php $years = range((\Carbon\Carbon::now()->year)-15, 1950); @endphp
                                                                    <option value="{{ $date->year }}">{{ $date->year }}</option>
                                                                    @foreach($years as $year)
                                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!--====== End - Date of Birth Select-Box ======-->
                                                        </div>
                                                        <div class="u-s-m-b-30">
                                                            <label class="gl-label" for="gender">GENDER</label>
                                                                <select class="select-box select-box--primary-style u-w-100" id="gender" name="gender">
                                                                <option value="{{ $user->gender }}">{{ ucfirst($user->gender) }}</option>
                                                                <option value="{{ ($user->gender == 'male') ? 'female' : 'male' }}">{{ ($user->gender == 'male') ? 'Female' : 'Male' }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label">EMAIL</label>

                                                            <input class="input-text input-text--primary-style" type="email" name="email" value="{{ $user->email }}" required></div>
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label">PHONE</label>

                                                            <input class="input-text input-text--primary-style" name="phone" type="text" placeholder="01x-xxxx-xxxx" value="{{ $user->phone }}"></div>
                                                    </div>

                                                    <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                                    @if (session('status') === 'profile-updated')
                                                    <span>Saved!!</span>
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
