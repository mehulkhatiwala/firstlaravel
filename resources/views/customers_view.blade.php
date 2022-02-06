@extends('layouts.main')
@push('title')
    <title>Our All Customers (Using Customer Controller)</title>
@endpush
@section('main-section')
    <h1 class='text-center'>List of all Customers (Using Customer Controller)</h1>
    <hr/>
    {{-- <div class="row justify-content-md-center m-2"> --}}
    <div class="d-flex flex-row-reverse mb-4">
      <a href="{{url('/database/crud/registration')}}" class="col-3">
        <button class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i> Add</button>
      </a>

      <form action="" name="search-form" class="col-9 align-self-center">
        <div class="input-group">
          <div id="search-autocomplete" class="form-outline col-9">
            <input type="search" name="search" class="form-control" placeholder="Search customer here"/>
          </div>
          <button class="btn btn-primary">
            <i class="fas fa-search"></i> Search 
          </button>
          <a href="{{route('customer.view')}}">
            <button class="btn btn-danger ml-2">
              <i class="fas fa-sync-alt"></i> Clear
            </button>
          </a>
        </div>
      </form>
  </div>
    @php
        // print_r($customers->toArray());
        // die;
        // $customers = $customers->toArray();
    @endphp
        <div class="table-responsive">
          <table class="table caption-top table-sm">
            <caption class="text-center"><span style="font-style: bold;">Table 1:</span> Our all customers (through Customer Controller)</caption>
            <thead>
              <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">E-mail</th>
                <th class="text-center" scope="col">Gender</th>
                <th class="text-center" scope="col">DOB</th>
                <th class="text-center" scope="col">Address</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @foreach ($customers as $customer)
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>@if ($customer->gender == 'm'){{'Male'}}@elseif ($customer->gender == 'f'){{'Female'}}@else{{'Other'}}@endif</td>
                        <td>{{ $customer->dob }}</td>
                        <td width="20%">{{$customer->address.", ".$customer->state.", ".$customer->country}}</td>
                        <td class="text-center">@if($customer->status == 1)<span class="btn-success">Active</span> @else <span class="btn-danger">Inactive</span> @endif </td>
                        <td class="text-center"><a href="{{route('customer.edit', ['id' => $customer->id])}}"><button class="btn btn-primary btn-block">Edit</button></a></td>
                        <td class="text-center"><a href="{{route('customer.delete', ['id' => $customer->id])}}"><button class="btn btn-danger btn-block">Delete</button></a></td>
                    </tr>
                    @php
                        $i++
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th class="text-center" scope="col" width="5%">#</th>
                <th class="text-center" scope="col" width="10%">Name</th>
                <th class="text-center" scope="col" width="15%">E-mail</th>
                <th class="text-center" scope="col" width="5%">Gender</th>
                <th class="text-center" scope="col" width="10%">DOB</th>
                <th class="text-center" scope="col" width="25%">Address</th>
                <th class="text-center" scope="col" width="10%">Status</th>
                <th class="text-center" scope="col" width="20%" colspan="2">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
        {{-- {{ $customers[0]['name']}} --}}
        {{-- PAGINATION --}}
        {{-- <div class="row justify-content-md-center">
          {{ $customers->onEachSide(3)->links() }}
        </div> --}}
        {{-- Pagination --}}
        <div class="row justify-content-md-end m-2">
          {!! $customers->links() !!}
        </div>
@endsection