@extends('layouts.main')
@push('title')
    <title>Register Customer</title>
@endpush
@section('main-section')
<form action="{{$url}}" method="POST" novalidate>
    @csrf
    <h1 class="text-center">{{$form_title}}</h1>
<div class="row jumbotron">
    <div class="col-sm-6 form-group">
        <label for="name"> Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required value="{{($customer != null) ? $customer->name : old('name')}}">
        <span class="text-danger">
            @error('name')
                {{$message}}
            @enderror
        </span>
    </div>

    <div class="col-sm-6 form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required value="{{($customer != null) ? $customer->email : old('email')}}" {{($flag == 'update') ? "readonly" : '' }} {{($flag == 'update') ? "style=cursor:not-allowed;" : '' }}>
        <span class="text-danger">
            @error('email')
                {{$message}}
            @enderror
        </span>
    </div>

    <div class="col-sm-6 form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
        <span class="text-danger">
            @error('password')
                {{$message}}
            @enderror
        </span>
    </div>
    <div class="col-sm-6 form-group">
        <label for="password">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Re-Enter your password" required>
        <span class="text-danger">
            @error('password_confirmation')
                {{$message}}
            @enderror
        </span>
    </div>
    <div class="col-sm-12 form-group">
        <label for="address">Address</label>
        <input type="address" class="form-control" name="address" id="address" placeholder="Enter your address" required value="{{($customer != null) ? $customer->address : old('address')}}">
        <span class="text-danger">
            @error('address')
                {{$message}}
            @enderror
        </span>
    </div>
    @php 
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    @endphp
    <div class="col-sm-6 form-group">
        <label for="Country">Country</label>
        <select class="form-control custom-select browser-default" name="country" id="country" >
            <option value="" {{($customer == null) ? 'selected' : ''}}>Select Country</option>
            @foreach ($countries as $country)
                <option value={{$country}} {{($customer == null) ? (($country == old('country')) ? "selected" : "" ): (($customer->country == $country) ? 'selected' : '')}}>{{$country}}</option>
            @endforeach
        </select>
        <span class="text-danger">
            @error('country')
                {{$message}}
            @enderror
        </span>
    </div>
    <div class="col-sm-6 form-group">
        <label for="State">State</label>
        <input type="text" class="form-control" name="state" id="state" placeholder="Enter your state name" required value="{{($customer != null) ? $customer->state : old('state')}}">
        <span class="text-danger">
            @error('state')
                {{$message}}
            @enderror
        </span>
    </div>
    
    
    <div class="col-sm-6 form-group">
        <label for="Date">Date Of Birth</label>
        <input type="Date" name="dob" class="form-control" id="dob" placeholder="" required value="{{($customer != null) ? $customer->dob : old('dob')}}">
        <span class="text-danger">
            @error('dob')
                {{$message}}
            @enderror
        </span>
    </div>
    <div class="col-sm-6 form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control browser-default custom-select">
            <option value="" {{($customer == null) ? 'selected' : ''}}>Select your Gender</option>
            <option value="m" {{($customer == null) ? (('m' == old('gender')) ? "selected" : "" ): (($customer->gender == 'm') ? 'selected' : '')}}>Male</option>
            <option value="f" {{($customer == null) ? (('f' == old('gender')) ? "selected" : "" ): (($customer->gender == 'f') ? 'selected' : '')}}>Female</option>
            <option value="o" {{($customer == null) ? (('o' == old('gender')) ? "selected" : "" ): (($customer->gender == 'o') ? 'selected' : '')}}>Other</option>
        </select>
        <span class="text-danger">
            @error('gender')
                {{$message}}
            @enderror
        </span>
    </div>
    
    <div class="col-sm-12">
        <input type="checkbox" class="form-check d-inline" name="terms" id="terms" required /><label for="chb" class="form-check-label">&nbsp;I accept all terms and conditions.
        </label>
        <span class="text-danger">
            @error('terms')
                {{$message}}
            @enderror
        </span>
    </div>

    <div class="col-sm-12 form-group mb-0">
       <button class="btn btn-primary float-right">Submit</button>
    </div>
    
</div>
</form>
</div>
@endsection