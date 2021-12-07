<!-- This is for Student Homepage .This Extends Layouts/Main and Partials/Menu -->

@extends('layouts.frontend')
@section('styles')
<style>
    fieldset.border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
    }


    legend.border {
        width: inherit;
        padding: 0 10px;
        border-bottom: none;
        background: #060a6b;
        color: #ffffff;
    }


    .panel-default>.panel-heading {
        color: #fffcfc;
        background-color: #2A1562 !important;
        border-color: #ee1616;
        font-size: 20px;
        text-align: center;
    }

    .required:after {
        content: " *";
        color: red;
    }

    .header-note {

        color: red;
        font-weight: bolder;
    }



    .select2 {
        width: 100% !important;

    }

    .container .row {
        background: #ffffff;
        box-shadow: 1px 1px 13px #938e8eb5;
        padding: 15px 0px 15px 0px;
    }
</style>
@endsection

@section('content')

<!-- <div class="content"> -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="
                color:green;">

                <div class="panel-heading">

                    ভর্তি সহায়তার আবেদন
                </div>
                <div class="panel-body">
                    <br>
                    <form method="POST" action="{{ route('frontend.application') }}" enctype="multipart/form-data">
                        @csrf

                        <fieldset class="border row">
                            <legend class="border">
                                প্রয়োজনীয় কাগজপত্রের ছবি/ স্ক্যানকপি
                            </legend>

                            @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                            @endif


                            <div class=" col col-md-3 my-2">
                                <label class="form-check-label" for="profile">ছবি আপলোড করুন</label>
                                <br><img id="blah1" onchange="validateMultipleImage('blah1')" alt="image" src="" height="180px" width="180px"
                                 onerror="this.onerror=null;this.src='https://www.jamiemaison.com/creating-a-simple-text-editor/placeholder.png';" required />
                                <br><input type="file" class="mt-2" name="profile" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>
                                @if ($errors->has('profile'))
                                <span class="help-block" role="alert">{{ $errors->first('profile') }}</span>
                                @endif


                            </div>

                            <div class=" col col-md-3  my-2">
                                <label class="form-check-label" for="sign">স্বাক্ষর আপলোড করুন</label>
                                <br><img id="blah2" onchange="check()" alt="image" src="" height="80px" width="220px" onerror="this.onerror=null;this.src='https://www.jamiemaison.com/creating-a-simple-text-editor/placeholder.png';" required />
                                <br><input type="file" class="mt-2" name="sign" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>

                            </div>

                            <div class=" col col-md-3  my-2">
                                <label class="form-check-label" for="brid">জন্ম নিবন্ধন আপলোড করুন</label>
                                <br><img id="blah3" onchange="validateMultipleImage('blah3')" alt="image" src="" height="180px" width="180px"
                                 onerror="this.onerror=null;this.src='https://www.jamiemaison.com/creating-a-simple-text-editor/placeholder.png';" required />
                                <br><input type="file" class="mt-2" name="brid" onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>

                            </div>

                            <div class=" col col-md-3  my-2">
                                <label class="form-check-label" for="father_nid">পিতার জাতীয় পরিচয়পত্র আপলোড
                                </label>
                                <br><img id="blah4" onchange="validateMultipleImage('blah4')" alt="image" src="" height="180px" width="180px"
                                 onerror="this.onerror=null;this.src='https://www.jamiemaison.com/creating-a-simple-text-editor/placeholder.png';" required />
                                <br><input type="file" class="mt-2" name="father_nid" onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0]); show(this)" accept=".jfif,.jpg,.jpeg,.png,.gif" required>

                            </div>

                        </fieldset>

                        <div class="col-md-12" style="padding: 0px;">
                            <button class="btn btn-danger pull-right" type="submit">
                                <i class="fas fa-save">&nbsp; </i>{{ trans('global.save') }}
                            </button>
                        </div>


                    </form>
                </div>
            </div>


        </div>
    </div>

    <script type="text/javascript">
        function show(input) {
            debugger;
            var validExtensions = ['jpg', 'png', 'jpeg']; //array of valid extensions
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