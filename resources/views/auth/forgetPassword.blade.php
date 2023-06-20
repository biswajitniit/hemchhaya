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
                            <form action="{{ route('forget.password.post') }}" method="post" class="contact-form" id="contact-form">
                                @csrf
                                <div class="form-grp">
                                    <label for="email">Send an email to <span>*</span></label>
                                    <input type="email" id="email_address" name="email" class="validate[required] form-control" placeholder="Email" value="{{old('email')}}" />

                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn rounded-btn" >Send Password Reset Link</button>
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
        $("#contact-form").validationEngine();
    });
</script>
@endpush
@endsection
