<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('panel.site_title') }}</title>
    <link rel="icon" href="{{ asset('public/images/favicon/favicon.ico') }}" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            padding: 0px;
            margin: 0px;

        }
        

        @font-face {
            font-family: nikosh;
            src: url('{{ asset("font/Nikosh.tff") }}');
        }
		.navbar-light .navbar-nav .nav-link {
			color: #198754;
			font-size: 30px;
			
		}
		.navbar-nav .nav-link {
			
			padding-right: 0;
			padding-left: 5%;
		}

		.bg-light {
			background: #ffffff !important;
			box-shadow: 1px 1px 1px #f90808;
		}
        body {
            font-family: "nikosh" !important;
            font-size: 20px;
        }

        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }

        p {
            text-align: justify;
        }

        a:not([href]):not([tabindex]) {
            color: inherit;
            text-decoration: none;
        }

        #applyBtn>a {
            color: inherit;
            text-decoration: none;
        }

        span.required {
            color: #cd0000;
            margin: 0 2px;
        }

        /*eservice statics info*/
        .eservice-statics-info {
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 20px;
            overflow: hidden;
            background: #fff;
            border: 1px solid #a0a0a0;
            /*border-top: 2px solid #9d84c1; border-bottom: 2px solid #58c41d; _background: linear-gradient(#ffffff10, #58c41d30)*/
        }

        .eservice-statics-info>div.row>div {
            _padding: 0px
        }

        .eservice-statics-info>div.row>div:first-child {
            _padding-left: 15px
        }

        .eservice-statics-info>div.row>div:last-child {
            border-right: 0px;
            _padding-right: 15px
        }

        .eservice-statics-info .eservice-statics {
            padding: 20px 3px
        }

        .eservice-statics-info .eservice-statics img {
            width: 35px;
            float: left;
            margin-right: 7px
        }

        .eservice-statics-info .eservice-statics .eservice-statics-name {
            white-space: nowrap;
            display: inline-block;
            text-align: left;
            line-height: 21px;
            _margin-top: 3px
        }

        .eservice-statics-info .eservice-statics .eservice-statics-name .statics {
            display: block;
            color: #182d7c;
            font-weight: bold;
            font-size: 1rem
        }

        /*eservice statics info*/

        .eservice-guide {
            padding: 0px;
            background: #f9f9f950;
            padding: 15px;
            border: 1px solid #e2e2e2;
            border-radius: 5px;
        }


        .eservice-guide-info-title {
            background: linear-gradient(to right, #663390, #66339090);
            color: #FFF;
            border-radius: 5px 0 0 5px;
            font-size: 1.2rem;
            line-height: 35px;
            text-align: center;
            padding: 10px;
            text-shadow: 0px 1px 1px #000;
        }

        .eservice-guide-info {
            background: #66339030;
            border-radius: 0 5px 5px 0;
            padding: 10px;
            font-size: 20px;
        }

        .common-eservice-rules {

            padding: 0px 20px 0px 0px;
            background: #f9f9f950;
            padding: 15px;
            border: 1px solid #e2e2e2;
            border-radius: 5px;
        }



        .common-eservice-rules ul {
            list-style: none;
        }

        .common-eservice-rules ul li {
            margin: 10px 5px 10px 0px;
            text-align: justify;
        }



        .steps-icon-progress {
            margin: 1rem -1rem 2rem -1rem;
            border-bottom: 1px solid #f1f1f1
        }

        .steps-icon-progress li {
            width: 33.3%;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out
        }

        .steps-icon-progress .icon .font-icon {
            display: none
        }

        .steps-icon-progress .caption {
            font-size: 0.95rem
        }

        .steps-icon-progress .active .caption {
            font-size: 0.95rem
        }

        .steps-icon-progress ul {
            margin-bottom: 20px
        }

        .steps-icon-progress .icon {
            width: 20px;
            height: 20px
        }

        .steps-icon-progress li:before {
            height: 5px;
            top: 9px
        }

        .eservice-guide-basic {
            min-height: 100px
        }

        .eservice-agree-information .eservice-name {
            font-size: 1.3rem;
            margin: 10px 0px 10px 0px;
            color: #0082c6;
            background: #e9f2f675;
            padding: 7px;
            border-radius: 5px
        }

        .eservice-agree-information .apply-online {
            display: inline-block;
            margin: auto;
            padding: 7px;
            background: #8bc64380;
            border-radius: 5px;
            width: 185px;
            cursor: pointer;
            color: black;
            font-weight: bold;
            text-decoration: none;
        }

        .eservice-agree-information .apply-online img {
            height: 50px
        }

        .eservice-agree-information .apply-online i {
            padding: 8px 6px 7px 9px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            color: #FFF;
            background: #8bc643;
            margin-left: 10px
        }

        .eservice-agree-information .apply-online:hover {
            background: #8bc643;
            color: #fff;
        }

        .eservice-agree-information .apply-online:hover span {
            color: #fff
        }

        .eservice-agree-information .apply-online:hover i {
            background: #c5e2a1;
            color: #333
        }

        .eservice-guide {
            padding: 0px;
            background: #f9f9f950;
            padding: 15px;
            border: 1px solid #e2e2e2;
            border-radius: 5px
        }

        .eservice-guide h6 {
            border-bottom: 1px solid #cacaca;
            padding-bottom: 5px;
            font-weight: bold;
            font-size: 26px;
        }

        .eservice-guide-info-title {
            background: linear-gradient(to right, #663390, #66339090);
            color: #FFF;
            border-radius: 5px 0 0 5px;
            font-size: 1.2rem;
            line-height: 35px;
            text-align: center;
            padding: 10px;
            text-shadow: 0px 1px 1px #000
        }

        .eservice-guide-info-title i {
            display: none
        }


        .common-eservice-rules {
            _text-align: left;
            padding: 0px 20px 0px 0px;
            background: #f9f9f950;
            padding: 15px;
            border: 1px solid #e2e2e2;
            border-radius: 5px
        }

        .common-eservice-rules h6 {

            border-bottom: 1px solid #cacaca;
            padding-bottom: 5px;
            font-weight: bold;
            font-size: 26px;
        }

        .common-eservice-rules ul li {
            margin: 0px 50px 10px 0px;
            text-align: justify
        }

        .eservice-required-docs {
            margin-bottom: 5px
        }

        .eservice-required-docs i {
            margin-right: 10px;
            color: #FFF;
            text-shadow: 0px 1px 1px #000
        }

        .eservice-required-docs a {
            color: #663390;
            _display: block
        }

        .eservice-required-docs a i {
            color: #663390;
            text-shadow: none;
            margin-right: 5px
        }

        .faq {
            margin-bottom: 5px;
        }

        .modal-title {
            font-size: 25px;
            font-weight: bold;
        }

        .nav-item>.nav-link {
            font-weight: bold;
        }
		
		footer {
		  margin: 0 auto;
		  position: absolute;
		  bottom:0;
		  height: 2.4em;
		  border-top: 1px solid black;
		} 
    </style>

</head>

<body>

    <main class="flex-shrink-0 ">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light ">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">
                    <img src="{{asset('public/images/aams-logo-big.png')}}" class="img-fluid" alt="PMEAT">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="#" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#helpDesk">
                            <i class="fa fa-mobile" aria-hidden="true"></i> হেল্পডেক্স</a>

                        <a href="#" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#faqModal">
                            <i class="fa fa-question-circle" aria-hidden="true"></i> সচরাচর জিজ্ঞাসিত প্রশ্ন</a>
                        @if (Route::has('login'))
                        @auth
                        <!-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a> -->
                        <a href="{{ url('/home') }}" class="nav-item nav-link">
                            <i class="fa fa-home" aria-hidden="true"></i> হোমপেজ যান
                        </a>
                        @else


                        @if (Route::has('register'))
                        <!-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a> -->
                        <a href="{{ route('register') }}" class="nav-item nav-link">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> রেজিস্ট্রেশন করুন
                        </a>

                        <!-- <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a> -->
                        <a href="{{ route('login') }}" class="nav-item nav-link">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> লগইন করুন
                        </a>
                        @endif
                        @endauth

                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid px-4">

            <section id="eservice" class="main-panel">
                <div class="eservice-agree-information step1" style="display: block;">
                    <div class="eservice-guide-basic mb-4">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h2 class="eservice-name"><b>
                                        দরিদ্র ও মেধাবীর শিক্ষার্থীদের শিক্ষা প্রতিষ্ঠানে ভর্তি নিশ্চিতকরণে ভর্তি সহায়তা
                                        প্রদান ব্যবস্থাপনা সিস্টেমে স্বাগতম
                                    </b>
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p class="px-2 text-justify">
                                    প্রধানমন্ত্রীর শিক্ষা সহায়তা ট্রাস্ট উপবৃত্তি বিতরণের পাশাপাশি দরিদ্র ও মেধাবী
                                    শিক্ষার্থীদের শিক্ষা প্রতিষ্ঠানে ভর্তি
                                    নিশ্চিতকরণে ভর্তি সহায়তা প্রদান করে থাকে। বর্তমানে দরিদ্র ও মেধাবী
                                    শিক্ষার্থীদের শিক্ষা প্রতিষ্ঠানে ভর্তি
                                    নিশ্চিতকরণে মাধ্যমিক পর্যায়ে ৫,০০০ টাকা, উচ্চ মাধ্যমিক পর্যায়ে ৮,০০০ টাকা এবং স্নাতক
                                    ও
                                    সমমান পর্যায়ে ১০,০০০ টাকা হারে
                                    ভর্তি সহায়তা প্রদান করা হচ্ছে। <a href="http://www.pmeat.gov.bd/site/page/c8674318-daa3-4b75-8b7d-33d2ef84d78f/%E0%A6%AD%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BF-%E0%A6%B8%E0%A6%B9%E0%A6%BE%E0%A7%9F%E0%A6%A4%E0%A6%BE" target="_blank" rel="noopener noreferrer">বিস্তারিত>></a>
                                    <hr>
                                    <span class="px-2 fw-bold text-wrap">
                                        অনাকাঙ্খিত ঝামেলা এড়াতে আবেদনের পূর্বে ব্যবহার নির্দেশিকা পড়ুন।</b>

                                        <!-- modal button  -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#userManualModal">
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                            ব্যবহার নির্দেশিকা
                                        </a>
                                        <br>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#faqModal">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i> সচরাচর জিজ্ঞাসিত
                                            প্রশ্ন
                                        </a>

                                    </span>



                                </p>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <a href="{{ url('/home') }}" class="apply-online eservice-agree-but mt-2 mb-2">
                                    আবেদন করুন
                                    <i class="fa fa-mouse-pointer"></i>
                                </a>

                                <div class="clear">

                                    <iframe style="border: #028824 10px solid;" width="220" height="150" src="https://www.youtube.com/embed/V2U1lx6yvfc?start=34" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="eservice-guide">
                                <h6>সেবা সংশ্লিষ্ট তথ্য</h6>
                                <div class="row m-0 mt-2">
                                    <div class="col-12 col-md-4 eservice-guide-info-title">
                                        প্রয়োজনীয় কাগজপত্র
                                    </div>
                                    <div class="col-12 col-md-8 eservice-guide-info">
                                        <div class="eservice-required-docs"><i class="fa fa-angle-double-right"></i>ছবি<span class="required">*</span>
                                        </div>
                                        <div class="eservice-required-docs"><i class="fa fa-angle-double-right"></i>জন্ম
                                            নিবন্ধন
                                            সনদ<span class="required">*</span></div>
                                        <div class="eservice-required-docs"><i class="fa fa-angle-double-right"></i>জাতীয়
                                            পরিচয়পত্র (আবেদনকারীর)</div>
                                        <div class="eservice-required-docs"><i class="fa fa-angle-double-right"></i>সর্বশেষ
                                            শিক্ষাগত যোগ্যতার সত্যায়িত সনদ<span class="required">*</span></div>
                                        <div class="eservice-required-docs"><i class="fa fa-angle-double-right"></i>৩য় ও
                                            ৪র্থ
                                            শ্রেণির কর্মচারীর সন্তানগণের আবেদন পত্রের সাথে পিতা মাতা/অভিভাবকের কর্মরত
                                            প্রতিষ্ঠান
                                            প্রধানের প্রত্যয়ন পত্র/সুপারিশ<span class="required">*</span></div>
                                    </div>
                                </div>

                                <div class="row m-0 mt-2">
                                    <div class="col-12 col-md-4 eservice-guide-info-title">
                                        ভর্তি সহায়তা প্রাপ্তির সময়সীমা
                                    </div>
                                    <div class="col-12 col-md-8 eservice-guide-info">
                                        <i class="fa fa-angle-double-right"></i> প্রতি ০৪ মাস অন্তর অন্তর অর্থ প্রেরণ
                                        করা
                                        হয়।
                                        <div class="extra-note">
                                            জানুয়ারি, মে, অক্টোবর মাসে পর্যাপ্ত বরাদ্দ থাকা সাপেক্ষে নির্বাচিত
                                            শিক্ষার্থীদের
                                            মধ্যে ভর্তি সহায়তা প্রদান করা হয়।
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="common-eservice-rules">
                                <h6>আবেদন ফরম পূরণের নিয়মাবলী</h6>
                                <ul>
                                    <li>১। আবেদন ফরমের লাল তারকা চিহ্নিত ঘরগুলো অবশ্যই পূরণ করুন। অন্যান্য ঘরগুলো পূরণ
                                        ঐচ্ছিক।
                                    </li>
                                    <li>২। আবেদন প্রক্রিয়া সম্পন্ন হওয়ার পূর্বে প্রয়োজন হলে সংরক্ষণ করা যায় এবং
                                        পরবর্তীতে
                                        সেবা ব্যবস্থাপনা অপশন হতে ড্রাফট আবেদন পুনরায় শুরু করা যাবে।</li>
                                    <li>৩। আবেদন দাখিলের পর প্রতিটি আবেদনের জন্য একটা স্বতন্ত্র ট্রাকিং নম্বর প্রদান করা
                                        হবে
                                        যেটা ব্যবহার করে সেবা ব্যবস্থাপনা অপশন হতে আবেদনের অগ্রগতি জানা যাবে।</li>
                                </ul>
                            </div>
                        </div>

                    </div>
            </section>
			 
        </div>
		  
		
    </main>
    


    <!-- Modal -->
    <div class="modal fade" id="userManualModal">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">ব্যবহার নির্দেশিকা</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <object data="{{asset('public/files/efasV1_2.pdf')}}" type=" application/pdf">

                        <embed src="{{asset('public/files/efasV1_2.pdf')}}" width="100%" height="100%">

                        </embed>

                        <p>
                            <a href="{{asset('public/files/efasV1_2.pdf')}}">ডাউনলোড</a>
                        </p>
                    </object>
                    <!-- <iframe src='https://drive.google.com/file/d/1-xPSMUdfLjrfXdoDn0narfr1w3Gib4QM/view' width='px' height='px' frameborder='0'>
                    </iframe> -->

                </div>

				
                <!-- Modal footer -->
                <div class=" modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="faqModal">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">সচরাচর জিজ্ঞাসিত প্রশ্ন</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                                    ১. নিবন্ধন ব্যতীত সেবার আবেদন করা যাবে কিনা?
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    এই বাতায়নে সেবার আবেদন করতে হলে মোবাইল নম্বর ব্যবহার করে নিবন্ধন করতে
                                    হবে।
                                    নিবন্ধনের সময়
                                    প্রোফাইলে যেসকল তথ্য প্রদান করা হবে পরবর্তীতে সেবার আবেদন ফরমে সেইসব তথ্য
                                    পুনরায়
                                    দেওয়ার
                                    প্রয়োজন হবে না।
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                                    ০২. নিজের জন্য ব্যতীত অন্য কারো পক্ষে সেবার আবেদন করার সুযোগ আছে কিনা?
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    এই প্ল্যাটফরমের অ্যাকাউন্ট ব্যবহার করে অন্য কোনো ব্যক্তির জন্য সেবার আবেদন দাখিল করা
                                    যাবে। সেক্ষেত্রে আবেদন ফরমের উপরে
                                    ‘স্বয়ং’ এর বদলে ‘অন্য ব্যক্তি’ সিলেক্ট করে নিতে হবে। ‘অন্য ব্যক্তি’ সিলেক্ট করা হলে
                                    ফরমে যে মোবাইল নম্বর প্রদান করা হবে
                                    সেই নম্বরেও আবেদনের অগ্রগতি জানানো হবে।
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                                    ০৩. প্রোফাইল থেকে কী সুবিধা পাওয়া যাবে?
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    সেবার আবেদনের জন্য প্রয়োজনীয় গুরুত্বপূর্ণ তথ্য ও ডকুমেন্ট প্রোফাইলে সংরক্ষণ করে রাখা
                                    যাবে। সেবার আবেদনের সময় এ সকল তথ্য
                                    ও ডকুমেন্ট আপলোড না করেও পুনরায় ব্যবহার করা যাবে। একজন আবেদনকারী বিভিন্ন দপ্তরের
                                    কাছে করা সকল আবেদনের তথ্য ও সর্বশেষ
                                    অগ্রগতির অবস্থা প্রোফাইলে লগইন করার মাধ্যমে জানতে পারবেন। এছাড়া প্রোফাইলে সংরক্ষিত
                                    তথ্য ও ডকুমেন্ট সময়ে সময়ে পরিবর্তন
                                    করার মাধ্যমে হালনাগাদ রাখা যাবে।
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="helpDesk">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">হেল্পডেক্স</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <p> শুক্র ও শনিবারসহ সরকারি ছুটির দিন ব্যতীত সকাল ৯:০০ - বিকাল ৫:০০</p>
                    <p>01778958356</p>
                    <p>01778964156</p>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</body>

</html>