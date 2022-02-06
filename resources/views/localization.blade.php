@extends('layouts.main')
@push('title')
    <title>Laravel 8 Localization Demo</title>
@endpush
@section('main-section')
    <div class="d-flex flex-row-reverse mb-4">
        <a href="{{url('localization/hi')}}" class="ml-2"> Hindi </a>
        <a href="{{url('localization/ru')}}" class="ml-2"> Russian </a>
        <a href="{{url('localization/gu')}}" class="ml-4"> Gujarati </a>
        <span class="fw-bold">Select a Language: </span>
    </div>
    <div class="card m-4">
        <div class="row no-gutters">
            <div class="col-auto">
                <img src= "/assets/img/laravel8.0.png" class="img-fluid" alt="Laravel 8">
            </div>
            <div class="col">
                <div class="card-block px-2">
                    <h5 class="card-title"><i class="fab fa-laravel"></i> @lang('lang.title')</h5>
                <h6 class="card-subtitle mb-2 text-muted ">@lang('lang.sub_title')</h6>
                <p class="card-text">@lang('lang.text')</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 2 mins ago</small>
        </div>
    </div>
@endsection