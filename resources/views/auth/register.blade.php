@extends('layouts.app')

@section('content')
<!-- main-area -->
<main>
    <!-- contact-area -->
    <section class="contact-area pt-90 pb-90 login_">
        <div class="container">
            <div class="container-inner-wrap">
                <div class="row justify-content-center justify-content-lg-between">
                    <div class="col-md-6 offset-md-3 style_b">
                        <div class="contact-title mb-25">
                            <h5 class="sub-title">Sign Up to view your profile</h5>
                        </div>

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif

                        <div class="contact-wrap-content">
                            <form action="{{ route('register') }}" name="userregistration" class="contact-form" method="POST">
                                @csrf
                                <div class="form-grp">
                                    <label for="name">Your Name <span>*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}"/>
                                </div>
                                <div class="form-grp">
                                    <label for="email">Your Email <span>*</span></label>
                                    <input type="email" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" />
                                </div>
                                <div class="form-grp">
                                    <label for="phone">Your Phone No. <span>*</span></label>
                                    <input type="text" name="phone" id="phone" placeholder="Your Phone No."  value="{{ old('phone') }}" />
                                </div>
                                <div class="form-grp">
                                    <label for="password">Password <span>*</span></label>
                                    <input type="password" name="password" id="password" placeholder="password" />
                                </div>
                                <div class="form-grp">
                                    <label for="confirmpassword">Confirm Password <span>*</span></label>
                                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" />
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <button type="submit" name="register" class="btn rounded-btn">Register</button>
                                    </div>
                                    <div class="col-md-7">
                                        <p><input type="checkbox" checked /> I accept all <a href="#"> Terms & Conditions </a></p>
                                    </div>
                                </div>
                            </form>
                            <hr />
                            <div class="text-center">
                                <p>Already Have An Account? <a href="{{ route('login') }}">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
</main>
<!-- main-area-end -->

@endsection
