@extends('layouts.main')
@push('title')
    <title>Form :: Server-side validation</title>
@endpush
@section('main-section')
    <form action="{{url('/')}}/forms_server" method="POST">
        @csrf
        {{-- @php
            if(count($errors->all()) !== 0) {
                echo "<pre>";
                print_r($errors->all());
            }
        @endphp --}}
        <h1 class='text-center'>User Registration (validation at server-side)</h1>
        <div class='form-group'>
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('name')}}"/>
            {{-- <small id="helpId" class="text-muted">Help text</small> --}}
            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
            
        </div>
        <div class='form-group'>
            <label for="">Email</label>
            <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('email')}}"/>
            {{-- <small id="helpId" class="text-muted">Help text</small> --}}
            <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class='form-group'>
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
            {{-- <small id="helpId" class="text-muted">Help text</small> --}}
            <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class='form-group'>
            <label for="">Confirm Password</label>
            <input type="password" name="password_confirmation" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
            {{-- <small id="helpId" class="text-muted">Help text</small> --}}
            <span class="text-danger">
                @error('password_confirmation')
                    {{$message}}
                @enderror
            </span>
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
    <br/><br/>
@endsection