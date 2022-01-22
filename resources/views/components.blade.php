@extends('layouts.main')
@push('title')
    <title>Components (Reusability)</title>
@endpush
@section('main-section')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('/')}}/components" method="POST">
        @csrf
        <h1 class='text-center'>User Registration (validation at server-side)</h1>
        <x-input type="text" name="name" label="Name"/>
        <x-input type="email" name="email" label="Email"/>
        <x-input type="password" name="password" label="Password"/>
        <x-input type="password" name="confirm_pass" label="Confirm Password"/>
        <button class="btn btn-primary">Submit</button>
    </form>
@endsection