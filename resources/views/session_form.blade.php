@extends('layouts.main')
@push('title')
    <title>Session Management</title>
@endpush
@section('main-section')
<a href="{{route('session_destroy')}}"><button class="btn btn-danger float-right">Delete whole Session</button></a>
<a href="{{route('session_all')}}"><button class="btn btn-success float-right">View whole Session</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
<h1 class="text-center">
    Session Management
</h1>
<form action="{{url('/session')}}" method="POST">
    @csrf
    {!!($error != null) ? $error : ''!!}
    <div class="card">
        <div class="card-header">
            Add new Session variable
        </div>
        <div class="card-body">
            <div class="row jumbotron">
                <div class="col-sm-4 form-group">
                    <label for="key"> Key</label>
                    <input type="text" class="form-control" name="add_key" id="add_key" placeholder="Enter your session key here" value="{{old('add_key')}}">
                    <span class="text-danger">
                        @error('add_key')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            
                <div class="col-sm-4 form-group">
                    <label for="key_value">Value</label>
                    <input type="text" class="form-control" name="key_value" id="key_value" placeholder="Enter your key's value here" value="{{old('key_value')}}">
                    <span class="text-danger">
                        @error('key_value')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="col-sm-4 form-group">
                    <button class="btn btn-info">Add new session variable</button>
                </div>
            </div>
        </div>
        <div class="card-header">
            View Session variable (Session Key search)
        </div>
        <div class="card-body">
            <div class="row jumbotron">
                <div class="col-sm-6 form-group">
                    <label for="key"> View Key</label>
                    <input type="text" class="form-control" name="search_key" id="key" placeholder="Enter your session key you want to view value of here" value="{{old('search_key')}}">
                    <span class="text-danger">
                        @error('search_key')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            
                <div class="col-sm-3 form-group">
                    <label for="session_key_value">Value</label>
                    <input type="text" class="form-control" name="session_key_value" id="session_key_value" readonly value="{{($key_value != null) ? $key_value : old('session_key_value')}}">
                    <span class="text-danger">
                        @error('session_key_value')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="col-sm-3 form-group">
                    <button class="btn btn-dark">View</button>
                    <button type="reset" class="btn btn-secondary">Reset Form</button>
                </div>
            </div>
        </div>
        <div class="card-header">
            Delete Session variable (Session key based)
        </div>
        <div class="card-body">
            <div class="row jumbotron">
                <div class="col-sm-6 form-group">
                    <label for="key"> Delete Key</label>
                    <input type="text" class="form-control" name="delete_key" id="key" placeholder="Enter your session key you want to delete" value="{{old('delete_key')}}">
                    <span class="text-danger">
                        @error('delete_key')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            
                <div class="col-sm-3 form-group">
                    <label for="session_key_value">Result</label>
                    <p>{!!($delete_value != null) ? $delete_value : ''!!}</p>
                </div>
                <div class="col-sm-3 form-group">
                    <button class="btn btn-danger">Delete</button>
                    <button type="reset" class="btn btn-secondary">Reset Form</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    
@endsection