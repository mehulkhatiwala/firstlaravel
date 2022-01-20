@extends('layouts.main')
@push('title')
    <title>Home</title>    
@endpush
@section('main-section')
<h1 class="text-center">
    @if($name != '')
        {{"Welcome ".$name." to our Home page!"}}
    @else
        {{"Welcome Guest to our Home page"}}
    @endif
</h1>
@endsection