@extends('layouts.main')
@push('title')
	<title>Blade Template Intro</title>
@endpush

@section('main-section')
<div class="container">
	<h1>
		Welcome, {{$name ?? "Guest"}}!
	</h1>

	{{--THIS IS BLADE COMMENT--}}
	<?php /* diffrence between {{ $variable }} and {!! $variable !!} */?>
	<p>
		Only print the variable value (with html tags): {{$demo}}
	</p>
	<p>
		Markup (process html tags): {!! $demo !!}
	</p>

	<hr/>
	<h2>IF...ELSE directives</h2>

	@if($name == '')
		{{"Name paramter is not set"}}
	@elseif($name == 'mehul')
		{{"Name parameter is set"}}
		{{"to ".$name}}
	@else
		{{"Name is set..."}} 
	@endif

	<hr/>
	<h2>UNLESS directives </h2>
	@unless($name == 'mehul')
		{{"Name paramter set to ".$name." name...."}}
	@endunless

	<?php /* ISSET directives => blade @isset @endisset*/?>
	<p>"Hello "
	@isset ($name)
		{{", ".$name}}
	@endisset
	</p>
	
	<?php /* LOOPING DIRECTIVES */?>
	<?php /* @for @endfor directives */?>
	
		<hr />
		<h2>loop directive</h2>
		<hr />
		<h3>FOR Loop:</h3><br/>
		@for($i=1; $i<=10; $i++)
			{{$i}}
		@endfor
		<hr />
		<?php /* @while @endwhile directives */?>
		<h3>METHOD 1(while):</h3>
		<?php //initialize $i 
			$i = 1;
		?>
		@while($i<=10)
			<h6>{{$i}}</h6>
		<?php
			$i++;
		?>
		@endwhile
		<hr />
		<h3>METHOD 2 (while):</h3>
		@php $i = 1 @endphp
		@while($i<=5)
			<h6>{{$i}}</h6>
		@php $i++ @endphp
		@endwhile
		<hr />
		<h3>FOREACH Loop:</h3><br/>
		<select id="countries">
			@php 
				$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
			@endphp
			@foreach ($countries as $key => $country)
				<option value={{$key}}>{{$country}}</option>
			@endforeach
		</select>
		<hr />
		<h3>BREAK and CONTINUE directives</h3>
		<h3>BREAK Directive</h3>
		<select id="break_country">
			{{-- BLADE COMMNET DIRECTIVE --}}
			{{-- This loop stops execution once country name matched with "India" --}}
			@foreach($countries as $key => $country)
				<option value={{$key}}>{{$country}}</option>
				@if($country == "India")
					@break
				@endif
			@endforeach
		</select>
		<hr/>
		<h3>CONTINUE Directive</h3>
		<select id="break_country">
			{{-- This loop skips execution if country name matches either of "Indonesia", "Iran (Islamic Republic of) or "Pakistan" --}}
			@foreach($countries as $key => $country)
				@if($country == "Indonesia" || $country == "Iran (Islamic Republic of)" || $country == "Pakistan")
					@continue
				@endif
				<option value={{$key}}>{{$country}}</option>
			@endforeach
		</select>

		<hr/>
		<h2>Other directives</h2>
		<hr/>
		<h3>COMMENT Directive</h3>
			This directive is used to place comments in blade template
		<hr/>
		<h3>INCLUDE Directive</h3>
			This directive is used to inclued some other files into the current file (<a href="/">click here</a> to see example (Home page))
		<hr/>
		<h3>YIELD Directive</h3>
			This directive is used to display the content of given section (<a href="/Mehul">click here</a> to see example (Home page))
		<hr/>
		<h3>SECTION Directive</h3>
			This directive defines a section of content (<a href="/about">click here</a> to see example (About Us page))
		<hr/>
		<h3>EXTENDS Directive</h3>
			This directive is used to specify which layout the child view should extend (<a href="/about/Mehul's Collection">click here</a> to see example (About Us page))
</div>
@endsection