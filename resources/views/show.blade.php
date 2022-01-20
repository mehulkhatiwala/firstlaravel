@extends('layouts.main')
@push('title')
    <title>Resource Controller :: show</title>
@endpush
@section('main-section')
<h1 class="text-center">
    This resource is calling show() with id: {{$id}}
</h1>
@endsection()