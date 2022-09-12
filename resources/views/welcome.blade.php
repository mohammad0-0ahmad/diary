@extends('layouts.app')

@section('content')
    <div class="container-fluid h-100 mt-5 pe-0 mt-auto">
        <div class="row justify-content-end align-items-center mw-100 me-0 mt-auto">
            <div class="row col-md-6 mb-5">
                <span class="row fs-1 fw-bold"> {{ __('home.welcome-to') }}</span>
                <div class="col-5 col-xs-8 my-5 ">
                    <img src="/images/diary-logo.png" class="w-100" />
                </div>
                <div lass="row">
                    <h3 class="col-xs-11 col-md-10  col-lg-8"> {{ __('home.intro') }}</h3>
                </div>
            </div>
            <div class="row col-md-6 justify-content-end align-items-end px-0">
                <hero></hero>
            </div>

        </div>
    </div>
    </div>
@endsection
