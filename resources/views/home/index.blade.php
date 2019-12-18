@extends('layouts.home')
@section('content')

<div class="container mt-2">
  <div class="main-content">
    <div class="container">
      <div class="col-14 col-md-8 pl-0 pr-0 pl-md-3 pr-md-3 mb-3 pb-2" style="display: flex; overflow: scroll">
            @foreach ($categories as $category)
                <div class="image-container mr-6">
                    <img src="{{ $category['imageUrl'] }}" alt="{{ $category['name'] }}" width="60" class="mr-2" />
                    <div style="font-size: 14px; text-align: center;">
                      {{ $category['name'] }}
                    </div>
                </div>
            @endforeach
        </div>
    
    <div class="list_product">
      @include('home.product')
    </div>
     
@endsection
