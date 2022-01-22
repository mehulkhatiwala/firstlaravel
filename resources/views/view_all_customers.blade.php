@php
    use App\Customer;
@endphp


@extends('layouts.main')
@push('title')
    <title>Our Customers</title>
@endpush
@section('main-section')
    <h1 class='text-center'>List of all Customers</h1>
    <hr/>
    <pre>
    @php
        $customers = Customer::all();
        // print_r($customers->toArray());
        $customers = $customers->toArray();
        @endphp
        <div class="table-responsive">
          <table class="table caption-top">
            <caption class="text-center">List of customers</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">DOB</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$customer['name']}}</td>
                        <td>{{$customer['email']}}</td>
                        <td>@if ($customer['gender'] == 'm'){{'Male'}}@elseif ($customer['gender'] == 'f'){{'Female'}}@else{{'Other'}}@endif</td>
                        <td>{{$customer['address'].", ".$customer['state'].", ".$customer['country']}}</td>
                        <td>{{ date('j F, Y',strtotime($customer['dob']))}}</td>
                    </tr>
                    @php
                        $i++
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">DOB</th>
                  </tr>
            </tfoot>
          </table>
        </div>
        {{-- {{ $customers[0]['name']}} --}}
@endsection