<!-- This is for Student Homepage .This Extends Layouts/Main and Partials/Menu -->

@extends('layouts.frontend')

@section('styles')
    <style>
        body {
            min-height: auto;
        }

        .container .row {
            background: #ffffff;
            box-shadow: 1px 1px 13px #938e8eb5;
            padding: 15px 0px 15px 0px;
        }

        .allready {
            width: 100%;
            padding: 30px;
        }
		.register{
			padding-top: 20%;
		}
        h2{
            color: green;
        }

    </style>
@endsection

@section('content')
    <!-- <div class="content"> -->
    <div class="container">
        <div class="row ">
            <div class="col-md-6">
				<img class="allready" src="{{ asset('assets/img/allready.png') }}" alt="">
			</div>
			<div class="col-md-6 register">
				<h3>{{ Auth::user()->name }} </h3>
				<h2>You Are Allready Registed this circular</h2>
				<h4> <a href="{{ url('/home') }}">Home Page</a> </h4>
			</div>
        </div>

    @endsection
