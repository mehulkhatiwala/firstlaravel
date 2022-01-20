@extends('layouts.main')
@push('title')
    <title>About Us</title>    
@endpush
@section('main-section')
<h1 class="text-center">
    @if($company != '')
        {{"Things to know about ".$company}}
    @else
        {{"About Us"}}
    @endif
</h1>
@endsection