@extends('layouts.main')
@push('title')
    <title>Form :: Server-side validation</title>
@endpush
@section('main-section')
    <form action="{{url('/')}}/forms_server" method="POST">
        @csrf
        <h1 class='text-center'>User Registration (validation at server-side)</h1>
        <div class='form-group'>
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
            {{-- <small id="helpId" class="text-muted">Help text</small> --}}
        </div>
        <div class='form-group'>
            <label for="">Email</label>
            <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
            {{-- <small id="helpId" class="text-muted">Help text</small> --}}
        </div>
        <div class='form-group'>
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
            {{-- <small id="helpId" class="text-muted">Help text</small> --}}
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
    <br/><br/>
@endsection