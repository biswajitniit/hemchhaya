@extends('layouts.app') @section('content')

<!-- main-area -->
<main>
    <!-- contact-area -->
    <section class="contact-area pt-90 pb-90 login_">
        <div class="container">
            <div class="container-inner-wrap">
                <div class="row justify-content-center justify-content-lg-between">
                    <div class="col-md-6 offset-md-3 style_b">
                        <div class="contact-title mb-25">
                            <h5 class="sub-title">Sign in to start your session</h5>
                        </div>
                        <div class="contact-wrap-content">
                            @if ($errors->any())
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

                            <form action="{{ route('user.loginpost') }}" name="userlogin" id="userlogin" class="contact-form" method="POST">
                                @csrf
                                <div class="form-grp">
                                    <label for="email">Your Email <span>*</span></label>
                                    <input type="email" name="email" id="email" placeholder="Your Email" class="validate[required]" />
                                </div>
                                <div class="form-grp">
                                    <label for="password">Your Password <span>*</span></label>
                                    <input type="password" name="password" id="password" placeholder="Password" class="validate[required]" />
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn rounded-btn">Sign in</button>
                                    </div>
                                    <div class="col-md-7">
                                        <p>Need help? <a href="{{route('forget.password.get')}}">Forgot Password</a></p>
                                    </div>
                                </div>
                            </form>
                            <hr />
                            <div class="text-center">
                                <p>Didn't Have An Account? <a href="{{route('user.registration') }}">Register</a></p>
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

@push('frontend-scripts')
<script>
    $(document).ready(function () {
        $("#userlogin").validationEngine();
    });
</script>
@endpush @endsection
