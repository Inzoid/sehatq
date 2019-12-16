@extends('layouts.home')
@section('content')
    <!-- Page content -->
<div class="container mt-2">
  <div class="main-content">
        <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img class="card-img" src="{{$product['imageUrl'] }}" width="150">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$product['title']}}</h5>
                    <p>{{$product['description']}}</p><br>
                    <a href="#" class="btn btn-primary">{{$product['price']}}</a>
                    <a href="{{ route('product.detail', $product['id']) }}" class="btn btn-info">Buy</a>
                </div>
            </div>
@endsection