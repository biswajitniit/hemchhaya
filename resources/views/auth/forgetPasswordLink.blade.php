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
                            <h5 class="sub-title">Reset Password</h5>
                        </div>
                        <div class="contact-wrap-content">
                            @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                               {{ Session::get('message') }}
                            </div>
                            @endif
                            <form action="{{ route('reset.password.post') }}" method="post" class="resetpassword-form" id="resetpassword-form">
                                @csrf
                                <div class="form-grp mb-2">
                                    <label for="email">E-Mail Address <span>*</span></label>
                                    <input type="email" id="email_address" class="validate[required] form-control" name="email" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-grp mb-2">
                                    <label for="email">Password <span>*</span></label>
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" onChange="Chkpassword_and_conpassword()">
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-grp mb-2">
                                    <label for="email">Confirm Password <span>*</span></label>
                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Retype password" onChange="Chkpassword_and_conpassword()">
                                    @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn rounded-btn" >Reset Password</button>
                                    </div>
                                </div>
                            </form>
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
        $("#resetpassword-form").validationEngine();
    });
</script>
@endpush
@endsection
