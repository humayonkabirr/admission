@extends('layouts.frontend')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.my_profile') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.profile.update") }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="col col-md-6 my-2">
                                <label class="form-check-label required" for="photo">ছবি</label>
                                <br>
                                <img id="blah1" src={{ old('photo', auth()->user()->photo) }} onchange="validateMultipleImage('blah1')" alt="image" src="{{ asset('public/images/sample_photo.jpg')}}" height="180px" width="180px" onerror="this.onerror=null;this.src='{{asset('public/images/sample_photo.png')}}'" ;" required />
                                <br><input type="file" class="mt-2" name="photo" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>
                                @if ($errors->has('photo'))
                                <span class="help-block" role="alert">{{ $errors->first('photo') }}</span>
                                @endif
                            </div>
                            <div class="col col-md-6  my-2">
                                <label class="form-check-label required" for="sign">স্বাক্ষর</label>
                                <br><img id="blah2" onchange="check()" alt="image" src="" height="80px" width="220px" onerror="this.onerror=null;this.src='{{asset('public/images/sample_sign.png')}}'" ;" required />
                                <br><input type="file" class="mt-2" name="sign" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="required" for="photo">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', auth()->user()->email) }}">
                            @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                            @endif


                        </div>




                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required>
                            @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="required" for="brid">{{ trans('cruds.user.fields.brid') }}</label>
                            <input class="form-control {{ $errors->has('brid') ? 'is-invalid' : '' }}" type="text" name="brid" id="brid" value="{{ old('brid', auth()->user()->brid) }}" required readonly>

                            @if($errors->has('brid'))
                            <div class="invalid-feedback">
                                {{ $errors->first('brid') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_contact">{{ trans('cruds.user.fields.user_contact') }}</label>
                            <input class="form-control {{ $errors->has('user_contact') ? 'is-invalid' : '' }}" type="text" name="user_contact" id="user_contact" value="{{ old('user_contact', auth()->user()->user_contact) }}" required readonly>

                            @if($errors->has('user_contact'))
                            <div class="invalid-feedback">
                                {{ $errors->first('user_contact') }}
                            </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.change_password') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.profile.password") }}">
                        @csrf
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="required" for="password">New {{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                            <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="password_confirmation">Repeat New {{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')


<script type="text/javascript">
    function show(input) {
        debugger;
        var validExtensions = ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', 'bmp', 'BMP']; //array of valid extensions
        var fileName = input.files[0].name;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        if ($.inArray(fileNameExt, validExtensions) == -1) {
            input.type = ''
            input.type = 'file'
            $('#user_img').attr('src', "");
            alert("আপনার আপলোড করা ছবি   " + validExtensions.join(', ') + " ধরণের মধ্যে হতে হবে। ");
        } else {
            if (input.files && input.files[0]) {
                var filerdr = new FileReader();
                filerdr.onload = function(e) {
                    $('#user_img').attr('src', e.target.result);
                }
                filerdr.readAsDataURL(input.files[0]);
            }
        }
    }
</script>
@endsection