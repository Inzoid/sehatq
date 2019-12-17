@extends('layouts.home')
@section('content')
    <!-- Page content -->
<div class="container mt-2">
  <div class="main-content">
    <div class="container">
      <div class="row ml-1 mr-2">
        <div class="col-8 p-0">
          <div class="overflow-auto d-flex">
            @foreach ($categories as $category)
              <span class="category-badge bg-white shadow-sm rounded text-nowrap d-flex align-items-center mb-1 mx-1 px-2 py-1">
                <img src="{{ $category['imageUrl'] }}" alt="{{ $category['name'] }}" width="70" class="mr-2" />
              <p class="text-lowercase"> {{$category['name']}} </p>
              </span><br><br><br><br>
            @endforeach
          </div>
        </div>
      </div>
        
    @foreach($products as $item)
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <a href="{{ route('product.detail', $item['id']) }}" class="text-decoration-none">
              <img class="card-img" src="{{$item['imageUrl'] }}" 
              width="150">
            </a>
          </div>

              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$item['title']}}</h5>
                    <a href="{{ route('product.detail', $item['id']) }}" class="btn btn-info">Detail</a>
                      <?php
                        if ($item['loved']=='1') {
                          $class = 'danger';
                        } else {
                          $class = 'dark';
                        }
                      ?>
                    <button class="btn btn-{{$class}}">
                    <i class="fa fa-heart"></i>
                    </button>
                </div>
              </div>
            <div class="mb-2">
            </div>
        @endforeach
        
@endsection