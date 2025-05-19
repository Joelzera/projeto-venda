@extends('master')

@section('content')

 @foreach($brands as $brand)
    <h5>{{ $brand->name }}</h5>
 @endforeach
  @foreach($customers as $customer)
    <h5>{{ $customer->name }}</h5>
    <h5>{{ $customer->cpf }}</h5>
 @endforeach


  <App/>

@endsection