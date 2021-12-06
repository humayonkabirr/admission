@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">
            {{ trans('global.reset_password') }}
        </p>

        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="col col-md-12 ">
            আপনি কিভাবে পাসওয়ার্ড পুনরূদ্ধার করবেন?
            <label class="checkbox-inline">
                <input type="radio" name="user_type" value="1">এসএমএস(মোবাইল ফোন)
            </label>
            <label class="checkbox-inline">
                <input type="radio" name="user_type" value="2">ইমেইল
            </label>


        </div> &nbsp;

        <form name="email-reset" id="radio1" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email') }}">

                    @if($errors->has('email'))
                    <span class="help-block" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-flat btn-block">
                            {{ trans('global.send_password') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>


        <hr>
        <form name="mobile-reset-code" id="radio2" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>

                <label for="">Reset Password with Mobile</label>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email') }}">

                    @if($errors->has('email'))
                    <span class="help-block" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-flat btn-block">
                            {{ trans('global.send_password') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
    // $("#radio1").change(function() {
    //     if (this.checked && this.value == '1') {
    //         console.log('hh');
    //     }
    // });

    $('#radio1').change(
        function() {
            if ($(this).is(':checked') && $(this).val() == 'Yes') {
                console.log("Hello");
            }
        });
</script>