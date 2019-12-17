@extends('layouts.home')
@section('content')
    <!-- Page content -->
<div class="container mt-2">
  <div class="main-content">
        <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-10"> 
            
                      <?php
                        if ($product['loved']=='1') {
                          $class = 'danger';
                        } else {
                          $class = 'dark';
                        }
                      ?>
                      
                   

                    <div class="pull-left mt-3 ml-2 mb-2">
                          <a href="{{route('home')}}" class="btn btn-dark btn-sm">
                           <i class="fa fa-undo "> Back</i>
                          </a>
                    </div>
                <img class="card-img" src="{{$product['imageUrl'] }}" width="150">
            </div>
            <div class="col-md-8">
                    <div class="pull-right mt-4 mr-2 ml-1">
                        <button class="btn btn-{{$class}}">
                          <i class="fa fa-heart "></i>
                        </button>
                    </div>
                <div class="card-body">
                    <h5 class="card-title">{{$product['title']}}</h5>
                    <p>{{$product['description']}}</p><br>
                    
                    <a href="#" class="btn btn-primary mr-2">{{$product['price']}}</a>
                    <a href="{{ route('product.buy', $product['id']) }}" class="btn btn-info">Buy</a>
                </div>
            </div>
@endsection