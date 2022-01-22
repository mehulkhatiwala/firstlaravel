@extends('layouts.main')
@push('title')
    <title>Form :: Client-side validation</title>
@endpush
@section('main-section')
    <br/>
    <form class="row g-3 needs-validation" action="{{url('/')}}/validation/forms" method="POST" novalidate>
        @csrf
        {{-- Full name begin --}}
        <div class="col-md-4">
            <label for="full_name" class="form-label">Your full name</label>
            <input type="text" class="form-control" name="full_name" id="full_name" value="" placeholder="Enter your full name here" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                This is required field.
            </div>
        </div>
        {{-- Full name ends --}}
        {{-- Username begin --}}
        <div class="col-md-4">
            <label for="user_name" class="form-label">Username</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" name="user_name" id="user_name" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Username is required field.
                </div>
            </div>
        </div>
        {{-- Username ends --}}
        {{-- Password begin --}}
        <div class="col-md-4">
            <label for="user_password" class="form-label">User Password</label>
            <input type="password" class="form-control" name="user_password" id="user_password" value="" placeholder="Enter your password here" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        {{-- Password ends --}}
        {{-- State begin --}}
        <div class="col-md-4">
            <label for="user_state" class="form-label">State</label>
            <select class="form-select form-select-lg" name="user_state" id="user_state" required>
                <option selected disabled value="">Choose state...</option>
                @php
                    $indianStates = [
                        'AR' => 'Arunachal Pradesh',
                        'AS' => 'Assam',
                        'BR' => 'Bihar',
                        'CT' => 'Chhattisgarh',
                        'GA' => 'Goa',
                        'GJ' => 'Gujarat',
                        'HR' => 'Haryana',
                        'HP' => 'Himachal Pradesh',
                        'JK' => 'Jammu and Kashmir',
                        'JH' => 'Jharkhand',
                        'KA' => 'Karnataka',
                        'KL' => 'Kerala',
                        'MP' => 'Madhya Pradesh',
                        'MH' => 'Maharashtra',
                        'MN' => 'Manipur',
                        'ML' => 'Meghalaya',
                        'MZ' => 'Mizoram',
                        'NL' => 'Nagaland',
                        'OR' => 'Odisha',
                        'PB' => 'Punjab',
                        'RJ' => 'Rajasthan',
                        'SK' => 'Sikkim',
                        'TN' => 'Tamil Nadu',
                        'TG' => 'Telangana',
                        'TR' => 'Tripura',
                        'UP' => 'Uttar Pradesh',
                        'UT' => 'Uttarakhand',
                        'WB' => 'West Bengal',
                        'AN' => 'Andaman and Nicobar Islands',
                        'CH' => 'Chandigarh',
                        'DN' => 'Dadra and Nagar Haveli',
                        'DD' => 'Daman and Diu',
                        'LD' => 'Lakshadweep',
                        'DL' => 'National Capital Territory of Delhi',
                        'PY' => 'Puducherry'];
                @endphp 
                @foreach ($indianStates as $key => $state)
                    <option value="{{$key}}">{{$state}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        {{-- State end --}}

        {{-- City begin --}}
        <div class="col-md-4">
            <label for="user_city" class="form-label">City</label>
            <input type="text" class="form-control" name="user_city" id="user_city" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        {{-- City end --}}
        
        <div class="col-md-4">
            <label for="user_pincode" class="form-label">Pincode</label>
            <input type="text" class="form-control" name="user_pincode" id="user_pincode" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="invalidCheck" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
            Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
            You must agree before submitting.
            </div>
        </div>
        </div>
        <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
<br/>
<br/>
@endsection