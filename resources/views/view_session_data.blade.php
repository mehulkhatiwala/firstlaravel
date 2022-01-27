@extends('layouts.main')
@push('title')
    <title>Session data</title>
@endpush
@section('main-section')
    @php
        p($session);    
    @endphp
    <div class="row">
        <a href="{{route('session.demo')}}"><button class="btn btn-primary float-right">Add more Session variables</button></a>
    </div>
@endsection