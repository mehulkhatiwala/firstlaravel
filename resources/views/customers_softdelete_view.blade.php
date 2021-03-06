@extends('layouts.main')
@push('title')
    <title>Our All Customers (Using Customer Controller)</title>
@endpush
@section('main-section')
    {{-- {!!($msg!= null) ? $msg : ''!!} --}}
    <h1 class='text-center'>List of all Customers (SoftDeletes)</h1>
    <hr/>
    <div class="d-flex flex-row-reverse m-1">
      <a href="{{route('customer_reg')}}"><button class="btn btn-primary ml-2">Add More Customers</button></a>
      <a href="{{route('customer_trashed_display')}}"><button class="btn btn-danger mr-2">Go to Trash</button></a>
    </div>
    <pre>
    @php
        // print_r(Session::all());
        // die;
        // $customers = $customers->toArray();
    @endphp
        <div class="table-responsive">
          <table class="table caption-top table-sm">
            <caption class="text-center"><span style="font-style: bold;">Table 1:</span> Our all customers (softdelete functionality)</caption>
            <thead>
              <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="10%">Name</th>
                <th scope="col" width="15%">E-mail</th>
                <th scope="col" width="5%">Gender</th>
                <th scope="col" width="10%">DOB</th>
                <th scope="col" width="25%">Address</th>
                <th scope="col" width="10%">Status</th>
                <th scope="col" width="20%" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>@if ($customer->gender == 'm'){{'Male'}}@elseif ($customer->gender == 'f'){{'Female'}}@else{{'Other'}}@endif</td>
                        <td>{{ $customer->dob }}</td>
                        <td width="20%">{{$customer->address.", ".$customer->state.", ".$customer->country}}</td>
                        <td>@if($customer->status == 1)<span class="btn-success">Active</span> @else <span class="btn-danger">Inactive</span> @endif </td>
                        <td><a href="{{route('customer.edit', ['id' => $customer->id])}}"><button class="btn btn-primary">Edit</button></a></td>
                        <td><a href="{{route('customer_soft_delete', ['id' => $customer->id])}}"><button class="btn btn-warning">Move to Trash</button></a></td>
                    </tr>
                    @php
                        $i++
                    @endphp
                @endforeach
            </tbody>
            {{-- <tfoot>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">DOB</th>
                  </tr>
            </tfoot> --}}
          </table>
        </div>
        {{-- {{ $customers[0]['name']}} --}}
@endsection
