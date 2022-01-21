@extends('layouts.main')
@push('title')
    <title>Components (Reusability)</title>
@endpush
@section('main-section')
    <form action="{{url('/')}}/components" method="POST">
        @csrf
        <h1 class='text-center'>User Registration (validation at server-side)</h1>
        {{-- <x-input> --}}
        <button class="btn btn-primary">Submit</button>
    </form>
@endsection